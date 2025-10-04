@extends('layouts.app')
@section('title', $tour['name'] . ' - Travel Luxury')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

<section class="relative min-h-screen bg-gradient-to-b from-black via-neutral-900 to-black text-gray-100 mt-[5%]">
  {{-- แสงสะท้อนทอง --}}
  <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-gradient-to-br from-yellow-600/30 via-amber-500/10 to-transparent rounded-full blur-3xl opacity-30"></div>
  <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-gradient-to-tr from-yellow-500/20 via-amber-400/10 to-transparent rounded-full blur-3xl opacity-30"></div>

  <div class="relative z-10 max-w-6xl mx-auto px-6 py-16">
    {{-- 🧭 Breadcrumb --}}
    <nav class="text-sm mb-6 text-gray-400 flex items-center gap-2">
      <a href="{{ route('home') }}" class="hover:text-yellow-500 transition">หน้าแรก</a>
      <span class="text-gray-500">›</span>
      <span class="text-gray-300 font-medium">{{ $tour['name'] }}</span>
    </nav>

    {{-- 🖼️ Card --}}
    <div class="rounded-3xl bg-gradient-to-b from-neutral-900 to-neutral-950 border border-neutral-800 shadow-[0_0_50px_rgba(212,175,55,0.15)] overflow-hidden transition-all hover:shadow-[0_0_60px_rgba(212,175,55,0.25)] duration-500">
      
      {{-- 🔹 Slide รูปภาพ --}}
      @if(!empty($tour['images']))
        <div class="swiper mySwiper w-full h-[30rem]">
          <div class="swiper-wrapper">
            @foreach($tour['images'] as $image)
              <div class="swiper-slide relative">
                <img src="{{ $image }}" alt="{{ $tour['name'] }}" 
                     class="w-full h-[30rem] object-cover brightness-90 hover:brightness-100 transition duration-500" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
              </div>
            @endforeach
          </div>
          <div class="swiper-button-next !text-yellow-400"></div>
          <div class="swiper-button-prev !text-yellow-400"></div>
          <div class="swiper-pagination !bottom-3"></div>
        </div>
      @else
        <img src="{{ asset('images/default.jpg') }}" alt="{{ $tour['name'] }}" class="w-full h-[30rem] object-cover brightness-90">
      @endif

      {{-- 🔸 เนื้อหา --}}
      <div class="p-10 lg:p-14 space-y-6">
        <h1 class="text-4xl lg:text-5xl font-[Playfair_Display] font-bold text-yellow-400 tracking-wide mb-4">
          {{ $tour['name'] }}
        </h1>

        <p class="text-gray-300 text-lg leading-relaxed border-l-4 border-yellow-500/70 pl-4 font-[Inter]">
          {{ $tour['description'] ?? 'ไม่มีรายละเอียดทัวร์' }}
        </p>

        {{-- จุดเด่น --}}
        <div class="flex flex-wrap gap-3 mt-6">
          <span class="px-4 py-2 bg-yellow-500/10 border border-yellow-500/40 text-yellow-400 text-sm rounded-full">✨ ที่พักระดับพรีเมียม</span>
          <span class="px-4 py-2 bg-yellow-500/10 border border-yellow-500/40 text-yellow-400 text-sm rounded-full">🍷 ดินเนอร์สุดหรู</span>
          <span class="px-4 py-2 bg-yellow-500/10 border border-yellow-500/40 text-yellow-400 text-sm rounded-full">🚘 รถรับส่งส่วนตัว</span>
          <span class="px-4 py-2 bg-yellow-500/10 border border-yellow-500/40 text-yellow-400 text-sm rounded-full">🛥️ เรือยอร์ชส่วนตัว</span>
        </div>

        {{-- ราคา --}}
        <div class="flex items-center gap-3 mt-8">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-yellow-400" fill="none" viewBox="0 0 24 24"
            stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 8c-1.657 0-3 1.343-3 3m3-3c1.657 0 3 1.343 3 3m-3 3v4m0-10V5m0 10c-1.657 0-3 1.343-3 3m3-3c1.657 0 3 1.343 3 3" />
          </svg>
          <p class="text-3xl font-bold text-yellow-400 font-[Inter] tracking-wide">
            {{ number_format($tour['price'] ?? 0, 0) }} <span class="text-gray-400 text-lg">บาท</span>
          </p>
        </div>

        {{-- ปุ่ม --}}
        <div class="flex flex-col sm:flex-row gap-4 mt-10">
          <a href="#"
             class="group relative flex items-center justify-center gap-3 bg-gradient-to-r from-yellow-600 to-yellow-400 text-black font-semibold px-10 py-4 rounded-full shadow-[0_0_20px_rgba(212,175,55,0.4)] hover:shadow-[0_0_35px_rgba(212,175,55,0.7)] transition-all duration-300 uppercase tracking-widest">
            <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition"></span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M3.75 6.75h16.5a.75.75 0 01.75.75v3a2.25 2.25 0 010 4.5v3a.75.75 0 01-.75.75H3.75a.75.75 0 01-.75-.75v-3a2.25 2.25 0 010-4.5v-3a.75.75 0 01.75-.75z" />
            </svg>
            จองทัวร์นี้
          </a>

          <a href="{{ route('home') }}"
             class="flex items-center justify-center gap-2 bg-neutral-800 text-gray-300 border border-neutral-700 px-10 py-4 rounded-full hover:bg-neutral-700 hover:text-yellow-300 transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            ย้อนกลับ
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper(".mySwiper", {
    loop: true,
    effect: "fade",
    autoplay: { delay: 4000 },
    pagination: { el: ".swiper-pagination", clickable: true },
    navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
    speed: 1200
  });
</script>
@endsection
