// resources/js/register.js
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
import {
    getAuth,
    createUserWithEmailAndPassword,
    sendEmailVerification,
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

async function handleResponse(response) {
    if (!response.ok) {
        if (response.status === 422) {
            const errorData = await response.json();

            throw new Error(
                "Validation Error: " + JSON.stringify(errorData.errors)
            );
        } else {
            const errorText = await response.text();
            throw new Error(
                "Error dari server (status " +
                    response.status +
                    "): " +
                    errorText
            );
        }
    }
    return await response.json();
}

document
    .getElementById("register-form")
    .addEventListener("submit", async (e) => {
        e.preventDefault();

        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value;
        const username = document.getElementById("username").value.trim();
        const nama = document.getElementById("nama").value.trim();

        if (!email || !password || !username || !nama) {
            alert("Semua field harus diisi.");
            return;
        }

        try {
            const userCredential = await createUserWithEmailAndPassword(
                auth,
                email,
                password
            );
            const user = userCredential.user;
            await sendEmailVerification(user);

            const response = await fetch("/register", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({
                    uid: user.uid,
                    email: email,
                    username: username,
                    nama: nama,
                }),
            });

            const data = await handleResponse(response);

            if (data.success) {
                alert(
                    "Registrasi berhasil! Silakan cek email verifikasi Anda. Klik OK untuk masuk ke halaman login."
                );
                window.location.href = "/login";
            } else {
                alert("Gagal menambahkan pengguna di server.");
            }
        } catch (error) {
            console.error("Registrasi error:", error);
            alert("Registrasi gagal: " + error.message);
        }
    });

document.getElementById("google-signup").addEventListener("click", async () => {
    try {
        const result = await signInWithPopup(auth, provider);
        const user = result.user;
        const email = user.email;
        const uid = user.uid;
        const username = email;
        const nama = email;

        const response = await fetch("/register", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify({
                uid,
                email,
                username,
                nama,
            }),
        });

        const data = await handleResponse(response);

        if (data.success) {
            alert(
                "Registrasi dengan Google berhasil! Selamat datang, " + email
            );
            window.location.href = "/";
        } else {
            alert("Gagal menambahkan pengguna di server.");
        }
    } catch (error) {
        console.error("Google sign-up error:", error);
        alert("Login dengan Google gagal: " + error.message);
    }
});
