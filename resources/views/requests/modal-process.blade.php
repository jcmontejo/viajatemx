<div class="modal fade" id="modalProcess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title" style="font-size:30px;">Procesar Cotización <i class="fas fa-share-square"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 grid-margin">
                    <div id='message-error-send' class="alert alert-danger alert-dismissible fade show" role='alert'
                        style="display: none">
                        <strong id="error-send"></strong>
                    </div>
                    <form class="forms-sample" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="hidden" id="idProcess">
                                <label for="exampleInputEmail1">Empleado que Envia Cotización</label>
                                <input type="text" name="attended" id="attended" value="{{Auth::user()->name}} {{Auth::user()->lastname}}"
                                    class="form-control" readonly required />
                            </div>
                            <div class="form-group col-md-3">
                                <input type="hidden" id="id">
                                <label for="exampleInputEmail1">Medio de Envío</label>
                                <select class="form-control" name="medium" id="medium" required>
                                    <option>WhatsApp</option>
                                    <option>Correo Electrónico</option>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <input type="hidden" id="id">
                                <label for="exampleInputEmail1">Fecha de Envío</label>
                                <input type="date" value="{{ Carbon\Carbon::now()->toDateString() }}" name="date_send"
                                    id="date_send" class="form-control" placeholder="dd/mm/yyyy" required />
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputPassword1">Notas</label>
                                <textarea class="form-control" rows="5" id="notes" name="notes"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputPassword1">Adjuntar Archivo PDF/DOCX</label>
                                <input type="file" name="file" id="file" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mt-4 pr-4 pl-4" data-dismiss="modal">Cerrar</button>
                <a href="#" id="sendQuotation" class="btn btn-primary mt-4 pr-4 pl-4" name="sendQuotation">Enviar</a>
            </div>
        </div>
    </div>
</div>
