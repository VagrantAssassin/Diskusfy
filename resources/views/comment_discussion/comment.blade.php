<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hoverA.css') }}">
</head>

<body class="bg-white text-green-900">
    <header class="header container-fluid d-flex align-items-center justify-content-between">
        <div class="logo">Diskusfy</div>
        <button class="btn btn-light d-block d-md-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
            <i class="fas fa-bars"></i>
        </button>
        <div class="d-flex flex-grow-1 mx-3 d-none d-md-block">
            <input type="text" class="form-control" placeholder="Cari sesuatu...">
        </div>
        <div class="d-none d-md-block">
            <button class="btn btn-light">Cari Topik</button>
            <button class="btn btn-light">Buat Diskusi Baru</button>
        </div>
    </header>
    <div class="sidebar d-none d-md-block">
        <nav>
            <hr>
            <h5>Menu</h5>
            <ul class="list-unstyled">
                <li><a href="#"><i class="fas fa-home me-2"></i>Home</a></li>
                <li><a href="#"><i class="fas fa-bell me-2"></i>Notifikasi</a></li>
                <li><a href="/edit_profile"><i class="fas fa-user-friends me-2"></i>Profile</a></li>
                <li><a href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
            </ul>
            <hr>
            <h5>Topik</h5>
            <ul class="list-unstyled">
                <li><a href="#"><i class="fas fa-graduation-cap me-2"></i>Pendidikan</a></li>
                <li><a href="#"><i class="fas fa-code me-2"></i>Coding</a></li>
                <li><a href="#"><i class="fas fa-calculator me-2"></i>Matematika</a></li>
                <li><a href="#"><i class="fas fa-university me-2"></i>Kuliah</a></li>
                <li><a href="#"><i class="fas fa-cogs me-2"></i>Algoritma</a></li>
            </ul>
        </nav>
    </div>
    <div class="offcanvas offcanvas-start offcanvas-sidebar" tabindex="-1" id="offcanvasSidebar"
        aria-labelledby="offcanvasSidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <nav>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fas fa-home me-2"></i>Home</a></li>
                    <li><a href="#"><i class="fas fa-bell me-2"></i>Notifikasi</a></li>
                    <li><a href="#"><i class="fas fa-user-friends me-2"></i>Mengikuti</a></li>
                    <li><a href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                </ul>
                <hr>
                <h5>Topik</h5>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fas fa-graduation-cap me-2"></i>Pendidikan</a></li>
                    <li><a href="#"><i class="fas fa-code me-2"></i>Coding</a></li>
                    <li><a href="#"><i class="fas fa-calculator me-2"></i>Matematika</a></li>
                    <li><a href="#"><i class="fas fa-university me-2"></i>Kuliah</a></li>
                    <li><a href="#"><i class="fas fa-cogs me-2"></i>Algoritma</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <main class="content">
        <div class="max-w-4xl mx-auto p-4">

            <!-- Topik Diskusi -->
            <div class="bg-white text-white p-3 rounded shadow-sm">
                <h2 class="text-lg font-semibold mt-4 text-green-800">GeForce GRD 572.16 Feedback Thread
                    (Released 1/30/25)</h2>
                <div class="mt-2 border-t border-black pt-2">
                    <div class="bg-green-100 p-3 rounded-lg flex items-start mt-3">
                        <p class="mt-1 text-green-700">
                            menggunakan fitur baru aplikasi NVIDIA.
                            Aplikasi NVIDIA: Optimasi dan peningkatan RTX Video Super Resolution, pengaturan tampilan
                            ganda
                            baru,
                            dukungan Advanced Optimus, dan lainnya diperkenalkan dalam pembaruan aplikasi NVIDIA yang
                            baru.
                            NVIDIA Broadcast: Perbarui aplikasi populer sekarang untuk menambahkan dua efek bertenaga AI
                            baru.
                            Pembaruan Game RTX: Dapatkan Game Ready untuk DLSS 4 dengan Multi Frame Generation, Ray
                            Reconstruction,
                            RTX Mega Geometry, RTX Hair, dan Neural Radiance Cache, dalam pembaruan baru untuk Alan Wake
                            2,
                            Cyberpunk 2077, Hogwarts Legacy, Indiana Jones and the Great Circle™, dan Star Wars™
                            Outlaws.
                            NVIDIA Smooth Motion: Model AI berbasis driver baru menghadirkan gameplay yang lebih halus
                            dengan
                            menyimpulkan frame tambahan di antara dua frame yang dirender pada GPU GeForce RTX 50
                            Series.
                            Game Baru: Dapatkan Game Ready untuk rilis Kingdom Come: Deliverance II dan Marvel's
                            Spider-Man
                            2,
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tambah Komentar -->
            <div class="bg-green-100 p-3 rounded-lg shadow-lg mt-3">
                <div class="flex items-center border-b border-green-300 pb-2">
                    <input type="text" class="w-full bg-white text-green-900 p-2 rounded-lg"
                        placeholder="Tambahkan komentar...">
                    <button class="ml-2 bg-green-600 px-6 py-1 rounded-full text-white text-sm">Tambahkan
                        komentar</button>
                </div>
            </div>

            <!-- Komentar Balasam -->
            <h2 class="text-lg font-semibold mt-4 text-green-800">Komentar</h2>
            <div class="mt-2 border-t border-black pt-2">
                <div class="bg-green-50 p-3 rounded-lg flex items-start mt-3">
                    <img src="https://via.placeholder.com/40" alt="Profile" class="w-10 h-10 rounded-full">
                    <div class="ml-3 w-full">
                        <div class="flex justify-between">
                            <span class="font-bold text-green-800">Pablo Lannister</span>
                            <span class="text-green-500 text-sm">6d</span>
                        </div>
                        <p class="mt-1 text-green-700">
                            Saya mengunduh driver Game Ready 572.16 pada hari pertama, mencopotnya dengan DDU dan
                            kemudian
                            menginstalnya kembali, tetapi setiap kali saya mengalami masalah yang sama: banyak
                            stuttering
                            dan penurunan FPS yang tidak wajar (dari 120 ke 80 atau 70) di Final Fantasy 16 dan
                            (walaupun
                            sedikit) di demo The First Berserker Khazan, tetapi masalahnya yang paling parah ada di
                            FF16.
                            Saya memainkan kedua game tersebut dengan pengaturan 120 FPS pada resolusi 1080p, kartu
                            grafis
                            MSI 4080 Super, i9 10900k, motherboard MSI Z490 Gaming Plus, RAM Corsair DDR4 32 GB, NVMe
                            Samsung 980 Pro, Windows 10 Pro 64 bit. Saya harus kembali ke driver Game Ready bulan
                            Desember,
                            dan driver tersebut bekerja dengan sangat baik. Mohon segera diperbaiki.
                        </p>
                        <div class="flex items-center mt-2 text-green-600 text-sm">
                            <div class="flex items-center space-x-2">
                                <!-- UPVOTE -->
                                <button id="upvote"
                                    class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-green-200 focus:ring focus:ring-green-500 transition"
                                    onclick="toggleVote('upvote')">
                                    <svg id="upvoteIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="currentColor" class="text-green-400">
                                        <path d="M12 4l-8 10h6v6h4v-6h6z" />
                                    </svg>
                                </button>

                                <span id="voteCount" class="text-green-700">416</span>

                                <!-- DOWNVOTE -->
                                <button id="downvote"
                                    class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-green-200 focus:ring focus:ring-red-500 transition"
                                    onclick="toggleVote('downvote')">
                                    <svg id="downvoteIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="currentColor" class="text-green-400">
                                        <path d="M12 20l8-10h-6v-6h-4v6h-6z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/vote.js') }}"></script>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>