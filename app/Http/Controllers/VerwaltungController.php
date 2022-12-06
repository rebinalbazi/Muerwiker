<?php

namespace App\Http\Controllers;

use App\Models\Verwaltung;
use Illuminate\Http\Request;

class VerwaltungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verwaltung = Verwaltung::all(['id','iconPath','bereich','notfallnummer','ansprechpartner1_id','ansprechpartner2_id']);
        return response()->json($verwaltung);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $verwaltung = Verwaltung::create($request -> post());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Verwaltung  $verwaltung
     * @return \Illuminate\Http\Response
     */
    public function show(Verwaltung $verwaltung)
    {
        return response()->json($verwaltung);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Verwaltung  $verwaltung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Verwaltung $verwaltung)
    {
        $verwaltung->fill($request->post())->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Verwaltung  $verwaltung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verwaltung $verwaltung)
    {
        $verwaltung->delete();
    }
}
