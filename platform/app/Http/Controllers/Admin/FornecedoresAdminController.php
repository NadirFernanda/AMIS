<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipamento;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedoresAdminController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::with('equipamentos')->orderBy('ordem')->orderBy('id')->paginate(20);
        return view('admin.fornecedores.index', compact('fornecedores'));
    }

    public function create()
    {
        $categorias = Equipamento::orderBy('ordem')->orderBy('id')->get();
        return view('admin.fornecedores.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $categorias = $data['equipamentos'] ?? [];
        unset($data['equipamentos']);

        $fornecedor = Fornecedor::create($data);
        $fornecedor->equipamentos()->sync($categorias);

        return redirect()->route('admin.fornecedores.index')
            ->with('success', 'Fornecedor adicionado com sucesso.');
    }

    public function edit(Fornecedor $fornecedor)
    {
        $categorias = Equipamento::orderBy('ordem')->orderBy('id')->get();
        $selecionadas = $fornecedor->equipamentos()->pluck('equipamentos.id')->all();
        return view('admin.fornecedores.edit', compact('fornecedor', 'categorias', 'selecionadas'));
    }

    public function update(Request $request, Fornecedor $fornecedor)
    {
        $data = $this->validated($request);
        $categorias = $data['equipamentos'] ?? [];
        unset($data['equipamentos']);

        $fornecedor->update($data);
        $fornecedor->equipamentos()->sync($categorias);

        return redirect()->route('admin.fornecedores.index')
            ->with('success', 'Fornecedor atualizado com sucesso.');
    }

    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();
        return redirect()->route('admin.fornecedores.index')
            ->with('success', 'Fornecedor eliminado.');
    }

    public function toggleAtivo(Fornecedor $fornecedor)
    {
        $fornecedor->update(['ativo' => ! $fornecedor->ativo]);
        return back()->with('success', 'Estado do fornecedor atualizado.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'nome_empresa'   => 'required|string|max:150',
            'pais'           => 'required|string|max:100',
            'cidade'         => 'nullable|string|max:100',
            'website'        => 'nullable|url|max:255',
            'email'          => 'nullable|email|max:150',
            'telefone'       => 'nullable|string|max:50',
            'descricao'      => 'required|string',
            'descricao_en'   => 'nullable|string',
            'descricao_fr'   => 'nullable|string',
            'cor'            => 'required|string|max:30',
            'ordem'          => 'nullable|integer|min:0',
            'ativo'          => 'nullable|boolean',
            'destaque'       => 'nullable|boolean',
            'equipamentos'   => 'nullable|array',
            'equipamentos.*' => 'exists:equipamentos,id',
        ]);
    }
}
