<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\App;

class Projecto extends Model
{
    protected $table = 'projectos';

    protected $fillable = [
        'titulo', 'titulo_en', 'titulo_fr',
        'descricao', 'descricao_en', 'descricao_fr',
        'resultado', 'resultado_en', 'resultado_fr',
        'local', 'tipo', 'foto', 'cor', 'ordem', 'destaque', 'ativo',
    ];

    protected $casts = ['destaque' => 'boolean', 'ativo' => 'boolean'];

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

    protected function resultado(): Attribute
    {
        return Attribute::make(get: fn() => $this->localeValue('resultado'));
    }

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true)->orderBy('ordem')->orderBy('id');
    }

    public function scopeDestaque($query)
    {
        return $query->where('ativo', true)->where('destaque', true)->orderBy('ordem')->orderBy('id');
    }

    public function getTipoLabelAttribute(): string
    {
        return match($this->tipo) {
            'consultoria'  => __('projects.type_consulting'),
            'formacao'     => __('projects.type_training'),
            'equipamentos' => __('projects.type_equipment'),
            default        => ucfirst($this->tipo),
        };
    }
}
