<?php

namespace App\Http\Controllers\website;

use App\Models\Offer;
use App\Models\Order;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserAttachment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::with(['sal_project_id'])->where('provider_id', Auth::user()->id)->get();
        return view('website.users.offers.index', compact('offers'));
    }
    public function showTransactions()
    {
        $balance = Auth::user()->balance;
        $data = DB::table('transactions')
            ->where('payable_id', Auth::user()->id)
            ->get();
        // return response($transactions);
        return view('website.users.offers.transactions', compact('data', 'balance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {


    //     return view('website.users.offers.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Validator::validate($request->all(), [

            'price' => ['required', 'numeric'],
            'duration' => ['required', 'numeric'],
            'description' =>  array(
                'required',
            ),


        ], [

            'price.required' => 'يجب ادخال السعر ',
            'price.numeric' => 'يجب ادخال رقم ',
            'duration.required' => 'يجب ادخال المدة ',
            'duration.numeric' => 'يجب ادخال رقم ',
            'description.required' => 'يجب أدخال تفاصيل العرض  ',
            // 'description.regex'=>'يجب ألا يحتوي على أرقام أو رموز فقط   ',

        ]);
        $model = new Offer;
        $model->price = $request->price;
        $model->net_price = $request->price;
        $website_precentage = $model->price / 10;
        $model->net_price = $model->price - $website_precentage;
        $project_id = $request->project_id;
        // $model->net_price=$request->price;
        $model->duration = $request->duration;
        $model->provider_id = Auth::User()->id; //Auth_id
        $model->project_id = $project_id;
        $model->status = 1;
        // if($request->input('description')){
        $model->description = $request->description;
        // }
        if ($model->save()) {


            if ($request->hasFile('files')) {

                foreach ($request->file('files') as $file) {
                    $Attachments = new UserAttachment;
                    $Attachments->attach_id = $model->id;
                    $Attachments->attach_type = '2';
                    $fileNme = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images'), $fileNme);
                    $Attachments->file_name = $fileNme;
                    $Attachments->file_type = $file->getClientOriginalExtension();
                    $Attachments->user_id = $model->provider_id;
                    $Attachments->save();
                }
            }

            return redirect()->back()->with(['success' => 'تم تعديل البيانات بنجاح']);
            return redirect()->back()->with(['error' => 'لم يتم تعديل البيانات ']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = Offer::with('sal_project_id')->where('id', $id)->first();
        if ($data != null) {
            if (Auth::user()->id == $data->provider_id && $data->status == 1 && $data->sal_project_id->status == 1) {
                // return response( $data);
                return view('website.users.offers.edit')->with('data', $data);
            } else {
                return response(['error' => true, 'error-msg' => 'Not found'], 404);
            }
        } else {
            return response(['error' => true, 'error-msg' => 'Not found'], 404);
        }
    }


    public function doPayment($offer_id, $project_id, $project_name, $price, $provider_id)
    {
        $Admin = User::whereRoleIs('Admin')->first();

        $order = new Order();
        $order->price = $price;
        $order->offer_id = $offer_id;
        $order->project_id = $project_id;
        $order->sender_id = Auth::user()->id;
        $order->receiver_id = $provider_id;

        if ($order->save()) {
            $data = [
                "order_reference" => $order->id,
                "products" => [
                    array(
                        "id" => $order->project_id,
                        "product_name" => $project_name,
                        "quantity" => 1,
                        "unit_amount" => $order->price
                    )
                ], "currency" => "USD",
                "total_amount" => $order->price,
                "success_url" => "http://localhost:8000/success", //success
                "cancel_url" => "http://localhost:8000/cancel",
                "metadata" => [
                    "sender" =>  $order->sender_id,
                    "receiver" =>  $order->receiver_id,

                ]

            ];


            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://waslpayment.com/api/test/merchant/payment_order",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($data),

                CURLOPT_HTTPHEADER => array(
                    "private-key: rRQ26GcsZzoEhbrP2HZvLYDbn9C9et",
                    "public-key: HGvTMLDssJghr9tlN9gr4DVYt0qyBy",
                    "Content-Type:  application/x-www-form-urlencoded"


                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);
            $result = json_decode($response, true);
            if (isset($result['status']) && $result['status'] == true) {
                $inserted_order =  Order::find($order->id);
                $inserted_order->invoice_id = $result['invoice']['invoice_referance'];
                $inserted_order->save();



                return $result;

                // echo $result['invoice']['invoice_referance'];
                // $result = json_decode($response, true);
                // echo $result['invoice']['invoice_referance'];
                // return $result['invoice']['invoice_referance'];
                // $order = Order::find($result['order_reference']);
                // $order->status = 1;
                // $order->invoice_id = $result['invoice_referance'];
                //print_r(json_decode($response,true));
                //  $result= json_decode($response,true);
                //  echo $result['message'];

            } else if ($err) {
                echo " Error #:" . $err;
                return   $result;
            }

            return   $result;
        } else {
            echo 'database error';
        }

        // return json_encode($data);



    }


    /**----------------------
     *    check if the user is the project owner
     *     and is   and the status of the offer is acceptOffer $offer->status==1

     *------------------------**/

    public function acceptOffer(Request $request)
    {

        $offer = Offer::with(['sal_project_id'])->where('id', $request->offer_id)->first();
        if ($offer != null) {
            $next_url = '/home'; //ApiError
            $order_sum = 0;
            if ($offer->sal_project_id->user_id == Auth::user()->id &&  $offer->sal_project_id->status == 1 && $offer->status == 1) {
                $order_sum =  Order::where("sender_id", Auth::user()->id)->where('status', 1)
                    ->sum('price');
                if ($order_sum == null) {
                    $order_sum = 0;
                }


                $net_balance = Auth::user()->balance - $order_sum;
                /**======================
                 *    if the balance biger and not used of any current order
                 * create order with active 
                 *========================**/
                if ($net_balance >= $offer->price) {
                    // $order->invoice_id =$result['customer_account_info']['invoice_referance'] ;

                    $Admin = User::whereRoleIs('Admin')->first();
                    $order = new Order();
                    $order->status = 1;
                    $order->price = $offer->price;
                    $order->offer_id =  $offer->id;
                    $order->project_id =  $offer->project_id;
                    $order->sender_id = Auth::user()->id;
                    $order->receiver_id = $Admin->id;
                    $offer->status = 2;
                    $offer->sal_project_id->status = 4;
                    if ($offer->save() && $offer->sal_project_id->save() && $order->save()) {
                        return redirect()->back()->with(['success' => 'تمت  العملية بنجاح']);
                    } else {
                        return redirect()->back()->with(['success' => 'فشلت  العملية ']);
                    }
                } else {
                    $remaining = $offer->price - $net_balance;
                    $fetchData = $this->doPayment($offer->id, $offer->project_id, $offer->sal_project_id->title, $remaining, $offer->provider_id);
                    if ($fetchData) {
                        // echo $fetchData['invoice']['order_reference'];
                        $next_url  = $fetchData['invoice']['next_url'];
                        return redirect($next_url)->with(['success' => '  تمت الاضافة بنجاح']);
                        // $order =  Order::where("sender_id", Auth::user()->id);

                    } else {
                        return response(['error' => true, 'offer-msg' => 'offer has been cancel'], 404);
                    }
                }
            } else {
                return response(['error' => true, 'no offer ' => 'Not found'], 404);
            }
        }
    }
    /**----------------------
     *    called when the customer
     *    successfully deposit
     *    to Admin account
     *------------------------**/
    public function success($response)

    {
        $info = base64_decode($response);
        $result = json_encode($info, true);
        // echo $info;
        // echo $result['customer_account_info']['order_reference_id'];
        //update
        // $order = Order::where('id', $result['customer_account_info']['order_reference_id'])->first();

        $last_inserted_order = Order::latest()->first();
        echo $last_inserted_order->id;
        $order = Order::where('id', $last_inserted_order->id)->first();
        $order->status = 1;
        // $order->invoice_id =$result['customer_account_info']['invoice_referance'] ;
        $offer = Offer::with(['sal_project_id', 'sal_provider_by'])->where('id', $order->offer_id)->first();
        $offer->status = 2;
        $offer->sal_project_id->status = 4;
        if ($offer->save() && $offer->sal_project_id->save() && $order->save()) {
            $Admin = User::whereRoleIs('Admin')->first();
            Auth::user()->balanceInt;
            // Auth::user()->deposit($offer->price, ['sender' =>   $offer->sal_project_id->sal_created_by->name, 'receiver' => $offer->sal_provider_by->name, 'type' => 'ايداع', 'projcet_id' => $offer->project_id, 'projcet_title' => $offer->sal_project_id->title, 'amount' => (string)$offer->price, 'total_price' => (string)$offer->price]);

            Auth::user()->deposit($offer->price, ['sender' =>   $offer->sal_project_id->sal_created_by->name, 'receiver' => $offer->sal_project_id->sal_created_by->name, 'type' => 'ايداع', 'projcet_id' => $offer->project_id, 'projcet_title' => '-', 'amount' => (string)$offer->price, 'total_price' => (string)$offer->price]);
            return view('website.users.offers.success');
            // return redirect()->route('')->with(['success' => 'تم تعديل البيانات بنجاح']);
        } else {
            // return view('website.users.offers.error');
            // return redirect()->back()->with(['error' => 'لم يتم تعديل البيانات ']);
        }
    }
    public function cancel()
    {

        return view('website.users.offers.cancel');
    }






    /**----------------------
     *  seeker cancel the confirmation before the provider confirm
     *  check if the user is the project owner
     *  and is   and the status of the offer is acceptOffer $offer->status==2
     *------------------------**/

    public function cancelConfirm(Request $request)
    {

        $offer = Offer::with('sal_project_id')->where('project_id', $request->project_id)
            ->where('id', $request->offer_id)->first();
        if ($offer->sal_project_id->user_id == Auth::user()->id && $offer->status == 2 && $offer->sal_project_id->status == 4) {
            $offer->status = 1;
            $offer->sal_project_id->status = 1;

            if ($offer->save() && $offer->sal_project_id->save()) {
                // return response( $offer);
                return redirect()->back()->with(['success' => 'تم العملية بنجاح']);
            } else {
                return redirect()->back()->with(['error' => 'فشلت العملية']);
            }
        }
    }

    /**----------------------
     *     provider confirm the offer 
     *     last confirmation and start work
     *------------------------**/

    public function confirmOffer(Request $request)
    {
        $data = Offer::with('sal_project_id')->where('project_id', $request->project_id)
            ->where('id', $request->offer_id)->first();

        if ($data->sal_project_id->status == 4) { //if the project accepted an offer

            $data->status = 3;
            $data->sal_project_id->status = 2;
            $data->sal_project_id->handled_by = $data->provider_id;
            $daysForDelivery = $data->duration + 2;
            $data->sal_project_id->start_date = \Carbon\Carbon::now();
            $data->sal_project_id->end_date = \Carbon\Carbon::now()->addDay($data->duration);
            $data->sal_project_id->delivery_date = \Carbon\Carbon::now()->addDay($daysForDelivery);

            //project is in excution
            if ($data->save() && $data->sal_project_id->save()) {

                return redirect()->back()->with(['success' => 'تم العملية بنجاح']);
            } else {
                return redirect()->back()->with(['error' => 'فشلت العملية']);
            }
        }
    }

    /**----------------------
     *   provider cancel the offer before the seeker accept or after the seeker accepts
     * check if the user is the project owner and is and the  offer status
     *  is acceptOffer $offer->status==2
     *------------------------**/
    public function  cancelOffer($id)
    {
        $data = Offer::with('sal_project_id')->where('id', $id)->first();
        if ($data->provider_id == Auth::user()->id && $data->status == 1 && $data->sal_project_id->status == 1) {
            $data->status = 0;
        } else if ($data->provider_id == Auth::user()->id && $data->status == 2 && $data->sal_project_id->status == 4) {
            $data->status = 4;
            $data->sal_project_id->status = 1;
        }
        if ($data->save() && $data->sal_project_id->save()) {

            return redirect()->back()->with(['success' => 'تم العملية بنجاح']);
        } else {
            return redirect()->back()->with(['error' => 'فشلت العملية']);
        }
    }

    /**----------------------
     * seeker confirm that the project is delivered
     *    check if the user is the provider 
     *   and is   and the project status is acceptOffer $project->status==1
     *   مفتوح then change the project status to قيد التنفيذ 
     *------------------------**/

    public function confirmDelivery(Request $request)
    {


        // $offer= Offer::with('')->find($request->offer_id); 

        $offer = Offer::with('sal_project_id', 'sal_provider_by')->where('project_id', $request->project_id)
            ->where('id', $request->offer_id)->first();

        if ($request->project_owner == Auth::user()->id && $offer->status == 3 && $offer->sal_project_id->status == 3) {
            $Admin_percentage = $offer->price - $offer->net_price;
            $provider_percentage = $offer->net_price;
            $seeker = User::find($offer->sal_project_id->user_id);
            $Admin = User::whereRoleIs('Admin')->first();
            $provider = User::find($offer->provider_id);
            $seeker->balanceInt;
            $Admin->balanceInt;
            $provider->balanceInt;
            $seeker->withdraw($offer->price, ['sender' =>   $offer->sal_project_id->sal_created_by->name, 'receiver' => $offer->sal_provider_by->name, 'type' => 'سحب', 'project_id' => $offer->project_id, 'project_title' => $offer->sal_project_id->title, 'amount' => (string)$offer->price, 'total_price' => (string)$offer->price]);
            $Admin->deposit($Admin_percentage, ['sender' =>   $offer->sal_project_id->sal_created_by->name, 'receiver' => $Admin->name, 'type' => 'ايداع', 'project_id' => $offer->project_id, 'project_title' => $offer->sal_project_id->title, 'amount' => (string)$Admin_percentage, 'total_price' => (string)$offer->price]);
            $provider->deposit($provider_percentage,  ['sender' => $offer->sal_project_id->sal_created_by->name, 'receiver' => $offer->sal_provider_by->name, 'type' => 'ايداع', 'project_id' => $offer->project_id, 'project_title' => $offer->sal_project_id->title, 'amount' => (string)$provider_percentage, 'total_price' => (string)$offer->price]);

            // $offer->status=5;
            //done working and seeker confirm
            $offer->sal_project_id->status = 5; //close project
            $order = Order::where('offer_id', $offer->id)->where('status', 1)->first();
            $order->status = 2; //تم استلام المشروع
            if ($offer->sal_project_id->save() && $order->save()) {
                // return response($offer);
                return redirect()->back()->with(['success' => 'تم تعديل البيانات بنجاح']);
            } else {
                return redirect()->back()->with(['error' => 'لم يتم تعديل البيانات ']);
            }
        }
    }

    /**----------------------
     *   called when the provider finishWork
     *------------------------**/
    public function finishWork(Request $request)
    {

        $data = Offer::with('sal_project_id')->where('project_id', $request->project_id)
            ->where('id', $request->offer_id)->first();
        if ($data->sal_project_id->status == 2 && $data->status == 3) {

            $data->sal_project_id->status = 3;
            // $currentDate=strtotime(\Carbon\Carbon::now());//'2022-05-5'


            //    $oldDate=strtotime($offer->created_at);
            //    $deference=  $currentDate - $oldDate;
            // //    echo $deference;
            //     $days=floor($deference/(60*60*24));
            //     $hours=floor($deference/(60*60));
            //     $minutes= floor($deference/(60));
            //     $seconds= floor($deference/(60));
            //     $time='';
            // $data->sal_project_id->handled_by= $data->provider_id;

            //project is in excution
            if ($data->save() && $data->sal_project_id->save()) {
                // return response($data);
                return redirect()->back()->with(['success' => 'تم العملية بنجاح']);
            } else {
                return redirect()->back()->with(['error' => 'فشلت العملية']);
            }
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $offer_id)
    {
        Validator::validate($request->all(), [

            'price' => ['required', 'numeric'],
            'duration' => ['required', 'numeric'],
            'description' =>  array(
                'required',
            ),


        ], [

            'price.required' => 'يجب ادخال السعر ',
            'price.numeric' => 'يجب ادخال رقم ',
            'duration.required' => 'يجب ادخال المدة ',
            'duration.numeric' => 'يجب ادخال رقم ',
            'description.required' => 'يجب أدخال وصف المشروع ',
            // 'description.regex'=>'يجب ألا يحتوي على أرقام أو رموز فقط   ',

        ]);
        $model = Offer::find($offer_id);
        $model->price = $request->price;
        $website_precentage = $model->price / 10;
        $model->net_price = $model->price - $website_precentage;
        $model->duration = $request->duration;
        // if($request->input('description')){
        $model->description = $request->description;
        // }
        if ($model->save()) {

            if ($request->hasFile('files')) {
                UserAttachment::where('attach_id', $offer_id)
                    ->where('attach_type', '2')->delete();
                if ($request->hasFile('files')) {
                    foreach ($request->file('files') as $file) {
                        $Attachments = new UserAttachment;
                        $Attachments->attach_id = $model->id;
                        $Attachments->attach_type = '2';
                        $fileNme = time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('images'), $fileNme);
                        $Attachments->file_name = $fileNme;
                        $Attachments->file_type = $file->getClientOriginalExtension();
                        $Attachments->user_id = $model->provider_id;
                        $Attachments->save();
                    }
                }
                return redirect()->back()->with(['success' => 'تم تعديل البيانات بنجاح']);
            } else {
                return redirect()->back()->with(['error' => 'لم يتم تعديل البيانات ']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // public function acceptOffer(Request $request)
    // {
    //     //check if the user is the project owner
    //     // and is   and the status of the offer is acceptOffer $offer->status==1

    //     $offer = Offer::with(['sal_project_id'])->where('id', $request->offer_id)->first();
    //     if ($offer != null) {
    //         if ($offer->sal_project_id->user_id == Auth::user()->id &&  $offer->sal_project_id->status == 1 && $offer->status == 1) {
    //             $offer->status = 2;
    //             $offer->sal_project_id->status = 4;
    //             // $offer->sal_project_id->handled_by=$offer->provider_id;
    //             // && $offer->sal_project_id->save()
    //             if ($offer->save() && $offer->sal_project_id->save()) {
    //                 // return response($offer);
    //                 return redirect()->back()->with(['success' => 'تم تعديل البيانات بنجاح']);
    //             } else {
    //                 return redirect()->back()->with(['error' => 'لم يتم تعديل البيانات ']);
    //             }
    //         } else {
    //             return response(['error' => true, 'offer-msg' => 'offer has been cancel'], 404);
    //         }
    //     } else {
    //         return response(['error' => true, 'no offer ' => 'Not found'], 404);
    //     }
    // }
}
