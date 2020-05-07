<?php

namespace App;

use Illuminate\Database\Eloquent\Model; //extensão para integrar o banco de dados a este model (?)

class Carros extends Model {
    protected $table = 'carros';
    public $timestamps = false;

    public function carrosLista() {
        return $this->hasOne('App\Reservas');
    }
}