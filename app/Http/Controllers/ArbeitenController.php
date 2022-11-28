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
     * @param  \App\Models\Arbeiten  $arbeiten
     * @return \Illuminate\Http\Response
     */
    public function show(Arbeiten $arbeiten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arbeiten  $arbeiten
     * @return \Illuminate\Http\Response
     */
    public function edit(Arbeiten $arbeiten)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arbeiten  $arbeiten
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arbeiten $arbeiten)
    {
        //
    }
}
