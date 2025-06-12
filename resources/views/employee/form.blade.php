<!-- Employee Registration Modal -->
<div id="employeeRegistrationModal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-3xl transform transition-all">

        <div class="flex flex-col md:flex-row">
            <div class="md:w-2/5 relative h-48 md:h-auto">
                <img src="{{ asset('img/formemployee.png') }}" alt="Form Employee Image" class="w-full h-full object-cover rounded-l-lg">
            </div>
        
            <div class="md:w-3/5 p-7">
                <div class="mb-3">
                    <h2 class="text-xl font-bold text-gray-800">Pendaftaran Mitra Photolance</h2>
                    <p class="text-sm text-gray-500">Silahkan lengkapi data anda di bawah ini</p>
                </div>
                
                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                        <div class="relative">
                            <select name="kategori" id="kategori" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none" required>
                                <option value="">Pilih Kategori</option>
                                <option value="photographer">Photographer</option>
                                <option value="makeup_artist">Makeup Artist</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="portofolio" class="block text-sm font-medium text-gray-700 mb-1">Link Portofolio</label>
                        <input type="url" name="portofolio" id="portofolio" placeholder="https://portfolio-example.com" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <p class="text-xs text-gray-500 mt-0.5">Masukkan link portofolio/sosial media anda</p>
                    </div>
                    
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    
                    <div class="mt-4">
                        <button type="submit" class="w-full px-3 py-2 bg-gradient-to-r from-blue-700 to-blue-500 text-white font-medium rounded-md hover:from-blue-800 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-300 shadow-md">
                            Daftar Sekarang
                        </button>
                    </div>
                </form>
                
                <div class="absolute top-3 right-3">
                    <button type="button" class="text-gray-400 hover:text-gray-600 focus:outline-none" onclick="closeEmployeeModal()">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openEmployeeModal() {
        document.getElementById('employeeRegistrationModal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }
    
    function closeEmployeeModal() {
        document.getElementById('employeeRegistrationModal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
    
    document.getElementById('employeeRegistrationModal').addEventListener('click', function(event) {
        if (event.target === this) {
            closeEmployeeModal();
        }
    });
</script>