<div class="modal" id="data_{{$item->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalles de Venta</h4><button type="button" class="close" data-dismiss="modal">&times;
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Información General</h4>
                            <form class="forms-sample">
                                <div class="form-group"><label for="exampleInputUsername1">Proveedor</label><input type="text"
                                        value="{{$item->provider}}" class="form-control bg-info text-white" readonly></div>
                                <div class="form-group"><label for="exampleInputUsername1">Nombre de
                                        cliente</label><input type="text" value="{{$item->client}}" class="form-control bg-info text-white"
                                          readonly></div>
                                <div class="form-group"><label for="exampleInputUsername1">Nombre de
                                        Pasajero</label><input type="text" value="{{$item->passenger}}" class="form-control bg-info text-white"
                                        readonly></div>
                                <div class="form-group"><label for="exampleInputUsername1">Destino</label><input type="text"
                                        value="{{$item->destination}}" class="form-control bg-info text-white" readonly></div>
                                <div class="form-group"><label for="exampleInputUsername1">Ruta</label><input type="text"
                                        value="{{$item->route}}" class="form-control bg-info text-white" readonly></div>
                                <div class="form-group"><label for="exampleInputUsername1">Fecha de Salida</label><input
                                        type="text" value="{{$item->departure_date}}" class="form-control bg-info text-white"
                                        readonly></div>
                                <div class="form-group"><label for="exampleInputUsername1">Hora de Salida</label><input
                                        type="text" value="{{$item->schedule}}" class="form-control bg-info text-white"
                                        readonly></div>
                                <div class="form-group"><label for="exampleInputUsername1">Precio Unitario</label><input
                                        type="text" value="${{number_format($item->unit_price,2)}}" class="form-control bg-info text-white"
                                        readonly></div>
                                <div class="form-group"><label for="exampleInputUsername1">Precio Comisión</label><input
                                        type="text" value="${{number_format($item->commission_price,2)}}" class="form-control bg-info text-white"
                                        readonly></div>
                                <div class="form-group"><label for="exampleInputUsername1">TDC</label><input type="text"
                                        value="{{$item->tdc}}" class="form-control bg-info text-white" readonly></div>
                                <div class="form-group"><label for="exampleInputUsername1">Estatus de Pago</label><input
                                        type="text" value="{{$item->payment_status}}" class="form-control bg-info text-white"
                                        readonly></div>
                                <div class="form-group"><label for="exampleInputUsername1">Total Pagado</label><input
                                        type="text" value="${{number_format($item->paid_out,2)}}" class="form-control bg-success text-white"
                                        readonly></div>
                                <div class="form-group"><label for="exampleInputUsername1">Total Restante</label><input
                                        type="text" value="${{number_format($item->debt,2)}}" class="form-control bg-danger text-white"
                                        readonly></div>
                                <div class="form-group"><label for="exampleInputUsername1">Método de Pago</label><input
                                        type="text" value="{{$item->way_to_pay}}" class="form-control bg-info text-white"
                                        readonly></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-block btn-primary" data-dismiss="modal">Cerrar</button></div>
        </div>
    </div>
</div>
