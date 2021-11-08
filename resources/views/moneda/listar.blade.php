@extends('layouts.index')


@section('contenido')
    <div class="container ml-5">
        <div class="row justify-content-center">
            <div class="col-md-10 ml-5">
                <h2 class="text-center mt-5" style="color: #CD5C5C" >LIBRO</h2>


            <br>
                <table class="table table-light table-bordered table-hover text-center">
                    <thead style="background-color: #E9967A">
                    <tr style="color:white">
                        <th>Logotipo</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripcion</th>
                        <th>Lenguaje</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>

                    <tbody class="" style="color: lightseagreen">
                    @foreach($coins as $coin)
                        <tr>
                            <td>
                                <img src="{{ asset('storage').'/'.$coin->logotipo}}" alt="" height="80">
                            </td>
                            <td>{{$coin->nombre}}</td>
                            <td>$ {{$coin->precio}}</td>
                            <td>{{$coin->descripcion}}</td>
                            <td>{{$coin->descripcion_lenguaje}}</td>


                            <td >
                                <div class="btn-group">
                                <!--BOTON DE EDITAR-->
                                <a href="{{route('editlenguaje', $coin->id)}}" class="btn btn-primary mb-1">
                                    <i class=" fas fa-pencil-alt"></i>

                                </a>

                                <!--BOTON ELIMINAR-->
                                <form action="{{route('delete',$coin-> id)}}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Seguro que desea eliminar?');" class="btn btn-danger">

                                        <i class="fas fa-trash-alt"></i>
                                    </button>

                                </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>

                {{ $coins->links() }}

            </div>
        </div>
    </div>
@endsection
