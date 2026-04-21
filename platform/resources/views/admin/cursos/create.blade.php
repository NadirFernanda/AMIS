<x-layouts.admin>
    <x-slot name="title">Novo Curso</x-slot>

    <div class="mb-6">
        <a href="{{ route('admin.cursos.index') }}" class="text-sm text-slate-500 hover:text-[#1a3a5c] flex items-center gap-1.5 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Voltar
        </a>
    </div>

    <div class="max-w-3xl">
        <div class="bg-white rounded-2xl border border-slate-200 p-8">
            <h2 class="text-lg font-bold text-[#0f2640] mb-6">Dados do Novo Curso</h2>

            <form method="POST" action="{{ route('admin.cursos.store') }}" class="space-y-6">
                @csrf

                {{-- Título --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Título *</label>
                    <input type="text" name="titulo" required value="{{ old('titulo') }}"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] @error('titulo') border-red-300 bg-red-50 @enderror"
                        placeholder="Ex: Gestão de Operações Minerais">
                    @error('titulo')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- Descrição --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Descrição *</label>
                    <textarea name="descricao" required rows="4"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] resize-none @error('descricao') border-red-300 bg-red-50 @enderror"
                        placeholder="Descrição detalhada do curso...">{{ old('descricao') }}</textarea>
                    @error('descricao')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    {{-- Nível --}}
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Nível *</label>
                        <select name="nivel" required
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] bg-white">
                            @foreach(['Básico', 'Intermédio', 'Avançado'] as $n)
                            <option value="{{ $n }}" {{ old('nivel') === $n ? 'selected' : '' }}>{{ $n }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Duração --}}
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Duração *</label>
                        <input type="text" name="duracao" required value="{{ old('duracao') }}"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c]"
                            placeholder="2 meses">
                    </div>
                    {{-- Modalidade --}}
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Modalidade *</label>
                        <select name="modalidade" required
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] bg-white">
                            @foreach(['Online', 'Presencial (Luanda)', 'Online / Presencial'] as $m)
                            <option value="{{ $m }}" {{ old('modalidade') === $m ? 'selected' : '' }}>{{ $m }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    {{-- Preço USD --}}
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Preço (USD) *</label>
                        <input type="text" name="preco_usd" required value="{{ old('preco_usd') }}"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c]"
                            placeholder="$2,000">
                    </div>
                    {{-- Preço AOA --}}
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Preço (AKZ) *</label>
                        <input type="text" name="preco_aoa" required value="{{ old('preco_aoa') }}"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c]"
                            placeholder="AKZ 1,600,000">
                    </div>
                    {{-- Cor --}}
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Cor do Cartão</label>
                        <div class="flex gap-2">
                            <input type="color" name="cor" value="{{ old('cor', '#1a3a5c') }}"
                                class="w-12 h-12 border border-slate-200 rounded-xl cursor-pointer p-1">
                            <div class="flex gap-1.5 items-center flex-wrap">
                                @foreach(['#1a3a5c', '#c9922a', '#0d8a7d'] as $preset)
                                <button type="button" onclick="document.querySelector('[name=cor]').value='{{ $preset }}'"
                                    class="w-7 h-7 rounded-lg border-2 border-white shadow-sm hover:scale-110 transition-transform"
                                    style="background-color: {{ $preset }}" title="{{ $preset }}"></button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tópicos --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">
                        Tópicos <span class="normal-case text-slate-400 font-normal">(um por linha)</span>
                    </label>
                    <textarea name="topicos_raw" rows="6"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] resize-none font-mono"
                        placeholder="Gestão de lavra&#10;Controlo de produção&#10;Gestão de pessoas&#10;Indicadores KPI&#10;Segurança operacional">{{ old('topicos_raw') }}</textarea>
                </div>

                {{-- ── BLOCO EN ────────────────────────────────────────────── --}}
                <div class="bg-blue-50 rounded-2xl border border-blue-200 p-6 space-y-5">
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-bold text-blue-700 uppercase tracking-wide">EN</span>
                        <h2 class="font-semibold text-blue-800 text-sm uppercase tracking-wide">Translation in English (optional)</h2>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Title (EN)</label>
                            <input type="text" name="titulo_en" value="{{ old('titulo_en') }}"
                                class="w-full border border-blue-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400/30 focus:border-blue-400"
                                placeholder="Ex: Mining Operations Management">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Level (EN)</label>
                            <input type="text" name="nivel_en" value="{{ old('nivel_en') }}"
                                class="w-full border border-blue-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400/30 focus:border-blue-400"
                                placeholder="Advanced">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Duration (EN)</label>
                            <input type="text" name="duracao_en" value="{{ old('duracao_en') }}"
                                class="w-full border border-blue-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400/30 focus:border-blue-400"
                                placeholder="3 months">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Format (EN)</label>
                            <input type="text" name="modalidade_en" value="{{ old('modalidade_en') }}"
                                class="w-full border border-blue-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400/30 focus:border-blue-400"
                                placeholder="Online / In-Person">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5">Description (EN)</label>
                        <textarea name="descricao_en" rows="3"
                            class="w-full border border-blue-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400/30 focus:border-blue-400 resize-none"
                            placeholder="Detailed course description in English...">{{ old('descricao_en') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5">Topics (EN) <span class="normal-case text-slate-400 font-normal">(one per line)</span></label>
                        <textarea name="topicos_raw_en" rows="5"
                            class="w-full border border-blue-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400/30 focus:border-blue-400 resize-none font-mono"
                            placeholder="Mine planning&#10;Production control&#10;People management">{{ old('topicos_raw_en') }}</textarea>
                    </div>
                </div>

                {{-- ── BLOCO FR ────────────────────────────────────────────── --}}
                <div class="bg-indigo-50 rounded-2xl border border-indigo-200 p-6 space-y-5">
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center rounded-full bg-indigo-100 px-2.5 py-0.5 text-xs font-bold text-indigo-700 uppercase tracking-wide">FR</span>
                        <h2 class="font-semibold text-indigo-800 text-sm uppercase tracking-wide">Traduction en Français (optionnel)</h2>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Titre (FR)</label>
                            <input type="text" name="titulo_fr" value="{{ old('titulo_fr') }}"
                                class="w-full border border-indigo-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400"
                                placeholder="Ex: Gestion des Opérations Minières">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Niveau (FR)</label>
                            <input type="text" name="nivel_fr" value="{{ old('nivel_fr') }}"
                                class="w-full border border-indigo-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400"
                                placeholder="Avancé">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Durée (FR)</label>
                            <input type="text" name="duracao_fr" value="{{ old('duracao_fr') }}"
                                class="w-full border border-indigo-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400"
                                placeholder="3 mois">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Format (FR)</label>
                            <input type="text" name="modalidade_fr" value="{{ old('modalidade_fr') }}"
                                class="w-full border border-indigo-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400"
                                placeholder="En Ligne / Présentiel">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5">Description (FR)</label>
                        <textarea name="descricao_fr" rows="3"
                            class="w-full border border-indigo-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400 resize-none"
                            placeholder="Description détaillée du cours en français...">{{ old('descricao_fr') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5">Sujets (FR) <span class="normal-case text-slate-400 font-normal">(un par ligne)</span></label>
                        <textarea name="topicos_raw_fr" rows="5"
                            class="w-full border border-indigo-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400 resize-none font-mono"
                            placeholder="Planification minière&#10;Contrôle de production&#10;Gestion des personnes">{{ old('topicos_raw_fr') }}</textarea>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <input type="hidden" name="ativo" value="0">
                    <input type="checkbox" id="ativo" name="ativo" value="1" checked
                        class="w-4 h-4 rounded border-slate-300 text-[#1a3a5c] focus:ring-[#1a3a5c]/30 cursor-pointer">
                    <label for="ativo" class="text-sm text-slate-600 cursor-pointer">Publicar imediatamente (visível no site)</label>
                </div>

                <div class="flex items-center gap-3">
                    <input type="hidden" name="destaque" value="0">
                    <input type="checkbox" id="destaque" name="destaque" value="1"
                        class="w-4 h-4 rounded border-slate-300 text-[#c9922a] focus:ring-[#c9922a]/30 cursor-pointer">
                    <label for="destaque" class="text-sm text-slate-600 cursor-pointer">Destacar na página inicial</label>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Ordem de exibição</label>
                    <input type="number" name="ordem" value="{{ old('ordem', 0) }}" min="0"
                        class="w-24 px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c]">
                    <p class="text-xs text-slate-400 mt-1">Número menor = aparece primeiro</p>
                </div>

                <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                    <button type="submit"
                        class="bg-[#c9922a] hover:bg-[#a67a22] text-white font-bold px-6 py-3 rounded-xl text-sm transition-colors">
                        Criar Curso
                    </button>
                    <a href="{{ route('admin.cursos.index') }}"
                       class="text-slate-500 hover:text-slate-700 text-sm font-medium px-4 py-3 rounded-xl hover:bg-slate-100 transition-colors">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
