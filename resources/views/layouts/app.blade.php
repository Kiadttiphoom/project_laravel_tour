<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Travel Luxury')</title>
    {{-- ✅ โหลดไฟล์หลักทุกหน้า --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- ✅ โหลด JS เพิ่มเฉพาะหน้าที่ต้องใช้ --}}
    @if (Request::is('/') || Request::is('home'))
        @vite(['resources/js/home.js'])
    @elseif (Request::is('tour/*'))
        @vite(['resources/js/tour-detail.js'])
    @endif


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            scroll-behavior: smooth;
            overflow-x: hidden;
            background-color: #0a0a0a;
            /* พื้นหลังเรียบ ไม่มีเส้น */
            color: #e5e5e5;
        }


        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(to right, #d4af37, #ffdf70);
            transition: width 0.3s ease;
        }

        .nav-link:hover {
            color: #f4e19c;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .btn-gold {
            background: linear-gradient(135deg, #d4af37, #ffcc66);
            color: #111;
            border: none;
            border-radius: 9999px;
            padding: 0.8rem 2rem;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 0 25px rgba(212, 175, 55, 0.4);
        }

        .btn-gold:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 40px rgba(212, 175, 55, 0.6);
            background: linear-gradient(135deg, #ffcc66, #e5b93c);
        }

        .glass-dark {
            background: rgba(20, 20, 20, 0.7);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        footer::before {
            content: none;
        }


        /* Fade-in Animation */
        .fade-in {
            animation: fadeInUp 1.2s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ✅ ลดการ re-paint ของ layer ให้นิ่ง */
        img,
        .swiper-slide,
        .mySwiper {
            will-change: transform, opacity;
            backface-visibility: hidden;
            transform: translateZ(0);
            contain: paint layout style;
        }

        /* ✅ ทำให้ Swiper fade ลื่นขึ้น */
        .swiper-slide {
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        /* ✅ ป้องกันการกระพริบเวลาภาพโหลด */
        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: translateZ(0);
            image-rendering: auto;
        }

        /* ✅ ปรับ animation ไม่ให้ตัด layer */
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out both;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px) translateZ(0);
            }

            to {
                opacity: 1;
                transform: translateY(0) translateZ(0);
            }
        }
    </style>
</head>

<body
    class="text-[#e5e5e5] font-[IBM_Plex_Sans_Thai] bg-gradient-to-b from-neutral-950 via-black to-neutral-900 text-gray-100 flex flex-col min-h-screen">

    {{-- 🌑 Navbar --}}
    <nav class="glass-dark fixed w-full top-0 z-50 shadow-[0_0_25px_rgba(212,175,55,0.15)] border-b border-neutral-800">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            {{-- โลโก้ --}}
            <a href="{{ route('home') }}"
                class="flex items-center space-x-2 text-yellow-400 text-2xl tracking-wide">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-500" fill="none"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3c4.97 0 9 4.03 9 9 0 4.97-4.03 9-9 9S3 16.97 3 12c0-4.97 4.03-9 9-9Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18M3 12h18" />
                </svg>
                <span>Travel Luxury</span>
            </a>

            {{-- ลิงก์ --}}
            <div class="hidden md:flex items-center space-x-8 text-gray-300 font-medium uppercase tracking-wide">
                <a href="{{ route('home') }}" class="nav-link">หน้าแรก</a>
                <a href="{{ route('about') }}" class="nav-link">เกี่ยวกับเรา</a>
                <a href="{{ route('contact') }}" class="nav-link">ติดต่อเรา</a>
            </div>

            <button class="md:hidden text-yellow-400 p-2 rounded-full hover:bg-neutral-800 transition" id="menuBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18M3 12h18M3 18h18" />
                </svg>
            </button>
        </div>

        {{-- 📱 Mobile Menu --}}
        <div id="mobileMenu" class="hidden md:hidden bg-neutral-900/95 border-t border-neutral-800">
            <div class="flex flex-col text-center py-4 space-y-1 font-medium">
                <a href="{{ route('home') }}"
                    class="hover:bg-neutral-800 py-3 text-gray-300 hover:text-yellow-400">หน้าแรก</a>
                <a href="{{ route('about') }}"
                    class="hover:bg-neutral-800 py-3 text-gray-300 hover:text-yellow-400">เกี่ยวกับเรา</a>
                <a href="{{ route('contact') }}"
                    class="hover:bg-neutral-800 py-3 text-gray-300 hover:text-yellow-400">ติดต่อเรา</a>
            </div>
        </div>
    </nav>

    {{-- 🖼️ Hero --}}
    @if (Request::is('/'))
        <section
            class="relative h-[75vh] flex items-center justify-center text-center text-yellow-50 overflow-hidden mt-[67px]">
            <img src="images\1\1_1.jpg" alt="hero"
                class="absolute inset-0 w-full h-full object-cover brightness-50">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-neutral-900/40 to-black/80"></div>
            <div class="relative z-10 px-6 fade-in">
                <h1 class="text-5xl md:text-7xl font-bold text-yellow-400 mb-6 drop-shadow-xl">
                    สัมผัสการเดินทางเหนือระดับ
                </h1>
                <p class="text-lg md:text-2xl mb-8 text-gray-200 opacity-95 max-w-2xl mx-auto">
                    ทัวร์ส่วนตัว โรงแรมหรู รถรับส่งระดับพรีเมียม – สำหรับคุณเท่านั้น
                </p>
                <a href="#tours" class="btn-gold inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 19.5l8.485-8.485a2.121 2.121 0 00-3-3L12 9.515l-5.485-1.5a2.121 2.121 0 00-3 3L12 19.5z" />
                    </svg>
                    <p class="text-lg font-semibold">
                        สำรวจแพ็กเกจ
                    </p>
                </a>
            </div>
        </section>
    @endif

    {{-- ✨ Content --}}
    <main>
        @yield('content')
    </main>

    {{-- 🌌 Footer --}}
    <footer class="text-gray-400 py-12 border-t border-neutral-800 overflow-hidden">
        <div class="relative z-10 container mx-auto px-6 text-center">
            <div class="mb-6">
                <h3
                    class="text-2xl text-gray-200 flex justify-center items-center space-x-2 mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-gray-300" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3c4.97 0 9 4.03 9 9 0 4.97-4.03 9-9 9S3 16.97 3 12c0-4.97 4.03-9 9-9Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18M3 12h18" />
                    </svg>
                    <span>Travel Luxury</span>
                </h3>
                <p class="text-sm opacity-70 text-gray-400">สร้างสรรค์การเดินทางเหนือระดับ เพื่อคุณเท่านั้น</p>
            </div>

            <div class="flex justify-center space-x-8 mb-8">
                <a href="#" class="hover:scale-110 transition text-gray-300 hover:text-white"><i
                        class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="hover:scale-110 transition text-gray-300 hover:text-white"><i
                        class="fa-brands fa-instagram"></i></a>
                <a href="#" class="hover:scale-110 transition text-gray-300 hover:text-white"><i
                        class="fa-brands fa-twitter"></i></a>
            </div>

            <p class="text-sm opacity-60 text-gray-500">© 2025 Travel Luxury | Designed with Laravel + TailwindCSS</p>
        </div>
    </footer>


    {{-- 📱 Script --}}
    <script>
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        menuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
    </script>

</body>

</html>
