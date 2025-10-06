@props([
    'text' => 'ยืนยัน',
    'icon' => null,
    'type' => 'button',
    'href' => null,
    'variant' => 'primary', // primary, secondary, circle
])

@php
    // Base
    $base = 'group relative flex items-center justify-center gap-2 overflow-hidden transition-all duration-300 font-semibold';

    // Variants
    $variants = [
        'primary' =>
            'bg-gradient-to-r from-yellow-600 via-yellow-500 to-amber-600 text-black px-10 py-4 rounded-2xl shadow-[0_0_30px_rgba(212,175,55,0.5)] hover:shadow-[0_0_50px_rgba(212,175,55,0.8)] uppercase tracking-widest',
        'secondary' =>
            'backdrop-blur-xl bg-neutral-900/70 border border-white/10 text-gray-300 px-10 py-4 rounded-2xl hover:bg-neutral-700/50 hover:text-yellow-300 hover:border-yellow-500/50',
        'circle' =>
            'relative bg-gradient-to-r from-yellow-600 via-yellow-500 to-amber-600 text-black font-bold px-6 py-3 rounded-full shadow-[0_0_20px_rgba(212,175,55,0.4)] hover:shadow-[0_0_35px_rgba(212,175,55,0.7)] transition-all duration-300 flex items-center gap-2 overflow-hidden',
    ];

    $classes = $base . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
@endif

    {{-- Overlay (เฉพาะ primary กับ circle) --}}
    @if (in_array($variant, ['primary', 'circle']))
        <div class="absolute inset-0 bg-gradient-to-r from-amber-500 to-yellow-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
    @endif

    {{-- ข้อความ --}}
    @if ($variant !== 'circle' || $text)
        <span class="relative z-10 text-sm uppercase tracking-wide">{{ $text }}</span>
    @endif

    {{-- ไอคอน --}}
    @if ($icon === 'detail')
        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300 relative z-10"
            fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>
    @elseif ($icon === 'back')
        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5 relative z-10 group-hover:-translate-x-1 transition-transform duration-300"
            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
    @elseif ($icon === 'check')
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 relative z-10" fill="none"
            viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    @endif

@if ($href)
    </a>
@else
    </button>
@endif
