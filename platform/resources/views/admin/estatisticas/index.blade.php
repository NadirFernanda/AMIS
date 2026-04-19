<x-layouts.admin>
    <x-slot name="title">Estatísticas</x-slot>

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-extrabold text-[#0f2640]">Estatísticas do Site</h1>
            <p class="text-slate-500 text-sm mt-1">Números exibidos na página inicial e em "Sobre Nós".</p>
        </div>
    </div>

    @if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 text-sm flex items-center gap-2">
        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('admin.estatisticas.update') }}" class="max-w-2xl">
        @csrf @method('PUT')

        <div class="bg-white rounded-2xl border border-slate-200 divide-y divide-slate-100">
            @foreach($stats as $i => $stat)
            <div class="p-5 flex items-center gap-5">
                <input type="hidden" name="stats[{{ $i }}][id]" value="{{ $stat->id }}">

                {{-- Preview --}}
                <div class="w-20 shrink-0 text-center">
                    <div class="text-2xl font-extrabold text-[#0f2640]" id="prev_{{ $stat->id }}">{{ $stat->valor }}</div>
                    <div class="text-slate-400 text-xs mt-0.5 truncate">{{ $stat->chave }}</div>
                </div>

                {{-- Valor --}}
                <div class="w-32 shrink-0">
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Valor</label>
                    <input type="text" name="stats[{{ $i }}][valor]" value="{{ old("stats.$i.valor", $stat->valor) }}" required
                           oninput="document.getElementById('prev_{{ $stat->id }}').textContent = this.value"
                           class="w-full border border-slate-300 rounded-xl px-3 py-2 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                </div>

                {{-- Descrição --}}
                <div class="flex-1">
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Descrição</label>
                    <input type="text" name="stats[{{ $i }}][descricao]" value="{{ old("stats.$i.descricao", $stat->descricao) }}"
                           class="w-full border border-slate-300 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-6 flex items-center gap-4">
            <button type="submit"
                class="bg-[#0f2640] hover:bg-[#1a3a5c] text-white font-semibold px-7 py-3 rounded-xl text-sm transition-colors">
                Guardar Estatísticas
            </button>
        </div>
    </form>
</x-layouts.admin>
