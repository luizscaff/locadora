<?php

namespace App;

use Illuminate\Database\Eloquent\Model; //extensão para integrar o banco de dados a este model (?)

class Reservas extends Model {
    protected $table = 'reservas';
    public $timestamps = false;
    
    public function carroReserva() {
        return $this->hasOne('App\Carros', 'id', 'carro_id');
    }
    public function clienteReserva() {
        return $this->hasOne('App\Clientes', 'id', 'cliente_id');
    }
}