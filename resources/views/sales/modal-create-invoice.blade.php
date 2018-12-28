<div class="modal fade" id="modalInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title" style="font-size:30px;">Generar Factura <i class="mdi mdi-qrcode btn-icon-append"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 grid-margin">
                    <div id='message-error-invoice' class="alert alert-danger alert-dismissible fade show" role='alert'
                        style="display: none">
                        <strong id="error-invoice"></strong>
                    </div>
                    <form class="forms-sample" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="hidden" id="idsale">
                                <input type="hidden" id="clientsale">
                                <label for="exampleInputUsername1">Número de Factura</label>
                                <input type="text" name="number_invoice" class="form-control" id="number_invoice"
                                    required placeholder="Número de Factura">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Número Fiscal</label>
                                <input type="text" name="fiscal_number" class="form-control"
                                    id="fiscal_number" required placeholder="Número Fiscal">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Cliente</label>
                                <input type="text" name="client" class="form-control"
                                    id="client" required readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Razón Social</label>
                                <input type="text" name="business_name" class="form-control"
                                    id="business_name" required placeholder="Introduce Razón Social">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="exampleInputPassword1">RFC</label>
                                <input type="text" name="rfc" class="form-control"
                                    id="rfc" placeholder="Introduce Datos Fiscales">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Concepto</label>
                                <input type="text" name="concept" class="form-control"
                                    id="concept" required placeholder="Introduce Concepto">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Fecha</label>
                                <input type="date" name="date" class="form-control"
                                    id="date" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Monto</label>
                                <input type="number" name="ammount" class="form-control"
                                    id="ammount" required readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Estatus</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">---SELECCIONA---</option>
                                    <option value="PAGADA">EXPEDIDA</option>
                                    <option value="PENDIENTE">PENDIENTE</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Fecha de Pago</label>
                                <input type="date" name="payment_date" class="form-control"
                                    id="payment_date" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Comisión de Proveedor</label>
                                <input type="number" name="commission_provider" 
                                    class="form-control"
                                    id="commission_provider">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Observaciones</label>
                                <textarea name="observations" id="observations" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mt-4 pr-4 pl-4" data-dismiss="modal">Cerrar</button>
                <a href="#" id="generateInvoice" class="btn btn-primary mt-4 pr-4 pl-4" name="generateInvoice">Guardar</a>
            </div>
        </div>
    </div>
</div>
