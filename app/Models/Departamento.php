<?php
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'tbl_Departamento';
    protected $primaryKey = 'idDepartamento';
    public $timestamps = true;

    protected $fillable = [
        'nombreDepartamento',
    ];

    // Relación uno a muchos con Ciudad
    public function ciudades()
    {
        return $this->hasMany(Ciudad::class, 'idDepartamento');
    }
}