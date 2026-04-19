<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'descricao', 'nivel', 'duracao', 'modalidade',
        'preco_usd', 'preco_aoa', 'cor', 'topicos', 'ativo', 'ordem',
    ];

    protected $casts = [
        'topicos' => 'array',
        'ativo'   => 'boolean',
    ];

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true)->orderBy('ordem')->orderBy('id');
    }
}
