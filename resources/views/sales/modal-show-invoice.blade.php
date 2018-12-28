<div class="modal fade" id="modalShowInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title" style="font-size:30px;">Detalles de Factura <i class="mdi mdi-qrcode btn-icon-append"></i></h5>
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
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="card">
                                    <div class="card-header">
                                        Fecha de Facturación
                                        <strong><input type="date" id="showDate"></strong>
                                        <span class="float-right"> <strong>Estatus:</strong> <input type="text" id="showStatus"></span>

                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <div class="col-sm-6">
                                                <h6 class="mb-3">Cliente:</h6>
                                                <div>
                                                    <strong><input type="text" id="showClient"></strong>
                                                </div>
                                                <div></div>
                                                <div></div>
                                                <div>Email: <input type="text" id="showEmail"></div>
                                                <div>Teléfono: <input type="text" id="showPhone"></div>
                                            </div>
                                        </div>
                                        <div class="table-responsive-sm">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th class="center">No. Factura</th>
                                                            <th>Concepto</th>
                                                            <th>Descripción</th>
                                                            <th class="right">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="center"><input type="text" id="showNumber"></td>
                                                            <td class="left strong"><input type="text" id="showConcept"></td>
                                                            <td class="left"><input type="text" id="showDescription"></td>
                                                            <td class="right"><input type="text" id="showTotal"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-5">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mt-4 pr-4 pl-4" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
