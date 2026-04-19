<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    protected $table = 'equipa';

    protected $fillable = ['nome', 'slug', 'cargo', 'especializacao', 'bio', 'tags', 'cor', 'ordem', 'ativo'];

    protected $casts = ['tags' => 'array', 'ativo' => 'boolean'];

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true)->orderBy('ordem')->orderBy('id');
    }
}
