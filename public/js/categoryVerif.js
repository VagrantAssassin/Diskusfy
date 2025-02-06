document.addEventListener("DOMContentLoaded", function () {
    const kategoriSelect = document.getElementById("kategori");
    const kategoriBaruInput = document.getElementById("kategoriBaru");
    const judulInput = document.getElementById("judulDiskusi");
    const isiInput = document.getElementById("isiDiskusi");

    // Daftar kata kunci untuk kategori
    const kategoriKeywords = {
        "1": ["indonesia", "bahasa", "puisi", "sastra"],
        "2": ["matematika", "aljabar", "geometri", "kalkulus"],
        "3": ["coding", "programming", "javascript", "python", "php"],
        "4": ["hukum", "undang", "peraturan", "legal"],
        "5": ["algoritma", "struktur data", "sorting", "graph"]
    };

    function tentukanKategori() {
        const judul = judulInput.value.toLowerCase();
        const isi = isiInput.value.toLowerCase();
        
        for (const [id, keywords] of Object.entries(kategoriKeywords)) {
            if (keywords.some(keyword => judul.includes(keyword) || isi.includes(keyword))) {
                kategoriSelect.value = id;
                kategoriBaruInput.value = ""; // Kosongkan input kategori baru jika kategori otomatis dipilih
                return;
            }
        }

        // Jika tidak cocok, kosongkan pilihan kategori
        kategoriSelect.value = "";
    }

    // Event listener untuk perubahan pada input
    judulInput.addEventListener("input", tentukanKategori);
    isiInput.addEventListener("input", tentukanKategori);

    // Pastikan pengguna hanya memilih salah satu antara kategori dropdown atau input kategori baru
    kategoriSelect.addEventListener("change", function () {
        if (kategoriSelect.value !== "") {
            kategoriBaruInput.value = "";
        }
    });

    kategoriBaruInput.addEventListener("input", function () {
        if (kategoriBaruInput.value.trim() !== "") {
            kategoriSelect.value = "";
        }
    });
});
