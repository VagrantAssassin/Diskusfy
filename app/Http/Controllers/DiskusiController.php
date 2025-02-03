<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiskusiController extends Controller
{
    public function show($id)
    {
        // Simulasi data diskusi (seharusnya dari database)
        $diskusi = [
            ['username' => 'User123', 'judul' => 'Bagaimana cara belajar Laravel dengan efektif?', 'isi' => 'Laravel adalah framework PHP yang sangat populer dan banyak digunakan dalam pengembangan aplikasi web modern. Salah satu cara terbaik untuk belajar Laravel adalah dengan membaca dokumentasi resminya, mengikuti kursus online, dan mencoba membuat proyek sendiri.'],
            ['username' => 'User456', 'judul' => 'Apa perbedaan antara Livewire dan Vue.js?', 'isi' => 'Livewire dan Vue.js adalah dua teknologi yang berbeda...'],
            ['username' => 'User789', 'judul' => 'Bagaimana cara menggunakan Tailwind CSS di Laravel?', 'isi' => '']
        ];

        // Pastikan ID valid
        if (!isset($diskusi[$id])) {
            abort(404);
        }

        return view('comment_discussion.comment', ['diskusi' => $diskusi[$id]]);
    }
}
