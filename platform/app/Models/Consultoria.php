<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultoria extends Model
{
    protected $table = 'consultorias';

    protected $fillable = [
        'titulo', 'tagline', 'descricao', 'preco_usd', 'preco_aoa',
        'cor', 'destaque', 'features', 'ativo', 'ordem',
    ];

    protected $casts = [
        'features' => 'array',
        'ativo'    => 'boolean',
        'destaque' => 'boolean',
    ];

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true)->orderBy('ordem')->orderBy('id');
    }
}
