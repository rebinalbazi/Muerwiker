<?php

namespace App\Http\Controllers;

use App\Models\Sonstige;
use Illuminate\Http\Request;

class SonstigeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sonstige = Sonstige::all(['id','iconPath','bereich','notfallnummer','ansprechpartner1_id','ansprechpartner2_id']);
        return response()->json($sonstige);
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
     * @param  \App\Models\Sonstige  $sonstige
     * @return \Illuminate\Http\Response
     */
    public function show(Sonstige $sonstige)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sonstige  $sonstige
     * @return \Illuminate\Http\Response
     */
    public function edit(Sonstige $sonstige)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sonstige  $sonstige
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sonstige $sonstige)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sonstige  $sonstige
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sonstige $sonstige)
    {
        //
    }
}
