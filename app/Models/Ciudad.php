<?php

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'tbl_Ciudad';
    protected $primaryKey = 'idCiudad';
    public $timestamps = true;

    protected $fillable = [
        'idDepartamento',
        'nombreCiudad',
    ];

    // Relación muchos a uno con Departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'idDepartamento');
    }

    // Relación uno a muchos con Cliente
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'idCiudad');
    }

    // Relación uno a muchos con Región
    public function regiones()
    {
        return $this->hasMany(Region::class, 'idCiudad');
    }
}