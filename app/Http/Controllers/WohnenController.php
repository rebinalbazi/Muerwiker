<?php

namespace App\Http\Controllers;

use App\Models\Wohnen;
use Illuminate\Http\Request;

class WohnenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wohnen = Wohnen::all(['id','ort','strasse','imagePath','notfallnummer','ansprechpartner1_id','ansprechpartner2_id']);
        return response()->json($wohnen);
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
     * @param  \App\Models\Wohnen  $wohnen
     * @return \Illuminate\Http\Response
     */
    public function show(Wohnen $wohnen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wohnen  $wohnen
     * @return \Illuminate\Http\Response
     */
    public function edit(Wohnen $wohnen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wohnen  $wohnen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wohnen $wohnen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wohnen  $wohnen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wohnen $wohnen)
    {
        //
    }
}
