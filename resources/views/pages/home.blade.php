@extends('layouts.app')
@section('title', 'หน้าแรก - Travel Luxury')

@section('content')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        .mySwiper {
            overflow: visible !important;
            perspective: 800px;
            backface-visibility: hidden;
            will-change: transform;
        }

        .mySwiper .swiper-slide {
            overflow: visible !important;
            transform-style: preserve-3d;
            backface-visibility: hidden;
            z-index: 1;
        }

        .mySwiper .swiper-slide-active {
            z-index: 5;
            /* ✅ คง active slide ให้อยู่บนสุด */
        }

        .mySwiper .tour-card {
            position: relative;
            z-index: 10;
            backface-visibility: hidden;
            transform: translateZ(0);
            /* ✅ ป้องกัน flicker */
            transition: transform 0.35s ease-out;
        }

        /* ✅ ปุ่ม Explore */
        .mySwiper .tour-card a {
            position: relative;
            z-index: 20 !important;
            pointer-events: auto !important;
            backface-visibility: hidden;
            transform: translateZ(0);
            transition: transform 0.25s ease-out;
        }

        /* ✅ ใช้ pseudo-element ทำ gradient layer แทน background จริง */
        .mySwiper .tour-card a::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: linear-gradient(to right, #ca8a04, #facc15, #f59e0b);
            z-index: -1;
        }

        /* ✅ ยกข้อความและ icon ขึ้นเหนือ gradient */
        .mySwiper .tour-card a span,
        .mySwiper .tour-card a svg {
            position: relative;
            z-index: 1;
        }
    </style>

    {{-- 🌟 Hero Section --}}
    <section
        class="relative w-full min-h-screen bg-gradient-to-b from-black via-neutral-900 to-black text-gray-100 pt-24 overflow-hidden">
        {{-- Background Glow Effects --}}
        <div
            class="absolute top-0 left-0 w-[600px] h-[600px] bg-gradient-to-br from-yellow-600/30 via-amber-500/20 to-transparent rounded-full blur-3xl animate-pulse">
        </div>
        <div
            class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-yellow-500/25 via-amber-400/15 to-transparent rounded-full blur-3xl animate-pulse">
        </div>
        <div
            class="absolute top-1/3 right-1/3 w-[400px] h-[400px] bg-gradient-to-bl from-amber-600/20 via-yellow-500/10 to-transparent rounded-full blur-3xl animate-bounce [animation-duration:6s]">
        </div>

        {{-- Decorative Lines --}}
        <div
            class="absolute top-20 left-10 w-32 h-0.5 bg-gradient-to-r from-transparent via-yellow-500/50 to-transparent animate-pulse">
        </div>
        <div
            class="absolute bottom-20 right-10 w-32 h-0.5 bg-gradient-to-r from-transparent via-yellow-500/50 to-transparent animate-pulse">
        </div>

        {{-- Hero Section --}}
        <div class="text-center mb-20 relative z-10 px-4 rounded-2xl overflow-hidden">
            {{-- Top Decoration --}}
            <div class="flex items-center justify-center gap-4 mb-6 animate-fade-scale">
                <div class="w-16 h-px bg-gradient-to-r from-transparent to-yellow-400"></div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-400 animate-pulse" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path d="M12 2l2.4 7.4h7.6l-6 4.6 2.3 7-6.3-4.6-6.3 4.6 2.3-7-6-4.6h7.6z" />
                </svg>
                <div class="w-16 h-px bg-gradient-to-l from-transparent to-yellow-400"></div>
            </div>

            <h1
                class="text-6xl md:text-8xl  font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-amber-300 to-yellow-500 mb-4 tracking-tight animate-fade-up leading-tight">
                LUXURY<br><span class="text-5xl md:text-7xl">DESTINATIONS</span>
            </h1>

            <p
                class="text-gray-300 text-xl md:text-2xl max-w-3xl mx-auto font-light leading-relaxed mb-6 animate-fade-up [animation-delay:0.2s]">
                เดินทางอย่างเหนือระดับ สัมผัสความหรูหราในทุกเส้นทางทั่วโลก
            </p>

            <div
                class="flex items-center justify-center gap-6 text-sm text-gray-400 animate-fade-up [animation-delay:0.3s]">
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
                    <span>{{ count($tours) }} Exclusive Tours</span>
                </div>
                <div class="w-px h-4 bg-gray-700"></div>
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
                    <span>Premium Experience</span>
                </div>
            </div>
        </div>

        {{-- ✅ MOBILE (Swiper) --}}
        <div class="block md:hidden relative z-10 px-4 w-full mx-auto rounded-2xl overflow-visible mb-16">
            <div class="swiper mySwiper !overflow-visible h-[480px]"> {{-- 👈 บังคับความสูงคงที่ --}}
                <div class="swiper-wrapper items-stretch">
                    @foreach ($tours as $tour)
                        <div class="swiper-slide h-full flex items-stretch px-2">
                            <div
                                class="tour-card h-full flex flex-col justify-between bg-gradient-to-br from-neutral-900/90 via-neutral-900/70 to-black/90 border border-neutral-800/50 rounded-3xl overflow-hidden shadow-[0_8px_40px_rgba(0,0,0,0.4)]">
                                {{-- 🖼️ Image Section --}}
                                <div class="relative overflow-hidden h-60 rounded-2xl">
                                    <img src="{{ asset($tour['image']) }}" alt="{{ $tour['name'] }}"
                                        class="w-full h-full object-cover transition-transform duration-300" />
                                    <div class="absolute inset-0">
                                    </div>
                                </div>

                                {{-- 📝 Content Section --}}
                                <div class="p-6 flex flex-col justify-between flex-grow">
                                    <div>
                                        <h3
                                            class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-amber-300 mb-2">
                                            {{ $tour['name'] }}
                                        </h3>
                                        <p class="text-gray-400 text-sm mb-4 line-clamp-3">{{ $tour['description'] }}</p>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <p class="text-yellow-400 text-xl font-bold">{{ number_format($tour['price'], 0) }}
                                            THB</p>
                                        <a href="{{ route('tour.detail', $tour['id']) }}"
                                            class="bg-gradient-to-r from-yellow-600 via-yellow-500 to-amber-600 text-black font-bold px-5 py-2 rounded-full shadow hover:shadow-lg transition-none">
                                            ดูรายละเอียด
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination mt-6"></div>
            </div>
        </div>


        {{-- ✅ DESKTOP (Grid เดิม) --}}
        <div class="hidden md:block relative z-10 px-6 md:px-16 max-w-[1400px] mx-auto rounded-2xl overflow-visible">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($tours as $index => $tour)
                    {{-- ใช้การ์ดเดิมทั้งหมดของคุณ --}}
                    <div class="tour-card fade-up opacity-0 translate-y-12 scale-95 [transition:all_0.7s_cubic-bezier(0.34,1.56,0.64,1)] group bg-gradient-to-br from-neutral-900/90 via-neutral-900/70 to-black/90 border border-neutral-800/50 rounded-3xl overflow-hidden shadow-[0_10px_50px_rgba(0,0,0,0.5)] hover:shadow-[0_20px_60px_rgba(212,175,55,0.3)] hover:scale-[1.02] flex flex-col backdrop-blur-sm"
                        data-index="{{ $index }}">
                        {{-- 🖼️ Image Section --}}
                        <div class="relative overflow-hidden h-72 rounded-2xl">
                            <div class="absolute inset-0 shimmer z-10"></div>
                            <img src="{{ asset($tour['image']) }}" alt="{{ $tour['name'] }}"
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>

                            {{-- Luxury Badge --}}
                            <div
                                class="absolute top-6 right-6 backdrop-blur-md bg-gradient-to-br from-yellow-600/90 to-amber-700/90 px-4 py-2 rounded-full flex items-center gap-2 shadow-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M12 2l2.4 7.4h7.6l-6 4.6 2.3 7-6.3-4.6-6.3 4.6 2.3-7-6-4.6h7.6z" />
                                </svg>
                                <span class="text-white text-xs font-bold tracking-wider">LUXURY</span>
                            </div>

                            {{-- Rating --}}
                            <div
                                class="absolute top-6 left-6 backdrop-blur-xl bg-neutral-900/60 px-3 py-2 rounded-lg flex items-center gap-1 transition-opacity duration-300 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M12 2l2.4 7.4h7.6l-6 4.6 2.3 7-6.3-4.6-6.3 4.6 2.3-7-6-4.6h7.6z" />
                                </svg>
                                <span class="text-white text-sm font-semibold">{{ $tour['star'] }}</span>
                            </div>

                            {{-- Hover Info Overlay --}}
                            <div
                                class="absolute bottom-0 left-0 right-0 p-6 translate-y-full group-hover:translate-y-0 transition-transform duration-500 pointer-events-none">
                                <div class="backdrop-blur-xl bg-neutral-900/60 rounded-xl p-4 space-y-2">
                                    <div
                                        class="flex items-center gap-3 text-sm text-white opacity-0 -translate-x-5 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-400 [transition-delay:0.1s]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-yellow-400"
                                            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>{{ $tour['day'] }}</span>
                                    </div>
                                    <div
                                        class="flex items-center gap-3 text-sm text-white opacity-0 -translate-x-5 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-400 [transition-delay:0.15s]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-yellow-400"
                                            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                        </svg>
                                        <span>{{ $tour['people'] }}</span>
                                    </div>
                                    <div
                                        class="flex items-center gap-3 text-sm text-white opacity-0 -translate-x-5 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-400 [transition-delay:0.2s]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-yellow-400"
                                            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>{{ $tour['services'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 📝 Content Section --}}
                        <div class="p-8 flex flex-col justify-between flex-grow">
                            <div>
                                <div class="flex items-start justify-between mb-4">
                                    <h3
                                        class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-amber-300 group-hover:from-yellow-300 group-hover:to-amber-200 transition-all duration-300">
                                        {{ $tour['name'] }}
                                    </h3>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6 text-yellow-500 group-hover:scale-110 transition-transform duration-300"
                                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                </div>

                                <p
                                    class="text-gray-400 text-base mb-6 leading-relaxed line-clamp-3 group-hover:text-gray-300 transition-colors duration-300">
                                    {{ $tour['description'] }}
                                </p>
                            </div>

                            {{-- 💰 Price & Button --}}
                            <div class="mt-auto space-y-4">
                                <div class="w-full h-px bg-gradient-to-r from-transparent via-neutral-700 to-transparent">
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs text-gray-500 mb-1 uppercase tracking-wide">Starting from</p>
                                        <div class="flex items-baseline gap-2">
                                            <p
                                                class="text-3xl font-bold text-yellow-400 group-hover:scale-105 transition-transform duration-300">
                                                {{ number_format($tour['price'], 0) }}
                                            </p>
                                            <span class="text-sm text-gray-400">THB</span>
                                        </div>
                                    </div>

                                    <a href="{{ route('tour.detail', $tour['id']) }}"
                                        class="relative group/btn bg-gradient-to-r from-yellow-600 via-yellow-500 to-amber-600 text-black font-bold px-6 py-3 rounded-full shadow-[0_0_20px_rgba(212,175,55,0.4)] hover:shadow-[0_0_35px_rgba(212,175,55,0.7)] transition-all duration-300 flex items-center gap-2 overflow-hidden">
                                        <span class="relative z-10 text-sm uppercase tracking-wide">ดูรายละเอียด</span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform duration-300 relative z-10"
                                            fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                        </svg>
                                        <div
                                            class="absolute inset-0 bg-gradient-to-r from-amber-500 to-yellow-400 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- 🌟 วางโค้ดนี้ต่อจาก Tour Grid (Desktop) และก่อน Footer Info --}}

        {{-- ⭐ 1. WHY CHOOSE US Section --}}
        <section class="relative py-24 px-6 md:px-16 max-w-[1400px] mx-auto">
            <div class="text-center mb-16">
                <div class="flex items-center justify-center gap-4 mb-4">
                    <div class="w-12 h-px bg-gradient-to-r from-transparent to-yellow-400"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-400" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path d="M12 2l2.4 7.4h7.6l-6 4.6 2.3 7-6.3-4.6-6.3 4.6 2.3-7-6-4.6h7.6z" />
                    </svg>
                    <div class="w-12 h-px bg-gradient-to-l from-transparent to-yellow-400"></div>
                </div>
                <h2
                    class="text-4xl md:text-5xl pt-2 font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-amber-300 mb-4">
                    ทำไมต้องเลือกเรา
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">เราให้มากกว่าการท่องเที่ยว
                    แต่คือประสบการณ์ที่คุณจะจดจำไปตลอดชีวิต</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Feature 1 --}}
                <div
                    class="group bg-gradient-to-br from-neutral-900/90 to-black/90 border border-neutral-800/50 rounded-2xl p-8 hover:border-yellow-500/30 transition-all duration-500 hover:scale-105 hover:shadow-[0_0_40px_rgba(212,175,55,0.2)]">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-yellow-600/20 to-amber-600/20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-400" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-yellow-400 mb-3">การันตีคุณภาพ</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">ทุกแพ็กเกจผ่านการคัดสรรอย่างพิถีพิถัน
                        รับประกันความพึงพอใจ 100%</p>
                </div>

                {{-- Feature 2 --}}
                <div
                    class="group bg-gradient-to-br from-neutral-900/90 to-black/90 border border-neutral-800/50 rounded-2xl p-8 hover:border-yellow-500/30 transition-all duration-500 hover:scale-105 hover:shadow-[0_0_40px_rgba(212,175,55,0.2)]">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-yellow-600/20 to-amber-600/20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-400" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-yellow-400 mb-3">ไกด์มืออาชีพ</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">ทีมงานผู้เชี่ยวชาญพร้อมดูแลคุณตลอดการเดินทาง
                        ใส่ใจทุกรายละเอียด</p>
                </div>

                {{-- Feature 3 --}}
                <div
                    class="group bg-gradient-to-br from-neutral-900/90 to-black/90 border border-neutral-800/50 rounded-2xl p-8 hover:border-yellow-500/30 transition-all duration-500 hover:scale-105 hover:shadow-[0_0_40px_rgba(212,175,55,0.2)]">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-yellow-600/20 to-amber-600/20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-400" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-yellow-400 mb-3">ปรับแต่งได้ตามใจ</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">ออกแบบทริปส่วนตัวตามความต้องการ ยืดหยุ่นทุกรายละเอียด
                    </p>
                </div>

                {{-- Feature 4 --}}
                <div
                    class="group bg-gradient-to-br from-neutral-900/90 to-black/90 border border-neutral-800/50 rounded-2xl p-8 hover:border-yellow-500/30 transition-all duration-500 hover:scale-105 hover:shadow-[0_0_40px_rgba(212,175,55,0.2)]">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-yellow-600/20 to-amber-600/20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-400" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-yellow-400 mb-3">ดูแล 24/7</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">ทีมซัพพอร์ตพร้อมช่วยเหลือตลอด 24 ชั่วโมง ทุกวัน
                        ทุกเวลา</p>
                </div>
            </div>
        </section>

        {{-- 📊 2. STATS COUNTER Section --}}
        <section class="relative py-20 px-6 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-yellow-600/10 via-amber-500/5 to-yellow-600/10"></div>
            <div class="relative max-w-[1200px] mx-auto">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    {{-- Stat 1 --}}
                    <div class="text-center group">
                        <div class="mb-3 flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-10 h-10 text-yellow-400 group-hover:scale-110 transition-transform duration-300"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                        </div>
                        <h3 class="text-4xl md:text-5xl font-bold text-yellow-400 mb-2">2,500+</h3>
                        <p class="text-gray-400 text-sm">ลูกค้าที่พึงพอใจ</p>
                    </div>

                    {{-- Stat 2 --}}
                    <div class="text-center group">
                        <div class="mb-3 flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-10 h-10 text-yellow-400 group-hover:scale-110 transition-transform duration-300"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                        </div>
                        <h3 class="text-4xl md:text-5xl font-bold text-yellow-400 mb-2">{{ count($tours) }}+</h3>
                        <p class="text-gray-400 text-sm">แพ็กเกจพรีเมียม</p>
                    </div>

                    {{-- Stat 3 --}}
                    <div class="text-center group">
                        <div class="mb-3 flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-10 h-10 text-yellow-400 group-hover:scale-110 transition-transform duration-300"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                            </svg>
                        </div>
                        <h3 class="text-4xl md:text-5xl font-bold text-yellow-400 mb-2">15+</h3>
                        <p class="text-gray-400 text-sm">ประเทศทั่วโลก</p>
                    </div>

                    {{-- Stat 4 --}}
                    <div class="text-center group">
                        <div class="mb-3 flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-10 h-10 text-yellow-400 group-hover:scale-110 transition-transform duration-300"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg>
                        </div>
                        <h3 class="text-4xl md:text-5xl font-bold text-yellow-400 mb-2">4.9/5</h3>
                        <p class="text-gray-400 text-sm">คะแนนเฉลี่ย</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- 💬 3. TESTIMONIALS Section --}}
        <section class="relative py-24 px-6 md:px-16 max-w-[1400px] mx-auto">
            <div class="text-center mb-16">
                <div class="flex items-center justify-center gap-4 mb-4">
                    <div class="w-12 h-px bg-gradient-to-r from-transparent to-yellow-400"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-400" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path d="M12 2l2.4 7.4h7.6l-6 4.6 2.3 7-6.3-4.6-6.3 4.6 2.3-7-6-4.6h7.6z" />
                    </svg>
                    <div class="w-12 h-px bg-gradient-to-l from-transparent to-yellow-400"></div>
                </div>
                <h2
                    class="text-4xl md:text-5xl pt-2 pb-2 font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-amber-300 mb-4">
                    ลูกค้าของเราพูดถึงเรา
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">ประสบการณ์จริงจากผู้ใช้บริการที่ไว้วางใจเรา</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Review 1 --}}
                <div
                    class="bg-gradient-to-br from-neutral-900/90 to-black/90 border border-neutral-800/50 rounded-2xl p-8 hover:border-yellow-500/30 transition-all duration-300 hover:scale-105">
                    <div class="flex items-center gap-1 mb-4">
                        @for ($i = 0; $i < 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M12 2l2.4 7.4h7.6l-6 4.6 2.3 7-6.3-4.6-6.3 4.6 2.3-7-6-4.6h7.6z" />
                            </svg>
                        @endfor
                    </div>
                    <p class="text-gray-300 mb-6 italic">"ทริปที่ดีที่สุดในชีวิต! ทุกอย่างเหนือความคาดหมาย ไกด์น่ารัก
                        โรงแรมหรูมาก บริการเยี่ยมจริงๆ"</p>
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-yellow-600 to-amber-600 rounded-full flex items-center justify-center text-white font-bold">
                            S
                        </div>
                        <div>
                            <h4 class="text-yellow-400 font-bold">คุณสมชาย</h4>
                            <p class="text-gray-500 text-sm">ทริป: Swiss Alps Luxury Tour</p>
                        </div>
                    </div>
                </div>

                {{-- Review 2 --}}
                <div
                    class="bg-gradient-to-br from-neutral-900/90 to-black/90 border border-neutral-800/50 rounded-2xl p-8 hover:border-yellow-500/30 transition-all duration-300 hover:scale-105">
                    <div class="flex items-center gap-1 mb-4">
                        @for ($i = 0; $i < 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M12 2l2.4 7.4h7.6l-6 4.6 2.3 7-6.3-4.6-6.3 4.6 2.3-7-6-4.6h7.6z" />
                            </svg>
                        @endfor
                    </div>
                    <p class="text-gray-300 mb-6 italic">"ประทับใจมาก ไม่ต้องกังวลเรื่องอะไรเลย ทีมงานดูแลดีทุกอย่าง
                        คุ้มค่าทุกบาททุกสตางค์"</p>
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-yellow-600 to-amber-600 rounded-full flex items-center justify-center text-white font-bold">
                            P
                        </div>
                        <div>
                            <h4 class="text-yellow-400 font-bold">คุณพิมพ์</h4>
                            <p class="text-gray-500 text-sm">ทริป: Paris Romance Escape</p>
                        </div>
                    </div>
                </div>

                {{-- Review 3 --}}
                <div
                    class="bg-gradient-to-br from-neutral-900/90 to-black/90 border border-neutral-800/50 rounded-2xl p-8 hover:border-yellow-500/30 transition-all duration-300 hover:scale-105">
                    <div class="flex items-center gap-1 mb-4">
                        @for ($i = 0; $i < 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M12 2l2.4 7.4h7.6l-6 4.6 2.3 7-6.3-4.6-6.3 4.6 2.3-7-6-4.6h7.6z" />
                            </svg>
                        @endfor
                    </div>
                    <p class="text-gray-300 mb-6 italic">"มืออาชีพสุดๆ จัดโปรแกรมดีมาก ได้เห็นทุกที่ที่อยากไป แนะนำเลยครับ
                        จะกลับมาใช้บริการอีกแน่นอน"</p>
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-yellow-600 to-amber-600 rounded-full flex items-center justify-center text-white font-bold">
                            A
                        </div>
                        <div>
                            <h4 class="text-yellow-400 font-bold">คุณอนันต์</h4>
                            <p class="text-gray-500 text-sm">ทริป: Japanese Cultural Journey</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 📞 4. FINAL CTA Section --}}
        <section class="relative py-20 px-6 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-yellow-600/20 via-amber-500/10 to-yellow-600/20"></div>
            <div class="absolute top-0 left-0 w-96 h-96 bg-yellow-600/30 rounded-full blur-3xl animate-pulse"></div>
            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-amber-600/30 rounded-full blur-3xl animate-pulse [animation-delay:1s]">
            </div>

            <div class="relative max-w-4xl mx-auto text-center">
                <h2
                    class="text-4xl md:text-5xl pt-2 font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-amber-300 mb-6">
                    พร้อมสร้างความทรงจำที่ไม่มีวันลืม?
                </h2>
                <p class="text-gray-300 text-lg md:text-xl mb-10 max-w-2xl mx-auto leading-relaxed">
                    ปรึกษาทริปในฝันกับเราวันนี้ ฟรี! ทีมผู้เชี่ยวชาญพร้อมออกแบบทริปส่วนตัวเฉพาะสำหรับคุณ
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('contact') }}"
                        class="group relative bg-gradient-to-r from-yellow-600 via-yellow-500 to-amber-600 text-black font-bold px-10 py-4 rounded-full shadow-[0_0_30px_rgba(212,175,55,0.5)] hover:shadow-[0_0_50px_rgba(212,175,55,0.8)] transition-all duration-300 flex items-center gap-3 overflow-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 group-hover:rotate-12 transition-transform duration-300" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                        <span class="text-lg uppercase tracking-wide">ติดต่อเราเลย</span>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-amber-500 to-yellow-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </a>

                    <a href="tel:+66123456789"
                        class="group bg-neutral-900/90 border-2 border-yellow-500/50 text-yellow-400 font-bold px-10 py-4 rounded-full hover:bg-yellow-500/10 hover:border-yellow-400 transition-all duration-300 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                        </svg>
                        <span class="text-lg">+66 12-345-6789</span>
                    </a>
                </div>

                <div class="mt-10 flex items-center justify-center gap-8 text-sm text-gray-400">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>ปรึกษาฟรี</span>
                    </div>
                    <div class="w-px h-4 bg-gray-700"></div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>ตอบกลับภายใน 24 ชม.</span>
                    </div>
                    <div class="w-px h-4 bg-gray-700"></div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75m-2.25 0H15m0 0l3.75-3.75M15 9.75L18.75 6M3 12a9 9 0 0118 0 9 9 0 01-18 0z" />
                        </svg>
                        <span>ไม่มีค่าใช้จ่ายแอบแฝง</span>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
