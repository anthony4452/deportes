<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table = 'disciplinas';

    protected $fillable = [
        'disciplina'
    ];

    public function deportistas()
    {
        return $this->hasMany(Deportista::class);
    }
}
