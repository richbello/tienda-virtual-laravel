<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'fecha_pedido',
        'estado',
        'total',
    ];

    // Relación: Un pedido pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relación: Un pedido tiene muchos detalles
    public function detalles()
    {
        return $this->hasMany(DetallePedido::class);
    }

    // Relación: Un pedido tiene un pago
    public function pago()
    {
        return $this->hasOne(Pago::class);
    }
}
