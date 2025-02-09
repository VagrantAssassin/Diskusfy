import { getApps, initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
import { getAuth, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js";

// Konfigurasi Firebase
const firebaseConfig = {
    apiKey: "AIzaSyCyUNuYlWR-uFEUlXbL_-2Hm4t4u70Af4U",
    authDomain: "diskusfy.firebaseapp.com",
    projectId: "diskusfy",
    storageBucket: "diskusfy.firebasestorage.app",
    messagingSenderId: "525348408114",
    appId: "1:525348408114:web:56d959b778c20d63f3a52b",
    measurementId: "G-Y5MY8ZNNL0",
};

// Inisialisasi Firebase jika belum ada
if (!getApps().length) {
    initializeApp(firebaseConfig);
}

const auth = getAuth();

// Fungsi untuk mengambil id_balasan dari URL form
function getIdBalasanFromAction(actionUrl) {
    // Misal actionUrl: "/reply/123", kita ambil angka terakhir
    const parts = actionUrl.split('/');
    return parts[parts.length - 1];
}

// Fungsi global untuk menampilkan alert dan melakukan reload halaman
window.showAlertAndReload = function(message) {
    alert(message);
    window.location.reload();
}

// Setelah memastikan pengguna sudah login, daftarkan event listener pada form reply
onAuthStateChanged(auth, (user) => {
    if (user) {
        console.log("User is signed in (reply):", user);

        // Cari semua form reply (pastikan tiap form reply memiliki class khusus, misalnya 'reply-form')
        document.querySelectorAll('.reply-form form').forEach(form => {
            form.addEventListener('submit', (event) => {
                event.preventDefault();

                // Ambil nilai dari textarea dalam form reply
                const textarea = form.querySelector('textarea');
                const isiBalasan2 = textarea.value.trim();
                if (!isiBalasan2) return; // Jangan submit jika kosong

                // Dapatkan id_balasan dari URL action form (misalnya "/reply/123")
                const actionUrl = form.getAttribute('action');
                const id_balasan = getIdBalasanFromAction(actionUrl);

                // Lakukan fetch ke endpoint reply menggunakan metode POST
                fetch(actionUrl, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify({
                        isi_balasan2: isiBalasan2,
                        user_uid: user.uid, // ambil uid dari firebase
                    }),
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        console.log("Reply berhasil disimpan");
                        // Bersihkan textarea
                        textarea.value = "";
                        // Tampilkan alert dan reload halaman setelah tombol OK ditekan
                        window.showAlertAndReload("Reply berhasil disimpan!");
                    } else {
                        console.error("Gagal menyimpan reply");
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
            });
        });
    } else {
        console.log("No user is signed in (reply)");
        window.location.href = "/login";
    }
});
