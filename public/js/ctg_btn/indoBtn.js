document.addEventListener("DOMContentLoaded", function () {
    const indoBtn = document.getElementById("indoBtn");
    const mainContent = document.getElementById("mainContent");

    indoBtn.addEventListener("click", function () {
        fetch("/indonesia")
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
