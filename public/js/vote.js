document.addEventListener("DOMContentLoaded", function () {
    const upvoteBtn = document.getElementById("upvoteBtn");
    const downvoteBtn = document.getElementById("downvoteBtn");
    const upvoteCount = document.getElementById("upvoteCount");
    const downvoteCount = document.getElementById("downvoteCount");
    
    let upvoted = false;
    let downvoted = false;
    let upvotes = 0;
    let downvotes = 0;

    upvoteBtn.addEventListener("click", function () {
        if (upvoted) {
            upvotes--;
            upvoted = false;
            upvoteBtn.classList.remove("text-blue-500");
        } else {
            upvotes++;
            upvoted = true;
            upvoteBtn.classList.add("text-blue-500");
            
            if (downvoted) {
                downvotes--;
                downvoted = false;
                downvoteBtn.classList.remove("text-red-500");
            }
        }
        updateVotes();
    });

    downvoteBtn.addEventListener("click", function () {
        if (downvoted) {
            downvotes--;
            downvoted = false;
            downvoteBtn.classList.remove("text-red-500");
        } else {
            downvotes++;
            downvoted = true;
            downvoteBtn.classList.add("text-red-500");
            
            if (upvoted) {
                upvotes--;
                upvoted = false;
                upvoteBtn.classList.remove("text-blue-500");
            }
        }
        updateVotes();
    });

    function updateVotes() {
        upvoteCount.textContent = upvotes;
        downvoteCount.textContent = downvotes;
    }
});
