document.addEventListener("DOMContentLoaded", function () {

    fetch("/dashboard-stats")
        .then((response) => response.json())
        .then((data) => {

            document.getElementById("total-users").innerText = data.totalUsers;
            document.getElementById("total-diskusi").innerText =
                data.totalDiskusi;
            document.getElementById("total-komentar").innerText =
                data.totalKomentar;
            document.getElementById("total-kategori").innerText =
                data.totalKategori;
            document.getElementById("total-votes").innerText = data.totalVotes;

            if (data.latestDiscussion && data.latestDiscussion.judul) {
                document.getElementById("latest-discussion").innerText =
                    data.latestDiscussion.judul;
            }
        })
        .catch((error) =>
            console.error("Error fetching dashboard stats:", error)
        );
});
