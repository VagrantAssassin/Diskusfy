let voteState = null;

function toggleVote(type) {
    const upvoteButton = document.getElementById("upvoteIcon");
    const downvoteButton = document.getElementById("downvoteIcon");
    const voteCount = document.getElementById("voteCount");
    let count = parseInt(voteCount.innerText);

    if (type === "upvote") {
        if (voteState === "upvote") {
            upvoteButton.classList.remove("text-green-600");
            voteState = null;
            voteCount.innerText = count - 1;
        } else {
            upvoteButton.classList.add("text-green-600");
            downvoteButton.classList.remove("text-red-500");
            voteCount.innerText = voteState === "downvote" ? count + 2 : count + 1;
            voteState = "upvote";
        }
    } else if (type === "downvote") {
        if (voteState === "downvote") {
            downvoteButton.classList.remove("text-red-500");
            voteState = null;
            voteCount.innerText = count + 1;
        } else {
            downvoteButton.classList.add("text-red-500");
            upvoteButton.classList.remove("text-green-600");
            voteCount.innerText = voteState === "upvote" ? count - 2 : count - 1;
            voteState = "downvote";
        }
    }
}