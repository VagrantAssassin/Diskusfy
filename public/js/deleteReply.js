import {
    getApps,
    initializeApp,
} from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
import {
    getAuth,
    onAuthStateChanged,
} from "https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js";

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

// Inisialisasi Firebase jika belum ada aplikasi yang diinisialisasi
if (!getApps().length) {
    initializeApp(firebaseConfig);
}

const auth = getAuth();

// Variabel global untuk menyimpan UID pengguna yang sedang login
let globalCurrentUserUid = null;

// Cek apakah pengguna sudah login dan simpan UID
onAuthStateChanged(auth, (user) => {
    if (user) {
        globalCurrentUserUid = user.uid;
        // Cari semua tombol delete reply dan sembunyikan yang tidak sesuai dengan UID pengguna
        const deleteReplyButtons = document.querySelectorAll(".delete-reply-button");
        deleteReplyButtons.forEach((button) => {
            const replyUid = button.getAttribute("data-reply-uid");
            if (replyUid !== user.uid) {
                button.style.display = "none";
            }
        });
    } else {
        console.log("User belum login.");
        window.location.href = "/login";
    }
});

// Fungsi global untuk menghapus reply
window.deleteReply = function (replyId) {
    if (confirm("Apakah Anda yakin ingin menghapus reply ini?")) {
        // Jika diperlukan, kirim user_uid sebagai parameter (opsional)
        const url = `/delete-reply/${replyId}?user_uid=${globalCurrentUserUid}`;
        fetch(url, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            },
        })
        .then((response) => {
            if (response.ok) {
                // Reload halaman untuk memperbarui daftar reply
                location.reload();
            } else {
                alert("Gagal menghapus reply.");
            }
        })
        .catch((error) => {
            console.error("Error deleting reply:", error);
            alert("Terjadi kesalahan saat menghapus reply.");
        });
    }
};
