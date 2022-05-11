<?php

namespace App\Http\Livewire\AdminVentas;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Venta;
use App\Models\Producto;
use DB;

class Ventas extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";
    public function render()
    {
        
        $ventas = DB::table('ventas as v')
            ->join('productos as p','v.id_producto','p.id')
            ->select('v.id','v.id_producto','v.cantidad','v.total_venta','v.created_at','p.nombre_de_producto', 'p.referencia')
            ->where('v.id', 'LIKE', '%' . $this->search . '%')
            ->orwhere('p.nombre_de_producto', 'LIKE', '%' . $this->search . '%')
            ->orwhere('v.created_at', 'LIKE', '%' . $this->search . '%')
            ->orderBy('v.id', 'desc')
            ->paginate(8);

        return view('livewire.admin-ventas.ventas', compact('ventas'));
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $cantidad = $venta->cantidad;
        $id_p = $venta->id_producto;
        
        $producto = Producto::findOrFail($id_p);
        $stock = $producto->stock;
        $producto->stock = $stock + $cantidad;
        $producto->update();
        Venta::destroy($id);
    }
}
