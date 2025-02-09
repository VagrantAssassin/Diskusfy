<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ForumSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // 1. Insert 10 dummy pengguna ke tabel 'penggunas'
        for ($i = 1; $i <= 10; $i++) {
            DB::table('penggunas')->insert([
                'uid' => (string) Str::uuid(),
                'username' => 'user' . $i,
                'email' => 'user' . $i . '@example.com',
                'nama' => $faker->name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Ambil daftar uid pengguna yang baru dibuat (termasuk data default dari migration, jika ada)
        $userUIDs = DB::table('penggunas')->pluck('uid')->toArray();

        // --- Pastikan tabel kategoris sudah berisi data default ---
        // Ambil daftar id kategori yang sudah ada
        $kategoriIDs = DB::table('kategoris')->pluck('id_kategori')->toArray();
        if (empty($kategoriIDs)) {
            // Jika belum ada, insert data default kategori (opsional, karena biasanya sudah ada melalui migration)
            DB::table('kategoris')->insert([
                ['id_kategori' => 1, 'nama_kategori' => 'Indonesia', 'created_at' => now(), 'updated_at' => now()],
                ['id_kategori' => 2, 'nama_kategori' => 'Matematika', 'created_at' => now(), 'updated_at' => now()],
                ['id_kategori' => 3, 'nama_kategori' => 'Coding', 'created_at' => now(), 'updated_at' => now()],
                ['id_kategori' => 4, 'nama_kategori' => 'Hukum', 'created_at' => now(), 'updated_at' => now()],
                ['id_kategori' => 5, 'nama_kategori' => 'Algoritma', 'created_at' => now(), 'updated_at' => now()],
            ]);
            $kategoriIDs = DB::table('kategoris')->pluck('id_kategori')->toArray();
        }

        // 2. Insert 10 dummy diskusi ke tabel 'diskusis'
        for ($i = 1; $i <= 10; $i++) {
            DB::table('diskusis')->insert([
                'id_kategori' => $faker->randomElement($kategoriIDs), // ambil dari data yang ada
                'uid' => $faker->randomElement($userUIDs),
                'judul' => 'Diskusi Judul ' . $i,
                'isi_diskusi' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Ambil daftar id diskusi yang baru dibuat
        $diskusiIDs = DB::table('diskusis')->pluck('id_diskusi')->toArray();

        // 3. Insert 10 dummy balasan ke tabel 'balasans'
        for ($i = 1; $i <= 10; $i++) {
            DB::table('balasans')->insert([
                'id_diskusi' => $faker->randomElement($diskusiIDs),
                'uid' => $faker->randomElement($userUIDs),
                'isi_balasan' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Ambil daftar id balasan yang baru dibuat
        $balasanIDs = DB::table('balasans')->pluck('id_balasan')->toArray();

        // 4. Insert 10 dummy reply (balasans_2) ke tabel 'balasans_2'
        for ($i = 1; $i <= 10; $i++) {
            DB::table('balasans_2')->insert([
                'id_balasan' => $faker->randomElement($balasanIDs),
                'uid' => $faker->randomElement($userUIDs),
                'isi_balasan2' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 5. Insert 10 dummy votes ke tabel 'votes'
        for ($i = 1; $i <= 10; $i++) {
            DB::table('votes')->insert([
                'id_balasan' => $faker->randomElement($balasanIDs),
                'uid' => $faker->randomElement($userUIDs),
                'isi_vote' => $faker->boolean, // true = upvote, false = downvote
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
