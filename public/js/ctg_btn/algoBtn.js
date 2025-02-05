document.addEventListener("DOMContentLoaded", function () {
    const algoBtn = document.getElementById("algoBtn");
    const mainContent = document.getElementById("mainContent");

    algoBtn.addEventListener("click", function () {
        fetch("/algoritma")
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
