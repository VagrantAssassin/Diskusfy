document.addEventListener("DOMContentLoaded", function () {
    fetchReplies();
});

function fetchReplies() {
    fetch("/reply/data")
        .then((response) => response.json())
        .then((replies) => {
            const tableBody = document.getElementById("replyTableBody");
            tableBody.innerHTML = "";
            replies.forEach((reply) => {

                let isi = reply.isi_balasan;
                if (isi.length > 50) {
                    isi = isi.substring(0, 50) + "...";
                }
                const row = `
            <tr>
              <td class="border px-4 py-2">${reply.id_balasan}</td>
              <td class="border px-4 py-2">${reply.parent_id ?? ""}</td>
              <td class="border px-4 py-2">${reply.id_diskusi}</td>
              <td class="border px-4 py-2">${reply.uid}</td>
              <td class="border px-4 py-2">${isi}</td>
              <td class="border px-4 py-2">
                <button onclick="editReply('${
                    reply.id_balasan
                }')" class="bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
                <button onclick="deleteReply('${
                    reply.id_balasan
                }')" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
              </td>
            </tr>
          `;
                tableBody.innerHTML += row;
            });
        })
        .catch((error) => console.error("Error fetching replies:", error));
}

function editReply(id) {
    fetch(`/reply/${id}`)
        .then((response) => response.json())
        .then((reply) => {
            document.getElementById("editIdBalasan").value = reply.id_balasan;
            document.getElementById("editParentId").value = reply.parent_id;
            document.getElementById("editIdDiskusi").value = reply.id_diskusi;
            document.getElementById("editUid").value = reply.uid;
            document.getElementById("editIsiBalasan").value = reply.isi_balasan;
            document.getElementById("editModal").classList.remove("hidden");
        })
        .catch((error) => console.error("Error fetching reply:", error));
}

function updateReply() {
    const id = document.getElementById("editIdBalasan").value;
    const data = {
        parent_id: document.getElementById("editParentId").value,
        id_diskusi: document.getElementById("editIdDiskusi").value,
        uid: document.getElementById("editUid").value,
        isi_balasan: document.getElementById("editIsiBalasan").value,
    };

    fetch(`/reply/${id}`, {
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
            fetchReplies();
        })
        .catch((error) => console.error("Error updating reply:", error));
}

function deleteReply(id) {
    if (confirm("Are you sure you want to delete this reply?")) {
        fetch(`/reply/${id}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
        })
            .then((response) => response.json())
            .then(() => fetchReplies())
            .catch((error) => console.error("Error deleting reply:", error));
    }
}
