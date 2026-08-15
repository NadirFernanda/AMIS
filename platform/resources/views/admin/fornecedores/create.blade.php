<x-layouts.admin>
    <x-slot name="title">Novo Fornecedor</x-slot>

    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('admin.fornecedores.index') }}" class="text-slate-400 hover:text-[#0f2640] transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-[#0f2640]">Novo Fornecedor</h1>
        </div>
    </div>

    @if($errors->any())
    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm">
        <ul class="list-disc list-inside space-y-1">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.fornecedores.store') }}" class="space-y-6 max-w-3xl">
        @csrf

        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">
            <h2 class="font-semibold text-[#0f2640] text-sm uppercase tracking-wide">Identificação</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Nome da Empresa <span class="text-red-400">*</span></label>
                    <input type="text" name="nome_empresa" value="{{ old('nome_empresa') }}" required
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">País <span class="text-red-400">*</span></label>
                    <input type="text" name="pais" value="{{ old('pais') }}" required
                           placeholder="ex: África do Sul"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Cidade</label>
                    <input type="text" name="cidade" value="{{ old('cidade') }}"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Website</label>
                    <input type="url" name="website" value="{{ old('website') }}" placeholder="https://"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Email de Contacto</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Telefone</label>
                    <input type="text" name="telefone" value="{{ old('telefone') }}"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Descrição (PT) <span class="text-red-400">*</span></label>
                <textarea name="descricao" rows="4" required
                          class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640] resize-none">{{ old('descricao') }}</textarea>
            </div>
        </div>

        {{-- Categorias --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-4">
            <h2 class="font-semibold text-[#0f2640] text-sm uppercase tracking-wide">Categorias de Equipamento</h2>
            <p class="text-slate-400 text-xs -mt-2">Usadas para filtrar fornecedores em /fornecedores.</p>
            @if($categorias->isEmpty())
            <p class="text-slate-400 text-sm">Nenhuma categoria de equipamento configurada ainda.</p>
            @else
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                @foreach($categorias as $cat)
                <label class="flex items-center gap-2 cursor-pointer select-none border border-slate-200 rounded-xl px-3 py-2 hover:bg-slate-50">
                    <input type="checkbox" name="equipamentos[]" value="{{ $cat->id }}"
                           {{ in_array($cat->id, old('equipamentos', [])) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-slate-300 text-[#0f2640]">
                    <span class="text-sm text-slate-700">{{ $cat->titulo }}</span>
                </label>
                @endforeach
            </div>
            @endif
        </div>

        {{-- Tradução EN --}}
        <div class="bg-blue-50 rounded-2xl border border-blue-200 p-6 space-y-5">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-bold text-blue-700 uppercase tracking-wide">EN</span>
                <h2 class="font-semibold text-blue-800 text-sm uppercase tracking-wide">Translation in English (optional)</h2>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Description (EN)</label>
                <textarea name="descricao_en" rows="3"
                          class="w-full border border-blue-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400/30 focus:border-blue-400 resize-none">{{ old('descricao_en') }}</textarea>
            </div>
        </div>

        {{-- Tradução FR --}}
        <div class="bg-indigo-50 rounded-2xl border border-indigo-200 p-6 space-y-5">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center rounded-full bg-indigo-100 px-2.5 py-0.5 text-xs font-bold text-indigo-700 uppercase tracking-wide">FR</span>
                <h2 class="font-semibold text-indigo-800 text-sm uppercase tracking-wide">Traduction en Français (optionnel)</h2>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Description (FR)</label>
                <textarea name="descricao_fr" rows="3"
                          class="w-full border border-indigo-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400 resize-none">{{ old('descricao_fr') }}</textarea>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">
            <h2 class="font-semibold text-[#0f2640] text-sm uppercase tracking-wide">Aparência & Opções</h2>
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-5">
                <div x-data="{ cor: '{{ old('cor', '#1a3a5c') }}' }">
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Cor <span class="text-red-400">*</span></label>
                    <div class="flex items-center gap-2">
                        <input type="color" x-model="cor" name="cor"
                               class="w-10 h-10 rounded-lg border border-slate-300 cursor-pointer p-0.5">
                        <input type="text" x-model="cor" readonly
                               class="flex-1 border border-slate-300 rounded-xl px-3 py-2.5 text-sm font-mono bg-slate-50">
                    </div>
                    <div class="flex gap-2 mt-2">
                        @foreach(['#1a3a5c' => 'Navy', '#c9922a' => 'Gold', '#0d8a7d' => 'Teal'] as $hex => $name)
                        <button type="button" @click="cor = '{{ $hex }}'"
                                class="w-6 h-6 rounded-full border-2 border-white shadow hover:scale-110 transition-transform"
                                style="background-color: {{ $hex }}" title="{{ $name }}"></button>
                        @endforeach
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Ordem de Exibição</label>
                    <input type="number" name="ordem" value="{{ old('ordem', 0) }}" min="0"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                </div>
                <div class="pt-1">
                    <label class="flex items-center gap-2 cursor-pointer select-none mt-6">
                        <input type="hidden" name="ativo" value="0">
                        <input type="checkbox" name="ativo" value="1" {{ old('ativo', true) ? 'checked' : '' }}
                               class="w-4 h-4 rounded border-slate-300 text-[#0f2640]">
                        <span class="text-sm text-slate-700 font-medium">Visível no site</span>
                    </label>
                </div>
                <div class="pt-1">
                    <label class="flex items-center gap-2 cursor-pointer select-none mt-6">
                        <input type="hidden" name="destaque" value="0">
                        <input type="checkbox" name="destaque" value="1" {{ old('destaque') ? 'checked' : '' }}
                               class="w-4 h-4 rounded border-slate-300 text-[#0f2640]">
                        <span class="text-sm text-slate-700 font-medium">Destacar na home</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit"
                class="bg-[#0f2640] hover:bg-[#1a3a5c] text-white font-semibold px-7 py-3 rounded-xl text-sm transition-colors">
                Adicionar Fornecedor
            </button>
            <a href="{{ route('admin.fornecedores.index') }}" class="text-slate-500 hover:text-slate-700 text-sm font-medium transition-colors">Cancelar</a>
        </div>
    </form>
</x-layouts.admin>
