document.addEventListener("DOMContentLoaded", function () {
    fetchUsers();
});

function fetchUsers() {
    fetch("/users/data")
        .then((response) => response.json())
        .then((users) => {
            let tableBody = document.getElementById("userTableBody");
            tableBody.innerHTML = "";

            users.forEach((user) => {
                let row = `<tr>
            <td class="border px-4 py-2">${user.uid}</td>
            <td class="border px-4 py-2">${user.username}</td>
            <td class="border px-4 py-2">${user.email}</td>
            <td class="border px-4 py-2">${user.nama}</td>
            <td class="border px-4 py-2">
              <button onclick="editUser('${user.uid}')" class="bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
              <button onclick="deleteUser('${user.uid}')" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
            </td>
          </tr>`;
                tableBody.innerHTML += row;
            });
        })
        .catch((error) => console.error("Error fetching users:", error));
}

function editUser(uid) {
    fetch(`/users/${uid}`)
        .then((response) => response.json())
        .then((user) => {
            document.getElementById("editUid").value = user.uid;
            document.getElementById("editUsername").value = user.username;
            document.getElementById("editEmail").value = user.email;
            document.getElementById("editNama").value = user.nama;
            document.getElementById("editModal").classList.remove("hidden");
        })
        .catch((error) => console.error("Error fetching user:", error));
}

function updateUser() {
    let uid = document.getElementById("editUid").value;
    let data = {
        username: document.getElementById("editUsername").value,
        email: document.getElementById("editEmail").value,
        nama: document.getElementById("editNama").value,
    };

    fetch(`/users/${uid}`, {
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
            fetchUsers();
        })
        .catch((error) => console.error("Error updating user:", error));
}

function deleteUser(uid) {
    if (confirm("Are you sure you want to delete this user?")) {
        fetch(`/users/${uid}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
        })
            .then((response) => response.json())
            .then(() => fetchUsers())
            .catch((error) => console.error("Error deleting user:", error));
    }
}
