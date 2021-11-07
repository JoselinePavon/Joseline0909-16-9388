<?php

namespace App\Http\Controllers;

use App\Models\Lenguaje;
use Illuminate\Http\Request;

class LenguajeController extends Controller
{
    //registro del lenguaje
    public function registrar(){

        return view('lenguaje.createLenguaje');
    }

    //Guardar Lenguaje
    public function save(Request $request){

        $validator = $this->validate($request, [
            'descripcion_leng'=> 'required|unique:App\Models\Lenguaje,descripcion_lenguaje|string|max:45',
        ]);

        Lenguaje::create([
            'descripcion_lenguaje'=>$validator['descripcion_leng']
        ]);

        return redirect('/lenguaje/read')->with('guardar', 'ok');
    }

    //Read Listado de lenguajes
    public function read(){
        $language['lenguajes'] = Lenguaje::paginate(7);

        return view('lenguaje.readLenguaje', $language);
    }

    //Guardar lenguajes
    public function updateForm($id){
        $lenguajes = Lenguaje::findOrFail($id);

        return view('lenguaje.updateLenguaje', compact( 'lenguajes'));
    }

    //Edicion de lenguajes
    public function edit(Request $request, $id){
        $dataLeng = request()->except((['_token','_method']));
        Lenguaje::where('id', '=', $id)->update($dataLeng);

        return redirect('/lenguaje/read')->with('editar', 'ok');
    }

    //Delete lenguajes
    public function delete($id){
        Lenguaje::destroy($id);

        return back()->with('eliminar', 'ok');
    }
}
