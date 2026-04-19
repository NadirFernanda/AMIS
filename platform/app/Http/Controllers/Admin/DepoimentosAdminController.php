<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Depoimento;
use Illuminate\Http\Request;

class DepoimentosAdminController extends Controller
{
    public function index()
    {
        $depoimentos = Depoimento::orderBy('ativo')->orderBy('id')->paginate(20);
        $pendentes   = Depoimento::where('ativo', false)->count();
        return view('admin.depoimentos.index', compact('depoimentos', 'pendentes'));
    }

    public function create()
    {
        return view('admin.depoimentos.create');
    }

    public function store(Request $request)
    {
        Depoimento::create($this->validated($request));
        return redirect()->route('admin.depoimentos.index')
            ->with('success', 'Depoimento criado com sucesso.');
    }

    public function edit(Depoimento $depoimento)
    {
        return view('admin.depoimentos.edit', compact('depoimento'));
    }

    public function update(Request $request, Depoimento $depoimento)
    {
        $depoimento->update($this->validated($request));
        return redirect()->route('admin.depoimentos.index')
            ->with('success', 'Depoimento atualizado com sucesso.');
    }

    public function destroy(Depoimento $depoimento)
    {
        $depoimento->delete();
        return redirect()->route('admin.depoimentos.index')
            ->with('success', 'Depoimento removido com sucesso.');
    }

    public function toggleAtivo(Depoimento $depoimento)
    {
        $depoimento->update(['ativo' => ! $depoimento->ativo]);
        return back()->with('success', 'Estado do depoimento atualizado.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'nome'    => 'required|string|max:100',
            'cargo'   => 'required|string|max:100',
            'empresa' => 'required|string|max:100',
            'texto'   => 'required|string',
            'rating'  => 'nullable|integer|min:1|max:5',
            'ativo'   => 'nullable|boolean',
        ]);
    }
}
