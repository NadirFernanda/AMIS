<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PublicController extends Controller
{
    public function home(): View
    {
        return view('pages.home');
    }

    public function services(): View
    {
        return view('pages.services');
    }

    public function courses(): View
    {
        return view('pages.courses');
    }

    public function about(): View
    {
        return view('pages.about');
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
        // Por agora apenas confirma recepção com flash message.

        return redirect()->route('contact')->with('success', 'Mensagem recebida! Entraremos em contacto em até 24 horas.');
    }
}
