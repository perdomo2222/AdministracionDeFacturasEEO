<?php

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'tbl_Region';
    protected $primaryKey = 'idRegion';
    public $timestamps = true;

    protected $fillable = [
        'idCiudad',
        'nic',
    ];

    // Relación muchos a uno con Ciudad
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'idCiudad');
    }

    // Relación uno a uno con Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'nic');
    }

    // Relación uno a muchos con Factura
    public function facturas()
    {
        return $this->hasMany(Factura::class, 'idRegion');
    }
}