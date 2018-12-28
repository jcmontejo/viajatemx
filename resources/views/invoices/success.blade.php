@extends('layouts.app')
@section('title')
Facturas Expedidas
@endsection
@section('page-header')
Facturación
@endsection
@section('page-header-one')
Facturación
@endsection
@section('page-header-two')
Expedidas
@endsection
@section('content')
@if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('message') }}
</div>
@endif

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('layouts.messages')
                <div class="table-responsive">
                    <table class="table table-hover" id="providers">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>Número de Factura</th>
                                <th>Número Fiscal</th>
                                <th>Cliente</th>
                                <th>Razón Social</th>
                                <th>RFC</th>
                                <th>Concepto</th>
                                <th>Fecha</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $item)
                            <tr>
                                <td>{{$item->number_invoice}}</td>
                                <td>{{$item->fiscal_number}}</td>
                                <td>{{$item->client}}</td>
                                <td>{{$item->business_name}}</td>
                                <td>{{$item->rfc}}</td>
                                <td>{{$item->concept}}</td>
                                <td>{{$item->date}}</td>
                                <td>${{number_format($item->ammount)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#providers').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    className: 'btn btn-info btn-rounded mdi mdi-file-excel'
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-info btn-rounded mdi mdi-file-pdf'
                }
            ]
        });
    });

</script>
@endsection
