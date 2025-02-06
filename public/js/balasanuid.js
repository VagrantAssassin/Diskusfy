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
        document
            .getElementById("balasan-form")
            .insertAdjacentHTML(
                "beforeend",
                `<input type="hidden" name="user_uid" value="${user.uid}">`
            );
    } else {
        console.log("No user is signed in");
        window.location.href = "/login";
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("balasan-form");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Mencegah form submit biasa

        const formData = new FormData(form);

        fetch(form.action, {
            method: "POST",
            body: formData,
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    // Tampilkan popup
                    alert(data.message);
                    // Redirect ke halaman lain, misalnya home
                    window.location.href = "/";
                } else {
                    alert("Terjadi kesalahan: " + data.message);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                alert("Terjadi kesalahan saat mengirim data.");
            });
    });
});
