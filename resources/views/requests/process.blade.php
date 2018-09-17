@extends('layouts.app')
@section('title')
Procesar Solicitud
@endsection
@section('page-header')
Procesar solicitud
@endsection
@section('page-header-one')
Solicitud
@endsection
@section('page-header-two')
Procesar
@endsection
@section('content')
<div class="row">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Nombe de cliente</h4>
                <div class="media">
                    <i class="mdi mdi-account-star icon-md text-info d-flex align-self-start mr-3"></i>
                    <div class="media-body">
                        <p class="card-text">{{$quotation->name_client}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">destino solicitado</h4>
                <div class="media">
                    <i class="mdi mdi-google-maps icon-md text-info d-flex align-self-center mr-3"></i>
                    <div class="media-body">
                        <p class="card-text">{{$quotation->destination}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Teléfono</h4>
                <div class="media">
                    <i class="mdi mdi-cellphone icon-md text-info d-flex align-self-end mr-3"></i>
                    <div class="media-body">
                        <p class="card-text">{{$quotation->phone}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Completar datos</h4>
                <p class="card-description">
                    Usa los siguientes <code>campos</code> para completar el proceso de cotización.
                </p>
                @include('layouts.messages')
                <form class="form-sample" method="POST" action="{{url('/admin/solicitudes/enviar')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Realizo</label>
                                <div class="col-sm-9">
                                    <input type="text" name="attended" value="{{Auth::user()->name}} {{Auth::user()->lastname}}"
                                        class="form-control" readonly required />
                                    <input type="hidden" name="id" value="{{$quotation->id}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Envío</label>
                                <div class="col-sm-9">
                                    <input type="text" name="send" value="{{Auth::user()->name}} {{Auth::user()->lastname}}"
                                        class="form-control" readonly required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Medio de Envío</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="medium" required>
                                        <option>WhatsApp</option>
                                        <option>Correo Electrónico</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fecha de Envío</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date_send" class="form-control" placeholder="dd/mm/yyyy"
                                        required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Notas</label>
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="5" id="notes" name="notes"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" value="Procesar" class="btn btn-gradient-success btn-lg btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('js')
<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{asset('/quoting/assets/js/jquery.validate.min.js')}}"></script>
@endsection
@endsection
