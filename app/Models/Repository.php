<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    //Repositorio habilitado en la tienda
    const HABILITADO = 1;

    //Repositorio no habilitado o eliminado de la tienda virtual
    const INHABILITADO = 0;

    use HasFactory;

    protected $fillable = [
        'nombre_repositorio',
        'sigla',
        'ciudad',
        'correo',
        'nombre_encargado',
        'direccion',
        'ubicacion',
        'horario_atencion',
        'telefono',
        'pagina_web',
        'imagen_repositorio'
    ];

    // relacion 1 a n una Categoria puede tener varios libro
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
