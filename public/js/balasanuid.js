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

// Cek apakah user sudah login
onAuthStateChanged(auth, (user) => {
    if (user) {
        console.log("User is signed in:", user);
        // Ambil elemen form dan textarea
        const form = document.querySelector("form");
        const textarea = document.getElementById("isi_balasan");

        form.addEventListener("submit", (event) => {
            event.preventDefault();
            const isiBalasan = document
                .getElementById("isi_balasan")
                .value.trim();
            if (isiBalasan) {
                fetch(`/balasan/store/${diskusiId}`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify({
                        isi_balasan: isiBalasan,
                        user_uid: user.uid, // Pastikan user sudah didefinisikan (misalnya dari Firebase)
                    }),
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.success) {
                            console.log("Data berhasil disimpan");
                            document.getElementById("isi_balasan").value = "";
                        } else {
                            console.log("Gagal menyimpan data");
                        }
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                    });
            }
        });
    } else {
        console.log("No user is signed in");
        window.location.href = "/login";
    }
});
