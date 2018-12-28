<div class="table-responsive">
    <table class="table table-striped" id="sales">
        <thead>
            <tr class="bg-primary text-white">
                <th>Fecha Venta</th>
                <th>Proveedor</th>
                <th>Cliente</th>
                <th>Pasajero</th>
                <th>Clave</th>
                <th>Destino</th>
                <th>Estatus de Pago</th>
                <th>Total</th>
                <th>Pagado</th>
                <th>Debe</th>
                <th>Acciones</th>
                {{ csrf_field() }}
            </tr>
        </thead>
        <tbody>
            @forelse ($sales as $item)
            @include('sales.modal-data')
            <tr>
                <td>{{$item->date}}</td>
                <td>{{$item->provider}}</td>
                <td>{{$item->client}}</td>
                <td>{{$item->passenger}}</td>
                <td>{{$item->key}}</td>
                <td>{{$item->destination}}</td>
                <td>{{$item->payment_status}}</td>
                <td class="bg-warning">${{number_format($item->commission_price)}}</td>
                <td class="bg-success">${{number_format($item->paid_out)}}</td>
                <td class="bg-danger">${{number_format($item->debt)}}</td>
                <td class="text-right sorting_1">
                    <div class="btn-group">
                        @can('ver_detalle_venta')
                        <a href="" class="btn btn-rounded btn-xs btn-info mb-3" data-toggle="modal"
                            data-target="#data_{{$item->id}}"><i class="mdi mdi-account-search btn-icon-append"></i>Detalles</a>
                        @endcan
                        <a href="#" class="btn btn-rounded btn-xs btn-success mb-3" OnClick='Mostrar({{$item->id}});'
                            data-toggle='modal' data-target='#myModal'><i class="mdi mdi-cash-usd btn-icon-append"></i>Pagar</a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="11" style="font-size:30px;">No hay cuentas por cobrar.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="text-center">
    {!!$sales->links()!!}
</div>