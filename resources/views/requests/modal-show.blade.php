<div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title" style="font-size:50px;">Detalles <i class="fas fa-map"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 grid-margin">
                    <div id='message-error-edit' class="alert alert-danger alert-dismissible fade show" role='alert'
                        style="display: none">
                        <strong id="error-edit"></strong>
                    </div>
                    <form class="forms-sample">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="hidden" id="id">
                                <label for="exampleInputEmail1">Nombre cliente</label>
                                <input type="text" class="form-control form-control-lg" id="nameClient">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="hidden" id="id">
                                <label for="exampleInputEmail1">Teléfono cliente</label>
                                <input type="text" class="form-control form-control-lg" id="phoneClient">
                            </div>
                            <div class="form-group col-md-5">
                                <input type="hidden" id="id">
                                <label for="exampleInputEmail1">Correo Electrónico cliente</label>
                                <input type="text" class="form-control form-control-lg" id="emailClient">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputPassword1">Tipo de Servicio</label>
                                <input type="email" class="form-control form-control-lg" id="concept">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="exampleInputPassword1">Destino</label>
                                <input type="text" class="form-control form-control-lg" id="destination">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Fecha de Salida</label>
                                <input type="date" class="form-control form-control-lg" id="departureDate">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Fecha de Retorno</label>
                                <input type="date" class="form-control form-control-lg" id="returnDate">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputPassword1">Tipo de Transporte</label>
                                <input type="email" class="form-control form-control-lg" id="transport">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputPassword1">Descripción del Viaje</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
