<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $fillable = [
        'referencia',
        'nombre',
        'descripcioncorta',
        'detalle',
        'valor',
        'estado',
        'foto',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'id_categoria');
    }
}
