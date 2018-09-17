@extends('layouts.app')
@section('style')
@endsection
@section('title')
Solicitudes
@endsection
@section('page-header')
Solicitudes
@endsection
@section('page-header-one')
Solicitudes
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
                    <table class="table table-striped" id="quotations">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Concepto</th>
                                <th>Destino</th>
                                <th>Teléfono</th>
                                <th>Correo Electrónico</th>
                                <th>Facebook</th>
                                <th>Suscrito</th>
                                <th>Descripción de la solicitud</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quotations as $item)
                            @include('requests.modal-data')
                            <tr>
                                <td>{{$item->name_client}}</td>
                                <td>{{$item->concept}}</td>
                                <td>{{$item->destination}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    @if ($item->facebook)
                                    {{$item->facebook}}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($item->suscribe)
                                    SI
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($item->trip_description)
                                    {{$item->trip_description}}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status === 'received')
                                    Recibida
                                    @elseif($item->status === 'send')
                                    Enviada
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status === 'send')
                                    <div class="btn-group">
                                    <a href="#" class="btn btn-xs btn-gradient-success mr-2 btn-icon-text">Venta<i class="mdi mdi-credit-card btn-icon-append"></i></a>
                                    <a href="" class="btn btn-xs btn-gradient-info mr-2 btn-icon-text" data-toggle="modal"
                                    data-target="#data_{{$item->id}}">Detalles<i class="mdi mdi-account-search btn-icon-append"></i></a></a>
                                    @else
                                    <a href="{{url('/admin/solicitudes/procesar',$item->id)}}" class="btn btn-xs btn-gradient-primary mr-2 btn-icon-text">Procesar
                                        <i class="mdi mdi mdi-rotate-3d btn-icon-append"></i></a>
                                    @endif
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
        $('#quotations').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            columnDefs: [{
                targets: [0],
                visible: true,
                searchable: true
            }, ],
            order: [
                [0, "asc"]
            ],
        });
    });

</script>
@endsection
@endsection
