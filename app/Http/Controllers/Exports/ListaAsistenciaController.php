<?php

namespace App\Http\Controllers\Exports;

use App\Models\Asistente;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ListaAsistenciaController implements FromView
{
    public function view(): View
    {
        $registros = Asistente::select('asistentes.*','puestos.descripcion as puesto')
                                ->leftjoin('puestos','puestos.id','=','asistentes.puesto_id')
                                ->where('asistencia',true)
                                ->get();
        
        return view('reportes.lista_asistencia', ['registros' => $registros]);
    }
}