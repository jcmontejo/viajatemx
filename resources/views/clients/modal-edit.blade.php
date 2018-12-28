<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Editar Cliente</h5>
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
                                <label for="exampleInputEmail1">Alias</label>
                                <input type="text" class="form-control form-control-lg" id="brandEdit" placeholder="Introduce Alias">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="exampleInputPassword1">Nombre Completo</label>
                                <input type="email" class="form-control form-control-lg" id="nameEdit" placeholder="Introduce Nombre">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleInputPassword1">Fecha de nacimiento</label>
                                <input type="date" class="form-control form-control-lg" id="birthdateEdit">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Teléfono</label>
                                <input type="text" class="form-control form-control-lg" id="phoneEdit">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Correo Electrónico</label>
                                <input type="email" class="form-control form-control-lg" id="emailEdit">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputPassword1">Datos Fiscales</label>
                                <textarea class="form-control " name="" id="fiscalDataEdit" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputPassword1">Cuentas en Aerolineas</label>
                                <input type="text" class="form-control form-control-lg" id="airlineAccountsEdit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="updateClient" name="updateClient" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
