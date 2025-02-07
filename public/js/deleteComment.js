// public/js/deleteComment.js
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

// Inisialisasi Firebase hanya jika belum diinisialisasi
if (!getApps().length) {
    initializeApp(firebaseConfig);
}

const auth = getAuth();

// Cek apakah pengguna sudah login
onAuthStateChanged(auth, (user) => {
    if (user) {
        const currentUserUid = user.uid;
        // Ambil semua tombol delete
        const deleteButtons = document.querySelectorAll(".delete-button");
        deleteButtons.forEach((button) => {
            const commentUid = button.getAttribute("data-comment-uid");
            // Jika UID komentar tidak sama dengan UID pengguna yang login, sembunyikan tombolnya
            if (commentUid !== currentUserUid) {
                button.style.display = "none";
            }
        });
    } else {
        console.log("User belum login.");
        // Redirect ke halaman login jika belum login (opsional)
        window.location.href = "/login";
    }
});

// Fungsi global untuk menghapus komentar
window.deleteComment = function (commentId) {
    if (confirm("Apakah Anda yakin ingin menghapus komentar ini?")) {
        fetch(`/delete-comment/${commentId}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        })
            .then((response) => {
                if (response.ok) {
                    // Reload halaman untuk memperbarui daftar komentar
                    location.reload();
                } else {
                    alert("Gagal menghapus komentar.");
                }
            })
            .catch((error) => {
                console.error("Error deleting comment:", error);
                alert("Terjadi kesalahan saat menghapus komentar.");
            });
    }
};
