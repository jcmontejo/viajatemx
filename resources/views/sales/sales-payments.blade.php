@extends('layouts.app')
@section('style')
@endsection
@section('title')
Ventas
@endsection
@section('page-header')
Ventas Pagadas
@endsection
@section('page-header-one')
Ventas Pagadas
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
                            @php
                            $invoice = App\Invoice::where('sale_id',$item->id)->count();
                            @endphp
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
                                        @if($invoice)
                                        @can('ver_detalle_factura')
                                        <button class="btn btn-xs btn-gradient-success mr-2 btn-icon-text" value="{{$item->id}}" OnClick="showInvoice(this);" data-toggle="modal" data-target="#modalShowInvoice"><i class="mdi mdi-qrcode btn-icon-append"></i> Ver Factura</button>
                                        {{-- <a href="{{url('/ver/factura',$item->id)}}" class="btn btn-xs btn-gradient-success mr-2 btn-icon-text"><i
                                                class="mdi mdi-qrcode btn-icon-append"></i>Ver Factura</a> --}}
                                        @endcan
                                        @else
                                        @can('generar_factura')
                                        <button class="btn btn-xs btn-gradient-primary mr-2 btn-icon-text" value="{{$item->id}}" OnClick="createInvoice(this);" data-toggle="modal" data-target="#modalInvoice"><i class="mdi mdi-qrcode btn-icon-append"></i> Facturar</button>
                                        {{-- <a href="{{url('/generar/factura')}}/{{$item->client_id}}/{{$item->id}}" class="btn btn-xs btn-gradient-primary mr-2 btn-icon-text"><i
                                                class="mdi mdi-qrcode btn-icon-append"></i>Generar Factura</a> --}}
                                        @endcan
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
@include('sales.modal-create-invoice')
@include('sales.modal-show-invoice')
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

    function showInvoice(btn) {
        var route = "/ver/factura/" + btn.value;

        $.get(route, function (res) {
            $("#showDate").val(res.date);
            $("#showStatus").val(res.status);
            $("#showNumber").val(res.number_invoice);
            $("#showConcept").val(res.concept);
            $("#showTotal").val(res.ammount);
            $("#showDescription").val(res.observations);
        });
    }

    function createInvoice(btn) {
        var route = "/consultar/ventas/factura/" + btn.value;

        $.get(route, function (res) {
            $("#client").val(res.client);
            $("#ammount").val(res.paid_out);
            $("#idsale").val(res.id);
            $("#clientsale").val(res.client_id);
        });
    }

    $("#generateInvoice").click(function () {
        var sale_id = $("#idsale").val();
        var number_invoice = $("#number_invoice").val();
        var fiscal_number = $("#fiscal_number").val();
        var client = $("#client").val();
        var business_name = $("#business_name").val();
        var rfc = $("#rfc").val();
        var concept = $("#concept").val();
        var date = $("#date").val();
        var ammount = $("#ammount").val();
        var status = $("#status").val();
        var payment_date = $("#payment_date").val();
        var route = "/guardar/factura";

        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            data: {
                sale_id: sale_id,
                number_invoice: number_invoice,
                fiscal_number: fiscal_number,
                client: client,
                business_name: business_name,
                rfc: rfc,
                concept: concept,
                date: date,
                ammount: ammount,
                status: status,
                payment_date: payment_date
            },
            beforeSend: function () {
                $("#preloader").css("display", "block");
            },
            success: function () {
                $("#modalInvoice").modal('toggle');
                swal("Bien hecho!", "Has generado factura exitosamente!", "success");
                location.reload();
            },
            error: function (data) {
                $("#preloader").css("display", "none");
                var response = JSON.parse(data.responseText);
                var errorString = "<ul>";
                $.each(response.errors, function (key, value) {
                    errorString += "<li>" + value + "</li>";
                });

                $("#error-invoice").html(errorString);
                $("#message-error-invoice").fadeIn();
            }
        });
    });
</script>
@endsection
@endsection
