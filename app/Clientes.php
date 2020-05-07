<?php

namespace App;

use Illuminate\Database\Eloquent\Model; //extensão para integrar o banco de dados a este model (?)

class Clientes extends Model {
    protected $table = 'clientes';
    public $timestamps = false;

    public function clientesLista() {
        return $this->belongsTo('App\Reservas', 'cliente_id', 'id');
    }
}