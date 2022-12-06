<?php

namespace App\Http\Controllers;

use App\Models\Arbeiten;
use Illuminate\Http\Request;

class ArbeitenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arbeiten = Arbeiten::all(['id','ort','strasse','arbeitsbereiche','notfallnummer','ansprechpartner1_id','ansprechpartner2_id']);
        return response()->json($arbeiten);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arbeiten = Arbeiten::create($request -> post());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arbeiten  $arbeiten
     * @return \Illuminate\Http\Response
     */
    public function show(Arbeiten $arbeiten)
    {
        return response()->json($arbeiten);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arbeiten  $arbeiten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arbeiten $arbeiten)
    {
        $arbeiten->fill($request->post())->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arbeiten  $arbeiten
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arbeiten $arbeiten)
    {
        $arbeiten->delete();
    }
}
