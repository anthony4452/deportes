<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deportista extends Model
{
    protected $table = 'deportistas';

    protected $fillable = [
        'nombre',
        'fecha_nacimiento',
        'estatura',
        'peso',
        'pais_id',
        'disciplina_id'
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }
}
