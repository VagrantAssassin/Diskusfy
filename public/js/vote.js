let upvoted = false;
let downvoted = false;
let voteCount = 416; // Initial count

document.getElementById("upvote").addEventListener("click", function () {
    if (upvoted) {
        voteCount -= 1;
        upvoted = false;
        document.getElementById("upvote").classList.remove("bg-[#77B254]");
    } else {
        voteCount += downvoted ? 2 : 1; // Remove downvote if exists
        upvoted = true;
        downvoted = false;
        document.getElementById("upvote").classList.add("bg-[#77B254]");
        document.getElementById("downvote").classList.remove("bg-[#FF5757]");
    }
    document.getElementById("upvoteCount").textContent = voteCount;
});

document.getElementById("downvote").addEventListener("click", function () {
    if (downvoted) {
        voteCount += 1;
        downvoted = false;
        document.getElementById("downvote").classList.remove("bg-[#FF5757]");
    } else {
        voteCount -= upvoted ? 2 : 1; // Remove upvote if exists
        downvoted = true;
        upvoted = false;
        document.getElementById("downvote").classList.add("bg-[#FF5757]");
        document.getElementById("upvote").classList.remove("bg-[#77B254]");
    }
    document.getElementById("upvoteCount").textContent = voteCount;
});