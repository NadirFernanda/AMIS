<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projecto extends Model
{
    protected $table = 'projectos';

    protected $fillable = [
        'titulo', 'local', 'tipo', 'descricao', 'resultado',
        'foto', 'cor', 'ordem', 'destaque', 'ativo',
    ];

    protected $casts = ['destaque' => 'boolean', 'ativo' => 'boolean'];

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true)->orderBy('ordem')->orderBy('id');
    }

    public function scopeDestaque($query)
    {
        return $query->where('ativo', true)->where('destaque', true)->orderBy('ordem')->orderBy('id');
    }

    public function getTipoLabelAttribute(): string
    {
        return match($this->tipo) {
            'consultoria'  => 'Consultoria',
            'formacao'     => 'Formação',
            'equipamentos' => 'Equipamentos',
            default        => ucfirst($this->tipo),
        };
    }
}
