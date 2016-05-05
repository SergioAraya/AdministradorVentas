<?php

namespace App\Http\Controllers;

use App\Fabrica;
use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests;

class FabricaController extends Controller
{
    public function getAll(Request $request) {
        if(isset($request->nombrequery)){
            $fabricas = Fabrica::where('nombre', 'LIKE', '%'.$request->nombrequery.'%')
                ->orderBy('nombre', 'asc')->get();
        }else{
            $fabricas = Fabrica::orderBy('nombre', 'asc')->get();
        }

        return view('models/fabricas/fabricas', [
            'fabricas' => $fabricas
        ]);
    }
    public function getOne(Fabrica $fabrica){
        return view('models/fabricas/fabricas_individual', [
            'fabrica' => $fabrica
        ]);
    }
    public function editOne(Fabrica $fabrica, Request $request){
        $this->requestToCliente($request, $fabrica);
        $fabrica->save();

        return redirect('/fabricas');
    }
    public function deleteOne(Fabrica $fabrica){
        $fabrica->delete();

        return redirect('/fabricas');
    }

    public function crearVista() {
        return view('models/fabricas/fabricas_individual');
    }

    public function create(Request $request) {
        $fabrica = new Fabrica();
        $this->requestToCliente($request, $fabrica);
        $fabrica->save();
        return redirect('/fabricas');
    }
    
    private function requestToCliente(Request $request, Fabrica &$fabrica){

        $fabrica->nombre = $request->nombre;
        $fabrica->propietario = $request->propietario;
        $fabrica->dni = $request->dni;
        $fabrica->poblacion = $request->poblacion;
        $fabrica->codigo_postal = $request->codigo_postal;
        $fabrica->telefono = $request->telefono;
        $fabrica->comision = $request->comision;
        return $fabrica;

    }
}
