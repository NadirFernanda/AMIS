<x-layouts.admin>
    <x-slot name="title">Cursos</x-slot>

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <p class="text-slate-500 text-sm">{{ $cursos->total() }} curso(s) no catálogo</p>
        </div>
        <a href="{{ route('admin.cursos.create') }}"
           class="flex items-center gap-2 bg-[#c9922a] hover:bg-[#a67a22] text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors whitespace-nowrap">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Novo Curso
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        @if($cursos->isEmpty())
        <div class="py-16 text-center">
            <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"/>
            </svg>
            <p class="text-slate-500 font-medium">Ainda não há cursos criados.</p>
            <a href="{{ route('admin.cursos.create') }}" class="mt-3 inline-flex text-[#c9922a] text-sm font-semibold hover:underline">
                Criar primeiro curso →
            </a>
        </div>
        @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="text-left px-6 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider">Curso</th>
                        <th class="text-left px-4 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider hidden sm:table-cell">Nível</th>
                        <th class="text-left px-4 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider hidden md:table-cell">Modalidade</th>
                        <th class="text-left px-4 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider hidden lg:table-cell">Preço</th>
                        <th class="text-center px-4 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider">Estado</th>
                        <th class="text-right px-6 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider">Acções</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($cursos as $curso)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-10 rounded-full shrink-0" style="background-color: {{ $curso->cor }}"></div>
                                <div>
                                    <div class="font-semibold text-slate-700 max-w-xs truncate">{{ $curso->titulo }}</div>
                                    <div class="text-xs text-slate-400">{{ $curso->duracao }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 hidden sm:table-cell">
                            <span class="text-xs font-semibold px-2 py-0.5 rounded-full"
                                  style="background-color: {{ $curso->cor }}18; color: {{ $curso->cor }}">
                                {{ $curso->nivel }}
                            </span>
                        </td>
                        <td class="px-4 py-4 text-slate-500 text-xs hidden md:table-cell">{{ $curso->modalidade }}</td>
                        <td class="px-4 py-4 hidden lg:table-cell">
                            <div class="font-semibold text-[#1a3a5c] text-sm">{{ $curso->preco_usd }}</div>
                            <div class="text-xs text-slate-400">{{ $curso->preco_aoa }}</div>
                        </td>
                        <td class="px-4 py-4 text-center">
                            <form method="POST" action="{{ route('admin.cursos.toggle', $curso) }}" class="inline">
                                @csrf @method('PATCH')
                                <button type="submit" title="Clique para alterar"
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold cursor-pointer transition-colors
                                        {{ $curso->ativo ? 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                                    {{ $curso->ativo ? 'Ativo' : 'Inativo' }}
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.cursos.edit', $curso) }}"
                                   class="text-slate-400 hover:text-[#c9922a] transition-colors" title="Editar">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form method="POST" action="{{ route('admin.cursos.destroy', $curso) }}"
                                      onsubmit="return confirm('Eliminar o curso {{ addslashes($curso->titulo) }}?')">
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

        @if($cursos->hasPages())
        <div class="px-6 py-4 border-t border-slate-100">
            {{ $cursos->links() }}
        </div>
        @endif
        @endif
    </div>
</x-layouts.admin>
