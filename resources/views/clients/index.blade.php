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
                    <a class="btn btn-gradient-success btn-rounded btn-lg" href="{{url('/admin/clientes/crear')}}"
                        role="button"><i class="mdi mdi-account-plus"></i>&nbsp;
                        Nuevo Cliente</a>
                </p>
                <div class="table-responsive">
                    <table class="table table-hover" id="clients">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>Marca Personal</th>
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
                                    <a class="btn btn-block btn-info btn-xs" href="{{url('/admin/clientes/editar', $item['id'])}}"><i
                                            class="mdi mdi-tooltip-edit"></i>
                                        Editar</a>
                                    <button type="button" data-toggle="modal" data-target="#confirmDeleteModal-{{ $item->id }}"
                                        class="btn btn-block btn-danger btn-xs"><i class="mdi mdi-delete"></i> Eliminar</button>
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
                                                    $item->name}}&rsquo;?
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="GET" action="{{ route('clientes.destroy',$item->id) }}">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                        <input type="submit" name="submit" value="Eliminar" class='btn btn-danger'>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
@endsection @section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#clients').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });
    });

</script>
@endsection
