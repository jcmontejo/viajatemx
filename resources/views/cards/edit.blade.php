@extends('layouts.app')
@section('title')
Editar Tarjeta
@endsection
@section('page-header')
Tarjetas
@endsection
@section('page-header-one')
Tarjetas
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
                <h4 class="card-title">Editar Tarjeta</h4>
                <form class="forms-sample" method="POST" action="{{url('/admin/tarjetas/update')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nombre Cuenta</label>
                        <input type="text" name="name_bank" value="{{ $card->name_bank }}" class="form-control{{ $errors->has('name_bank') ? ' is-invalid' : '' }}"
                            id="exampleInputUsername1" placeholder="Nombre de Banco" required>
                             <input type="hidden" name="id" value="{{$card->id}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alias</label>
                        <input type="text" name="name_account" value="{{ $card->name_account }}" class="form-control{{ $errors->has('name_account') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" placeholder="Introduce nombre de Cuenta" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Clave Interbancaria</label>
                        <input type="text" name="key" value="{{ $card->key }}" class="form-control{{ $errors->has('key') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" placeholder="No. 143-180-000-013-587-821" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Número de Cuenta</label>
                        <input type="text" name="account_number" value="{{ $card->account_number }}" class="form-control{{ $errors->has('account_number') ? ' is-invalid' : '' }}" id="exampleInputPassword1"
                            placeholder="No. 00001358782" required>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
