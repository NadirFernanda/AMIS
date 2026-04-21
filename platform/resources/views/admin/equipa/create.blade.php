<x-layouts.admin>
    <x-slot name="title">Novo Membro</x-slot>

    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('admin.equipa.index') }}" class="text-slate-400 hover:text-[#0f2640] transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-[#0f2640]">Novo Membro da Equipa</h1>
        </div>
    </div>

    @if($errors->any())
    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm">
        <ul class="list-disc list-inside space-y-1">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.equipa.store') }}" class="space-y-6 max-w-3xl">
        @csrf

        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">
            <h2 class="font-semibold text-[#0f2640] text-sm uppercase tracking-wide">Identificação (PT)</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Nome Completo <span class="text-red-400">*</span></label>
                    <input type="text" name="nome" value="{{ old('nome') }}" required
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Cargo / Posição <span class="text-red-400">*</span></label>
                    <input type="text" name="cargo" value="{{ old('cargo') }}" required
                           placeholder="ex: CEO & Co-Fundador"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Especialização</label>
                <input type="text" name="especializacao" value="{{ old('especializacao') }}"
                       placeholder="ex: Engenharia de Minas"
                       class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Bio <span class="text-red-400">*</span></label>
                <textarea name="bio" rows="4" required
                          class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640] resize-none">{{ old('bio') }}</textarea>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Tags / Competências</label>
                <input type="text" name="tags_raw" value="{{ old('tags_raw') }}"
                       placeholder="ex: Engenharia de Minas, MISIS Moscovo, PHOSAGRO  (separadas por vírgula)"
                       class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                <p class="text-slate-400 text-xs mt-1">Separadas por vírgula</p>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Slug (URL) <span class="text-slate-400 font-normal">— gerado automaticamente se vazio</span></label>
                <input type="text" name="slug" value="{{ old('slug') }}"
                       placeholder="ex: joao-silva"
                       class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                <p class="text-slate-400 text-xs mt-1">Usado em /fundadores/{slug} · deixar vazio para gerar a partir do nome</p>
            </div>
        </div>

        {{-- Tradução EN --}}
        <div class="bg-blue-50 rounded-2xl border border-blue-200 p-6 space-y-5">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-bold text-blue-700 uppercase tracking-wide">EN</span>
                <h2 class="font-semibold text-blue-800 text-sm uppercase tracking-wide">Translation in English (optional)</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Position / Role (EN)</label>
                    <input type="text" name="cargo_en" value="{{ old('cargo_en') }}"
                           class="w-full border border-blue-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400/30 focus:border-blue-400">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Specialization (EN)</label>
                    <input type="text" name="especializacao_en" value="{{ old('especializacao_en') }}"
                           class="w-full border border-blue-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400/30 focus:border-blue-400">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Bio (EN)</label>
                <textarea name="bio_en" rows="3"
                          class="w-full border border-blue-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400/30 focus:border-blue-400 resize-none">{{ old('bio_en') }}</textarea>
            </div>
        </div>

        {{-- Tradução FR --}}
        <div class="bg-indigo-50 rounded-2xl border border-indigo-200 p-6 space-y-5">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center rounded-full bg-indigo-100 px-2.5 py-0.5 text-xs font-bold text-indigo-700 uppercase tracking-wide">FR</span>
                <h2 class="font-semibold text-indigo-800 text-sm uppercase tracking-wide">Traduction en Français (optionnel)</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Poste / Rôle (FR)</label>
                    <input type="text" name="cargo_fr" value="{{ old('cargo_fr') }}"
                           class="w-full border border-indigo-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Spécialisation (FR)</label>
                    <input type="text" name="especializacao_fr" value="{{ old('especializacao_fr') }}"
                           class="w-full border border-indigo-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Bio (FR)</label>
                <textarea name="bio_fr" rows="3"
                          class="w-full border border-indigo-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400 resize-none">{{ old('bio_fr') }}</textarea>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">
            <h2 class="font-semibold text-[#0f2640] text-sm uppercase tracking-wide">Aparência & Opções</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div x-data="{ cor: '{{ old('cor', '#1a3a5c') }}' }">
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Cor do Perfil <span class="text-red-400">*</span></label>
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
            </div>
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit"
                class="bg-[#0f2640] hover:bg-[#1a3a5c] text-white font-semibold px-7 py-3 rounded-xl text-sm transition-colors">
                Adicionar Membro
            </button>
            <a href="{{ route('admin.equipa.index') }}" class="text-slate-500 hover:text-slate-700 text-sm font-medium transition-colors">Cancelar</a>
        </div>
    </form>
</x-layouts.admin>
