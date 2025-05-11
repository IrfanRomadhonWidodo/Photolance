{{-- resources/views/booking/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-medium text-gray-900">Book a Photographer</h3>
                            <a href="{{ route('booking.dashboard_booking') }}" class="text-blue-500 hover:underline">Back to Bookings</a>
                        </div>
                        <p class="text-gray-600">Please follow the steps below to book a photographer.</p>
                    </div>

                    @if(session('error'))
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form id="bookingForm" action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Step Progress Bar -->
                        <div class="w-full py-6">
                            <div class="flex">
                                <div class="w-1/4">
                                    <div class="relative mb-2">
                                        <div id="step1Indicator" class="w-10 h-10 mx-auto bg-blue-500 rounded-full text-lg text-white flex items-center justify-center">
                                            <span>1</span>
                                        </div>
                                    </div>
                                    <div class="text-center text-xs">Photographer</div>
                                </div>

                                <div class="w-1/4">
                                    <div class="relative mb-2">
                                        <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem); top: 50%; transform: translate(-50%, -50%)">
                                            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                                <div id="line1" class="w-0 bg-blue-300 py-1 rounded transition-all duration-500"></div>
                                            </div>
                                        </div>
                                        
                                        <div id="step2Indicator" class="w-10 h-10 mx-auto bg-gray-200 rounded-full text-lg text-white flex items-center justify-center">
                                            <span class="text-gray-600">2</span>
                                        </div>
                                    </div>
                                    <div class="text-center text-xs">Date & Time</div>
                                </div>

                                <div class="w-1/4">
                                    <div class="relative mb-2">
                                        <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem); top: 50%; transform: translate(-50%, -50%)">
                                            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                                <div id="line2" class="w-0 bg-blue-300 py-1 rounded transition-all duration-500"></div>
                                            </div>
                                        </div>
                                        
                                        <div id="step3Indicator" class="w-10 h-10 mx-auto bg-gray-200 rounded-full text-lg text-white flex items-center justify-center">
                                            <span class="text-gray-600">3</span>
                                        </div>
                                    </div>
                                    <div class="text-center text-xs">Category</div>
                                </div>

                                <div class="w-1/4">
                                    <div class="relative mb-2">
                                        <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem); top: 50%; transform: translate(-50%, -50%)">
                                            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                                <div id="line3" class="w-0 bg-blue-300 py-1 rounded transition-all duration-500"></div>
                                            </div>
                                        </div>
                                        
                                        <div id="step4Indicator" class="w-10 h-10 mx-auto bg-gray-200 rounded-full text-lg text-white flex items-center justify-center">
                                            <span class="text-gray-600">4</span>
                                        </div>
                                    </div>
                                    <div class="text-center text-xs">Notes</div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 1: Select Photographer -->
                        <div id="step1" class="booking-step">
                            <div class="mb-4">
                                <h3 class="text-lg font-medium mb-2">Step 1: Select a Photographer</h3>
                                <p class="text-sm text-gray-600">Choose a photographer for your session.</p>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($photographers as $photographer)
                                <div class="border rounded-lg p-4 photographer-card cursor-pointer hover:bg-gray-50" data-id="{{ $photographer->id }}">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-16 h-16 rounded-full bg-gray-300 flex items-center justify-center text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-medium">{{ $photographer->name }}</h4>
                                            <p class="text-sm text-gray-600">{{ $photographer->role }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-2 text-sm">
                                        <p>{{ $photographer->email }}</p>
                                        <p>{{ $photographer->phone }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <input type="hidden" name="photographer_id" id="photographer_id" value="">
                            
                            <div class="mt-6 flex justify-end">
                                <button type="button" id="step1Next" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                    Next Step
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Choose Date and Time -->
                        <div id="step2" class="booking-step hidden">
                            <div class="mb-4">
                                <h3 class="text-lg font-medium mb-2">Step 2: Choose Date and Time</h3>
                                <p class="text-sm text-gray-600">Select a date and time slots for your session.</p>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="booking_date" class="block text-sm font-medium text-gray-700 mb-2">Select Date</label>
                                    <input type="date" name="booking_date" id="booking_date" min="{{ date('Y-m-d') }}" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                
                                <div id="timeSlotContainer" class="hidden">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Select Time Slots</label>
                                    <p class="text-xs text-gray-500 mb-2">Each slot is 1 hour. You can select multiple slots.</p>
                                    
                                    <div class="grid grid-cols-2 gap-2" id="timeSlots">
                                        @foreach($timeSlots as $slot)
                                        <div class="relative">
                                            <input type="checkbox" name="time_slots[]" id="time_{{ $slot['value'] }}" value="{{ $slot['value'] }}" 
                                                class="hidden time-slot-input">
                                            <label for="time_{{ $slot['value'] }}" 
                                                class="block border rounded-md px-4 py-2 text-center cursor-pointer time-slot-label">
                                                {{ $slot['label'] }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6 flex justify-between">
                                <button type="button" id="step2Prev" class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50">
                                    Previous Step
                                </button>
                                <button type="button" id="step2Next" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                    Next Step
                                </button>
                            </div>
                        </div>

                        <!-- Step 3: Select Category -->
                        <div id="step3" class="booking-step hidden">
                            <div class="mb-4">
                                <h3 class="text-lg font-medium mb-2">Step 3: Select Category</h3>
                                <p class="text-sm text-gray-600">Choose the type of photography session you need.</p>
                            </div>
                            
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
                                @foreach($categories as $category)
                                <div class="relative">
                                    <input type="radio" name="category" id="category_{{ Str::slug($category) }}" value="{{ $category }}" class="hidden category-input">
                                    <label for="category_{{ Str::slug($category) }}" class="block border rounded-md px-4 py-3 text-center cursor-pointer category-label">
                                        {{ $category }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            
                            <div class="mt-6 flex justify-between">
                                <button type="button" id="step3Prev" class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50">
                                    Previous Step
                                </button>
                                <button type="button" id="step3Next" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                    Next Step
                                </button>
                            </div>
                        </div>

                        <!-- Step 4: Additional Notes -->
                        <div id="step4" class="booking-step hidden">
                            <div class="mb-4">
                                <h3 class="text-lg font-medium mb-2">Step 4: Additional Notes</h3>
                                <p class="text-sm text-gray-600">Please provide any additional details or special requests.</p>
                            </div>
                            
                            <div>
                                <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes (Optional)</label>
                                <textarea name="notes" id="notes" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                            </div>
                            
                            <div class="mt-6 flex justify-between">
                                <button type="button" id="step4Prev" class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50">
                                    Previous Step
                                </button>
                                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                                    Complete Booking
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
            
            photographerCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Remove active class from all cards
                    photographerCards.forEach(c => c.classList.remove('border-blue-500', 'bg-blue-50'));
                    
                    // Add active class to selected card
                    this.classList.add('border-blue-500', 'bg-blue-50');
                    
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
                    // Show time slots container
                    timeSlotContainer.classList.remove('hidden');
                    
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
                            label.classList.add('bg-blue-100', 'border-blue-500');
                        } else {
                            label.classList.remove('bg-blue-100', 'border-blue-500');
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
                // Hide all steps
                steps.forEach(step => document.getElementById(step).classList.add('hidden'));
                
                // Show selected step
                document.getElementById(steps[index]).classList.remove('hidden');
                
                // Update indicators and progress lines
                indicators.forEach((indicator, i) => {
                    const element = document.getElementById(indicator);
                    if (i <= index) {
                        element.classList.remove('bg-gray-200');
                        element.classList.add('bg-blue-500');
                        element.querySelector('span').classList.remove('text-gray-600');
                        element.querySelector('span').classList.add('text-white');
                    } else {
                        element.classList.remove('bg-blue-500');
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
                        throw new Error('Network response was not ok');
                    }
                    
                    const data = await response.json();
                    
                    // Mark booked slots as unavailable
                    timeSlotInputs.forEach((input, index) => {
                        const hour = parseInt(input.value);
                        if (data.booked_slots.includes(hour)) {
                            input.disabled = true;
                            timeSlotLabels[index].classList.add('bg-gray-100', 'text-gray-400', 'cursor-not-allowed');
                            timeSlotLabels[index].classList.remove('cursor-pointer');
                        } else {
                            input.disabled = false;
                            timeSlotLabels[index].classList.remove('bg-gray-100', 'text-gray-400', 'cursor-not-allowed');
                            timeSlotLabels[index].classList.add('cursor-pointer');
                        }
                    });
                } catch (error) {
                    console.error('Error checking availability:', error);
                }
            }
        });
    </script>
</x-app-layout>