<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoFinanza;
use App\Models\Finanza;
use Illuminate\Support\Facades\Validator;

class FinanzasController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }
    public function listarFinanzas()
    {
        $Finanza = Finanza::get();
        return view('ample.lista', compact('Finanza'));
    }
    public function ingresarFinanzas()
    {
        $TipoFinanza = TipoFinanza::get();
        return view('ample.create', compact('TipoFinanza'));
    }

    public function guardar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipo_id'=> 'required|exists:tipo_finanzas,id',
            'valor'=> 'required|numeric',
            'fecha_ingreso'=> 'required|date'
        ]);
        if ($validator->fails()) {
            return redirect('ingresar-finanzas')->withErrors($validator)->withInput();
        }
        $Finanza = Finanza::get();
        if(isset($request->id) && $request->id != ''){ // viene del editar
            Finanza::where('id',$request->id)->update([
                'user_id' => '1',
                'tipo_id' => $request->tipo_id,
                'valor' => $request->valor,
                'fecha_ingreso' => $request->fecha_ingreso,
    
            ]);
            
        }else{
            Finanza::create([
                'user_id' => '1',
                'tipo_id' => $request->tipo_id,
                'valor' => $request->valor,
                'fecha_ingreso' => $request->fecha_ingreso,

            ]);
        }

        return redirect()->route('listarFinanzas', ['Finanza'=>$Finanza]);
    }
    public function editar($id)
    {
        $TipoFinanza = TipoFinanza::get();
        $old = Finanza::findOrFail($id);
        return view('ample.create', compact('TipoFinanza','old'));
    }

    public function eliminar($id)
    {
        Finanza::find($id)->delete();
        return response()->json(['msj' => 'ok']);

    }

}
