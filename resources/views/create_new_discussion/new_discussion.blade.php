<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Diskusi Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Form Content -->
    <main class="w-full max-w-2xl p-6 bg-white rounded-lg shadow-md" x-data="{ showModal: false, categories: [], selectedCategory: '' }">
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

            <!-- Kategori -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2 text-lg">Kategori</label>
                <div class="flex gap-2 flex-wrap">
                    <template x-for="(category, index) in categories" :key="index">
                        <span class="bg-gray-500 text-white px-3 py-2 rounded-lg flex items-center text-lg">
                            <span x-text="category"></span>
                            <button type="button" class="ml-2 text-white" @click="categories.splice(index, 1)">&times;</button>
                        </span>
                    </template>
                </div>
                <button type="button" class="mt-3 px-4 py-2 bg-gray-400 text-white rounded-lg text-lg" @click="showModal = true">Tambah Kategori</button>
            </div>

            <!-- Tombol Unggah dan Batal -->
            <div class="mt-6 flex justify-between">
                <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg text-lg hover:bg-green-700">Unggah</button>
                <button type="reset" class="bg-red-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-red-600">Batal</button>
            </div>
        </form>

        <!-- Modal Tambah Kategori -->
        <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-gray-700 text-white p-6 rounded-lg w-96">
                <div class="flex justify-between items-center border-b pb-3 mb-4">
                    <h3 class="text-lg">Tambah Kategori</h3>
                    <button @click="showModal = false" class="text-xl">&times;</button>
                </div>

                <div>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="kategori" value="Matematika" x-model="selectedCategory">
                        <span class="bg-gray-300 px-3 py-2 rounded-lg text-lg">Matematika</span>
                    </label>
                    <label class="flex items-center space-x-2 mt-3">
                        <input type="radio" name="kategori" value="Animasi" x-model="selectedCategory">
                        <span class="bg-gray-300 px-3 py-2 rounded-lg text-lg">Animasi</span>
                    </label>
                </div>

                <div class="flex justify-between mt-4">
                    <button type="button" class="bg-gray-400 px-4 py-3 rounded-lg text-lg" @click="showModal = false">Batal</button>
                    <button type="button" class="bg-green-600 px-4 py-3 rounded-lg text-lg" 
                        @click="if(selectedCategory && !categories.includes(selectedCategory)) { categories.push(selectedCategory); showModal = false; }">
                        Tambah
                    </button>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
