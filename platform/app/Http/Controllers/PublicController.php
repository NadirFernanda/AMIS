<?php

namespace App\Http\Controllers;

use App\Models\Consultoria;
use App\Models\Membro;
use App\Models\Equipamento;
use App\Models\Estatistica;
use App\Models\Fornecedor;
use App\Models\Mensagem;
use App\Models\Projecto;
use App\Models\Testemunho;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PublicController extends Controller
{
    public function home(): View
    {
        $fornecedoresDestaque = Fornecedor::destaque()->limit(3)->get();
        if ($fornecedoresDestaque->count() < 3) {
            $fornecedoresDestaque = Fornecedor::ativos()->limit(3)->get();
        }
        $stats = Estatistica::todos();
        $projectos    = Projecto::destaque()->limit(3)->get();
        $testemunhos = Testemunho::ativos()->limit(3)->get();
        return view('pages.home', compact('fornecedoresDestaque', 'stats', 'projectos', 'testemunhos'));
    }

    public function services(): View
    {
        $consultorias = Consultoria::ativos()->get();
        $equipamentos = Equipamento::ativos()->get();
        return view('pages.services', compact('consultorias', 'equipamentos'));
    }

    public function fornecedores(Request $request): View
    {
        $categorias  = Equipamento::ativos()->get();
        $categoriaId = $request->integer('categoria') ?: null;

        $fornecedores = Fornecedor::ativos()
            ->with('equipamentos')
            ->when($categoriaId, fn ($q) => $q->whereHas('equipamentos', fn ($q2) => $q2->where('equipamentos.id', $categoriaId)))
            ->get();

        return view('pages.fornecedores', compact('categorias', 'fornecedores', 'categoriaId'));
    }

    public function pedirIntroducaoFornecedor(Request $request, Fornecedor $fornecedor): RedirectResponse
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:100'],
            'company' => ['nullable', 'string', 'max:100'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ]);

        Mensagem::create([
            'name'          => $validated['name'],
            'email'         => $validated['email'],
            'empresa'       => $validated['company'] ?? null,
            'subject'       => 'equipamentos',
            'message'       => "Pedido de introdução ao fornecedor \"{$fornecedor->nome_empresa}\":\n\n" . $validated['message'],
            'fornecedor_id' => $fornecedor->id,
        ]);

        return redirect()->route('fornecedores')
            ->with('success', 'Pedido enviado! A nossa equipa vai fazer a ponte com o fornecedor em breve.');
    }

    public function about(): View
    {
        $equipa = Membro::ativos()->get();
        $stats  = Estatistica::todos();
        return view('pages.about', compact('equipa', 'stats'));
    }

    public function projects(): View
    {
        $projectos    = Projecto::ativos()->get();
        $testemunhos = Testemunho::ativos()->get();
        return view('pages.projects', compact('projectos', 'testemunhos'));
    }

    public function fundador(string $slug): View
    {
        $membro   = Membro::where('slug', $slug)->where('ativo', true)->firstOrFail();
        $initials = collect(explode(' ', $membro->nome))
                        ->map(fn($w) => strtoupper(mb_substr($w, 0, 1)))
                        ->filter(fn($c) => ctype_upper($c))
                        ->take(2)
                        ->implode('');
        return view('pages.fundador', compact('membro', 'initials'));
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function sendContact(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:100'],
            'company' => ['nullable', 'string', 'max:100'],
            'subject' => ['required', 'in:consultoria,equipamentos,parceria,outro'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ]);

        // TODO: enviar email via Mail::to(...) na fase de produção
        Mensagem::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'empresa' => $validated['company'] ?? null,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        return redirect()->route('contact')->with('success', 'Mensagem recebida! Entraremos em contacto em até 24 horas.');
    }
}
