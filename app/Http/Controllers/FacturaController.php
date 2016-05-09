<?php

namespace App\Http\Controllers;

use App\Fabrica;
use App\Factura;
use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests;

class FacturaController extends Controller
{
    public function getAll(Request $request) {

        if(isset($request->facturas_no_pagadas)){
            $tipoPeticion = "facturas_no_pagadas";
            $facturas = Factura::where('pagado', false)->get();
        }else if(isset($request->facturas_pagadas)){
            $tipoPeticion = "facturas_pagadas";
            $facturas = Factura::where('pagado', true)->get();
        }else{
            $tipoPeticion = "facturas_total";
            $facturas = Factura::get();
        }

        $total = 0; $totalBeneficio = 0;
        foreach($facturas as $factura){
            $total += $factura->importe;
            $totalBeneficio += $factura->beneficio();
        }

        return view('models/facturas/facturas', [
            'tipoPeticion' => $tipoPeticion,
            'facturas' => $facturas,
            'total' => $total,
            'totalBeneficio' => $totalBeneficio
        ]);
    }

    public function getOne(Factura $factura){
        return view('models/facturas/facturas_individual', [
            'factura' => $factura,
            'clientes' => Cliente::orderBy('nombre', 'asc')->get(),
            'fabricas' => Fabrica::orderBy('nombre', 'asc')->get()
        ]);
    }
    public function editOne(Factura $factura, Request $request){
        $this->requestToCliente($request, $factura);
        $factura->save();

        return redirect('/facturas');
    }
    public function deleteOne(Factura $factura){
        $factura->delete();

        return redirect('/facturas');
    }

    public function crearVista() {
        return view('models/facturas/facturas_individual', [
            'clientes' => Cliente::orderBy('nombre', 'asc')->get(),
            'fabricas' => Fabrica::orderBy('nombre', 'asc')->get()
        ]);
    }

    public function create(Request $request) {
        $factura = new Factura();
        $this->requestToCliente($request, $factura);
        $factura->save();
        return redirect('/facturas');
    }

    private function requestToCliente(Request $request, Factura &$factura){
        $factura->cliente_id = $request->cliente_id;
        $factura->fabrica_id = $request->fabrica_id;
        $factura->importe = $request->importe;
        $factura->pagado = (isset($request->pagado) ? true : false);
        return $factura;

    }
}
