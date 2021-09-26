<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diseno_color extends Model
{
    use HasFactory;
    protected $fillable = [
		'IDDiseno',
		'Color'
	];
}
