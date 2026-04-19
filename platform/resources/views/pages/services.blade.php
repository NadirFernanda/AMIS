<x-layouts.public>
    <x-slot name="title">{{ __('services.page_title') }}</x-slot>
    <x-slot name="description">{{ __('services.page_desc') }}</x-slot>

    {{-- PAGE HEADER --}}
    <div class="bg-[#1a3a5c] py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">{{ __('services.header_label') }}</span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white mt-2">{{ __('services.header_title') }}</h1>
            <p class="text-slate-300 mt-4 max-w-2xl">{{ __('services.header_desc') }}</p>
        </div>
    </div>

    {{-- CONSULTORIA --}}
    <section id="consultoria" class="py-24 bg-white scroll-mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-[#1a3a5c] rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <span class="text-[#c9922a] font-semibold uppercase tracking-wider text-sm">{{ __('services.cons_label') }}</span>
            </div>
            <h2 class="text-3xl font-extrabold text-[#1a3a5c] mb-4">{{ __('services.cons_title') }}</h2>
            <p class="text-slate-500 max-w-2xl mb-16">{{ __('services.cons_desc') }}</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($consultorias as $c)
                <div class="rounded-2xl border-2 {{ $c->destaque ? 'border-[#c9922a] shadow-2xl relative' : 'border-slate-200' }} overflow-hidden">
                    @if($c->destaque)
                    <div class="bg-[#c9922a] text-white text-xs font-bold text-center py-2 uppercase tracking-wider">Mais Escolhido</div>
                    @endif
                    <div class="p-8">
                        <div class="text-xs font-bold uppercase tracking-widest mb-2" style="color: {{ $c->cor }}">{{ $c->titulo }}</div>
                        <div class="text-4xl font-extrabold text-[#1a3a5c] mb-1">{{ $c->preco_usd }}</div>
                        <div class="text-slate-400 text-sm mb-2">{{ $c->preco_aoa }}</div>
                        <div class="text-slate-500 text-sm mb-8">{{ $c->tagline }}</div>
                        <ul class="space-y-3 mb-8">
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
                            Solicitar {{ $c->titulo }}
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-16 text-slate-400">
                    <p>{{ __('services.no_packages') }}</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- EQUIPAMENTOS --}}
    <section id="equipamentos" class="py-24 bg-slate-50 scroll-mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-[#0d8a7d] rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <span class="text-[#0d8a7d] font-semibold uppercase tracking-wider text-sm">{{ __('services.equip_label') }}</span>
            </div>
            <h2 class="text-3xl font-extrabold text-[#1a3a5c] mb-4">{{ __('services.equip_title') }}</h2>
            <p class="text-slate-500 max-w-2xl mb-16">{{ __('services.equip_desc') }}</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($equipamentos as $e)
                <div class="bg-white rounded-2xl p-6 border border-slate-200 hover:shadow-lg hover:border-[#0d8a7d]/30 transition-all">
                    <div class="w-12 h-12 bg-[#0d8a7d]/10 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-[#0d8a7d]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $e->icon_svg ?? 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z' }}"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-[#1a3a5c] mb-2">{{ $e->titulo }}</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">{{ $e->descricao }}</p>
                </div>
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
    <section class="py-16 bg-[#1a3a5c]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white mb-4">{{ __('services.cta_title') }}</h2>
            <p class="text-slate-300 mb-8">{{ __('services.cta_desc') }}</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-[#c9922a] hover:bg-[#a67a22] text-white font-semibold px-8 py-3.5 rounded-lg transition-colors text-sm">
                {{ __('services.cta_btn') }}
            </a>
        </div>
    </section>
</x-layouts.public>
