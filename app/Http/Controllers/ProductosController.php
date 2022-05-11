<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use DB;

class ProductosController extends Controller
{
    public function index()
    {
        
        return view('productos.index');
    }

    public function create()
    {
        return view(
            "productos.create",
        );
    }

    public function store(Request $request)
    {
        $producto = new Producto;
        $producto->nombre_de_producto = $request->get('nombre_de_producto');
        $producto->referencia = $request->get('referencia');
        $producto->precio = $request->get('precio');
        $producto->peso = $request->get('peso');
        $producto->categoria = $request->get('categoria');
        $producto->stock = $request->get('stock');
        $producto->save();

        return view('productos.index');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);

        return view(
            "productos.edit",
            ["producto" => $producto]
        );
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->nombre_de_producto = $request->get('nombre_de_producto');
        $producto->referencia = $request->get('referencia');
        $producto->precio = $request->get('precio');
        $producto->peso = $request->get('peso');
        $producto->categoria = $request->get('categoria');
        $producto->stock = $request->get('stock');

        $producto->update();

        return view('productos.index');
    }
}
