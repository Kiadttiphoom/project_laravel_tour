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
                {{-- Form --}}
                <form class="space-y-8">
                    {{-- input group --}}
                    @php
                        $inputClass = 'w-full bg-neutral-900/80 border border-neutral-700 text-gray-200 placeholder-gray-400 
        rounded-xl p-4 ps-12 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none 
        transition duration-300 ease-in-out shadow-[0_0_15px_rgba(0,0,0,0.4)]';
                    @endphp

                    {{-- ชื่อ-นามสกุล --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-yellow-400">ชื่อ-นามสกุล</label>
                        <input type="text" placeholder="กรอกชื่อของคุณ" class="{{ $inputClass }}">
                    </div>

                    {{-- อีเมล --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-yellow-400">อีเมล</label>
                        <input type="email" placeholder="example@email.com" class="{{ $inputClass }}">
                    </div>

                    {{-- เบอร์โทร --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-yellow-400">เบอร์โทรศัพท์</label>
                        <input type="tel" placeholder="08xxxxxxxx" class="{{ $inputClass }}">
                    </div>

                    {{-- วันที่เดินทาง --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-yellow-400">วันที่เดินทาง</label>
                        <input type="date" class="{{ $inputClass }} [color-scheme:dark]">
                    </div>

                    {{-- จำนวนผู้เดินทาง --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-yellow-400">จำนวนผู้เดินทาง</label>
                        <select class="{{ $inputClass }} appearance-none [color-scheme:dark]">
                            <option value="" disabled selected class="text-gray-400">เลือกจำนวน...</option>
                            @for ($i = 1; $i <= 10; $i++)
                                <option class="text-gray-200 bg-neutral-900">{{ $i }} คน</option>
                            @endfor
                        </select>
                    </div>

                    {{-- ปุ่ม --}}
                    <div class="flex flex-col md:flex-row justify-center gap-6 pt-8">
                        <x-button text="ย้อนกลับ" icon="back" variant="secondary"
                            href="{{ route('tour.detail', ['id' => $tour['id']]) }}" />
                        <x-button text="ส่งคำขอจอง" icon="check" variant="primary" />

                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection
