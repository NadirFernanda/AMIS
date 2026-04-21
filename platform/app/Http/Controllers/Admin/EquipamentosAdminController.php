<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipamento;
use Illuminate\Http\Request;

class EquipamentosAdminController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::orderBy('ordem')->orderBy('id')->paginate(20);
        return view('admin.equipamentos.index', compact('equipamentos'));
    }

    public function create()
    {
        return view('admin.equipamentos.create');
    }

    public function store(Request $request)
    {
        Equipamento::create($this->validated($request));
        return redirect()->route('admin.equipamentos.index')
            ->with('success', 'Categoria de equipamento criada.');
    }

    public function edit(Equipamento $equipamento)
    {
        return view('admin.equipamentos.edit', compact('equipamento'));
    }

    public function update(Request $request, Equipamento $equipamento)
    {
        $equipamento->update($this->validated($request));
        return redirect()->route('admin.equipamentos.index')
            ->with('success', 'Categoria atualizada.');
    }

    public function destroy(Equipamento $equipamento)
    {
        $equipamento->delete();
        return redirect()->route('admin.equipamentos.index')
            ->with('success', 'Categoria eliminada.');
    }

    public function toggleAtivo(Equipamento $equipamento)
    {
        $equipamento->update(['ativo' => ! $equipamento->ativo]);
        return back()->with('success', 'Estado atualizado.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'titulo'      => 'required|string|max:150',
            'titulo_en'   => 'nullable|string|max:150',
            'descricao'   => 'required|string',
            'descricao_en'=> 'nullable|string',
            'icon_svg'    => 'nullable|string|max:500',
            'ordem'       => 'nullable|integer|min:0',
            'ativo'       => 'nullable|boolean',
        ]);
    }
}
