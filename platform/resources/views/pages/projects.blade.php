<x-layouts.public>
    <x-slot name="title">Projetos</x-slot>
    <x-slot name="description">Portfólio de projetos da AMIS — consultoria mineira, formação certificada e equipamentos em Angola e África Austral.</x-slot>

    {{-- HEADER --}}
    <div class="relative bg-[#1a3a5c] py-28 overflow-hidden">
        <div class="absolute inset-0">
            <img src="/img/15.jpeg" alt="" class="w-full h-full object-cover opacity-25">
            <div class="absolute inset-0 bg-gradient-to-r from-[#1a3a5c] via-[#1a3a5c]/80 to-[#1a3a5c]/40"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">Portfólio</span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white mt-2">Os Nossos Projetos</h1>
            <p class="text-slate-300 mt-4 max-w-2xl">Casos reais de sucesso em Angola e África Austral — consultoria, formação e equipamentos que transformam operações mineiras.</p>
            {{-- Stats bar --}}
            <div class="flex flex-wrap gap-8 mt-10">
                @foreach([$projetos->count() . ' Projetos', '4 Países', '200+ Profissionais Formados', '100% Taxa de Satisfação'] as $stat)
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

    {{-- PROJETOS COM FILTRO --}}
    <section class="py-24 bg-slate-50" x-data="{ filtro: 'todos' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Filter tabs --}}
            <div class="flex flex-wrap gap-3 justify-center mb-14">
                @foreach(['todos' => 'Todos', 'consultoria' => 'Consultoria', 'formacao' => 'Formação', 'equipamentos' => 'Equipamentos'] as $val => $label)
                <button @click="filtro = '{{ $val }}'"
                        :class="filtro === '{{ $val }}'
                            ? 'bg-[#1a3a5c] text-white shadow-md'
                            : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                        class="px-5 py-2 rounded-xl text-sm font-semibold transition-all">
                    {{ $label }}
                </button>
                @endforeach
            </div>

            {{-- Projects grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projetos as $p)
                @php
                    $tipoColors = ['consultoria' => '#1a3a5c', 'formacao' => '#c9922a', 'equipamentos' => '#0d8a7d'];
                    $tipoLabels = ['consultoria' => 'Consultoria', 'formacao' => 'Formação', 'equipamentos' => 'Equipamentos'];
                    $cor = $tipoColors[$p->tipo] ?? '#1a3a5c';
                @endphp
                <div x-show="filtro === 'todos' || filtro === '{{ $p->tipo }}'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="bg-white rounded-2xl overflow-hidden border border-slate-200 hover:shadow-xl transition-all group">

                    {{-- Photo --}}
                    <div class="relative h-48 overflow-hidden">
                        @if($p->foto)
                        <img src="/img/{{ $p->foto }}" alt="{{ $p->titulo }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @else
                        <div class="w-full h-full flex items-center justify-center" style="background-color: {{ $cor }}20;">
                            <svg class="w-16 h-16 opacity-30" style="color: {{ $cor }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>

                        {{-- Type badge --}}
                        <div class="absolute top-4 left-4">
                            <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full text-white"
                                  style="background-color: {{ $cor }};">
                                {{ $tipoLabels[$p->tipo] ?? $p->tipo }}
                            </span>
                        </div>

                        {{-- Location --}}
                        @if($p->local)
                        <div class="absolute bottom-4 left-4 flex items-center gap-1.5 text-white text-xs font-medium">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            {{ $p->local }}
                        </div>
                        @endif
                    </div>

                    {{-- Content --}}
                    <div class="p-6">
                        <h3 class="font-extrabold text-[#1a3a5c] text-lg leading-snug mb-3 group-hover:text-[#c9922a] transition-colors">{{ $p->titulo }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-5">{{ Str::limit($p->descricao, 140) }}</p>

                        {{-- Result metric --}}
                        @if($p->resultado)
                        <div class="flex items-start gap-2.5 bg-slate-50 rounded-xl p-3.5 border border-slate-100">
                            <div class="w-6 h-6 rounded-lg flex items-center justify-center shrink-0 mt-0.5" style="background-color: {{ $cor }}20;">
                                <svg class="w-3.5 h-3.5" style="color: {{ $cor }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            </div>
                            <p class="text-xs font-semibold text-slate-600 leading-snug">{{ $p->resultado }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-span-3 py-20 text-center text-slate-400">
                    <p>Nenhum projeto disponível.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- DEPOIMENTOS --}}
    @if($depoimentos->count())
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">Testemunhos</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1a3a5c] mt-2">O Que Dizem os Nossos Clientes</h2>
                <p class="text-slate-500 mt-4 max-w-xl mx-auto">Resultados reais, clientes reais. A satisfação é a nossa maior referência.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($depoimentos as $d)
                <div class="bg-slate-50 rounded-2xl p-8 border border-slate-100 hover:shadow-lg transition-shadow relative">
                    {{-- Quote mark --}}
                    <div class="absolute top-6 right-6 text-6xl font-serif text-[#1a3a5c]/10 leading-none select-none">"</div>

                    {{-- Stars --}}
                    <div class="flex gap-1 mb-5">
                        @for($i = 0; $i < ($d->rating ?? 5); $i++)
                        <svg class="w-4 h-4 text-[#c9922a]" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        @endfor
                    </div>

                    <p class="text-slate-600 leading-relaxed text-sm italic mb-8">"{{ $d->texto }}"</p>

                    <div class="flex items-center gap-3 pt-5 border-t border-slate-200">
                        <div class="w-10 h-10 rounded-full bg-[#1a3a5c] flex items-center justify-center text-white text-sm font-extrabold shrink-0">
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

    {{-- CTA --}}
    <section class="py-16 bg-[#1a3a5c]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white mb-4">O seu projeto pode ser o próximo</h2>
            <p class="text-slate-300 mb-8 max-w-xl mx-auto">Fale connosco e descubra como a AMIS pode transformar as operações da sua empresa mineira.</p>
            <a href="{{ route('contact') }}"
               class="inline-flex items-center gap-2 bg-[#c9922a] hover:bg-[#a67a22] text-white font-semibold px-8 py-3.5 rounded-lg transition-colors text-sm">
                Iniciar Projeto
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </section>

</x-layouts.public>
