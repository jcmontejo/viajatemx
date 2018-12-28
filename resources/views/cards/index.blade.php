@extends('layouts.app')
@section('title')
Tarjetas
@endsection
@section('page-header')
Tarjetas
@endsection
@section('page-header-one')
Tarjetas
@endsection
@section('page-header-two')
Todas
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
                    @can('agregar_tarjetas_credito')
                    <a class="btn btn-gradient-success btn-rounded btn-lg" href="{{url('/admin/tarjetas/crear')}}" role="button"><i
                            class="mdi mdi-account-plus"></i>&nbsp;
                        Nueva Tarjeta</a>
                    @endcan
                </p>
                <div class="table-responsive">
                    <table class="table table-hover" id="providers">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>Nombre de Cuenta</th>
                                <th>Alias</th>
                                <th>Clave Interbancaria</th>
                                <th>Número de Cuenta</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cards as $item)
                            <tr>
                                <td>{{$item->name_bank}}</td>
                                <td>{{$item->name_account}}</td>
                                <td>{{$item->key}}</td>
                                <td>{{$item->account_number}}</td>
                                <td>
                                    @can('editar_tarjetas_credito')
                                    <a class="btn btn-info btn-xs" href="{{url('/admin/tarjetas/editar', $item['id'])}}"><i
                                            class="mdi mdi-tooltip-edit"></i>
                                        Editar</a>
                                    @endcan
                                    @can('eliminar_tarjetas_credito')
                                    <button type="button" data-toggle="modal" data-target="#confirmDeleteModal-{{ $item->id }}"
                                        class="btn btn-danger btn-xs"><i class="mdi mdi-delete"></i> Eliminar</button>
                                    @endcan
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
        $('#providers').DataTable({
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
