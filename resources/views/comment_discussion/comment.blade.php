<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="{{ asset('js/vote.js') }}"></script>
</head>

<body>


    <!-- Topik Diskusi -->

    <h2 class="text-lg font-semibold mt-4 text-[#000001]">GeForce GRD 572.16 Feedback Thread
        (Released 1/30/25)</h2>
    <div class="mt-2 border-t border-[#000001] pt-2">
        <div class="bg-[#B3B3B3] p-3 rounded-lg flex items-start mt-3">
            <p class="mt-1 text-[#000001]">
                p
            </p>
        </div>
    </div>


    <!-- Tambah Komentar -->
    <div class="bg-[#B3B3B3] p-3 rounded-lg shadow-lg mt-3">
        <div class="flex items-center ">
            <input type="text" class="w-full bg-[#FFFFFF] text-[#FBF7F4] p-2 rounded-lg"
                placeholder="Tambahkan komentar...">
            <button type="submit"
                class="ml-2 bg-[#5B913B] px-6 py-1 rounded-full text-[#FFFFFF] text-sm hover:bg-green-700">Tambahkan
                komentar</button>
        </div>
    </div>

    <!-- Komentar Balasam -->
    <h2 class="text-lg font-semibold mt-4 text-[#000001]">Komentar</h2>
    <div class="mt-2 border-t border-[#000001] pt-2">
        <div class="bg-[#B3B3B3] p-3 rounded-lg flex items-start mt-3">
            <img src="data:image/jpeg;base64,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"
                alt="Profile" class="w-10 h-10 rounded-full">
            <div class="ml-3 w-full">
                <div class="flex justify-between">
                    <span class="font-bold text-[#000001]">user</span>
                    <span class="text-[#000001] text-sm">6d</span>
                </div>
                <p class="mt-4 text-[#000001]">
                    p
                </p>
                <div class="flex items-center mt-2 text-[#5B913B] text-sm">
                    <div class="flex items-center space-x-2">
                        <!-- UPVOTE -->
                        <button id="upvote"
                            class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-[#77B254] transition"
                            onclick="toggleVote('upvote')">
                            <svg id="upvoteIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="currentColor" class="text-[#FFFFFF]">
                                <path d="M12 4l-8 10h6v6h4v-6h6z" />
                            </svg>
                        </button>
                        <span id="voteCount" class="text-[#000001]">416</span>
                        <!-- DOWNVOTE -->
                        <button id="downvote"
                            class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-[#FF5757] transition"
                            onclick="toggleVote('downvote')">
                            <svg id="downvoteIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="currentColor" class="text-[#FFFFFF]">
                                <path d="M12 20l8-10h-6v-6h-4v6h-6z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>