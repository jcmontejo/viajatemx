@extends('layouts.app')
@section('title')
Editar Empleado
@endsection
@section('page-header')
Empleados
@endsection
@section('page-header-one')
Empleados
@endsection
@section('page-header-two')
Editar
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('layouts.messages')
                <h4 class="card-title">Editar empleado</h4>
                <form class="forms-sample" method="POST" action="{{url('/empleados/update')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nombre</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            id="exampleInputUsername1" required>
                        <input type="hidden" name="id" value="{{$id}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Apellidos</label>
                        <input type="text" name="lastname" value="{{ $user->lastname }}" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo Electrónico</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña de Acceso</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Bloquear Usuario</label>
                        <input type="checkbox" name="status" class="form-control" @if ($user->status == 0)
                            checked
                        @endif>
                    </div>
                    <div class="form-group @if ($errors->has('roles')) has-error @endif">
                        {!! Form::label('roles[]', 'Roles', ['class' => '']) !!}
                            {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() :
                            null, ['class' => 'form-control', 'multiple']) !!} @if ($errors->has('roles'))
                            <p class="help-block">{{ $errors->first('roles') }}</p> @endif
                    </div>
                    <!-- Permissions -->
                    @if(isset($user))
                    @include('shared._permissions', ['closed' => 'true', 'model' => $user ])
                    @endif
                    <button type="submit" class="btn btn-gradient-primary mr-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
