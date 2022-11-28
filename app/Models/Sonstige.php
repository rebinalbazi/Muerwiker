<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sonstige extends Model
{
    use HasFactory;

    protected $fillable = ['bereich','iconPath','notfallnummer','ansprechpartner1_id','ansprechpartner2_id'];
}
