<?php

namespace App\Http\Controllers;

use App\Models\Ansprechpartner;
use Illuminate\Http\Request;

class AnsprechpartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ansprechpartner = Ansprechpartner::all(['id','name','telefon','email','imagePath']);
        return response()->json($ansprechpartner);
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
     * @param  \App\Models\Ansprechpartner  $ansprechpartner
     * @return \Illuminate\Http\Response
     */
    public function show(Ansprechpartner $ansprechpartner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ansprechpartner  $ansprechpartner
     * @return \Illuminate\Http\Response
     */
    public function edit(Ansprechpartner $ansprechpartner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ansprechpartner  $ansprechpartner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ansprechpartner $ansprechpartner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ansprechpartner  $ansprechpartner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ansprechpartner $ansprechpartner)
    {
        //
    }
}
