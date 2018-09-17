<div class="modal" id="data_{{$item->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Solicitud Enviada</h4><button type="button" class="close" data-dismiss="modal">&times;
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Información</h4>
                            <form class="forms-sample">
                                <div class="form-group"><label for="exampleInputUsername1">Nombre de
                                        cliente</label><input type="text" value="{{$item->name_client}}" class="form-control"
                                        readonly></div>
                                <div class="form-group"><label for="exampleInputEmail1">Destino</label><input type="text"
                                        value="{{$item->destination}}" class="form-control" readonly></div>
                                <div class="form-group"><label for="exampleInputPassword1">Fecha de envío</label><input
                                        type="text" value="{{$item->date_send}}" class="form-control" readonly></div>
                                <div class="form-group"><label for="exampleInputPassword1">¿Quién envío?</label><input
                                        type="text" value="{{$item->send}}" class="form-control" readonly></div>
                                <div class="form-group"><label for="exampleInputConfirmPassword1">Medio de
                                        envío</label><input type="text" value="{{$item->medium}}" class="form-control"
                                        readonly></div>
                                <div class="form-group"><label for="exampleInputConfirmPassword1">Notas</label>
                                    <p>
                                        {{$item->notes}}
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button></div>
        </div>
    </div>
</div>
