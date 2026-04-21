<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultoria;
use Illuminate\Http\Request;

class ConsultoriasAdminController extends Controller
{
    public function index()
    {
        $consultorias = Consultoria::orderBy('ordem')->orderBy('id')->paginate(20);
        return view('admin.consultorias.index', compact('consultorias'));
    }

    public function create()
    {
        return view('admin.consultorias.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['features']    = $this->parseFeatures($request->features_raw ?? '');
        $data['features_en'] = $this->parseFeatures($request->features_raw_en ?? '');

        Consultoria::create($data);

        return redirect()->route('admin.consultorias.index')
            ->with('success', 'Pacote de consultoria criado com sucesso.');
    }

    public function edit(Consultoria $consultoria)
    {
        return view('admin.consultorias.edit', compact('consultoria'));
    }

    public function update(Request $request, Consultoria $consultoria)
    {
        $data = $this->validated($request);
        $data['features']    = $this->parseFeatures($request->features_raw ?? '');
        $data['features_en'] = $this->parseFeatures($request->features_raw_en ?? '');

        $consultoria->update($data);

        return redirect()->route('admin.consultorias.index')
            ->with('success', 'Pacote atualizado com sucesso.');
    }

    public function destroy(Consultoria $consultoria)
    {
        $consultoria->delete();
        return redirect()->route('admin.consultorias.index')
            ->with('success', 'Pacote eliminado com sucesso.');
    }

    public function toggleAtivo(Consultoria $consultoria)
    {
        $consultoria->update(['ativo' => ! $consultoria->ativo]);
        return back()->with('success', 'Estado do pacote atualizado.');
    }

    // ── helpers ──────────────────────────────────────────────────────────────

    private function validated(Request $request): array
    {
        return $request->validate([
            'titulo'     => 'required|string|max:100',
            'titulo_en'  => 'nullable|string|max:100',
            'tagline'    => 'required|string|max:255',
            'tagline_en' => 'nullable|string|max:255',
            'descricao'  => 'nullable|string',
            'preco_usd'  => 'required|string|max:30',
            'preco_aoa'  => 'required|string|max:50',
            'cor'        => 'required|string|max:30',
            'destaque'   => 'nullable|boolean',
            'ativo'      => 'nullable|boolean',
            'ordem'      => 'nullable|integer|min:0',
        ]);
    }

    private function parseFeatures(string $raw): array
    {
        return array_values(array_filter(
            array_map('trim', explode("\n", $raw))
        ));
    }
}
