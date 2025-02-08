document.addEventListener("DOMContentLoaded", function () {
    // Ubah URL endpoint sesuai dengan route yang baru di web.php
    fetch("/dashboard-stats")
        .then((response) => response.json())
        .then((data) => {
            // Update nilai setiap card dengan data yang diambil dari API
            document.getElementById("total-users").innerText = data.totalUsers;
            document.getElementById("total-diskusi").innerText =
                data.totalDiskusi;
            document.getElementById("total-komentar").innerText =
                data.totalKomentar;
            document.getElementById("total-kategori").innerText =
                data.totalKategori;
            document.getElementById("total-votes").innerText = data.totalVotes;

            // Untuk card diskusi terbaru, tampilkan judul diskusinya jika ada
            if (data.latestDiscussion && data.latestDiscussion.judul) {
                document.getElementById("latest-discussion").innerText =
                    data.latestDiscussion.judul;
            }
        })
        .catch((error) =>
            console.error("Error fetching dashboard stats:", error)
        );
});
