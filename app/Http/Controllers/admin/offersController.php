<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class offersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.Offers.index');
        
    }

    public function offer_upon_status($status)
    {   
        return view('admin.pages.Offers.index',['data'=>Offer::where('status',$status)->get()]);
    }

    public function search(Request $request)
    {
        Validator::validate($request->all(),[

            'value' => 'required',

         ],[
            'value.required' => 'يجب ادخال قيمه للبحث بشكل صحيح كأسم او رقم او ايميل   .',
         ]);
            $search=Offer::query()
            ->orWhere('price', 'LIKE', "%{$request->value}%")
            ->orWhere('description', 'LIKE', "%{$request->value}%")
            ->orWhere('id', 'LIKE', "%{$request->value}%")
            ->get();
            return view('admin.pages.Offers.index',['data'=>$search]);

    }


    public function blockOfferByAdmin($proId,$status)
    {
        $user = Offer::where('id',$proId)->update(['status'=>$status]);
         // redirect
         return back()->with('success','offer data successfully updated.');

    }

    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
