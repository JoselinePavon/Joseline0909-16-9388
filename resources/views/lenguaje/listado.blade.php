@extends('layouts.index')



@section('contenido')
    <div class="container ml-5">
        <div class="row justify-content-center">
            <div class="col-md-10 ml-5">
                <h2 class="text-center mt-5" style="color: #CD5C5C">LENGUAJES REGISTRADOS</h2>

               <br><br>
                <table class="table table-light table-bordered table-hover text-center" style="background-color: #FFF8DC">
                    <thead style="background-color: #E9967A">
                    <tr style="color: white">
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>

                    <tbody class="" style="color: lightseagreen">
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
