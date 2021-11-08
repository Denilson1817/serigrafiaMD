<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado_Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'NumEmpleado',
        'IDCliente',
        'pedido_id'
    ];
    public function pedido()
    {
        return $this->hasOne(Pedido::class);
    }
    public function empleado()
    {
        return $this->hasOne(User::class, 'NumEmpleado');
    }
}
