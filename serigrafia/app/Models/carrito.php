<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class carrito extends Model
{
    use HasFactory;
    

    protected $fillable = [
		'cliente_id',
        'producto_id',
        'cantidad'
        
	];
    
    public function role(){
               
        return $this->belongsToMany(carrito::class);
    }

    

    

    

}
