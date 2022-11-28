<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('wohnen', \App\Http\Controllers\WohnenController::class)->only(['index','store']);
Route::resource('arbeiten', \App\Http\Controllers\ArbeitenController::class)->only(['index','store']);
Route::resource('ansprechpartner', \App\Http\Controllers\AnsprechpartnerController::class)->only(['index','store']);
Route::resource('tagesstaette', \App\Http\Controllers\TagesstaetteController::class)->only(['index','store']);
Route::resource('verwaltung', \App\Http\Controllers\VerwaltungController::class)->only(['index','store']);
Route::resource('sonstige', \App\Http\Controllers\SonstigeController::class)->only(['index','store']);