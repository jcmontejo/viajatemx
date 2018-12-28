@extends('layouts.app')
@section('title')
Crear Cliente
@endsection
@section('page-header')
Clientes
@endsection
@section('page-header-one')
Clientes
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
                <h4 class="card-title">Crear Cliente</h4>
                <form class="forms-sample" method="POST" action="{{url('/admin/clientes/guardar')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Alias(*)</label>
                    <input type="text" name="brand" value="{{ old('brand') }}" class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}"
                            id="exampleInputUsername1" required placeholder="Alias de Cliente">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nombre Completo(*)</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            id="exampleInputUsername1" required placeholder="Nombre de Cliente">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                        <input type="date" name="birthdate" value="{{ old('birthdate') }}" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Teléfono de Contacto(*)</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required placeholder="xxx-xxxx-xxx">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo Electrónico(*)</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required placeholder="correo@dominio.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Datos Fiscales</label>
                    <input type="text" name="fiscal_data" value="{{ old('fiscal_data') }}" class="form-control{{ $errors->has('fiscal_data') ? ' is-invalid' : '' }}" id="exampleInputPassword1" placeholder="Introduce Datos Fiscales">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cuentas en Aerolíneas</label>
                    <input type="text" name="airline_accounts" value="{{ old('airline_accounts') }}" class="form-control{{ $errors->has('airline_accounts') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" placeholder="Introduce Cuentas en Aerolíneas">
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
