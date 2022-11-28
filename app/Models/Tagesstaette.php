<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagesstaette extends Model
{
    use HasFactory;

    protected $fillable = ['ort','notfallnummer','ansprechpartner1_id','ansprechpartner2_id'];
}
