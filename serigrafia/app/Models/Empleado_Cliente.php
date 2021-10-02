<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado_Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'NumEmpleado',
        'IDCliente'
    ];
}
