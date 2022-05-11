<?php

namespace App\Http\Livewire\AdminProductos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use DB;

class Productos extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $producto = DB::table('productos as p')
            ->select('p.id', 'p.nombre_de_producto', 'referencia', 'p.precio', 'p.peso', 'p.categoria', 'p.stock', 'created_at')
            ->where('p.id', 'LIKE', '%' . $this->search . '%')
            ->orwhere('p.nombre_de_producto', 'LIKE', '%' . $this->search . '%')
            ->orwhere('p.referencia', 'LIKE', '%' . $this->search . '%')
            ->orwhere('p.precio', 'LIKE', '%' . $this->search . '%')
            ->orwhere('p.categoria', 'LIKE', '%' . $this->search . '%')
            ->orderBy('p.id', 'desc')
            ->paginate(10);
        return view('livewire.admin-productos.productos', compact('producto'));
    }

    public function destroy($id)
    {
        Producto::destroy($id);
    }
}
