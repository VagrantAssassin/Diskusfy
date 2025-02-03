let voteState = null;

function toggleVote(type) {
    const upvoteButton = document.getElementById("upvoteIcon");
    const downvoteButton = document.getElementById("downvoteIcon");
    const voteCount = document.getElementById("voteCount");
    let count = parseInt(voteCount.innerText);

    if (type === "upvote") {
        if (voteState === "upvote") {
            // Jika upvote sudah aktif, matikan
            upvoteButton.classList.remove("text-green-600");
            voteCount.innerText = count - 1;
            voteState = null;
        } else {
            // Jika sedang downvote, matikan downvote dulu
            if (voteState === "downvote") {
                downvoteButton.classList.remove("text-red-500");
            }

            // Aktifkan upvote dan update count
            upvoteButton.classList.add("text-green-600");
            voteCount.innerText = count + 1;
            voteState = "upvote";
        }
    } else if (type === "downvote") {
        if (voteState === "downvote") {
            // Jika downvote sudah aktif, matikan
            downvoteButton.classList.remove("text-red-500");
            voteState = null;
        } else {
            // Jika sedang upvote, matikan upvote dulu
            if (voteState === "upvote") {
                upvoteButton.classList.remove("text-green-600");
                voteCount.innerText = count - 1; // Batalkan upvote saat beralih ke downvote
            }

            // Aktifkan downvote tanpa mengubah count
            downvoteButton.classList.add("text-red-500");
            voteState = "downvote";
        }
    }
}
