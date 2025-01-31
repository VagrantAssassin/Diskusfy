<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Guidelines</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-red-600 text-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-2xl font-bold">Laravel Guidelines</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="/" class="hover:underline">Home</a></li>
                    <li><a href="/example" class="hover:underline">Example Page</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto my-12 px-6">
        <section class="text-center">
            <h1 class="text-4xl font-bold text-gray-800">Panduan Standar Pengembangan di Laravel</h1>
            <p class="text-lg text-gray-600 mt-4">Ikuti praktik terbaik dalam pengembangan proyek Laravel.</p>
        </section>

        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-gray-800">1. Menggunakan Konsep MVC Secara Ketat</h2>
                <p class="text-gray-600 mt-2">Ikuti prinsip Model-View-Controller untuk kode yang terorganisir.</p>
                <ul class="list-disc list-inside text-gray-600 mt-4">
                    <li><strong>Model:</strong> Mengelola data dan interaksi database.</li>
                    <li><strong>View:</strong> Menampilkan tampilan tanpa logika bisnis.</li>
                    <li><strong>Controller:</strong> Menghubungkan model dan view.</li>
                </ul>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-gray-800">2. Pemisahan File CSS</h2>
                <ul class="list-disc list-inside text-gray-600 mt-4">
                    <li>Gunakan file CSS terpisah dari Blade Template.</li>
                    <li>Simpan di <code>public/css/</code>.</li>
                    <li>Hubungkan dengan <code>{{ asset('css/style.css') }}</code>.</li>
                </ul>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-gray-800">3. Struktur Folder yang Rapi</h2>
                <ul class="list-disc list-inside text-gray-600 mt-4">
                    <li><strong>View:</strong> Hanya berisi tampilan.</li>
                    <li><strong>Model:</strong> Berisi file model database.</li>
                    <li><strong>Controller:</strong> Mengelola logika aplikasi.</li>
                    <li><strong>Navigation:</strong> Berisi rute navigasi.</li>
                </ul>
            </div>
        </div>

        <section class="mt-12 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800">4. Penerapan OOP di Laravel</h2>
            <ul class="list-disc list-inside text-gray-600 mt-4">
                <li><strong>View:</strong> Berisi file Blade Template untuk tampilan dan disimpan di folder <code>resources/views/</code>.</li>
                <li><strong>Model:</strong> Berisi file model yang berinteraksi dengan database dan disimpan di folder <code>app/Models/</code>.</li>
                <li><strong>Controller:</strong> Berisi file controller yang menangani logika aplikasi dan disimpan di folder <code>app/Http/Controllers/</code>.</li>
                <li><strong>Navigation:</strong> Berisi kode rute navigasi dalam satu file. Simpan dalam folder <code>routes/web.php</code>.</li>
            </ul>
        </section>

        <section class="mt-12 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800">5. Panduan Git dan Best Practice Commit</h2>
            <p class="text-gray-600 mt-2">Gunakan format commit yang jelas dan deskriptif untuk memudahkan tracking perubahan.</p>
            <ul class="list-disc list-inside text-gray-600 mt-4">
                <li><strong>feat:</strong> Menambahkan fitur baru.</li>
                <li><strong>fix:</strong> Memperbaiki bug.</li>
                <li><strong>docs:</strong> Perubahan dokumentasi.</li>
                <li><strong>style:</strong> Perubahan format atau tampilan tanpa memengaruhi kode.</li>
                <li><strong>refactor:</strong> Perubahan kode tanpa menambah atau memperbaiki fitur.</li>
                <li><strong>test:</strong> Menambahkan atau memperbaiki pengujian.</li>
                <li><strong>chore:</strong> Perubahan yang tidak mempengaruhi kode aplikasi (misalnya konfigurasi, build tools).</li>
                <li><strong>Contoh:</strong> feat: Fitur Login.</li>
                <li><strong>Contoh:</strong> fix: Fitur Login pada bagian authentikasi.</li>
            </ul>
        </section>
    </main>
</body>
</html>
