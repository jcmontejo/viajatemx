@extends('layouts.app')
@section('title')
Empleados
@endsection
@section('page-header')
Empleados
@endsection
@section('page-header-one')
Empleados
@endsection
@section('page-header-two')
Todos
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('layouts.messages')
                <p class="card-description float-right">
                    @can('agregar_empleados')
                    <a class="btn btn-gradient-success btn-rounded btn-lg" href="{{url('/empleados/crear')}}" role="button"><i
                            class="mdi mdi-account-plus"></i>&nbsp;
                        Nuevo Empleado</a>
                    @endcan
                </p>
                <div class="table-responsive">
                    <table class="table table-hover" id="users">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Usuario de Acceso</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->lastname}}</td>
                                <td class="text-success">{{$item->email}} <i class="mdi mdi-account"></i></td>
                                <td>
                                    @if ($item->status)
                                    <label class="badge badge-success">Activo</label>
                                    @else
                                    <label class="badge badge-warning">Inactivo</label>
                                    @endif
                                </td>
                                <td>
                                    @can('editar_empleados')
                                    <a class="btn btn-info btn-xs" href="{{url('/empleados/editar', $item['id'])}}"><i
                                            class="mdi mdi-tooltip-edit"></i>
                                        Editar</a>
                                    @endcan
                                    @can('eliminar_empleados')
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
                                                    $item->name}}&rsquo;?
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="GET" action="{{ route('empleados.destroy',$item->id) }}">
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
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#users').DataTable({
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
