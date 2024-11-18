<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliacoes extends Model
{
    /**
     * Campos que podem ser preenchidos em massa.
     *
     * @var array
     */
    
    protected $fillable = [
        'trabalho_id',
        'avaliador_id',
        'nota',
    ];

    /**
     * Relacionamento com o modelo Trabalho.
     */
    public function trabalho()
    {
        return $this->belongsTo(Trabalho::class);
    }

    /**
     * Relacionamento com o modelo User (avaliador).
     */
    public function avaliador()
    {
        return $this->belongsTo(User::class, 'avaliador_id');
    }
}