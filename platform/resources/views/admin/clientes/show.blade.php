<x-layouts.admin>
    <x-slot name="title">{{ $cliente->name }}</x-slot>

    <div class="mb-6">
        <a href="{{ route('admin.clientes.index') }}" class="text-sm text-slate-500 hover:text-[#1a3a5c] flex items-center gap-1.5 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Voltar à lista
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Perfil --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6 flex flex-col items-center text-center">
            <div class="w-20 h-20 rounded-full bg-[#1a3a5c]/10 flex items-center justify-center mb-4">
                <span class="text-[#1a3a5c] font-extrabold text-3xl">{{ strtoupper(substr($cliente->name, 0, 1)) }}</span>
            </div>
            <h2 class="text-lg font-bold text-[#0f2640]">{{ $cliente->name }}</h2>
            <p class="text-slate-400 text-sm">{{ $cliente->email }}</p>
            @if($cliente->empresa)
            <p class="mt-1 text-slate-500 text-sm">{{ $cliente->empresa }}</p>
            @endif
            <span class="mt-3 inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                {{ $cliente->status === 'ativo'    ? 'bg-emerald-100 text-emerald-700' :
                   ($cliente->status === 'pendente' ? 'bg-amber-100 text-amber-700' : 'bg-slate-100 text-slate-500') }}">
                {{ ucfirst($cliente->status) }}
            </span>

            <div class="mt-6 w-full space-y-2">
                <a href="{{ route('admin.clientes.edit', $cliente) }}"
                   class="w-full flex items-center justify-center gap-2 bg-[#1a3a5c] hover:bg-[#0f2640] text-white text-sm font-semibold py-2.5 rounded-xl transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Editar Dados
                </a>

                <form method="POST" action="{{ route('admin.clientes.toggle', $cliente) }}">
                    @csrf @method('PATCH')
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 border border-slate-200 hover:bg-slate-50 text-slate-600 text-sm font-semibold py-2.5 rounded-xl transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                        </svg>
                        {{ $cliente->status === 'ativo' ? 'Desativar Conta' : 'Ativar Conta' }}
                    </button>
                </form>

                <form method="POST" action="{{ route('admin.clientes.destroy', $cliente) }}"
                      onsubmit="return confirm('Eliminar este cliente permanentemente?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 border border-red-200 hover:bg-red-50 text-red-500 text-sm font-semibold py-2.5 rounded-xl transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Eliminar Cliente
                    </button>
                </form>
            </div>
        </div>

        {{-- Detalhes --}}
        <div class="lg:col-span-2 space-y-5">
            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <h3 class="text-sm font-bold text-[#0f2640] mb-4">Informação da Conta</h3>
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach([
                        ['Nome Completo', $cliente->name],
                        ['Email', $cliente->email],
                        ['Empresa', $cliente->empresa ?? '—'],
                        ['Telefone', $cliente->telefone ?? '—'],
                        ['Estado', ucfirst($cliente->status)],
                        ['Registado em', $cliente->created_at->format('d/m/Y \à\s H:i')],
                    ] as [$label, $val])
                    <div>
                        <dt class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">{{ $label }}</dt>
                        <dd class="text-sm text-slate-700 font-medium">{{ $val }}</dd>
                    </div>
                    @endforeach
                </dl>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <h3 class="text-sm font-bold text-[#0f2640] mb-4">Atividade</h3>
                <div class="text-center py-6 text-slate-400 text-sm">
                    Histórico de atividade disponível em breve.
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
