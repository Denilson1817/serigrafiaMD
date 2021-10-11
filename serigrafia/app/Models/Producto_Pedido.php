<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto_Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'IDPedido',
        'PrecioTotal',
        'NumProductos',
        'IDproducto'

    ];
    public function producto()
	{
		return $this->belongsTo(Producto::class, 'IDproducto');
	}
    public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'IDPedido');
	}
}
