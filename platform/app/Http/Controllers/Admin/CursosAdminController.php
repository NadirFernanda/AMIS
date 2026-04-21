<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursosAdminController extends Controller
{
    public function index()
    {
        $cursos = Curso::orderBy('ordem')->orderBy('id')->paginate(20);
        return view('admin.cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('admin.cursos.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['topicos']    = $this->parseTopicos($request->topicos_raw ?? '');
        $data['topicos_en'] = $this->parseTopicos($request->topicos_raw_en ?? '');
        $data['topicos_fr'] = $this->parseTopicos($request->topicos_raw_fr ?? '');

        Curso::create($data);

        return redirect()->route('admin.cursos.index')
            ->with('success', 'Curso criado com sucesso.');
    }

    public function edit(Curso $curso)
    {
        return view('admin.cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $data = $this->validated($request);
        $data['topicos']    = $this->parseTopicos($request->topicos_raw ?? '');
        $data['topicos_en'] = $this->parseTopicos($request->topicos_raw_en ?? '');
        $data['topicos_fr'] = $this->parseTopicos($request->topicos_raw_fr ?? '');

        $curso->update($data);

        return redirect()->route('admin.cursos.index')
            ->with('success', 'Curso atualizado com sucesso.');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('admin.cursos.index')
            ->with('success', 'Curso eliminado com sucesso.');
    }

    public function toggleAtivo(Curso $curso)
    {
        $curso->update(['ativo' => ! $curso->ativo]);
        return back()->with('success', 'Estado do curso atualizado.');
    }

    // ── helpers ──────────────────────────────────────────────────────────────

    private function validated(Request $request): array
    {
        return $request->validate([
            'titulo'        => 'required|string|max:255',
            'titulo_en'     => 'nullable|string|max:255',
            'titulo_fr'     => 'nullable|string|max:255',
            'descricao'     => 'required|string',
            'descricao_en'  => 'nullable|string',
            'descricao_fr'  => 'nullable|string',
            'nivel'         => 'required|in:Básico,Intermédio,Avançado',
            'nivel_en'      => 'nullable|string|max:50',
            'nivel_fr'      => 'nullable|string|max:50',
            'duracao'       => 'required|string|max:50',
            'duracao_en'    => 'nullable|string|max:50',
            'duracao_fr'    => 'nullable|string|max:50',
            'modalidade'    => 'required|string|max:100',
            'modalidade_en' => 'nullable|string|max:100',
            'modalidade_fr' => 'nullable|string|max:100',
            'preco_usd'     => 'required|string|max:30',
            'preco_aoa'     => 'required|string|max:50',
            'cor'           => 'required|string|max:30',
            'ativo'         => 'nullable|boolean',
            'destaque'      => 'nullable|boolean',
            'ordem'         => 'nullable|integer|min:0',
        ]);
    }

    private function parseTopicos(string $raw): array
    {
        return array_values(array_filter(
            array_map('trim', explode("\n", $raw))
        ));
    }
}
