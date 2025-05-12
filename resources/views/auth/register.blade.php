<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photolance Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center" style="background-image: url('/img/bg-login.png');">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white/10 backdrop-blur-lg p-8 rounded-2xl shadow-lg w-full max-w-md">
            <h2 class="text-white text-2xl font-bold mb-6 text-center">Register Form</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <input type="text" id="name" name="name" placeholder="Enter your name" required 
                        class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-white">
                </div>
                <div class="mb-4">
                    <input type="email" id="email" name="email" placeholder="Enter your email" required 
                        class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-white">
                </div>
                <div class="mb-4">
                    <input type="password" id="password" name="password" placeholder="Enter your password" required 
                        class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-white">
                </div>
                <div class="mb-4">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required 
                        class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-white">
                </div>
                <div class="flex items-center justify-between mb-6 text-white text-sm">
                    <a href="{{ route('login') }}" class="hover:underline">Already registered?</a>
                </div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-lg transition duration-200">Register</button>
            </form>
        </div>
    </div>
</body>
</html>