{{-- resources/views/booking/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Pemesanan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-8">
                    <div class="mb-8 flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-semibold text-gray-900">Pesan Fotografer</h3>
                            <p class="text-gray-600 mt-1">Ikuti langkah-langkah berikut untuk menjadwalkan sesi fotografi Anda</p>
                        </div>
                        <a href="{{ route('booking.dashboard_booking') }}" class="text-blue-600 hover:text-white hover:bg-blue-600 font-medium no-underline flex items-center gap-2 px-4 py-2 border border-blue-600 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            <span>Kembali ke Pemesanan</span>
                        </a>
                    </div>

                    @if(session('error'))
                        <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif

                    <form id="bookingForm" action="{{ route('booking.store') }}" method="POST" class="space-y-8">
                        @csrf
                        
                        <!-- Step Progress Bar -->
                        <div class="w-full py-6">
                            <div class="flex items-center">
                                <div class="w-1/4 text-center relative">
                                    <div id="step1Indicator" class="w-12 h-12 mx-auto bg-blue-600 rounded-full text-lg text-white flex items-center justify-center z-10 shadow-md">
                                        <span>1</span>
                                    </div>
                                    <div class="text-center text-sm font-medium mt-2 text-blue-600">Fotografer</div>
                                </div>

                                <div class="w-1/4 text-center relative">
                                    <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 3rem); top: 24px; transform: translate(-50%, -50%)">
                                        <div class="w-full bg-gray-200 rounded-full h-1">
                                            <div id="line1" class="w-0 bg-blue-600 h-1 rounded-full transition-all duration-500"></div>
                                        </div>
                                    </div>
                                    
                                    <div id="step2Indicator" class="w-12 h-12 mx-auto bg-gray-200 rounded-full text-lg text-white flex items-center justify-center z-10 relative">
                                        <span class="text-gray-600">2</span>
                                    </div>
                                    <div class="text-center text-sm font-medium mt-2 text-gray-600">Tanggal & Waktu</div>
                                </div>

                                <div class="w-1/4 text-center relative">
                                    <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 3rem); top: 24px; transform: translate(-50%, -50%)">
                                        <div class="w-full bg-gray-200 rounded-full h-1">
                                            <div id="line2" class="w-0 bg-blue-600 h-1 rounded-full transition-all duration-500"></div>
                                        </div>
                                    </div>
                                    
                                    <div id="step3Indicator" class="w-12 h-12 mx-auto bg-gray-200 rounded-full text-lg text-white flex items-center justify-center z-10 relative">
                                        <span class="text-gray-600">3</span>
                                    </div>
                                    <div class="text-center text-sm font-medium mt-2 text-gray-600">Kategori</div>
                                </div>

                                <div class="w-1/4 text-center relative">
                                    <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 3rem); top: 24px; transform: translate(-50%, -50%)">
                                        <div class="w-full bg-gray-200 rounded-full h-1">
                                            <div id="line3" class="w-0 bg-blue-600 h-1 rounded-full transition-all duration-500"></div>
                                        </div>
                                    </div>
                                    
                                    <div id="step4Indicator" class="w-12 h-12 mx-auto bg-gray-200 rounded-full text-lg text-white flex items-center justify-center z-10 relative">
                                        <span class="text-gray-600">4</span>
                                    </div>
                                    <div class="text-center text-sm font-medium mt-2 text-gray-600">Catatan</div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 1: Select Photographer -->
                        <div id="step1" class="booking-step transition-opacity duration-300">
                            <div class="mb-6 border-b pb-4">
                                <h3 class="text-xl font-semibold text-gray-900">Pilih Fotografer</h3>
                                <p class="text-gray-600 mt-1">Pilih profesional yang akan mengabadikan momen Anda</p>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($photographers as $photographer)
                                <div class="border border-gray-200 rounded-lg p-5 photographer-card cursor-pointer hover:border-blue-500 hover:shadow-lg transition-all duration-200" data-id="{{ $photographer->id }}">
                                    <div class="flex items-center space-x-4">
                                        <div>
                                            <h4 class="font-semibold text-lg text-gray-900">{{ $photographer->name }}</h4>
                                            <p class="text-sm text-blue-600 font-medium">{{ $photographer->role }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-sm text-gray-600 space-y-1">
                                        <p class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            {{ $photographer->email }}
                                        </p>
                                    </div>
                                    <div class="absolute top-3 right-3 hidden photographer-check text-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <input type="hidden" name="photographer_id" id="photographer_id" value="">
                            
                            <div class="mt-8 flex justify-end">
                                <button type="button" id="step1Next" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                    Langkah Berikutnya
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Choose Date and Time -->
                        <div id="step2" class="booking-step hidden transition-opacity duration-300">
                            <div class="mb-6 border-b pb-4">
                                <h3 class="text-xl font-semibold text-gray-900">Pilih Tanggal dan Waktu</h3>
                                <p class="text-gray-600 mt-1">Tentukan kapan sesi fotografi Anda akan berlangsung</p>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="bg-white rounded-lg border border-gray-200 p-5 shadow-sm">
                                    <label for="booking_date" class="block text-sm font-medium text-gray-700 mb-2">Pilih Tanggal</label>
                                    <input type="date" name="booking_date" id="booking_date" min="{{ date('Y-m-d') }}" 
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                                        <p class="text-xs text-gray-500 mt-2">Pilih tanggal untuk melihat ketersediaan waktu</p>
                                </div>
                                
                                <div id="timeSlotContainer" class="hidden bg-white rounded-lg border border-gray-200 p-5 shadow-sm">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Slot Waktu</label>
                                    <p class="text-xs text-gray-500 mb-4">Setiap slot berdurasi 1 jam. Anda dapat memilih beberapa slot.</p>
                                    
                                    <div class="grid grid-cols-2 gap-3" id="timeSlots">
                                        @foreach($timeSlots as $slot)
                                        <div class="relative">
                                            <input type="checkbox" name="time_slots[]" id="time_{{ $slot['value'] }}" value="{{ $slot['value'] }}" 
                                                class="hidden time-slot-input">
                                            <label for="time_{{ $slot['value'] }}" 
                                                class="block border border-gray-200 rounded-md py-3 text-center cursor-pointer time-slot-label transition-colors hover:bg-gray-50">
                                                {{ $slot['label'] }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-8 flex justify-between">
                                <button type="button" id="step2Prev" class="px-6 py-3 border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-offset-2 transition-colors">
                                    Kembali
                                </button>
                                <button type="button" id="step2Next" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                    Langkah Berikutnya
                                </button>
                            </div>
                        </div>

                        <!-- Step 3: Select Category -->
                        <div id="step3" class="booking-step hidden transition-opacity duration-300">
                            <div class="mb-6 border-b pb-4">
                                <h3 class="text-xl font-semibold text-gray-900">Pilih Kategori</h3>
                                <p class="text-gray-600 mt-1">Tentukan jenis sesi fotografi yang Anda butuhkan</p>
                            </div>
                            
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                                @foreach($categories as $category)
                                <div class="relative">
                                    <input type="radio" name="category" id="category_{{ Str::slug($category) }}" value="{{ $category }}" class="hidden category-input">
                                    <label for="category_{{ Str::slug($category) }}" class="block border border-gray-200 rounded-md py-4 px-3 text-center cursor-pointer category-label transition-all hover:shadow-sm hover:border-blue-500">
                                        {{ $category }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            
                            <div class="mt-8 flex justify-between">
                                <button type="button" id="step3Prev" class="px-6 py-3 border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-offset-2 transition-colors">
                                    Kembali
                                </button>
                                <button type="button" id="step3Next" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                    Langkah Berikutnya
                                </button>
                            </div>
                        </div>

                        <!-- Step 4: Additional Notes -->
                        <div id="step4" class="booking-step hidden transition-opacity duration-300">
                            <div class="mb-6 border-b pb-4">
                                <h3 class="text-xl font-semibold text-gray-900">Catatan Tambahan</h3>
                                <p class="text-gray-600 mt-1">Berikan detail atau permintaan khusus untuk sesi Anda</p>
                            </div>
                            
                            <div class="bg-white rounded-lg border border-gray-200 p-5 shadow-sm">
                                <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Catatan (Opsional)</label>
                                <textarea name="notes" id="notes" rows="5" placeholder="Tulis catatan atau permintaan khusus di sini..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors px-4 py-2"></textarea>
                            </div>
                            
                            <div class="mt-8 flex justify-between">
                                <button type="button" id="step4Prev" class="px-6 py-3 border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-offset-2 transition-colors">
                                    Kembali
                                </button>
                                <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors">
                                    Selesaikan Pemesanan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Step 1: Photographer Selection
            const photographerCards = document.querySelectorAll('.photographer-card');
            const photographerId = document.getElementById('photographer_id');
            const step1Next = document.getElementById('step1Next');
            const photographerChecks = document.querySelectorAll('.photographer-check');
            
            photographerCards.forEach((card, index) => {
                card.addEventListener('click', function() {
                    // Remove active class from all cards
                    photographerCards.forEach((c, i) => {
                        c.classList.remove('border-blue-500', 'bg-blue-50');
                        photographerChecks[i].classList.add('hidden');
                    });
                    
                    // Add active class to selected card
                    this.classList.add('border-blue-500', 'bg-blue-50');
                    photographerChecks[index].classList.remove('hidden');
                    
                    // Set photographer id
                    photographerId.value = this.dataset.id;
                    
                    // Enable next button
                    step1Next.disabled = false;
                });
            });
            
            // Step 2: Date and Time Selection
            const bookingDate = document.getElementById('booking_date');
            const timeSlotContainer = document.getElementById('timeSlotContainer');
            const timeSlotInputs = document.querySelectorAll('.time-slot-input');
            const timeSlotLabels = document.querySelectorAll('.time-slot-label');
            const step2Next = document.getElementById('step2Next');
            
            bookingDate.addEventListener('change', function() {
                if (this.value) {
                    // Show time slots container with animation
                    timeSlotContainer.classList.remove('hidden');
                    setTimeout(() => {
                        timeSlotContainer.classList.add('opacity-100');
                    }, 10);
                    
                    // Reset time slots
                    timeSlotInputs.forEach((input, index) => {
                        input.checked = false;
                        timeSlotLabels[index].classList.remove('bg-blue-100', 'border-blue-500');
                    });
                    
                    // Check availability for the selected date and photographer
                    checkAvailability(photographerId.value, this.value);
                } else {
                    timeSlotContainer.classList.add('hidden');
                }
            });
            
            // Time slot selection
            timeSlotInputs.forEach((input, index) => {
                input.addEventListener('change', function() {
                    if (this.checked) {
                        timeSlotLabels[index].classList.add('bg-blue-100', 'border-blue-500');
                    } else {
                        timeSlotLabels[index].classList.remove('bg-blue-100', 'border-blue-500');
                    }
                    
                    // Enable next button if at least one time slot is selected
                    const selectedSlots = document.querySelectorAll('.time-slot-input:checked');
                    step2Next.disabled = selectedSlots.length === 0;
                });
            });
            
            // Step 3: Category Selection
            const categoryInputs = document.querySelectorAll('.category-input');
            const categoryLabels = document.querySelectorAll('.category-label');
            const step3Next = document.getElementById('step3Next');
            
            categoryInputs.forEach((input, index) => {
                input.addEventListener('change', function() {
                    // Update label styles for all categories
                    categoryLabels.forEach((label, i) => {
                        if (categoryInputs[i].checked) {
                            label.classList.add('bg-blue-100', 'border-blue-500', 'shadow-sm');
                        } else {
                            label.classList.remove('bg-blue-100', 'border-blue-500', 'shadow-sm');
                        }
                    });
                    
                    // Enable next button
                    step3Next.disabled = false;
                });
            });
            
            // Navigation between steps
            const steps = ['step1', 'step2', 'step3', 'step4'];
            const indicators = ['step1Indicator', 'step2Indicator', 'step3Indicator', 'step4Indicator'];
            const lines = ['line1', 'line2', 'line3'];
            
            // Next buttons
            step1Next.addEventListener('click', () => navigateToStep(1));
            step2Next.addEventListener('click', () => navigateToStep(2));
            step3Next.addEventListener('click', () => navigateToStep(3));
            
            // Previous buttons
            document.getElementById('step2Prev').addEventListener('click', () => navigateToStep(0));
            document.getElementById('step3Prev').addEventListener('click', () => navigateToStep(1));
            document.getElementById('step4Prev').addEventListener('click', () => navigateToStep(2));
            
            function navigateToStep(index) {
                // Hide all steps with fade effect
                document.querySelectorAll('.booking-step').forEach(step => {
                    step.classList.add('opacity-0');
                    setTimeout(() => {
                        step.classList.add('hidden');
                    }, 300);
                });
                
                // Show selected step with fade in effect
                setTimeout(() => {
                    document.getElementById(steps[index]).classList.remove('hidden');
                    setTimeout(() => {
                        document.getElementById(steps[index]).classList.remove('opacity-0');
                    }, 10);
                }, 300);
                
                // Update indicators and progress lines
                indicators.forEach((indicator, i) => {
                    const element = document.getElementById(indicator);
                    if (i <= index) {
                        element.classList.remove('bg-gray-200');
                        element.classList.add('bg-blue-600');
                        element.querySelector('span').classList.remove('text-gray-600');
                        element.querySelector('span').classList.add('text-white');
                    } else {
                        element.classList.remove('bg-blue-600');
                        element.classList.add('bg-gray-200');
                        element.querySelector('span').classList.remove('text-white');
                        element.querySelector('span').classList.add('text-gray-600');
                    }
                });

                lines.forEach((line, i) => {
                    const element = document.getElementById(line);
                    if (i < index) {
                        element.style.width = '100%';
                    } else {
                        element.style.width = '0%';
                    }
                });
            }
            
            // Function to check availability
            async function checkAvailability(photographerId, date) {
                try {
                    const response = await fetch('{{ route("booking.check-availability") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            photographer_id: photographerId,
                            date: date
                        })
                    });
                    
                    if (!response.ok) {
                        throw new Error('Respons jaringan tidak berhasil');
                    }
                    
                    const data = await response.json();
                    
                    // Mark booked slots as unavailable
                    timeSlotInputs.forEach((input, index) => {
                        const hour = parseInt(input.value);
                        if (data.booked_slots.includes(hour)) {
                            input.disabled = true;
                            timeSlotLabels[index].classList.add('bg-gray-100', 'text-gray-400', 'cursor-not-allowed');
                            timeSlotLabels[index].classList.remove('cursor-pointer', 'hover:bg-gray-50');
                            timeSlotLabels[index].innerHTML = timeSlotLabels[index].innerHTML + ' <span class="text-xs">(Tidak Tersedia)</span>';
                        } else {
                            input.disabled = false;
                            timeSlotLabels[index].classList.remove('bg-gray-100', 'text-gray-400', 'cursor-not-allowed');
                            timeSlotLabels[index].classList.add('cursor-pointer', 'hover:bg-gray-50');
                        }
                    });
                } catch (error) {
                    console.error('Error memeriksa ketersediaan:', error);
                }
            }
        });
    </script>
</x-app-layout>