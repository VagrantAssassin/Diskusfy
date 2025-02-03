import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
import {
    getAuth,
    createUserWithEmailAndPassword,
    signInWithPopup,
    GoogleAuthProvider,
} from "https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js";

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

// Handle email/password registration
document
    .getElementById("register-form")
    .addEventListener("submit", async (e) => {
        e.preventDefault();

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        try {
            const userCredential = await createUserWithEmailAndPassword(
                auth,
                email,
                password
            );
            alert("Registrasi berhasil! Anda sekarang dapat masuk.");
            window.location.href = "/login";
        } catch (error) {
            alert("Registrasi gagal: " + error.message);
        }
    });

// Handle Google sign-up
document.getElementById("google-signup").addEventListener("click", async () => {
    try {
        const result = await signInWithPopup(auth, provider);
        alert(
            "Login dengan Google berhasil! Selamat datang, " +
                result.user.displayName
        );
        window.location.href = "/"; // Sesuaikan dengan halaman setelah login
    } catch (error) {
        alert("Login dengan Google gagal: " + error.message);
    }
});
