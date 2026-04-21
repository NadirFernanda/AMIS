<x-layouts.public>
    <x-slot name="title">{{ __('services.page_title') }}</x-slot>
    <x-slot name="description">{{ __('services.page_desc') }}</x-slot>

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-[#102b47] py-14 sm:py-16">
        <div class="absolute inset-0">
            <img src="/img/9.jpeg" alt="" class="h-full w-full object-cover opacity-20">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(201,146,42,0.35),transparent_44%),linear-gradient(112deg,rgba(16,43,71,0.95),rgba(16,43,71,0.72),rgba(16,43,71,0.96))]"></div>
        </div>
        <div class="relative mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-12 lg:items-end lg:px-8">
            <div class="lg:col-span-8">
                <span class="inline-flex rounded-full border border-[#c9922a]/40 bg-[#c9922a]/10 px-4 py-1 text-xs font-bold uppercase tracking-[0.18em] text-[#f1cc7f]">{{ __('services.header_label') }}</span>
                <h1 class="mt-6 max-w-4xl text-4xl font-extrabold leading-tight text-white sm:text-5xl">{{ __('services.header_title') }}</h1>
                <p class="mt-5 max-w-2xl text-base leading-relaxed text-slate-200 sm:text-lg">{{ __('services.header_desc') }}</p>
                <div class="mt-8 flex flex-wrap items-center gap-3">
                    <a href="#todos-servicos" class="inline-flex items-center gap-2 rounded-xl bg-[#c9922a] px-6 py-3 text-sm font-semibold text-white transition-colors hover:bg-[#a67a22]">
                        {{ __('services.explore_btn') }}
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center rounded-xl border border-white/25 bg-white/10 px-6 py-3 text-sm font-semibold text-white transition-colors hover:bg-white/20">
                        {{ __('services.cta_btn') }}
                    </a>
                </div>
            </div>

            <div class="lg:col-span-4">
                <div class="rounded-2xl border border-white/20 bg-white/10 p-6 backdrop-blur-sm">
                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#f1cc7f]">{{ __('services.quick_facts') }}</p>
                    <div class="mt-5 space-y-4">
                        <div class="rounded-xl border border-white/10 bg-white/5 p-4">
                            <p class="text-xs uppercase tracking-wide text-slate-300">{{ __('services.total_consulting') }}</p>
                            <p class="mt-1 text-3xl font-extrabold text-white">{{ $consultorias->count() }}</p>
                        </div>
                        <div class="rounded-xl border border-white/10 bg-white/5 p-4">
                            <p class="text-xs uppercase tracking-wide text-slate-300">{{ __('services.total_equipment') }}</p>
                            <p class="mt-1 text-3xl font-extrabold text-white">{{ $equipamentos->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ALL SERVICES --}}
    <section id="todos-servicos" class="bg-white py-20 sm:py-24 scroll-mt-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#c9922a]">{{ __('services.all_services_label') }}</span>
                    <h2 class="mt-2 text-3xl font-extrabold text-[#102b47] sm:text-4xl">{{ __('services.all_services_title') }}</h2>
                </div>
                <p class="max-w-2xl text-sm leading-relaxed text-slate-500 sm:text-base">{{ __('services.all_services_desc') }}</p>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                @forelse($consultorias as $c)
                <article class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 transition-all duration-300 hover:-translate-y-1 hover:border-[#c9922a]/35 hover:shadow-xl">
                    <div class="absolute right-4 top-4 rounded-full bg-[#1a3a5c]/5 px-3 py-1 text-[11px] font-semibold uppercase tracking-wide text-[#1a3a5c]">{{ __('services.cons_label') }}</div>
                    <h3 class="pr-20 text-xl font-bold text-[#1a3a5c]">{{ $c->titulo }}</h3>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">{{ $c->tagline ?: __('services.cons_desc') }}</p>
                    <div class="mt-6 flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-wide text-slate-400">{{ __('services.from_label') }}</p>
                            <p class="text-lg font-extrabold text-[#102b47]">{{ $c->preco_usd }}</p>
                        </div>
                        <a href="{{ route('contact') }}?servico={{ strtolower($c->titulo) }}" class="inline-flex items-center rounded-lg bg-[#1a3a5c] px-4 py-2 text-xs font-semibold text-white transition-colors hover:bg-[#10263d]">
                            {{ __('services.request_btn') }}
                        </a>
                    </div>
                </article>
                @empty
                <div class="md:col-span-2 xl:col-span-3 rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-6 py-12 text-center text-slate-500">
                    {{ __('services.no_packages') }}
                </div>
                @endforelse

                @forelse($equipamentos as $e)
                <article class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 transition-all duration-300 hover:-translate-y-1 hover:border-[#0d8a7d]/35 hover:shadow-xl">
                    <div class="absolute right-4 top-4 rounded-full bg-[#0d8a7d]/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-wide text-[#0d8a7d]">{{ __('services.equip_label') }}</div>
                    <h3 class="pr-24 text-xl font-bold text-[#1a3a5c]">{{ $e->titulo }}</h3>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">{{ \Illuminate\Support\Str::limit($e->descricao, 135) }}</p>
                    <div class="mt-6">
                        <a href="{{ route('contact') }}?servico=equipamentos" class="inline-flex items-center rounded-lg bg-[#0d8a7d] px-4 py-2 text-xs font-semibold text-white transition-colors hover:bg-[#09685d]">
                            {{ __('services.request_btn') }}
                        </a>
                    </div>
                </article>
                @empty
                <div class="md:col-span-2 xl:col-span-3 rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-6 py-12 text-center text-slate-500">
                    {{ __('services.no_equip') }}
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- CONSULTORIA --}}
    <section id="consultoria" class="bg-slate-50 py-20 sm:py-24 scroll-mt-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative mb-12 overflow-hidden rounded-3xl h-52 sm:h-60">
                <img src="/img/4.jpeg" alt="Consultoria Técnica" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-[#1a3a5c]/95 via-[#1a3a5c]/75 to-[#1a3a5c]/30"></div>
                <div class="absolute inset-0 flex items-center px-5 sm:px-10">
                    <div class="flex items-center gap-3 sm:gap-4">
                        <div class="h-10 w-10 shrink-0 rounded-2xl bg-white/20 flex items-center justify-center sm:h-12 sm:w-12">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-[#c9922a] text-xs font-bold uppercase tracking-wider">{{ __('services.cons_label') }}</div>
                            <h2 class="text-xl sm:text-2xl font-extrabold text-white">{{ __('services.cons_title') }}</h2>
                            <p class="mt-1 hidden max-w-lg text-sm text-slate-300 sm:block">{{ __('services.cons_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                @forelse($consultorias as $c)
                <article class="rounded-2xl border bg-white {{ $c->destaque ? 'border-[#c9922a]/60 shadow-xl' : 'border-slate-200' }} overflow-hidden">
                    @if($c->destaque)
                    <div class="bg-[#c9922a] text-white text-xs font-bold text-center py-2 uppercase tracking-wider">{{ __('services.popular') }}</div>
                    @endif
                    <div class="p-7">
                        <div class="text-xs font-bold uppercase tracking-widest mb-2" style="color: {{ $c->cor }}">{{ $c->titulo }}</div>
                        <div class="text-3xl font-extrabold text-[#1a3a5c] mb-1">{{ $c->preco_usd }}</div>
                        <div class="text-slate-400 text-sm mb-2">{{ $c->preco_aoa }}</div>
                        <div class="text-slate-500 text-sm mb-6">{{ $c->tagline }}</div>
                        <ul class="space-y-2.5 mb-7">
                            @foreach($c->features ?? [] as $f)
                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                <svg class="w-4 h-4 mt-0.5 shrink-0" style="color: {{ $c->cor }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ $f }}
                            </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('contact') }}?servico={{ strtolower($c->titulo) }}"
                           class="block w-full text-center font-semibold py-3 rounded-xl text-sm transition-colors"
                           style="{{ $c->destaque ? 'background-color: #c9922a; color: white;' : 'background-color: ' . $c->cor . '15; color: ' . $c->cor . ';' }}"
                           onmouseover="this.style.filter='brightness(0.9)'" onmouseout="this.style.filter='none'">
                            {{ __('services.request_btn') }} {{ $c->titulo }}
                        </a>
                    </div>
                </article>
                @empty
                <div class="lg:col-span-2 text-center py-16 text-slate-400">
                    <p>{{ __('services.no_packages') }}</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- EQUIPAMENTOS --}}
    <section id="equipamentos" class="py-20 bg-white sm:py-24 scroll-mt-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative mb-12 h-52 overflow-hidden rounded-3xl sm:h-60">
                <img src="/img/6.jpeg" alt="Equipamentos" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-[#0d8a7d]/95 via-[#0d8a7d]/70 to-[#0d8a7d]/35"></div>
                <div class="absolute inset-0 flex items-center px-5 sm:px-10">
                    <div class="flex items-center gap-3 sm:gap-4">
                        <div class="h-10 w-10 shrink-0 rounded-2xl bg-white/20 flex items-center justify-center sm:h-12 sm:w-12">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-[#c9922a] text-xs font-bold uppercase tracking-wider">{{ __('services.equip_label') }}</div>
                            <h2 class="text-xl sm:text-2xl font-extrabold text-white">{{ __('services.equip_title') }}</h2>
                            <p class="mt-1 hidden max-w-lg text-sm text-slate-200 sm:block">{{ __('services.equip_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @forelse($equipamentos as $e)
                <article class="rounded-2xl border border-slate-200 bg-white p-6 transition-all hover:-translate-y-1 hover:border-[#0d8a7d]/35 hover:shadow-lg">
                    <div class="w-12 h-12 bg-[#0d8a7d]/10 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-[#0d8a7d]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $e->icon_svg ?? 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z' }}"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-[#1a3a5c] mb-2">{{ $e->titulo }}</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">{{ $e->descricao }}</p>
                </article>
                @empty
                <div class="col-span-4 text-center text-slate-400 py-12">
                    <p>{{ __('services.no_equip') }}</p>
                </div>
                @endforelse
            </div>

            <div class="mt-10 text-center">
                <a href="{{ route('contact') }}?servico=equipamentos"
                   class="inline-flex items-center gap-2 bg-[#0d8a7d] hover:bg-[#0a6e63] text-white font-semibold px-8 py-3.5 rounded-lg transition-colors text-sm">
                    {{ __('services.equip_cta') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="bg-[#1a3a5c] py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white mb-4">{{ __('services.cta_title') }}</h2>
            <p class="text-slate-300 mb-8">{{ __('services.cta_desc') }}</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-[#c9922a] hover:bg-[#a67a22] text-white font-semibold px-8 py-3.5 rounded-lg transition-colors text-sm">
                {{ __('services.cta_btn') }}
            </a>
        </div>
    </section>
</x-layouts.public>
