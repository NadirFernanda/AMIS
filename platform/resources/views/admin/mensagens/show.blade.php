<x-layouts.admin>
    <x-slot name="title">Mensagem</x-slot>

    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('admin.mensagens.index') }}"
           class="text-slate-400 hover:text-[#0f2640] transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-[#0f2640]">Mensagem de {{ $mensagem->name }}</h1>
            <p class="text-slate-500 text-sm mt-0.5">Recebida em {{ $mensagem->created_at->format('d/m/Y \à\s H:i') }}</p>
        </div>
    </div>

    <div class="max-w-3xl space-y-6">
        {{-- Remetente --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h2 class="font-semibold text-[#0f2640] text-sm uppercase tracking-wide mb-4">Remetente</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                <div>
                    <p class="text-slate-400 text-xs mb-1">Nome</p>
                    <p class="font-semibold text-[#0f2640]">{{ $mensagem->name }}</p>
                </div>
                <div>
                    <p class="text-slate-400 text-xs mb-1">Email</p>
                    <a href="mailto:{{ $mensagem->email }}"
                       class="font-medium text-[#c9922a] hover:underline">{{ $mensagem->email }}</a>
                </div>
                @if($mensagem->empresa)
                <div>
                    <p class="text-slate-400 text-xs mb-1">Empresa</p>
                    <p class="font-medium text-slate-700">{{ $mensagem->empresa }}</p>
                </div>
                @endif
            </div>
        </div>

        {{-- Assunto + Mensagem --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-semibold text-[#0f2640] text-sm uppercase tracking-wide">Mensagem</h2>
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold
                    @switch($mensagem->subject)
                        @case('consultoria') bg-[#1a3a5c]/10 text-[#1a3a5c] @break
                        @case('formacao') bg-amber-100 text-amber-700 @break
                        @case('equipamentos') bg-teal-100 text-teal-700 @break
                        @case('parceria') bg-purple-100 text-purple-700 @break
                        @default bg-slate-100 text-slate-600
                    @endswitch
                ">{{ ucfirst($mensagem->subject) }}</span>
            </div>
            <div class="bg-slate-50 rounded-xl p-5 text-slate-700 text-sm leading-relaxed whitespace-pre-wrap">{{ $mensagem->message }}</div>
        </div>

        {{-- Acções --}}
        <div class="flex items-center gap-3">
            <a href="mailto:{{ $mensagem->email }}?subject=Re: {{ ucfirst($mensagem->subject) }} — AMIS"
               class="inline-flex items-center gap-2 bg-[#0f2640] hover:bg-[#1a3a5c] text-white font-semibold px-6 py-3 rounded-xl text-sm transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                </svg>
                Responder por Email
            </a>
            <form method="POST" action="{{ route('admin.mensagens.destroy', $mensagem) }}"
                  onsubmit="return confirm('Eliminar esta mensagem definitivamente?')">
                @csrf @method('DELETE')
                <button type="submit"
                    class="inline-flex items-center gap-2 border border-red-200 text-red-500 hover:bg-red-50 font-medium px-6 py-3 rounded-xl text-sm transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Eliminar
                </button>
            </form>
            <a href="{{ route('admin.mensagens.index') }}" class="text-slate-500 hover:text-slate-700 text-sm font-medium transition-colors px-2">
                Voltar ao inbox
            </a>
        </div>
    </div>
</x-layouts.admin>
