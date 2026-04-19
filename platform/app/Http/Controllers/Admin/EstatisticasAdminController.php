<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estatistica;
use Illuminate\Http\Request;

class EstatisticasAdminController extends Controller
{
    public function index()
    {
        $stats = Estatistica::orderBy('ordem')->get();
        return view('admin.estatisticas.index', compact('stats'));
    }

    public function update(Request $request)
    {
        $items = $request->validate([
            'stats'             => 'required|array',
            'stats.*.id'        => 'required|integer|exists:estatisticas,id',
            'stats.*.valor'     => 'required|string|max:50',
            'stats.*.descricao' => 'nullable|string|max:150',
        ]);

        foreach ($request->stats as $item) {
            Estatistica::where('id', $item['id'])->update([
                'valor'     => $item['valor'],
                'descricao' => $item['descricao'] ?? null,
            ]);
        }

        return redirect()->route('admin.estatisticas.index')
            ->with('success', 'Estatísticas atualizadas com sucesso.');
    }
}
