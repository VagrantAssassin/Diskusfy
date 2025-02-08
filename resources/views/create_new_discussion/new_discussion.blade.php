<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Diskusi Baru</title>
    <!-- Include CSS Flowbite jika diperlukan -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <section class="bg-gray-100 dark:bg-gray-900 h-screen flex items-center justify-center">
        <div class="py-8 px-6 w-full max-w-md bg-white dark:bg-gray-800 shadow-md rounded-lg">
            <h2 class="mb-6 text-2xl font-bold text-gray-900 dark:text-white text-center">Buat Diskusi Baru</h2>
            <form action="{{ route('diskusi.add') }}" id="diskusi-form" method="POST">
                @csrf <!-- CSRF token -->
                <div class="flex flex-col gap-4">
                    <!-- Judul Diskusi -->
                    <div>
                        <label for="judulDiskusi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Judul Diskusi
                        </label>
                        <input type="text" name="judul" id="judulDiskusi"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                      focus:ring-green-600 focus:border-green-600 block w-full p-2.5 
                                      dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                                      dark:focus:ring-green-500 dark:focus:border-green-500"
                               placeholder="Tulis judul disini" required>
                    </div>
                    <!-- Isi Diskusi -->
                    <div>
                        <label for="isiDiskusi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Diskusi
                        </label>
                        <textarea id="isiDiskusi" name="isi_diskusi" rows="4"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 
                                         focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 
                                         dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                  placeholder="Isi diskusi disini" required></textarea>
                    </div>
                    <!-- Kategori -->
                    <div>
                        <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Kategori
                        </label>
                        <input type="text" id="kategori" name="kategori"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                      focus:ring-green-500 focus:border-green-500 block w-full p-2.5 
                                      dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                                      dark:focus:ring-green-500 dark:focus:border-green-500"
                               placeholder="Masukkan kategori" required>
                    </div>
                    <!-- Input tersembunyi untuk user_uid (pastikan nilainya di-set sesuai mekanisme autentikasi Anda) -->
                    <input type="hidden" name="user_uid" id="user_uid" value="">
                </div>
                <div class="flex gap-4 mt-6">
                    <button type="submit"
                            class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 
                                   font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-500 dark:hover:bg-green-600 
                                   dark:focus:ring-green-800">
                        Unggah
                    </button>
                    <button type="button" onclick="window.location.href='/'"
                            class="w-full text-gray-900 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:ring-gray-100 
                                   font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-700 dark:text-white 
                                   dark:hover:bg-gray-600 dark:focus:ring-gray-500">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </section>
    <!-- Include script Firebase dan Flowbite -->
    <script src="https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
    <!-- Script untuk mengisi user_uid jika menggunakan Firebase Auth -->
    <script src="{{ asset('js/verif.js') }}" type="module"></script>
    <script src="{{ asset('js/categoryVerif.js') }}" type="module"></script>
</body>
</html>
