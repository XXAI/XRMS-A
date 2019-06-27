<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Puesto, App\Models\Region;

class ListaAsistenciaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $datos = [
            'puestos' => Puesto::all(),
            'regiones' => Region::all()
        ];
        return view('lista', ['datos' => $datos]);
    }
}