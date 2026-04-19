<?php

namespace App\Http\Controllers;

use App\Models\Testemunho;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function dashboard(): View
    {
        return view('cliente.dashboard', [
            'user'             => Auth::user(),
            'jaTestemunhou'    => Testemunho::where('nome', Auth::user()->name)
                                            ->exists(),
        ]);
    }

    public function storeTestemunho(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'cargo'  => 'required|string|max:100',
            'texto'  => 'required|string|min:20|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Testemunho::create([
            'nome'    => $user->name,
            'cargo'   => $validated['cargo'],
            'empresa' => $user->empresa ?? '',
            'texto'   => $validated['texto'],
            'rating'  => $validated['rating'],
            'ativo'   => false, // aguarda aprovação do admin
        ]);

        return back()->with('testemunho_enviado', true);
    }
}
