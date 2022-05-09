<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class offersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $offers = Offer::all();
        return view('Admin.offers.offers', compact('offers','offers'));
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
     * @param  \App\Models\offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offers)
    {
        //
    }
}
