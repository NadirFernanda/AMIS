<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Consultoria;
use App\Models\Membro;
use App\Models\Equipamento;
use App\Models\Estatistica;
use App\Models\Mensagem;
use App\Models\Projeto;
use App\Models\Depoimento;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PublicController extends Controller
{
    public function home(): View
    {
        $cursosDestaque = Curso::destaque()->limit(3)->get();
        if ($cursosDestaque->count() < 3) {
            $cursosDestaque = Curso::ativos()->limit(3)->get();
        }
        $stats = Estatistica::todos();
        $projetos    = Projeto::destaque()->limit(3)->get();
        $depoimentos = Depoimento::ativos()->limit(3)->get();
        return view('pages.home', compact('cursosDestaque', 'stats', 'projetos', 'depoimentos'));
    }

    public function services(): View
    {
        $consultorias = Consultoria::ativos()->get();
        $equipamentos = Equipamento::ativos()->get();
        return view('pages.services', compact('consultorias', 'equipamentos'));
    }

    public function courses(): View
    {
        $cursos = Curso::ativos()->get();
        return view('pages.courses', compact('cursos'));
    }

    public function about(): View
    {
        $equipa = Membro::ativos()->get();
        $stats  = Estatistica::todos();
        return view('pages.about', compact('equipa', 'stats'));
    }

    public function projects(): View
    {
        $projetos    = Projeto::ativos()->get();
        $depoimentos = Depoimento::ativos()->get();
        return view('pages.projects', compact('projetos', 'depoimentos'));
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
            'subject' => ['required', 'in:consultoria,formacao,equipamentos,parceria,outro'],
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
