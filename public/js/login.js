import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
import {
    getAuth,
    signInWithEmailAndPassword,
    signInWithPopup,
    GoogleAuthProvider,
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

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const provider = new GoogleAuthProvider();

document.getElementById("login-form").addEventListener("submit", async (e) => {
    e.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    try {
        const userCredential = await signInWithEmailAndPassword(
            auth,
            email,
            password
        );
        alert("Login berhasil!");
        window.location.href = "/"; // Ganti dengan halaman yang sesuai setelah login
    } catch (error) {
        alert("Login gagal: " + error.message);
    }
});

// Handle Google Sign-in
document.getElementById("google-signin").addEventListener("click", async () => {
    try {
        const result = await signInWithPopup(auth, provider);
        alert(
            "Login dengan Google berhasil! Selamat datang, " +
                result.user.displayName
        );
        window.location.href = "/"; // Ganti dengan halaman yang sesuai setelah login
    } catch (error) {
        console.error("Login dengan Google gagal:", error);
        alert("Login dengan Google gagal: " + error.message);
    }
});
