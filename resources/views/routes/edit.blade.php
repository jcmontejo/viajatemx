@extends('layouts.app')
@section('title')
Editar Ruta
@endsection
@section('page-header')
Rutas
@endsection
@section('page-header-one')
Rutas
@endsection
@section('page-header-two')
Editar
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('layouts.messages')
                <h4 class="card-title">Editar Ruta</h4>
                <form class="forms-sample" method="POST" action="{{url('/admin/rutas/update')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nombre</label>
                    <input type="text" name="name" value="{{ $route->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            id="exampleInputUsername1" required>
                            <input type="hidden" name="id" value="{{$route->id}}">
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
