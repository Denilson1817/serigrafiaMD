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
	public function catalogo()
	{
	    return $this->belongsTo(Catalogo::class, 'ID_Catalago');
	}
	public function disenoColor()
    {
        return $this->hasOne(Diseno_color::class, 'IDDiseno');
    }
	public function disenoDimension()
    {
        return $this->hasOne(Diseno_dimension::class, 'IDDiseno');
    }
}
