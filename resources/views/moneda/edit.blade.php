@extends('layouts.index')
@section('contenido')

    <div class="container ml-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5 ml-5">

                    <!--Mensaje Flash        -->
                    @if(session('usuarioModificado'))
                        <div class="alert alert-success">
                            {{ session('usuarioModificado') }}
                        </div>
                    @endif

                <!--validacion errores -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>@foreach($errors->all() as $errors)
                                    <li>{{$errors}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



                <br><br><br>
                <div class="card">
                    <form action="{{route('edit',$coin->id)}}"method="POST" style="background-color: #FFF8DC" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}

                        <div class="card-header text-center text-white" style="background-color: #E9967A">
                            <img src="{{ asset('storage').'/'.$coin->logotipo}}" height="80" style="border-radius: 50%">
                            <h4>MODIFICAR USUARIO</h4>
                        </div>

                        <div class="card-body">

                            <div class="row form-group">
                                <label for="" class="col-3">Logotipo</label>
                                <div class="custom-file col-md-8">
                                    <input type="file" name="logotipo" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile"> Subir Logotipo </label>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-3">Nombre</label>
                                <input type="text" name="nombre" class="form-control col-md-8" value="{{ $coin->nombre }}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-3">Preico</label>
                                <input type="text" name="precio" class="form-control col-md-8" value="{{ $coin->precio }}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-3">Descripcion</label>
                                <input type="text" name="descripcion" class="form-control col-md-8" value="{{ $coin->descripcion }}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-3">Lenguaje</label>
                                <select name="lenguaje_id" class="form-control col-md-8" value="{{ $coin->lenguaje }}">
                                    <option value="" class="text-center"> Seleccione el Lenguaje </option>

                                    @foreach( $lenguaje as $lenguajes)
                                        <option value="{{$lenguajes->id}}" class="text-center"> {{$lenguajes->descripcion_lenguaje}}  </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row form-group">
                                <button type="submit" class=" col-md-9 offset-2  btn btn-outline-success">Modificar</button>

                            </div>

                        </div>

                    </form>

                </div>
                <div>

                    <a class="btn btn-info btn-xs mt-5" href="{{ url('/') }}">&laquo Página Anterior</a>
                </div>
            </div>

        </div>
    </div>


    </div>
@endsection
