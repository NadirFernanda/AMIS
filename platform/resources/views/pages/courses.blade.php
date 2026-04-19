<x-layouts.public>
    <x-slot name="title">Formação</x-slot>
    <x-slot name="description">Cursos certificados em engenharia de minas, geociências e tecnologia para profissionais angolanos.</x-slot>

    {{-- PAGE HEADER --}}
    <div class="bg-[#1a3a5c] py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">Catálogo</span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white mt-2">Formação Profissional</h1>
            <p class="text-slate-300 mt-4 max-w-2xl">Cursos online e presenciais, ministrados por especialistas com experiência internacional, com certificado verificável.</p>
            {{-- Stats bar --}}
            <div class="flex flex-wrap gap-8 mt-10">
                @foreach(['6 Cursos', '200+ Graduados', 'Certificado Digital', 'Online & Presencial'] as $stat)
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
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                @foreach([
                    [
                        'Gestão e Planejamento de Operações Minerais',
                        'Princípios de gestão aplicados a operações de mineração: planeamento de produção, controlo de custos, gestão de pessoas e indicadores KPI.',
                        '3 meses', '$3,000', 'AKZ 2,400,000', 'Avançado',
                        ['Planeamento de lavra', 'Controlo de produção', 'Gestão de pessoas', 'Indicadores KPI', 'Segurança operacional'],
                        '#1a3a5c', 'Online / Presencial',
                    ],
                    [
                        'Engenharia de Beneficiamento Mineral',
                        'Técnicas de separação física e química de minerais. Projeto e operação de circuitos de flotação, moagem e classificação.',
                        '3 meses', '$2,500', 'AKZ 2,000,000', 'Avançado',
                        ['Britagem e moagem', 'Flotação mineral', 'Separação magnética', 'Filtragem e secagem', 'Controlo de qualidade'],
                        '#c9922a', 'Presencial (Luanda)',
                    ],
                    [
                        'Geoprocessamento e Modelagem 3D',
                        'Uso de softwares modernos (Leapfrog, Vulcan, MapInfo) para modelagem geológica, estimativa de recursos e planeamento mineiro.',
                        '2 meses', '$1,800', 'AKZ 1,440,000', 'Intermédio',
                        ['Leapfrog Geo', 'Modelagem geológica 3D', 'Estimativa de recursos', 'Mapas e SIG', 'Relatórios JORC'],
                        '#0d8a7d', 'Online',
                    ],
                    [
                        'Automação e Controle de Processos Minerais',
                        'Introdução à automação industrial aplicada à mineração: PLCs, SCADA, sensores e controlo de circuitos de processamento.',
                        '2 meses', '$2,000', 'AKZ 1,600,000', 'Intermédio',
                        ['PLCs e SCADA', 'Instrumentação industrial', 'Controlo de circuitos', 'Manutenção preditiva', 'IoT na mineração'],
                        '#1a3a5c', 'Online / Presencial',
                    ],
                    [
                        'Segurança e Meio Ambiente em Mineração',
                        'Legislação angolana e normas internacionais de SST e meio ambiente. Gestão de riscos, planos de emergência e impacto ambiental.',
                        '1 mês', '$1,000', 'AKZ 800,000', 'Básico',
                        ['Legislação angolana SST', 'Avaliação de riscos', 'Planos de emergência', 'Gestão ambiental', 'Licenciamento'],
                        '#c9922a', 'Online',
                    ],
                    [
                        'Prospecção e Avaliação de Depósitos Minerais',
                        'Métodos de prospeção geofísica, geoquímica e por sondagem. Avaliação econômica de depósitos e modelos de recursos.',
                        '2 meses', '$1,500', 'AKZ 1,200,000', 'Intermédio',
                        ['Geofísica aplicada', 'Geoquímica de prospeção', 'Sondagem e amostragem', 'Modelos de recursos', 'Análise económica'],
                        '#0d8a7d', 'Online / Presencial',
                    ],
                ] as [$title, $desc, $duration, $price, $priceAoa, $level, $topics, $color, $mode])
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-xl transition-shadow">
                    <div class="h-3" style="background-color: {{ $color }};"></div>
                    <div class="p-8">
                        <div class="flex flex-wrap items-center gap-2 mb-4">
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full" style="background-color: {{ $color }}15; color: {{ $color }}">{{ $level }}</span>
                            <span class="flex items-center gap-1 text-xs text-slate-400">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $duration }}
                            </span>
                            <span class="flex items-center gap-1 text-xs text-slate-400">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.069A1 1 0 0121 8.868v6.264a1 1 0 01-1.447.894L15 14M3 8h12a2 2 0 012 2v4a2 2 0 01-2 2H3a2 2 0 01-2-2v-4a2 2 0 012-2z"/>
                                </svg>
                                {{ $mode }}
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-[#1a3a5c] mb-3 leading-snug">{{ $title }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-6">{{ $desc }}</p>
                        <div class="grid grid-cols-2 gap-1.5 mb-6">
                            @foreach($topics as $t)
                            <div class="flex items-center gap-1.5 text-xs text-slate-600">
                                <svg class="w-3.5 h-3.5 shrink-0" style="color: {{ $color }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ $t }}
                            </div>
                            @endforeach
                        </div>
                        <div class="flex items-center justify-between border-t border-slate-100 pt-5">
                            <div>
                                <div class="font-bold text-[#1a3a5c] text-xl">{{ $price }}</div>
                                <div class="text-slate-400 text-xs">{{ $priceAoa }}</div>
                            </div>
                            <a href="{{ route('contact') }}?curso={{ urlencode($title) }}"
                               class="text-white font-semibold text-sm px-5 py-2.5 rounded-xl transition-colors"
                               style="background-color: {{ $color }}"
                               onmouseover="this.style.filter='brightness(0.85)'" onmouseout="this.style.filter='none'">
                                Inscrever-me
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CERTIFICAÇÃO --}}
    <section class="py-20 bg-[#1a3a5c]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold text-white mb-4">Certificado Reconhecido</h2>
            <p class="text-slate-300 max-w-xl mx-auto mb-12">Todos os nossos cursos emitem certificado digital verificável com código único, aceite por entidades angolanas e internacionais.</p>
            <div class="inline-flex items-center gap-4 bg-white/10 rounded-2xl px-8 py-5 border border-white/20">
                <svg class="w-12 h-12 text-[#c9922a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
                <div class="text-left">
                    <div class="text-white font-bold">Certificado AMIS</div>
                    <div class="text-slate-400 text-sm">Verificável por QR Code · Angola & Internacional</div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>
