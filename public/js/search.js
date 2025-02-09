// Fungsi untuk menjalankan pencarian
function searchDiscussion() {
    const query = document.getElementById("search-navbar").value;

    // Menggunakan fetch API untuk mengirim permintaan GET ke route pencarian
    fetch(`/search?query=${encodeURIComponent(query)}`)
        .then((response) => response.text())
        .then((html) => {
            // Memasukkan hasil HTML ke dalam div mainContent
            document.getElementById("mainContent").innerHTML = html;
        })
        .catch((error) =>
            console.error("Error fetching search results:", error)
        );
}

// Menjalankan pencarian ketika tombol "Search" diklik
document
    .querySelector('button[type="button"]')
    .addEventListener("click", function (e) {
        e.preventDefault();
        searchDiscussion();
    });

// Menjalankan pencarian ketika menekan tombol Enter di input search
document
    .getElementById("search-navbar")
    .addEventListener("keypress", function (e) {
        if (e.key === "Enter") {
            e.preventDefault();
            searchDiscussion();
        }
    });
