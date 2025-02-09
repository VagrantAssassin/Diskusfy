import { getApps, initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
import { getAuth, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js";

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

function getIdBalasanFromAction(actionUrl) {
    const parts = actionUrl.split('/');
    return parts[parts.length - 1];
}

window.showAlertAndReload = function(message) {
    alert(message);
    window.location.reload();
}


onAuthStateChanged(auth, (user) => {
    if (user) {
        console.log("User is signed in (reply):", user);

        document.querySelectorAll('.reply-form form').forEach(form => {
            form.addEventListener('submit', (event) => {
                event.preventDefault();

                const textarea = form.querySelector('textarea');
                const isiBalasan2 = textarea.value.trim();
                if (!isiBalasan2) return; 

                const actionUrl = form.getAttribute('action');
                const id_balasan = getIdBalasanFromAction(actionUrl);

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
                        user_uid: user.uid,
                    }),
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        console.log("Reply berhasil disimpan");
                        textarea.value = "";
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
