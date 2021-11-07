<?php

namespace App\Http\Controllers;

use app\Models\lenguaje;
use App\Models\Moneda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonedaController extends Controller
{
    //registro de criptomoneda
    public function registro()
    {

        return view('moneda.registro');
        $lenguaje = Lenguaje::all();
        return view('moneda.registro', compact('lenguaje'));
    }

    //Guardar datos
    public function save(Request $request)
    {
        $validation = $this->validate($request, [
            'logotipo' => 'required',
            'nombre' => 'required|string|max:45',
            'precio' => 'required',
            'descripcion' => 'required|string|max:200',
            'lenguaje' => 'required'
        ]);

        //Guardamos el logotipo
        if ($request->hasFile('logotipo')) {
            $validation['logotipo'] = $request->file('logotipo')->store('logos', 'public');
        }

        //Guardado en la tabla
        Moneda::create([
            'logotipo' => $validation['logotipo'],
            'nombre' => $validation['nombre'],
            'precio' => $validation['precio'],
            'descripcion' => $validation['descripcion'],
            'lenguaje_id' => $validation['lenguaje']
        ]);

        return back()->with('criptomonedaGuardado', "Criptomoneda Guardada");
    }

    //listar Criptomoneda
    public function listar(){
        $coins = DB::table('criptomoneda')

            ->join('lenguaje_programacion', 'criptomoneda.lenguaje_id', '=', 'lenguaje_programacion.id')
            ->select('criptomoneda.*', 'lenguaje_programacion.descripcion_lenguaje')
            ->paginate(4);


        return view('moneda.listar', compact('coins'));
    }
}
