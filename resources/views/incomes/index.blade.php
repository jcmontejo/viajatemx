@extends('layouts.app')
@section('title')
Ingresos
@endsection
@section('page-header')
Ingresos
@endsection
@section('page-header-one')
Ingresos
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
                    <table class="table table-hover" id="incomes">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>Fecha Ingreso</th>
                                <th>Importe</th>
                                <th>Concepto</th>
                                <th>Venta</th>
                                {{-- <th>Acciones</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($incomes as $item)
                            @php
                            $sale = App\Sale::find($item->sale_id);
                            @endphp
                            <tr>
                                <td>{{$item->date}}</td>
                                <td>{{$item->ammount}}</td>
                                <td>{{$item->concept}}</td>
                                <td>
                                    {{$sale->client}},{{$sale->date}},{{$sale->destination}}
                                </td>
                                {{-- <td>
                                    <a class="btn btn-info btn-xs" href="{{url('/admin/tarjetas/editar', $item['id'])}}"><i
                                            class="mdi mdi-tooltip-edit"></i>
                                        Editar</a>
                                    <button type="button" data-toggle="modal" data-target="#confirmDeleteModal-{{ $item->id }}"
                                        class="btn btn-danger btn-xs"><i class="mdi mdi-delete"></i> Eliminar</button>
                                    <!-- Modal (Confirm Delete) -->
                                    <div class="modal fade" id="confirmDeleteModal-{{ $item->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Confirmar eliminación</h4>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Seguro de eliminar el registro de &lsquo;{{
                                                    $item->name_bank}}&rsquo;?
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="GET" action="{{ route('tarjetas.destroy',$item->id) }}">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                        <input type="submit" name="submit" value="Eliminar" class='btn btn-danger'>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td> --}}
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
        $('#incomes').DataTable({
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
