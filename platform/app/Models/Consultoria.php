<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Consultoria extends Model
{
    protected $table = 'consultorias';

    protected $fillable = [
        'titulo', 'titulo_en',
        'tagline', 'tagline_en',
        'descricao', 'preco_usd', 'preco_aoa',
        'cor', 'destaque', 'features', 'features_en', 'ativo', 'ordem',
    ];

    protected $casts = [
        'features_en' => 'array',
        'ativo'       => 'boolean',
        'destaque'    => 'boolean',
    ];

    // ── Locale-aware accessors ────────────────────────────────────────────────

    protected function titulo(): Attribute
    {
        return Attribute::make(
            get: fn($value) => app()->getLocale() === 'en' && !empty($this->getRawOriginal('titulo_en'))
                ? $this->getRawOriginal('titulo_en')
                : $value
        );
    }

    protected function tagline(): Attribute
    {
        return Attribute::make(
            get: fn($value) => app()->getLocale() === 'en' && !empty($this->getRawOriginal('tagline_en'))
                ? $this->getRawOriginal('tagline_en')
                : $value
        );
    }

    protected function features(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (app()->getLocale() === 'en') {
                    $raw = $this->getRawOriginal('features_en');
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
