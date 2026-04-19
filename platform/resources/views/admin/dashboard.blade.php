<x-layouts.admin>
    <x-slot name="title">Dashboard</x-slot>

    {{-- Stat cards --}}
    <div class="grid grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
        @foreach([
            ['Total Clientes',   $stats['total_clientes'], 'bg-[#1a3a5c]',  '#1a3a5c', 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
            ['Ativos',           $stats['ativos'],          'bg-emerald-600', '#059669', 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['Pendentes',        $stats['pendentes'],       'bg-[#c9922a]',   '#c9922a', 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['Inativos',         $stats['inativos'],        'bg-slate-500',   '#64748b', 'M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636'],
        ] as [$label, $value, $bg, $color, $icon])
        <div class="bg-white rounded-2xl border border-slate-200 p-6 flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0" style="background-color: {{ $color }}18">
                <svg class="w-6 h-6" style="color: {{ $color }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                </svg>
            </div>
            <div>
                <div class="text-2xl font-extrabold text-[#0f2640]">{{ $value }}</div>
                <div class="text-slate-500 text-xs">{{ $label }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Clientes recentes --}}
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
                <h2 class="text-sm font-bold text-[#0f2640]">Clientes Recentes</h2>
                <a href="{{ route('admin.clientes.index') }}" class="text-xs text-[#c9922a] font-semibold hover:underline">
                    Ver todos →
                </a>
            </div>
            @if($recentes->isEmpty())
            <div class="px-6 py-10 text-center text-slate-400 text-sm">Ainda não há clientes registados.</div>
            @else
            <ul class="divide-y divide-slate-100">
                @foreach($recentes as $cliente)
                <li class="flex items-center gap-4 px-6 py-3.5 hover:bg-slate-50 transition-colors">
                    <div class="w-9 h-9 rounded-full bg-[#1a3a5c]/10 flex items-center justify-center shrink-0">
                        <span class="text-[#1a3a5c] font-bold text-sm">{{ strtoupper(substr($cliente->name, 0, 1)) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-semibold text-slate-700 truncate">{{ $cliente->name }}</div>
                        <div class="text-xs text-slate-400 truncate">{{ $cliente->email }}</div>
                    </div>
                    <span class="shrink-0 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold
                        {{ $cliente->status === 'ativo' ? 'bg-emerald-100 text-emerald-700' :
                           ($cliente->status === 'pendente' ? 'bg-amber-100 text-amber-700' : 'bg-slate-100 text-slate-500') }}">
                        {{ ucfirst($cliente->status) }}
                    </span>
                    <a href="{{ route('admin.clientes.show', $cliente) }}" class="text-slate-300 hover:text-[#1a3a5c] transition-colors shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </li>
                @endforeach
            </ul>
            @endif
        </div>

        {{-- Ações rápidas --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h2 class="text-sm font-bold text-[#0f2640] mb-5">Ações Rápidas</h2>
            <div class="space-y-3">
                <a href="{{ route('admin.clientes.create') }}"
                   class="flex items-center gap-3 p-3.5 rounded-xl bg-[#1a3a5c] hover:bg-[#0f2640] text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                    <span class="text-sm font-semibold">Criar Novo Cliente</span>
                </a>
                <a href="{{ route('admin.clientes.index') }}?status=pendente"
                   class="flex items-center gap-3 p-3.5 rounded-xl border border-amber-200 bg-amber-50 hover:bg-amber-100 transition-colors">
                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <div class="text-sm font-semibold text-amber-700">Pendentes de Ativação</div>
                        <div class="text-xs text-amber-500">{{ $stats['pendentes'] }} clientes</div>
                    </div>
                </a>
                <a href="{{ route('admin.clientes.index') }}"
                   class="flex items-center gap-3 p-3.5 rounded-xl border border-slate-200 hover:bg-slate-50 transition-colors">
                    <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                    </svg>
                    <span class="text-sm font-semibold text-slate-700">Ver Todos os Clientes</span>
                </a>
            </div>
        </div>
    </div>
</x-layouts.admin>
