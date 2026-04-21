<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $table = 'equipamentos';

    protected $fillable = ['titulo', 'titulo_en', 'titulo_fr', 'descricao', 'descricao_en', 'descricao_fr', 'icon_svg', 'ordem', 'ativo'];

    protected $casts = ['ativo' => 'boolean'];

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

    protected function descricao(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->localeValue('descricao') ?? $value
        );
    }

    // ── Scopes ───────────────────────────────────────────────────────────────

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true)->orderBy('ordem')->orderBy('id');
    }
}
