@extends('layouts.app')
@section('title')
Gastos
@endsection
@section('page-header')
Gastos
@endsection
@section('page-header-one')
Gastos
@endsection
@section('page-header-two')
Todos
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
                <p class="card-description float-right">
                    <a class="btn btn-gradient-success btn-rounded btn-lg" data-toggle="modal" data-target="#createExpense"
                        role="button"><i class="mdi mdi-check-all"></i>&nbsp;
                        Registrar Gasto</a>
                </p>
                @include('expenses.create')
                <div class="table-responsive">
                    <table class="table table-hover" id="expenses">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>Fecha Gasto</th>
                                <th>Importe</th>
                                <th>Concepto</th>
                                <th>Banco</th>
                                <th>Nombre de Cuenta</th>
                                <th>Número de Cuenta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $item)
                            <tr>
                                <td>{{$item->date}}</td>
                                <td>${{number_format($item->ammount,2)}}</td>
                                <td>{{$item->concept}}</td>
                                <td>{{$item->name_bank}}</td>
                                <td>{{$item->name_account}}</td>
                                <td>{{$item->account_number}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align:right">Total:</th>
                                <th colspan="5"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#expenses').DataTable({
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over all pages
                total = api
                    .column(1)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal = api
                    .column(1, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(1).footer()).html(
                    '$' + pageTotal + ' ( $' + total + ' total)'
                );
            },
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
