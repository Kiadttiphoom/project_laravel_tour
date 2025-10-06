@extends('layouts.app')
@section('title', $tour['name'] . ' - Travel Luxury')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        /* Keyframes for animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }

        @keyframes floatSlow {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }

        .animate-shimmer {
            animation: shimmer 3s infinite;
            background-size: 200% 100%;
        }

        .animate-float-slow {
            animation: floatSlow 6s ease-in-out infinite;
        }

        /* Swiper Custom Styles */
        .swiper-button-next,
        .swiper-button-prev {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            width: 50px !important;
            height: 50px !important;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: rgba(217, 119, 6, 0.8);
            transform: scale(1.1);
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 20px !important;
        }

        .swiper-pagination-bullet {
            background: rgba(255, 255, 255, 0.5) !important;
            opacity: 1 !important;
            width: 12px !important;
            height: 12px !important;
            transition: all 0.3s ease !important;
        }

        .swiper-pagination-bullet-active {
            background: #facc15 !important;
            width: 30px !important;
            border-radius: 6px !important;
        }
    </style>

    <section class="relative min-h-screen overflow-x-hidden bg-gradient-to-b from-black via-neutral-900 to-black text-gray-100 pt-28 pb-20">
        {{-- Background Glow Effects --}}
        <div
            class="absolute top-0 left-0 w-[600px] h-[400px] md:h-[600px] bg-gradient-to-br from-yellow-600/30 via-amber-500/20 to-transparent rounded-full blur-3xl animate-pulse">
        </div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-yellow-500/25 via-amber-400/15 to-transparent rounded-full blur-3xl animate-pulse"
            style="animation-delay: 2s;"></div>
        <div
            class="absolute top-1/3 left-1/3 w-[400px] h-[400px] bg-gradient-to-bl from-amber-600/20 to-transparent rounded-full blur-3xl animate-float-slow">
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 md:px-6">
            {{-- Breadcrumb --}}
            <nav class="mb-6 md:mb-10 animate-fade-in">
                <div class="flex items-center gap-2 text-xs md:text-sm lg:text-base flex-wrap leading-snug">
                    <a href="{{ route('home') }}"
                        class="flex items-center gap-2 text-gray-400 hover:text-yellow-400 transition-colors duration-300 group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-3.5 h-3.5 md:w-4 md:h-4 group-hover:scale-110 transition-transform" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        หน้าแรก
                    </a>

                    <span class="text-yellow-500/50">›</span>
                    <span class="text-gray-300 font-medium">รายละเอียดทัวร์</span>
                    <span class="text-yellow-500/50">›</span>
                    <span class="text-yellow-400 font-semibold break-words max-w-[80vw] leading-snug">
                        {{ $tour['name'] }}
                    </span>
                </div>
            </nav>


            {{-- Main Content Card --}}
            <div class="animate-fade-in" style="animation-delay: 0.2s;">
                <div
                    class="rounded-2xl md:rounded-3xl bg-gradient-to-br from-neutral-900/90 via-neutral-900/70 to-black/90 border border-neutral-800/50 shadow-[0_20px_80px_rgba(0,0,0,0.8)] hover:shadow-[0_30px_100px_rgba(212,175,55,0.2)] transition-all duration-700 overflow-hidden backdrop-blur-sm">

                    {{-- Image Slider --}}
                    <div class="relative">
                        @if (!empty($tour['images']))
                            <div class="swiper mySwiper w-full h-[16rem] sm:h-[24rem] md:h-[30rem] lg:h-[40rem]">
                                <div class="swiper-wrapper">
                                    @foreach ($tour['images'] as $image)
                                        <div class="swiper-slide relative group">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-r from-transparent via-yellow-400/10 to-transparent opacity-0 group-hover:opacity-100 group-hover:animate-shimmer z-10 transition-opacity duration-500">
                                            </div>
                                            <img src="{{ $image }}" alt="{{ $tour['name'] }}"
                                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination !bottom-6"></div>
                            </div>
                        @else
                            <div class="relative h-[35rem] lg:h-[40rem]">
                                <img src="{{ asset('images/default.jpg') }}" alt="{{ $tour['name'] }}"
                                    class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>
                            </div>
                        @endif

                        {{-- Floating Info Badge --}}
                        <div
                            class="absolute top-8 left-8 backdrop-blur-xl bg-neutral-900/70 border border-white/10 px-5 py-2 md:py-3 rounded-2xl flex items-center gap-3 animate-pulse">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M12 2l2.4 7.4h7.6l-6 4.6 2.3 7-6.3-4.6-6.3 4.6 2.3-7-6-4.6h7.6z" />
                            </svg>
                            <div>
                                <p class="text-white text-sm font-bold">Premium Tour</p>
                                <p class="text-yellow-400 text-xs">Luxury Experience</p>
                            </div>
                        </div>

                        {{-- Rating Badge --}}
                        <div
                            class="absolute top-8 right-8 backdrop-blur-xl bg-neutral-900/70 border border-white/10 px-4 py-2 rounded-full flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M12 2l2.4 7.4h7.6l-6 4.6 2.3 7-6.3-4.6-6.3 4.6 2.3-7-6-4.6h7.6z" />
                            </svg>
                            <span class="text-white font-bold text-lg">{{ $tour['star'] }}</span>
                            <span class="text-gray-400 text-sm">(128)</span>
                        </div>
                    </div>

                    {{-- Content Section --}}
                    <div class="p-10 lg:p-16 space-y-10">
                        {{-- Title Section --}}
                        <div class="space-y-6 animate-fade-in" style="animation-delay: 0.3s;">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-1 h-16 bg-gradient-to-b from-yellow-400 to-amber-600 rounded-full"></div>
                                <div>
                                    <p class="text-yellow-500 text-sm font-semibold tracking-widest uppercase mb-2">
                                        Exclusive Luxury Tour</p>
                                    <h1
                                        class="text-base md:text-sm md:text-lg lg:text-xl lg:text-2xl md:text-sm md:text-lg lg:text-xl md:text-lg md:text-base md:text-sm md:text-lg lg:text-xl lg:text-2xl lg:text-3xl lg:text-4xl lg:text-5xl lg:text-6xl font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-amber-300 to-yellow-500 leading-tight">
                                        {{ $tour['name'] }}
                                    </h1>
                                </div>
                            </div>

                            <p
                                class="text-gray-300 text-sm md:text-lg lg:text-xl leading-relaxed pl-6 border-l-4 border-yellow-500/50 font-light">
                                {{ $tour['description'] ?? 'ไม่มีรายละเอียดทัวร์' }}
                            </p>
                        </div>

                        {{-- Features Grid --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 animate-fade-in"
                            style="animation-delay: 0.4s;">
                            @php
                                $features = [
                                    [
                                        'icon' =>
                                            '<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />',
                                        'title' => 'ที่พัก ' . ($tour['star'] ?? 'ไม่มีรายละเอียดทัวร์') . ' ดาว',
                                        'subtitle' => 'Premium Hotels',
                                    ],
                                    [
                                        'icon' =>
                                            '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />',
                                        'title' => $tour['day'] ?? 'ไม่มีรายละเอียดทัวร์',
                                        'subtitle' => 'Trip Duration',
                                    ],
                                    [
                                        'icon' =>
                                            '<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />',
                                        'title' => $tour['people'] ?? 'ไม่มีรายละเอียดทัวร์',
                                        'subtitle' => 'Group Size',
                                    ],
                                    [
                                        'icon' =>
                                            '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
                                        'title' => 'ประกันเต็ม',
                                        'subtitle' => 'Full Insurance',
                                    ],
                                ];
                            @endphp

                            @foreach ($features as $feature)
                                <div
                                    class="backdrop-blur-xl bg-neutral-900/70 border border-white/10 p-6 rounded-2xl group hover:bg-yellow-600/10 hover:border-yellow-500/50 transition-all duration-500 cursor-pointer">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-14 h-14 bg-yellow-500/20 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-yellow-400"
                                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                {!! $feature['icon'] !!}
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-white font-bold text-sm">{{ $feature['title'] }}</p>
                                            <p class="text-gray-400 text-xs">{{ $feature['subtitle'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Highlights Section --}}
                        <div class="animate-fade-in" style="animation-delay: 0.5s;">
                            <h3
                                class="text-base md:text-sm md:text-lg lg:text-xl lg:text-2xl font-bold text-yellow-400 mb-6 flex items-center gap-3">
                                <div class="w-10 h-10 bg-yellow-500/20 rounded-xl flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-400" fill="none"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                                    </svg>
                                </div>
                                จุดเด่นของทัวร์
                            </h3>

                            <div class="flex flex-wrap gap-3 mt-4">
                                @if (!empty($tour['Highlights'][0]))
                                    @foreach (explode(',', $tour['Highlights'][0]) as $item)
                                        <span
                                            class="relative overflow-hidden px-4 md:px-6 py-2 md:py-3 backdrop-blur-xl bg-neutral-900/70 border border-white/10 text-yellow-400 text-sm font-semibold rounded-2xl flex items-center gap-2 hover:scale-105 transition-transform duration-300 cursor-pointer">
                                            <span
                                                class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent animate-shimmer"></span>
                                            <span class="relative z-10">{{ trim($item) }}</span>
                                        </span>
                                    @endforeach
                                @else
                                    <span class="text-gray-400">ไม่มีข้อมูลไฮไลท์ทัวร์</span>
                                @endif
                            </div>
                        </div>

                        {{-- Price & Action Section --}}
                        <div class="backdrop-blur-xl bg-neutral-900/70 border border-white/10 rounded-2xl md:rounded-3xl p-4 md:p-8 lg:p-10 animate-fade-in"
                            style="animation-delay: 0.6s;">
                            <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                                <div class="flex-1">
                                    <p class="text-gray-400 text-sm uppercase tracking-widest mb-2">ราคาเริ่มต้น</p>
                                    <div class="flex items-baseline gap-3">
                                        <p
                                            class="tour-price text-base md:text-sm md:text-lg lg:text-xl lg:text-2xl md:text-sm md:text-lg lg:text-xl md:text-lg md:text-base md:text-sm md:text-lg lg:text-xl lg:text-2xl lg:text-3xl lg:text-4xl lg:text-5xl lg:text-6xl font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-amber-300">
                                            {{ number_format($tour['price'] ?? 0, 0) }}
                                        </p>
                                        <span
                                            class="text-base md:text-sm md:text-lg lg:text-xl lg:text-2xl text-gray-400 font-light">บาท</span>
                                    </div>
                                    <p class="text-gray-500 text-sm mt-2">*ราคาต่อท่าน / รวมภาษีและค่าบริการ</p>
                                </div>

                                <div class="flex flex-col sm:flex-row gap-4 w-full lg:w-auto">
                                    <a href="{{ route('booking.page', ['id' => $tour['id']]) }}"
                                        class="group relative flex items-center justify-center gap-3 bg-gradient-to-r from-yellow-600 via-yellow-500 to-amber-600 text-black font-bold px-10 py-5 rounded-2xl shadow-[0_0_30px_rgba(212,175,55,0.5)] hover:shadow-[0_0_50px_rgba(212,175,55,0.8)] transition-all duration-300 uppercase tracking-widest overflow-hidden">
                                        <span
                                            class="absolute inset-0 bg-gradient-to-r from-amber-500 to-yellow-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 relative z-10"
                                            fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                                        </svg>
                                        <span class="relative z-10">จองทัวร์นี้</span>
                                    </a>

                                    <a href="{{ route('home') }}"
                                        class="flex items-center justify-center gap-3 backdrop-blur-xl bg-neutral-900/70 border border-white/10 text-gray-300 px-10 py-5 rounded-2xl hover:bg-neutral-700/50 hover:text-yellow-300 hover:border-yellow-500/50 transition-all duration-300 group">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5 group-hover:-translate-x-1 transition-transform duration-300"
                                            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 19.5L8.25 12l7.5-7.5" />
                                        </svg>
                                        <span class="font-semibold">ย้อนกลับ</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
