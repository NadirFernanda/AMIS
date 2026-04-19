<x-layouts.public>
    <x-slot name="title">Contacto</x-slot>
    <x-slot name="description">Entre em contacto com a AMIS para consultoria, formação ou qualquer questão sobre os nossos serviços.</x-slot>

    {{-- HEADER --}}
    <div class="bg-[#1a3a5c] py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-[#c9922a] text-sm font-semibold uppercase tracking-wider">Fale Connosco</span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white mt-2">Contacto</h1>
            <p class="text-slate-300 mt-4 max-w-2xl">Estamos prontos para ajudar. Preencha o formulário ou contacte-nos diretamente.</p>
        </div>
    </div>

    {{-- CONTACT SECTION --}}
    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-5 gap-12">

            {{-- Contact info --}}
            <div class="lg:col-span-2 space-y-6">
                <div>
                    <h2 class="text-2xl font-extrabold text-[#1a3a5c] mb-2">Informações de Contacto</h2>
                    <p class="text-slate-500 text-sm">Respondemos em menos de 24 horas nos dias úteis.</p>
                </div>

                @foreach([
                    ['Localização', 'Luanda, Angola', 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z', '#1a3a5c', null],
                    ['Email', 'info@amis.ao', 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', '#c9922a', 'mailto:info@amis.ao'],
                    ['WhatsApp', '+244 9XX XXX XXX', 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z', '#0d8a7d', '#'],
                    ['LinkedIn', 'Angola Mining Innovation & Solutions', 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', '#1a3a5c', '#'],
                ] as [$label, $value, $icon, $color, $href])
                <div class="bg-white rounded-2xl p-5 border border-slate-200 flex items-start gap-4 hover:shadow-md transition-shadow">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style="background-color: {{ $color }}15;">
                        <svg class="w-5 h-5" style="color: {{ $color }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs text-slate-400 font-medium uppercase tracking-wide">{{ $label }}</div>
                        @if($href)
                            <a href="{{ $href }}" class="text-slate-700 font-semibold text-sm hover:text-[#c9922a] transition-colors">{{ $value }}</a>
                        @else
                            <div class="text-slate-700 font-semibold text-sm">{{ $value }}</div>
                        @endif
                    </div>
                </div>
                @endforeach

                {{-- Horário --}}
                <div class="bg-[#1a3a5c] rounded-2xl p-6 text-white">
                    <h4 class="font-bold mb-3">Horário de Atendimento</h4>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between text-slate-300">
                            <span>Segunda — Sexta</span>
                            <span class="text-white font-medium">08:00 — 17:00</span>
                        </div>
                        <div class="flex justify-between text-slate-300">
                            <span>Sábado</span>
                            <span class="text-white font-medium">09:00 — 13:00</span>
                        </div>
                        <div class="flex justify-between text-slate-400">
                            <span>Domingo</span>
                            <span>Fechado</span>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-white/10">
                        <span class="text-xs text-[#c9922a] font-medium">Urgências 24h via WhatsApp</span>
                    </div>
                </div>
            </div>

            {{-- Contact form --}}
            <div class="lg:col-span-3">
                <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                    <h3 class="text-xl font-extrabold text-[#1a3a5c] mb-6">Enviar Mensagem</h3>

                    @if(session('success'))
                    <div class="bg-[#0d8a7d]/10 border border-[#0d8a7d]/20 text-[#0d8a7d] rounded-xl p-4 mb-6 flex items-center gap-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('contact.send') }}" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nome completo <span class="text-red-500">*</span></label>
                                <input type="text" name="name" required
                                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] transition-all"
                                    placeholder="Engº João Silva"
                                    value="{{ old('name') }}">
                                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email <span class="text-red-500">*</span></label>
                                <input type="email" name="email" required
                                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] transition-all"
                                    placeholder="joao@empresa.ao"
                                    value="{{ old('email') }}">
                                @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Empresa / Organização</label>
                            <input type="text" name="company"
                                class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] transition-all"
                                placeholder="Ex: Endiama, E.P."
                                value="{{ old('company') }}">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Assunto <span class="text-red-500">*</span></label>
                            <select name="subject" required
                                class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] transition-all bg-white">
                                <option value="" disabled selected>Selecione um assunto</option>
                                <option value="consultoria" {{ old('subject') == 'consultoria' ? 'selected' : '' }}>Consultoria Técnica</option>
                                <option value="formacao" {{ old('subject') == 'formacao' ? 'selected' : '' }}>Inscrição em Curso</option>
                                <option value="equipamentos" {{ old('subject') == 'equipamentos' ? 'selected' : '' }}>Equipamentos</option>
                                <option value="parceria" {{ old('subject') == 'parceria' ? 'selected' : '' }}>Parceria Comercial</option>
                                <option value="outro" {{ old('subject') == 'outro' ? 'selected' : '' }}>Outro</option>
                            </select>
                            @error('subject')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Mensagem <span class="text-red-500">*</span></label>
                            <textarea name="message" rows="5" required
                                class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#1a3a5c]/30 focus:border-[#1a3a5c] transition-all resize-none"
                                placeholder="Descreva brevemente o que precisa...">{{ old('message') }}</textarea>
                            @error('message')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit"
                            class="w-full bg-[#1a3a5c] hover:bg-[#0f2640] text-white font-bold py-3.5 rounded-xl transition-colors text-sm flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            Enviar Mensagem
                        </button>

                        <p class="text-slate-400 text-xs text-center">Os seus dados são tratados com confidencialidade e não serão partilhados com terceiros.</p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>
