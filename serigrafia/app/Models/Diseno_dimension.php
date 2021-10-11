<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diseno_dimension extends Model
{
    use HasFactory;
    protected $fillable = [
		'IDDiseno',
        'DimensioY',
		'DimensioX'
	];
}
