<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabrica extends Model
{
    protected $table = 'fabricas';

    public function facturas(){
        return $this->hasMany('App\Factura');
    }
}
