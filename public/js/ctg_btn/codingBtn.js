document.addEventListener("DOMContentLoaded", function () {
    const codingBtn = document.getElementById("codingBtn");
    const mainContent = document.getElementById("mainContent");

    codingBtn.addEventListener("click", function () {
        fetch("/coding")
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
