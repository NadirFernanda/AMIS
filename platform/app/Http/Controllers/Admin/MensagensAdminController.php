<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mensagem;
use Illuminate\Http\Request;

class MensagensAdminController extends Controller
{
    public function index()
    {
        $mensagens = Mensagem::latest()->paginate(20);
        $naoLidas  = Mensagem::naoLidas()->count();
        return view('admin.mensagens.index', compact('mensagens', 'naoLidas'));
    }

    public function show(Mensagem $mensagem)
    {
        if (! $mensagem->lida) {
            $mensagem->update(['lida' => true]);
        }
        return view('admin.mensagens.show', compact('mensagem'));
    }

    public function marcarLida(Mensagem $mensagem)
    {
        $mensagem->update(['lida' => ! $mensagem->lida]);
        return back()->with('success', 'Estado da mensagem atualizado.');
    }

    public function destroy(Mensagem $mensagem)
    {
        $mensagem->delete();
        return redirect()->route('admin.mensagens.index')
            ->with('success', 'Mensagem eliminada.');
    }
}
