<?php

namespace App\Http\Controllers;

use App\Models\Tagesstaette;
use Illuminate\Http\Request;

class TagesstaetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagesstaette = Tagesstaette::all(['id','ort','notfallnummer','ansprechpartner1_id','ansprechpartner2_id']);
        return response()->json($tagesstaette);
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
     * @param  \App\Models\Tagesstaette  $tagesstaette
     * @return \Illuminate\Http\Response
     */
    public function show(Tagesstaette $tagesstaette)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tagesstaette  $tagesstaette
     * @return \Illuminate\Http\Response
     */
    public function edit(Tagesstaette $tagesstaette)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tagesstaette  $tagesstaette
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tagesstaette $tagesstaette)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tagesstaette  $tagesstaette
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tagesstaette $tagesstaette)
    {
        //
    }
}
