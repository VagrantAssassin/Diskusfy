document.addEventListener("DOMContentLoaded", function () {
    const commentButtons = document.querySelectorAll(".commentButton"); // Pakai class bukan ID
    const mainContent = document.getElementById("mainContent");

    commentButtons.forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();

            const diskusiId = this.getAttribute("data-id"); // Ambil ID dari atribut data-id

            fetch("/comment/" + diskusiId)
                .then((response) => response.text())
                .then((data) => {
                    mainContent.innerHTML = `
                        <div class="justify-center items-center">
                            <div class="w-full">
                                ${data}
                            </div>
                        </div>
                    `;

                    // Eksekusi ulang script yang ada di dalam data
                    const scripts = mainContent.querySelectorAll("script");
                    scripts.forEach((script) => {
                        const newScript = document.createElement("script");
                        if (script.src) {
                            newScript.src = script.src;
                            newScript.async = false;
                        } else {
                            newScript.textContent = script.textContent;
                        }
                        document.body.appendChild(newScript);
                        document.body.removeChild(newScript);
                    });
                })
                .catch((error) => console.error("Error:", error));
        });
    });
});
