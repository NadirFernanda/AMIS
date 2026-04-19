<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientesAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'cliente')->latest();

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%")
                  ->orWhere('empresa', 'like', "%{$s}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $clientes = $query->paginate(15)->withQueryString();

        return view('admin.clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('admin.clientes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'empresa'  => 'nullable|string|max:255',
            'telefone' => 'nullable|string|max:30',
            'status'   => 'required|in:ativo,inativo,pendente',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data['role'] = 'cliente';
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente criado com sucesso.');
    }

    public function show(User $cliente)
    {
        abort_if($cliente->role !== 'cliente', 404);
        return view('admin.clientes.show', compact('cliente'));
    }

    public function edit(User $cliente)
    {
        abort_if($cliente->role !== 'cliente', 404);
        return view('admin.clientes.edit', compact('cliente'));
    }

    public function update(Request $request, User $cliente)
    {
        abort_if($cliente->role !== 'cliente', 404);

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $cliente->id,
            'empresa'  => 'nullable|string|max:255',
            'telefone' => 'nullable|string|max:30',
            'status'   => 'required|in:ativo,inativo,pendente',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $cliente->update($data);

        return redirect()->route('admin.clientes.show', $cliente)
            ->with('success', 'Cliente atualizado com sucesso.');
    }

    public function destroy(User $cliente)
    {
        abort_if($cliente->role !== 'cliente', 404);
        $cliente->delete();

        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente removido com sucesso.');
    }

    public function toggleStatus(User $cliente)
    {
        abort_if($cliente->role !== 'cliente', 404);

        $cliente->update([
            'status' => $cliente->status === 'ativo' ? 'inativo' : 'ativo',
        ]);

        return back()->with('success', 'Estado atualizado.');
    }
}
