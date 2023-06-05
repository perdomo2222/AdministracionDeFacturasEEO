<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'tbl_Factura';
    protected $primaryKey = 'id_factura';

    protected $fillable = [
        'idRegion',
        'consumokwh',
        'distribucion',
        'tasaMunicipal',
        'cargoPorMora',
        'fechaCreacion',
        'fechaVencimiento',
    ];

    // use HasFactory;
    public $timestamps = false;
}