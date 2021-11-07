<?php

namespace App\Http\Controllers;

use App\Models\Lenguaje;
use Illuminate\Http\Request;

class LenguajeController extends Controller
{
    //registro del lenguaje
    public function crear(){

        return view('lenguaje.crear');
    }

    //Guardar Lenguaje
    public function save(Request $request){

        $validator = $this->validate($request, [
            'descripcion_leng'=> 'required|unique:App\Models\Lenguaje,descripcion_lenguaje|string|max:45',
        ]);

        Lenguaje::create([
            'descripcion_lenguaje'=>$validator['descripcion_leng']
        ]);

        return redirect('/lenguaje/listado')->with('guardar', 'ok');
    }

    //Listado de lenguajes
    public function listado(){
        $lenguaje['lenguajes'] = Lenguaje::paginate(6);

        return view('lenguaje.listado', $lenguaje);
    }

    //Guardar lenguajes
    public function guardar($id){
        $lenguajes = Lenguaje::findOrFail($id);

        return view('lenguaje.editLenguaje', compact( 'lenguajes'));
    }

    //Edicion de lenguajes
    public function editlenguaje(Request $request, $id){
        $dataLeng = request()->except((['_token','_method']));
        Lenguaje::where('id', '=', $id)->update($dataLeng);

        return redirect('/lenguaje/editlenguaje')->with('editar', 'ok');
    }

    //Delete lenguajes
    public function delete($id){
        Lenguaje::destroy($id);

        return back()->with('eliminar', 'ok');
    }
}
