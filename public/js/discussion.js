document.addEventListener("DOMContentLoaded", function () {
    const createDiscussionButton = document.getElementById("createDiscussionButton");
    const mainContent = document.getElementById("mainContent");

    createDiscussionButton.addEventListener("click", function () {
        fetch("/new_discussion")
            .then(response => response.text())
            .then(data => {
                mainContent.innerHTML = `
                    <div class="d-flex justify-content-center align-items-center min-vh-100">
                        <div class="w-100" style="max-width: 700px;">
                            ${data}
                        </div>
                    </div>
                `;
            })
            .catch(error => console.error("Error:", error));
    });
});
