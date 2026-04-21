<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\App;

class Membro extends Model
{
    protected $table = 'equipa';

    protected $fillable = [
        'nome', 'slug', 'foto',
        'cargo', 'cargo_en', 'cargo_fr',
        'especializacao', 'especializacao_en', 'especializacao_fr',
        'bio', 'bio_en', 'bio_fr',
        'tags', 'cor', 'ordem', 'ativo',
    ];

    protected $casts = ['tags' => 'array', 'ativo' => 'boolean'];

    private function localeValue(string $field): ?string
    {
        $locale = App::getLocale();
        if ($locale !== 'pt') {
            $translated = $this->getRawOriginal("{$field}_{$locale}");
            if (!empty($translated)) return $translated;
        }
        return $this->getRawOriginal($field);
    }

    protected function cargo(): Attribute
    {
        return Attribute::make(get: fn() => $this->localeValue('cargo'));
    }

    protected function especializacao(): Attribute
    {
        return Attribute::make(get: fn() => $this->localeValue('especializacao'));
    }

    protected function bio(): Attribute
    {
        return Attribute::make(get: fn() => $this->localeValue('bio'));
    }

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true)->orderBy('ordem')->orderBy('id');
    }
}
