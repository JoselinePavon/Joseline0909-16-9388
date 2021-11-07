@extends('layouts.index')


@section('contenido')
    <div class="container ml-5">
        <div class="row justify-content-center">
            <div class="col-md-10 ml-5">
                <h2 class="text-center mt-5">LIBRO</h2>


            <br>
                <table class="table table-light table-bordered table-hover text-center">
                    <thead>
                    <tr>
                        <th>Logotipo</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripcion</th>
                        <th>Lenguaje</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>

                    <tbody class="">
                    @foreach($coins as $coin)
                        <tr>
                            <td>
                                <img src="{{ asset('storage').'/'.$coin->logotipo}}" alt="" height="80">
                            </td>
                            <td>{{$coin->nombre}}</td>
                            <td>$ {{$coin->precio}}</td>
                            <td>{{$coin->descripcion}}</td>
                            <td>{{$coin->descripcion_lenguaje}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{url('/edit', $coin->id)}}">
                                        <i class="fas fa-pencil-alt btn btn-outline-primary mb-2 mr-2"> Actualizar</i>
                                    </a>

                                </div>

                            </td>
                            <td>
                                <!--BOTON DE EDITAR-->
                                <a href="{{route('edit', $icon->id)}}" class="btn btn-primary mb-1">
                                    <i class=" fas fa-pencil-alt"></i>

                                </a>

                                <!--BOTON ELIMINAR-->
                                <form action="{{route('delete',$coin-> id)}}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Seguro que desea eliminar?');" class="btn btn-danger">

                                        <i class="fas fa-trash-alt"></i>
                                    </button>

                                </form>
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
