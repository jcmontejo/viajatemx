<div class="modal fade" id="modalSale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title" style="font-size:30px;">Finalizar Venta <i class="fas fa-piggy-bank"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 grid-margin">
                    <div id='message-error-sale' class="alert alert-danger alert-dismissible fade show" role='alert'
                        style="display: none">
                        <strong id="error-sale"></strong>
                    </div>
                    <form class="forms-sample">
                        {{-- Hidden --}}
                        <input type="hidden" name="idQuotation" id="idQuotation">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="hidden" id="idProcess">
                                <label for="exampleInputEmail1">Fecha de Venta</label>
                                <input type="date" name="dateSale" id="dateSale" value="{{ Carbon\Carbon::now()->toDateString() }}"
                                    class="form-control" required />
                            </div>
                            <div class="form-group col-md-6">
                                <input type="hidden" id="id">
                                <label for="exampleInputEmail1">Proveedor</label>
                                <select class="form-control" name="providerSale" id="providerSale" required>
                                    @forelse ($providers as $provider)
                                    <option value="{{$provider->name}}">{{$provider->name}}</option>
                                    @empty
                                    <option>NO HAY REGISTROS</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Nombre del Pasajero</label>
                                <input type="text" name="passengerSale" id="passengerSale" class="form-control"
                                    required />
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputPassword1">Clave</label>
                                <input type="text" name="keySale" id="keySale" class="form-control" required />
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputPassword1">Ruta</label>
                                <select class="form-control" name="routeSale" id="routeSale" required>
                                    @forelse ($routes as $route)
                                    <option value="{{$route->name}}">{{$route->name}}</option>
                                    @empty
                                    <option>NO HAY REGISTROS</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Fecha de Salida</label>
                                <input type="date" name="departure_dateSale" id="departure_dateSale" class="form-control"
                                    required />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Hora de Salida</label>
                                <input type="text" name="scheduleSale" id="scheduleSale" class="form-control" required />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Precio Unitario</label>
                                <input type="number" name="unit_priceSale" id="unit_priceSale" class="form-control"
                                    required />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Precio Comisión</label>
                                <input type="number" name="commission_priceSale" id="commission_priceSale" class="form-control"
                                    required />
                            </div>
                            <div class="form-group col-md-6">
                                <input type="hidden" id="id">
                                <label for="exampleInputEmail1">TDC</label>
                                <select class="form-control" name="tdcSale" id="tdcSale" required>
                                    @forelse ($cards as $card)
                                    <option value="{{$card->id}}">{{$card->name_account}}</option>
                                    @empty
                                    <option>NO HAY REGISTROS</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="hidden" id="id">
                                <label for="exampleInputEmail1">Estatus de Pago</label>
                                <select class="form-control" name="payment_statusSale" id="payment_statusSale" required>
                                    <option value="PAGADO">Pagado</option>
                                    <option value="PARCIAL">PARCIAL</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="hidden" id="id">
                                <label for="exampleInputEmail1">Total Pagado</label>
                                <input type="number" name="paid_outSale" id="paid_outSale" class="form-control" required />
                            </div>
                            <div class="form-group col-md-6">
                                <input type="hidden" id="id">
                                <label for="exampleInputEmail1">Forma de Pago</label>
                                <select class="form-control" name="way_to_paySale" id="way_to_paySale" required>
                                    <option value="EFECTIVO">Efectivo</option>
                                    <option value="TRANSFERENCIA">Transferencia</option>
                                    <option value="TARJETA DEBITO/CRÉDITO">Tarjeta Débito/Crédito</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mt-4 pr-4 pl-4" data-dismiss="modal">Cerrar</button>
                <a href="#" id="terminateSale" class="btn btn-primary mt-4 pr-4 pl-4" name="terminateSale">Guardar</a>
            </div>
        </div>
    </div>
</div>
