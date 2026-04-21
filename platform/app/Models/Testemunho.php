<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\App;

class Testemunho extends Model
{
    protected $table = 'testemunhos';

    protected $fillable = ['nome', 'cargo', 'cargo_en', 'cargo_fr', 'empresa', 'texto', 'texto_en', 'texto_fr', 'rating', 'ativo'];

    protected $casts = ['ativo' => 'boolean', 'rating' => 'integer'];

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true)->orderBy('id');
    }

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
        return Attribute::make(get: fn () => $this->localeValue('cargo'));
    }

    protected function texto(): Attribute
    {
        return Attribute::make(get: fn () => $this->localeValue('texto'));
    }
}
