<x-layouts.admin>
    <x-slot name="title">Fornecedores</x-slot>

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-extrabold text-[#0f2640]">Fornecedores de Equipamentos</h1>
            <p class="text-slate-500 text-sm mt-1">Exibidos publicamente em /fornecedores, ligando empresas mineiras a fornecedores parceiros.</p>
        </div>
        <a href="{{ route('admin.fornecedores.create') }}"
           class="inline-flex items-center gap-2 bg-[#0f2640] hover:bg-[#1a3a5c] text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
            Novo Fornecedor
        </a>
    </div>

    @if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 text-sm flex items-center gap-2">
        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($fornecedores as $f)
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-md transition-shadow">
            <div class="h-20 flex items-center justify-center" style="background: linear-gradient(135deg, {{ $f->cor }}, {{ $f->cor }}cc)">
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center border-2 border-white/30">
                    <span class="text-xl font-extrabold text-white">{{ strtoupper(substr($f->nome_empresa, 0, 1)) }}</span>
                </div>
            </div>
            <div class="p-5">
                <div class="flex items-start justify-between gap-2 mb-1">
                    <h3 class="font-bold text-[#0f2640] text-sm leading-snug">{{ $f->nome_empresa }}</h3>
                    <form method="POST" action="{{ route('admin.fornecedores.toggle', $f) }}">
                        @csrf @method('PATCH')
                        <button type="submit"
                            class="shrink-0 inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-full transition-colors
                                   {{ $f->ativo ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $f->ativo ? 'bg-green-500' : 'bg-slate-400' }}"></span>
                            {{ $f->ativo ? 'Ativo' : 'Off' }}
                        </button>
                    </form>
                </div>
                <p class="text-slate-400 text-xs mb-3">{{ $f->cidade ? $f->cidade . ', ' : '' }}{{ $f->pais }}</p>
                @if($f->equipamentos->count())
                <div class="flex flex-wrap gap-1 mb-4">
                    @foreach($f->equipamentos->take(3) as $cat)
                    <span class="text-xs px-2 py-0.5 rounded-full" style="background-color: {{ $f->cor }}15; color: {{ $f->cor }}">{{ $cat->titulo }}</span>
                    @endforeach
                </div>
                @else
                <p class="text-slate-300 text-xs mb-4 italic">Sem categorias associadas</p>
                @endif
                <div class="flex items-center gap-2 pt-3 border-t border-slate-100">
                    <a href="{{ route('admin.fornecedores.edit', $f) }}"
                       class="flex-1 text-center text-xs font-semibold text-[#0f2640] hover:text-[#c9922a] px-3 py-1.5 rounded-lg hover:bg-slate-100 transition-colors">
                        Editar
                    </a>
                    <form method="POST" action="{{ route('admin.fornecedores.destroy', $f) }}"
                          onsubmit="return confirm('Remover {{ addslashes($f->nome_empresa) }}?')">
                        @csrf @method('DELETE')
                        <button type="submit"
                            class="text-xs font-medium text-red-400 hover:text-red-600 px-3 py-1.5 rounded-lg hover:bg-red-50 transition-colors">
                            Remover
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 bg-white rounded-2xl border border-slate-200 py-16 text-center text-slate-400">
            <svg class="w-12 h-12 mx-auto mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 21v-4a4 4 0 014-4h10a4 4 0 014 4v4M12 13a4 4 0 100-8 4 4 0 000 8z"/>
            </svg>
            <p class="font-medium">Nenhum fornecedor registado.</p>
            <a href="{{ route('admin.fornecedores.create') }}" class="mt-2 inline-block text-[#c9922a] hover:underline text-sm">Adicionar primeiro fornecedor</a>
        </div>
        @endforelse
    </div>

    @if($fornecedores->hasPages())
    <div class="mt-6">{{ $fornecedores->links() }}</div>
    @endif
</x-layouts.admin>
