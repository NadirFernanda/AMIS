<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testemunho;
use Illuminate\Http\Request;

class TestemunhosAdminController extends Controller
{
    public function index()
    {
        $testemunhos = Testemunho::orderBy('ativo')->orderBy('id')->paginate(20);
        $pendentes   = Testemunho::where('ativo', false)->count();
        return view('admin.testemunhos.index', compact('testemunhos', 'pendentes'));
    }

    public function create()
    {
        return view('admin.testemunhos.create');
    }

    public function store(Request $request)
    {
        Testemunho::create($this->validated($request));
        return redirect()->route('admin.testemunhos.index')
            ->with('success', 'Testemunho criado com sucesso.');
    }

    public function edit(Testemunho $testemunho)
    {
        return view('admin.testemunhos.edit', compact('testemunho'));
    }

    public function update(Request $request, Testemunho $testemunho)
    {
        $testemunho->update($this->validated($request));
        return redirect()->route('admin.testemunhos.index')
            ->with('success', 'Testemunho atualizado com sucesso.');
    }

    public function destroy(Testemunho $testemunho)
    {
        $testemunho->delete();
        return redirect()->route('admin.testemunhos.index')
            ->with('success', 'Testemunho removido com sucesso.');
    }

    public function toggleAtivo(Testemunho $testemunho)
    {
        $testemunho->update(['ativo' => ! $testemunho->ativo]);
        return back()->with('success', 'Estado do testemunho atualizado.');
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
