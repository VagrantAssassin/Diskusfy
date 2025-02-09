function searchDiscussion() {
    const query = document.getElementById("search-navbar").value;

    fetch(`/search?query=${encodeURIComponent(query)}`)
        .then((response) => response.text())
        .then((html) => {
            document.getElementById("mainContent").innerHTML = html;
        })
        .catch((error) =>
            console.error("Error fetching search results:", error)
        );
}

document
    .querySelector('button[type="button"]')
    .addEventListener("click", function (e) {
        e.preventDefault();
        searchDiscussion();
    });

document
    .getElementById("search-navbar")
    .addEventListener("keypress", function (e) {
        if (e.key === "Enter") {
            e.preventDefault();
            searchDiscussion();
        }
    });
