@extends('layouts.app')
@section('title')
Inicio
@endsection
@section('page-header-one')
Panel de Control
@endsection
@section('page-header-two')
Inicio
@endsection
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-home"></i>
        </span>
        Panel de control
    </h3>
</div>
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Ventas del mes
                    <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">$ {{number_format($sales->sum('commission_price'))}}</h2>
                {{-- <h6 class="card-text">Increased by 60%</h6> --}}
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Solicitudes del mes
                    <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">{{$quotations->count()}}</h2>
                {{-- <h6 class="card-text">Decreased by 10%</h6> --}}
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Clientes del mes
                    <i class="mdi mdi-diamond mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">{{$clients->count()}}</h2>
                {{-- <h6 class="card-text">Increased by 5%</h6> --}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Calendario de salidas Y cumpleaños del mes</h4>
                {!! $calendar->calendar() !!}
            </div>
        </div>
    </div>
    <div class="col-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ingresos / Gastos globales</h4>
                {!! $chartjs->render() !!}
            </div>
        </div>
    </div>
</div>
@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->calendar() !!}
{!! $calendar->script() !!}
@endsection
@endsection
