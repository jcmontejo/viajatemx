@extends('layouts.app')
@section('title')
Clientes
@endsection
@section('page-header')
Clientes
@endsection
@section('page-header-one')
Clientes
@endsection
@section('page-header-two')
Todos
@endsection
@section('content')
{{-- @if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('message') }}
</div>
@endif --}}
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('layouts.messages')
                <p class="card-description float-right">
                    @can('agregar_clientes')
                    <a class="btn btn-gradient-success btn-rounded btn-lg" href="{{url('/admin/clientes/crear')}}" role="button"><i
                            class="mdi mdi-account-plus"></i>&nbsp;
                        Nuevo Cliente</a>
                    @endcan
                </p>
                <div class="table-responsive">
                    <table class="table table-hover" id="clients">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>Alias</th>
                                <th>Nombre Completo</th>
                                <th>Correo de Contacto</th>
                                <th>Teléfono de Contacto</th>
                                <th>¿Suscrito?</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Datos Fiscales</th>
                                <th>Cuentas en Aerolíneas</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $item)
                            <tr>
                                <td>{{$item->brand}}</td>
                                <td>{{$item->name}}</td>
                                <td class="text-info">{{$item->email}} <i class="mdi mdi-account"></i></td>
                                <td>{{$item->phone}}</td>
                                <td>
                                    @if ($item->suscribe)
                                    <span class="badge badge-success">SI</span>
                                    @endif
                                </td>
                                <td>{{$item->birthdate}}</td>
                                <td>{{$item->fiscal_data}}</td>
                                <td>{{$item->airline_accounts}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @can('editar_clientes')
                                        <button value="{{$item->id}}" OnClick="Show(this);" class="btn btn-rounded btn-xs btn-info mb-3"
                                            data-toggle="modal" data-target="#modalEdit"><i class="fa fa-edit"></i>
                                            Editar</button>
                                        @endcan
                                        @can('eliminar_clientes')
                                        <button class="btn btn-rounded btn-xs btn-danger mb-3" value="{{$item->id}}"
                                            OnClick="Delete(this);"><i class="fa fa-trash"></i> Eliminar</button>
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
@include('clients.modal-edit')
@endsection @section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#clients').DataTable({
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
<script>
    $(document).ready(function () {
    });

    $("#createClient").click(function () {
        $('#modalCreate').modal('show');
    })

    $("#saveclient").click(function () {
        var name = $("#nameSave").val();
        var email = $("#emailSave").val();
        var password = $("#passwordSave").val();
        var role = $("#roleSave").val();
        var route = "/usuarios/guardar"

        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            data: {
                name: name,
                email: email,
                password: password,
                role: role
            },
            success: function () {
                $('#nameSave').val('');
                $('#emailSave').val('');
                $('#passwordSave').val('');
                $('#roleSave').val('');
                $("#modalCreate").modal('toggle');
                $('#message-error-save').css('display', 'none');
                reload();
                swal("Bien hecho!", "Has creado una nueva cuenta de usuario!", "success");
            },
            error: function (data) {
                var response = JSON.parse(data.responseText);
                var errorString = "<ul>";
                $.each(response.errors, function (key, value) {
                    errorString += "<li>" + value + "</li>";
                });

                $("#error-save").html(errorString);
                $("#message-error-save").fadeIn();
            }
        });
    })

    function Show(btn) {
        var route = "/admin/clientes/editar/" + btn.value;

        $.get(route, function (res) {
            $("#brandEdit").val(res.brand);
            $("#nameEdit").val(res.name);
            $("#birthdateEdit").val(res.birthdate);
            $("#phoneEdit").val(res.phone);
            $("#emailEdit").val(res.email);
            $("#fiscalDataEdit").val(res.fiscal_data);
            $("#airlineAccountsEdit").val(res.airline_accounts);
            $("#id").val(res.id);
        });
    }

    $("#updateClient").click(function () {
        var value = $("#id").val();
        var brand = $("#brandEdit").val();
        var name = $("#nameEdit").val();
        var birthdate = $("#birthdateEdit").val();
        var phone = $("#phoneEdit").val();
        var email = $("#emailEdit").val();
        var fiscal_data = $("#fiscalDataEdit").val();
        var airline_accounts = $("#airlineAccountsEdit").val();
        var route = "/admin/clientes/update/" + value;

        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'PUT',
            dataType: 'json',
            data: {
                brand: brand,
                name: name,
                birthdate: birthdate,
                phone: phone,
                email: email,
                fiscal_data: fiscal_data,
                airline_accounts: airline_accounts
            },
            success: function () {
                $("#modalEdit").trigger('click');
                // reload();
                swal("Bien hecho!", "Has actualizado al cliente exitosamente!", "success");
                location.reload();
            },
            error: function (data) {
                var response = JSON.parse(data.responseText);
                var errorString = "<ul>";
                $.each(response.errors, function (key, value) {
                    errorString += "<li>" + value + "</li>";
                });

                $("#error-edit").html(errorString);
                $("#message-error-edit").fadeIn();
            }
        });
    });

    function Delete(btn) {
        var id = btn.value;
        var route = "/admin/clientes/eliminar/" + btn.value;
        swal({
            title: '¿Estás seguro?',
            text: "Será eliminado permanentemente!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borralo!',
            cancelButtonText: 'Cancelar',
            showLoaderOnConfirm: true,

            preConfirm: function () {
                return new Promise(function (resolve) {

                    $.ajax({
                            url: route,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'DELETE',
                            dataType: 'json',
                            data: {
                                id: id
                            },
                        })
                        .done(function (response) {
                            swal('Eliminado!', response.message, response.status);
                            location.reload();
                        })
                        .fail(function () {
                            swal('Oops...', 'Algo salió mal con la petición!', 'error ');
                        });
                });
            },
            allowOutsideClick: false
        });
    }

</script>
@endsection
