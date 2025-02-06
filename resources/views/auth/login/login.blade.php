<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.css" rel="stylesheet" />
    <title>Login</title>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <div class="h-screen flex flex-col items-center justify-center p-4">
        <div class="max-w-md w-full bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 text-center">Sign In</h2>
            
            <form class="space-y-4" id="login-form">
                <div>
                    <label class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email"
                        class="w-full px-4 py-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-green-600 focus:border-green-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 outline-none transition-all"
                        placeholder="your@email.com"
                    />
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        class="w-full px-4 py-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-green-600 focus:border-green-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 outline-none transition-all"
                        placeholder="••••••••"
                    />
                </div>
                
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500"/>
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                    </label>
                    {{-- <a href="/forget" class="text-sm text-green-600 hover:text-green-500 dark:text-green-400">Forgot password?</a> --}}
                </div>
                
                <button type="submit" id="login-submit" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800">
                    Sign In
                </button>
                <button type="button" id="google-signin" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800" disabled>
                    Sign In With Google (Maintenance)
                </button>
            </form>
            
            <div class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
                Don't have an account? 
                <a href="/register" class="text-green-600 hover:text-green-500 dark:text-green-400 font-medium">Sign up</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
    <script src="{{ asset('js/login.js') }}" type="module"></script>
</body>
</html>
