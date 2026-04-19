<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projeto;
use Illuminate\Http\Request;

class ProjetosAdminController extends Controller
{
    public function index()
    {
        $projetos = Projeto::orderBy('ordem')->orderBy('id')->paginate(20);
        return view('admin.projetos.index', compact('projetos'));
    }

    public function create()
    {
        return view('admin.projetos.create');
    }

    public function store(Request $request)
    {
        Projeto::create($this->validated($request));
        return redirect()->route('admin.projetos.index')
            ->with('success', 'Projeto criado com sucesso.');
    }

    public function edit(Projeto $projeto)
    {
        return view('admin.projetos.edit', compact('projeto'));
    }

    public function update(Request $request, Projeto $projeto)
    {
        $projeto->update($this->validated($request));
        return redirect()->route('admin.projetos.index')
            ->with('success', 'Projeto atualizado com sucesso.');
    }

    public function destroy(Projeto $projeto)
    {
        $projeto->delete();
        return redirect()->route('admin.projetos.index')
            ->with('success', 'Projeto removido com sucesso.');
    }

    public function toggleAtivo(Projeto $projeto)
    {
        $projeto->update(['ativo' => ! $projeto->ativo]);
        return back()->with('success', 'Estado do projeto atualizado.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'titulo'    => 'required|string|max:150',
            'local'     => 'nullable|string|max:100',
            'tipo'      => 'required|in:consultoria,formacao,equipamentos',
            'descricao' => 'required|string',
            'resultado' => 'nullable|string|max:250',
            'foto'      => 'nullable|string|max:150',
            'cor'       => 'required|string|max:30',
            'ordem'     => 'nullable|integer|min:0',
            'destaque'  => 'nullable|boolean',
            'ativo'     => 'nullable|boolean',
        ]);
    }
}
