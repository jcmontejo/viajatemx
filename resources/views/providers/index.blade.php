@extends('layouts.app')
@section('title')
Proveedores
@endsection
@section('page-header')
Proveedores
@endsection
@section('page-header-one')
Proveedores
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
<!-- Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
    <div class="modal-dialog" role="document">
        {!! Form::open(['method' => 'post']) !!}

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="roleModalLabel">Rol</h4>
            </div>
            <div class="modal-body">
                <!-- name Form Input -->
                <div class="form-group @if ($errors->has('name')) has-error @endif">
                    {!! Form::label('name', 'Nombre') !!} {!! Form::text('name', null, ['class' => 'form-control
                    input-lg', 'placeholder' => 'Nombre del rol']) !!} @if ($errors->has('name'))
                    <p class="help-block">{{ $errors->first('name') }}</p> @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <!-- Submit Form Button -->
                {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('layouts.messages')
                <p class="card-description float-right">
                    <a class="btn btn-gradient-success btn-rounded btn-lg" href="{{url('/proveedores/crear')}}" role="button"><i
                            class="mdi mdi-account-plus"></i>&nbsp;
                        Nuevo Proveedor</a>
                </p>
                <div class="table-responsive">
                    <table class="table table-hover" id="providers">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>Nombre</th>
                                <th>Contacto</th>
                                <th>Correo de Contacto</th>
                                <th>Teléfono de Contacto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($providers as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->contact}}</td>
                                <td class="text-success">{{$item->email}} <i class="mdi mdi-account"></i></td>
                                <td>{{$item->phone}}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{url('/proveedores/editar', $item['id'])}}"><i
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
                                                    $item->name}}&rsquo;?
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="GET" action="{{ route('proveedores.destroy',$item->id) }}">
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
            }
        });
    });
</script>
@endsection
