<x-layouts.admin>
    <x-slot name="title">Equipa</x-slot>

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-extrabold text-[#0f2640]">Equipa</h1>
            <p class="text-slate-500 text-sm mt-1">Membros exibidos na página "Sobre Nós".</p>
        </div>
        <a href="{{ route('admin.equipa.create') }}"
           class="inline-flex items-center gap-2 bg-[#0f2640] hover:bg-[#1a3a5c] text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
            Novo Membro
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
        @forelse($membros as $m)
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-md transition-shadow">
            <div class="h-24 flex items-center justify-center" style="background: linear-gradient(135deg, {{ $m->cor }}, {{ $m->cor }}cc)">
                <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center border-2 border-white/30">
                    <span class="text-2xl font-extrabold text-white">{{ strtoupper(substr($m->nome, 0, 1)) }}</span>
                </div>
            </div>
            <div class="p-5">
                <div class="flex items-start justify-between gap-2 mb-1">
                    <h3 class="font-bold text-[#0f2640] text-sm leading-snug">{{ $m->nome }}</h3>
                    <form method="POST" action="{{ route('admin.equipa.toggle', $m) }}">
                        @csrf @method('PATCH')
                        <button type="submit"
                            class="shrink-0 inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-full transition-colors
                                   {{ $m->ativo ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $m->ativo ? 'bg-green-500' : 'bg-slate-400' }}"></span>
                            {{ $m->ativo ? 'Ativo' : 'Off' }}
                        </button>
                    </form>
                </div>
                <p class="text-xs font-semibold mb-0.5" style="color: {{ $m->cor }}">{{ $m->cargo }}</p>
                @if($m->especializacao)
                <p class="text-slate-400 text-xs mb-3">{{ $m->especializacao }}</p>
                @endif
                <p class="text-slate-500 text-xs leading-relaxed mb-4 line-clamp-3">{{ $m->bio }}</p>
                @if($m->tags)
                <div class="flex flex-wrap gap-1 mb-4">
                    @foreach(array_slice($m->tags, 0, 3) as $tag)
                    <span class="text-xs px-2 py-0.5 rounded-full" style="background-color: {{ $m->cor }}15; color: {{ $m->cor }}">{{ $tag }}</span>
                    @endforeach
                </div>
                @endif
                <div class="flex items-center gap-2 pt-3 border-t border-slate-100">
                    <a href="{{ route('admin.equipa.edit', $m) }}"
                       class="flex-1 text-center text-xs font-semibold text-[#0f2640] hover:text-[#c9922a] px-3 py-1.5 rounded-lg hover:bg-slate-100 transition-colors">
                        Editar
                    </a>
                    <form method="POST" action="{{ route('admin.equipa.destroy', $m) }}"
                          onsubmit="return confirm('Remover {{ addslashes($m->nome) }}?')">
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
            <svg class="w-12 h-12 mx-auto mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <p class="font-medium">Nenhum membro na equipa.</p>
            <a href="{{ route('admin.equipa.create') }}" class="mt-2 inline-block text-[#c9922a] hover:underline text-sm">Adicionar primeiro membro</a>
        </div>
        @endforelse
    </div>

    @if($membros->hasPages())
    <div class="mt-6">{{ $membros->links() }}</div>
    @endif
</x-layouts.admin>
