<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projecto;
use Illuminate\Http\Request;

class ProjectosAdminController extends Controller
{
    public function index()
    {
        $projectos = Projecto::orderBy('ordem')->orderBy('id')->paginate(20);
        return view('admin.projectos.index', compact('projectos'));
    }

    public function create()
    {
        return view('admin.projectos.create');
    }

    public function store(Request $request)
    {
        Projecto::create($this->validated($request));
        return redirect()->route('admin.projectos.index')
            ->with('success', 'Projecto criado com sucesso.');
    }

    public function edit(Projecto $projecto)
    {
        return view('admin.projectos.edit', compact('projecto'));
    }

    public function update(Request $request, Projecto $projecto)
    {
        $projecto->update($this->validated($request));
        return redirect()->route('admin.projectos.index')
            ->with('success', 'Projecto atualizado com sucesso.');
    }

    public function destroy(Projecto $projecto)
    {
        $projecto->delete();
        return redirect()->route('admin.projectos.index')
            ->with('success', 'Projecto removido com sucesso.');
    }

    public function toggleAtivo(Projecto $projecto)
    {
        $projecto->update(['ativo' => ! $projecto->ativo]);
        return back()->with('success', 'Estado do projecto atualizado.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'titulo'       => 'required|string|max:150',
            'titulo_en'    => 'nullable|string|max:150',
            'titulo_fr'    => 'nullable|string|max:150',
            'local'        => 'nullable|string|max:100',
            'tipo'         => 'required|in:consultoria,formacao,equipamentos',
            'descricao'    => 'required|string',
            'descricao_en' => 'nullable|string',
            'descricao_fr' => 'nullable|string',
            'resultado'    => 'nullable|string|max:250',
            'resultado_en' => 'nullable|string|max:250',
            'resultado_fr' => 'nullable|string|max:250',
            'foto'         => 'nullable|string|max:150',
            'cor'          => 'required|string|max:30',
            'ordem'        => 'nullable|integer|min:0',
            'destaque'     => 'nullable|boolean',
            'ativo'        => 'nullable|boolean',
        ]);
    }
}
