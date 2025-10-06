@extends('layouts.app')
@section('title', 'จองทัวร์ - ' . $tour['name'])

@section('content')
    <section
        class="relative min-h-screen overflow-x-hidden bg-gradient-to-b from-black via-neutral-900 to-black text-gray-100 pt-28 pb-20">
        {{-- Background Glow Effects --}}
        <div
            class="absolute top-0 left-0 w-[600px] h-[400px] md:h-[600px] bg-gradient-to-br from-yellow-600/30 via-amber-500/20 to-transparent rounded-full blur-3xl animate-pulse">
        </div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-yellow-500/25 via-amber-400/15 to-transparent rounded-full blur-3xl animate-pulse"
            style="animation-delay: 2s;"></div>
        <div
            class="absolute top-1/3 left-1/3 w-[400px] h-[400px] bg-gradient-to-bl from-amber-600/20 to-transparent rounded-full blur-3xl animate-float-slow">
        </div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 md:px-6">
            {{-- Breadcrumb --}}
            <nav class="mb-10 animate-fade-in">
                <div class="flex items-center gap-2 text-sm flex-wrap text-gray-400">
                    <a href="{{ route('home') }}" class="hover:text-yellow-400 transition-colors">หน้าแรก</a>
                    <span class="text-yellow-500/50">›</span>
                    <a href="{{ route('tour.detail', ['id' => $tour['id']]) }}"
                        class="hover:text-yellow-400 transition-colors">รายละเอียดทัวร์</a>
                    <span class="text-yellow-500/50">›</span>
                    <span class="text-yellow-400 font-semibold">จองทัวร์</span>
                </div>
            </nav>

            {{-- Booking Card --}}
            <div
                class="rounded-3xl bg-gradient-to-br from-neutral-900/90 via-neutral-900/70 to-black/90 border border-neutral-800/50 shadow-[0_20px_80px_rgba(0,0,0,0.8)] p-10 lg:p-14 backdrop-blur-sm animate-fade-in">
                {{-- Tour Info --}}
                <div class="text-center mb-10">
                    <h1
                        class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-amber-300 to-yellow-500 mb-4">
                        {{ $tour['name'] }}
                    </h1>
                    <p class="text-gray-400 text-sm mb-2">รหัสทัวร์: <span
                            class="text-yellow-400">{{ $tour['id'] }}</span></p>
                    <p class="text-yellow-300 text-lg font-semibold">ราคาเริ่มต้น {{ number_format($tour['price']) }} บาท
                    </p>
                </div>

                {{-- Form --}}
                <form class="space-y-8">
                    {{-- ชื่อ-นามสกุล --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-yellow-400 tracking-wide">ชื่อ-นามสกุล</label>
                        <div class="relative">
                            <input type="text" placeholder="กรอกชื่อของคุณ"
                                class="w-full bg-neutral-800/70 border border-neutral-700 text-gray-200 placeholder-gray-400 rounded-xl p-4 ps-12 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none transition duration-300 ease-in-out" />
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-yellow-400 opacity-70"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 19.5a8.25 8.25 0 1115 0H4.5z" />
                            </svg>
                        </div>
                    </div>

                    {{-- อีเมล --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-yellow-400 tracking-wide">อีเมล</label>
                        <div class="relative">
                            <input type="email" placeholder="example@email.com"
                                class="w-full bg-neutral-800/70 border border-neutral-700 text-gray-200 placeholder-gray-400 rounded-xl p-4 ps-12 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none transition duration-300 ease-in-out" />
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-yellow-400 opacity-70"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15A2.25 2.25 0 012.25 17.25V6.75A2.25 2.25 0 014.5 4.5h15a2.25 2.25 0 012.25 2.25zm-17.25 0l7.5 6 7.5-6" />
                            </svg>
                        </div>
                    </div>

                    {{-- เบอร์โทร --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-yellow-400 tracking-wide">เบอร์โทรศัพท์</label>
                        <div class="relative">
                            <input type="tel" placeholder="08xxxxxxxx"
                                class="w-full bg-neutral-800/70 border border-neutral-700 text-gray-200 placeholder-gray-400 rounded-xl p-4 ps-12 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none transition duration-300 ease-in-out" />
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-yellow-400 opacity-70"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75C2.25 4.679 3.929 3 6 3h1.5a.75.75 0 01.75.75v2.25a.75.75 0 01-.75.75H6a.75.75 0 00-.75.75v9a.75.75 0 00.75.75h1.5a.75.75 0 01.75.75V21a.75.75 0 01-.75.75H6a3.75 3.75 0 01-3.75-3.75V6.75zm15.75 0A.75.75 0 0118.75 6h1.5a3.75 3.75 0 013.75 3.75v8.25a3.75 3.75 0 01-3.75 3.75h-1.5a.75.75 0 01-.75-.75v-2.25a.75.75 0 01.75-.75h1.5a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-1.5a.75.75 0 01-.75-.75V6.75z" />
                            </svg>
                        </div>
                    </div>

                    {{-- วันที่เดินทาง --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-yellow-400 tracking-wide">วันที่เดินทาง</label>
                        <div class="relative">
                            <input type="date"
                                class="w-full bg-neutral-800/70 border border-neutral-700 text-gray-200 rounded-xl p-4 ps-12 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none transition duration-300 ease-in-out [color-scheme:dark]" />
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-yellow-400 opacity-70"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 6.75v-1.5M15.75 6.75v-1.5M3 9.75h18M4.5 6.75A2.25 2.25 0 016.75 4.5h10.5A2.25 2.25 0 0119.5 6.75v12A2.25 2.25 0 0117.25 21H6.75A2.25 2.25 0 014.5 18.75v-12z" />
                            </svg>
                        </div>
                    </div>

                    {{-- จำนวนผู้เดินทาง --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-yellow-400 tracking-wide">จำนวนผู้เดินทาง</label>
                        <div class="relative">
                            <select
                                class="w-full bg-neutral-800/70 border border-neutral-700 text-gray-300 rounded-xl p-4 ps-12 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none transition duration-300 ease-in-out appearance-none [color-scheme:dark]">
                                <option value="" disabled selected class="text-gray-400">เลือกจำนวน...</option>
                                @for ($i = 1; $i <= 10; $i++)
                                    <option class="text-gray-200">{{ $i }} คน</option>
                                @endfor
                            </select>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-yellow-400 opacity-70 pointer-events-none"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 14.25l3-3m-3 3l-3-3m3 3V6.75m0 7.5V17.25" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-yellow-400 opacity-70 pointer-events-none"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </div>

                    {{-- ปุ่ม --}}
                    <div class="flex flex-col md:flex-row justify-center gap-6 pt-8">
                        <a href="{{ route('tour.detail', ['id' => $tour['id']]) }}"
                            class="flex items-center justify-center gap-3 backdrop-blur-xl bg-neutral-900/70 border border-white/10 text-gray-300 px-10 py-4 rounded-2xl hover:bg-neutral-700/50 hover:text-yellow-300 hover:border-yellow-500/50 transition-all duration-300 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 group-hover:-translate-x-1 transition-transform duration-300"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                            <span class="font-semibold">ย้อนกลับ</span>
                        </a>

                        <button type="button"
                            class="group relative flex items-center justify-center gap-3 bg-gradient-to-r from-yellow-600 via-yellow-500 to-amber-600 text-black font-bold px-10 py-4 rounded-2xl shadow-[0_0_30px_rgba(212,175,55,0.5)] hover:shadow-[0_0_50px_rgba(212,175,55,0.8)] transition-all duration-300 uppercase tracking-widest overflow-hidden">
                            <span
                                class="absolute inset-0 bg-gradient-to-r from-amber-500 to-yellow-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 relative z-10" fill="none"
                                viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="relative z-10">ส่งคำขอจอง</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
