<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_clientes'  => User::where('role', 'cliente')->count(),
            'ativos'          => User::where('role', 'cliente')->where('status', 'ativo')->count(),
            'pendentes'       => User::where('role', 'cliente')->where('status', 'pendente')->count(),
            'inativos'        => User::where('role', 'cliente')->where('status', 'inativo')->count(),
        ];

        $recentes = User::where('role', 'cliente')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentes'));
    }
}
