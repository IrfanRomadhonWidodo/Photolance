<section class="relative h-auto py-20 overflow-hidden bg-gradient-to-r from-blue-900 to-indigo-900">
    <div class="absolute inset-0">
        <div class="w-full h-full bg-cover bg-center" 
            style="background-image: url('{{ asset('img/photography-bg.jpg') }}'); filter: brightness(0.4);">
        </div>
    </div>

    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/70"></div>

    <div class="container relative z-10 mx-auto px-4 h-full flex flex-col justify-center items-center text-center space-y-3">
        <h1 class="text-4xl lg:text-4xl font-extrabold text-white mb-2 mt-4 tracking-tight animate__animated animate__fadeInDown">
            Tentang <span class="text-blue-400">Photo</span><span class="text-blue-600">lance</span>
        </h1>
        <p class="text-sm lg:text-base text-blue-100 max-w-xl animate__animated animate__fadeInUp">
            Platform booking fotografi profesional yang menghubungkan <span class="text-blue-300 font-semibold">fotografer berbakat</span> 
            dengan klien yang membutuhkan layanan fotografi berkualitas tinggi.
        </p>

    </div>
    <div class="container mx-auto px-6 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Employee Card -->
            <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl shadow-lg hover:shadow-xl transform transition duration-300 hover:scale-105">
                <div class="text-5xl font-extrabold mb-2 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">
                    {{ $jumlahEmployee }}
                </div>
                <div class="text-blue-100 text-2xl">Employee</div>
            </div>

            <!-- Booking Sukses Card -->
            <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl shadow-lg hover:shadow-xl transform transition duration-300 hover:scale-105">
                <div class="text-5xl font-extrabold mb-2 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">
                    
                </div>
                <div class="text-blue-100 text-2xl">Booking Sukses</div>
            </div>

            <!-- User Aktif Card -->
            <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl shadow-lg hover:shadow-xl transform transition duration-300 hover:scale-105">
                <div class="text-5xl font-extrabold mb-2 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">
                    {{ $jumlahUser }}
                </div>
                <div class="text-blue-100 text-2xl">User Aktif</div>
            </div>
        </div>
    </div>
</section>



<!-- Mission Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-blue-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border-t-4 border-blue-500">
                    <div class="w-14 h-14 bg-blue-600 text-white rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-blue-800 mb-2">Misi Kami</h3>
                    <p class="text-gray-600">Mendemokratisasi akses ke layanan fotografi profesional dengan menghubungkan fotografer berbakat dengan klien melalui platform yang mudah digunakan.</p>
                </div>
                
                <div class="bg-blue-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border-t-4 border-blue-500">
                    <div class="w-14 h-14 bg-blue-600 text-white rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-blue-800 mb-2">Visi Kami</h3>
                    <p class="text-gray-600">Menjadi platform utama yang memperkuat industri fotografi di Indonesia dengan menciptakan peluang karir bagi fotografer dan makeup artist berbakat.</p>
                </div>
                
                <div class="bg-blue-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border-t-4 border-blue-500">
                    <div class="w-14 h-14 bg-blue-600 text-white rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-blue-800 mb-2">Nilai Kami</h3>
                    <p class="text-gray-600">Kami percaya pada kualitas, profesionalisme, dan kemudahan akses. Setiap foto adalah cerita dan kami membantu untuk menceritakannya dengan indah.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16 bg-blue-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-blue-900 mb-4">Tentang Platform Kami</h2>
                <div class="w-24 h-1 bg-blue-500 mx-auto mb-6"></div>
                <p class="text-lg text-gray-600">Photolance didirikan dengan visi untuk memudahkan proses booking fotografer profesional dan memberikan kesempatan bagi fotografer untuk terhubung dengan lebih banyak klien.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <h3 class="text-2xl font-bold text-blue-800 mb-4">Bagi Klien</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Booking fotografer profesional dengan mudah dan cepat</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Lihat portofolio dan review sebelum memilih fotografer</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Pembayaran aman dan transparan</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Akses dan layanan yang mudah</span>
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <h3 class="text-2xl font-bold text-blue-800 mb-4">Bagi Fotografer</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Daftarkan diri sebagai mitra fotografer dengan mudah</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Tampilkan portofolio dan review</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Kelola jadwal dan pesanan dengan fleksibel</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Dapatkan lebih banyak klien dan kembangkan bisnis Anda</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Team Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-blue-900 mb-4">Tim Pengembang</h2>
                <div class="w-24 h-1 bg-blue-500 mx-auto mb-6"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Photolance dikembangkan oleh tim mahasiswa berbakat dari Universitas Jenderal Soedirman yang berdedikasi untuk memajukan industri fotografi di Indonesia.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-blue-50 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 group">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('img/anggota1.png') }}" alt="Anggota Tim 1" class="w-full h-64 object-cover object-center transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900 to-transparent opacity-0 group-hover:opacity-70 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-1">Irfan Romadhon Widodo</h3>
                        <p class="text-blue-600 mb-3">Frontend Developer</p>
                        <p class="text-gray-600 text-sm">Mahasiswa Informatika Universitas Jenderal Soedirman yang berfokus pada pengembangan antarmuka pengguna yang intuitif dan responsif.</p>
                        <div class="flex mt-4 space-x-3">
                            <a href="https://www.instagram.com/irfan_romadhonn/" class="text-blue-500 hover:text-blue-700">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <div class="flex space-x-4">
                                <!-- Facebook Icon -->
                                <a href="https://www.facebook.com/irfan.romadhon.12327/?locale=id_ID" target="_blank" class="text-blue-500 hover:text-blue-700">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M22 12.073C22 6.545 17.523 2 12 2S2 6.545 2 12.073c0 5.056 3.738 9.245 8.56 9.927v-7.02h-2.58v-2.907h2.58V9.413c0-2.564 1.51-3.977 3.822-3.977 1.108 0 2.27.198 2.27.198v2.5h-1.279c-1.262 0-1.656.785-1.656 1.588v1.902h2.809l-.449 2.907h-2.36v7.02C18.262 21.318 22 17.13 22 12.073z"/>
                                    </svg>
                                </a>

                                <!-- GitHub Icon -->
                                <a href="https://github.com/IrfanRomadhonWidodo" target="_blank" class="text-blue-500 hover:text-blue-700">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 0C5.373 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.6.11.793-.26.793-.577 0-.285-.01-1.04-.016-2.04-3.338.727-4.042-1.614-4.042-1.614-.546-1.386-1.333-1.756-1.333-1.756-1.089-.744.083-.729.083-.729 1.205.085 1.838 1.238 1.838 1.238 1.07 1.833 2.809 1.303 3.495.996.107-.775.418-1.303.762-1.603-2.665-.305-5.467-1.335-5.467-5.932 0-1.31.468-2.381 1.236-3.22-.123-.304-.536-1.528.117-3.184 0 0 1.008-.322 3.302 1.23a11.51 11.51 0 013.006-.404c1.02.005 2.046.138 3.006.404 2.294-1.552 3.301-1.23 3.301-1.23.653 1.656.24 2.88.118 3.184.77.839 1.236 1.91 1.236 3.22 0 4.61-2.807 5.624-5.479 5.921.43.372.814 1.103.814 2.222 0 1.605-.014 2.898-.014 3.293 0 .319.192.694.801.576C20.565 21.797 24 17.302 24 12c0-6.627-5.373-12-12-12z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 2 -->
                <div class="bg-blue-50 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 group">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('img/anggota2.png') }}" alt="Anggota Tim 2" class="w-full h-64 object-cover object-center transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900 to-transparent opacity-0 group-hover:opacity-70 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-1">Defit Bagus Saputra</h3>
                        <p class="text-blue-600 mb-3">Backend Developer</p>
                        <p class="text-gray-600 text-sm">Mahasiswa Informatika Universitas Jenderal Soedirman yang ahli dalam pengembangan backend dan basis data aplikasi web.</p>
                        <div class="flex mt-4 space-x-3">
                            <a href="https://www.instagram.com/deefb4_/" class="text-blue-500 hover:text-blue-700">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <div class="flex space-x-4">
                                <!-- Facebook Icon -->
                                <a href="https://www.facebook.com/irfan.romadhon.12327/?locale=id_ID" target="_blank" class="text-blue-500 hover:text-blue-700">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M22 12.073C22 6.545 17.523 2 12 2S2 6.545 2 12.073c0 5.056 3.738 9.245 8.56 9.927v-7.02h-2.58v-2.907h2.58V9.413c0-2.564 1.51-3.977 3.822-3.977 1.108 0 2.27.198 2.27.198v2.5h-1.279c-1.262 0-1.656.785-1.656 1.588v1.902h2.809l-.449 2.907h-2.36v7.02C18.262 21.318 22 17.13 22 12.073z"/>
                                    </svg>
                                </a>

                                <!-- GitHub Icon -->
                                <a href="https://github.com/DefitSaputra" target="_blank" class="text-blue-500 hover:text-blue-700">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 0C5.373 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.6.11.793-.26.793-.577 0-.285-.01-1.04-.016-2.04-3.338.727-4.042-1.614-4.042-1.614-.546-1.386-1.333-1.756-1.333-1.756-1.089-.744.083-.729.083-.729 1.205.085 1.838 1.238 1.838 1.238 1.07 1.833 2.809 1.303 3.495.996.107-.775.418-1.303.762-1.603-2.665-.305-5.467-1.335-5.467-5.932 0-1.31.468-2.381 1.236-3.22-.123-.304-.536-1.528.117-3.184 0 0 1.008-.322 3.302 1.23a11.51 11.51 0 013.006-.404c1.02.005 2.046.138 3.006.404 2.294-1.552 3.301-1.23 3.301-1.23.653 1.656.24 2.88.118 3.184.77.839 1.236 1.91 1.236 3.22 0 4.61-2.807 5.624-5.479 5.921.43.372.814 1.103.814 2.222 0 1.605-.014 2.898-.014 3.293 0 .319.192.694.801.576C20.565 21.797 24 17.302 24 12c0-6.627-5.373-12-12-12z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 3 -->
                <div class="bg-blue-50 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 group">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('img/anggota3.png') }}" alt="Anggota Tim 3" class="w-full h-64 object-cover object-center transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900 to-transparent opacity-0 group-hover:opacity-70 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-1">Alfan Fauzan Ridlo</h3>
                        <p class="text-blue-600 mb-3">UI/UX Designer</p>
                        <p class="text-gray-600 text-sm">Mahasiswa Informatika Universitas Jenderal Soedirman yang berfokus pada menciptakan pengalaman pengguna yang menarik dan intuitif.</p>
                        <div class="flex mt-4 space-x-3">
                            <a href="https://www.instagram.com/serryozan/" class="text-blue-500 hover:text-blue-700">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <div class="flex space-x-4">
                                <!-- Facebook Icon -->
                                <a href="https://www.facebook.com/irfan.romadhon.12327/?locale=id_ID" target="_blank" class="text-blue-500 hover:text-blue-700">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M22 12.073C22 6.545 17.523 2 12 2S2 6.545 2 12.073c0 5.056 3.738 9.245 8.56 9.927v-7.02h-2.58v-2.907h2.58V9.413c0-2.564 1.51-3.977 3.822-3.977 1.108 0 2.27.198 2.27.198v2.5h-1.279c-1.262 0-1.656.785-1.656 1.588v1.902h2.809l-.449 2.907h-2.36v7.02C18.262 21.318 22 17.13 22 12.073z"/>
                                    </svg>
                                </a>

                                <!-- GitHub Icon -->
                                <a href="https://github.com/flxzn27?tab=overview&from=2025-05-01&to=2025-05-10" target="_blank" class="text-blue-500 hover:text-blue-700">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 0C5.373 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.6.11.793-.26.793-.577 0-.285-.01-1.04-.016-2.04-3.338.727-4.042-1.614-4.042-1.614-.546-1.386-1.333-1.756-1.333-1.756-1.089-.744.083-.729.083-.729 1.205.085 1.838 1.238 1.838 1.238 1.07 1.833 2.809 1.303 3.495.996.107-.775.418-1.303.762-1.603-2.665-.305-5.467-1.335-5.467-5.932 0-1.31.468-2.381 1.236-3.22-.123-.304-.536-1.528.117-3.184 0 0 1.008-.322 3.302 1.23a11.51 11.51 0 013.006-.404c1.02.005 2.046.138 3.006.404 2.294-1.552 3.301-1.23 3.301-1.23.653 1.656.24 2.88.118 3.184.77.839 1.236 1.91 1.236 3.22 0 4.61-2.807 5.624-5.479 5.921.43.372.814 1.103.814 2.222 0 1.605-.014 2.898-.014 3.293 0 .319.192.694.801.576C20.565 21.797 24 17.302 24 12c0-6.627-5.373-12-12-12z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>