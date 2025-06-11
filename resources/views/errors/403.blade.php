<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Anda bisa menambahkan font kustom jika perlu */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
    <div class="bg-gray-800 border border-gray-700 rounded-2xl shadow-lg p-8 md:p-12 text-center max-w-md w-full">
        
        <div class="mb-6">
            <svg class="mx-auto h-16 w-16 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
            </svg>
        </div>

        <h1 class="text-5xl font-bold text-red-500 mb-2">PERINGATAN</h1>
        <h2 class="text-2xl font-semibold text-white mb-4">Hayo Ketahuan Nembak URL</h2>
        <p class="text-gray-400 mb-8">
            Maaf, Anda tidak memiliki izin untuk mengakses halaman ini. Silakan hubungi administrator jika Anda merasa ini adalah sebuah kesalahan.
        </p>
        
        <a href="{{ route('home') }}" 
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200">
            Kembali ke Halaman Home
        </a>
    </div>
</body>
</html>