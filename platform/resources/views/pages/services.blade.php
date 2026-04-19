<x-layouts.public>
    <x-slot name="title">Serviços</x-slot>
    <x-slot name="description">Consultoria técnica, formação e equipamentos para o setor mineiro angolano.</x-slot>

    {{-- PAGE HEADER --}}
    <div class="bg-[#1a3a5c] py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">Portfólio</span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white mt-2">Os Nossos Serviços</h1>
            <p class="text-slate-300 mt-4 max-w-2xl">Soluções completas para empresas mineiras, geológicas e de engenharia que operam em Angola e África Austral.</p>
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
                <span class="text-[#c9922a] font-semibold uppercase tracking-wider text-sm">Consultoria Técnica</span>
            </div>
            <h2 class="text-3xl font-extrabold text-[#1a3a5c] mb-4">Escolha o Pacote Certo para a Sua Empresa</h2>
            <p class="text-slate-500 max-w-2xl mb-16">Todos os pacotes incluem diagnóstico inicial e relatório técnico. Adaptamos cada solução às especificidades do projeto.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach([
                    ['Básico', '$15,000', 'AKZ 12,000,000', 'Ideal para empresas em fase inicial', [
                        'Diagnóstico técnico inicial',
                        'Relatório de conformidade',
                        'Análise de risco simplificada',
                        '1 visita técnica ao terreno',
                        'Suporte por email 30 dias',
                    ], false, '#1a3a5c'],
                    ['Intermédio', '$35,000', 'AKZ 28,000,000', 'Para operações em expansão', [
                        'Tudo do Básico',
                        'Planeamento mineiro detalhado',
                        'Modelagem geológica 3D',
                        '3 visitas técnicas ao terreno',
                        'Suporte dedicado 90 dias',
                        'Workshop de transferência de conhecimento',
                    ], true, '#c9922a'],
                    ['Avançado', '$75,000', 'AKZ 60,000,000', 'Solução completa end-to-end', [
                        'Tudo do Intermédio',
                        'Otimização de processos completa',
                        'Instalação e comissionamento',
                        'Visitas mensais por 12 meses',
                        'Suporte técnico dedicado anual',
                        'Formação da equipa interna',
                        'Relatório de impacto anual',
                    ], false, '#0d8a7d'],
                ] as [$tier, $price, $priceAoa, $tagline, $features, $popular, $color])
                <div class="rounded-2xl border-2 {{ $popular ? 'border-[#c9922a] shadow-2xl relative' : 'border-slate-200' }} overflow-hidden">
                    @if($popular)
                    <div class="bg-[#c9922a] text-white text-xs font-bold text-center py-2 uppercase tracking-wider">Mais Escolhido</div>
                    @endif
                    <div class="p-8">
                        <div class="text-xs font-bold uppercase tracking-widest mb-2" style="color: {{ $color }}">{{ $tier }}</div>
                        <div class="text-4xl font-extrabold text-[#1a3a5c] mb-1">{{ $price }}</div>
                        <div class="text-slate-400 text-sm mb-2">{{ $priceAoa }}</div>
                        <div class="text-slate-500 text-sm mb-8">{{ $tagline }}</div>
                        <ul class="space-y-3 mb-8">
                            @foreach($features as $f)
                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                <svg class="w-4 h-4 mt-0.5 shrink-0" style="color: {{ $color }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ $f }}
                            </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('contact') }}?servico={{ strtolower($tier) }}"
                           class="block w-full text-center font-semibold py-3 rounded-xl text-sm transition-colors"
                           style="{{ $popular ? 'background-color: #c9922a; color: white;' : 'background-color: ' . $color . '15; color: ' . $color . ';' }}"
                           onmouseover="this.style.filter='brightness(0.9)'" onmouseout="this.style.filter='none'">
                            Solicitar {{ $tier }}
                        </a>
                    </div>
                </div>
                @endforeach
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
                <span class="text-[#0d8a7d] font-semibold uppercase tracking-wider text-sm">Equipamentos & Tecnologia</span>
            </div>
            <h2 class="text-3xl font-extrabold text-[#1a3a5c] mb-4">Acesso ao Melhor Equipamento do Mercado</h2>
            <p class="text-slate-500 max-w-2xl mb-16">Conectamos empresas angolanas com os principais fabricantes internacionais de equipamentos mineiros e geotécnicos.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach([
                    ['Sondagem e Perfuração', 'Equipamentos de core drilling e percussão para prospeção geológica.', 'M12 3v1m0 16v1M3 12h1m16 0h1'],
                    ['Processamento Mineral', 'Moínhos, classificadores, células de flotação e circuitos completos.', 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0'],
                    ['Monitorização Geotécnica', 'Sensores, dataloggers e sistemas de alerta precoce para taludes.', 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                    ['Laboratório Analítico', 'Espectrômetros, analisadores XRF e equipamentos de caracterização.', 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z'],
                ] as [$cat, $desc, $icon])
                <div class="bg-white rounded-2xl p-6 border border-slate-200 hover:shadow-lg hover:border-[#0d8a7d]/30 transition-all">
                    <div class="w-12 h-12 bg-[#0d8a7d]/10 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-[#0d8a7d]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-[#1a3a5c] mb-2">{{ $cat }}</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">{{ $desc }}</p>
                </div>
                @endforeach
            </div>

            <div class="mt-10 text-center">
                <a href="{{ route('contact') }}?servico=equipamentos"
                   class="inline-flex items-center gap-2 bg-[#0d8a7d] hover:bg-[#0a6e63] text-white font-semibold px-8 py-3.5 rounded-lg transition-colors text-sm">
                    Solicitar Catálogo Completo
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
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white mb-4">Não encontrou o que procura?</h2>
            <p class="text-slate-300 mb-8">Contacte-nos para uma solução personalizada.</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-[#c9922a] hover:bg-[#a67a22] text-white font-semibold px-8 py-3.5 rounded-lg transition-colors text-sm">
                Falar com um Especialista
            </a>
        </div>
    </section>
</x-layouts.public>
