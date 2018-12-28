{{-- VENTANA MODAL --}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Registrar Pago</h4>
            </div>
            <div class="modal-body">
                <div id='message-error' class="alert alert-danger danger" role='alert' style="display: none">
                    <strong id="error"></strong>
                </div>
                {!! Form::open(['id'=>'form', 'class'=>'form-row']) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <input type="hidden" id="id">
                {{-- @include('genero.form.genero') --}}
                <div class="form-group col-md-4">
                    <input type="hidden" id="idProcess">
                    <label for="exampleInputEmail1">Cliente</label>
                    <input type="text" name="attended" id="clientDebt" class="form-control" readonly required />
                </div>
                <div class="form-group col-md-4">
                    <input type="hidden" id="idProcess">
                    <label for="exampleInputEmail1">Destino</label>
                    <input type="text" name="attended" id="destinationDebt" class="form-control" readonly required />
                </div>
                <div class="form-group col-md-4">
                    <input type="hidden" id="idProcess">
                    <label for="exampleInputEmail1">Costo Total</label>
                    <input type="text" name="attended" id="commission_priceDebt" class="form-control" readonly required />
                </div>
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Adeudo</label>
                    <input type="text" id="debt" class="form-control bg-warning" style="font-size:40px;" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Introduzca Monto a Pagar</label>
                    <input type="number" id="paid_out" style="font-size:40px;" class="form-control" required>
                </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                {!!link_to('#', $title='Actualizar', $attributes = ['id'=>'actualizar', 'class'=>'btn btn-primary'])!!}
            </div>
        </div>
    </div>
</div>
