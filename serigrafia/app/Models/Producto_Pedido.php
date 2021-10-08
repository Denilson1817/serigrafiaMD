<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto_Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'IcioTotal',
        'NumProductos',
        'IDproductoDPedido',
        'Pre'

    ];
}
