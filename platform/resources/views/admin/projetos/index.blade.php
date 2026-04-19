<x-layouts.admin>
    <x-slot name="title">Projetos</x-slot>

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-extrabold text-[#0f2640]">Projetos</h1>
            <p class="text-slate-500 text-sm mt-1">Portfólio de projetos exibido no site.</p>
        </div>
        <a href="{{ route('admin.projetos.create') }}"
           class="inline-flex items-center gap-2 bg-[#0f2640] hover:bg-[#1a3a5c] text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
            Novo Projeto
        </a>
    </div>

    @if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 text-sm flex items-center gap-2">
        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($projetos as $p)
        @php
            $tipoColors = ['consultoria' => '#1a3a5c', 'formacao' => '#c9922a', 'equipamentos' => '#0d8a7d'];
            $tipoLabels = ['consultoria' => 'Consultoria', 'formacao' => 'Formação', 'equipamentos' => 'Equipamentos'];
            $cor = $tipoColors[$p->tipo] ?? '#1a3a5c';
        @endphp
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-md transition-shadow">
            {{-- Photo/color header --}}
            <div class="relative h-36 overflow-hidden">
                @if($p->foto)
                <img src="/img/{{ $p->foto }}" alt="{{ $p->titulo }}" class="w-full h-full object-cover">
                @else
                <div class="w-full h-full" style="background: linear-gradient(135deg, {{ $cor }}, {{ $cor }}aa);"></div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                <div class="absolute top-3 left-3">
                    <span class="text-xs font-bold uppercase tracking-wider px-2.5 py-1 rounded-full text-white"
                          style="background-color: {{ $cor }};">{{ $tipoLabels[$p->tipo] ?? $p->tipo }}</span>
                </div>
                @if($p->destaque)
                <div class="absolute top-3 right-3">
                    <span class="text-xs font-bold px-2 py-0.5 bg-[#c9922a] text-white rounded-full">Destaque</span>
                </div>
                @endif
            </div>

            <div class="p-5">
                <div class="flex items-start justify-between gap-2 mb-2">
                    <h3 class="font-bold text-[#0f2640] text-sm leading-snug">{{ $p->titulo }}</h3>
                    <form method="POST" action="{{ route('admin.projetos.toggle', $p) }}">
                        @csrf @method('PATCH')
                        <button type="submit"
                            class="shrink-0 inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-full transition-colors
                                   {{ $p->ativo ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $p->ativo ? 'bg-green-500' : 'bg-slate-400' }}"></span>
                            {{ $p->ativo ? 'Ativo' : 'Off' }}
                        </button>
                    </form>
                </div>
                @if($p->local)
                <p class="text-slate-400 text-xs mb-2">📍 {{ $p->local }}</p>
                @endif
                <p class="text-slate-500 text-xs leading-relaxed mb-4 line-clamp-3">{{ $p->descricao }}</p>
                @if($p->resultado)
                <p class="text-xs text-[#0d8a7d] font-semibold mb-4">↑ {{ $p->resultado }}</p>
                @endif
                <div class="flex items-center gap-2 pt-3 border-t border-slate-100">
                    <a href="{{ route('admin.projetos.edit', $p) }}"
                       class="flex-1 text-center text-xs font-semibold text-[#0f2640] hover:text-[#c9922a] px-3 py-1.5 rounded-lg hover:bg-slate-100 transition-colors">
                        Editar
                    </a>
                    <form method="POST" action="{{ route('admin.projetos.destroy', $p) }}"
                          onsubmit="return confirm('Remover projeto?')">
                        @csrf @method('DELETE')
                        <button type="submit"
                            class="text-xs font-medium text-red-400 hover:text-red-600 px-3 py-1.5 rounded-lg hover:bg-red-50 transition-colors">
                            Remover
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 bg-white rounded-2xl border border-slate-200 py-16 text-center text-slate-400">
            <p class="text-sm">Sem projetos. <a href="{{ route('admin.projetos.create') }}" class="text-[#c9922a] hover:underline">Criar o primeiro</a>.</p>
        </div>
        @endforelse
    </div>

    @if($projetos->hasPages())
    <div class="mt-6">{{ $projetos->links() }}</div>
    @endif
</x-layouts.admin>
