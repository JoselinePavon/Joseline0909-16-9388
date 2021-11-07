<?php

namespace App\Http\Controllers;

use App\Models\Moneda;
use Illuminate\Http\Request;

class MonedaController extends Controller
{
    //registro de criptomoneda
    public function registro()
    {

        return view('moneda.registro');
    }

    //Guardar datos
    public function save(Request $request)
    {
        $validation = $this->validate($request, [
            'logotipo' => 'required',
            'nombre' => 'required|string|max:45',
            'precio' => 'required',
            'descripcion' => 'required|string|max:200',
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
        ]);

        return back()->with('criptomonedaGuardado', "Criptomoneda Guardada");
    }
}
