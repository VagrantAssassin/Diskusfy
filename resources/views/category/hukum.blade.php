<link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.css" rel="stylesheet" />


<section class="bg-gray-900 py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto max-w-screen-lg px-4 2xl:px-0">
        <div class="lg:flex lg:items-center lg:justify-between lg:gap-4">
            <h2 class="shrink-0 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Questions (5)
            </h2>

            <form class="mt-4 w-full gap-4 sm:flex sm:items-center sm:justify-end lg:mt-0">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full flex-1 lg:max-w-sm">
                    <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                        {{-- <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg> --}}
                    </div>
                </div>
            </form>
        </div>

        <div class="mt-6 flow-root">
            <div class="-my-6 divide-y divide-gray-200 dark:divide-gray-800">
                @foreach ([
        ['answers' => 5, 'question' => '“Bagaimana penerapan hukum siber dalam menangani kejahatan digital di Indonesia?”', 'answer' => 'Penerapan hukum siber di Indonesia masih berkembang, dengan UU ITE sebagai dasar hukum utama, meskipun masih terdapat tantangan dalam implementasi dan penegakannya.', 'answeredBy' => 'Andi Pratama'],
        ['answers' => 3, 'question' => '“Apa saja hak dan kewajiban pekerja menurut hukum ketenagakerjaan di Indonesia?”', 'answer' => 'Hak pekerja mencakup upah layak, jaminan sosial, dan perlindungan kerja, sementara kewajibannya termasuk menjalankan tugas sesuai kontrak kerja dan menaati peraturan perusahaan.', 'answeredBy' => 'Siti Rahma'],
        ['answers' => 7, 'question' => '“Sejauh mana efektivitas hukum pidana dalam menangani kasus korupsi di Indonesia?”', 'answer' => 'Hukum pidana, terutama UU Tipikor, telah menjerat banyak pelaku korupsi, tetapi efektivitasnya masih dipertanyakan karena masih maraknya kasus korupsi yang terjadi.', 'answeredBy' => 'Budi Santoso'],
        ['answers' => 10, 'question' => '“Bagaimana perlindungan hukum bagi konsumen dalam transaksi e-commerce?”', 'answer' => 'Perlindungan hukum bagi konsumen dijamin melalui UU Perlindungan Konsumen dan regulasi e-commerce, namun masih terdapat kendala dalam implementasi terutama dalam pengawasan transaksi digital.', 'answeredBy' => 'Rina Dewi'],
        ['answers' => 4, 'question' => '“Apakah kebijakan restorative justice efektif dalam sistem peradilan pidana di Indonesia?”', 'answer' => 'Restorative justice efektif dalam mengurangi beban peradilan dan memperbaiki hubungan antara pelaku dan korban, tetapi masih memerlukan penguatan regulasi agar tidak disalahgunakan.', 'answeredBy' => 'Dian Kusuma'],
    ] as $question)
                    <div class="space-y-4 py-6 md:py-8">
                        <div class="grid gap-4">
                            <div>
                                {{-- <span
                                    class="inline-block rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300 md:mb-0">{{
                                    $question['answers'] }}
                                    answers</span> --}}
                            </div>

                            <a href="#" id="commentButton"
                                class="text-xl font-semibold text-gray-900 hover:underline dark:text-white">{{ $question['question'] }}</a>
                        </div>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $question['answer'] }}</p>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            Answered by
                            <a href="#"
                                class="text-gray-900 hover:underline dark:text-white">{{ $question['answeredBy'] }}</a>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.1/dist/flowbite.min.js"></script>

<script defer src="{{ asset('js/commentButton.js') }}"></script>
