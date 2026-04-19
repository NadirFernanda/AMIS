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
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">{{ __('home.services_label') }}</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a3a5c] mt-2">{{ __('home.services_title') }}</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach([
                    [
                        'cor'   => '#1a3a5c',
                        'icon'  => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                        'titulo' => __('home.cons_title'),
                        'desc'   => __('home.cons_desc'),
                        'href'   => route('services') . '#consultoria',
                    ],
                    [
                        'cor'   => '#c9922a',
                        'icon'  => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                        'titulo' => __('home.train_title'),
                        'desc'   => __('home.train_desc'),
                        'href'   => route('courses'),
                    ],
                    [
                        'cor'   => '#0d8a7d',
                        'icon'  => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z',
                        'titulo' => __('home.equip_title'),
                        'desc'   => __('home.equip_desc'),
                        'href'   => route('services') . '#equipamentos',
                    ],
                ] as $s)
                <a href="{{ $s['href'] }}"
                   class="group flex flex-col gap-5 bg-white border border-slate-200 hover:border-transparent hover:shadow-xl rounded-2xl p-7 transition-all">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0 transition-colors"
                         style="background-color: {{ $s['cor'] }}18;">
                        <svg class="w-6 h-6 transition-colors" style="color: {{ $s['cor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $s['icon'] }}"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-extrabold text-[#1a3a5c] text-lg mb-2 group-hover:text-[#c9922a] transition-colors">{{ $s['titulo'] }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed">{{ Str::limit($s['desc'], 110) }}</p>
                    </div>
                    <div class="flex items-center gap-1 text-sm font-semibold transition-colors" style="color: {{ $s['cor'] }}">
                        {{ __('home.learn_more') }}
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PROJETOS EM DESTAQUE --}}
    @if($projetos->count())
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-10 gap-4">
                <div>
                    <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">Portfólio</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a3a5c] mt-1">Projetos em Destaque</h2>
                </div>
                <a href="{{ route('projects') }}" class="shrink-0 text-[#1a3a5c] border border-[#1a3a5c] hover:bg-[#1a3a5c] hover:text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition-all inline-flex items-center gap-2">
                    Ver todos
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-7">
                @foreach($projetos as $p)
                @php
                    $tipoColors = ['consultoria' => '#1a3a5c', 'formacao' => '#c9922a', 'equipamentos' => '#0d8a7d'];
                    $tipoLabels = ['consultoria' => 'Consultoria', 'formacao' => 'Formação', 'equipamentos' => 'Equipamentos'];
                    $cor = $tipoColors[$p->tipo] ?? '#1a3a5c';
                @endphp
                <div class="bg-white rounded-2xl overflow-hidden border border-slate-200 hover:shadow-xl transition-all group">
                    <div class="relative h-44 overflow-hidden">
                        @if($p->foto)
                        <img src="/img/{{ $p->foto }}" alt="{{ $p->titulo }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @else
                        <div class="w-full h-full" style="background-color: {{ $cor }}20;"></div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute top-3 left-3">
                            <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full text-white"
                                  style="background-color: {{ $cor }};">{{ $tipoLabels[$p->tipo] ?? $p->tipo }}</span>
                        </div>
                        @if($p->local)
                        <div class="absolute bottom-3 left-3 flex items-center gap-1.5 text-white text-xs font-medium">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            {{ $p->local }}
                        </div>
                        @endif
                    </div>
                    <div class="p-5">
                        <h3 class="font-extrabold text-[#1a3a5c] leading-snug mb-2 group-hover:text-[#c9922a] transition-colors">{{ $p->titulo }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-4">{{ Str::limit($p->descricao, 100) }}</p>
                        @if($p->resultado)
                        <div class="flex items-center gap-2 text-xs font-semibold rounded-lg px-3 py-2 border" style="color: {{ $cor }}; background-color: {{ $cor }}10; border-color: {{ $cor }}20;">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            {{ $p->resultado }}
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- DEPOIMENTOS --}}
    @if($depoimentos->count())
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">Testemunhos</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a3a5c] mt-2">O Que Dizem os Nossos Clientes</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-7">
                @foreach($depoimentos as $d)
                <div class="bg-slate-50 rounded-2xl p-7 border border-slate-100 hover:shadow-lg transition-shadow relative">
                    <div class="absolute top-5 right-6 text-6xl font-serif text-[#1a3a5c]/08 leading-none select-none">"</div>
                    <div class="flex gap-1 mb-4">
                        @for($i = 0; $i < ($d->rating ?? 5); $i++)
                        <svg class="w-4 h-4 text-[#c9922a]" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        @endfor
                    </div>
                    <p class="text-slate-600 leading-relaxed text-sm italic mb-6">"{{ $d->texto }}"</p>
                    <div class="flex items-center gap-3 pt-4 border-t border-slate-200">
                        <div class="w-9 h-9 rounded-full bg-[#1a3a5c] flex items-center justify-center text-white text-sm font-extrabold shrink-0">
                            {{ strtoupper(substr($d->nome, 0, 1)) }}
                        </div>
                        <div>
                            <div class="font-bold text-[#1a3a5c] text-sm">{{ $d->nome }}</div>
                            <div class="text-slate-400 text-xs">{{ $d->cargo }} · {{ $d->empresa }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA FINAL --}}
    <section class="py-20 bg-[#1a3a5c]">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">{{ __('home.cta_section_title') }}</h2>
            <p class="text-slate-300 text-lg mb-10">{{ __('home.cta_section_desc') }}</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center justify-center gap-2 bg-[#c9922a] hover:bg-[#a67a22] text-white font-bold px-8 py-3.5 rounded-lg transition-colors text-sm shadow-lg">
                    {{ __('home.cta_contact') }}
                </a>
                <a href="{{ route('services') }}"
                   class="inline-flex items-center justify-center gap-2 border border-white/30 hover:border-white text-white font-semibold px-8 py-3.5 rounded-lg transition-colors text-sm">
                    {{ __('home.cta_know_services') }}
                </a>
            </div>
        </div>
    </section>
</x-layouts.public>