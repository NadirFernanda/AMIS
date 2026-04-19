<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depoimento extends Model
{
    protected $table = 'depoimentos';

    protected $fillable = ['nome', 'cargo', 'empresa', 'texto', 'rating', 'ativo'];

    protected $casts = ['ativo' => 'boolean', 'rating' => 'integer'];

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true)->orderBy('id');
    }
}
