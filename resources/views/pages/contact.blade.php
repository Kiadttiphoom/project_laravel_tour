@extends('layouts.app')
@section('title', 'ติดต่อเรา - Travel Luxury')
@section('main_class', 'flex-grow w-full p-0 m-0') {{-- ✅ เต็มจอ Luxury Theme --}}

@section('content')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

<section class="relative w-full min-h-screen bg-gradient-to-b from-black via-neutral-900 to-black text-gray-100 py-24 overflow-hidden mt-[5%]">
  {{-- ✨ แสงทอง --}}
  <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-gradient-to-br from-yellow-600/25 via-amber-500/15 to-transparent rounded-full blur-3xl opacity-40"></div>
  <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-yellow-500/25 via-amber-400/10 to-transparent rounded-full blur-3xl opacity-30"></div>

  <div class="max-w-6xl mx-auto px-6 text-center relative z-10">
    {{-- 🏆 หัวข้อ --}}
    <h1 class="text-4xl md:text-5xl font-bold text-yellow-400 mb-6 flex items-center justify-center gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-yellow-500" fill="none" viewBox="0 0 24 24"
        stroke-width="2" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M2.25 12c0-4.97 4.03-9 9-9s9 4.03 9 9c0 4.97-4.03 9-9 9a9.9 9.9 0 01-3.543-.639L2.25 21.75l.726-3.63A8.963 8.963 0 012.25 12z" />
      </svg>
      ติดต่อเรา
    </h1>

    <p class="text-gray-300 max-w-2xl mx-auto text-lg mb-16 font-[Inter]">
      ต้องการสอบถามข้อมูลเพิ่มเติม หรือติดต่อจองแพ็กเกจทัวร์สุดหรูกับเรา<br class="hidden sm:block">
      ติดต่อผ่านช่องทางด้านล่างได้ทุกเวลา ทีมงานพร้อมให้บริการด้วยใจ
    </p>

    {{-- 💬 ช่องทางติดต่อ --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
      {{-- โทรศัพท์ --}}
      <div class="bg-gradient-to-b from-neutral-950 to-neutral-900 border border-yellow-600/20 rounded-3xl shadow-[0_0_25px_rgba(212,175,55,0.15)] hover:shadow-[0_0_35px_rgba(212,175,55,0.25)] transition-all duration-300 p-10 flex flex-col items-center">
        <div class="bg-yellow-600/20 text-yellow-400 p-5 rounded-full mb-5">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
            stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M2.25 6.75v10.5a2.25 2.25 0 002.25 2.25h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15A2.25 2.25 0 002.25 6.75z" />
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M4.5 6.75l7.5 5.25L19.5 6.75" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold text-yellow-400 mb-2">โทรศัพท์</h3>
        <p class="text-gray-300 text-base font-[Inter]">099-999-9999</p>
      </div>

      {{-- อีเมล --}}
      <div class="bg-gradient-to-b from-neutral-950 to-neutral-900 border border-yellow-600/20 rounded-3xl shadow-[0_0_25px_rgba(212,175,55,0.15)] hover:shadow-[0_0_35px_rgba(212,175,55,0.25)] transition-all duration-300 p-10 flex flex-col items-center">
        <div class="bg-yellow-600/20 text-yellow-400 p-5 rounded-full mb-5">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
            stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75a2.25 2.25 0 012.25-2.25h15a2.25 2.25 0 012.25 2.25z" />
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M3.75 6.75l8.25 6 8.25-6" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold text-yellow-400 mb-2">อีเมล</h3>
        <p class="text-gray-300 text-base font-[Inter]">info@travelluxury.com</p>
      </div>

      {{-- ที่อยู่ --}}
      <div class="bg-gradient-to-b from-neutral-950 to-neutral-900 border border-yellow-600/20 rounded-3xl shadow-[0_0_25px_rgba(212,175,55,0.15)] hover:shadow-[0_0_35px_rgba(212,175,55,0.25)] transition-all duration-300 p-10 flex flex-col items-center">
        <div class="bg-yellow-600/20 text-yellow-400 p-5 rounded-full mb-5">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
            stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 11.25c1.242 0 2.25-1.008 2.25-2.25S13.242 6.75 12 6.75 9.75 7.758 9.75 9s1.008 2.25 2.25 2.25z" />
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 2.25c4.97 0 9 4.03 9 9 0 7.125-9 10.5-9 10.5S3 18.375 3 11.25c0-4.97 4.03-9 9-9z" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold text-yellow-400 mb-2">ที่อยู่</h3>
        <p class="text-gray-300 text-base font-[Inter]">123 ถนนสุขุมวิท กรุงเทพฯ</p>
      </div>
    </div>

    {{-- 🗺️ แผนที่ --}}
    <div class="mt-20">
      <h2 class="text-2xl text-yellow-400 mb-8 flex items-center justify-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-yellow-500" fill="none" viewBox="0 0 24 24"
          stroke-width="2" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M12 21a9 9 0 100-18 9 9 0 000 18z" />
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M9.75 9.75l-.661 2.643a.75.75 0 00.6.907l1.8.3a.75.75 0 01.59.59l.3 1.8a.75.75 0 00.907.6l2.643-.661" />
        </svg>
        แผนที่ตั้งสำนักงาน
      </h2>

      <div class="rounded-3xl overflow-hidden shadow-[0_0_30px_rgba(212,175,55,0.25)] border border-yellow-600/20">
        <iframe class="w-full h-96 border-0"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.906970818265!2d100.529263!3d13.745005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29ed88f3a5c11%3A0x75b9aaf6c2e891cd!2z4LmA4LiB4Liy4LiH4Lia4LmI4Liy4LiZ4LmA4Liq4Liy4Lij4Li44Lih4LiE4LmJ4Lit4LiB!5e0!3m2!1sth!2sth!4v1619537415985!5m2!1sth!2sth"
          allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </div>
</section>
@endsection
