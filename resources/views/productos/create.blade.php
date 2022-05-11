@extends('layout')

@section('content_header')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Producto</h3>
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
<form action="{{route('productos.store')}}" method="POST">
    @csrf
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre_de_producto">Nombre de producto</label>
                        <input type="text" name="nombre_de_producto" required value="{{ old('nombre_de_producto') }}"
                            class="form-control" placeholder="Nombre de Producto...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="referencia">Referencia</label>
                        <input type="text" name="referencia" required value="{{ old('referencia') }}"
                            class="form-control" placeholder="Referencia...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" name="precio" required value="{{ old('precio') }}" class="form-control"
                            placeholder="Precio...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="peso">Peso</label>
                        <input type="number" name="peso" required value="{{ old('peso') }}" class="form-control"
                            placeholder="Peso...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="categoria">Categoría</label>
                        <input type="text" name="categoria" required value="{{ old('categoria') }}" class="form-control"
                            placeholder="Categoría...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" required value="{{ old('stock') }}" class="form-control"
                            placeholder="Stock...">
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </div>


            </div>
        </div>
    </div>
</form>

@stop

