<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diseno extends Model
{
    use HasFactory;
    protected $fillable = [
		'Textura',
		'Foto',
		'Estado',
		'ID_Catalago'
		
	];
}
