<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function dashboard(): View
    {
        return view('cliente.dashboard', [
            'user' => Auth::user(),
        ]);
    }
}
