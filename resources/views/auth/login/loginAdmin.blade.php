<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <title>AdminAuth</title>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <div class="h-screen flex flex-col items-center justify-center p-4">
        <div class="max-w-md w-full bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 text-center">Welcome Administrator</h2>

            <form class="space-y-4" id="admin-login-form">
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
                    </div>

                <button type="submit" id="login-submit" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800">
                    Sign In
                </button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="{{ asset('js/loginAdmin.js') }}" type="module"></script>
</body>
</html>