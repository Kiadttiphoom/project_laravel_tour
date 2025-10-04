@extends('layouts.app')
@section('title', 'หน้าแรก - Travel Luxury')

@section('content')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

<section class="relative w-full min-h-screen bg-gradient-to-b from-black via-neutral-900 to-black text-gray-100 py-20 overflow-hidden">
  {{-- แสงสะท้อนทอง --}}
  <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-gradient-to-br from-yellow-600/30 via-amber-500/10 to-transparent rounded-full blur-3xl opacity-30"></div>
  <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-gradient-to-tr from-yellow-500/20 via-amber-400/10 to-transparent rounded-full blur-3xl opacity-30"></div>

  {{-- หัวข้อ --}}
  <div class="text-center mb-16 relative z-10">
    <h1 class="text-4xl md:text-5xl font-[Playfair_Display] font-bold text-yellow-400 mb-3 tracking-wide flex justify-center items-center gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke-width="2"
           stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M8.25 21h7.5m-3.75-3v3m4.5-3H8.25m8.25 0a4.5 4.5 0 004.5-4.5V6.75a.75.75 0 00-.75-.75H4.5a.75.75 0 00-.75.75V13.5A4.5 4.5 0 008.25 18h8.25z" />
      </svg>
      แพ็กเกจทัวร์สุดหรู
    </h1>
    <p class="text-gray-400 text-lg max-w-2xl mx-auto font-[Inter]">
      เดินทางอย่างเหนือระดับ สัมผัสความหรูหราในทุกเส้นทางทั่วโลกกับ Travel Luxury
    </p>
  </div>

  {{-- กริดรายการทัวร์ --}}
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 px-8 md:px-16 relative z-10">
    @foreach($tours as $tour)
      <div class="group bg-gradient-to-b from-neutral-900 to-black border border-neutral-800 rounded-3xl overflow-hidden shadow-[0_0_25px_rgba(212,175,55,0.2)] hover:shadow-[0_0_40px_rgba(212,175,55,0.3)] transition-all duration-500 flex flex-col">
        {{-- รูปภาพ --}}
        <div class="relative overflow-hidden">
          <img src="{{ asset($tour['image']) }}" alt="{{ $tour['name'] }}"
               class="w-full h-60 object-cover transition-all duration-700 group-hover:scale-110 group-hover:brightness-110" />
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
        </div>

        {{-- เนื้อหา --}}
        <div class="p-7 flex flex-col justify-between flex-grow">
          <div>
            <h3 class="text-2xl font-[Playfair_Display] text-yellow-400 mb-3 flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke-width="2"
                   stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 11.25c1.242 0 2.25-1.008 2.25-2.25S13.242 6.75 12 6.75 9.75 7.758 9.75 9s1.008 2.25 2.25 2.25z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 2.25c4.97 0 9 4.03 9 9 0 7.125-9 10.5-9 10.5S3 18.375 3 11.25c0-4.97 4.03-9 9-9z" />
              </svg>
              {{ $tour['name'] }}
            </h3>
            <p class="text-gray-400 text-sm mb-5 leading-relaxed line-clamp-3 font-[Inter]">
              {{ $tour['description'] }}
            </p>
          </div>

          {{-- ราคา + ปุ่ม --}}
          <div class="mt-auto">
            <div class="flex items-center justify-between mb-6">
              <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8c-1.657 0-3 1.343-3 3m3-3c1.657 0 3 1.343 3 3m-3 3v4m0-10V5m0 10c-1.657 0-3 1.343-3 3m3-3c1.657 0 3 1.343 3 3" />
                </svg>
                <p class="text-xl font-bold text-yellow-400 font-[Inter]">
                  {{ number_format($tour['price'], 0) }}
                  <span class="text-sm text-gray-400 font-normal">บาท</span>
                </p>
              </div>
            </div>

            {{-- ปุ่มดูรายละเอียด --}}
            <a href="{{ route('tour.detail', $tour['id']) }}"
               class="flex items-center justify-center gap-3 bg-gradient-to-r from-yellow-700 to-yellow-500 text-black font-semibold py-3 rounded-full shadow-[0_0_20px_rgba(212,175,55,0.4)] hover:shadow-[0_0_35px_rgba(212,175,55,0.7)] hover:scale-[1.03] transition-all duration-300 uppercase tracking-wide">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                   stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 3.75L19.5 12l-8.25 8.25M4.5 12h15" />
              </svg>
              ดูรายละเอียด
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>
@endsection
