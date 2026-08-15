<x-layouts.public>
    <x-slot name="title">{{ __('suppliers.page_title') }}</x-slot>
    <x-slot name="description">{{ __('suppliers.page_desc') }}</x-slot>

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-[#102b47] py-14 sm:py-16">
        <div class="absolute inset-0">
            <img src="/img/6.jpeg" alt="" class="h-full w-full object-cover opacity-20">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(13,138,125,0.35),transparent_44%),linear-gradient(112deg,rgba(16,43,71,0.95),rgba(16,43,71,0.72),rgba(16,43,71,0.96))]"></div>
        </div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <span class="inline-flex rounded-full border border-[#0d8a7d]/40 bg-[#0d8a7d]/10 px-4 py-1 text-xs font-bold uppercase tracking-[0.18em] text-[#6fd8c9]">{{ __('suppliers.header_label') }}</span>
            <h1 class="mt-6 max-w-3xl text-4xl font-extrabold leading-tight text-white sm:text-5xl">{{ __('suppliers.header_title') }}</h1>
            <p class="mt-5 max-w-2xl text-base leading-relaxed text-slate-200 sm:text-lg">{{ __('suppliers.header_desc') }}</p>
        </div>
    </section>

    {{-- FILTROS + LISTA --}}
    <section class="bg-white py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Category filter chips --}}
            @if($categorias->count())
            <div class="mb-10 flex flex-wrap gap-2">
                <a href="{{ route('fornecedores') }}"
                   class="rounded-full px-4 py-2 text-sm font-semibold transition-colors {{ !$categoriaId ? 'bg-[#102b47] text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    {{ __('suppliers.filter_all') }}
                </a>
                @foreach($categorias as $cat)
                <a href="{{ route('fornecedores', ['categoria' => $cat->id]) }}"
                   class="rounded-full px-4 py-2 text-sm font-semibold transition-colors {{ $categoriaId === $cat->id ? 'bg-[#102b47] text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    {{ $cat->titulo }}
                </a>
                @endforeach
            </div>
            @endif

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                @forelse($fornecedores as $f)
                <div x-data="{ open: false, sent: false }" class="group relative flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white transition-all duration-300 hover:-translate-y-1 hover:border-[#0d8a7d]/35 hover:shadow-xl">
                    <div class="flex items-center gap-4 p-6 pb-4">
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl text-lg font-extrabold text-white"
                             style="background: linear-gradient(135deg, {{ $f->cor }}, {{ $f->cor }}cc);">
                            {{ strtoupper(substr($f->nome_empresa, 0, 1)) }}
                        </div>
                        <div class="min-w-0">
                            <h3 class="truncate text-lg font-bold text-[#1a3a5c]">{{ $f->nome_empresa }}</h3>
                            <p class="flex items-center gap-1 text-xs text-slate-400">
                                <svg class="h-3.5 w-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                {{ $f->cidade ? $f->cidade . ', ' : '' }}{{ $f->pais }}
                            </p>
                        </div>
                    </div>
                    <div class="flex-1 px-6">
                        <p class="text-sm leading-relaxed text-slate-600">{{ Str::limit($f->descricao, 130) }}</p>
                        @if($f->equipamentos->count())
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            @foreach($f->equipamentos as $cat)
                            <span class="rounded-full bg-[#0d8a7d]/10 px-2.5 py-0.5 text-[11px] font-semibold text-[#0d8a7d]">{{ $cat->titulo }}</span>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <div class="mt-6 border-t border-slate-100 p-6 pt-4">
                        <div x-show="!open" class="flex items-center gap-3">
                            <button type="button" @click="open = true"
                                class="inline-flex flex-1 items-center justify-center gap-2 rounded-lg bg-[#0d8a7d] px-4 py-2.5 text-xs font-semibold text-white transition-colors hover:bg-[#09685d]">
                                {{ __('suppliers.request_btn') }}
                            </button>
                            @if($f->website)
                            <a href="{{ $f->website }}" target="_blank" rel="noopener"
                               class="inline-flex items-center justify-center rounded-lg border border-slate-200 px-3 py-2.5 text-slate-500 transition-colors hover:border-[#0d8a7d]/40 hover:text-[#0d8a7d]">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                            @endif
                        </div>

                        <template x-if="sent">
                            <p class="text-sm font-semibold text-[#0d8a7d]">{{ __('suppliers.form_sent') }}</p>
                        </template>

                        <form x-show="open && !sent" method="POST" action="{{ route('fornecedores.pedido', $f) }}" class="space-y-2.5" @submit="sent = true">
                            @csrf
                            <input type="text" name="name" required placeholder="{{ __('suppliers.form_name') }}"
                                   class="w-full rounded-lg border border-slate-200 px-3 py-2 text-xs focus:border-[#0d8a7d] focus:outline-none focus:ring-2 focus:ring-[#0d8a7d]/20">
                            <input type="email" name="email" required placeholder="{{ __('suppliers.form_email') }}"
                                   class="w-full rounded-lg border border-slate-200 px-3 py-2 text-xs focus:border-[#0d8a7d] focus:outline-none focus:ring-2 focus:ring-[#0d8a7d]/20">
                            <input type="text" name="company" placeholder="{{ __('suppliers.form_company') }}"
                                   class="w-full rounded-lg border border-slate-200 px-3 py-2 text-xs focus:border-[#0d8a7d] focus:outline-none focus:ring-2 focus:ring-[#0d8a7d]/20">
                            <textarea name="message" required minlength="10" rows="2" placeholder="{{ __('suppliers.form_message') }}"
                                      class="w-full resize-none rounded-lg border border-slate-200 px-3 py-2 text-xs focus:border-[#0d8a7d] focus:outline-none focus:ring-2 focus:ring-[#0d8a7d]/20"></textarea>
                            <div class="flex items-center gap-2">
                                <button type="submit" class="flex-1 rounded-lg bg-[#0d8a7d] px-3 py-2 text-xs font-semibold text-white transition-colors hover:bg-[#09685d]">
                                    {{ __('suppliers.form_submit') }}
                                </button>
                                <button type="button" @click="open = false" class="px-3 py-2 text-xs font-medium text-slate-400 hover:text-slate-600">
                                    {{ __('suppliers.form_cancel') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @empty
                <div class="md:col-span-2 xl:col-span-3 rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-6 py-12 text-center text-slate-500">
                    {{ __('suppliers.no_suppliers') }}
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-[#0d8a7d]">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="text-2xl font-extrabold text-white sm:text-3xl">{{ __('suppliers.cta_title') }}</h2>
            <p class="mt-3 text-white/80">{{ __('suppliers.cta_desc') }}</p>
            <a href="{{ route('contact') }}"
               class="mt-8 inline-flex items-center justify-center gap-2 rounded-lg bg-white px-8 py-3.5 text-sm font-bold text-[#0d8a7d] shadow-lg transition-colors hover:bg-slate-100">
                {{ __('suppliers.cta_btn') }}
            </a>
        </div>
    </section>
</x-layouts.public>
