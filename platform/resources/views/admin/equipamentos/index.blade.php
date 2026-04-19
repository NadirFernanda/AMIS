<x-layouts.admin>
    <x-slot name="title">Equipamentos</x-slot>

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-extrabold text-[#0f2640]">Categorias de Equipamentos</h1>
            <p class="text-slate-500 text-sm mt-1">Exibidos na secção "Equipamentos & Tecnologia" em /serviços.</p>
        </div>
        <a href="{{ route('admin.equipamentos.create') }}"
           class="inline-flex items-center gap-2 bg-[#0f2640] hover:bg-[#1a3a5c] text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
            Nova Categoria
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
                    <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Ord.</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Categoria</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden md:table-cell">Descrição</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Estado</th>
                    <th class="text-right px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Acções</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($equipamentos as $e)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-5 py-4 font-mono text-slate-400 text-xs">{{ $e->ordem }}</td>
                    <td class="px-5 py-4">
                        <div class="font-semibold text-[#0f2640]">{{ $e->titulo }}</div>
                    </td>
                    <td class="px-5 py-4 hidden md:table-cell">
                        <span class="text-slate-500 text-xs line-clamp-2 max-w-xs">{{ Str::limit($e->descricao, 90) }}</span>
                    </td>
                    <td class="px-5 py-4">
                        <form method="POST" action="{{ route('admin.equipamentos.toggle', $e) }}">
                            @csrf @method('PATCH')
                            <button type="submit"
                                class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1.5 rounded-full transition-colors
                                       {{ $e->ativo ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $e->ativo ? 'bg-green-500' : 'bg-slate-400' }}"></span>
                                {{ $e->ativo ? 'Ativo' : 'Inativo' }}
                            </button>
                        </form>
                    </td>
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.equipamentos.edit', $e) }}"
                               class="inline-flex items-center gap-1 text-xs font-medium text-[#0f2640] hover:text-[#c9922a] transition-colors px-3 py-1.5 rounded-lg hover:bg-slate-100">
                                Editar
                            </a>
                            <form method="POST" action="{{ route('admin.equipamentos.destroy', $e) }}"
                                  onsubmit="return confirm('Eliminar «{{ addslashes($e->titulo) }}»?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1 text-xs font-medium text-red-500 hover:text-red-700 px-3 py-1.5 rounded-lg hover:bg-red-50 transition-colors">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-5 py-16 text-center text-slate-400">
                        <p class="font-medium">Nenhuma categoria de equipamento.</p>
                        <a href="{{ route('admin.equipamentos.create') }}" class="mt-2 inline-block text-[#c9922a] hover:underline text-sm">Criar primeira categoria</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @if($equipamentos->hasPages())
        <div class="px-5 py-4 border-t border-slate-100">{{ $equipamentos->links() }}</div>
        @endif
    </div>
</x-layouts.admin>
