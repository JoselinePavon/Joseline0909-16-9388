<?php

namespace App\Http\Controllers;


use App\Models\lenguaje;
use App\Models\Moneda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MonedaController extends Controller
{
    //registro de criptomoneda
    public function registro()
    {


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
            $validation['logotipo'] = $request->file('logotipo')->store('logotipo', 'public');
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

    //Formulario para actualizar la criptomoneda
    public function editlenguaje($id){
        $coin = Moneda::findOrFail($id);
        $lenguaje= Lenguaje::all();

        return view('moneda.edit', compact('coin', 'lenguaje'));
    }

    //Edicion de Criptomoneda
    public function edit(Request $request, $id){
        $dataCoin = request()->except((['_token','_method']));

        /*datos y foto actualizar*/
        if($request->hasFile('logotipo')){
            $coin = Moneda::findOrFail($id);
            Storage::delete('public/'.$coin->logotipo);
            $dataCoin ['logotipo'] = $request-> file('logotipo')->store('logotipo','public');
        }

        Moneda::where('id', '=', $id)->update($dataCoin);


        return back()->with('¡Editado exitosamente!');
    }

    //Eliminar criptomoneda
    public function delete($id){

        {
            Moneda::destroy($id);
            return back()->with('Delete', '¡Criptomoneda Eliminada!');
        }



    }

}
