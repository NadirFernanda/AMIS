<x-layouts.public>
    <x-slot name="title">{{ __('about.page_title') }}</x-slot>
    <x-slot name="description">{{ __('about.header_desc') }}</x-slot>

    {{-- HEADER --}}
    <div class="relative bg-[#1a3a5c] py-28 overflow-hidden">
        <div class="absolute inset-0">
            <img src="/img/18.jpeg" alt="" class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-r from-[#1a3a5c] via-[#1a3a5c]/80 to-transparent"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">{{ __('about.header_label') }}</span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white mt-2">{{ __('about.header_title') }}</h1>
            <p class="text-slate-300 mt-4 max-w-2xl">{{ __('about.header_desc') }}</p>
        </div>
    </div>

    {{-- MISSÃO / VISÃO / VALORES --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
                @foreach([
                    [__('about.mission_label'), __('about.mission_desc1'), '#1a3a5c', 'M13 10V3L4 14h7v7l9-11h-7z'],
                    [__('about.val_innov_title'), __('about.val_innov_desc'), '#c9922a', 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'],
                    [__('about.val_ethics_title'), __('about.val_ethics_desc'), '#0d8a7d', 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
                ] as [$title, $text, $color, $icon])
                <div class="rounded-2xl p-8 border-2 border-slate-100 hover:border-{{ $title == 'Missão' ? '[#1a3a5c]' : ($title == 'Visão' ? '[#c9922a]' : '[#0d8a7d]') }}/20 transition-all hover:shadow-lg">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-5" style="background-color: {{ $color }}15;">
                        <svg class="w-6 h-6" style="color: {{ $color }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-extrabold mb-3" style="color: {{ $color }}">{{ $title }}</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">{{ $text }}</p>
                </div>
                @endforeach
            </div>

            {{-- HISTÓRIA --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">{{ __('about.mission_label') }}</span>
                    <h2 class="text-3xl font-extrabold text-[#1a3a5c] mt-2 mb-6">{{ __('about.mission_title') }}</h2>
                    <p class="text-slate-500 leading-relaxed mb-4">
                        {{ __('about.mission_desc1') }}
                    </p>
                    <p class="text-slate-500 leading-relaxed mb-4">
                        {{ __('about.mission_desc2') }}
                    </p>
                    <p class="text-slate-500 leading-relaxed">
                        {{ __('about.mission_desc3') }}
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2 rounded-2xl overflow-hidden h-48 relative">
                        <img src="/img/19.jpeg" alt="Angola Mining" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1a3a5c]/70 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="text-white text-xs font-bold uppercase tracking-wider bg-[#c9922a] px-3 py-1 rounded-full">AMIS · Angola</span>
                        </div>
                    </div>
                    @forelse($stats as $stat)
                    <div class="bg-slate-50 rounded-2xl p-6 text-center border border-slate-100">
                        <div class="text-3xl font-extrabold text-[#1a3a5c] mb-2">{{ $stat->valor }}</div>
                        <div class="text-slate-500 text-sm">{{ $stat->descricao }}</div>
                    </div>
                    @empty
                    <div class="col-span-2 text-center text-slate-400 text-sm py-4">{{ __('about.no_stats') }}</div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    {{-- FUNDADORES --}}
    <section id="fundadores" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">{{ __('about.team_label') }}</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a3a5c] mt-2">{{ __('about.team_title') }}</h2>
                <p class="text-slate-500 mt-4 max-w-xl mx-auto">{{ __('about.team_desc') }}</p>
            </div>

            @php $teamColors = ['from-[#1a3a5c] to-[#0f2640]', 'from-[#0d8a7d] to-[#0a6e63]', 'from-[#c9922a] to-[#a67a22]']; @endphp
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                @forelse($equipa as $i => $m)
                @php
                    $gradient = $teamColors[$i % count($teamColors)];
                    $initials = collect(explode(' ', $m->nome))->map(fn($w) => strtoupper(mb_substr($w,0,1)))->filter(fn($c) => ctype_upper($c))->take(2)->implode('');
                    $cor = $m->cor ?? '#1a3a5c';
                    $tags = is_array($m->tags) ? $m->tags : [];
                @endphp
                <div class="bg-white rounded-2xl overflow-hidden border border-slate-200 hover:shadow-xl transition-shadow">
                    <div class="bg-gradient-to-br {{ $gradient }} h-56 relative overflow-hidden">
                        @if($m->foto)
                        <img src="/img/{{ $m->foto }}" alt="{{ $m->nome }}" class="w-full h-full object-cover object-top">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                        @else
                        <div class="w-full h-full flex items-center justify-center">
                            <div class="w-20 h-20 rounded-full flex items-center justify-center border-4 border-white/20 text-white text-2xl font-extrabold" style="background-color: {{ $cor }}40;">
                                {{ $initials }}
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="p-8">
                        <div class="text-xs font-bold uppercase tracking-widest mb-1" style="color: {{ $cor }};">{{ $m->cargo }}</div>
                        <h3 class="text-2xl font-extrabold text-[#1a3a5c] mb-1">{{ $m->nome }}</h3>
                        @if($m->especializacao)<p class="text-sm font-medium mb-4" style="color: {{ $cor }};">{{ $m->especializacao }}</p>@endif
                        @if($m->bio)<p class="text-slate-500 text-sm leading-relaxed mb-6">{{ Str::limit($m->bio, 160) }}</p>@endif
                        @if(count($tags))
                        <div class="flex flex-wrap gap-2 mb-6">
                            @foreach($tags as $tag)
                            <span class="text-xs px-2.5 py-1 rounded-full font-medium" style="background-color: {{ $cor }}18; color: {{ $cor }};">{{ $tag }}</span>
                            @endforeach
                        </div>
                        @endif
                        @if($m->slug)
                        <a href="{{ route('fundador', $m->slug) }}"
                           class="inline-flex items-center gap-2 text-sm font-semibold transition-colors group"
                           style="color: {{ $cor }};">
                            {{ __('about.view_profile') }}
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-span-2 text-center text-slate-400 py-16">
                    <p>{{ __('about.no_team') }}</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- PARCEIROS / CTA --}}
    <section class="relative py-20 bg-[#c9922a] overflow-hidden">
        <div class="absolute inset-0">
            <img src="/img/11.jpeg" alt="" class="w-full h-full object-cover opacity-10">
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold text-white mb-4">{{ __('about.cta_title') }}</h2>
            <p class="text-white/80 text-lg mb-10">{{ __('about.cta_desc') }}</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="bg-white text-[#c9922a] hover:bg-slate-100 font-bold px-8 py-3.5 rounded-lg transition-colors text-sm">
                    {{ __('about.cta_talk') }}
                </a>
                <a href="{{ route('courses') }}" class="border-2 border-white text-white hover:bg-white hover:text-[#c9922a] font-bold px-8 py-3.5 rounded-lg transition-colors text-sm">
                    {{ __('about.cta_courses') }}
                </a>
            </div>
        </div>
    </section>
</x-layouts.public>
