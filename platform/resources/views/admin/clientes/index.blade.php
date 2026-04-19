<x-layouts.admin>
    <x-slot name="title">Clientes</x-slot>

    {{-- Filtros --}}
    <form method="GET" class="flex flex-col sm:flex-row gap-3 mb-6">
        <div class="relative flex-1 max-w-sm">
            <span class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </span>
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Pesquisar nome, email ou empresa..."
                class="w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] bg-white">
        </div>
        <select name="status" onchange="this.form.submit()"
            class="border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 bg-white text-slate-700">
            <option value="">Todos os estados</option>
            <option value="ativo"    {{ request('status') === 'ativo'    ? 'selected' : '' }}>Ativo</option>
            <option value="pendente" {{ request('status') === 'pendente' ? 'selected' : '' }}>Pendente</option>
            <option value="inativo"  {{ request('status') === 'inativo'  ? 'selected' : '' }}>Inativo</option>
        </select>
        @if(request('search') || request('status'))
        <a href="{{ route('admin.clientes.index') }}"
           class="flex items-center gap-1.5 text-sm text-slate-500 hover:text-slate-700 px-3 py-2.5 rounded-xl border border-slate-200 bg-white transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            Limpar
        </a>
        @endif
        <a href="{{ route('admin.clientes.create') }}"
           class="sm:ml-auto flex items-center gap-2 bg-[#c9922a] hover:bg-[#a67a22] text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors whitespace-nowrap">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Novo Cliente
        </a>
    </form>

    {{-- Tabela --}}
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        @if($clientes->isEmpty())
        <div class="py-16 text-center">
            <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <p class="text-slate-500 font-medium">Nenhum cliente encontrado.</p>
            <a href="{{ route('admin.clientes.create') }}" class="mt-3 inline-flex text-[#c9922a] text-sm font-semibold hover:underline">
                Criar primeiro cliente →
            </a>
        </div>
        @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="text-left px-6 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider">Cliente</th>
                        <th class="text-left px-4 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider hidden md:table-cell">Empresa</th>
                        <th class="text-left px-4 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider hidden lg:table-cell">Registado em</th>
                        <th class="text-center px-4 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider">Estado</th>
                        <th class="text-right px-6 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($clientes as $cliente)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-[#1a3a5c]/10 flex items-center justify-center shrink-0">
                                    <span class="text-[#1a3a5c] font-bold text-sm">{{ strtoupper(substr($cliente->name, 0, 1)) }}</span>
                                </div>
                                <div>
                                    <div class="font-semibold text-slate-700">{{ $cliente->name }}</div>
                                    <div class="text-xs text-slate-400">{{ $cliente->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-slate-600 hidden md:table-cell">
                            {{ $cliente->empresa ?? '—' }}
                        </td>
                        <td class="px-4 py-4 text-slate-400 text-xs hidden lg:table-cell">
                            {{ $cliente->created_at->format('d/m/Y') }}
                        </td>
                        <td class="px-4 py-4 text-center">
                            <form method="POST" action="{{ route('admin.clientes.toggle', $cliente) }}" class="inline">
                                @csrf @method('PATCH')
                                <button type="submit" title="Clique para alterar estado"
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold cursor-pointer transition-colors
                                        {{ $cliente->status === 'ativo'    ? 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200' :
                                           ($cliente->status === 'pendente' ? 'bg-amber-100 text-amber-700 hover:bg-amber-200' : 'bg-slate-100 text-slate-500 hover:bg-slate-200') }}">
                                    {{ ucfirst($cliente->status) }}
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.clientes.show', $cliente) }}"
                                   class="text-slate-400 hover:text-[#1a3a5c] transition-colors" title="Ver detalhes">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.clientes.edit', $cliente) }}"
                                   class="text-slate-400 hover:text-[#c9922a] transition-colors" title="Editar">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form method="POST" action="{{ route('admin.clientes.destroy', $cliente) }}"
                                      onsubmit="return confirm('Eliminar {{ addslashes($cliente->name) }}? Esta ação não pode ser revertida.')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-slate-400 hover:text-red-500 transition-colors" title="Eliminar">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Paginação --}}
        @if($clientes->hasPages())
        <div class="px-6 py-4 border-t border-slate-100">
            {{ $clientes->links() }}
        </div>
        @endif
        @endif
    </div>
</x-layouts.admin>
