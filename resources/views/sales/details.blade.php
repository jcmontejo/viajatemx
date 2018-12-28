@extends('layouts.app')
@section('title')
Detalles Venta
@endsection
@section('page-header')
Detalles Venta
@endsection
@section('page-header-one')
Ventas
@endsection
@section('page-header-two')
Detalles
@endsection
@section('content')
<div class="row">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cliente</h4>
                <div class="media">
                    <i class="mdi mdi-account-check icon-md text-info d-flex align-self-center mr-3"></i>
                    <div class="media-body">
                        <p class="card-text">{{$sale->client}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">destino solicitado</h4>
                <div class="media">
                    <i class="mdi mdi-google-maps icon-md text-info d-flex align-self-center mr-3"></i>
                    <div class="media-body">
                        <p class="card-text">{{$sale->destination}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Fecha/Hora de Salida</h4>
                <div class="media">
                    <i class="mdi mdi-cellphone icon-md text-info d-flex align-self-end mr-3"></i>
                    <div class="media-body">
                        <p class="card-text">{{$sale->departure_date}} / {{$sale->schedule}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
