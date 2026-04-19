<x-layouts.admin>
    <x-slot name="title">Consultorias</x-slot>

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-extrabold text-[#0f2640]">Pacotes de Consultoria</h1>
            <p class="text-slate-500 text-sm mt-1">Gerir os pacotes exibidos na página de serviços.</p>
        </div>
        <a href="{{ route('admin.consultorias.create') }}"
           class="inline-flex items-center gap-2 bg-[#0f2640] hover:bg-[#1a3a5c] text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
            Novo Pacote
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

    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Ordem</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Pacote</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Preço</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Destaque</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Estado</th>
                    <th class="text-right px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Acções</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($consultorias as $c)
                <tr class="hover:bg-slate-50 transition-colors">
                    {{-- Color bar + ordem --}}
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2">
                            <div class="w-1 h-8 rounded-full shrink-0" style="background-color: {{ $c->cor }}"></div>
                            <span class="font-mono text-slate-400 text-xs">{{ $c->ordem }}</span>
                        </div>
                    </td>

                    {{-- Title + tagline --}}
                    <td class="px-5 py-4">
                        <div class="font-semibold text-[#0f2640]">{{ $c->titulo }}</div>
                        <div class="text-slate-400 text-xs mt-0.5 max-w-xs truncate">{{ $c->tagline }}</div>
                        <div class="text-slate-400 text-xs mt-0.5">{{ count($c->features ?? []) }} funcionalidades</div>
                    </td>

                    {{-- Preço --}}
                    <td class="px-5 py-4">
                        <div class="font-semibold text-[#0f2640]">{{ $c->preco_usd }}</div>
                        <div class="text-slate-400 text-xs">{{ $c->preco_aoa }}</div>
                    </td>

                    {{-- Destaque --}}
                    <td class="px-5 py-4">
                        @if($c->destaque)
                        <span class="inline-flex items-center gap-1 bg-amber-100 text-amber-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            Destaque
                        </span>
                        @else
                        <span class="text-slate-300 text-xs">—</span>
                        @endif
                    </td>

                    {{-- Toggle ativo --}}
                    <td class="px-5 py-4">
                        <form method="POST" action="{{ route('admin.consultorias.toggle', $c) }}">
                            @csrf @method('PATCH')
                            <button type="submit"
                                class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1.5 rounded-full transition-colors
                                       {{ $c->ativo ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $c->ativo ? 'bg-green-500' : 'bg-slate-400' }}"></span>
                                {{ $c->ativo ? 'Ativo' : 'Inativo' }}
                            </button>
                        </form>
                    </td>

                    {{-- Acções --}}
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.consultorias.edit', $c) }}"
                               class="inline-flex items-center gap-1 text-xs font-medium text-[#0f2640] hover:text-[#c9922a] transition-colors px-3 py-1.5 rounded-lg hover:bg-slate-100">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Editar
                            </a>
                            <form method="POST" action="{{ route('admin.consultorias.destroy', $c) }}"
                                  onsubmit="return confirm('Eliminar o pacote «{{ addslashes($c->titulo) }}»?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center gap-1 text-xs font-medium text-red-500 hover:text-red-700 transition-colors px-3 py-1.5 rounded-lg hover:bg-red-50">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-16 text-center text-slate-400">
                        <svg class="w-12 h-12 mx-auto mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <p class="font-medium">Nenhum pacote criado ainda.</p>
                        <a href="{{ route('admin.consultorias.create') }}" class="mt-2 inline-block text-[#c9922a] hover:underline text-sm">Criar o primeiro pacote</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        @if($consultorias->hasPages())
        <div class="px-5 py-4 border-t border-slate-100">
            {{ $consultorias->links() }}
        </div>
        @endif
    </div>
</x-layouts.admin>
