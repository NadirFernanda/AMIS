<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';

    protected $fillable = [
        'nome_empresa', 'pais', 'cidade', 'website', 'email', 'telefone',
        'descricao', 'descricao_en', 'descricao_fr',
        'cor', 'ordem', 'ativo', 'destaque',
    ];

    protected $casts = ['ativo' => 'boolean', 'destaque' => 'boolean'];

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

    protected function descricao(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->localeValue('descricao') ?? $value
        );
    }

    // ── Relations ────────────────────────────────────────────────────────────

    public function equipamentos(): BelongsToMany
    {
        return $this->belongsToMany(Equipamento::class, 'equipamento_fornecedor');
    }

    // ── Scopes ───────────────────────────────────────────────────────────────

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true)->orderBy('ordem')->orderBy('id');
    }

    public function scopeDestaque($query)
    {
        return $query->where('ativo', true)->where('destaque', true)->orderBy('ordem')->orderBy('id');
    }
}
