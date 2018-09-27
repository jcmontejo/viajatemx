@extends('layouts.app')
@section('title')
Generar Venta
@endsection
@section('page-header')
Generar Venta
@endsection
@section('page-header-one')
Ventas
@endsection
@section('page-header-two')
Generar
@endsection
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ingresa los datos para generar la venta</h4>
                @include('layouts.messages')
                <form class="form-sample" method="POST" action="{{url('/admin/generar/venta/guardar')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fecha de Venta</label>
                                <div class="col-sm-9">
                                    <input type="date" value="{{ Carbon\Carbon::now()->toDateString() }}" value="{{old('date')}}"
                                        name="date" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Proveedor</label>
                                <div class="col-sm-9">
                                    <select name="provider" id="" class="form-control">
                                        @forelse ($providers as $provider)
                                        <option value="{{$provider->name}}">{{$provider->name}}</option>
                                        @empty
                                        <option>NO HAY REGISTROS</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nombre del Cliente</label>
                                <div class="col-sm-9">
                                    <select name="client" id="" class="form-control">
                                        @forelse ($clients as $client)
                                        <option value="{{$client->id}}">{{$client->name}}</option>
                                        @empty
                                        <option>NO HAY REGISTROS</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nombre del Pasajero</label>
                                <div class="col-sm-9">
                                    <input type="text" name="passenger" value="{{old('passenger')}}" class="form-control"
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Clave</label>
                                <div class="col-sm-9">
                                    <input type="text" name="key" value="{{old('key')}}" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ingresa Destino</label>
                                <div class="col-sm-9">
                                    <input type="text" name="destination" value="{{old('destination')}}" class="form-control"
                                        id="city" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ruta</label>
                                <div class="col-sm-9">
                                    <select name="route" id="" class="form-control">
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
                                    <input type="date" name="departure_date" value="{{old('departure_date')}}" class="form-control"
                                        required />
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
                                        <input type="text" name="schedule" value="{{old('schedule')}}" class="form-control datetimepicker-input"
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
                                    <input type="number" name="unit_price" value="{{old('unit_price')}}" class="form-control"
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Precio Comisión</label>
                                <div class="col-sm-9">
                                    <input type="number" name="commission_price" value="{{old('commission_price')}}"
                                        class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">TDC</label>
                                <div class="col-sm-9">
                                    <select name="tdc" id="" class="form-control">
                                        @forelse ($cards as $card)
                                        <option value="{{$card->id}}">{{$card->name_account}}</option>
                                        @empty
                                        <option>NO HAY REGISTROS</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Estatus de Pago</label>
                                <div class="col-sm-9">
                                    <select name="payment_status" id="" class="form-control">
                                        <option value="PAGADO">Pagado</option>
                                        <option value="PARCIAL">Parcial</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Pagado</label>
                                <div class="col-sm-9">
                                    <input type="number" name="paid_out" value="{{old('paid_out')}}" class="form-control"
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Forma de Pago</label>
                                <div class="col-sm-9">
                                    <select name="way_to_pay" id="" class="form-control">
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
<script type="text/javascript">
    function initialize() {
        var options = {
            types: ['(cities)'],
        };
        var input = document.getElementById('city');
        var autocomplete = new google.maps.places.Autocomplete(input, options);
    }
    google.maps.event.addDomListener(window, 'load', initialize);

</script>
@endsection
@endsection
