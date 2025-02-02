<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskusfy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hoverA.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
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
            <button class="btn btn-light" id="createDiscussionButton">Buat Diskusi Baru</button>
        </div>
    </header>

    <div class="sidebar d-none d-md-block">
        <nav>
            <hr>
            <h5>Menu</h5>
            <ul class="list-unstyled">
                <li><a href="/"><i class="fas fa-home me-2"></i>Beranda</a></li>
                <li><a href="#"><i class="fas fa-bell me-2"></i>Notifikasi</a></li>
                <li><a href="/edit_profile"><i class="fas fa-user-friends me-2"></i>Profil</a></li>
                <li><a href="#"><i class="fas fa-sign-out-alt me-2"></i>Keluar</a></li>
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

    <main class="content" id="mainContent">
        <h1>Selamat Datang di Diskusfy</h1>
        <p>Ini adalah contoh konten utama.</p>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="{{ asset('js/discussion.js') }}"></script>
</body>

</html>
