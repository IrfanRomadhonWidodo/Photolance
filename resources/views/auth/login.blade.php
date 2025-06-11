<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photolance Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center" style="background-image: url('/img/bg-login.png');">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white/10 backdrop-blur-lg p-8 rounded-2xl shadow-lg w-full max-w-md">
            <h2 class="text-white text-2xl font-bold mb-6 text-center">Login Form</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <input type="email" id="email" name="email" placeholder="Enter your email" required 
                           class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-white">
                </div>
                <div class="mb-4">
                    <input type="password" id="password" name="password" placeholder="Enter your password" required 
                           class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-white">
                </div>
                <div class="flex items-center justify-between mb-6 text-white text-sm">
                    <div>
                        <input type="checkbox" id="remember_me" name="remember" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="remember_me" class="ms-2">Remember me</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="hover:underline">Forgot password?</a>
                    @endif
                </div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-lg transition duration-200">Log In</button>
            </form>
            
            <div class="text-center text-white text-sm mt-6">
                Don't have an account? 
                <a href="{{ route('register') }}" class="font-semibold hover:underline">
                    Register
                </a>
            </div>
            
        </div>
    </div>
</body>
</html>