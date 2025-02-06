<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex justify-center items-center">
    <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-2xl p-8 md:p-12 w-full max-w-4xl">
        <div class="text-left mb-4">
            <a href="/" class="text-green-700 dark:text-green-400 hover:text-green-900 dark:hover:text-green-300 text-lg font-medium transition duration-200 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 1.414l-3.293 3.293h7.586a1 1 0 010 2H6.414l3.293 3.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Kembali
            </a>
        </div>
        
        <div class="text-center mb-8">
            <img src="https://www.pngarts.com/files/5/User-Avatar-PNG-Background-Image.png" alt="Profile Picture" class="w-32 h-32 mx-auto rounded-full mb-4 shadow-lg border-4 border-green-200 dark:border-green-500">
            <h2 class="text-green-700 dark:text-green-400 text-3xl font-bold">Raditya Aryabudhi Ramadhan</h2>
            {{-- <p class="text-gray-600 dark:text-gray-400 text-lg">Mobile Developer</p>
            <p class="text-gray-500 dark:text-gray-500 text-md">Jawa Barat, Indonesia</p> --}}
        </div>
        
        <h3 class="text-green-700 dark:text-green-400 text-2xl font-bold text-center mb-8">Edit Profil</h3>
        
        <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col">
                <label class="text-gray-700 dark:text-gray-300 text-sm font-medium mb-1" for="uid">UID</label>
                <input type="text" id="uid" name="uid" value="1234567890" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 transition duration-200" disabled>
            </div>
            
            <div class="flex flex-col">
                <label class="text-gray-700 dark:text-gray-300 text-sm font-medium mb-1" for="username">Username</label>
                <input type="text" id="username" name="username" value="raditya" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 transition duration-200">
            </div>
            
            <div class="flex flex-col">
                <label class="text-gray-700 dark:text-gray-300 text-sm font-medium mb-1" for="email">Email</label>
                <input type="email" id="email" name="email" value="raditya@example.com" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 transition duration-200">
            </div>
            
            <div class="flex flex-col">
                <label class="text-gray-700 dark:text-gray-300 text-sm font-medium mb-1" for="name">Nama</label>
                <input type="text" id="name" name="name" value="Raditya Aryabudhi Ramadhan" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 transition duration-200">
            </div>
            
            <div class="md:col-span-2 flex flex-col md:flex-row justify-between items-center gap-4">
                <button type="submit" class="bg-green-600 dark:bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-700 dark:hover:bg-green-600 transition w-full md:w-auto shadow-lg focus:ring-2 focus:ring-green-400">Simpan Perubahan</button>
                <a href="#" class="text-red-500 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 text-sm font-medium transition duration-200">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
