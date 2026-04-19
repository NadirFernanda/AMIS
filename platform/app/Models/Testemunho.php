<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testemunho extends Model
{
    protected $table = 'testemunhos';

    protected $fillable = ['nome', 'cargo', 'empresa', 'texto', 'rating', 'ativo'];

    protected $casts = ['ativo' => 'boolean', 'rating' => 'integer'];

    public function scopeAtivos($query)
    {
        return $query->where('ativo', true)->orderBy('id');
    }
}
