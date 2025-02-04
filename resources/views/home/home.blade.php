<section class="bg-gray-900 py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto max-w-screen-lg px-4 2xl:px-0">
        <div class="lg:flex lg:items-center lg:justify-between lg:gap-4">
            <h2 class="shrink-0 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Questions (147)</h2>

            <form class="mt-4 w-full gap-4 sm:flex sm:items-center sm:justify-end lg:mt-0">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full flex-1 lg:max-w-sm">
                    <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                        {{-- <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg> --}}
                    </div>
                    <input type="text" id="simple-search" class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 ps-9 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Search Questions" required />
                </div>
            </form>
        </div>

        <div class="mt-6 flow-root">
            <div class="-my-6 divide-y divide-gray-200 dark:divide-gray-800">
                @foreach ([
                    ['answers' => 3, 'question' => '“The specs say this model has 2 USB ports. The one I received has none. Are they hidden somewhere?”', 'answer' => 'It’s a USB-C port it’s a smaller port. Not the regular size USB port. See the picture below. It fits the newer Apple chargers.', 'answeredBy' => 'Bonnie Green'],
                    ['answers' => 1, 'question' => '“Is this just the monitor?”', 'answer' => "It's an all-in-one (AIO). Which means everything in one structure. So it's not just a monitor it uses Apple's operating System, macOS and it has storage, CPU, GPU etc.", 'answeredBy' => 'Jese Leos'],
                    ['answers' => 7, 'question' => '“For an inexpert 85-year-old general user with a ten-year old iMac (OSX Yosemite version 10.10.5), is this latest model 24" iMac with Retina 4.5K display Apple M1 8GB memory - 256GB SSD a decent upgrade?”', 'answer' => "It's basically the same system as your older machine, but bigger, lighter and faster. There is no disc drive and it has fewer ports.", 'answeredBy' => 'Bonnie Green'],
                    ['answers' => 32, 'question' => '“I just brought home the Imac24". It says the mouse and Keyboard are wireless. Where do I install the power for them?”', 'answer' => 'You can charge the mouse and keyboard with a lightning charger. Once charged, they last months before having to charge again.', 'answeredBy' => 'Roberta Casas'],
                    ['answers' => 4, 'question' => '“Does this include the keyboard and mouse?”', 'answer' => 'Yes it does, color matched to the Mac. And the keyboard has Touch ID.', 'answeredBy' => 'Joseph McFallen']
                ] as $question)
                    <div class="space-y-4 py-6 md:py-8">
                        <div class="grid gap-4">
                            <div>
                                <span class="inline-block rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300 md:mb-0">{{ $question['answers'] }} answers</span>
                            </div>

                            <a href="#" id="commentButton" class="text-xl font-semibold text-gray-900 hover:underline dark:text-white">{{ $question['question'] }}</a>
                        </div>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $question['answer'] }}</p>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            Answered by
                            <a href="#" class="text-gray-900 hover:underline dark:text-white">{{ $question['answeredBy'] }}</a>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script defer src="{{ asset('js/commentButton.js') }}"></script>
