<!DOCTYPE html>
<html lang="pt" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' — AMIS Admin' : 'Painel Admin — AMIS' }}</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 font-sans text-slate-800 antialiased" x-data="{ sidebarOpen: false }">

    {{-- Mobile overlay --}}
    <div x-show="sidebarOpen"
         x-transition:enter="transition-opacity ease-linear duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 bg-black/50 z-20 lg:hidden"></div>

    {{-- SIDEBAR --}}
    <aside class="fixed inset-y-0 left-0 z-30 w-64 bg-[#0f2640] flex flex-col transform transition-transform duration-200
                  lg:translate-x-0"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

        {{-- Logo --}}
        <div class="flex items-center gap-3 px-6 py-5 border-b border-white/10">
            <div class="w-9 h-9 bg-red-600 rounded-lg flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <div>
                <span class="text-white font-bold text-base leading-none">AMIS</span>
                <span class="block text-red-400 text-xs leading-none mt-0.5">Painel Admin</span>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-3 py-6 overflow-y-auto space-y-5">

            {{-- Geral --}}
            <div>
                <p class="text-slate-500 text-xs font-semibold uppercase tracking-widest px-3 mb-2">Geral</p>
                <ul class="space-y-0.5">
                    @php $naoLidasCount = \App\Models\Mensagem::naoLidas()->count(); @endphp
                    @foreach([
                        ['route' => 'admin.dashboard',       'label' => 'Dashboard',  'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'badge' => null],
                        ['route' => 'admin.clientes.index',  'label' => 'Clientes',   'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'badge' => null],
                        ['route' => 'admin.mensagens.index', 'label' => 'Mensagens',  'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'badge' => '$naoLidasCount'],
                    ] as $item)
                    <li>
                        <a href="{{ route($item['route']) }}"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-colors
                                  {{ request()->routeIs($item['route'] . '*') ? 'bg-white/15 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                            </svg>
                            <span class="flex-1">{{ $item['label'] }}</span>
                            @if($item['badge'] === '$naoLidasCount' && $naoLidasCount > 0)
                            <span class="bg-red-500 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center shrink-0">{{ $naoLidasCount }}</span>
                            @endif
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Conteúdo do Site --}}
            <div>
                <p class="text-slate-500 text-xs font-semibold uppercase tracking-widest px-3 mb-2">Conteúdo</p>
                <ul class="space-y-0.5">
                    @foreach([
                        ['route' => 'admin.cursos.index',        'label' => 'Cursos',        'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                        ['route' => 'admin.consultorias.index',  'label' => 'Consultorias',  'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                        ['route' => 'admin.equipa.index',        'label' => 'Equipa',        'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                        ['route' => 'admin.projectos.index',      'label' => 'Projectos',      'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'],
                        ['route' => 'admin.equipamentos.index',  'label' => 'Equipamentos',  'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
                        ['route' => 'admin.estatisticas.index',  'label' => 'Estatísticas',  'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                    ] as $item)
                    <li>
                        <a href="{{ route($item['route']) }}"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-colors
                                  {{ request()->routeIs($item['route'] . '*') ? 'bg-white/15 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                            </svg>
                            {{ $item['label'] }}
                        </a>
                    </li>
                    @endforeach
                    {{-- Testemunhos com badge de pendentes --}}
                    @php $testPendentes = \App\Models\Testemunho::where('ativo', false)->count(); @endphp
                    <li>
                        <a href="{{ route('admin.testemunhos.index') }}"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-colors
                                  {{ request()->routeIs('admin.testemunhos.*') ? 'bg-white/15 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            Testemunhos
                            @if($testPendentes > 0)
                            <span class="ml-auto bg-amber-400 text-[#0f2640] text-xs font-extrabold w-5 h-5 rounded-full flex items-center justify-center shrink-0">{{ $testPendentes }}</span>
                            @endif
                        </a>
                    </li>
                </ul>
            </div>

            <div class="mt-6">
                <p class="text-slate-500 text-xs font-semibold uppercase tracking-widest px-3 mb-3">Site</p>
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('home') }}" target="_blank"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:bg-white/10 hover:text-white transition-colors">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                            Ver Site Público
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- User + logout --}}
        <div class="px-4 py-4 border-t border-white/10">
            <div class="flex items-center gap-3 mb-3 px-2">
                <div class="w-9 h-9 bg-red-600/30 rounded-full flex items-center justify-center shrink-0">
                    <span class="text-red-400 font-bold text-sm">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</span>
                </div>
                <div class="overflow-hidden">
                    <div class="text-white text-sm font-semibold truncate">{{ Auth::user()->name ?? 'Admin' }}</div>
                    <div class="text-red-400 text-xs">Administrador</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm text-slate-400 hover:bg-white/10 hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Terminar sessão
                </button>
            </form>
        </div>
    </aside>

    {{-- MAIN --}}
    <div class="lg:pl-64 min-h-screen flex flex-col">

        {{-- Topbar --}}
        <header class="sticky top-0 z-10 bg-white border-b border-slate-200 h-16 flex items-center px-5 gap-4">
            <button @click="sidebarOpen = true" class="lg:hidden text-slate-500 hover:text-slate-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <div class="flex-1">
                <span class="text-base font-bold text-[#0f2640]">{{ $title ?? 'Dashboard' }}</span>
            </div>
            @if(request()->routeIs('admin.cursos*'))
            <a href="{{ route('admin.cursos.create') }}"
               class="hidden sm:flex items-center gap-2 bg-[#c9922a] hover:bg-[#a67a22] text-white text-xs font-bold px-3.5 py-2 rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Novo Curso
            </a>
            @elseif(request()->routeIs('admin.consultorias*'))
            <a href="{{ route('admin.consultorias.create') }}"
               class="hidden sm:flex items-center gap-2 bg-[#c9922a] hover:bg-[#a67a22] text-white text-xs font-bold px-3.5 py-2 rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Novo Pacote
            </a>
            @else
            <a href="{{ route('admin.clientes.create') }}"
               class="hidden sm:flex items-center gap-2 bg-[#c9922a] hover:bg-[#a67a22] text-white text-xs font-bold px-3.5 py-2 rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Novo Cliente
            </a>
            @endif
        </header>

        {{-- Flash --}}
        @if(session('success'))
        <div class="mx-5 mt-4 bg-green-50 border border-green-200 rounded-xl px-4 py-3 flex items-center gap-3 text-green-700 text-sm">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            {{ session('success') }}
        </div>
        @endif

        {{-- Content --}}
        <main class="flex-1 p-5 lg:p-8">
            {{ $slot }}
        </main>
    </div>

</body>
</html>
