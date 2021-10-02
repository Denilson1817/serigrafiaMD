<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoEliminado extends Model
{
    use HasFactory;
    protected $fillable = [
		'Razon',
        'Nombre',
		'IDCatalogo'
	];
}
