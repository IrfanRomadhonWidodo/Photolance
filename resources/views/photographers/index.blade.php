<!-- photographers/index.blade.php -->
@php
    // Mengambil data photographer yang statusnya approved
    $photographers = \App\Models\Employee::where('kategori', 'photographer')->where('status', 'approved')->get();
@endphp

<div class="bg-gradient-to-b from-blue-100 to-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-4/5">
        <div class="text-center mb-16">
            <h2
                class="text-4xl font-bold text-blue-900 tracking-tight relative mt-3 mb-6 bg-gradient-to-r from-blue-600 to-blue-400 inline-block text-transparent bg-clip-text after:block after:w-20 after:h-1 after:bg-blue-600 after:mx-auto after:mt-2">
                Fotografer Profesional Kami
            </h2>
        </div>


        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($photographers as $photographer)
                <div
                    class="group relative overflow-hidden bg-white rounded-2xl shadow-lg transition-all duration-300 hover:shadow-xl transform hover:-translate-y-2 border border-blue-50">
                    <div
                        class="absolute -right-4 -top-4 bg-blue-600 text-white text-xs font-semibold py-1 px-3 rounded-full shadow-md rotate-12 opacity-90 z-10">
                        Pro
                    </div>
                    <div class="w-full h-64 bg-gray-200 overflow-hidden">
                        @if ($photographer->image)
                            @php
                                $imagePath = is_array($photographer->image)
                                    ? $photographer->image[0] ?? ''
                                    : $photographer->image;
                            @endphp
                            <img src="{{ asset('storage/' . $imagePath) }}" alt="{{ $photographer->name }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                onerror="this.onerror=null; this.src='{{ asset('images/default-photographer.jpg') }}';">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-blue-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                        @else
                            <div
                                class="flex items-center justify-center h-full bg-gradient-to-br from-blue-50 to-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-blue-200" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xl font-bold text-blue-800 group-hover:text-blue-600 transition-colors">
                                {{ $photographer->name }}</h3>
                        </div>

                        <div class="flex items-center text-gray-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-blue-500"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <a href="mailto:{{ $photographer->email }}"
                                class="hover:underline hover:text-blue-600 transition-colors truncate">
                                {{ $photographer->email }}
                            </a>
                        </div>

                        <div class="border-t border-blue-50 pt-2 mt-2">
                            <div class="mt-3">
                                @if ($photographer->portofolio)
                                    <a href="{{ $photographer->portofolio }}" target="_blank"
                                        class="group/btn inline-flex items-center justify-center w-full px-5 py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white text-sm font-semibold rounded-lg shadow-md hover:from-blue-700 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition-all">
                                        <span class="relative z-10 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 mr-2 transition-transform duration-300 group-hover/btn:rotate-12"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            Lihat Portofolio
                                        </span>
                                    </a>
                                @else
                                    <div
                                        class="inline-flex items-center justify-center w-full px-5 py-3 bg-gray-100 text-gray-500 text-sm font-medium rounded-lg cursor-not-allowed">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                        </svg>
                                        Portofolio Tidak Tersedia
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white rounded-2xl shadow-lg p-12 text-center border border-blue-50">
                        <div class="inline-flex items-center justify-center h-24 w-24 bg-blue-50 rounded-full mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-300" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold text-blue-800 mb-2">Tidak Ada Fotografer</h3>
                        <p class="text-lg text-gray-500 mb-6">Saat ini belum ada fotografer yang telah disetujui dan
                            tersedia.</p>
                        <a href="#"
                            class="inline-flex items-center justify-center px-5 py-3 border border-blue-500 text-blue-600 bg-white hover:bg-blue-50 rounded-lg font-medium transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002-2z" />
                            </svg>
                            Periksa Kembali Nanti
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- CTA Section -->
        <div class="mt-20 bg-gradient-to-r from-blue-700 to-blue-500 rounded-2xl shadow-xl overflow-hidden">
            <div class="px-6 py-12 sm:px-12 lg:flex lg:items-center lg:justify-between">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight text-white sm:text-3xl">
                        Siap untuk mengabadikan momen spesial Anda?
                    </h2>
                    <p class="mt-3 text-lg text-blue-100 max-w-3xl">
                        Konsultasikan kebutuhan foto Anda dengan tim kami dan temukan fotografer yang sesuai dengan gaya
                        dan kebutuhan Anda.
                    </p>
                </div>
                <div class="mt-8 lg:mt-0 lg:ml-8 flex flex-shrink-0">
                    <a href="https://api.whatsapp.com/message/Z3GDJGNYDNCLM1?autoload=1&app_absent=0"
                        class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-blue-700 bg-white hover:bg-blue-50 transition-all transform hover:scale-105">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
