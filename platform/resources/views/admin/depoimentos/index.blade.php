<x-layouts.admin>
    <x-slot name="title">Depoimentos</x-slot>

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-extrabold text-[#0f2640]">Depoimentos</h1>
            <p class="text-slate-500 text-sm mt-1">Testemunhos de clientes exibidos no site.</p>
        </div>
        <div class="flex items-center gap-3">
            @if($pendentes > 0)
            <span class="inline-flex items-center gap-1.5 bg-amber-50 border border-amber-200 text-amber-700 text-xs font-semibold px-3 py-1.5 rounded-full">
                <span class="w-1.5 h-1.5 bg-amber-400 rounded-full"></span>
                {{ $pendentes }} pendente{{ $pendentes > 1 ? 's' : '' }}
            </span>
            @endif
            <a href="{{ route('admin.depoimentos.create') }}"
               class="inline-flex items-center gap-2 bg-[#0f2640] hover:bg-[#1a3a5c] text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                Novo Depoimento
            </a>
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

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($depoimentos as $d)
        <div class="bg-white rounded-2xl border border-slate-200 p-6 hover:shadow-md transition-shadow relative">
            <div class="absolute top-5 right-5 text-5xl font-serif text-slate-100 leading-none select-none">"</div>

            <div class="flex items-start justify-between gap-2 mb-3">
                <div class="flex gap-1">
                    @for($i = 0; $i < ($d->rating ?? 5); $i++)
                    <svg class="w-3.5 h-3.5 text-[#c9922a]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
                <form method="POST" action="{{ route('admin.depoimentos.toggle', $d) }}">
                    @csrf @method('PATCH')
                    <button type="submit"
                        class="shrink-0 inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-full transition-colors
                               {{ $d->ativo ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $d->ativo ? 'bg-green-500' : 'bg-slate-400' }}"></span>
                        {{ $d->ativo ? 'Ativo' : 'Off' }}
                    </button>
                </form>
            </div>

            <p class="text-slate-500 text-xs leading-relaxed italic mb-5 line-clamp-4">"{{ $d->texto }}"</p>

            <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                <div class="w-8 h-8 rounded-full bg-[#1a3a5c] flex items-center justify-center text-white text-xs font-extrabold shrink-0">
                    {{ strtoupper(substr($d->nome, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="font-bold text-[#0f2640] text-xs truncate">{{ $d->nome }}</div>
                    <div class="text-slate-400 text-xs truncate">{{ $d->cargo }} · {{ $d->empresa }}</div>
                </div>
            </div>

            <div class="flex items-center gap-2 mt-4 pt-3 border-t border-slate-100">
                <a href="{{ route('admin.depoimentos.edit', $d) }}"
                   class="flex-1 text-center text-xs font-semibold text-[#0f2640] hover:text-[#c9922a] px-3 py-1.5 rounded-lg hover:bg-slate-100 transition-colors">
                    Editar
                </a>
                <form method="POST" action="{{ route('admin.depoimentos.destroy', $d) }}"
                      onsubmit="return confirm('Remover depoimento?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="text-xs font-medium text-red-400 hover:text-red-600 px-3 py-1.5 rounded-lg hover:bg-red-50 transition-colors">
                        Remover
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-3 bg-white rounded-2xl border border-slate-200 py-16 text-center text-slate-400">
            <p class="text-sm">Sem depoimentos. <a href="{{ route('admin.depoimentos.create') }}" class="text-[#c9922a] hover:underline">Adicionar o primeiro</a>.</p>
        </div>
        @endforelse
    </div>

    @if($depoimentos->hasPages())
    <div class="mt-6">{{ $depoimentos->links() }}</div>
    @endif
</x-layouts.admin>
