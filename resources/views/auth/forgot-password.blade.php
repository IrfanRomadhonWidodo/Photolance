<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photolance Password Reset</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center" style="background-image: url('/img/bg-login.png');">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white/10 backdrop-blur-lg p-8 rounded-2xl shadow-lg w-full max-w-md">
            <h2 class="text-white text-2xl font-bold mb-6 text-center">Forgot Password</h2>
            <p class="text-sm text-white mb-6 text-center">
                Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-4">
                    <input type="email" id="email" name="email" placeholder="Enter your email" required 
                        class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-white">
                </div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-lg transition duration-200">
                    Email Password Reset Link
                </button>
            </form>
        </div>
    </div>
</body>
</html>