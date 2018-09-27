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
                {{-- <p class="card-description float-right">
                    <a class="btn btn-gradient-success btn-rounded btn-lg" href="{{url('/admin/tarjetas/crear')}}" role="button"><i
                            class="mdi mdi-account-plus"></i>&nbsp;
                        Nueva Tarjeta</a>
                </p> --}}
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
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });
    });

</script>
@endsection
