@extends('layouts.app')
@section('title')
Ver Factura
@endsection
@section('page-header')
Ver Factura
@endsection
@section('page-header-one')
Fcaturación
@endsection
@section('page-header-two')
Ver
@endsection
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            Fecha de Facturación
                            <strong>{{$invoice->date}}</strong>
                            <span class="float-right"> <strong>Estatus:</strong> {{$invoice->status}}</span>

                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h6 class="mb-3">Cliente:</h6>
                                    <div>
                                        <strong>{{$invoice->client}}</strong>
                                    </div>
                                    <div>{{$invoice->business_name}}</div>
                                    <div>{{$invoice->rfc}}</div>
                                    <div>Email: {{$client->email}}</div>
                                    <div>Teléfono: {{$client->phone}}</div>
                                </div>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="center">No. Factura</th>
                                            <th>Concepto</th>
                                            <th>Descripción</th>
                                            <th class="right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="center">{{$invoice->number_invoice}}</td>
                                            <td class="left strong">{{$invoice->concept}}</td>
                                            <td class="left">{{$invoice->observations}}</td>
                                            <td class="right">${{number_format($invoice->ammount)}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
