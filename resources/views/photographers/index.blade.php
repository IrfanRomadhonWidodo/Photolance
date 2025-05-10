<!-- photographers/index.blade.php -->
@php
    // Mengambil data photographer yang statusnya approved
    $photographers = \App\Models\Employee::where('kategori', 'photographer')
                      ->where('status', 'approved')
                      ->get();
@endphp

<div class="bg-gradient-to-b from-blue-50 to-white py-14">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="text-3xl sm:text-4xl font-bold text-blue-800 tracking-tight">
                Fotografer Profesional Kami
            </h2>
            <div class="mt-4 max-w-2xl mx-auto">
                <p class="text-lg text-blue-700 leading-relaxed">
                    Temui tim fotografer profesional kami yang siap mengabadikan momen berharga Anda dengan penuh kreativitas dan ketelitian.
                </p>
            </div>
            <div class="mt-3 w-20 h-1 bg-blue-500 mx-auto rounded-full"></div>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($photographers as $photographer)
                <div class="group bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="w-full h-48 bg-gray-100 overflow-hidden">
                        @if($photographer->image)
                            @php
                                $imagePath = is_array($photographer->image) ? ($photographer->image[0] ?? '') : $photographer->image;
                            @endphp
                            <img 
                                src="{{ asset('storage/' . $imagePath) }}" 
                                alt="{{ $photographer->name }}" 
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                onerror="this.onerror=null; this.src='{{ asset('images/default-photographer.jpg') }}';"
                            >
                        @else
                            <div class="flex items-center justify-center h-full bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-blue-800 mb-1">{{ $photographer->name }}</h3>
                        
                        <div class="flex items-center text-sm text-blue-600 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <a href="mailto:{{ $photographer->email }}" class="hover:underline hover:text-blue-800">
                                {{ $photographer->email }}
                            </a>
                        </div>

                        <div class="border-t border-gray-100 pt-3">
                            @if($photographer->portofolio)
                                <a href="{{ $photographer->portofolio }}" target="_blank" class="inline-flex items-center justify-center w-full px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Lihat Portofolio
                                </a>
                            @else
                                <div class="inline-flex items-center justify-center w-full px-4 py-2 bg-gray-100 text-gray-500 text-sm font-medium rounded-md cursor-not-allowed">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                    </svg>
                                    Portofolio Tidak Tersedia
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white rounded-xl shadow-md p-10 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p class="text-lg text-gray-500">Belum ada fotografer yang disetujui saat ini.</p>
                        <p class="mt-1 text-blue-600 text-sm">Silakan periksa kembali nanti atau hubungi tim kami untuk bantuan.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
