<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\App;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'titulo_en', 'titulo_fr',
        'descricao', 'descricao_en', 'descricao_fr',
        'nivel', 'nivel_en', 'nivel_fr',
        'duracao', 'duracao_en', 'duracao_fr',
        'modalidade', 'modalidade_en', 'modalidade_fr',
        'preco_usd', 'preco_aoa', 'cor',
        'topicos', 'topicos_en', 'topicos_fr',
        'ativo', 'destaque', 'ordem',
    ];

    protected $casts = [
        'topicos'    => 'array',
        'topicos_en' => 'array',
        'topicos_fr' => 'array',
        'ativo'      => 'boolean',
        'destaque'   => 'boolean',
    ];

    private function localeValue(string $field): ?string
    {
        $locale = App::getLocale();
        if ($locale !== 'pt') {
            $translated = $this->getRawOriginal("{$field}_{$locale}");
            if (!empty($translated)) {
                return $translated;
            }
        }
        return $this->getRawOriginal($field);
    }

    protected function titulo(): Attribute
    {
        return Attribute::make(get: fn() => $this->localeValue('titulo'));
    }

    protected function descricao(): Attribute
    {
        return Attribute::make(get: fn() => $this->localeValue('descricao'));
    }

    protected function nivel(): Attribute
    {
        return Attribute::make(get: fn() => $this->localeValue('nivel'));
    }

    protected function duracao(): Attribute
    {
        return Attribute::make(get: fn() => $this->localeValue('duracao'));
    }

    protected function modalidade(): Attribute
    {
        return Attribute::make(get: fn() => $this->localeValue('modalidade'));
    }

    protected function topicos(): Attribute
    {
        return Attribute::make(get: function () {
            $locale = App::getLocale();
            if ($locale !== 'pt') {
                $raw = $this->getRawOriginal("topicos_{$locale}");
                if (!empty($raw)) {
                    $decoded = is_array($raw) ? $raw : json_decode($raw, true);
                    if (!empty($decoded)) return $decoded;
                }
            }
            $raw = $this->getRawOriginal('topicos');
            return is_array($raw) ? $raw : (json_decode($raw, true) ?? []);
        });
    }

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true)->orderBy('ordem')->orderBy('id');
    }

    public function scopeDestaque($query)
    {
        return $query->where('ativo', true)->where('destaque', true)->orderBy('ordem')->orderBy('id');
    }
}
