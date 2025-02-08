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
                'tanggal' => $faker->date('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Ambil daftar uid pengguna yang baru dibuat
        $userUIDs = DB::table('penggunas')->pluck('uid')->toArray();

        // 2. Insert 10 dummy diskusi ke tabel 'diskusis'
        for ($i = 1; $i <= 10; $i++) {
            DB::table('diskusis')->insert([
                'id_kategori' => $faker->numberBetween(1, 5), // kategori default sudah ada (1 s/d 5)
                'uid' => $faker->randomElement($userUIDs),
                'judul' => 'Diskusi Judul ' . $i,
                'isi_diskusi' => $faker->paragraph,
                'tanggal' => $faker->date('Y-m-d'),
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
                'tanggal' => $faker->date('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Ambil daftar id balasan yang baru dibuat
        $balasanIDs = DB::table('balasans')->pluck('id_balasan')->toArray();

        // 4. Insert 10 dummy votes ke tabel 'votes'
        for ($i = 1; $i <= 10; $i++) {
            DB::table('votes')->insert([
                'id_balasan' => $faker->randomElement($balasanIDs),
                'uid' => $faker->randomElement($userUIDs),
                'isi_vote' => $faker->boolean, // true atau false
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
