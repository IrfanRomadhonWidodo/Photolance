
<section class="bg-gray-50 py-12 px-4 md:px-8">
    <div class="container mx-auto max-w-6xl">
        <!-- Portfolio Header -->
        <div class="flex flex-col md:flex-row items-start justify-between mb-10">
            <div class="w-full md:w-2/5 mb-6 md:mb-0">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3 relative">
                    Portofolio Karya
                    <span class="block w-16 h-1 bg-blue-900 mt-3"></span>
                </h2>
            </div>
            <div class="w-full md:w-1/2">
                <p class="text-gray-600 mb-3 text-sm md:text-base leading-relaxed">
                    Koleksi karya terbaik dari tim fotografer profesional kami yang menangkap momen berharga dalam berbagai tema dan suasana. Setiap foto menceritakan kisah unik.
                </p>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                    Dari <span class="font-medium text-blue-700">momen pernikahan</span> yang sakral hingga <span class="font-medium text-blue-700">potret personal</span> yang mendalam, kami berkomitmen menciptakan hasil visual yang melebihi ekspektasi.
                </p>
            </div>
        </div>

        <div class="gallery-container">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-4">
                <div class="gallery-item col-span-2 row-span-2 h-64 md:h-80 overflow-hidden rounded-lg shadow-md transform transition duration-300 hover:shadow-lg hover:scale-[1.01]" data-index="1">
                    <div class="relative h-full w-full group">
                        <img 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                            src="{{ asset('img/portofolio/portofolio-1.jpg') }}" 
                            alt="Momen Wisuda"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <h3 class="text-white text-lg font-bold">Momen Wisuda</h3>
                            <p class="text-blue-200 text-sm mt-1">Fotografer: Slamet Faatnurrohim</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item h-40 md:h-48 overflow-hidden rounded-lg shadow-md transform transition duration-300 hover:shadow-lg hover:scale-[1.01]" data-index="2">
                    <div class="relative h-full w-full group">
                        <img 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                            src="{{ asset('img/portofolio/portofolio-2.jpg') }}" 
                            alt="Potret Profesional"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <h3 class="text-white text-base font-bold">Potret Profesional</h3>
                            <p class="text-blue-200 text-xs mt-1">Fotografer: Irfan Romadhon Widodo</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item h-40 md:h-48 overflow-hidden rounded-lg shadow-md transform transition duration-300 hover:shadow-lg hover:scale-[1.01]" data-index="3">
                    <div class="relative h-full w-full group">
                        <img 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                            src="{{ asset('img/portofolio/portofolio-3.jpg') }}" 
                            alt="Pencapaian Diri"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <h3 class="text-white text-base font-bold">Pencapaian Diri</h3>
                            <p class="text-blue-200 text-xs mt-1">Fotografer: Zaki Dzulfikar</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item col-span-2 h-40 md:h-48 overflow-hidden rounded-lg shadow-md transform transition duration-300 hover:shadow-lg hover:scale-[1.01]" data-index="4">
                    <div class="relative h-full w-full group">
                        <img 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                            src="{{ asset('img/portofolio/portofolio-4.jpg') }}" 
                            alt="Personal Branding"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <h3 class="text-white text-base font-bold">Personal Branding</h3>
                            <p class="text-blue-200 text-xs mt-1">Fotografer: Sinta Wijaya</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item hidden-item h-40 md:h-48 overflow-hidden rounded-lg shadow-md transform transition duration-300 hover:shadow-lg hover:scale-[1.01] hidden" data-index="5">
                    <div class="relative h-full w-full group">
                        <img 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                            src="{{ asset('img/portofolio/portofolio-5.jpg') }}" 
                            alt="Kebersamaan Hidup"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <h3 class="text-white text-base font-bold">Kebersamaan Hidup</h3>
                            <p class="text-blue-200 text-xs mt-1">Fotografer: Budi Santoso</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item hidden-item h-40 md:h-48 overflow-hidden rounded-lg shadow-md transform transition duration-300 hover:shadow-lg hover:scale-[1.01] hidden" data-index="6">
                    <div class="relative h-full w-full group">
                        <img 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                            src="{{ asset('img/portofolio/portofolio-6.jpg') }}" 
                            alt="Peluncuran Produk"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <h3 class="text-white text-base font-bold">Peluncuran Produk</h3>
                            <p class="text-blue-200 text-xs mt-1">Fotografer: Dewi Lestari</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item hidden-item col-span-2 row-span-2 h-64 md:h-80 overflow-hidden rounded-lg shadow-md transform transition duration-300 hover:shadow-lg hover:scale-[1.01] hidden" data-index="7">
                    <div class="relative h-full w-full group">
                        <img 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                            src="{{ asset('img/portofolio/portofolio-7.jpg') }}" 
                            alt="Momen Berharga"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <h3 class="text-white text-lg font-bold">Momen Berharga</h3>
                            <p class="text-blue-200 text-sm mt-1">Fotografer: Kayla Putri</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item hidden-item h-40 md:h-48 overflow-hidden rounded-lg shadow-md transform transition duration-300 hover:shadow-lg hover:scale-[1.01] hidden" data-index="8">
                    <div class="relative h-full w-full group">
                        <img 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                            src="{{ asset('img/portofolio/portofolio-8.jpg') }}" 
                            alt="Momen Tak Terlupakan"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <h3 class="text-white text-base font-bold">Momen Tak Terlupakan</h3>
                            <p class="text-blue-200 text-xs mt-1">Fotografer: Reza Mahendra</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item hidden-item h-40 md:h-48 overflow-hidden rounded-lg shadow-md transform transition duration-300 hover:shadow-lg hover:scale-[1.01] hidden" data-index="9">
                    <div class="relative h-full w-full group">
                        <img 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                            src="{{ asset('img/portofolio/portofolio-9.jpg') }}" 
                            alt="Kebersamaan Keluarga"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <h3 class="text-white text-base font-bold">Kebersamaan Keluarga</h3>
                            <p class="text-blue-200 text-xs mt-1">Fotografer: Nadia Safira</p>
                        </div>
                    </div>
                </div>

                <div class="gallery-item hidden-item col-span-2 h-40 md:h-48 overflow-hidden rounded-lg shadow-md transform transition duration-300 hover:shadow-lg hover:scale-[1.01] hidden" data-index="10">
                    <div class="relative h-full w-full group">
                        <img 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                            src="{{ asset('img/portofolio/portofolio-10.jpg') }}" 
                            alt="Calon Masa Depan"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <h3 class="text-white text-base font-bold">Calon Masa Depan</h3>
                            <p class="text-blue-200 text-xs mt-1">Fotografer: Fajar Ramadhan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-10">
            <button id="load-more-btn" class="relative inline-block px-8 py-3 text-sm font-semibold text-blue-600 border-2 border-blue-600 rounded-md transition-all duration-300 hover:text-white overflow-hidden">
                <span class="relative z-10 text-gray-800 hover:text-blue-900 transition-colors duration-300">LIHAT LEBIH BANYAK</span>
                <span class="absolute top-0 left-0 w-0 h-full bg-blue-600 transition-all duration-300 -z-1"></span>
            </button>
        </div>
    </div>
</section>

<style src="{{ asset('cs/style_portofolio.css') }}"></style>

<script src="{{ asset('js/script_portofolio.js') }}"></script>