@extends('layouts.app')


<div class="p-6">
    <div class="bg-white shadow-md rounded-lg p-6 w-full h-screen overflow-auto">
        <h1 class="text-2xl font-bold mb-4 text-[#5B913B]">Diskusi Terbaru</h1>

        <div class="space-y-4">
            <!-- Diskusi Statis -->
            @foreach ([['username' => 'User123', 'judul' => 'Bagaimana cara belajar Laravel dengan efektif?', 'isi' => 'Laravel adalah framework PHP yang sangat populer dan banyak digunakan dalam pengembangan aplikasi web modern. Salah satu cara terbaik untuk belajar Laravel adalah dengan membaca dokumentasi resminya, mengikuti kursus online, dan mencoba membuat proyek sendiri.'], ['username' => 'User456', 'judul' => 'Apa perbedaan antara Livewire dan Vue.js?', 'isi' => 'Livewire dan Vue.js adalah dua teknologi yang berbeda dalam membangun aplikasi interaktif di Laravel. Livewire bekerja tanpa JavaScript secara eksplisit, sedangkan Vue.js berbasis JavaScript dan lebih fleksibel dalam manipulasi DOM.'], ['username' => 'User789', 'judul' => 'Bagaimana cara menggunakan Tailwind CSS di Laravel?', 'isi' => '']] as $diskusi)
                <div class="bg-[#FBF7F4] p-4 rounded-lg shadow">
                    <div class="flex items-center mb-2">
                        <div
                            class="bg-[#77B254] h-10 w-10 rounded-full flex items-center justify-center text-white font-bold">
                            {{ substr($diskusi['username'], 0, 1) }}
                        </div>
                        <p class="ml-3 text-sm text-[#666666]">{{ $diskusi['username'] }}</p>
                    </div>
                    <h2 class="text-lg font-semibold text-[#384D6C]">{{ $diskusi['judul'] }}</h2>
                    <p class="text-[#666666]">{{ $diskusi['isi'] }}</p>
                    <div class="flex space-x-4 mt-2">
                        <button class="bg-[#5B913B] text-white px-4 py-2 rounded flex items-center" id="commentButton">
                            💬 <span class="ml-1">Komentar</span>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<script defer src="{{ asset('js/commentButton.js') }}"></script>
