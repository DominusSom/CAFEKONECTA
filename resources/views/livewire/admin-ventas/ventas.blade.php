<div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3> Ventas <a href="/ventas/create"><button class="btn btn-success">Nuevo</button></a></h3>
        </div>
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Buscar...">
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre Producto - Referencia</th>
                        <th>Cantidad</th>
                        <th>Total Venta</th>
                        <th>Fecha Creación</th>
                        <th>Opciones</th>
                    </thead>
                   @foreach ($ventas as $v)
                    <tr>
                        <td>{{ $v->id}}</td>
                        <td>{{ $v->nombre_de_producto}} - {{$v->referencia}}</td>
                        <td>{{ $v->cantidad}}</td>
                        <td>$ {{ $v->total_venta}}</td>
                        <td>{{ $v->created_at}}</td>
                        <td>
                            <button wire:click="destroy({{ $v->id }})" class="btn btn-danger">
                                Anular Venta
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            {{$ventas->render()}}
        </div>
    </div>
</div>
