{{-- resources/views/partials/discussion-list.blade.php --}}
<div class="mx-auto max-w-screen-lg px-4 2xl:px-0">
    <div class="lg:flex lg:items-center lg:justify-between lg:gap-4">
        <h2 class="shrink-0 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
            Questions ({{ count($diskusis) }})
        </h2>
    </div>
    <div class="mt-6 flow-root">
        <div class="-my-6 divide-y divide-gray-200 dark:divide-gray-800">
            @foreach ($diskusis as $diskusi)
                <div class="space-y-4 py-6 md:py-8">
                    <div class="flex items-center gap-2">
                        <a href="/comment/{{ $diskusi->id_diskusi }}" data-id="{{ $diskusi->id_diskusi }}" class="text-xl font-semibold text-gray-900 hover:underline dark:text-white">
                            {{ $diskusi->judul }}
                        </a>
                        @if($diskusi->kategori)
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                                {{ $diskusi->kategori->nama_kategori }}
                            </span>
                        @endif
                    </div>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                        {{ $diskusi->isi_diskusi }}
                    </p>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Created By 
                        <a href="#" class="text-gray-900 hover:underline dark:text-white">
                            {{ $diskusi->pengguna ? $diskusi->pengguna->username : $diskusi->uid }}
                        </a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>
