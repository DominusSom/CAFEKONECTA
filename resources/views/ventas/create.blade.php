@extends('layout')

@section('content_header')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Venta</h3>
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
<form action="{{route('ventas.store')}}" method="POST">
    @csrf
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <label for="id_producto">Producto</label>
                        <select id="id_producto" name="id_producto" class="form-control" data-live-search="true">
                            <option selected>Seleccionar</option>
                            @foreach($productos as $p)
                                <option value="{{$p->id}}">{{$p->nombre_de_producto}} $ {{$p->precio}} </option>
                            @endforeach
                        </select>
                    </div> 
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" required value="{{ old('cantidad') }}"
                            class="form-control" placeholder="Cantidad...">
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