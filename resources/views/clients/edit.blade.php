@extends('layouts.app')
@section('title')
Editar Cliente
@endsection
@section('page-header')
Clientes
@endsection
@section('page-header-one')
Clientes
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
                <h4 class="card-title">Editar Cliente</h4>
                <form class="forms-sample" method="POST" action="{{url('/admin/clientes/update')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nombre</label>
                    <input type="text" name="name" value="{{ $client->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            id="exampleInputUsername1" required>
                            <input type="hidden" name="id" value="{{$client->id}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                        <input type="date" name="birthdate" value="{{ $client->birthdate }}" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Teléfono de Contacto</label>
                        <input type="text" name="phone" value="{{ $client->phone }}" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo Electrónico</label>
                    <input type="email" name="email" value="{{ $client->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Datos Fiscales</label>
                    <input type="text" name="fiscal_data" value="{{ $client->fiscal_data }}" class="form-control{{ $errors->has('fiscal_data') ? ' is-invalid' : '' }}" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cuentas en Aerolíneas</label>
                    <input type="text" name="airline_accounts" value="{{ $client->airline_accounts }}" class="form-control{{ $errors->has('airline_accounts') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1">
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
