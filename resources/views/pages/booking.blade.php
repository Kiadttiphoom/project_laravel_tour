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
                <form class="space-y-8" id="bookingForm">

                    {{-- ชื่อ-นามสกุล --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-yellow-400">ชื่อ-นามสกุล</label>
                        <div class="relative">
                            <input type="text" name="fullname" placeholder="กรอกชื่อของคุณ"
                                class="w-full bg-neutral-900/80 border border-neutral-700 text-gray-200 placeholder-gray-400 
rounded-xl p-4 ps-12 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none 
transition duration-300 ease-in-out shadow-[0_0_15px_rgba(0,0,0,0.4)] leading-none h-[52px]">
                        </div>
                    </div>

                    {{-- อีเมล --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-yellow-400">อีเมล</label>
                        <div class="relative">

                            <input type="email" name="email" placeholder="example@email.com"
                                class="w-full bg-neutral-900/80 border border-neutral-700 text-gray-200 placeholder-gray-400 
rounded-xl p-4 ps-12 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none 
transition duration-300 ease-in-out shadow-[0_0_15px_rgba(0,0,0,0.4)] leading-none h-[52px]">
                        </div>
                    </div>

                    {{-- เบอร์โทร --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-yellow-400">เบอร์โทรศัพท์</label>
                        <div class="relative">
                            <input type="tel" name="phone" placeholder="08xxxxxxxx"
                                class="w-full bg-neutral-900/80 border border-neutral-700 text-gray-200 placeholder-gray-400 
rounded-xl p-4 ps-12 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none 
transition duration-300 ease-in-out shadow-[0_0_15px_rgba(0,0,0,0.4)] leading-none h-[52px]">
                        </div>
                    </div>

                    {{-- วันที่เดินทาง --}}
                    <div class="space-y-2 relative">
                        <label class="block text-sm font-semibold text-yellow-400">วันที่เดินทาง</label>
                        <div class="relative">
                            <input type="text" id="dateInput" name="travel_date" readonly
                                placeholder="เลือกวันที่เดินทาง"
                                class="w-full bg-neutral-900/80 border border-neutral-700 text-gray-200 placeholder-gray-400 
rounded-xl p-4 ps-12 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none 
transition duration-300 ease-in-out shadow-[0_0_15px_rgba(0,0,0,0.4)] leading-none h-[52px] cursor-pointer hover:border-yellow-500/50">
                        </div>

                        {{-- Custom Calendar Dropdown --}}
                        <div id="calendarDropdown"
                            class="hidden absolute z-50 mt-2 bg-neutral-900 border border-neutral-700 rounded-2xl shadow-2xl p-3 w-[280px] sm:w-[320px] left-1/2 -translate-x-1/2">
                            {{-- Calendar Header --}}
                            <div class="flex items-center justify-between mb-4">
                                <button type="button" id="prevMonth"
                                    class="p-2 hover:bg-neutral-800 rounded-lg transition-colors">
                                    <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <h3 id="currentMonth" class="text-lg font-semibold text-yellow-400"></h3>
                                <button type="button" id="nextMonth"
                                    class="p-2 hover:bg-neutral-800 rounded-lg transition-colors">
                                    <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>

                            {{-- Calendar Grid --}}
                            <div style="display: grid; grid-template-columns: repeat(7, minmax(0, 1fr)); gap: 4px;"
                                class="mb-2">
                                <div class="text-center text-xs font-semibold text-gray-400 py-2">อา</div>
                                <div class="text-center text-xs font-semibold text-gray-400 py-2">จ</div>
                                <div class="text-center text-xs font-semibold text-gray-400 py-2">อ</div>
                                <div class="text-center text-xs font-semibold text-gray-400 py-2">พ</div>
                                <div class="text-center text-xs font-semibold text-gray-400 py-2">พฤ</div>
                                <div class="text-center text-xs font-semibold text-gray-400 py-2">ศ</div>
                                <div class="text-center text-xs font-semibold text-gray-400 py-2">ส</div>
                            </div>
                            <div id="calendarDays"
                                style="display: grid; grid-template-columns: repeat(7, minmax(0, 1fr)); gap: 4px;"></div>
                        </div>
                    </div>

                    {{-- จำนวนผู้เดินทาง --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-yellow-400">จำนวนผู้เดินทาง</label>
                        <div class="relative">
                            <select name="travelers"
                                class="w-full bg-neutral-900/80 border border-neutral-700 text-gray-200 placeholder-gray-400 
rounded-xl p-4 ps-12 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 outline-none 
transition duration-300 ease-in-out shadow-[0_0_15px_rgba(0,0,0,0.4)] leading-none h-[52px] appearance-none cursor-pointer hover:border-yellow-500/50">
                                <option value="" disabled selected class="text-gray-400">เลือกจำนวน...</option>
                                @for ($i = 1; $i <= 10; $i++)
                                    <option class="text-gray-200 bg-neutral-900">{{ $i }} คน</option>
                                @endfor
                            </select>
                        </div>
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

    {{-- Calendar JavaScript --}}
    <script>
        const thaiMonths = [
            'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน',
            'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
        ];

        let currentDate = new Date();
        let selectedDate = null;

        const dateInput = document.getElementById('dateInput');
        const calendarDropdown = document.getElementById('calendarDropdown');
        const currentMonthEl = document.getElementById('currentMonth');
        const calendarDays = document.getElementById('calendarDays');
        const prevMonthBtn = document.getElementById('prevMonth');
        const nextMonthBtn = document.getElementById('nextMonth');

        // Toggle calendar
        dateInput.addEventListener('click', (e) => {
            e.stopPropagation();
            calendarDropdown.classList.toggle('hidden');
            if (!calendarDropdown.classList.contains('hidden')) {
                renderCalendar();
            }
        });

        // Close calendar when clicking outside
        document.addEventListener('click', (e) => {
            if (!calendarDropdown.contains(e.target) && e.target !== dateInput) {
                calendarDropdown.classList.add('hidden');
            }
        });

        // Month navigation
        prevMonthBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });

        nextMonthBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });

        function renderCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();

            // Update header
            currentMonthEl.textContent = `${thaiMonths[month]} ${year + 543}`;

            // Get first day of month and number of days
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            // Clear previous days
            calendarDays.innerHTML = '';

            // Add empty cells for days before month starts
            for (let i = 0; i < firstDay; i++) {
                const emptyCell = document.createElement('div');
                calendarDays.appendChild(emptyCell);
            }

            // Add day cells
            for (let day = 1; day <= daysInMonth; day++) {
                const dayCell = document.createElement('button');
                dayCell.type = 'button';
                dayCell.textContent = day;
                dayCell.style.cssText =
                    'aspect-ratio: 1; display: flex; align-items: center; justify-content: center; min-height: 40px;';
                dayCell.className = 'text-sm rounded-lg transition-all duration-200';

                const cellDate = new Date(year, month, day);
                cellDate.setHours(0, 0, 0, 0);

                const isPast = cellDate < today;
                const isToday = cellDate.getTime() === today.getTime();
                const isSelected = selectedDate && cellDate.getTime() === selectedDate.getTime();

                if (isPast) {
                    dayCell.className += ' text-gray-600 cursor-not-allowed';
                    dayCell.disabled = true;
                } else if (isSelected) {
                    dayCell.className += ' bg-yellow-500 text-black font-bold hover:bg-yellow-400';
                } else if (isToday) {
                    dayCell.className += ' bg-yellow-500/20 text-yellow-400 font-semibold hover:bg-yellow-500/30';
                } else {
                    dayCell.className += ' text-gray-200 hover:bg-neutral-800 hover:text-yellow-400';
                }

                if (!isPast) {
                    dayCell.addEventListener('click', (e) => {
                        e.stopPropagation();
                        selectDate(cellDate);
                    });
                }

                calendarDays.appendChild(dayCell);
            }
        }

        function selectDate(date) {
            selectedDate = date;

            // Format date as Thai format
            const day = date.getDate();
            const month = thaiMonths[date.getMonth()];
            const year = date.getFullYear() + 543;

            dateInput.value = `${day} ${month} ${year}`;

            // Close calendar
            calendarDropdown.classList.add('hidden');

            // Re-render to show selected date
            renderCalendar();
        }

        // Initialize calendar on page load
        renderCalendar();
    </script>
@endsection
