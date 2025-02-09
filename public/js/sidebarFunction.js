document.addEventListener("DOMContentLoaded", function () {
    // Daftar route admin yang ingin dropdown selalu terbuka
    const adminRoutes = [
        "/users",
        "/categoryAdmin",
        "/discussionAdmin",
        "/reply",
    ];
    const currentPath = window.location.pathname;

    // Jika currentPath sama persis atau dimulai dengan salah satu route admin (untuk handling URL dengan parameter)
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
