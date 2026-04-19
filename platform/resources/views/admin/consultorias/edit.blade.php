<x-layouts.admin>
    <x-slot name="title">Editar Pacote</x-slot>

    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('admin.consultorias.index') }}"
           class="text-slate-400 hover:text-[#0f2640] transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-[#0f2640]">Editar: {{ $consultoria->titulo }}</h1>
            <p class="text-slate-500 text-sm mt-0.5">Altere os dados do pacote.</p>
        </div>
    </div>

    @if($errors->any())
    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.consultorias.update', $consultoria) }}" class="space-y-6 max-w-3xl">
        @csrf @method('PUT')

        {{-- Título + Tagline --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">
            <h2 class="font-semibold text-[#0f2640] text-sm uppercase tracking-wide">Identificação</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Título do Pacote <span class="text-red-400">*</span></label>
                    <input type="text" name="titulo" value="{{ old('titulo', $consultoria->titulo) }}" required
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Tagline <span class="text-red-400">*</span></label>
                    <input type="text" name="tagline" value="{{ old('tagline', $consultoria->tagline) }}" required
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Descrição Interna (opcional)</label>
                <textarea name="descricao" rows="2"
                          class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640] resize-none">{{ old('descricao', $consultoria->descricao) }}</textarea>
            </div>
        </div>

        {{-- Preços --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">
            <h2 class="font-semibold text-[#0f2640] text-sm uppercase tracking-wide">Preços</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Preço USD <span class="text-red-400">*</span></label>
                    <input type="text" name="preco_usd" value="{{ old('preco_usd', $consultoria->preco_usd) }}" required
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Preço AKZ <span class="text-red-400">*</span></label>
                    <input type="text" name="preco_aoa" value="{{ old('preco_aoa', $consultoria->preco_aoa) }}" required
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                </div>
            </div>
        </div>

        {{-- Funcionalidades --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-4">
            <h2 class="font-semibold text-[#0f2640] text-sm uppercase tracking-wide">Funcionalidades Incluídas</h2>
            <p class="text-slate-400 text-xs">Uma funcionalidade por linha.</p>
            <textarea name="features_raw" rows="8"
                      class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640] font-mono resize-y">{{ old('features_raw', implode("\n", $consultoria->features ?? [])) }}</textarea>
        </div>

        {{-- Aparência + Opções --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">
            <h2 class="font-semibold text-[#0f2640] text-sm uppercase tracking-wide">Aparência & Opções</h2>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                {{-- Cor --}}
                <div x-data="{ cor: '{{ old('cor', $consultoria->cor) }}' }">
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Cor do Pacote <span class="text-red-400">*</span></label>
                    <div class="flex items-center gap-2">
                        <input type="color" x-model="cor" name="cor"
                               class="w-10 h-10 rounded-lg border border-slate-300 cursor-pointer p-0.5">
                        <input type="text" x-model="cor" readonly
                               class="flex-1 border border-slate-300 rounded-xl px-3 py-2.5 text-sm font-mono bg-slate-50">
                    </div>
                    <div class="flex gap-2 mt-2">
                        @foreach(['#1a3a5c' => 'Navy', '#c9922a' => 'Gold', '#0d8a7d' => 'Teal'] as $hex => $name)
                        <button type="button" @click="cor = '{{ $hex }}'"
                                class="w-6 h-6 rounded-full border-2 border-white shadow transition-transform hover:scale-110"
                                style="background-color: {{ $hex }}" title="{{ $name }}"></button>
                        @endforeach
                    </div>
                </div>

                {{-- Ordem --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Ordem de Exibição</label>
                    <input type="number" name="ordem" value="{{ old('ordem', $consultoria->ordem) }}" min="0"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                    <p class="text-slate-400 text-xs mt-1">Menor número = primeiro</p>
                </div>

                {{-- Flags --}}
                <div class="space-y-3 pt-1">
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input type="hidden" name="destaque" value="0">
                        <input type="checkbox" name="destaque" value="1"
                               {{ old('destaque', $consultoria->destaque) ? 'checked' : '' }}
                               class="w-4 h-4 rounded border-slate-300 text-[#c9922a] focus:ring-[#c9922a]/30">
                        <span class="text-sm text-slate-700 font-medium">Pacote em Destaque</span>
                    </label>
                    <p class="text-slate-400 text-xs ml-6">Mostra o badge "Mais Escolhido"</p>
                    <label class="flex items-center gap-2 cursor-pointer select-none mt-2">
                        <input type="hidden" name="ativo" value="0">
                        <input type="checkbox" name="ativo" value="1"
                               {{ old('ativo', $consultoria->ativo) ? 'checked' : '' }}
                               class="w-4 h-4 rounded border-slate-300 text-[#0f2640] focus:ring-[#0f2640]/30">
                        <span class="text-sm text-slate-700 font-medium">Ativo (visível no site)</span>
                    </label>
                </div>
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-4 pt-2">
            <button type="submit"
                class="bg-[#0f2640] hover:bg-[#1a3a5c] text-white font-semibold px-7 py-3 rounded-xl text-sm transition-colors">
                Guardar Alterações
            </button>
            <a href="{{ route('admin.consultorias.index') }}"
               class="text-slate-500 hover:text-slate-700 text-sm font-medium transition-colors">Cancelar</a>
        </div>
    </form>
</x-layouts.admin>
