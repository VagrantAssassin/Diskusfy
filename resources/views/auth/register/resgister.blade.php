<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.css" rel="stylesheet" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Diskusfy</title>
</head>
<body>
  <div class="h-screen bg-gray-100 dark:bg-gray-900 flex flex-col items-center justify-center p-4">
    <div class="max-w-md w-full bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
      <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 text-center">Register</h2>
      
      <form class="space-y-4" id="register-form">
        @csrf
        <div>
          <label class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Username</label>
          <input 
            type="text" 
            id="username"
            name="username"
            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition-all bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white"
            placeholder="username"
          />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Name</label>
          <input 
            type="text" 
            id="nama"
            name="nama"
            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition-all bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white"
            placeholder="name"
          />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Email</label>
          <input 
            type="email" 
            id="email"
            name="email"
            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition-all bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white"
            placeholder="your@email.com"
          />
        </div>
  
        <div>
          <label class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Password</label>
          <input 
            type="password" 
            id="password" 
            name="password"
            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition-all bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white"
            placeholder="••••••••"
          />
        </div>
  
        <div class="flex items-center justify-between">
          <a href="/login" class="text-sm text-green-600 hover:text-green-500">Sign In?</a>
        </div>
  
        <button type="submit" id="register-btn" class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2.5 rounded-lg transition-colors">
          Sign Up
        </button>
        <button type="button" id="google-signup" class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2.5 rounded-lg transition-colors">
          Sign Up With Google
        </button>
      </form>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
  <script src="{{ asset('js/register.js') }}" type="module"></script>
</body>
</html>
