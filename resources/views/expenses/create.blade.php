@php
$cards = App\Card::all();
@endphp
<!-- create Expense modal -->
<div class="modal fade" id="createExpense" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Registrar Gasto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('/registrar/gasto')}}">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Fecha de Gasto</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Importe de Gasto</label>
                            <input type="number" name="ammount" class="form-control" placeholder="Introduce Importe de Gasto" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Concepto de Gasto</label>
                        <select name="concept" class="form-control" required>
                            <option>Artículos de Limpieza</option>
                            <option>Combustible</option>
                            <option>Comisión por Depósito o Retiros Efectivo</option>
                            <option>Energía Eléctrica (luz)</option>
                            <option>Fotocopias/Flyers</option>
                            <option>Papeleria y Articulos de Oficina</option>
                            <option>Pasajes</option>
                            <option>Recarga Celular</option>
                            <option>Renta de Inmuebles</option>
                            <option>Renta Internet y Telefonía Fija</option>
                            <option>Servicio Agua Oficinas</option>
                            <option>Software</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Banco</label>
                        <select name="bank" id="" class="form-control" required>
                            @forelse ($cards as $item)
                            <option value="{{$item->id}}">{{$item->name_bank}}</option>
                            @empty
                            <option>NO HAY BANCOS REGISTRADOS</option>
                            @endforelse
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
