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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wohnen = Wohnen::create($request -> post());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wohnen  $wohnen
     * @return \Illuminate\Http\Response
     */
    public function show(Wohnen $wohnen)
    {
        return response()->json($wohnen);
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
        $wohnen->fill($request->post())->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wohnen  $wohnen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wohnen $wohnen)
    {
        $wohnen->delete();
    }
}
