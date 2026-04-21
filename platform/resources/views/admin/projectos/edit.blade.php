<x-layouts.admin>
    <x-slot name="title">Editar Projecto</x-slot>

    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('admin.projectos.index') }}" class="text-slate-400 hover:text-[#0f2640] transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-[#0f2640]">Editar Projecto</h1>
            <p class="text-slate-400 text-sm">{{ $projecto->titulo }}</p>
        </div>
    </div>

    @if($errors->any())
    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
        </ul>
    </div>
    @endif

    @if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 text-sm">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.projectos.update', $projecto) }}" class="space-y-6 max-w-3xl">
        @csrf @method('PUT')

        {{-- Info principal --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">
            <h2 class="text-sm font-bold text-[#0f2640] uppercase tracking-wider">Informação Principal (PT)</h2>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Título *</label>
                <input type="text" name="titulo" value="{{ old('titulo', $projecto->getRawOriginal('titulo')) }}" required maxlength="150"
                       class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none transition">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tipo *</label>
                    <select name="tipo" required
                            class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none bg-white">
                        <option value="consultoria" {{ old('tipo', $projecto->tipo) === 'consultoria' ? 'selected' : '' }}>Consultoria</option>
                        <option value="formacao"    {{ old('tipo', $projecto->tipo) === 'formacao'    ? 'selected' : '' }}>Formação</option>
                        <option value="equipamentos"{{ old('tipo', $projecto->tipo) === 'equipamentos'? 'selected' : '' }}>Equipamentos</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Local</label>
                    <input type="text" name="local" value="{{ old('local', $projecto->local) }}" maxlength="100"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Descrição *</label>
                <textarea name="descricao" rows="4" required
                          class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none transition resize-none">{{ old('descricao', $projecto->getRawOriginal('descricao')) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Resultado / Métrica</label>
                <input type="text" name="resultado" value="{{ old('resultado', $projecto->getRawOriginal('resultado')) }}" maxlength="250"
                       class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none transition">
            </div>
        </div>

        {{-- Tradução EN --}}
        <div class="bg-blue-50 rounded-2xl border border-blue-200 p-6 space-y-5">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-bold text-blue-700 uppercase tracking-wide">EN</span>
                <h2 class="font-semibold text-blue-800 text-sm uppercase tracking-wide">Translation in English (optional)</h2>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-600 mb-1.5">Title (EN)</label>
                <input type="text" name="titulo_en" value="{{ old('titulo_en', $projecto->getRawOriginal('titulo_en')) }}" maxlength="150"
                       class="w-full border border-blue-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-400/30 focus:border-blue-400 outline-none transition">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-600 mb-1.5">Description (EN)</label>
                <textarea name="descricao_en" rows="3"
                          class="w-full border border-blue-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-400/30 focus:border-blue-400 outline-none transition resize-none">{{ old('descricao_en', $projecto->getRawOriginal('descricao_en')) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-600 mb-1.5">Result / Metric (EN)</label>
                <input type="text" name="resultado_en" value="{{ old('resultado_en', $projecto->getRawOriginal('resultado_en')) }}" maxlength="250"
                       class="w-full border border-blue-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-400/30 focus:border-blue-400 outline-none transition">
            </div>
        </div>

        {{-- Tradução FR --}}
        <div class="bg-indigo-50 rounded-2xl border border-indigo-200 p-6 space-y-5">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center rounded-full bg-indigo-100 px-2.5 py-0.5 text-xs font-bold text-indigo-700 uppercase tracking-wide">FR</span>
                <h2 class="font-semibold text-indigo-800 text-sm uppercase tracking-wide">Traduction en Français (optionnel)</h2>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-600 mb-1.5">Titre (FR)</label>
                <input type="text" name="titulo_fr" value="{{ old('titulo_fr', $projecto->getRawOriginal('titulo_fr')) }}" maxlength="150"
                       class="w-full border border-indigo-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400 outline-none transition">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-600 mb-1.5">Description (FR)</label>
                <textarea name="descricao_fr" rows="3"
                          class="w-full border border-indigo-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400 outline-none transition resize-none">{{ old('descricao_fr', $projecto->getRawOriginal('descricao_fr')) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-600 mb-1.5">Résultat / Métrique (FR)</label>
                <input type="text" name="resultado_fr" value="{{ old('resultado_fr', $projecto->getRawOriginal('resultado_fr')) }}" maxlength="250"
                       class="w-full border border-indigo-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400 outline-none transition">
            </div>
        </div>

        {{-- Média e cor --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">
            <h2 class="text-sm font-bold text-[#0f2640] uppercase tracking-wider">Média & Aparência</h2>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Foto (nome do ficheiro)</label>
                    @if($projecto->foto)
                    <div class="mb-2 rounded-lg overflow-hidden h-20 bg-slate-100">
                        <img src="/img/{{ $projecto->foto }}" class="h-full w-full object-cover">
                    </div>
                    @endif
                    <input type="text" name="foto" value="{{ old('foto', $projecto->foto) }}" maxlength="150"
                           placeholder="ex: 4.jpeg"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none transition">
                </div>
                <div x-data="{ cor: '{{ old('cor', $projecto->cor) }}' }">
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Cor do cartão</label>
                    <div class="flex items-center gap-3">
                        <input type="color" x-model="cor" class="w-10 h-10 rounded-lg border border-slate-300 cursor-pointer p-0.5">
                        <input type="text" name="cor" x-model="cor" maxlength="30"
                               class="flex-1 border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none">
                    </div>
                </div>
            </div>
        </div>

        {{-- Publicação --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-4">
            <h2 class="text-sm font-bold text-[#0f2640] uppercase tracking-wider">Publicação</h2>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Ordem</label>
                    <input type="number" name="ordem" value="{{ old('ordem', $projecto->ordem) }}" min="0"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none">
                </div>
                <div class="flex items-center gap-3 pt-6">
                    <input type="hidden" name="destaque" value="0">
                    <input type="checkbox" id="destaque" name="destaque" value="1"
                           {{ old('destaque', $projecto->destaque) ? 'checked' : '' }}
                           class="w-4 h-4 rounded accent-[#c9922a]">
                    <label for="destaque" class="text-sm font-semibold text-slate-700">Destaque</label>
                </div>
                <div class="flex items-center gap-3 pt-6">
                    <input type="hidden" name="ativo" value="0">
                    <input type="checkbox" id="ativo" name="ativo" value="1"
                           {{ old('ativo', $projecto->ativo) ? 'checked' : '' }}
                           class="w-4 h-4 rounded accent-[#0f2640]">
                    <label for="ativo" class="text-sm font-semibold text-slate-700">Ativo</label>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit"
                    class="bg-[#0f2640] hover:bg-[#1a3a5c] text-white font-semibold text-sm px-7 py-2.5 rounded-xl transition-colors">
                Guardar Alterações
            </button>
            <a href="{{ route('admin.projectos.index') }}"
               class="text-slate-500 hover:text-slate-700 text-sm font-medium px-4 py-2.5">
                Cancelar
            </a>
        </div>
    </form>
</x-layouts.admin>
