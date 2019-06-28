<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

use App\Http\Controllers\Controller;
use Validator;
use App\Models\Asistente;

class RegistroController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parametros = $request->all();

        $registros = Asistente::select('asistentes.*','municipios.nombre as municipio','regiones.nombre as region','puestos.descripcion as puesto')
                                ->leftjoin('municipios','municipios.id','=','asistentes.municipio_id')
                                ->leftjoin('regiones','regiones.id','=','asistentes.region_id')
                                ->leftjoin('puestos','puestos.id','=','asistentes.puesto_id');

        if($parametros['buscar']){
            $registros = $registros->where(function($query) use ($parametros){
                $query = $query->where('asistentes.nombre','like','%'.$parametros['buscar'].'%')
                                ->orWhere('email','like','%'.$parametros['buscar'].'%')
                                ->orWhere('otro_puesto','like','%'.$parametros['buscar'].'%')
                                ->orWhere('municipios.nombre','like','%'.$parametros['buscar'].'%');
            });
        }

        if($parametros['tipo_asistente']){
            $registros = $registros->where('tipo_asistente',$parametros['tipo_asistente']);
        }

        if($parametros['puesto_id']){
            $registros = $registros->where('puesto_id',$parametros['puesto_id']);
        }

        if($parametros['region_id']){
            $registros = $registros->where('asistentes.region_id',$parametros['region_id']);
        }

        if(isset($parametros['page'])){
            $resultadosPorPagina = isset($parametros["per_page"])? $parametros["per_page"] : 25;
            $registros = $registros->paginate($resultadosPorPagina);
        } else {
            $registros = $registros->get();
        }

        return response()->json(['paginado'=>$registros], HttpResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'tipo_asistente' => 'required',
            'nombre' => 'required|max:255',
            'puesto_id' => 'required_if:tipo_asistente,"ayuntamiento"',
            'otro_puesto' => 'required_if:puesto_id,999|required_unless:tipo_asistente,"ayuntamiento"',
            //'telefono_oficina' => 'required',
            //'telefono_celular' => 'required',
            'email' => 'nullable|email',
            'region_id' => 'required',
            'municipio_id' => 'required_if:tipo_asistente,"ayuntamiento"'
        ];

        $mensajes = [
            'tipo_asistente.required' => 'El tipo es requerido',
            'nombre.required' => 'El nombre es requerido',
            'puesto_id.required_if' => 'El puesto es requerido',
            'otro_puesto.required_unless' => 'El puesto es requerido',
            'otro_puesto.required_if' => 'El puesto es requerido',
            //'telefono_oficina.required' => 'El telefono de oficina es requerido',
            //'telefono_celular.required' => 'El telefono celular es requerido',
            'email.email' => 'El correo electronico no tiene el formato correcto',
            //'email.required' => 'El correo electronico es requerido',
            'region_id.required' => 'La region es requerida',
            'municipio_id.required_if' => 'El municipio es requerido',
        ];

        $inputs = $request->all();

        $resultado = Validator::make($inputs,$reglas,$mensajes);

        if($resultado->passes()){
            Asistente::create($inputs);
            return response()->json(['mensaje' => 'Guardado', 'validacion'=>$resultado->passes(), 'datos'=>$inputs], HttpResponse::HTTP_OK);
        }else{
            return response()->json(['mensaje' => 'Error en los datos del formulario', 'validacion'=>$resultado->passes(), 'errores'=>$resultado->errors()], HttpResponse::HTTP_OK);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $asistente = Asistente::find($id);

        $asistente->asistencia = true;
        $asistente->save();

        return response()->json(['registro'=>$asistente,'mensaje'=>'exito'],HttpResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
