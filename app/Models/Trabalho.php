<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Trabalho extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'resumo',
        'protocolo',
        'curso',
        'modelo_avaliativo',
        'media_final',
        'simposio_id',
        'created_at',
        'updated_at',
    ];

    protected static function boot()
    {
        parent::boot();

    }

    // Relacionamento com as avaliações
    public function avaliacoes()
    {
        return $this->hasMany(Avaliacoes::class);
    }

    // Relacionamento com o usuário avaliador
    public function avaliadores()
    {
        return $this->belongsToMany(User::class, 'trabalho_avaliadores', 'trabalho_id', 'avaliador_id');
    }

    public function simposio()
    {
        return $this->belongsTo(Simposio::class);
    }

}
