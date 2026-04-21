<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Consultoria extends Model
{
    protected $table = 'consultorias';

    protected $fillable = [
        'titulo', 'titulo_en', 'titulo_fr',
        'tagline', 'tagline_en', 'tagline_fr',
        'descricao', 'preco_usd', 'preco_aoa',
        'cor', 'destaque', 'features', 'features_en', 'features_fr', 'ativo', 'ordem',
    ];

    protected $casts = [
        'features_en' => 'array',
        'features_fr' => 'array',
        'ativo'       => 'boolean',
        'destaque'    => 'boolean',
    ];

    // ── Locale-aware accessors ────────────────────────────────────────────────

    private function localeValue(string $field): ?string
    {
        $locale = app()->getLocale();
        if ($locale !== 'pt') {
            $translated = $this->getRawOriginal("{$field}_{$locale}");
            if (!empty($translated)) return $translated;
        }
        return null;
    }

    protected function titulo(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->localeValue('titulo') ?? $value
        );
    }

    protected function tagline(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->localeValue('tagline') ?? $value
        );
    }

    protected function features(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $locale = app()->getLocale();
                if ($locale !== 'pt') {
                    $raw = $this->getRawOriginal("features_{$locale}");
                    if (!empty($raw)) {
                        $decoded = is_string($raw) ? json_decode($raw, true) : $raw;
                        if (!empty($decoded)) return $decoded;
                    }
                }
                return is_string($value) ? json_decode($value, true) : ($value ?? []);
            },
            set: fn($value) => ['features' => json_encode(is_array($value) ? $value : [])]
        );
    }

    // ── Scopes ───────────────────────────────────────────────────────────────

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true)->orderBy('ordem')->orderBy('id');
    }
}
