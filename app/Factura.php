<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'facturas';

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }
    public function fabrica(){
        return $this->belongsTo('App\Fabrica');
    }
}
