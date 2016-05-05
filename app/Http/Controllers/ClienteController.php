<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests;

class ClienteController extends Controller
{
    public function getAll(Request $request) {
        if(isset($request->nombrequery)){
            $clientes = Cliente::where('nombre', 'LIKE', '%'.$request->nombrequery.'%')
                ->orderBy('nombre', 'asc')->get();
        }else{
            $clientes = Cliente::orderBy('nombre', 'asc')->get();
        }

        return view('models/clientes/clientes', [
            'clientes' => $clientes
        ]);
    }
    public function getOne(Cliente $cliente){
        return view('models/clientes/clientes_individual', [
            'cliente' => $cliente
        ]);
    }
    public function editOne(Cliente $cliente, Request $request){
        $this->requestToCliente($request, $cliente);
        $cliente->save();

        return redirect('/clientes');
    }
    public function deleteOne(Cliente $cliente){
        $cliente->delete();

        return redirect('/clientes');
    }

    public function crearVista() {
        return view('models/clientes/clientes_individual');
    }

    public function create(Request $request) {
        $cliente = new Cliente;
        $this->requestToCliente($request, $cliente);
        $cliente->save();
        return redirect('/clientes');
    }
    
    private function requestToCliente(Request $request, Cliente &$cliente){

        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->dni = $request->dni;
        $cliente->poblacion = $request->poblacion;
        $cliente->codigo_postal = $request->codigo_postal;
        $cliente->telefono = $request->telefono;
        return $cliente;

    }
}
