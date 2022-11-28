<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verwaltung extends Model
{
    use HasFactory;

    protected $fillable = ['bereich','notfallnummer','ansprechpartner1_id','ansprechpartner2_id'];
}
