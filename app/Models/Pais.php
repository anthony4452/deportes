<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'paises';

    protected $fillable = [
        'pais'
    ];

    public function deportistas()
    {
        return $this->hasMany(Deportista::class);
    }
}
