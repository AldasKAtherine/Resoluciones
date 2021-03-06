@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Nuevo Usuario</h3>

               
                    
                </div>

                <div class="card-body">
                    <div class="container">
                       @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <form action="/usuarios" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="name">Nombre</label>
                          <input type="text" class="form-control" name="name" placeholder="Escriba el nombre">
                        </div>
                        <div class="mb-3">
                          <label for="email">Email</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Escriba el email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror   
                        </div>
                        <div class="mb-3">
                            <label for="rol">Rol</label>
                            <select name="rol" class="form-control">
                                <option value="" selected disabled>Elija un rol</option>
                                @foreach ($roles as $rol)
                                    <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                                @endforeach
                            </select>
                          </div>
                        <div class="mb-3">
                            <label for="password">Contrase??a</label>
                            <input type="password" class="form-control" name="password" placeholder="Escriba la contrase??a">
                          </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <a href="/usuarios">
                            <button type="button" class="btn btn-danger">Cancelar</button>
                            </a>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
