<?php

namespace App\Laravue\Models;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'id',
        'proveedor',
        'marca',
        'contacto',
        'telefono',
        'email',
        'pais',
        'direccion',
        'calidad',
        'pedidos',
        'link',
    ];


}
