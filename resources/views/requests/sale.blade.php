@extends('layouts.app')
@section('title')
Terminar Solicitud
@endsection
@section('page-header')
Terminar solicitud
@endsection
@section('page-header-one')
Solicitud
@endsection
@section('page-header-two')
Terminar
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
                    Usa los siguientes <code>campos</code> para completar el proceso de venta.
                </p>
                @include('layouts.messages')
                <form class="form-sample" method="POST" action="{{url('/admin/ventas/guardar')}}">
                    @csrf
                <input type="hidden" name="phone" value="{{$quotation->phone}}">
                <input type="hidden" name="email" value="{{$quotation->email}}">
                <input type="hidden" name="suscribe" value="{{$quotation->suscribe}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fecha</label>
                                <div class="col-sm-9">
                                    <input type="date" value="{{ Carbon\Carbon::now()->toDateString() }}" name="date" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Proveedor</label>
                                <div class="col-sm-9">
                                    <select name="provider" id="" class="form-control">
                                        <option value="">Elije una opción</option>
                                        @foreach ($providers as $provider)
                                        <option value="{{$provider->name}}">{{$provider->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Hidden --}}
                        <input type="hidden" name="client" value="{{$quotation->name_client}}">
                        <input type="hidden" name="destination" value="{{$quotation->destination}}">
                        <input type="hidden" name="quotation" value="{{$quotation->id}}">
                        {{-- End hidden --}}
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nombre del Pasajero</label>
                                <div class="col-sm-9">
                                    <input type="text" name="passenger" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Clave</label>
                                <div class="col-sm-9">
                                    <input type="text" name="key" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ruta</label>
                                <div class="col-sm-9">
                                    <select name="route" id="" class="form-control">
                                        <option value="">Elije una opción</option>
                                        @foreach ($routes as $route)
                                        <option value="{{$route->name}}">{{$route->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fecha de Salida</label>
                                <div class="col-sm-9">
                                    <input type="date" name="departure_date" class="form-control" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Horario</label>
                                <div class="col-sm-9">
                                    <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                        <input type="text" name="schedule" class="form-control datetimepicker-input"
                                            data-target="#datetimepicker3" />
                                        <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                            <div class="input-group-text bg-primary"><i class="mdi mdi-clock"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Precio Unitario</label>
                                <div class="col-sm-9">
                                    <input type="number" name="unit_price" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Precio Comisión</label>
                                <div class="col-sm-9">
                                    <input type="number" name="commission_price" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">TDC</label>
                                <div class="col-sm-9">
                                    <select name="tdc" id="" class="form-control">
                                        <option value="">Elije una opción</option>
                                        @foreach ($cards as $card)
                                        <option value="{{$card->id}}">{{$card->name_account}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Estatus de Pago</label>
                                <div class="col-sm-9">
                                    <select name="payment_status" id="" class="form-control">
                                        <option value="">Elije una opción</option>
                                        <option value="PAGADO">Pagado</option>
                                        <option value="PARCIAL">PARCIAL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Pagado</label>
                                <div class="col-sm-9">
                                    <input type="number" name="paid_out" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Forma de Pago</label>
                                <div class="col-sm-9">
                                    <select name="way_to_pay" id="" class="form-control">
                                        <option value="">Elije una opción</option>
                                        <option value="EFECTIVO">Efectivo</option>
                                        <option value="TRANSFERENCIA">Transferencia</option>
                                        <option value="TARJETA DEBITO/CRÉDITO">Tarjeta Débito/Crédito</option>
                                    </select>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
<script type="text/javascript">
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
    });

</script>
@endsection
@endsection
