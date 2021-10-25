<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoCancelado extends Model
{
    use HasFactory;
    protected $fillable = [
        'IDPedido',
        'NombreCliente',
        'FechaRealizacion',
        'FechaEntrega',
        'Motivo'
    ];
}
