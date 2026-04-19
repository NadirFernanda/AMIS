<x-layouts.admin>
    <x-slot name="title">Editar — {{ $curso->titulo }}</x-slot>

    <div class="mb-6">
        <a href="{{ route('admin.cursos.index') }}" class="text-sm text-slate-500 hover:text-[#1a3a5c] flex items-center gap-1.5 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Voltar à lista
        </a>
    </div>

    <div class="max-w-3xl">
        <div class="bg-white rounded-2xl border border-slate-200 p-8">
            <h2 class="text-lg font-bold text-[#0f2640] mb-6">Editar Curso</h2>

            <form method="POST" action="{{ route('admin.cursos.update', $curso) }}" class="space-y-6">
                @csrf @method('PUT')

                {{-- Título --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Título *</label>
                    <input type="text" name="titulo" required value="{{ old('titulo', $curso->titulo) }}"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] @error('titulo') border-red-300 bg-red-50 @enderror">
                    @error('titulo')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- Descrição --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Descrição *</label>
                    <textarea name="descricao" required rows="4"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] resize-none @error('descricao') border-red-300 bg-red-50 @enderror">{{ old('descricao', $curso->descricao) }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Nível *</label>
                        <select name="nivel" required
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] bg-white">
                            @foreach(['Básico', 'Intermédio', 'Avançado'] as $n)
                            <option value="{{ $n }}" {{ old('nivel', $curso->nivel) === $n ? 'selected' : '' }}>{{ $n }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Duração *</label>
                        <input type="text" name="duracao" required value="{{ old('duracao', $curso->duracao) }}"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c]">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Modalidade *</label>
                        <select name="modalidade" required
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] bg-white">
                            @foreach(['Online', 'Presencial (Luanda)', 'Online / Presencial'] as $m)
                            <option value="{{ $m }}" {{ old('modalidade', $curso->modalidade) === $m ? 'selected' : '' }}>{{ $m }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Preço (USD) *</label>
                        <input type="text" name="preco_usd" required value="{{ old('preco_usd', $curso->preco_usd) }}"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c]">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Preço (AKZ) *</label>
                        <input type="text" name="preco_aoa" required value="{{ old('preco_aoa', $curso->preco_aoa) }}"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c]">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Cor do Cartão</label>
                        <div class="flex gap-2">
                            <input type="color" name="cor" value="{{ old('cor', $curso->cor) }}"
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
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] resize-none font-mono">{{ old('topicos_raw', implode("\n", $curso->topicos ?? [])) }}</textarea>
                </div>

                <div class="flex items-center gap-3">
                    <input type="hidden" name="ativo" value="0">
                    <input type="checkbox" id="ativo" name="ativo" value="1"
                        {{ old('ativo', $curso->ativo) ? 'checked' : '' }}
                        class="w-4 h-4 rounded border-slate-300 text-[#1a3a5c] focus:ring-[#1a3a5c]/30 cursor-pointer">
                    <label for="ativo" class="text-sm text-slate-600 cursor-pointer">Visível no site público</label>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Ordem de exibição</label>
                    <input type="number" name="ordem" value="{{ old('ordem', $curso->ordem) }}" min="0"
                        class="w-24 px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c]">
                </div>

                <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                    <button type="submit"
                        class="bg-[#c9922a] hover:bg-[#a67a22] text-white font-bold px-6 py-3 rounded-xl text-sm transition-colors">
                        Guardar Alterações
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
