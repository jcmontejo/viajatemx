@extends('layouts.app')
@section('title')
Crear Proveedor
@endsection
@section('page-header')
Proveedores
@endsection
@section('page-header-one')
Proveedores
@endsection
@section('page-header-two')
Crear
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('layouts.messages')
                <h4 class="card-title">Crear Proveedor</h4>
                <form class="forms-sample" method="POST" action="{{url('/proveedores/guardar')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nombre</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            id="exampleInputUsername1" placeholder="Nombre de proveedor" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contacto</label>
                        <input type="text" name="contact" value="{{ old('contact') }}" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" placeholder="Introduce nombre de contacto" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo Electrónico</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" placeholder="EJ. maría@viajate.mx" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Teléfono</label>
                        <input type="text" name="phone" class="form-control" id="exampleInputPassword1"
                            placeholder="Teléfono de contacto" required>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
