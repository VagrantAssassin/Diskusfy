document.addEventListener("DOMContentLoaded", function () {
    const adminRoutes = [
        "/users",
        "/categoryAdmin",
        "/discussionAdmin",
        "/reply",
    ];
    const currentPath = window.location.pathname;

    if (
        adminRoutes.some(
            (route) =>
                currentPath === route || currentPath.startsWith(route + "/")
        )
    ) {
        const dropdown = document.getElementById("dropdown-pages");
        if (dropdown) {
            dropdown.classList.remove("hidden");
            dropdown.classList.add("block");
        }
    }
});
