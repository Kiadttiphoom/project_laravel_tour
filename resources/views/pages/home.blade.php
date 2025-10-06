@extends('layouts.app')
@section('title', 'หน้าแรก - Travel Luxury')

@section('content')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <section
        class="relative w-full min-h-screen bg-gradient-to-b from-black via-neutral-900 to-black text-gray-100 py-24 overflow-hidden">
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
                class="text-6xl md:text-8xl font-[Playfair_Display] font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-amber-300 to-yellow-500 mb-4 tracking-tight animate-fade-up leading-tight">
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

        {{-- Tours Grid --}}
        <div class="relative z-10 px-6 md:px-16 max-w-[1400px] mx-auto rounded-2xl overflow-visible">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($tours as $index => $tour)
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
                                        <span class="relative z-10 text-sm uppercase tracking-wide">Explore</span>
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

        {{-- Footer Info --}}
        <div class="text-center mt-20 relative z-10 animate-fade-up [animation-delay:0.8s] rounded-2xl overflow-hidden">
            <p class="text-gray-500 text-sm mb-4">สนใจปรึกษาแพ็กเกจส่วนตัว?</p>
            <button
                class="text-yellow-400 font-semibold hover:text-yellow-300 transition-colors duration-300 flex items-center gap-2 mx-auto group">
                <span>ติดต่อเรา</span>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </button>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intersection Observer
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-12', 'scale-95');
                        entry.target.classList.add('opacity-100', 'translate-y-0', 'scale-100');
                    }
                });
            }, observerOptions);

            // Observe all tour cards
            document.querySelectorAll('.tour-card').forEach(card => {
                observer.observe(card);
            });

            // 3D Tilt Effect on Hover
            document.querySelectorAll('.tour-card').forEach(card => {
                card.addEventListener('mousemove', function(e) {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;

                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;

                    const rotateX = (y - centerY) / 20;
                    const rotateY = (centerX - x) / 20;

                    card.style.transform =
                        `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
                });

                card.addEventListener('mouseleave', function() {
                    card.style.transform = '';
                });
            });
        });
    </script>

@endsection
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const elements = document.querySelectorAll(".fade-up");
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove("opacity-0", "translate-y-10", "invisible");
                    entry.target.classList.add("opacity-100", "translate-y-0");
                } else {
                    entry.target.classList.add("opacity-0", "translate-y-10", "invisible");
                    entry.target.classList.remove("opacity-100", "translate-y-0");
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: "0px 0px -10% 0px"
        });

        elements.forEach((el) => {
            el.classList.add(
                "opacity-0",
                "translate-y-10",
                "transition-all",
                "duration-700",
                "ease-out",
                "invisible"
            );
            observer.observe(el);
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const fadeElements = document.querySelectorAll('.fade-up');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                }
            });
        }, {
            threshold: 0.15
        });

        fadeElements.forEach(el => {
            el.classList.add('opacity-0', 'translate-y-10', 'transition-all', 'duration-700',
                'ease-out');
            observer.observe(el);
        });
    });
</script>
