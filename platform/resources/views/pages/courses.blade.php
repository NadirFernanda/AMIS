<x-layouts.public>
    <x-slot name="title">{{ __('courses.page_title') }}</x-slot>
    <x-slot name="description">{{ __('courses.page_desc') }}</x-slot>

    {{-- PAGE HEADER --}}
    <div class="relative bg-[#1a3a5c] py-28 overflow-hidden">
        <div class="absolute inset-0">
            <img src="/img/5.jpeg" alt="" class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-r from-[#1a3a5c] via-[#1a3a5c]/85 to-[#1a3a5c]/60"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">{{ __('courses.header_label') }}</span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white mt-2">{{ __('courses.header_title') }}</h1>
            <p class="text-slate-300 mt-4 max-w-2xl">{{ __('courses.header_desc') }}</p>
            {{-- Stats bar --}}
            <div class="flex flex-wrap gap-8 mt-10">
                @foreach([$cursos->count() . ' ' . __('courses.stat_courses'), __('courses.stat_graduates'), __('courses.stat_certificate'), __('courses.stat_format')] as $stat)
                <div class="flex items-center gap-2 text-sm text-slate-300">
                    <svg class="w-4 h-4 text-[#c9922a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                    {{ $stat }}
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- COURSES GRID --}}
    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                @forelse($cursos as $curso)
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-xl transition-shadow">
                    <div class="h-3" style="background-color: {{ $curso->cor }};"></div>
                    <div class="p-8">
                        <div class="flex flex-wrap items-center gap-2 mb-4">
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full" style="background-color: {{ $curso->cor }}15; color: {{ $curso->cor }}">{{ $curso->nivel }}</span>
                            <span class="flex items-center gap-1 text-xs text-slate-400">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $curso->duracao }}
                            </span>
                            <span class="flex items-center gap-1 text-xs text-slate-400">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.069A1 1 0 0121 8.868v6.264a1 1 0 01-1.447.894L15 14M3 8h12a2 2 0 012 2v4a2 2 0 01-2 2H3a2 2 0 01-2-2v-4a2 2 0 012-2z"/>
                                </svg>
                                {{ $curso->modalidade }}
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-[#1a3a5c] mb-3 leading-snug">{{ $curso->titulo }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-6">{{ $curso->descricao }}</p>
                        @if($curso->topicos)
                        <div class="grid grid-cols-2 gap-1.5 mb-6">
                            @foreach($curso->topicos as $t)
                            <div class="flex items-center gap-1.5 text-xs text-slate-600">
                                <svg class="w-3.5 h-3.5 shrink-0" style="color: {{ $curso->cor }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ $t }}
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <div class="flex items-center justify-between border-t border-slate-100 pt-5">
                            <div>
                                <div class="font-bold text-[#1a3a5c] text-xl">{{ $curso->preco_usd }}</div>
                                <div class="text-slate-400 text-xs">{{ $curso->preco_aoa }}</div>
                            </div>
                            <a href="{{ route('contact') }}?curso={{ urlencode($curso->titulo) }}"
                               class="text-white font-semibold text-sm px-5 py-2.5 rounded-xl transition-colors"
                               style="background-color: {{ $curso->cor }}"
                               onmouseover="this.style.filter='brightness(0.85)'" onmouseout="this.style.filter='none'">
                                {{ __('courses.enroll_btn') }}
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="lg:col-span-2 py-16 text-center text-slate-400">
                    <p class="font-medium">{{ __('courses.no_courses') }}</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- CERTIFICAÇÃO --}}
    <section class="relative py-20 bg-[#1a3a5c] overflow-hidden">
        <div class="absolute inset-0">
            <img src="/img/8.jpeg" alt="" class="w-full h-full object-cover opacity-15">
            <div class="absolute inset-0 bg-[#1a3a5c]/80"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold text-white mb-4">{{ __('courses.certificates') }}</h2>
            <p class="text-slate-300 max-w-xl mx-auto mb-12">{{ __('courses.cta_desc') }}</p>
            <div class="inline-flex items-center gap-4 bg-white/10 rounded-2xl px-8 py-5 border border-white/20">
                <svg class="w-12 h-12 text-[#c9922a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
                <div class="text-left">
                    <div class="text-white font-bold">{{ __('courses.cert_name') }}</div>
                    <div class="text-slate-400 text-sm">{{ __('courses.cert_desc') }}</div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>
