document.addEventListener("DOMContentLoaded", function () {
    const commentButtons = document.querySelectorAll("[id^='commentButton']");
    const mainContent = document.getElementById("mainContent");

    commentButtons.forEach((button) => {
        button.addEventListener("click", function () {
            fetch("/comment")
                .then((response) => response.text())
                .then((data) => {
                    mainContent.innerHTML = `
                        <div class="flex justify-center items-center min-h-screen">
                            <div class="w-full max-w-auto">
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