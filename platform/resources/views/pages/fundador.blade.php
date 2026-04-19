<x-layouts.public>
    <x-slot name="title">{{ $membro->nome }} · AMIS</x-slot>
    <x-slot name="description">Co-Fundador(a) da AMIS — Angola Mining Innovation & Solutions. {{ $membro->especializacao }}</x-slot>

    @php
        $cor     = $membro->cor ?? '#1a3a5c';
        $bgPhoto = $membro->ordem === 1 ? '15' : '16';
        $tags    = is_array($membro->tags) ? $membro->tags : [];
    @endphp

    {{-- HERO --}}
    <div class="relative overflow-hidden" style="background-color: {{ $cor }};">
        <div class="absolute inset-0">
            <img src="/img/{{ $bgPhoto }}.jpeg" alt="" class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0" style="background: linear-gradient(to right, {{ $cor }}f5 40%, {{ $cor }}99 70%, {{ $cor }}44);"></div>
        </div>

        <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-20">
            {{-- Back --}}
            <a href="{{ route('about') }}#fundadores"
               class="inline-flex items-center gap-2 text-white/60 hover:text-white text-sm mb-12 transition-colors group">
                <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Fundadores da AMIS
            </a>

            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-8">
                {{-- Avatar --}}
                <div class="w-28 h-28 rounded-2xl border-4 border-white/20 flex items-center justify-center text-3xl font-extrabold text-white shrink-0"
                     style="background-color: rgba(255,255,255,0.12); backdrop-filter: blur(8px);">
                    {{ $initials }}
                </div>
                <div>
                    <div class="inline-flex items-center gap-2 mb-3">
                        <span class="text-xs font-bold uppercase tracking-widest px-3 py-1 rounded-full bg-white/15 text-white/80">
                            Co-Fundador{{ str_contains($membro->cargo, 'a') ? 'a' : '' }} · AMIS Angola
                        </span>
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-3">
                        {{ $membro->nome }}
                    </h1>
                    @if($membro->especializacao)
                    <p class="text-white/70 text-lg font-medium">{{ $membro->especializacao }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- CONTENT --}}
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">

                {{-- Main bio --}}
                <div class="lg:col-span-2">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-1 h-8 rounded-full" style="background-color: {{ $cor }};"></div>
                        <h2 class="text-2xl font-extrabold text-[#1a3a5c]">Perfil</h2>
                    </div>
                    <p class="text-slate-600 leading-relaxed text-lg mb-8">{{ $membro->bio }}</p>

                    {{-- Tags as skill blocks --}}
                    @if(count($tags))
                    <div class="mt-10">
                        <h3 class="text-sm font-bold uppercase tracking-widest text-slate-400 mb-5">Áreas de Especialização</h3>
                        <div class="flex flex-wrap gap-3">
                            @foreach($tags as $tag)
                            <span class="px-4 py-2 rounded-xl text-sm font-semibold border-2"
                                  style="border-color: {{ $cor }}30; color: {{ $cor }}; background-color: {{ $cor }}0d;">
                                {{ $tag }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                {{-- Sidebar info card --}}
                <div>
                    <div class="rounded-2xl border border-slate-100 overflow-hidden shadow-sm sticky top-24">
                        {{-- Card header --}}
                        <div class="h-24 relative" style="background-color: {{ $cor }};">
                            <div class="absolute inset-0 opacity-20">
                                <img src="/img/{{ $bgPhoto }}.jpeg" alt="" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-14 h-14 rounded-xl border-2 border-white/30 flex items-center justify-center text-xl font-extrabold text-white"
                                     style="background-color: rgba(255,255,255,0.15);">
                                    {{ $initials }}
                                </div>
                            </div>
                        </div>

                        <div class="p-6 space-y-5 bg-white">
                            <div>
                                <div class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-1">Função</div>
                                <div class="font-bold text-[#1a3a5c]">{{ $membro->cargo }}</div>
                                <div class="text-xs text-slate-400 mt-0.5">AMIS · Angola</div>
                            </div>

                            @if($membro->especializacao)
                            <div class="pt-4 border-t border-slate-100">
                                <div class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-1">Especialização</div>
                                <div class="text-slate-600 text-sm">{{ $membro->especializacao }}</div>
                            </div>
                            @endif

                            <div class="pt-4 border-t border-slate-100">
                                <div class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-1">Empresa</div>
                                <div class="text-slate-600 text-sm">Angola Mining Innovation & Solutions</div>
                                <div class="text-slate-400 text-xs mt-0.5">Luanda, Angola</div>
                            </div>

                            <div class="pt-4">
                                <a href="{{ route('contact') }}"
                                   class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-4 rounded-lg text-sm font-semibold text-white transition-opacity hover:opacity-90"
                                   style="background-color: {{ $cor }};">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    Entrar em Contacto
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- OTHER FOUNDER --}}
    <section class="py-16 bg-slate-50 border-t border-slate-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-6">Outros Fundadores</p>
            <a href="{{ route('about') }}#fundadores"
               class="inline-flex items-center gap-3 group text-[#1a3a5c] hover:text-[#c9922a] transition-colors font-semibold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Ver toda a equipa fundadora
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </section>

</x-layouts.public>
