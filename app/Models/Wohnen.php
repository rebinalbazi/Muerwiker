<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wohnen extends Model
{
    use HasFactory;

    protected $fillable = ['ort','strasse','imagePath','notfallnummer','ansprechpartner1_id','ansprechpartner2_id'];
}
