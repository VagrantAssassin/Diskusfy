<!-- resources/views/comment_discussion/comment.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Diskusfy</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.css" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <section class="bg-gray-100 dark:bg-gray-900 h-screen items-center justify-center py-2 lg:py-16 antialiased">
        <div class="w-full mx-auto max-w-screen-lg px-4 2xl:px-0">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $diskusi->judul }}</h2>
                <a href="/"
                    class="inline-flex items-center text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-blue-500">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path d="M12 2L10.59 3.41 15.17 8H3v2h12.17l-4.58 4.59L12 18l8-8-8-8z"></path>
                    </svg>
                    Back to Home
                </a>
            </div>

            <div class="mt-2 border-t border-gray-700 pt-2">
                <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg flex items-start mt-3">
                    <p class="text-gray-900 dark:text-gray-300">
                        {{ $diskusi->isi_diskusi }}
                    </p>
                </div>
            </div>

            <!-- Form Komentar -->
            <form>
                @csrf
                <div class="py-2 px-4 mb-4 bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <label for="isi_balasan" class="sr-only">Your comment</label>
                    <textarea name="isi_balasan" id="isi_balasan" rows="6"
                        class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                        placeholder="Write a comment..." required></textarea>
                </div>
                <button type="submit"
                    class="inline-flex bg-green-700 items-center py-2.5 px-4 text-xs font-medium text-center text-white rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Post comment
                </button>
            </form>

            <!-- Tampilkan Komentar secara Dinamis -->
            <section class="mt-8">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Comments ({{ count($diskusi->balasans) }})</h3>
                @forelse ($diskusi->balasans as $balasan)
                    <article class="mt-4 p-4 bg-white rounded-lg shadow dark:bg-gray-900">
                        <p class="text-gray-800 dark:text-gray-300">{{ $balasan->isi_balasan }}</p>
                        <div class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                            Posted by: {{ $balasan->uid }} on {{ $balasan->created_at->format('d M Y, H:i') }}
                        </div>
                    </article>
                @empty
                    <p class="mt-4 text-gray-600 dark:text-gray-400">Belum ada komentar.</p>
                @endforelse
            </section>
        </div>
    </section>

    <script>
        // Pastikan $diskusi->id_diskusi tersedia dari controller
        const diskusiId = "{{ $diskusi->id_diskusi }}";
        console.log("diskusiId:", diskusiId);
    </script>
    <script src="{{ asset('js/balasanuid.js') }}" type="module"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>
</body>
</html>
