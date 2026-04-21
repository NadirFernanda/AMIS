<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\App;

class Estatistica extends Model
{
    protected $table = 'estatisticas';

    protected $fillable = ['chave', 'valor', 'descricao', 'descricao_en', 'descricao_fr', 'icon_path', 'ordem'];

    protected function descricao(): Attribute
    {
        return Attribute::make(get: function () {
            $locale = App::getLocale();
            if ($locale !== 'pt') {
                $translated = $this->getRawOriginal("descricao_{$locale}");
                if (!empty($translated)) return $translated;
            }
            return $this->getRawOriginal('descricao');
        });
    }

    public static function porChave(): array
    {
        return static::orderBy('ordem')->pluck('valor', 'chave')->toArray();
    }

    public static function todos(): \Illuminate\Database\Eloquent\Collection
    {
        return static::orderBy('ordem')->get();
    }
}
