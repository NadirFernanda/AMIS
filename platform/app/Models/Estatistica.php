<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estatistica extends Model
{
    protected $table = 'estatisticas';

    protected $fillable = ['chave', 'valor', 'descricao', 'icon_path', 'ordem'];

    public static function porChave(): array
    {
        return static::orderBy('ordem')->pluck('valor', 'chave')->toArray();
    }

    public static function todos(): \Illuminate\Database\Eloquent\Collection
    {
        return static::orderBy('ordem')->get();
    }
}
