<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskusfy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <section class="bg-gray-900 py-8 antialiased dark:bg-gray-900 md:py-16 h-screen">
        <div class="mx-auto max-w-screen-lg px-4 2xl:px-0 lg:items-center">
            <!-- Topik Diskusi -->
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">GeForce GRD 572.16 Feedback Thread
                (Released 1/30/25)</h2>
            <div class="mt-2 border-t border-gray-700 pt-2">
                <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg flex items-start mt-3">
                    <p class="text-gray-900 dark:text-gray-300">
                        p bfwoifnefslekjfspeomfw'epoifjseicme;sna/wkdjae/ofjkaofmafna'podjascaknawfa
                    </p>
                </div>
            </div>

            <!-- Comment Input Form -->
            <form class="mb-6 mt-6">
                <div
                    class="py-2 px-4 mb-4 bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <label for="comment" class="sr-only">Your comment</label>
                    <textarea id="comment" rows="6"
                        class="w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                        placeholder="Write a comment..." required></textarea>
                </div>
                <button type="submit"
                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Post comment
                </button>
            </form>

            <!-- Static Comment 1 -->
            <article class="p-6 mb-4 text-base bg-white rounded-lg dark:bg-gray-900">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <img class="mr-2 w-6 h-6 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Michael Gough">
                        <p class="text-sm text-gray-900 dark:text-white font-semibold">Michael Gough</p>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        <time datetime="2022-02-08">Feb. 8, 2022</time>
                    </p>
                </footer>
                <p class="text-gray-500 dark:text-gray-400">Very straight-to-the-point article. Really worth
                    reading. Thank you!</p>

                <!-- Voting System -->
                <div class="flex items-center mt-4 space-x-4">
                    <button type="button"
                        class="flex items-center text-sm text-gray-500 hover:text-green-600 dark:text-gray-400">
                        <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg> Upvote
                    </button>
                    <span class="text-sm text-gray-900 dark:text-white">12</span>
                    <button type="button"
                        class="flex items-center text-sm text-gray-500 hover:text-red-500 dark:text-gray-400">
                        <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg> Downvote
                    </button>
                </div>
            </article>

            <!-- Static Comment 2 -->
            <article class="p-6 mb-4 text-base bg-white rounded-lg dark:bg-gray-900">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <img class="mr-2 w-6 h-6 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="Jane Doe">
                        <p class="text-sm text-gray-900 dark:text-white font-semibold">Jane Doe</p>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        <time datetime="2022-03-15">Mar. 15, 2022</time>
                    </p>
                </footer>
                <p class="text-gray-500 dark:text-gray-400">I have a different perspective on this. Has anyone tried
                    another approach?</p>

                <!-- Voting System -->
                <div class="flex items-center mt-4 space-x-4">
                    <button type="button"
                        class="flex items-center text-sm text-gray-500 hover:text-green-600 dark:text-gray-400">
                        <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg> Upvote
                    </button>
                    <span class="text-sm text-gray-900 dark:text-white">8</span>
                    <button type="button"
                        class="flex items-center text-sm text-gray-500 hover:text-red-500 dark:text-gray-400">
                        <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg> Downvote
                    </button>
                </div>
            </article>
        </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
    <script src="{{ asset('js/vote.js') }}"></script>
</body>

</html>