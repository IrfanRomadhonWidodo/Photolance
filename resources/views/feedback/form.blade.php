<div class="bg-gray-200 rounded-lg shadow-lg overflow-hidden w-4/5 mx-auto  mb-12">
    <div id="feedback-form" class="bg-blue-600 py-4 px-6">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
            </svg>
            <h2 class="ml-3 text-xl font-bold text-white">Kirim Feedback</h2>
        </div>
        <p class="mt-1 text-blue-100 text-sm">Kami sangat menghargai masukan dan saran Anda</p>
    </div>
    
    <div class="px-6 py-6">
        @if (session('success'))
            <div id="success-alert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>

            <script>
                setTimeout(function() {
                    const alert = document.getElementById('success-alert');
                    if (alert) {
                        alert.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                        setTimeout(() => alert.remove(), 500); 
                    }
                }, 4000); 
            </script>
        @endif

        
        @if ($errors->any())
            <div class="bg-red-50 text-red-700 p-4 rounded-lg mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('feedback-form'))
            <script>
                window.onload = function() {
                    const element = document.getElementById('feedback-form');
                    if (element) {
                        element.scrollIntoView({ behavior: 'smooth' });
                    }
                };
            </script>
        @endif

        
        <form action="{{ route('feedback.store') }}" method="POST" class="space-y-4">
            @csrf
            
            
            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700">Subjek</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                        </svg>
                    </div>
                    <input type="text" name="subject" id="subject" value="{{ old('subject') }}" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-3 sm:text-sm border-gray-300 rounded-md" placeholder="Subjek Feedback" required>
                </div>
            </div>
            
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                <div class="mt-1">
                    <textarea id="message" name="message" rows="4" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Tulis pesan anda di sini" required>{{ old('message') }}</textarea>
                </div>
            </div>
            
            <div class="flex items-center justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                    Kirim Feedback
                </button>
            </div>
        </form>
    </div>
</div>