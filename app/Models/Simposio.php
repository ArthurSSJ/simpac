<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simposio extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'img', 'inicio', 'fim', 'finalizado'];

    public function trabalhos()
    {
        return $this->hasMany(Trabalho::class);
    }
}

