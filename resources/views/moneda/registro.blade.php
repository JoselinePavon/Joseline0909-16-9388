@extends('layouts.index')
@section('contenido')

    <div class="container ml-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5 ml-5">

                    <!--Mensaje Flash -->
                    @if(session('usuarioGuardado'))
                        <div class="alert alert-success">
                            {{ session('usuarioGuardado') }}
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
                    <form action="{{ url ('save') }}" method="POST" style="background-color: #FFF8DC" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="card-header text-center text-white"  style="background-color: #E9967A">
                            <h4>REGISTRAR CRIPTOMONEDA</h4>
                        </div>

                        <div class="card-body">

                            <div class="row form-group">

                                <label for="" class="col-3">Logotipo:</label>
                                <div class="custom-file col-md-8">
                                    <input type="file" name="logotipo" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile"> Subir Logotipo </label>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-3">Nombre:</label>
                                <input type="text" name="nombre" class="form-control col-md-8">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-3">Precio:</label>
                                <input type="text" name="precio" class="form-control col-md-8">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-3">Descripcion:</label>
                                <input type="text" name="descripcion" class="form-control col-md-8">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-3">Lenguaje Utilizado:</label>
                                <select name="lenguaje" class="form-control col-md-8" >
                                    <option value="" class="text-center"> Seleccione el Lenguaje </option>

                                    @foreach( $lenguaje as $lenguajes)
                                        <option value="{{$lenguajes->id}}" class="text-center"> {{$lenguajes->descripcion_lenguaje}}  </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row form-group">
                                <button type="submit" class="btn btn-outline-success col-md-4 offset-2 mr-3">Guardar</button>
                                <a class="btn btn-outline-danger btn-xs col-md-4" href=" {{ url('/') }}">Cancelar</a>
                            </div>

                        </div>

                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection

