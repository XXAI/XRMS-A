<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
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
    public function index()
    {
        //
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
            'email' => 'nullable|email',
        ];

        $mensajes = [
            'tipo_asistente.required' => 'El tipo es requerido',
            'nombre.required' => 'El nombre es requerido',
            'email.email' => 'El correo electronico no tiene el formato correcto',
        ];

        $inputs = $request->all();

        $resultado = Validator::make($inputs,$reglas,$mensajes);

        if($resultado->passes()){

            Asistente::create($inputs);
            return response()->json(['mensaje' => 'Guardado', 'validacion'=>$resultado->passes(), 'datos'=>$inputs]);
        }else{
            return response()->json(['mensaje' => 'Error en los datos del formulario', 'validacion'=>$resultado->passes(), 'errores'=>$resultado->errors()]);
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
        //
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
