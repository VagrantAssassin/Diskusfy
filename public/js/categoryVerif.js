document.addEventListener("DOMContentLoaded", function () {
    const kategoriInput = document.getElementById("kategori");
    const judulInput = document.getElementById("judulDiskusi");
    const isiInput = document.getElementById("isiDiskusi");

    // Daftar kata kunci untuk kategori
    const kategoriKeywords = {
        "Indonesia": ["indonesia", "bahasa", "puisi", "sastra"],
        "Matematika": ["matematika", "aljabar", "geometri", "kalkulus"],
        "Coding": ["coding", "programming", "javascript", "python", "php"],
        "Hukum": ["hukum", "undang", "peraturan", "legal"],
        "Algoritma": ["algoritma", "struktur data", "sorting", "graph"]
    };

    function tentukanKategori() {
        const judul = judulInput.value.toLowerCase();
        const isi = isiInput.value.toLowerCase();
        
        for (const [kategori, keywords] of Object.entries(kategoriKeywords)) {
            if (keywords.some(keyword => judul.includes(keyword) || isi.includes(keyword))) {
                kategoriInput.value = kategori;
                return;
            }
        }
    }

    // Event listener untuk input
    judulInput.addEventListener("input", tentukanKategori);
    isiInput.addEventListener("input", tentukanKategori);
});
