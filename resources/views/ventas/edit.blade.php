@extends('layout')

@section('content_header')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Producto:</h3>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@stop

@section('content')
    {!! Form::model($producto, ['method' => 'PATCH', 'route' => ['productos.update', $producto->id]]) !!}
    {{ Form::token() }}
    @csrf

    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre_de_producto">Nombre de producto</label>
                <input type="text" name="nombre_de_producto" required value="{{ $producto->nombre_de_producto }}"
                    class="form-control" placeholder="Nombre de Producto...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="referencia">Referencia</label>
                <input type="text" name="referencia" required value="{{ $producto->referencia }}" class="form-control"
                    placeholder="Referencia...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" name="precio" required value="{{ $producto->precio }}" class="form-control"
                    placeholder="Precio...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="peso">Peso</label>
                <input type="number" name="peso" required value="{{ $producto->peso }}" class="form-control"
                    placeholder="Peso...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="categoria">Categoría</label>
                <input type="text" name="categoria" required value="{{ $producto->categoria }}" class="form-control"
                    placeholder="Categoría...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" name="stock" required value="{{ $producto->stock }}" class="form-control"
                    placeholder="Stock...">
            </div>
        </div>


        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>


    </div>



    {!! Form::close() !!}
@stop

