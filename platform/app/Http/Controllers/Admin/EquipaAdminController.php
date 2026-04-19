<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membro;
use Illuminate\Http\Request;

class EquipaAdminController extends Controller
{
    public function index()
    {
        $membros = Membro::orderBy('ordem')->orderBy('id')->paginate(20);
        return view('admin.equipa.index', compact('membros'));
    }

    public function create()
    {
        return view('admin.equipa.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['tags'] = $this->parseTags($request->tags_raw ?? '');
        Membro::create($data);
        return redirect()->route('admin.equipa.index')
            ->with('success', 'Membro adicionado com sucesso.');
    }

    public function edit(Membro $membro)
    {
        return view('admin.equipa.edit', compact('membro'));
    }

    public function update(Request $request, Membro $membro)
    {
        $data = $this->validated($request);
        $data['tags'] = $this->parseTags($request->tags_raw ?? '');
        $membro->update($data);
        return redirect()->route('admin.equipa.index')
            ->with('success', 'Membro atualizado com sucesso.');
    }

    public function destroy(Membro $membro)
    {
        $membro->delete();
        return redirect()->route('admin.equipa.index')
            ->with('success', 'Membro removido com sucesso.');
    }

    public function toggleAtivo(Membro $membro)
    {
        $membro->update(['ativo' => ! $membro->ativo]);
        return back()->with('success', 'Estado do membro atualizado.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'nome'           => 'required|string|max:150',
            'cargo'          => 'required|string|max:100',
            'especializacao' => 'nullable|string|max:100',
            'bio'            => 'required|string',
            'cor'            => 'required|string|max:30',
            'ordem'          => 'nullable|integer|min:0',
            'ativo'          => 'nullable|boolean',
        ]);
    }

    private function parseTags(string $raw): array
    {
        return array_values(array_filter(
            array_map('trim', explode(',', $raw))
        ));
    }
}
