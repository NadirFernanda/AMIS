<x-layouts.public>
    <x-slot name="title">Início</x-slot>

    {{-- HERO --}}
    <section class="relative min-h-screen flex items-center overflow-hidden bg-[#0f2640]">
        {{-- Background pattern --}}
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <defs>
                    <pattern id="grid" width="8" height="8" patternUnits="userSpaceOnUse">
                        <path d="M 8 0 L 0 0 0 8" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)"/>
            </svg>
        </div>
        {{-- Gradient blobs --}}
        <div class="absolute top-1/4 right-0 w-96 h-96 bg-[#c9922a] opacity-10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/4 w-72 h-72 bg-[#0d8a7d] opacity-10 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="inline-flex items-center gap-2 bg-white/10 text-[#c9922a] text-xs font-semibold px-3 py-1.5 rounded-full mb-6 border border-[#c9922a]/30">
                    <span class="w-1.5 h-1.5 bg-[#c9922a] rounded-full animate-pulse"></span>
                    Consultoria · Formação · Tecnologia
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                    Transformamos o
                    <span class="text-[#c9922a]">Setor Mineiro</span>
                    Angolano
                </h1>
                <p class="text-slate-300 text-lg leading-relaxed mb-10 max-w-xl">
                    Consultoria técnica especializada, formação certificada e soluções tecnológicas para empresas e profissionais de mineração em Angola e na África Austral.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('courses') }}"
                       class="inline-flex items-center justify-center gap-2 bg-[#c9922a] hover:bg-[#a67a22] text-white font-semibold px-7 py-3.5 rounded-lg transition-colors text-sm shadow-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        Ver Cursos
                    </a>
                    <a href="{{ route('services') }}#consultoria"
                       class="inline-flex items-center justify-center gap-2 border border-white/30 hover:border-white text-white font-semibold px-7 py-3.5 rounded-lg transition-colors text-sm">
                        Solicitar Consultoria
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Stats card --}}
            <div class="grid grid-cols-2 gap-4">
                @foreach([
                    ['50+', 'Projetos Concluídos', 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
                    ['6', 'Cursos Certificados', 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                    ['200+', 'Profissionais Formados', 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                    ['4', 'Países de Atuação', 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064'],
                ] as [$num, $label, $icon])
                <div class="bg-white/10 backdrop-blur border border-white/10 rounded-2xl p-6 text-center hover:bg-white/15 transition-colors">
                    <div class="w-10 h-10 bg-[#c9922a]/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <svg class="w-5 h-5 text-[#c9922a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-extrabold text-white mb-1">{{ $num }}</div>
                    <div class="text-slate-400 text-xs">{{ $label }}</div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-slate-400">
            <span class="text-xs">Explorar</span>
            <div class="w-5 h-8 border border-slate-500 rounded-full flex items-start justify-center p-1">
                <div class="w-1 h-2 bg-[#c9922a] rounded-full animate-bounce"></div>
            </div>
        </div>
    </section>

    {{-- SERVIÇOS --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">O que fazemos</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a3a5c] mt-2">Soluções Completas para a Mineração</h2>
                <p class="text-slate-500 mt-4 max-w-2xl mx-auto">Da análise técnica à formação especializada, cobrimos todas as necessidades do setor mineiro angolano.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Consultoria --}}
                <div class="group bg-white border border-slate-200 rounded-2xl p-8 hover:shadow-xl hover:border-[#1a3a5c]/20 transition-all">
                    <div class="w-14 h-14 bg-[#1a3a5c]/10 group-hover:bg-[#1a3a5c] rounded-2xl flex items-center justify-center mb-6 transition-colors">
                        <svg class="w-7 h-7 text-[#1a3a5c] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#1a3a5c] mb-3">Consultoria Técnica</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6">Diagnóstico, estudos de viabilidade e otimização de operações mineiras. Equipa com experiência internacional.</p>
                    <div class="space-y-2 mb-6">
                        @foreach(['Diagnóstico de operações', 'Estudos de viabilidade', 'Planeamento mineiro', 'Auditorias técnicas'] as $item)
                        <div class="flex items-center gap-2 text-sm text-slate-600">
                            <svg class="w-4 h-4 text-[#0d8a7d] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ $item }}
                        </div>
                        @endforeach
                    </div>
                    <div class="border-t border-slate-100 pt-5 flex items-end justify-between">
                        <div>
                            <span class="text-xs text-slate-400">A partir de</span>
                            <div class="text-[#1a3a5c] font-bold text-lg">$15,000 USD</div>
                        </div>
                        <a href="{{ route('services') }}#consultoria"
                           class="text-[#1a3a5c] hover:text-[#c9922a] text-sm font-semibold flex items-center gap-1 transition-colors">
                            Saber mais
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Formação --}}
                <div class="group bg-[#1a3a5c] border border-[#1a3a5c] rounded-2xl p-8 hover:shadow-xl transition-all relative overflow-hidden">
                    <div class="absolute top-4 right-4 bg-[#c9922a] text-white text-xs font-bold px-2.5 py-1 rounded-full">Popular</div>
                    <div class="absolute bottom-0 right-0 w-32 h-32 bg-white/5 rounded-full -mr-10 -mb-10"></div>
                    <div class="w-14 h-14 bg-[#c9922a]/20 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-[#c9922a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Formação Profissional</h3>
                    <p class="text-slate-300 text-sm leading-relaxed mb-6">Cursos online e presenciais em engenharia de minas, geociências e tecnologias digitais aplicadas à mineração.</p>
                    <div class="space-y-2 mb-6">
                        @foreach(['6 cursos certificados', 'Certificado verificável', 'Online e presencial', 'Instrutores especializados'] as $item)
                        <div class="flex items-center gap-2 text-sm text-slate-300">
                            <svg class="w-4 h-4 text-[#c9922a] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ $item }}
                        </div>
                        @endforeach
                    </div>
                    <div class="border-t border-white/10 pt-5 flex items-end justify-between">
                        <div>
                            <span class="text-xs text-slate-400">A partir de</span>
                            <div class="text-white font-bold text-lg">$1,000 USD</div>
                        </div>
                        <a href="{{ route('courses') }}"
                           class="text-[#c9922a] hover:text-white text-sm font-semibold flex items-center gap-1 transition-colors">
                            Ver cursos
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Equipamentos --}}
                <div class="group bg-white border border-slate-200 rounded-2xl p-8 hover:shadow-xl hover:border-[#1a3a5c]/20 transition-all">
                    <div class="w-14 h-14 bg-[#0d8a7d]/10 group-hover:bg-[#0d8a7d] rounded-2xl flex items-center justify-center mb-6 transition-colors">
                        <svg class="w-7 h-7 text-[#0d8a7d] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#1a3a5c] mb-3">Equipamentos e Tecnologia</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6">Conexão com fabricantes internacionais, consultoria de aquisição, instalação e suporte técnico especializado.</p>
                    <div class="space-y-2 mb-6">
                        @foreach(['Catálogo internacional', 'Consultoria de aquisição', 'Instalação supervisionada', 'Suporte técnico anual'] as $item)
                        <div class="flex items-center gap-2 text-sm text-slate-600">
                            <svg class="w-4 h-4 text-[#0d8a7d] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ $item }}
                        </div>
                        @endforeach
                    </div>
                    <div class="border-t border-slate-100 pt-5 flex items-end justify-between">
                        <div>
                            <span class="text-xs text-slate-400">A partir de</span>
                            <div class="text-[#0d8a7d] font-bold text-lg">$5,000 USD</div>
                        </div>
                        <a href="{{ route('services') }}#equipamentos"
                           class="text-[#0d8a7d] hover:text-[#c9922a] text-sm font-semibold flex items-center gap-1 transition-colors">
                            Saber mais
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CURSOS EM DESTAQUE --}}
    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">Formação</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a3a5c] mt-2">Cursos em Destaque</h2>
                </div>
                <a href="{{ route('courses') }}" class="text-[#1a3a5c] hover:text-[#c9922a] font-semibold text-sm flex items-center gap-1 transition-colors shrink-0">
                    Ver todos os cursos
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach([
                    ['Engenharia de Beneficiamento Mineral', '3 meses', '$2,500', 'AKZ 2,000,000', 'Avançado', '#1a3a5c'],
                    ['Geoprocessamento e Modelagem 3D', '2 meses', '$1,800', 'AKZ 1,440,000', 'Intermédio', '#0d8a7d'],
                    ['Automação e Controle de Processos Minerais', '2 meses', '$2,000', 'AKZ 1,600,000', 'Intermédio', '#c9922a'],
                ] as [$title, $duration, $priceUsd, $priceAoa, $level, $color])
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg transition-shadow group">
                    <div class="h-40 flex items-center justify-center" style="background-color: {{ $color }}15;">
                        <div class="w-16 h-16 rounded-2xl flex items-center justify-center" style="background-color: {{ $color }}25;">
                            <svg class="w-8 h-8" style="color: {{ $color }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full" style="background-color: {{ $color }}15; color: {{ $color }};">{{ $level }}</span>
                            <span class="text-slate-400 text-xs flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $duration }}
                            </span>
                        </div>
                        <h3 class="font-bold text-[#1a3a5c] mb-4 leading-snug group-hover:text-[#c9922a] transition-colors">{{ $title }}</h3>
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="font-bold text-[#1a3a5c] text-lg">{{ $priceUsd }}</div>
                                <div class="text-slate-400 text-xs">{{ $priceAoa }}</div>
                            </div>
                            <a href="{{ route('courses') }}" class="bg-[#1a3a5c] hover:bg-[#c9922a] text-white text-xs font-semibold px-4 py-2 rounded-lg transition-colors">
                                Ver curso
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- SOBRE --}}
    <section class="py-24 bg-[#1a3a5c]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">Sobre a AMIS</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2 mb-6">Especialistas Angolanos com Visão Global</h2>
                <p class="text-slate-300 leading-relaxed mb-6">
                    Fundada por especialistas com formação internacional — incluindo engenharia pela Universidade de Pesquisas e Tecnologia de Moscovo (MISIS) e experiência na PHOSAGRO — a AMIS nasceu para ser a ponte entre a inovação tecnológica global e as necessidades reais do setor mineiro angolano.
                </p>
                <p class="text-slate-300 leading-relaxed mb-10">
                    A nossa missão é clara: tornar Angola e a África Austral mais competitivas no setor mineiro, através de profissionais qualificados, operações eficientes e tecnologia de ponta.
                </p>
                <div class="grid grid-cols-2 gap-6 mb-10">
                    @foreach([
                        ['CEO', 'Engº MSc Puto Luís', 'Eng. de Minas, MISIS Moscovo'],
                        ['COO', 'Engª Fernanda Amorim', 'Informática e Geologia'],
                    ] as [$role, $name, $spec])
                    <div class="bg-white/10 rounded-xl p-4">
                        <span class="text-[#c9922a] text-xs font-bold uppercase">{{ $role }}</span>
                        <div class="text-white font-semibold mt-1">{{ $name }}</div>
                        <div class="text-slate-400 text-xs mt-0.5">{{ $spec }}</div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('about') }}" class="inline-flex items-center gap-2 bg-[#c9922a] hover:bg-[#a67a22] text-white font-semibold px-6 py-3 rounded-lg transition-colors text-sm">
                    Conhecer a Equipa
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            {{-- Values --}}
            <div class="grid grid-cols-1 gap-4">
                @foreach([
                    ['Inovação Tecnológica', 'Aplicamos as mais recentes tecnologias para resolver problemas reais do setor mineiro.', 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z'],
                    ['Ética e Transparência', 'Operamos com total transparência em todos os projetos e relações com clientes.', 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                    ['Sustentabilidade', 'Todas as nossas soluções integram práticas ambientais responsáveis e sustentáveis.', 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
                ] as [$title, $desc, $icon])
                <div class="flex gap-4 bg-white/5 rounded-2xl p-5 hover:bg-white/10 transition-colors">
                    <div class="w-10 h-10 bg-[#c9922a]/20 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-[#c9922a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-white font-semibold mb-1">{{ $title }}</h4>
                        <p class="text-slate-400 text-sm leading-relaxed">{{ $desc }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA FINAL --}}
    <section class="py-20 bg-[#c9922a]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">Pronto para transformar as suas operações?</h2>
            <p class="text-white/80 text-lg mb-10">Fale connosco e descubra como a AMIS pode ajudar a sua empresa ou carreira.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('services') }}#consultoria"
                   class="inline-flex items-center justify-center gap-2 bg-white text-[#c9922a] hover:bg-slate-100 font-bold px-8 py-3.5 rounded-lg transition-colors text-sm shadow-lg">
                    Solicitar Consultoria
                </a>
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center justify-center gap-2 border-2 border-white text-white hover:bg-white hover:text-[#c9922a] font-bold px-8 py-3.5 rounded-lg transition-colors text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Entrar em Contacto
                </a>
            </div>
        </div>
    </section>
</x-layouts.public>
