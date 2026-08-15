<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $table = 'mensagens';

    protected $fillable = ['name', 'email', 'empresa', 'subject', 'message', 'lida', 'fornecedor_id'];

    protected $casts = ['lida' => 'boolean'];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function scopeNaoLidas($query)
    {
        return $query->where('lida', false);
    }
}
