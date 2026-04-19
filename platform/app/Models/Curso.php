<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'descricao', 'nivel', 'duracao', 'modalidade',
        'preco_usd', 'preco_aoa', 'cor', 'topicos', 'ativo', 'destaque', 'ordem',
    ];

    protected $casts = [
        'topicos'  => 'array',
        'ativo'    => 'boolean',
        'destaque' => 'boolean',
    ];

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true)->orderBy('ordem')->orderBy('id');
    }

    public function scopeDestaque($query)
    {
        return $query->where('ativo', true)->where('destaque', true)->orderBy('ordem')->orderBy('id');
    }
}
