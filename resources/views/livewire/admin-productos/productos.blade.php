<div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3> Listado de productos <a href="/productos/create"><button class="btn btn-success">Nuevo</button></a></h3>
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
                        <th>Nombre Producto</th>
                        <th>Referencia</th>
                        <th>Precio</th>
                        <th>Peso</th>
                        <th>Categoría</th>
                        <th>Stock</th>
                        <th>Fecha Creación</th>
                        <th>Opciones</th>
                    </thead>
                   @foreach ($producto as $p)
                    <tr>
                        <td>{{ $p->id}}</td>
                        <td>{{ $p->nombre_de_producto}}</td>
                        <td>{{ $p->referencia}}</td>
                        <td>$ {{ $p->precio}}</td>
                        <td>{{ $p->peso}}</td>
                        <td>{{ $p->categoria}}</td>
                        <td>{{ $p->stock}}</td>
                        <td>{{ $p->created_at}}</td>
                        <td>
                            <a href="{{route('productos.edit',$p->id)}}"><button class="btn btn-info">Editar</button></a>
                            <button wire:click="destroy({{ $p->id }})" class="btn btn-danger">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            {{$producto->render()}}
        </div>
    </div>
</div>
