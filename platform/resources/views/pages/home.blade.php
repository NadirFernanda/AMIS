<x-layouts.public>
    <x-slot name="title">{{ __('nav.home') }}</x-slot>

    {{-- HERO --}}
    <section class="relative min-h-screen flex items-center overflow-hidden bg-[#0f2640]">
        {{-- Real photo background --}}
        <div class="absolute inset-0">
            <img src="/img/1.jpeg" alt="" class="w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0f2640]/95 via-[#0f2640]/60 to-[#0f2640]/20"></div>
        </div>
        {{-- Gradient accent --}}
        <div class="absolute top-1/4 right-0 w-96 h-96 bg-[#c9922a] opacity-10 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-flex items-center gap-2 bg-white/10 text-[#c9922a] text-xs font-semibold px-3 py-1.5 rounded-full mb-6 border border-[#c9922a]/30">
                    <span class="w-1.5 h-1.5 bg-[#c9922a] rounded-full animate-pulse"></span>
                    {{ __('home.hero_badge') }}
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                    {{ __('home.hero_title_1') }}
                    <span class="text-[#c9922a]">{{ __('home.hero_title_2') }}</span>
                    {{ __('home.hero_title_3') }}
                </h1>
                <p class="text-slate-300 text-lg leading-relaxed mb-10 max-w-xl">
                    {{ __('home.hero_desc') }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('courses') }}"
                       class="inline-flex items-center justify-center gap-2 bg-[#c9922a] hover:bg-[#a67a22] text-white font-semibold px-7 py-3.5 rounded-lg transition-colors text-sm shadow-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        {{ __('home.cta_courses') }}
                    </a>
                    <a href="{{ route('services') }}#consultoria"
                       class="inline-flex items-center justify-center gap-2 border border-white/30 hover:border-white text-white font-semibold px-7 py-3.5 rounded-lg transition-colors text-sm">
                        {{ __('home.cta_consulting') }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Hero right: photo collage + stats --}}
            <div class="hidden lg:grid grid-cols-2 gap-3">
                {{-- Photo mosaic --}}
                <div class="col-span-2 grid grid-cols-2 gap-3">
                    <div class="rounded-2xl overflow-hidden h-36 relative">
                        <img src="/img/2.jpeg" alt="Mineração Angola" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0f2640]/60 to-transparent"></div>
                    </div>
                    <div class="rounded-2xl overflow-hidden h-36 relative">
                        <img src="/img/3.jpeg" alt="Consultoria Mineira" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0f2640]/60 to-transparent"></div>
                    </div>
                </div>
                @forelse($stats as $stat)
                <div class="bg-white/10 backdrop-blur border border-white/10 rounded-2xl p-4 text-center hover:bg-white/15 transition-colors">
                    <div class="w-9 h-9 bg-[#c9922a]/20 rounded-xl flex items-center justify-center mx-auto mb-2">
                        <svg class="w-5 h-5 text-[#c9922a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat->icon_path ?? 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z' }}"/>
                        </svg>
                    </div>
                    <div class="text-2xl font-extrabold text-white mb-1">{{ $stat->valor }}</div>
                    <div class="text-slate-400 text-xs">{{ $stat->descricao }}</div>
                </div>
                @empty
                <div class="col-span-2 text-center text-slate-400 text-sm py-4">{{ __('home.no_stats') }}</div>
                @endforelse
            </div>
            {{-- Mobile: single photo --}}
            <div class="lg:hidden rounded-2xl overflow-hidden h-56 relative">
                <img src="/img/2.jpeg" alt="Mineração Angola" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#0f2640]/60 to-transparent"></div>
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-slate-400">
            <span class="text-xs">{{ __('home.scroll_explore') }}</span>
            <div class="w-5 h-8 border border-slate-500 rounded-full flex items-start justify-center p-1">
                <div class="w-1 h-2 bg-[#c9922a] rounded-full animate-bounce"></div>
            </div>
        </div>
    </section>

    {{-- SERVIÇOS --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">{{ __('home.services_label') }}</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a3a5c] mt-2">{{ __('home.services_title') }}</h2>
                <p class="text-slate-500 mt-4 max-w-2xl mx-auto">{{ __('home.services_desc') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Consultoria --}}
                <div class="group bg-white border border-slate-200 rounded-2xl overflow-hidden hover:shadow-xl hover:border-[#1a3a5c]/20 transition-all">
                    <div class="relative h-44 overflow-hidden">
                        <img src="/img/4.jpeg" alt="Consultoria Técnica" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1a3a5c]/80 via-[#1a3a5c]/20 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <div class="w-10 h-10 bg-white/20 backdrop-blur rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                    <h3 class="text-xl font-bold text-[#1a3a5c] mb-3">{{ __('home.cons_title') }}</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6">{{ __('home.cons_desc') }}</p>
                    <div class="space-y-2 mb-6">
                        @foreach(__('home.cons_items') as $item)
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
                            <span class="text-xs text-slate-400">{{ __('home.from_price') }}</span>
                            <div class="text-[#1a3a5c] font-bold text-lg">$15,000 USD</div>
                        </div>
                        <a href="{{ route('services') }}#consultoria"
                           class="text-[#1a3a5c] hover:text-[#c9922a] text-sm font-semibold flex items-center gap-1 transition-colors">
                            {{ __('home.learn_more') }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                    </div>
                </div>

                {{-- Formação --}}
                <div class="group bg-[#1a3a5c] border border-[#1a3a5c] rounded-2xl hover:shadow-xl transition-all relative overflow-hidden">
                    <div class="absolute top-4 right-4 z-10 bg-[#c9922a] text-white text-xs font-bold px-2.5 py-1 rounded-full">{{ __('home.popular_badge') }}</div>
                    <div class="relative h-44 overflow-hidden">
                        <img src="/img/5.jpeg" alt="Formação Profissional" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-70">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1a3a5c] via-[#1a3a5c]/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <div class="w-10 h-10 bg-[#c9922a]/30 backdrop-blur rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#c9922a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                    <h3 class="text-xl font-bold text-white mb-3">{{ __('home.train_title') }}</h3>
                    <p class="text-slate-300 text-sm leading-relaxed mb-6">{{ __('home.train_desc') }}</p>
                    <div class="space-y-2 mb-6">
                        @foreach(__('home.train_items') as $item)
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
                            <span class="text-xs text-slate-400">{{ __('home.from_price') }}</span>
                            <div class="text-white font-bold text-lg">$1,000 USD</div>
                        </div>
                        <a href="{{ route('courses') }}"
                           class="text-[#c9922a] hover:text-white text-sm font-semibold flex items-center gap-1 transition-colors">
                            {{ __('home.see_courses') }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                    </div>
                </div>

                {{-- Equipamentos --}}
                <div class="group bg-white border border-slate-200 rounded-2xl overflow-hidden hover:shadow-xl hover:border-[#0d8a7d]/20 transition-all">
                    <div class="relative h-44 overflow-hidden">
                        <img src="/img/6.jpeg" alt="Equipamentos Mineiros" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0d8a7d]/80 via-[#0d8a7d]/20 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <div class="w-10 h-10 bg-white/20 backdrop-blur rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                    <h3 class="text-xl font-bold text-[#1a3a5c] mb-3">{{ __('home.equip_title') }}</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6">{{ __('home.equip_desc') }}</p>
                    <div class="space-y-2 mb-6">
                        @foreach(__('home.equip_items') as $item)
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
                            <span class="text-xs text-slate-400">{{ __('home.from_price') }}</span>
                            <div class="text-[#0d8a7d] font-bold text-lg">$5,000 USD</div>
                        </div>
                        <a href="{{ route('services') }}#equipamentos"
                           class="text-[#0d8a7d] hover:text-[#c9922a] text-sm font-semibold flex items-center gap-1 transition-colors">
                            {{ __('home.learn_more') }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PHOTO STRIP --}}
    <section class="py-0 overflow-hidden">
        <div class="flex gap-0 h-32 sm:h-44">
            @foreach([7,8,9,10,11] as $n)
            <div class="flex-1 overflow-hidden relative">
                <img src="/img/{{ $n }}.jpeg" alt="" class="w-full h-full object-cover hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-[#0f2640]/30 hover:bg-[#0f2640]/0 transition-colors duration-500"></div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- CURSOS EM DESTAQUE --}}
    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">{{ __('home.courses_label') }}</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a3a5c] mt-2">{{ __('home.courses_title') }}</h2>
                </div>
                <a href="{{ route('courses') }}" class="text-[#1a3a5c] hover:text-[#c9922a] font-semibold text-sm flex items-center gap-1 transition-colors shrink-0">
                    {{ __('home.see_all_courses') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $colors = ['#1a3a5c', '#0d8a7d', '#c9922a'];
                    $courseImgs = [12, 13, 14];
                @endphp
                @forelse($cursosDestaque as $i => $curso)
                @php $cor = $colors[$i % 3]; $img = $courseImgs[$i % 3]; @endphp
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg transition-shadow group">
                    <div class="relative h-40 overflow-hidden">
                        <img src="/img/{{ $img }}.jpeg" alt="{{ $curso->titulo }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0" style="background: linear-gradient(to top, {{ $cor }}cc, transparent);"></div>
                        <div class="absolute bottom-3 left-3">
                            <span class="text-xs font-bold text-white bg-black/30 backdrop-blur px-2 py-0.5 rounded-full">{{ $curso->nivel ?? 'Profissional' }}</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full" style="background-color: {{ $cor }}15; color: {{ $cor }};">{{ $curso->modalidade ?? 'Online' }}</span>
                            @if($curso->duracao)
                            <span class="text-slate-400 text-xs flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $curso->duracao }}
                            </span>
                            @endif
                        </div>
                        <h3 class="font-bold text-[#1a3a5c] mb-4 leading-snug group-hover:text-[#c9922a] transition-colors">{{ $curso->titulo }}</h3>
                        <div class="flex items-center justify-between">
                            <div>
                                @if($curso->preco_usd)<div class="font-bold text-[#1a3a5c] text-lg">${{ number_format((float) $curso->preco_usd, 0) }}</div>@endif
                                @if($curso->preco_aoa)<div class="text-slate-400 text-xs">AKZ {{ number_format((float) $curso->preco_aoa, 0) }}</div>@endif
                            </div>
                            <a href="{{ route('courses') }}" class="bg-[#1a3a5c] hover:bg-[#c9922a] text-white text-xs font-semibold px-4 py-2 rounded-lg transition-colors">
                                {{ __('home.see_course') }}
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center text-slate-400 py-16">
                    <p>{{ __('home.no_courses') }}</p>
                    <a href="{{ route('courses') }}" class="text-[#c9922a] hover:underline mt-2 inline-block text-sm">Ver todos os cursos</a>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- SOBRE --}}
    <section class="py-24 bg-[#1a3a5c]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">{{ __('home.about_label') }}</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2 mb-6">{{ __('home.about_title') }}</h2>
                <p class="text-slate-300 leading-relaxed mb-6">
                    {{ __('home.about_desc1') }}
                </p>
                <p class="text-slate-300 leading-relaxed mb-10">
                    {{ __('home.about_desc2') }}
                </p>
                <div class="grid grid-cols-2 gap-4 mb-10">
                    @foreach([
                        ['Co-Fundador', 'Engº MSc Puto Luís', 'Eng. de Minas, MISIS Moscovo', 'puto-luis'],
                        ['Co-Fundadora', 'Engª Fernanda Gonçalves', 'Informática & Geologia', 'fernanda-goncalves'],
                    ] as [$role, $name, $spec, $slug])
                    <a href="{{ route('fundador', $slug) }}" class="bg-white/10 hover:bg-white/20 rounded-xl p-4 transition-colors group block">
                        <span class="text-[#c9922a] text-xs font-bold uppercase">{{ $role }}</span>
                        <div class="text-white font-semibold mt-1 text-sm group-hover:text-[#c9922a] transition-colors">{{ $name }}</div>
                        <div class="text-slate-400 text-xs mt-0.5">{{ $spec }}</div>
                        <div class="text-slate-500 text-xs mt-2 flex items-center gap-1 group-hover:text-slate-300 transition-colors">
                            Ver perfil
                            <svg class="w-3 h-3 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </div>
                    </a>
                    @endforeach
                </div>
                <a href="{{ route('about') }}" class="inline-flex items-center gap-2 bg-[#c9922a] hover:bg-[#a67a22] text-white font-semibold px-6 py-3 rounded-lg transition-colors text-sm">
                    {{ __('home.know_team') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            {{-- About photo grid --}}
            <div class="grid grid-cols-2 gap-4">
                <div class="rounded-2xl overflow-hidden h-52 col-span-2 relative">
                    <img src="/img/15.jpeg" alt="Equipa AMIS" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f2640]/50 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <div class="text-xs text-[#c9922a] font-bold uppercase tracking-wider">AMIS</div>
                        <div class="font-semibold text-sm">Angola Mining Innovation & Solutions</div>
                    </div>
                </div>
                <div class="rounded-2xl overflow-hidden h-36">
                    <img src="/img/16.jpeg" alt="" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                </div>
                <div class="rounded-2xl overflow-hidden h-36">
                    <img src="/img/17.jpeg" alt="" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                </div>
            </div>

            {{-- Values --}}
            <div class="grid grid-cols-1 gap-4 lg:col-span-2 lg:grid-cols-3">
                @foreach([
                    [__('home.values_1_title'), __('home.values_1_desc'), 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z'],
                    [__('home.values_2_title'), __('home.values_2_desc'), 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                    [__('home.values_3_title'), __('home.values_3_desc'), 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
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
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">{{ __('home.cta_section_title') }}</h2>
            <p class="text-white/80 text-lg mb-10">{{ __('home.cta_section_desc') }}</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('services') }}#consultoria"
                   class="inline-flex items-center justify-center gap-2 bg-white text-[#c9922a] hover:bg-slate-100 font-bold px-8 py-3.5 rounded-lg transition-colors text-sm shadow-lg">
                    {{ __('home.cta_contact') }}
                </a>
                <a href="{{ route('services') }}"
                   class="inline-flex items-center justify-center gap-2 border-2 border-white text-white hover:bg-white hover:text-[#c9922a] font-bold px-8 py-3.5 rounded-lg transition-colors text-sm">
                    {{ __('home.cta_know_services') }}
                </a>
            </div>
        </div>
    </section>
</x-layouts.public>
