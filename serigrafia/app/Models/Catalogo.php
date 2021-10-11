<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;
    protected $fillable = [
		'Nombre',
		'Categoria',
		'Estado'
	];
	public function disenos()
    {
		return $this->hasMany(Diseno::class, 'ID_Catalago');
	}
}
