import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
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

// Inisialisasi Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

// Periksa status login
onAuthStateChanged(auth, (user) => {
    if (user) {
        const uid = user.uid;

        // Ambil data profil dari backend menggunakan uid
        fetch(`/api/profile/${uid}`)
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    const userData = data.data;
                    document.getElementById("uid").value = userData.uid;
                    document.getElementById("username").value =
                        userData.username;
                    document.getElementById("email").value = userData.email;
                    document.getElementById("name").value = userData.nama;
                    // Update tampilan nama di atas foto profil (jika diinginkan)
                    document.getElementById("display-name").textContent =
                        userData.nama;
                } else {
                    console.error("Data user tidak ditemukan:", data.message);
                }
            })
            .catch((err) => console.error("Error fetching profile:", err));

        // Tangani submit form untuk update profil
        const form = document.getElementById("profile-form");
        form.addEventListener("submit", (event) => {
            event.preventDefault();
            const uid = document.getElementById("uid").value;
            const username = document.getElementById("username").value;
            const email = document.getElementById("email").value;
            const nama = document.getElementById("name").value;

            fetch("/api/profile/update", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({
                    uid: uid,
                    username: username,
                    email: email,
                    nama: nama,
                }),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        alert("Profil berhasil diperbarui.");
                    } else {
                        alert("Gagal memperbarui profil.");
                        console.error(data.errors);
                    }
                })
                .catch((err) => console.error("Error updating profile:", err));
        });
    } else {
        console.log("User belum login. Redirect ke halaman login.");
        window.location.href = "/login";
    }
});
