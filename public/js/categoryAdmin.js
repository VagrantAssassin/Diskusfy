document.addEventListener("DOMContentLoaded", function () {
    fetchCategories();
});

function fetchCategories() {
    // Mengambil data kategori dari endpoint "/categoryAdmin/data"
    fetch("/categoryAdmin/data")
        .then((response) => response.json())
        .then((categories) => {
            const tableBody = document.getElementById("categoryTableBody");
            tableBody.innerHTML = "";
            categories.forEach((category) => {
                const row = `
            <tr>
              <td class="border px-4 py-2">${category.id_kategori}</td>
              <td class="border px-4 py-2">${category.nama_kategori}</td>
              <td class="border px-4 py-2">
                <button onclick="editCategory('${category.id_kategori}')" class="bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
                <button onclick="deleteCategory('${category.id_kategori}')" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
              </td>
            </tr>
          `;
                tableBody.innerHTML += row;
            });
        })
        .catch((error) => console.error("Error fetching categories:", error));
}

function editCategory(id) {
    fetch(`/categoryAdmin/${id}`)
        .then((response) => response.json())
        .then((category) => {
            document.getElementById("editIdKategori").value =
                category.id_kategori;
            document.getElementById("editNamaKategori").value =
                category.nama_kategori;
            document.getElementById("editModal").classList.remove("hidden");
        })
        .catch((error) => console.error("Error fetching category:", error));
}

function updateCategory() {
    const id = document.getElementById("editIdKategori").value;
    const data = {
        nama_kategori: document.getElementById("editNamaKategori").value,
    };

    fetch(`/categoryAdmin/${id}`, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then(() => {
            document.getElementById("editModal").classList.add("hidden");
            fetchCategories();
        })
        .catch((error) => console.error("Error updating category:", error));
}

function deleteCategory(id) {
    if (confirm("Are you sure you want to delete this category?")) {
        fetch(`/categoryAdmin/${id}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
        })
            .then((response) => response.json())
            .then(() => fetchCategories())
            .catch((error) => console.error("Error deleting category:", error));
    }
}
