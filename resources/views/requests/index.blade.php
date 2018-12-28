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
                            <tr class="bg-primary text-white">
                                <th>Nombre Cliente</th>
                                <th>Concepto</th>
                                <th>Destino</th>
                                <th>Suscrito</th>
                                <th>Detalles</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quotations as $item)
                            <tr>
                                <td>{{$item->name_client}}</td>
                                <td>{{$item->concept}}</td>
                                <td>{{$item->destination}}</td>
                                <td>
                                    @if ($item->suscribe)
                                    SI
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status === 'received')
                                    <button value="{{$item->id}}" OnClick="Show(this);" class="btn btn-rounded btn-xs btn-info mb-3"
                                        data-toggle="modal" data-target="#modalShow"><i class="fa fa-eye"></i>
                                        Ver</button>
                                    @elseif($item->status === 'send')
                                    <button value="{{$item->id}}" OnClick="ShowComplete(this);" class="btn btn-rounded btn-xs btn-info mb-3"
                                        data-toggle="modal" data-target="#modalShowComplete"><i class="fa fa-eye"></i>
                                        Ver</button>
                                    @endif
                                </td>

                                <td>
                                    @if ($item->status === 'received')
                                    <label class="badge badge-warning">Recibida</label>
                                    @elseif($item->status === 'send')
                                    <label class="badge badge-success">Enviada</label>
                                    @endif
                                </td>
                                <td class="text-right sorting_1">
                                    @if ($item->status === 'send')
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @can('venta_solicitudes')
                                        {{-- <a href="{{url('/admin/solicitudes/terminar',$item->id)}}" class="btn btn-rounded btn-xs btn-success mb-3"><i
                                                class="mdi mdi-credit-card btn-icon-append"></i>Terminar Venta</a> --}}
                                        <button value="{{$item->id}}" OnClick="ProcessSale(this);" class="btn btn-rounded btn-xs btn-info mb-3"
                                            data-toggle="modal" data-target="#modalSale"><i class="fas fa-piggy-bank"></i>
                                           Terminar Venta</button>
                                        @endcan
                                        @can('editar_solicitudes')
                                        <a href="{{url('/admin/solicitudes/editar',$item->id)}}" class="btn btn-rounded btn-xs btn-secondary mb-3"><i
                                                class="mdi mdi mdi-tooltip-edit btn-icon-append"></i>Editar</a>
                                        @endcan
                                        @else
                                        @can('procesar_solicitudes')
                                        <button value="{{$item->id}}" OnClick="Process(this);" class="btn btn-rounded btn-xs btn-info mb-3"
                                            data-toggle="modal" data-target="#modalProcess"><i class="fas fa-share-square"></i>
                                            Enviar Cotización</button>
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
@include('requests.modal-show')
@include('requests.modal-show-complete')
@include('requests.modal-process')
@include('requests.modal-sale')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });

</script>
<script>
    $(document).ready(function () {});

    function Show(btn) {
        var route = "/admin/solicitudes/ver/" + btn.value;

        $.get(route, function (res) {
            //$("#title").append(res.destination);
            $("#nameClient").val(res.name_client);
            $("#phoneClient").val(res.phone);
            $("#emailClient").val(res.email);
            $("#concept").val(res.concept);
            $("#destination").val(res.destination);
            $("#departureDate").val(res.departure_date);
            $("#returnDate").val(res.return_date);
            $("#transport").val(res.transport);
            $("#description").val(res.trip_description);
            $("#id").val(res.id);

        });
    }

    function ShowComplete(btn) {
        var route = "/admin/solicitudes/ver/" + btn.value;

        $.get(route, function (res) {
            //$("#title").append(res.destination);
            $("#nameClientComplete").val(res.name_client);
            $("#phoneClientComplete").val(res.phone);
            $("#emailClientComplete").val(res.email);
            $("#conceptComplete").val(res.concept);
            $("#destinationComplete").val(res.destination);
            $("#departureDateComplete").val(res.departure_date);
            $("#returnDateComplete").val(res.return_date);
            $("#transportComplete").val(res.transport);
            $("#descriptionComplete").val(res.trip_description);
            $("#notesComplete").val(res.notes);
            $("#attendedComplete").val(res.attended);
            $("#date_sendComplete").val(res.date_send);
            $("#view-file").append(res.file);
            $("#view-file").attr("href", "/assets/files/" + res.file);
            $("#idComplete").val(res.id);
        });
    }

    function Process(btn) {
        var route = "/admin/solicitudes/ver/" + btn.value;

        $.get(route, function (res) {
            $("#idProcess").val(res.id);
        });
    }

    function ProcessSale(btn) {
        var route = "/admin/solicitudes/ver/" + btn.value;

        $.get(route, function (res) {
            $("#idQuotation").val(res.id);
        });
    }

    $("#terminateSale").click(function (){
        var idQuotationSale = $("#idQuotation").val();
        var tdc = $("#tdcSale").val(); 
        var date = $("#dateSale").val(); 
        var provider = $("#providerSale").val();
        var passenger = $("#passengerSale").val();
        var key = $("#keySale").val();
        var destination = $("#destinationSale").val();
        var routeSale = $("#routeSale").val();
        var departure_date = $("#departure_dateSale").val();
        var schedule = $("#scheduleSale").val();
        var unit_price = $("#unit_priceSale").val();
        var commission_price = $("#commission_priceSale").val();
        var payment_status = $("#payment_statusSale").val();
        var way_to_pay = $("#way_to_paySale").val();
        var paid_out = $("#paid_outSale").val();
        var debt = $("#debtSale").val();
        var tdc = $("#tdcSale").val();
        var route = "/admin/ventas/guardar"

         $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            data: {
                idQuotation: idQuotationSale,
                tdc: tdc,
                date: date,
                provider: provider,
                passenger: passenger,
                key: key,
                destination: destination,
                departure_date: departure_date,
                schedule: schedule,
                unit_price: unit_price,
                commission_price: commission_price,
                payment_status: payment_status,
                way_to_pay: way_to_pay,
                paid_out: paid_out,
                debt: debt,
                tdc: tdc,
                route: routeSale
            },
            beforeSend: function () {
                $("#preloader").css("display", "block");
            },
            success: function () {
                $("#preloader").css("display", "none");
                $('#nameSave').val('');
                $('#lastnameSave').val('');
                $('#motherlastnameSave').val('');
                $('#birthdateSave').val('');
                $('#sexSave').val('');
                $('#phoneSave').val('');
                $('#emailSave').val('');
                $('#addressSave').val('');
                $('#joiningdateSave').val('');
                $("#modalSale").trigger('click');
                $('#message-error-save').css('display', 'none');
        
                swal("Bien hecho!", "Hemos procesado una nueva venta exitosamente!", "success");
                location.reload();
            },
            error: function (data) {
                $("#preloader").css("display", "none");
                var response = JSON.parse(data.responseText);
                var errorString = "<ul>";
                $.each(response.errors, function (key, value) {
                    errorString += "<li>" + value + "</li>";
                });

                $("#error-sale").html(errorString);
                $("#message-error-sale").fadeIn();
            }
        });
    });

    $("#sendQuotation").click(function () {
        var id = $("#idProcess").val();
        var attended = $("#attended").val();
        var send = $("#send").val();
        var medium = $("#medium").val();
        var date_send = $("#date_send").val();
        var notes = $("#notes").val();
        var route = "/admin/solicitudes/enviar/";

        var file_request = $('#file').prop('files')[0];

        var form_data = new FormData();
        // Form Data
        form_data.append('file', file_request);
        form_data.append('attended', attended);
        form_data.append('send', send);
        form_data.append('medium', medium);
        form_data.append('date_send', date_send);
        form_data.append('notes', notes);
        form_data.append('id', id);

        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            data: form_data,
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            beforeSend: function () {
                $("#preloader").css("display", "block");
            },
            success: function () {
                $("#preloader").css("display", "none");
                $("#modalProcess").trigger('click');
                $("#message-error-edit").fadeOut();
                swal("Bien hecho!", "Has enviado la cotización exitosamente!", "success");
                location.reload();
            },
            error: function (data) {
                $("#preloader").css("display", "none");
                var response = JSON.parse(data.responseText);
                var errorString = "<ul>";
                $.each(response.errors, function (key, value) {
                    errorString += "<li>" + value + "</li>";
                });

                $("#error-send").html(errorString);
                $("#message-error-send").fadeIn();
            }
        });
    });

</script>
@endsection
@endsection
