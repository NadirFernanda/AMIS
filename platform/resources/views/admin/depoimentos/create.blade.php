<x-layouts.admin>
    <x-slot name="title">Novo Testemunho</x-slot>

    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('admin.depoimentos.index') }}" class="text-slate-400 hover:text-[#0f2640] transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-[#0f2640]">Novo Testemunho</h1>
            <p class="text-slate-400 text-sm">Adicionar testemunho de cliente</p>
        </div>
    </div>

    @if($errors->any())
    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.depoimentos.store') }}" class="space-y-6 max-w-2xl">
        @csrf

        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">
            <h2 class="text-sm font-bold text-[#0f2640] uppercase tracking-wider">Informação do Cliente</h2>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nome *</label>
                <input type="text" name="nome" value="{{ old('nome') }}" required maxlength="100"
                       placeholder="ex: Eng. Carlos Mendes"
                       class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none transition">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Cargo *</label>
                    <input type="text" name="cargo" value="{{ old('cargo') }}" required maxlength="100"
                           placeholder="ex: Director de Operações"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Empresa *</label>
                    <input type="text" name="empresa" value="{{ old('empresa') }}" required maxlength="100"
                           placeholder="ex: Mineira do Lobito S.A."
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Testemunho *</label>
                <textarea name="texto" rows="5" required
                          placeholder="O que disse o cliente..."
                          class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none transition resize-none">{{ old('texto') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Classificação (1–5)</label>
                    <input type="number" name="rating" value="{{ old('rating', 5) }}" min="1" max="5"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none">
                </div>
                <div class="flex items-center gap-3 pt-6">
                    <input type="hidden" name="ativo" value="0">
                    <input type="checkbox" id="ativo" name="ativo" value="1"
                           {{ old('ativo', true) ? 'checked' : '' }}
                           class="w-4 h-4 rounded accent-[#0f2640]">
                    <label for="ativo" class="text-sm font-semibold text-slate-700">Ativo</label>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit"
                    class="bg-[#0f2640] hover:bg-[#1a3a5c] text-white font-semibold text-sm px-7 py-2.5 rounded-xl transition-colors">
                Criar Testemunho
            </button>
            <a href="{{ route('admin.depoimentos.index') }}"
               class="text-slate-500 hover:text-slate-700 text-sm font-medium px-4 py-2.5">
                Cancelar
            </a>
        </div>
    </form>
</x-layouts.admin>
