<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskusfy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="{{ asset('js/vote.js') }}"></script>
</head>

<body>
    <div class="container mx-auto p-auto">
        <div class="bg-white shadow-md rounded-lg p-6 w-full h-screen overflow-auto">

            <!-- Topik Diskusi -->
            <h2 class="text-lg font-semibold mt-4 text-[#000001]">GeForce GRD 572.16 Feedback Thread (Released 1/30/25)</h2>
            <div class="mt-2 border-t border-[#000001] pt-2">
                <div class="bg-[#FBF7F4] p-3 rounded-lg flex items-start mt-3">
                    <p class="mt-1 text-[#000001]">
                        p bfwoifnefslekjfspeomfw'epoifjseicme;sna/wkdjae/ofjkaofmafna'podjascaknawfa
                    </p>
                </div>
            </div>

            <!-- Tambah Komentar -->
            <div class="bg-[#FBF7F4] p-3 rounded-lg shadow-lg mt-3">
                <div class="flex items-center ">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                    <button type="submit" class="ml-2 bg-[#5B913B] px-6 py-1 rounded-full text-[#FFFFFF] text-sm hover:bg-green-700 mt-2">Tambahkan komentar</button>
                </div>
            </div>

            <!-- Komentar Sebelumnya -->
            <h2 class="text-lg font-semibold mt-4 text-[#000001]">Komentar</h2>
            <div class="mt-2 border-t border-[#000001] pt-2">
                <div class="bg-[#FBF7F4] p-3 shadow-md rounded-lg flex items-start mt-3">
                    <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD..." alt="Profile" class="w-10 h-10 rounded-full">
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
                                <button id="upvote" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-[#77B254] transition" onclick="toggleVote('upvote')">
                                    <svg id="upvoteIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="text-[#B3B3B3]">
                                        <path d="M12 4l-8 10h6v6h4v-6h6z" />
                                    </svg>
                                </button>
                                <span id="voteCount" class="text-[#000001]">416</span>
                                <!-- DOWNVOTE -->
                                <button id="downvote" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-[#FF5757] transition" onclick="toggleVote('downvote')">
                                    <svg id="downvoteIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="text-[#B3B3B3]">
                                        <path d="M12 20l8-10h-6v-6h-4v6h-6z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#FBF7F4] p-3 shadow-md rounded-lg flex items-start mt-3">
                    <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD..." alt="Profile" class="w-10 h-10 rounded-full">
                    <div class="ml-3 w-full">
                        <div class="flex justify-between">
                            <span class="font-bold text-[#000001]">user2</span>
                            <span class="text-[#000001] text-sm">1d</span>
                        </div>
                        <p class="mt-4 text-[#000001]">
                            Great discussion! I think the new drivers are making a big difference.
                        </p>
                        <div class="flex items-center mt-2 text-[#5B913B] text-sm">
                            <div class="flex items-center space-x-2">
                                <!-- UPVOTE -->
                                <button id="upvote" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-[#77B254] transition" onclick="toggleVote('upvote')">
                                    <svg id="upvoteIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="text-[#B3B3B3]">
                                        <path d="M12 4l-8 10h6v6h4v-6h6z" />
                                    </svg>
                                </button>
                                <span id="voteCount" class="text-[#000001]">30</span>
                                <!-- DOWNVOTE -->
                                <button id="downvote" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-[#FF5757] transition" onclick="toggleVote('downvote')">
                                    <svg id="downvoteIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="text-[#B3B3B3]">
                                        <path d="M12 20l8-10h-6v-6h-4v6h-6z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
