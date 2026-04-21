<x-layouts.admin>
    <x-slot name="title">Nova Categoria</x-slot>

    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('admin.equipamentos.index') }}" class="text-slate-400 hover:text-[#0f2640] transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <h1 class="text-2xl font-extrabold text-[#0f2640]">Nova Categoria de Equipamento</h1>
    </div>

    @if($errors->any())
    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm">
        <ul class="list-disc list-inside space-y-1">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.equipamentos.store') }}" class="space-y-6 max-w-2xl">
        @csrf

        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Título (PT) <span class="text-red-400">*</span></label>
                <input type="text" name="titulo" value="{{ old('titulo') }}" required
                       placeholder="ex: Sondagem e Perfuração"
                       class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Descrição (PT) <span class="text-red-400">*</span></label>
                <textarea name="descricao" rows="3" required
                          class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640] resize-none">{{ old('descricao') }}</textarea>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Ícone SVG (path)</label>
                <input type="text" name="icon_svg" value="{{ old('icon_svg') }}"
                       placeholder="ex: M12 3v1m0 16v1M3 12h1m16 0h1"
                       class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                <p class="text-slate-400 text-xs mt-1">Caminho SVG (d=) para o ícone. Opcional — se vazio usa ícone padrão.</p>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Ordem</label>
                    <input type="number" name="ordem" value="{{ old('ordem', 0) }}" min="0"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#0f2640]/20 focus:border-[#0f2640]">
                </div>
                <div class="flex items-end pb-1">
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input type="hidden" name="ativo" value="0">
                        <input type="checkbox" name="ativo" value="1" {{ old('ativo', true) ? 'checked' : '' }}
                               class="w-4 h-4 rounded border-slate-300 text-[#0f2640]">
                        <span class="text-sm text-slate-700 font-medium">Ativo (visível no site)</span>
                    </label>
                </div>
            </div>
        </div>

        {{-- Tradução EN --}}
        <div class="bg-blue-50 rounded-2xl border border-blue-200 p-6 space-y-5">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-bold text-blue-700 uppercase tracking-wide">EN</span>
                <h2 class="font-semibold text-blue-800 text-sm uppercase tracking-wide">Tradução em Inglês (opcional)</h2>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Title (EN)</label>
                <input type="text" name="titulo_en" value="{{ old('titulo_en') }}"
                       placeholder="ex: Drilling &amp; Boring"
                       class="w-full border border-blue-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400/30 focus:border-blue-400">
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
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Titre (FR)</label>
                <input type="text" name="titulo_fr" value="{{ old('titulo_fr') }}"
                       placeholder="ex: Forage et Perforation"
                       class="w-full border border-indigo-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Description (FR)</label>
                <textarea name="descricao_fr" rows="3"
                          class="w-full border border-indigo-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400 resize-none">{{ old('descricao_fr') }}</textarea>
            </div>
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="bg-[#0f2640] hover:bg-[#1a3a5c] text-white font-semibold px-7 py-3 rounded-xl text-sm transition-colors">
                Criar Categoria
            </button>
            <a href="{{ route('admin.equipamentos.index') }}" class="text-slate-500 hover:text-slate-700 text-sm font-medium transition-colors">Cancelar</a>
        </div>
    </form>
</x-layouts.admin>
