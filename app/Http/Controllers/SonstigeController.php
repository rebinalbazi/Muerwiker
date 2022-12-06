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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sonstige = Sonstige::create($request -> post());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sonstige  $sonstige
     * @return \Illuminate\Http\Response
     */
    public function show(Sonstige $sonstige)
    {
        return response()->json($sonstige);
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
        $sonstige->fill($request->post())->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sonstige  $sonstige
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sonstige $sonstige)
    {
        $sonstige->delete();
    }
}
