<x-layouts.admin>
    <x-slot name="title">Novo Projeto</x-slot>

    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('admin.projetos.index') }}" class="text-slate-400 hover:text-[#0f2640] transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-[#0f2640]">Novo Projeto</h1>
            <p class="text-slate-400 text-sm">Adicionar ao portfólio</p>
        </div>
    </div>

    @if($errors->any())
    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.projetos.store') }}" class="space-y-6 max-w-3xl">
        @csrf

        {{-- Info principal --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">
            <h2 class="text-sm font-bold text-[#0f2640] uppercase tracking-wider">Informação Principal</h2>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Título *</label>
                <input type="text" name="titulo" value="{{ old('titulo') }}" required maxlength="150"
                       class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none transition">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tipo *</label>
                    <select name="tipo" required
                            class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none bg-white">
                        <option value="">— Selecionar —</option>
                        <option value="consultoria" {{ old('tipo') === 'consultoria' ? 'selected' : '' }}>Consultoria</option>
                        <option value="formacao"    {{ old('tipo') === 'formacao'    ? 'selected' : '' }}>Formação</option>
                        <option value="equipamentos"{{ old('tipo') === 'equipamentos'? 'selected' : '' }}>Equipamentos</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Local</label>
                    <input type="text" name="local" value="{{ old('local') }}" maxlength="100"
                           placeholder="ex: Luanda, Angola"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Descrição *</label>
                <textarea name="descricao" rows="4" required
                          class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none transition resize-none">{{ old('descricao') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Resultado / Métrica</label>
                <input type="text" name="resultado" value="{{ old('resultado') }}" maxlength="250"
                       placeholder="ex: Redução de 30% nos custos operacionais"
                       class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none transition">
            </div>
        </div>

        {{-- Média e cor --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">
            <h2 class="text-sm font-bold text-[#0f2640] uppercase tracking-wider">Média & Aparência</h2>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Foto (nome do ficheiro)</label>
                    <input type="text" name="foto" value="{{ old('foto') }}" maxlength="150"
                           placeholder="ex: 4.jpeg"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none transition">
                    <p class="text-xs text-slate-400 mt-1">Ficheiro em public/img/</p>
                </div>
                <div x-data="{ cor: '{{ old('cor', '#1a3a5c') }}' }">
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
                    <input type="number" name="ordem" value="{{ old('ordem', 0) }}" min="0"
                           class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none">
                </div>
                <div class="flex items-center gap-3 pt-6">
                    <input type="hidden" name="destaque" value="0">
                    <input type="checkbox" id="destaque" name="destaque" value="1"
                           {{ old('destaque') ? 'checked' : '' }}
                           class="w-4 h-4 rounded accent-[#c9922a]">
                    <label for="destaque" class="text-sm font-semibold text-slate-700">Destaque</label>
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
                Criar Projeto
            </button>
            <a href="{{ route('admin.projetos.index') }}"
               class="text-slate-500 hover:text-slate-700 text-sm font-medium px-4 py-2.5">
                Cancelar
            </a>
        </div>
    </form>
</x-layouts.admin>
