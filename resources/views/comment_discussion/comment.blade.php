<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diskusi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-green-900">
    <div class="max-w-2xl mx-auto p-4">
        <div class="bg-green-100 p-4 rounded-lg shadow-lg">
            <div class="flex items-center border-b border-green-300 pb-2">
                <input type="text" class="w-full bg-green-50 text-green-900 p-2 rounded-lg"
                    placeholder="Tambahkan komentar...">
                <button class="ml-2 bg-green-600 px-6 py-1 rounded-full text-white text-sm">Tambahkan komentar</button>
            </div>
        </div>
        <h2 class="text-lg font-semibold mt-4 text-green-800">Komentar</h2>
        <div class="mt-2 border-t border-green-300 pt-2">
            <div class="bg-green-50 p-3 rounded-lg flex items-start mt-3">
                <img src="https://via.placeholder.com/40" alt="Profile" class="w-10 h-10 rounded-full">
                <div class="ml-3 w-full">
                    <div class="flex justify-between">
                        <span class="font-bold text-green-800">Haudaradiva</span>
                        <span class="text-green-500 text-sm">4thn</span>
                    </div>
                    <p class="mt-1 text-green-700">
                        Wah aku baru tau ternyata Jefri Nichol sehumble ini. Semoga dia selalu baik-baik saja dan gak
                        salah gaul lagi 😊
                    </p>
                    <div class="flex items-center mt-2 text-green-600 text-sm">
                        <div class="flex items-center space-x-2">
                            <!-- UPVOTE -->
                            <button id="upvote"
                                class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-green-200 focus:ring focus:ring-green-500 transition"
                                onclick="toggleVote('upvote')">
                                <svg id="upvoteIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="currentColor" class="text-green-400">
                                    <path d="M12 4l-8 10h6v6h4v-6h6z" />
                                </svg>
                            </button>

                            <span id="voteCount" class="text-green-700">416</span>

                            <!-- DOWNVOTE -->
                            <button id="downvote"
                                class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-green-200 focus:ring focus:ring-red-500 transition"
                                onclick="toggleVote('downvote')">
                                <svg id="downvoteIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="currentColor" class="text-green-400">
                                    <path d="M12 20l8-10h-6v-6h-4v6h-6z" />
                                </svg>
                            </button>
                        </div>
                        <button class="ml-4 text-green-500 hover:underline">Balas</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
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
    </script>
</body>

</html>