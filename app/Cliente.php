<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    public function facturas(){
        return $this->hasMany('App\Factura', 'id_cliente');
    }

}
