document.addEventListener("DOMContentLoaded", function () {
    const hukumBtn = document.getElementById("hukumBtn");
    const mainContent = document.getElementById("mainContent");

    hukumBtn.addEventListener("click", function () {
        fetch("/hukum")
            .then(response => response.text())
            .then(data => {
                mainContent.innerHTML = `
                    <div class="justify-center items-center">
                            <div class="w-full">
                                ${data}
                            </div>
                        </div>
                    `;
            })
            .catch(error => console.error("Error:", error));
    });
});
