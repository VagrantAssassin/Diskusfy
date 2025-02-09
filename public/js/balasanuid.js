import {
    getApps,
    initializeApp,
} from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
import {
    getAuth,
    onAuthStateChanged,
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


if (!getApps().length) {
    initializeApp(firebaseConfig);
}

const auth = getAuth();


window.showPostAlert = function () {
    alert("Komentar telah di post!");
    window.location.reload();
};


onAuthStateChanged(auth, (user) => {
    if (user) {
        console.log("User is signed in:", user);
        const form = document.querySelector("form");
        const textarea = document.getElementById("isi_balasan");

        form.addEventListener("submit", (event) => {
            event.preventDefault();
            const isiBalasan = textarea.value.trim();
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
                        user_uid: user.uid,
                    }),
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.success) {
                            console.log("Data berhasil disimpan");
                            textarea.value = "";
                            
                            window.showPostAlert();
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
