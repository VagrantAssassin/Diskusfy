<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-green-200 to-green-500 min-h-screen flex justify-center items-center">
    <div class="bg-white shadow-2xl rounded-2xl p-8 md:p-12 w-full max-w-4xl transform hover:scale-105 transition duration-300 ease-in-out">
        <div class="text-center mb-8">
            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="w-32 h-32 mx-auto rounded-full mb-4 shadow-lg border-4 border-green-200">
            <h2 class="text-green-700 text-3xl font-bold">Raditya Aryabudhi Ramadhan</h2>
            <p class="text-gray-600 text-lg">Mobile Developer</p>
            <p class="text-gray-500 text-md">Jawa Barat, Indonesia</p>
        </div>
        
        <h3 class="text-green-700 text-2xl font-bold text-center mb-8">Edit Profil</h3>
        
        <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col">
                <label class="text-gray-700 text-sm font-medium mb-1" for="name">Nama</label>
                <input type="text" id="name" name="name" value="Raditya Aryabudhi Ramadhan" class="w-full px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition duration-200">
            </div>
            
            <div class="flex flex-col">
                <label class="text-gray-700 text-sm font-medium mb-1" for="email">Email</label>
                <input type="email" id="email" name="email" value="raditya@example.com" class="w-full px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition duration-200">
            </div>
            
            <div class="flex flex-col">
                <label class="text-gray-700 text-sm font-medium mb-1" for="phone">Nomor Telepon</label>
                <input type="text" id="phone" name="phone" value="081234567890" class="w-full px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition duration-200">
            </div>
            
            <div class="flex flex-col">
                <label class="text-gray-700 text-sm font-medium mb-1" for="location">Lokasi</label>
                <input type="text" id="location" name="location" value="Jawa Barat, Indonesia" class="w-full px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition duration-200">
            </div>
            
            <div class="flex flex-col md:col-span-2">
                <label class="text-gray-700 text-sm font-medium mb-1" for="bio">Deskripsi Singkat</label>
                <textarea id="bio" name="bio" class="w-full px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition duration-200">Seorang Mobile Developer dengan pengalaman dalam pengembangan aplikasi Android dan iOS.</textarea>
            </div>
            
            <div class="flex flex-col md:col-span-2">
                <label class="text-gray-700 text-sm font-medium mb-1" for="password">Password Baru</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition duration-200" placeholder="Masukkan password baru">
            </div>
            
            <div class="md:col-span-2 flex flex-col md:flex-row justify-between items-center gap-4">
                <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition w-full md:w-auto shadow-lg focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2">Simpan Perubahan</button>
                <a href="#" class="text-red-500 hover:text-red-700 text-sm font-medium transition duration-200">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>