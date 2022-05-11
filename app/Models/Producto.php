<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='productos';
    protected $primaryKey='id';
    public $timestamp=true;

    protected $fillable =[

        'id',
        'nombre_de_producto',
        'referencia',
        'precio',
        'peso',
        'categoria',
        'stock',
        
    ];

    protected $guarder=[

    ];
}
