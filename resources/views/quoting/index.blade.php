<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ViajateMX | Cotizador</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="shortcut icon" href="{{asset('/images/logotipo.png')}}" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    {{--
    <link rel="stylesheet" href="<link rel=" stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">">
    --}}

    <!-- CSS Files -->
    <link href="{{asset('/quoting/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/quoting/assets/css/material-bootstrap-wizard.css')}}" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('/quoting/assets/css/demo.css')}}" rel="stylesheet" />

    {{-- Toast --}}
    <link rel="stylesheet" type="text/css" href="{{asset('/quoting/toastr.css')}}">

    {{-- Google Maps --}}
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIkuGD3rXoBizun7HGZYyUWQ9W8ZVRBck"></script>
    <style>
        #preloader{
	display: none;
	background: rgba(255,255,255,0.7);
	position: fixed;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	z-index: 1100 !important;
}
    #preloader > .bar {
  display: inline-block;
  padding: 0px;
  text-align: left;
  left: 50%;
  top: 50%;
  position: absolute;
  width: 150px;
  height: 20px;
  border: 1px solid rgba(255,255,255,0.7);
  background-size: 28px 28px;
}
    </style>
</head>

<body>
    <div id="preloader">
        <div class="bar">
            <i class="fa fa-plane fa-spin" style="font-size:100px"></i>
        </div>
    </div>
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
            <div id='message-error-save' class="alert alert-danger alert-dismissible fade show" role='alert' style="display: none">
                <strong id="error-save"></strong>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="purple" id="wizard">
                            {{-- <form action="{{url('/guardar/cotizacion')}}" method="POST"> --}}
                                {{-- @csrf --}}
                                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->
                                <form id="myForm">
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
                                                            <input name="name" id="nameSave" value="{{ old('name') }}"
                                                                type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">email</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Correo Electrónico <small>(requerido)</small></label>
                                                            <input name="email" id="emailSave" value="{{ old('email') }}"
                                                                type="email" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">cake</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label"></label>
                                                            <input name="birthdate" id="birthdateSave" value="{{ old('birthdate') }}"
                                                                type="date" class="form-control">
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">call</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Teléfono <small>(requerido)</small></label>
                                                            <input name="phone" id="phoneSave" value="{{ old('phone') }}"
                                                                type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">check</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Facebook</label>
                                                            <input name="facebook" id="facebookSave" value="{{ old('facebook') }}"
                                                                type="text" class="form-control">
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">place</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <input name="destination" id="destinationSave" value="{{ old('destination') }}"
                                                                id="city" type="text" class="form-control" required
                                                                placeholder="Introduce Ruta o Destino">
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
                                                        <select name="concept" id="conceptSave" class="form-control"
                                                            required>
                                                            <option disabled="" selected=""></option>
                                                            <option value="0">Transporte Sencillo</option>
                                                            <option value="1">Transporte Redondo</option>
                                                            <option value="2">Hospedaje</option>
                                                            <option value="3">Evento</option>
                                                            <option value="4">Experiencia Individual</option>
                                                            <option value="5">Experiencia Grupal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="departure">
                                                        <label class="control-label">Fecha de Salida</label>
                                                        <input type="date" id="departureDate" name="departureDate"
                                                            class="form-control">
                                                    </div>
                                                    <div class="output" id="return" style="display:none;">
                                                        <div class="form-group output cero" id="cero">
                                                            <label class="control-label">Fecha de Regreso</label>
                                                            <input type="date" id="returnDate" name="returnDate" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div id="transportBlock" style="display:none;">
                                                        <div class="form-group">
                                                            <label class="control-label">Selecciona Transportación</label>
                                                            <select class="form-control" name="transport" id="transport" required>
                                                                <option value="">---Selecciona tipo de transporte---</option>
                                                                <option value="Transportación Aérea">Transportación Aérea</option>
                                                                <option value="Transportación Terrestre">Transportación Terrestre</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-sm-6" id="air" style="display:none;">
                                                        <div class="choice" data-toggle="wizard-radio" rel="tooltip"
                                                            title="Selecciona esta opción si deseas transporte aereo.">
                                                            <input type="radio" id="transport" name="transport" value="0">
                                                            <div class="icon">
                                                                <i class="material-icons">airplanemode_active</i>
                                                            </div>
                                                            <h6>Transportación Aérea </h6>
                                                        </div>
                                                    </div> --}}
                                                    {{-- <div class="col-sm-6" id="land" style="display:none;">
                                                        <div class="choice" data-toggle="wizard-radio" rel="tooltip"
                                                            title="Selecciona esta opción si deseas transporte terrestre.">
                                                            <input type="radio" id="transport" name="transport" value="1">
                                                            <div class="icon">
                                                                <i class="material-icons">directions_bus</i>
                                                            </div>
                                                            <h6>Transportación Terrestre</h6>
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
                                                        <textarea name="trip_description" id="trip_descriptionSave"
                                                            value="{{ old('trip_description') }}" class="form-control"
                                                            placeholder="" rows="6"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Ejemplo</label>
                                                        <p class="description">"Deseo un viaje para 2 personas
                                                            (Adultos),
                                                            me gustaría que el viaje sea personalizado es decir que
                                                            conste
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
                                            <a href="#" id="saveQuoting" class="btn btn-finish btn-fill btn-purple btn-wd"
                                                name="saveQuoting">Finalizar</a>
                                            {{-- <input type='submit' class='btn btn-finish btn-fill btn-purple btn-wd'
                                                value='Finalizar' /> --}}
                                        </div>
                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd'
                                                name='previous' value='Anterior' />

                                            <div class="footer-checkbox">
                                                <div class="col-sm-12">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="suscribe" checked required>
                                                        </label>
                                                        Acepto que Viájate Mx use mis datos para enviarme información
                                                        que
                                                        pueda ser de mi interés (Requerido)
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
    $(function () {
        $('#conceptSave').change(function () {
            var val = $(this).val();
            if (val === "0") {
                $("#transportBlock").show();
                $("#return").hide();
            }
            if (val === "1") {
                $("#return").show();
                $("#transportBlock").show();
                // $("#land").show();
            }
            if (val === "2") {
                $("#return").hide();
                $("#transportBlock").hide();
            }
            if (val === "3") {
                $("#return").hide();
                $("#transportBlock").hide();
            }
            if (val === "4") {
                $("#return").hide();
                $("#transportBlock").hide();
            }
            if (val === "5") {
                $("#return").hide();
                $("#transportBlock").hide();
            }
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
<script>
    $("#saveQuoting").click(function () {
        var concept = $('#conceptSave').val();
        var destination = $("#destinationSave").val();
        var phone = $("#phoneSave").val();
        var email = $("#emailSave").val();
        var departure_date = $("#departureDate").val();
        var return_date = $("#returnDate").val();
        var transport = $("#transport").val();
        var name_client = $("#nameSave").val();
        var trip_description = $("#trip_descriptionSave").val();
        var route = "/guardar/cotizacion"

        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            data: {
                name_client: name_client,
                concept: concept,
                destination: destination,
                phone: phone,
                email: email,
                departure_date: departure_date,
                return_date: return_date,
                transport: transport,
                trip_description: trip_description
            },
            beforeSend: function () {
                $("#preloader").css("display", "block");
            },
            success: function () {
                $("#preloader").css("display", "none");
                $('#conceptSave').val('');
                $('#destinationSave').val('');
                $('#phoneSave').val('');
                $('#emailSave').val('');
                // $('#birthdateSave').val('');
                $("#nameSave").val('');
                // $("#facebookSave").val('');
                $("#trip_descriptionSave").val('');
                $('#message-error').css('display', 'none');

                toastr.success("Hemos recibido tu solicitud, te contactaremos a la brevedad.",
                    "¡Bien hecho!");
                location.reload();
            },
            error: function (data) {
                $("#preloader").css("display", "none");
                var response = JSON.parse(data.responseText);
                $.each(response.errors, function (key, value) {
                    toastr.error(value, "¡Error!");
                });
            }
        });
    })

</script>

</html>
