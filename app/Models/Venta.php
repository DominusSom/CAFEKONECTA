<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    
    protected $table='ventas';
    protected $primaryKey='id';
    public $timestamp=true;

    protected $fillable =[

        'id',
        'id_producto',
        'cantidad',
        'total_venta',
        'created_at',
        
    ];

    protected $guarder=[

    ];
}
