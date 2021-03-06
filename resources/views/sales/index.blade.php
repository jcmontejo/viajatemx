@extends('layouts.app')
@section('style')
@endsection
@section('title')
Ventas
@endsection
@section('page-header')
Todas las Ventas
@endsection
@section('page-header-one')
Todas las Ventas
@endsection
@section('page-header-two')
Todas
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('layouts.messages')
                <div class="table-responsive">
                    <table class="table table-striped" id="sales">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>Fecha Venta</th>
                                <th>Proveedor</th>
                                <th>Cliente</th>
                                <th>Pasajero</th>
                                <th>Clave</th>
                                <th>Destino</th>
                                <th>Estatus de Pago</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $item)
                            @include('sales.modal-data')
                            <tr>
                                <td>{{$item->date}}</td>
                                <td>{{$item->provider}}</td>
                                <td>{{$item->client}}</td>
                                <td>{{$item->passenger}}</td>
                                <td>{{$item->key}}</td>
                                <td>{{$item->destination}}</td>
                                <td>{{$item->payment_status}}</td>
                                <td class="text-right sorting_1">
                                    <div class="btn-group">
                                        @can('ver_detalle_venta')
                                        <a href="" class="btn btn-xs btn-gradient-info mr-2 btn-icon-text" data-toggle="modal"
                                            data-target="#data_{{$item->id}}"><i class="mdi mdi-account-search btn-icon-append"></i>Detalles</a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
{{-- Toastr --}}
<script src="{{asset('/quoting/toastr.min.js')}}"></script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}", "{{Session::get('title')}}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}", "{{Session::get('title')}}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}", "{{Session::get('title')}}");
            break;
    }
    @endif

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sales').DataTable({
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
@endsection
