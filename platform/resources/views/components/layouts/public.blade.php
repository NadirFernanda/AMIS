<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $description ?? 'Consultoria e Inovação Tecnológica em Mineração e Geociências em Angola.' }}">
    <title>{{ isset($title) ? $title . ' — AMIS' : 'AMIS — Angola Mining Innovation & Solutions' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans text-slate-800 antialiased" x-data="{ mobileOpen: false }">

    {{-- NAVBAR --}}
    <nav class="fixed top-0 inset-x-0 z-50 bg-[#1a3a5c] shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-[#c9922a] rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-white font-bold text-lg leading-none">AMIS</span>
                        <span class="block text-[#c9922a] text-xs leading-none">Angola Mining</span>
                    </div>
                </a>

                {{-- Desktop links --}}
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-slate-300 hover:text-white text-sm font-medium transition-colors {{ request()->routeIs('home') ? 'text-white' : '' }}">{{ __('nav.home') }}</a>
                    <a href="{{ route('services') }}" class="text-slate-300 hover:text-white text-sm font-medium transition-colors {{ request()->routeIs('services') ? 'text-white' : '' }}">{{ __('nav.services') }}</a>
                    <a href="{{ route('courses') }}" class="text-slate-300 hover:text-white text-sm font-medium transition-colors {{ request()->routeIs('courses') ? 'text-white' : '' }}">{{ __('nav.training') }}</a>
                    <a href="{{ route('about') }}" class="text-slate-300 hover:text-white text-sm font-medium transition-colors {{ request()->routeIs('about') ? 'text-white' : '' }}">{{ __('nav.about') }}</a>
                    <a href="{{ route('contact') }}" class="text-slate-300 hover:text-white text-sm font-medium transition-colors {{ request()->routeIs('contact') ? 'text-white' : '' }}">{{ __('nav.contact') }}</a>
                </div>

                {{-- CTA + Language switcher + Mobile --}}
                <div class="flex items-center gap-3">
                    {{-- Language switcher --}}
                    <div class="hidden md:flex items-center gap-1 bg-white/10 rounded-lg p-1" x-data>
                        @foreach(['pt' => 'PT', 'en' => 'EN', 'fr' => 'FR'] as $code => $label)
                        <a href="{{ route('locale.switch', $code) }}"
                           class="text-xs font-bold px-2.5 py-1 rounded-md transition-colors
                                  {{ app()->getLocale() === $code ? 'bg-[#c9922a] text-white' : 'text-slate-300 hover:text-white hover:bg-white/10' }}">
                            {{ $label }}
                        </a>
                        @endforeach
                    </div>
                    <a href="{{ Auth::check() ? route('cliente.dashboard') : route('login') }}" class="hidden md:inline-flex items-center gap-2 bg-[#c9922a] hover:bg-[#a67a22] text-white text-sm font-semibold px-4 py-2 rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        {{ __('nav.client_area') }}
                    </a>
                    <button @click="mobileOpen = !mobileOpen" class="md:hidden text-white p-2 rounded-lg hover:bg-white/10 transition-colors">
                        <svg x-show="!mobileOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg x-show="mobileOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile menu --}}
        <div x-show="mobileOpen" x-transition class="md:hidden border-t border-white/10 bg-[#0f2640]">
            <div class="px-4 py-4 flex flex-col gap-3">
                <a href="{{ route('home') }}" class="text-slate-300 hover:text-white py-2 text-sm font-medium">{{ __('nav.home') }}</a>
                <a href="{{ route('services') }}" class="text-slate-300 hover:text-white py-2 text-sm font-medium">{{ __('nav.services') }}</a>
                <a href="{{ route('courses') }}" class="text-slate-300 hover:text-white py-2 text-sm font-medium">{{ __('nav.training') }}</a>
                <a href="{{ route('about') }}" class="text-slate-300 hover:text-white py-2 text-sm font-medium">{{ __('nav.about') }}</a>
                <a href="{{ route('contact') }}" class="text-slate-300 hover:text-white py-2 text-sm font-medium">{{ __('nav.contact') }}</a>
                <a href="{{ Auth::check() ? route('cliente.dashboard') : route('login') }}" class="bg-[#c9922a] text-white text-sm font-semibold px-4 py-2.5 rounded-lg text-center mt-2">{{ __('nav.client_area') }}</a>
                {{-- Mobile language switcher --}}
                <div class="flex gap-2 pt-2 border-t border-white/10">
                    @foreach(['pt' => 'PT', 'en' => 'EN', 'fr' => 'FR'] as $code => $label)
                    <a href="{{ route('locale.switch', $code) }}"
                       class="text-xs font-bold px-3 py-1.5 rounded-lg transition-colors
                              {{ app()->getLocale() === $code ? 'bg-[#c9922a] text-white' : 'bg-white/10 text-slate-300 hover:bg-white/20' }}">
                        {{ $label }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>

    {{-- MAIN CONTENT --}}
    <main class="pt-16">
        {{ $slot }}
    </main>

    {{-- FOOTER --}}
    <footer class="bg-[#0f2640] text-white mt-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

                {{-- Brand --}}
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-[#c9922a] rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-white font-bold text-xl leading-none">AMIS</span>
                            <span class="block text-[#c9922a] text-xs">Angola Mining Innovation & Solutions</span>
                        </div>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-sm">
                        {{ __('nav.footer_desc') }}
                    </p>
                    <div class="flex gap-3 mt-6">
                        <a href="#" class="w-9 h-9 bg-white/10 hover:bg-[#c9922a] rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 bg-white/10 hover:bg-[#25D366] rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Links --}}
                <div>
                    <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-4">{{ __('nav.footer_services') }}</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('services') }}#consultoria" class="text-slate-400 hover:text-[#c9922a] text-sm transition-colors">{{ __('nav.tech_consulting') }}</a></li>
                        <li><a href="{{ route('courses') }}" class="text-slate-400 hover:text-[#c9922a] text-sm transition-colors">{{ __('nav.professional_training') }}</a></li>
                        <li><a href="{{ route('services') }}#equipamentos" class="text-slate-400 hover:text-[#c9922a] text-sm transition-colors">{{ __('nav.equipment') }}</a></li>
                        <li><a href="{{ route('about') }}" class="text-slate-400 hover:text-[#c9922a] text-sm transition-colors">{{ __('nav.about_amis') }}</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div>
                    <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-4">{{ __('nav.footer_contact') }}</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-2 text-slate-400 text-sm">
                            <svg class="w-4 h-4 mt-0.5 shrink-0 text-[#c9922a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Luanda, Angola
                        </li>
                        <li class="flex items-center gap-2 text-slate-400 text-sm">
                            <svg class="w-4 h-4 shrink-0 text-[#c9922a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            info@amis.ao
                        </li>
                    </ul>
                    <div class="mt-4 bg-white/5 rounded-xl p-4 text-xs text-slate-400 space-y-1.5">
                        <p class="text-slate-300 font-semibold text-xs uppercase tracking-wide mb-2">{{ __('nav.office_hours') }}</p>
                        <div class="flex justify-between"><span>{{ __('nav.mon_fri') }}</span><span class="text-white">08:00–17:00</span></div>
                        <div class="flex justify-between"><span>{{ __('nav.saturday') }}</span><span class="text-white">09:00–13:00</span></div>
                        <div class="flex justify-between"><span>{{ __('nav.sunday') }}</span><span class="text-slate-500">{{ __('nav.closed') }}</span></div>
                        <p class="text-[#c9922a] pt-1 font-medium">{{ __('nav.urgencies') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-white/10 py-6">
            <p class="text-center text-slate-500 text-sm">© {{ date('Y') }} Angola Mining Innovation & Solutions. {{ __('nav.all_rights') }}</p>
        </div>
    </footer>

</body>
</html>
