@extends('layouts.app')
@section('title')
Editar Proveedor
@endsection
@section('page-header')
Proveedores
@endsection
@section('page-header-one')
Proveedores
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
                <h4 class="card-title">Editar Proveedor</h4>
                <form class="forms-sample" method="POST" action="{{url('/admin/proveedores/update')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nombre</label>
                    <input type="text" name="name" value="{{ $provider->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            id="exampleInputUsername1" required>
                            <input type="hidden" name="id" value="{{$provider->id}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contacto</label>
                        <input type="text" name="contact" value="{{ $provider->contact }}" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo Electrónico</label>
                    <input type="email" name="email" value="{{ $provider->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Teléfono</label>
                    <input type="text" name="phone" value="{{ $provider->phone }}" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
