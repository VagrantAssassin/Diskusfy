document.addEventListener("DOMContentLoaded", function () {
    const commentButtons = document.querySelectorAll("[id^='commentButton']");
    const mainContent = document.getElementById("mainContent");

    commentButtons.forEach(button => {
        button.addEventListener("click", function () {
            fetch("/comment")
                .then(response => response.text())
                .then(data => {
                    mainContent.innerHTML = `
                        <div class="d-flex justify-content-center align-items-center min-vh-100">
                            <div class="w-100" style="max-width: 700px;">
                                ${data}
                            </div>
                        </div>
                    `;

                    // Eksekusi ulang script yang ada di dalam data
                    const scripts = mainContent.querySelectorAll("script");
                    scripts.forEach(script => {
                        const newScript = document.createElement("script");
                        if (script.src) {
                            newScript.src = script.src; // Jika script eksternal, tambahkan sebagai src
                            newScript.async = false;
                        } else {
                            newScript.textContent = script.textContent; // Jika inline script, eksekusi ulang
                        }
                        document.body.appendChild(newScript);
                        document.body.removeChild(newScript); // Hapus agar tidak duplikasi
                    });
                })
                .catch(error => console.error("Error:", error));
        });
    });
});
