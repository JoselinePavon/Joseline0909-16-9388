@extends('layouts.index')



@section('contenido')
    <div class="container ml-5">
        <div class="row justify-content-center">
            <div class="col-md-10 ml-5">
                <h2 class="text-center mt-5">LENGUAJES REGISTRADOS</h2>

                <!-- Boton de registro -->
                <a class="btn btn-outline-success mb-3" href="{{url('/lenguaje/crear')}}"><i class="fas fa-plus-square"></i> Registrar Lenguaje</a>

                <table class="table table-light table-bordered table-hover text-center">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>

                    <tbody class="">
                    @foreach($lenguajes as $lenguaje)
                        <tr>
                            <td>{{$lenguaje->id}}</td>
                            <td>{{$lenguaje->descripcion_lenguaje}}</td>
                            <td>
                                <div>
                                    <a href="{{url('/lenguaje/editlenguaje', $lenguaje->id)}}">
                                        <i class="fas fa-pencil-alt btn btn-outline-primary mb-2 mr-2"></i>
                                    </a>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
                <!-- Paginacion -->
                {{ $lenguajes->links() }}

            </div>
        </div>
    </div>
@endsection
