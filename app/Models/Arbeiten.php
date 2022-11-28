<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arbeiten extends Model
{
    use HasFactory;

    protected $fillable = ['ort','strasse','arbeitsbereiche','notfallnummer','ansprechpartner1_id','ansprechpartner2_id'];
}
