document.addEventListener("DOMContentLoaded", function () {
    const mtkBtn = document.getElementById("mtkBtn");
    const mainContent = document.getElementById("mainContent");

    mtkBtn.addEventListener("click", function () {
        fetch("/matematika")
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
