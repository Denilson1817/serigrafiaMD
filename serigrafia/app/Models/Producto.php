<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	use HasFactory;
	protected $fillable = [
		'Material',
		'Precio',
		'IDDiseno',
		'Nombre'
	];
	public function diseno()
	{
		return $this->belongsTo(Diseno::class, 'IDDiseno');
	}
}
