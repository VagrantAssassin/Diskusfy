<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskusfy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <main class="w-full max-w-2xl p-6 bg-white rounded-lg shadow-md mx-auto">
            <h2 class="text-2xl font-semibold mb-6">Buat Diskusi Baru</h2>

            <form action="#" method="POST" class="space-y-6">
                <div>
                    <label for="judul" class="block text-gray-700 font-semibold mb-2 text-lg">Judul diskusi</label>
                    <input type="text" id="judul" name="judul" class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300 text-lg">
                </div>

                <div>
                    <label for="isi" class="block text-gray-700 font-semibold mb-2 text-lg">Isi diskusi</label>
                    <textarea id="isi" name="isi" rows="8" class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300 text-lg"></textarea>
                </div>

                <!-- Kategori dengan Dropdown -->
                <div>
                    <label for="kategori" class="block text-gray-700 font-semibold mb-2 text-lg">Kategori</label>
                    <select id="kategori" name="kategori" class="w-full border rounded-lg p-3 text-lg">
                        <option value="">Pilih Kategori</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Coding">Coding</option>
                        <option value="Matematika">Matematika</option>
                        <option value="Hukum">Hukum</option>
                        <option value="Algoritma">Algoritma</option>
                    </select>
                </div>

                <!-- Tombol Unggah dan Batal -->
                <div class="mt-6 flex justify-between">
                    <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg text-lg hover:bg-green-700">Unggah</button>
                    <button type="button" onclick="window.location.href='/'" class="bg-red-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-red-600">
                        Batal
                    </button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
