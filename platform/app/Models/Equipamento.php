<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $table = 'equipamentos';

    protected $fillable = ['titulo', 'titulo_en', 'descricao', 'descricao_en', 'icon_svg', 'ordem', 'ativo'];

    protected $casts = ['ativo' => 'boolean'];

    // ── Locale-aware accessors ────────────────────────────────────────────────

    protected function titulo(): Attribute
    {
        return Attribute::make(
            get: fn($value) => app()->getLocale() === 'en' && !empty($this->getRawOriginal('titulo_en'))
                ? $this->getRawOriginal('titulo_en')
                : $value
        );
    }

    protected function descricao(): Attribute
    {
        return Attribute::make(
            get: fn($value) => app()->getLocale() === 'en' && !empty($this->getRawOriginal('descricao_en'))
                ? $this->getRawOriginal('descricao_en')
                : $value
        );
    }

    // ── Scopes ───────────────────────────────────────────────────────────────

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true)->orderBy('ordem')->orderBy('id');
    }
}
