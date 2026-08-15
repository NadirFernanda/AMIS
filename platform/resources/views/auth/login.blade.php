<!DOCTYPE html>
<html lang="pt" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Cliente — AMIS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 font-sans text-slate-800 antialiased">

    <div class="min-h-screen flex">

        {{-- LEFT PANEL --}}
        <div class="hidden lg:flex lg:w-1/2 xl:w-3/5 bg-[#1a3a5c] relative overflow-hidden flex-col justify-between p-12">
            {{-- Background pattern --}}
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <defs>
                        <pattern id="dots" width="5" height="5" patternUnits="userSpaceOnUse">
                            <circle cx="2.5" cy="2.5" r="0.8" fill="white"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#dots)"/>
                </svg>
            </div>
            <div class="absolute top-1/3 right-0 w-80 h-80 bg-[#c9922a] opacity-10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 left-1/4 w-64 h-64 bg-[#0d8a7d] opacity-10 rounded-full blur-3xl"></div>

            {{-- Logo --}}
            <div class="relative flex items-center gap-3">
                <div class="w-11 h-11 bg-[#c9922a] rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                    </svg>
                </div>
                <div>
                    <span class="text-white font-bold text-xl leading-none">AMIS</span>
                    <span class="block text-[#c9922a] text-xs">Angola Mining Innovation & Solutions</span>
                </div>
            </div>

            {{-- Center content --}}
            <div class="relative">
                <h1 class="text-4xl xl:text-5xl font-extrabold text-white leading-tight mb-6">
                    Bem-vindo à<br>
                    <span class="text-[#c9922a]">Área Cliente</span>
                </h1>
                <p class="text-slate-300 text-lg leading-relaxed mb-10 max-w-md">
                    Aceda aos seus projectos, materiais de formação e comunique directamente com a nossa equipa de especialistas.
                </p>
                <div class="space-y-4">
                    @foreach([
                        ['Acompanhe o progresso dos seus projectos em tempo real', 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['Encontre fornecedores de equipamento verificados', 'M3 21v-4a4 4 0 014-4h10a4 4 0 014 4v4M12 13a4 4 0 100-8 4 4 0 000 8z'],
                        ['Suporte técnico dedicado 24h via chat', 'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z'],
                    ] as [$text, $icon])
                    <div class="flex items-center gap-3 text-slate-300">
                        <div class="w-7 h-7 bg-[#c9922a]/20 rounded-lg flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-[#c9922a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                            </svg>
                        </div>
                        <span class="text-sm">{{ $text }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Footer --}}
            <div class="relative">
                <a href="{{ route('home') }}" class="text-slate-400 hover:text-white text-sm flex items-center gap-2 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Voltar ao site público
                </a>
            </div>
        </div>

        {{-- RIGHT PANEL — Login form --}}
        <div class="flex-1 flex flex-col items-center justify-center px-6 sm:px-10 py-12">

            {{-- Mobile logo --}}
            <div class="lg:hidden flex items-center gap-3 mb-8">
                <div class="w-10 h-10 bg-[#1a3a5c] rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-[#c9922a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                    </svg>
                </div>
                <span class="font-bold text-[#1a3a5c] text-xl">AMIS</span>
            </div>

            <div class="w-full max-w-sm">
                <div class="mb-8">
                    <h2 class="text-2xl font-extrabold text-[#1a3a5c]">Entrar na sua conta</h2>
                    <p class="text-slate-500 text-sm mt-1">Introduza as suas credenciais para continuar.</p>
                </div>

                {{-- Errors --}}
                @if($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6 flex items-start gap-3">
                    <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-red-600 text-sm">{{ $errors->first() }}</p>
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">
                            Endereço de email
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <input type="email" id="email" name="email" required autocomplete="email"
                                value="{{ old('email') }}"
                                class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl text-sm text-slate-800
                                       focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c]
                                       transition-all @error('email') border-red-300 bg-red-50 @enderror"
                                placeholder="email@empresa.ao">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="password" class="block text-sm font-semibold text-slate-700">
                                Palavra-passe
                            </label>
                        </div>
                        <div class="relative" x-data="{ show: false }">
                            <span class="absolute inset-y-0 left-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                            <input :type="show ? 'text' : 'password'" id="password" name="password" required autocomplete="current-password"
                                class="w-full pl-10 pr-11 py-3 border border-slate-200 rounded-xl text-sm text-slate-800
                                       focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c]
                                       transition-all"
                                placeholder="••••••••">
                            <button type="button" @click="show = !show"
                                class="absolute inset-y-0 right-3.5 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
                                <svg x-show="!show" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg x-show="show" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="remember" name="remember"
                            class="w-4 h-4 rounded border-slate-300 text-[#1a3a5c] focus:ring-[#1a3a5c]/30 cursor-pointer">
                        <label for="remember" class="text-sm text-slate-600 cursor-pointer select-none">
                            Manter sessão iniciada
                        </label>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#1a3a5c] hover:bg-[#0f2640] active:scale-[0.98] text-white font-bold py-3.5 rounded-xl
                               transition-all text-sm flex items-center justify-center gap-2 shadow-lg shadow-[#1a3a5c]/20">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        Entrar
                    </button>
                </form>

                <div class="mt-8 pt-6 border-t border-slate-200 text-center">
                    <p class="text-slate-500 text-sm">
                        Ainda não é cliente?
                        <a href="{{ route('contact') }}?assunto=cliente" class="text-[#c9922a] font-semibold hover:underline">
                            Fale connosco
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
