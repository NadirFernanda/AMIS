<x-layouts.admin>
    <x-slot name="title">Mensagens</x-slot>

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-extrabold text-[#0f2640]">
                Caixa de Entrada
                @if($naoLidas > 0)
                <span class="ml-2 bg-red-500 text-white text-xs font-bold px-2.5 py-1 rounded-full">{{ $naoLidas }}</span>
                @endif
            </h1>
            <p class="text-slate-500 text-sm mt-1">Mensagens recebidas pelo formulário de contacto.</p>
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

    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide w-3"></th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Remetente</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Assunto</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden lg:table-cell">Mensagem</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Data</th>
                    <th class="text-right px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Acções</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($mensagens as $m)
                <tr class="{{ $m->lida ? 'hover:bg-slate-50' : 'bg-blue-50/40 hover:bg-blue-50' }} transition-colors">
                    {{-- Indicador não lida --}}
                    <td class="pl-5 py-4">
                        @if(!$m->lida)
                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                        @endif
                    </td>

                    {{-- Remetente --}}
                    <td class="px-5 py-4">
                        <div class="{{ $m->lida ? 'font-medium' : 'font-bold' }} text-[#0f2640]">{{ $m->name }}</div>
                        <div class="text-slate-400 text-xs">{{ $m->email }}</div>
                        @if($m->empresa)
                        <div class="text-slate-400 text-xs">{{ $m->empresa }}</div>
                        @endif
                    </td>

                    {{-- Assunto --}}
                    <td class="px-5 py-4">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold
                            @switch($m->subject)
                                @case('consultoria') bg-[#1a3a5c]/10 text-[#1a3a5c] @break
                                @case('formacao') bg-amber-100 text-amber-700 @break
                                @case('equipamentos') bg-teal-100 text-teal-700 @break
                                @case('parceria') bg-purple-100 text-purple-700 @break
                                @default bg-slate-100 text-slate-600
                            @endswitch
                        ">{{ ucfirst($m->subject) }}</span>
                    </td>

                    {{-- Pré-visualização --}}
                    <td class="px-5 py-4 hidden lg:table-cell">
                        <span class="text-slate-500 text-xs line-clamp-2 max-w-xs">{{ Str::limit($m->message, 80) }}</span>
                    </td>

                    {{-- Data --}}
                    <td class="px-5 py-4 text-slate-400 text-xs whitespace-nowrap">
                        {{ $m->created_at->format('d/m/Y') }}<br>
                        {{ $m->created_at->format('H:i') }}
                    </td>

                    {{-- Acções --}}
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.mensagens.show', $m) }}"
                               class="inline-flex items-center gap-1 text-xs font-medium text-[#0f2640] hover:text-[#c9922a] transition-colors px-3 py-1.5 rounded-lg hover:bg-slate-100">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Ver
                            </a>
                            <form method="POST" action="{{ route('admin.mensagens.destroy', $m) }}"
                                  onsubmit="return confirm('Eliminar esta mensagem?')">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <p class="font-medium">Nenhuma mensagem recebida ainda.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        @if($mensagens->hasPages())
        <div class="px-5 py-4 border-t border-slate-100">
            {{ $mensagens->links() }}
        </div>
        @endif
    </div>
</x-layouts.admin>
