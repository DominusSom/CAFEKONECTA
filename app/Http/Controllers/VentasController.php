<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;

use DB;

class VentasController extends Controller
{
    public function index()
    {
        $bandera = 0;
        $mensaje = "si entro ";
        return view('ventas.index', ["bandera" => $bandera, "mensaje" => $mensaje]);
    }

    public function create()
    {
        $productos = DB::table('productos')->get();
        return view(
            "ventas.create",
            ["productos" => $productos]
        );
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $venta = new Venta;
            $venta->id_producto = $request->get('id_producto');
            $venta->cantidad = $request->get('cantidad');

            $producto = Producto::findOrFail($venta->id_producto);
            $stock = $producto->stock;
            $nstock = $stock - $venta->cantidad;

            $producto->stock=$nstock;
            $precio = $producto->precio;

            $total = $precio * $venta->cantidad;
            $venta->total_venta = $total;

            if ($nstock < 0) {
                $mensaje = "Venta anulada, la cantidad solicitada supera el stock, el stock actual para el producto es de: " . $stock;
            } else {
                $producto->update();
                $venta->save();
                $mensaje = "La venta fue exitosa, debe cobrar: $" . $total;
            }
            DB::commit();
            return redirect('ventas')->with('status', $mensaje);
        } catch (\Exception $e) {
            $mensaje = $e;
            DB::rollback();
            return redirect('ventas')->with('status', $mensaje);
        }
    }
}
