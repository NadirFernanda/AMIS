<x-layouts.admin>
    <x-slot name="title">Novo Cliente</x-slot>

    <div class="mb-6">
        <a href="{{ route('admin.clientes.index') }}" class="text-sm text-slate-500 hover:text-[#1a3a5c] flex items-center gap-1.5 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Voltar
        </a>
    </div>

    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl border border-slate-200 p-8">
            <h2 class="text-lg font-bold text-[#0f2640] mb-6">Dados do Novo Cliente</h2>

            <form method="POST" action="{{ route('admin.clientes.store') }}" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Nome Completo *</label>
                        <input type="text" name="name" required value="{{ old('name') }}"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] @error('name') border-red-300 bg-red-50 @enderror"
                            placeholder="João da Silva">
                        @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Email *</label>
                        <input type="email" name="email" required value="{{ old('email') }}"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] @error('email') border-red-300 bg-red-50 @enderror"
                            placeholder="joao@empresa.ao">
                        @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Empresa</label>
                        <input type="text" name="empresa" value="{{ old('empresa') }}"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c]"
                            placeholder="Nome da empresa">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Telefone</label>
                        <input type="text" name="telefone" value="{{ old('telefone') }}"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c]"
                            placeholder="+244 9XX XXX XXX">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Estado</label>
                    <select name="status"
                        class="w-full sm:w-48 px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] bg-white">
                        <option value="pendente" {{ old('status', 'pendente') === 'pendente' ? 'selected' : '' }}>Pendente</option>
                        <option value="ativo"    {{ old('status') === 'ativo'    ? 'selected' : '' }}>Ativo</option>
                        <option value="inativo"  {{ old('status') === 'inativo'  ? 'selected' : '' }}>Inativo</option>
                    </select>
                </div>

                <hr class="border-slate-100">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5" x-data="{ show: false }">
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Palavra-passe *</label>
                        <div class="relative">
                            <input :type="show ? 'text' : 'password'" name="password" required
                                class="w-full px-4 py-3 pr-11 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] @error('password') border-red-300 bg-red-50 @enderror"
                                placeholder="Mínimo 8 caracteres">
                            <button type="button" @click="show = !show"
                                class="absolute inset-y-0 right-3.5 flex items-center text-slate-400 hover:text-slate-600">
                                <svg x-show="!show" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg x-show="show" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Confirmar Palavra-passe *</label>
                        <input :type="show ? 'text' : 'password'" name="password_confirmation" required
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c]"
                            placeholder="Repetir palavra-passe">
                    </div>
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <button type="submit"
                        class="bg-[#c9922a] hover:bg-[#a67a22] text-white font-bold px-6 py-3 rounded-xl text-sm transition-colors">
                        Criar Cliente
                    </button>
                    <a href="{{ route('admin.clientes.index') }}"
                       class="text-slate-500 hover:text-slate-700 text-sm font-medium px-4 py-3 rounded-xl hover:bg-slate-100 transition-colors">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
