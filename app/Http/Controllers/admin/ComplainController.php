<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\NotificationController;
use App\Models\Offer;
use App\Models\Project;
use App\Models\User;
use Exception;

class ComplainController extends Controller
{

    /**
     * load unsolved Conflicts
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loadUnsolved()
    {
        $data =  Complain::with(['sal_offer.sal_project_id.sal_created_by', 'sal_offer.sal_provider_by'])->where('is_solved', 0)->get();
        // return response($data);

        return view('admin.pages.complains.unsolved', compact('data'));
    }

    public function loadsolved()
    {
        $data =  Complain::with(['sal_offer.sal_project_id.sal_created_by', 'sal_offer.sal_provider_by'])->where('is_solved', 1)->get();
        // return response($data);

        return view('admin.pages.complains.solved', compact('data'));
    }

    public function search(Request $request)
    {
        Validator::validate($request->all(), [

            'value' => 'required',

        ], [
            'value.required' => 'يجب ادخال قيمه للبحث بشكل صحيح كأسم او رقم او    .',
        ]);
        $search = Complain::query()
            ->orWhere('seeker_reason', 'LIKE', "%{$request->value}%")
            ->orWhere('provider_complain', 'LIKE', "%{$request->value}%")
            ->orWhere('solution', 'LIKE', "%{$request->value}%")
            ->get();
        return view('admin.pages.complains.solved', ['data' => $search]);
    }

    public function searchunsolved(Request $request)
    {
        Validator::validate($request->all(), [

            'value' => 'required',

        ], [
            'value.required' => 'يجب ادخال قيمه للبحث بشكل صحيح كأسم او رقم او    .',
        ]);
        $search = Complain::query()
            ->orWhere('seeker_reason', 'LIKE', "%{$request->value}%")
            ->orWhere('provider_complain', 'LIKE', "%{$request->value}%")
            ->orWhere('solution', 'LIKE', "%{$request->value}%")
            ->get();
        return view('admin.pages.complains.unsolved', ['data' => $search]);
    }



    public function show($id)
    {

        $data =  Complain::with(['sal_offer.sal_project_id.sal_created_by', 'sal_offer.sal_provider_by'])->where('id', $id)->get();
       

        return view('admin.pages.complains.show')->with('data', $data);
    }




    /**
     * load Conflict solution Form 
     *
     * @param  int  $request $conflict_id
     * @return \Illuminate\Http\Response
     */
    public function loadsolutionForm($conflict_id)
    {

        return view('admin.pages.complains.solveConflict', compact('conflict_id'));
    }


    /**
     * Solve specific Conflict and send notification of the solution
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function solveConflict(Request  $request)
    {
        try {

            Validator::validate($request->all(), [
                'solution' =>  array(
                    'required',
                ),
            ], [
                'solution.required' => 'يجب ادخال توصيف الحل  '
            ]);

            $complain =  Complain::with(['sal_offer.sal_project_id.sal_created_by', 'sal_offer.sal_provider_by'])->where('id', $request->conflict_id)->first();
            $complain->solution = $request->solution;
            $complain->percentage = $request->percentage;
            $complain->is_solved = 1;
            $complain->solution_date = \Carbon\Carbon::now();
            $Admin = User::whereRoleIs('Admin')->first();
            $seeker = User::where('id', $complain->sal_offer->sal_project_id->sal_created_by->id)->first();
            $provider = User::where('id', $complain->sal_offer->sal_provider_by->id)->first();
            $order = Order::where('offer_id', $complain->sal_offer->id)->first();
            if ($complain->percentage < 1) {
                $complain->sal_offer->sal_project_id->status = 8;
                $order->status = 0;
            } else {
                $order->status = 1;
                $complain->sal_offer->sal_project_id->status = 8; //closed and show that it has been in a conflict
                $prcentage = $complain->percentage / 100;
                $project_cost = $complain->sal_offer->price * $prcentage;
                $Admin_percentage = $project_cost / 10;
                $provider_percentage = $project_cost - $Admin_percentage;
                echo 'offer_price' . $complain->sal_offer->price;
                echo 'percentage' . $prcentage;
                echo 'project_cost' . $project_cost;
                echo  'complain_percentage' . $complain->percentage;
                echo 'Admin' . $Admin_percentage;
                echo 'provider' . $provider_percentage;
                $seeker->withdraw($project_cost,  ['sender' =>   $seeker->name, 'receiver' => $provider->name, 'type' => 'سحب', 'project_id' => $complain->sal_offer->sal_project_id->id, 'project_title' => $complain->sal_offer->sal_project_id->title, 'amount' => (string)$project_cost, 'total_price' => (string)$complain->sal_offer->price, 'invoice_id' => $order->invoice_id, 'order_id' => $order->id, 'order_status' => '  تم الاستلام ']);
                $Admin->deposit($Admin_percentage, ['sender' =>   $seeker->name, 'receiver' =>  Auth::user()->name, 'type' => 'ايداع', 'project_id' => $complain->sal_offer->sal_project_id->id, 'project_title' => $complain->sal_offer->sal_project_id->title, 'amount' => (string)$Admin_percentage, 'total_price' => (string)$complain->sal_offer->price, 'invoice_id' => $order->invoice_id, 'order_id' => $order->id, 'order_status' => '  تم الاستلام ']);
                $provider->deposit($provider_percentage, ['sender' =>   $seeker->name, 'receiver' =>  $provider->name, 'type' => 'ايداع', 'project_id' => $complain->sal_offer->sal_project_id->id, 'project_title' => $complain->sal_offer->sal_project_id->title, 'amount' => (string)$provider_percentage, 'total_price' => (string)$complain->sal_offer->price, 'invoice_id' => $order->invoice_id, 'order_id' => $order->id, 'order_status' => '  تم الاستلام ']);
            }


            if ($complain->save() &&  $complain->sal_offer->sal_project_id->save()) {
                $offer_id = $complain->sal_offer->id;
                $project_id = $complain->sal_offer->project_id;
                if (Auth::check()) {
                    $notify_seeker = [
                        'receiver_id' => $seeker->id, 'sender_id' => Auth::user()->id, 'title' => 'title of notify', 'is_read' => 0, 'message' =>  " $complain->solution ", 'body' => "/projects/$project_id#offer$offer_id", 'link' => "/projects/$project_id#offer$offer_id"
                    ];

                    NotificationController::hiNotification($notify_seeker);

                    $notify_provider = [
                        'receiver_id' => $provider->id, 'sender_id' => Auth::user()->id, 'title' => 'title of notify', 'is_read' => 0, 'message' =>  " $complain->solution", 'body' => "/projects/$project_id#offer$offer_id", 'link' => "/projects/$project_id#offer$offer_id "
                    ];

                    NotificationController::hiNotification($notify_provider);
                    return redirect('/Complains/unsolved')->with(['success' => 'تمت العملية بنجاح']);
                }
            }
            return redirect('/Complains/unsolved')->with(['error' => 'فشلت العملية']);
        } catch (Exception $e) {
            abort(404);
        }
    }
}
