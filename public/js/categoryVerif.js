document.addEventListener("DOMContentLoaded", function () {
    const kategoriSelect = document.getElementById("kategori");
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
                return;
            }
        }

        // Jika tidak cocok, kosongkan pilihan kategori
        kategoriSelect.value = "";
    }

    // Event listener untuk perubahan pada input
    judulInput.addEventListener("input", tentukanKategori);
    isiInput.addEventListener("input", tentukanKategori);
});