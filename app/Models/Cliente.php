<?php

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'tbl_Cliente';
    protected $primaryKey = 'nic';
    public $timestamps = true;
    protected $incrementing = false;

    protected $fillable = [
        'nic',
        'nombrecliente',
        'idCiudad',
        'colUrbCanton',
        'direccion',
        'casa',
    ];

    // Relación muchos a uno con Ciudad
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'idCiudad');
    }

    // Relación uno a uno con Región
    public function region()
    {
        return $this->hasOne(Region::class, 'nic');
    }
}