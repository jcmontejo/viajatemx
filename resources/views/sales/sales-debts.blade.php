@extends('layouts.app')
@section('style')
@endsection
@section('title')
Ventas
@endsection
@section('page-header')
Ventas con Adeudo
@endsection
@section('page-header-one')
Ventas con Adeudo
@endsection
@section('page-header-two')
Todas
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
               <div id="list-debt"></div>
            </div>
        </div>
    </div>
</div>
@include('sales.payment')
@endsection
@section('js')
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
{{-- Funciones --}}
<script type="text/javascript">
    $(document).ready(function () {
        listdebts();
    });

    var listdebts = function () {
        $.ajax({
            type: 'get',
            url: '{{ url('listar/deudas')}}',
            success: function (data) {
                $('#list-debt').empty().html(data);
            }
        });
    }

    $(document).on("click",".pagination li a",function(e) {
        e.preventDefault();
        var url = $(this).attr("href");
        $.ajax({
            type:'get',
            url:url,
            success: function(data){
                $('#list-debt').empty().html(data);
            }
        });
    });     

    var Mostrar = function (id) {
        var route = "{{url('admin/pagar')}}/" + id;
        $.get(route, function (data) {
            $("#id").val(data.id);
            $("#debt").val(data.debt);
            $("#clientDebt").val(data.client);
            $("#destinationDebt").val(data.destination);
            $("#commission_priceDebt").val(data.commission_price);
        });
    }

    $("#actualizar").click(function () {
        var id = $("#id").val();
        var paid_out = $("#paid_out").val();
        var route = "{{url('admin/procesar/pago')}}/" + id;
        var token = $("#token").val();
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'PUT',
            dataType: 'json',
            data: {
                paid_out: paid_out
            },
            success: function (data) {
                if (data.success == 'true') {
                    //listdebts();
                    location.reload();
                    $("#paid_out").val("");
                    $("#id").val("");
                    $('#myModal').modal('toggle');
                    $(".modal-backdrop").remove();
                    $('body').removeClass('modal-open');
                    swal("Bien hecho!", "Pago recibido exitosamente!", "success");
                }else{
                    swal("Ooops!", "Estas introduciendo una cantidad mayor al adeudo!", "error");
                    $("#paid_out").val("");
                }
            },
            error: function (data) {
                $("#error").html(
                    '¡Error! Verifica que estes introduciendo una cantidad númerica menor o igual al importe solicitado.'
                );
                $("#message-error").fadeIn();
                if (data.status == 422) {
                    console.clear();
                }
            }
        });
    });

    //When closes window modal
    $("#myModal").on("hidden.bs.modal", function () {
        $("#message-error").fadeOut()
    });

</script>
{{-- Toastr --}}
<script src="{{asset('/quoting/toastr.min.js')}}"></script>
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
