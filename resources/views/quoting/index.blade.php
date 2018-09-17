<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>ViajateMX | Cotizador</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="shortcut icon" href="{{asset('/images/logotipo.png')}}" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{asset('/quoting/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/quoting/assets/css/material-bootstrap-wizard.css')}}" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('/quoting/assets/css/demo.css')}}" rel="stylesheet" />

    {{-- Toast --}}
    <link rel="stylesheet" type="text/css" href="{{asset('/quoting/toastr.css')}}">

    {{-- Google Maps --}}
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places"></script>
</head>

<body>
    <div class="image-container set-full-height" style="background-image: url('{{asset('/quoting/assets/img/bg_6.jpg')}}')">
        <!--   Creative Tim Branding   -->
        <a href="{{url('/clientes/cotizador')}}">
            <div class="logo-container">
                <div class="logo">
                    <img src="{{asset('/quoting/assets/img/new_logo.png')}}">
                    {{-- <img src="{{asset('/images/logotipo.png')}}"> --}}
                </div>
                <div class="brand">
                    ViajateMX
                </div>
            </div>
        </a>
        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="purple" id="wizard">
                            <form action="{{url('/guardar/cotizacion')}}" method="POST">
                                @csrf
                                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                        Cotizador ViajateMX
                                    </h3>
                                    <h5>
                                        Esta información nos permitirá saber más sobre ti y así brindarte un mejor
                                        servicio.</h5>
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#details" data-toggle="tab">Datos de Contacto</a></li>
                                        <li><a href="#captain" data-toggle="tab">Tipo de Servicio</a></li>
                                        <li><a href="#description" data-toggle="tab">Detalles Extras</a></li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane" id="details">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text">Comencemos con los detalles básicos.</h4>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">face</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Nombre <small>(requerido)</small></label>
                                                        <input name="name" value="{{ old('name') }}" type="text" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Correo Electrónico <small>(requerido)</small></label>
                                                        <input name="email" value="{{ old('email') }}" type="email"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">call</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Teléfono <small>(requerido)</small></label>
                                                        <input name="phone" value="{{ old('phone') }}" type="text"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">check</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Facebook</label>
                                                        <input name="facebook" value="{{ old('facebook') }}" type="text"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">place</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        {{-- <label class="control-label">Destino <small>(requerido)</small></label>
                                                        --}}
                                                        <input name="destination" value="{{ old('destination') }}" id="city"
                                                            type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="captain">
                                        <h4 class="info-text">¿Qué tipo de servicio deseas? </h4>
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Selecciona Servicio</label>
                                                    <select name="concept" class="form-control" required>
                                                        <option disabled="" selected=""></option>
                                                        <option value="Transporte (Sencillo/Redondo)"> Transporte
                                                            (Sencillo/Redondo) </option>
                                                        <option value="Transporte + Hospedaje"> Transporte + Hospedaje
                                                        </option>
                                                        <option value="Personalizado"> Personalizado </option>
                                                    </select>
                                                </div>
                                                {{-- <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Selecciona esta opción si deseas transporte (Redondo/Sencillo).">
                                                        <input type="radio" name="optradio" value="1" checked>
                                                        <div class="icon">
                                                            <i class="material-icons">airplanemode_active</i>
                                                        </div>
                                                        <h6>Transporte</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Selecciona esta opción si deseas Transporte + Hospedaje.">
                                                        <input type="radio" name="optradio" value="2">
                                                        <div class="icon">
                                                            <i class="material-icons">hotel</i>
                                                        </div>
                                                        <h6>Transporte + Hospedaje</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Selecciona esta opción si deseas un paquete perzonalizado (Vacaciones, Luna de Miel, Fin de Semana, Etc.).">
                                                        <input type="radio" name="optradio" value="3">
                                                        <div class="icon">
                                                            <i class="material-icons">map</i>
                                                        </div>
                                                        <h6>Personalizado</h6>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="description">
                                        <div class="row">
                                            <h4 class="info-text"> Envíanos una pequeña descripción.</h4>
                                            <div class="col-sm-6 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Descripción del Viaje</label>
                                                    <textarea name="trip_description" value="{{ old('trip_description') }}"
                                                        class="form-control" placeholder="" rows="6"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Ejemplo</label>
                                                    <p class="description">"Deseo un viaje para 2 personas (Adultos),
                                                        me gustaría que el viaje sea personalizado es decir que conste
                                                        de transporte y además de hospedaje y alimentación."</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-purple btn-wd' name='next'
                                            value='Siguiente' />
                                        <input type='submit' class='btn btn-finish btn-fill btn-purple btn-wd' value='Finalizar' />
                                    </div>
                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous'
                                            value='Anterior' />

                                        <div class="footer-checkbox">
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="suscribe">
                                                    </label>
                                                    Acepto que Viájate Mx use mis datos para enviarme información que
                                                    pueda ser de mi interés
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div> <!-- row -->
        </div> <!--  big container -->

        <div class="footer">
            <div class="container text-center">
                Hecho con <i class="fa fa-heart heart"></i> por <a href="#">ViajateMX</a>.
            </div>
        </div>
    </div>

</body>
<!--   Core JS Files   -->
<script src="{{asset('/quoting/assets/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/quoting/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/quoting/assets/js/jquery.bootstrap.js')}}" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{asset('/quoting/assets/js/material-bootstrap-wizard.js')}}"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{asset('/quoting/assets/js/jquery.validate.min.js')}}"></script>

{{-- Toastr --}}
<script src="{{asset('/quoting/toastr.min.js')}}"></script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}", "{{Session::get('title')}}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}", "{{Session::get('title')}}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}", "{{Session::get('title')}}");
            break;
    }
    @endif

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

</html>
