document.addEventListener("DOMContentLoaded", function () {
    fetchDiscussions();
});

function fetchDiscussions() {
    // Mengambil data diskusi dari endpoint "/discussionAdmin/data"
    fetch("/discussionAdmin/data")
        .then((response) => response.json())
        .then((discussions) => {
            const tableBody = document.getElementById("discussionTableBody");
            tableBody.innerHTML = "";
            discussions.forEach((discussion) => {
                // Jika isi diskusi terlalu panjang, kita tampilkan hanya sebagian teks
                let isi = discussion.isi_diskusi;
                if (isi.length > 50) {
                    isi = isi.substring(0, 50) + "...";
                }
                const row = `
            <tr>
              <td class="border px-4 py-2">${discussion.id_diskusi}</td>
              <td class="border px-4 py-2">${discussion.id_kategori ?? ""}</td>
              <td class="border px-4 py-2">${discussion.uid}</td>
              <td class="border px-4 py-2">${discussion.judul}</td>
              <td class="border px-4 py-2">${isi}</td>
              <td class="border px-4 py-2">
                <button onclick="editDiscussion('${
                    discussion.id_diskusi
                }')" class="bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
                <button onclick="deleteDiscussion('${
                    discussion.id_diskusi
                }')" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
              </td>
            </tr>
          `;
                tableBody.innerHTML += row;
            });
        })
        .catch((error) => console.error("Error fetching discussions:", error));
}

function editDiscussion(id) {
    fetch(`/discussionAdmin/${id}`)
        .then((response) => response.json())
        .then((discussion) => {
            document.getElementById("editIdDiskusi").value =
                discussion.id_diskusi;
            document.getElementById("editIdKategori").value =
                discussion.id_kategori;
            document.getElementById("editUid").value = discussion.uid;
            document.getElementById("editJudul").value = discussion.judul;
            document.getElementById("editIsiDiskusi").value =
                discussion.isi_diskusi;
            document.getElementById("editModal").classList.remove("hidden");
        })
        .catch((error) => console.error("Error fetching discussion:", error));
}

function updateDiscussion() {
    const id = document.getElementById("editIdDiskusi").value;
    const data = {
        id_kategori: document.getElementById("editIdKategori").value,
        uid: document.getElementById("editUid").value,
        judul: document.getElementById("editJudul").value,
        isi_diskusi: document.getElementById("editIsiDiskusi").value,
    };

    fetch(`/discussionAdmin/${id}`, {
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
            fetchDiscussions();
        })
        .catch((error) => console.error("Error updating discussion:", error));
}

function deleteDiscussion(id) {
    if (confirm("Are you sure you want to delete this discussion?")) {
        fetch(`/discussionAdmin/${id}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
        })
            .then((response) => response.json())
            .then(() => fetchDiscussions())
            .catch((error) =>
                console.error("Error deleting discussion:", error)
            );
    }
}
