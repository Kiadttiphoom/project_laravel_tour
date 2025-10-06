@extends('layouts.app')
@section('title', 'เกี่ยวกับเรา - Travel Luxury')
@section('main_class', 'flex-grow w-full p-0 m-0') {{-- ✅ ให้เต็มจอ --}}

@section('content')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

<section class="relative w-full min-h-screen bg-gradient-to-b from-black via-neutral-900 to-black text-gray-100 py-24 overflow-hidden mt-[5%]">
  {{-- ✨ เอฟเฟกต์แสงทอง --}}
  <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-gradient-to-br from-yellow-600/20 via-amber-500/10 to-transparent rounded-full blur-3xl opacity-40"></div>
  <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-yellow-500/20 via-amber-400/10 to-transparent rounded-full blur-3xl opacity-30"></div>

  {{-- 🏆 หัวข้อหลัก --}}
  <div class="max-w-5xl mx-auto px-6 text-center relative z-10">
    <h1 class="text-4xl md:text-5xl font-bold text-yellow-400 mb-6 flex justify-center items-center gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-yellow-500" fill="none" viewBox="0 0 24 24"
        stroke-width="2" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M11.25 9.75h.008v.008h-.008V9.75zM12 21a9 9 0 100-18 9 9 0 000 18zm-.75-6.75h1.5v-4.5h-1.5v4.5z" />
      </svg>
      เกี่ยวกับเรา
    </h1>

    <p class="text-gray-300 max-w-2xl mx-auto text-lg leading-relaxed mb-16">
      เราคือบริษัทนำเที่ยวที่มุ่งมั่นพาคุณไปเปิดประสบการณ์ใหม่ทั่วโลก  
      ด้วยบริการที่ใส่ใจในทุกรายละเอียด เพื่อให้ทุกการเดินทางของคุณเต็มไปด้วยความสุข ความทรงจำ และความหรูหราเหนือระดับ
    </p>
  </div>

  {{-- 🛫 พันธกิจของเรา --}}
  <div class="max-w-4xl mx-auto bg-gradient-to-br from-neutral-950 to-neutral-900 rounded-3xl border border-yellow-600/30 shadow-[0_0_30px_rgba(212,175,55,0.2)] p-10 md:p-14 mb-20 relative z-10">
    <h2 class="text-3xl text-yellow-400 mb-6 flex justify-center items-center gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-500" fill="none" viewBox="0 0 24 24"
        stroke-width="2" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M12 3v2.25M12 18.75V21m9-9h-2.25M6.75 12H3m13.364-6.364l-1.591 1.591M8.227 15.773l-1.591 1.591m0-9.182l1.591 1.591m7.546 7.546l1.591 1.591" />
      </svg>
      พันธกิจของเรา
    </h2>
    <p class="text-gray-300 text-lg leading-relaxed text-center">
      เรามุ่งเน้นให้บริการด้านการท่องเที่ยวที่มีคุณภาพ ปลอดภัย และหรูหรา  
      สร้างแรงบันดาลใจให้ผู้คนออกเดินทางเพื่อค้นพบโลกใบใหม่  
      พร้อมส่งเสริมการท่องเที่ยวเชิงอนุรักษ์และวัฒนธรรมไทยด้วยมาตรฐานระดับสากล
    </p>
  </div>

  {{-- ⭐ จุดเด่นของเรา --}}
  <div class="max-w-6xl mx-auto px-6 relative z-10 mb-20">
    <h2 class="text-3xl text-yellow-400 mb-12 text-center flex justify-center items-center gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M11.48 3.499a.75.75 0 011.04 0l2.107 2.107a.75.75 0 00.53.22h2.85a.75.75 0 01.53 1.28l-2.107 2.107a.75.75 0 00-.22.53v2.85a.75.75 0 01-1.28.53l-2.107-2.107a.75.75 0 00-.53-.22h-2.85a.75.75 0 01-.53-1.28l2.107-2.107a.75.75 0 00.22-.53V6.386a.75.75 0 01.53-1.28h2.85a.75.75 0 00.53-.22l2.107-2.107a.75.75 0 011.28.53v2.85a.75.75 0 00.22.53l2.107 2.107a.75.75 0 01-.53 1.28h-2.85a.75.75 0 00-.53.22l-2.107 2.107a.75.75 0 01-1.28-.53v-2.85a.75.75 0 00-.22-.53L9.42 4.78a.75.75 0 01.53-1.28h2.85a.75.75 0 00.53-.22l2.107-2.107a.75.75 0 01.53-.22z" />
      </svg>
      จุดเด่นของเรา
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
      {{-- การบริการ --}}
      <div class="bg-gradient-to-b from-neutral-950 to-neutral-900 border border-yellow-600/20 rounded-2xl shadow-[0_0_20px_rgba(212,175,55,0.15)] hover:shadow-[0_0_30px_rgba(212,175,55,0.25)] transition-all duration-300 p-10 text-center">
        <div class="bg-yellow-600/20 text-yellow-400 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-5">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9.75 3.75v5.25m3-5.25v5.25m3-5.25v5.25M7.5 9.75v4.5A3.75 3.75 0 0011.25 18h1.5a3.75 3.75 0 003.75-3.75v-4.5" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold text-yellow-400 mb-2">บริการเหนือระดับ</h3>
        <p class="text-gray-300 text-sm leading-relaxed ">ทีมงานมืออาชีพพร้อมดูแลคุณตลอดการเดินทาง เพื่อให้ทุกทริปเต็มไปด้วยความสุขและความประทับใจ</p>
      </div>

      {{-- ความปลอดภัย --}}
      <div class="bg-gradient-to-b from-neutral-950 to-neutral-900 border border-yellow-600/20 rounded-2xl shadow-[0_0_20px_rgba(212,175,55,0.15)] hover:shadow-[0_0_30px_rgba(212,175,55,0.25)] transition-all duration-300 p-10 text-center">
        <div class="bg-yellow-600/20 text-yellow-400 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-5">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 12l2 2 4-4m5.618-2.016A11.955 11.955 0 0112 2.25c-2.924 0-5.605 1.052-7.618 2.784a12.056 12.056 0 00-3.506 4.88A11.949 11.949 0 002.25 12c0 5.201 3.317 9.624 8.026 11.334a11.954 11.954 0 007.448 0A11.955 11.955 0 0021.75 12c0-1.035-.132-2.038-.382-3.016z" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold text-yellow-400 mb-2">ปลอดภัยทุกเส้นทาง</h3>
        <p class="text-gray-300 text-sm leading-relaxed">เลือกใช้บริการขนส่งและที่พักระดับมาตรฐานสากล พร้อมประกันการเดินทางทุกทริป</p>
      </div>

      {{-- ความคุ้มค่า --}}
      <div class="bg-gradient-to-b from-neutral-950 to-neutral-900 border border-yellow-600/20 rounded-2xl shadow-[0_0_20px_rgba(212,175,55,0.15)] hover:shadow-[0_0_30px_rgba(212,175,55,0.25)] transition-all duration-300 p-10 text-center">
        <div class="bg-yellow-600/20 text-yellow-400 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-5">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 8c-1.657 0-3 1.343-3 3m3-3c1.657 0 3 1.343 3 3m-3 3v4m0-10V5m0 10c-1.657 0-3 1.343-3 3m3-3c1.657 0 3 1.343 3 3" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold text-yellow-400 mb-2">คุ้มค่าทุกการเดินทาง</h3>
        <p class="text-gray-300 text-sm leading-relaxed">แพ็กเกจราคาพิเศษที่รวมทุกความสะดวกสบาย ทั้งที่พัก อาหาร และบริการระดับพรีเมียม</p>
      </div>
    </div>
  </div>

  {{-- 🌍 ทีมงาน --}}
  <div class="max-w-4xl mx-auto bg-gradient-to-br from-neutral-950 to-neutral-900 rounded-3xl border border-yellow-600/30 shadow-[0_0_30px_rgba(212,175,55,0.2)] p-10 text-center relative z-10">
    <h2 class="text-3xl text-yellow-400 mb-6 flex justify-center items-center gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M16 14a4 4 0 01-8 0m8 0a4 4 0 01-8 0m8 0a4 4 0 01-8 0M16 14v1a4 4 0 01-8 0v-1M4 6a9 9 0 0116 0v2a9 9 0 01-16 0V6z" />
      </svg>
      ทีมงานของเรา
    </h2>
    <p class="text-gray-300 text-lg leading-relaxed max-w-3xl mx-auto">
      ทีมงาน Travel Luxury ทุกคนมีใจรักการบริการและการท่องเที่ยว  
      เราพร้อมดูแลคุณตั้งแต่เริ่มต้นจนจบทริป  
      เพื่อให้ทุกการเดินทางของคุณเป็นมากกว่าทริป แต่คือ “ประสบการณ์แห่งชีวิต” ✨
    </p>
  </div>
</section>
@endsection
