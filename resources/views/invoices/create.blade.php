@extends('layouts.app')
@section('title')
Crear Factura
@endsection
@section('page-header')
Facturación
@endsection
@section('page-header-one')
Facturación
@endsection
@section('page-header-two')
Crear Factura
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('layouts.messages')
                <h4 class="card-title">Generar Factura</h4>
                <form class="forms-sample" method="POST" action="{{url('/guardar/factura')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Número de Factura</label>
                        <input type="text" name="number_invoice" value="{{ old('number_invoice') }}" class="form-control{{ $errors->has('number_invoice') ? ' is-invalid' : '' }}"
                            id="exampleInputUsername1" required placeholder="Número de Factura">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Número Fiscal</label>
                        <input type="text" name="fiscal_number" value="{{ old('fiscal_number') }}" class="form-control{{ $errors->has('fiscal_number') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required placeholder="Número Fiscal">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cliente</label>
                        <input type="text" name="client" value="{{ $client->name }}" class="form-control{{ $errors->has('client') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Razón Social</label>
                        <input type="text" name="business_name" value="{{ old('business_name') }}" class="form-control{{ $errors->has('business_name') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required placeholder="Introduce Razón Social">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">RFC</label>
                        <input type="text" name="rfc" value="{{ old('rfc') }}" class="form-control{{ $errors->has('rfc') ? ' is-invalid' : '' }}"
                            id="exampleInputPassword1" placeholder="Introduce Datos Fiscales">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Concepto</label>
                        <input type="text" name="concept" value="{{ old('concept') }}" class="form-control{{ $errors->has('concept') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required placeholder="Introduce Concepto">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fecha</label>
                        <input type="date" name="date" value="{{ old('date') }}" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Monto</label>
                        <input type="number" name="ammount" value="{{ $sale->paid_out }}" class="form-control{{ $errors->has('ammount') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Estatus</label>
                        <select name="status" id="" class="form-control">
                            <option value="PAGADA">EXPEDIDA</option>
                            <option value="PENDIENTE">PENDIENTE</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fecha de Pago</label>
                        <input type="date" name="payment_date" value="{{ old('payment_date') }}" class="form-control{{ $errors->has('payment_date') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Observaciones</label>
                        <input type="text" name="observations" value="{{ old('observations') }}" class="form-control{{ $errors->has('observations') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Comisión de Proveedor</label>
                        <input type="number" name="commission_provider" value="{{ old('commission_provider') }}" class="form-control{{ $errors->has('commission_provider') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1">
                    </div>
                    {{-- Hidden elements --}}
                    <input type="hidden" name="sale_id" value="{{$sale->id}}">
                    <button type="submit" class="btn btn-gradient-primary mr-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
