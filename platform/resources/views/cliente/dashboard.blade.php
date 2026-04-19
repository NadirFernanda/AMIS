<x-layouts.cliente>
    <x-slot name="title">Dashboard</x-slot>

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-2xl font-extrabold text-[#1a3a5c]">Dashboard</h1>
        <p class="text-slate-500 text-sm mt-1">Visão geral da sua conta AMIS.</p>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
        @foreach([
            ['Projectos Ativos', '2', '#1a3a5c', 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
            ['Cursos Inscritos', '1', '#c9922a', 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
            ['Certificados', '0', '#0d8a7d', 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
            ['Pedidos de Suporte', '0', '#64748b', 'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z'],
        ] as [$label, $value, $color, $icon])
        <div class="bg-white rounded-2xl border border-slate-200 p-6 flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0" style="background-color: {{ $color }}15">
                <svg class="w-6 h-6" style="color: {{ $color }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                </svg>
            </div>
            <div>
                <div class="text-2xl font-extrabold text-[#1a3a5c]">{{ $value }}</div>
                <div class="text-slate-500 text-xs">{{ $label }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Atividade recente --}}
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 p-6">
            <h2 class="text-base font-bold text-[#1a3a5c] mb-5">Atividade Recente</h2>
            <div class="space-y-4">
                @foreach([
                    ['Bem-vindo à Plataforma AMIS', 'Conta ativada com sucesso. Explore os nossos serviços.', 'hoje', '#0d8a7d'],
                    ['Perfil em revisão', 'A nossa equipa está a analisar o seu perfil para personalizar os serviços.', 'hoje', '#c9922a'],
                ] as [$title, $desc, $when, $color])
                <div class="flex gap-4 py-3 border-b border-slate-100 last:border-0">
                    <div class="w-2 h-2 rounded-full mt-2 shrink-0" style="background-color: {{ $color }}"></div>
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-semibold text-slate-700">{{ $title }}</div>
                        <div class="text-xs text-slate-400 mt-0.5">{{ $desc }}</div>
                    </div>
                    <span class="text-xs text-slate-400 shrink-0">{{ $when }}</span>
                </div>
                @endforeach
                <div class="text-center py-4 text-slate-400 text-sm">
                    Sem mais atividade recente.
                </div>
            </div>
        </div>

        {{-- Ações rápidas --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h2 class="text-base font-bold text-[#1a3a5c] mb-5">Ações Rápidas</h2>
            <div class="space-y-3">
                @foreach([
                    ['Solicitar Consultoria', route('contact'), '#1a3a5c', 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                    ['Ver Cursos Disponíveis', route('courses'), '#c9922a', 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253'],
                    ['Falar com Suporte', route('contact'), '#0d8a7d', 'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z'],
                ] as [$label, $href, $color, $icon])
                <a href="{{ $href }}"
                   class="flex items-center gap-3 p-3.5 rounded-xl border border-slate-100 hover:border-slate-200 hover:shadow-sm transition-all group">
                    <div class="w-9 h-9 rounded-lg flex items-center justify-center shrink-0" style="background-color: {{ $color }}15">
                        <svg class="w-4.5 h-4.5" style="color: {{ $color }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-slate-700 group-hover:text-[#1a3a5c]">{{ $label }}</span>
                    <svg class="w-4 h-4 text-slate-300 ml-auto group-hover:text-slate-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Perfil incompleto banner --}}
    <div class="mt-6 bg-[#c9922a]/10 border border-[#c9922a]/20 rounded-2xl p-5 flex flex-col sm:flex-row sm:items-center gap-4">
        <div class="w-10 h-10 bg-[#c9922a]/20 rounded-xl flex items-center justify-center shrink-0">
            <svg class="w-5 h-5 text-[#c9922a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div class="flex-1">
            <div class="text-[#a67a22] font-semibold text-sm">Perfil em configuração</div>
            <div class="text-[#c9922a]/80 text-xs mt-0.5">
                A área cliente completa estará disponível em breve. Por enquanto, explore os nossos serviços ou entre em contacto direto com a nossa equipa.
            </div>
        </div>
        <a href="{{ route('contact') }}"
           class="bg-[#c9922a] hover:bg-[#a67a22] text-white text-xs font-bold px-4 py-2.5 rounded-lg transition-colors shrink-0">
            Contactar Equipa
        </a>
    </div>

    {{-- TESTEMUNHO --}}
    <div class="mt-8 bg-white rounded-2xl border border-slate-200 p-6" x-data="{ rating: {{ session('testemunho_enviado') ? 5 : 5 }} }">
        <div class="flex items-center gap-3 mb-5">
            <div class="w-9 h-9 bg-[#c9922a]/15 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-[#c9922a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
            </div>
            <div>
                <h2 class="text-base font-bold text-[#1a3a5c]">Deixar um Testemunho</h2>
                <p class="text-slate-400 text-xs">A sua opinião aparece no nosso site após revisão.</p>
            </div>
        </div>

        @if(session('testemunho_enviado'))
        <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 text-sm flex items-center gap-2">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
            </svg>
            Obrigado! O seu testemunho foi enviado e será publicado após revisão da nossa equipa.
        </div>
        @elseif($jaTestemunhou)
        <div class="bg-slate-50 border border-slate-200 text-slate-500 rounded-xl px-4 py-3 text-sm">
            Já submeteu um testemunho. Obrigado pelo seu feedback.
        </div>
        @else
        @if($errors->has('cargo') || $errors->has('texto') || $errors->has('rating'))
        <div class="mb-4 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm">
            <ul class="list-disc list-inside space-y-0.5">
                @foreach($errors->only(['cargo','texto','rating']) as $e)<li>{{ $e }}</li>@endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('cliente.testemunho.store') }}" class="space-y-4">
            @csrf

            {{-- Nome e empresa (read-only, from account) --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-500 mb-1">Nome</label>
                    <div class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-500">{{ $user->name }}</div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 mb-1">Empresa</label>
                    <div class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-500">{{ $user->empresa ?: '—' }}</div>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Cargo / Função *</label>
                <input type="text" name="cargo" value="{{ old('cargo') }}" required maxlength="100"
                       placeholder="ex: Director de Operações"
                       class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none transition">
            </div>

            {{-- Star rating --}}
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-2">Classificação *</label>
                <div class="flex items-center gap-1">
                    @for($i = 1; $i <= 5; $i++)
                    <button type="button" @click="rating = {{ $i }}"
                            class="w-8 h-8 transition-transform hover:scale-110">
                        <svg :class="rating >= {{ $i }} ? 'text-[#c9922a]' : 'text-slate-300'" class="w-7 h-7 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </button>
                    @endfor
                </div>
                <input type="hidden" name="rating" :value="rating">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">A sua experiência com a AMIS *</label>
                <textarea name="texto" rows="4" required minlength="20" maxlength="1000"
                          placeholder="Descreva a sua experiência de trabalho connosco..."
                          class="w-full border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#1a3a5c]/20 focus:border-[#1a3a5c] outline-none transition resize-none">{{ old('texto') }}</textarea>
                <p class="text-xs text-slate-400 mt-1">Mínimo 20 caracteres.</p>
            </div>

            <button type="submit"
                    class="bg-[#1a3a5c] hover:bg-[#0f2640] text-white font-semibold text-sm px-6 py-2.5 rounded-xl transition-colors">
                Enviar Testemunho
            </button>
        </form>
        @endif
    </div>

</x-layouts.cliente>
