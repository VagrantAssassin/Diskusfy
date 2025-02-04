<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskusfy</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.css" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <section class="bg-gray-900 py-8 center antialiased dark:bg-gray-900 md:py-16">
        <div class="max-w-2xl mx-auto px-4">
            <!-- Topik Diskusi -->
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">GeForce GRD 572.16 Feedback Thread
                (Released 1/30/25)</h2>
            <div class="mt-2 border-t border-gray-700 pt-2">
                <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg flex items-start mt-3">
                    <p class="text-gray-900 dark:text-gray-300">
                        Get started with a collection of comments sections coded with Tailwind CSS to show a list of
                        comments for blog posts with features like a reply, like, and more.
                    </p>
                </div>
            </div>
            <form class="mt-4 mb-6">
                <div
                    class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <label for="comment" class="sr-only">Your comment</label>
                    <textarea id="comment" rows="6"
                        class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                        placeholder="Write a comment..." required></textarea>
                </div>
                <button type="submit"
                    class="inline-flex bg-green-700 items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Post comment
                </button>
            </form>
            <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                            <img class="mr-2 w-6 h-6 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                alt="Michael Gough">Michael Gough
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                title="February 8th, 2022">Feb. 8, 2022</time></p>
                    </div>
                    <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        type="button">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 16 3">
                            <path
                                d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                        </svg>
                        <span class="sr-only">Comment settings</span>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownComment1"
                        class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                            </li>
                        </ul>
                    </div>
                </footer>
                <p class="text-gray-500 dark:text-gray-400">Very straight-to-point article. Really worth time reading.
                    Thank you! But tools are just the
                    instruments for the UX designers. The knowledge of the design tools are as important as the
                    creation of the design strategy.</p>
                <!-- System Votes -->
                <div class="flex justify-left items-center gap-4 mt-4">
                    <button id="upvoteBtn" class="flex items-center gap-1 text-gray-500 hover:text-blue-500">
                        <svg class="w-6 h-6 fill-current" id="upvoteIcon" viewBox="0 0 20 20">
                            <path d="M10 2L2 12h6v6h4v-6h6L10 2z"></path>
                        </svg>
                        <span id="upvoteCount">0</span>
                    </button>

                    <button id="downvoteBtn" class="flex items-center gap-1 text-gray-500 hover:text-red-500">
                        <svg class="w-6 h-6 fill-current" id="downvoteIcon" viewBox="0 0 20 20">
                            <path d="M10 18L18 8h-6V2h-4v6H2l8 10z"></path>
                        </svg>
                        <span id="downvoteCount">0</span>
                    </button>
                </div>
        </div>
        </article>
        </div>
    </section>
    <script src="{{ asset('js/vote.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
</body>

</html>