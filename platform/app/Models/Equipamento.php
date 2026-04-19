<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $table = 'equipamentos';

    protected $fillable = ['titulo', 'descricao', 'icon_svg', 'ordem', 'ativo'];

    protected $casts = ['ativo' => 'boolean'];

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true)->orderBy('ordem')->orderBy('id');
    }
}
