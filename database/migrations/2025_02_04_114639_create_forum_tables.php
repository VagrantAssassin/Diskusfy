<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateForumTables extends Migration
{
    public function up()
    {
        // Tabel 'kategoris'
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('nama_kategori', 20);
            $table->timestamps();
        });

        // Tabel 'penggunas'
        Schema::create('penggunas', function (Blueprint $table) {
            $table->string('uid', 100)->primary();
            $table->string('username', 32)->unique();
            $table->string('email', 50)->unique();
            $table->string('nama', 50);
            $table->timestamps();
        });

        // Tabel 'diskusis'
        Schema::create('diskusis', function (Blueprint $table) {
            $table->id('id_diskusi');
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->string('uid', 100);
            $table->string('judul', 50);
            $table->text('isi_diskusi');
            $table->timestamps();

            // Foreign key
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onDelete('set null');
            $table->foreign('uid')->references('uid')->on('penggunas')->onDelete('cascade');
        });

        // Tabel 'balasans'
        Schema::create('balasans', function (Blueprint $table) {
            $table->id('id_balasan');
            $table->unsignedBigInteger('id_diskusi');
            $table->string('uid', 100);
            $table->text('isi_balasan');
            $table->timestamps();

            // Foreign key
            $table->foreign('id_diskusi')->references('id_diskusi')->on('diskusis')->onDelete('cascade');
            $table->foreign('uid')->references('uid')->on('penggunas')->onDelete('cascade');
        });

        // Tabel 'balasans_2'
        Schema::create('balasans_2', function (Blueprint $table) {
            $table->id('id_balasan2');
            $table->unsignedBigInteger('id_balasan');
            $table->string('uid', 100);
            $table->text('isi_balasan2');
            $table->timestamps();

            // Foreign key
            $table->foreign('id_balasan')->references('id_balasan')->on('balasans')->onDelete('cascade');
            $table->foreign('uid')->references('uid')->on('penggunas')->onDelete('cascade');
        });
        
        // Tabel 'votes'
        Schema::create('votes', function (Blueprint $table) {
            $table->id('id_vote');
            $table->unsignedBigInteger('id_balasan');
            $table->string('uid', 100);
            $table->boolean('isi_vote'); // Bisa diubah jadi boolean untuk upvote/downvote
            $table->timestamps();

            // Foreign key
            $table->foreign('id_balasan')->references('id_balasan')->on('balasans')->onDelete('cascade');
            $table->foreign('uid')->references('uid')->on('penggunas')->onDelete('cascade');
        });

        // Insert kategori default
        DB::table('kategoris')->insert([
            ['id_kategori' => 1, 'nama_kategori' => 'Indonesia', 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_kategori' => 'Matematika', 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_kategori' => 'Coding', 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 4, 'nama_kategori' => 'Hukum', 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 5, 'nama_kategori' => 'Algoritma', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert data dummy untuk penggunas (users)
        DB::table('penggunas')->insert([
            [
                'uid'       => 'default_uid',
                'username'  => 'defaultUser',
                'email'     => 'default@example.com',
                'nama'      => 'Default User',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'uid'       => 'ErWCXtBqe5cK94nm35K0gNdNZz02',
                'username'  => 'intan',
                'email'     => 'intan@gmail.com',
                'nama'      => 'intan',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ]);

        // Insert data dummy untuk diskusis (discussions)
        DB::table('diskusis')->insert([
            [
                'id_kategori' => 1, // kategori 'Indonesia'
                'uid'         => 'default_uid', // pemilik diskusi
                'judul'       => 'Diskusi Pertama',
                'isi_diskusi' => 'Ini adalah isi diskusi pertama.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);

        // Insert data dummy untuk balasans (komentar)
        DB::table('balasans')->insert([
            [
                'id_diskusi'  => 1, // mengacu pada diskusi dengan id 1
                'uid'         => 'ErWCXtBqe5cK94nm35K0gNdNZz02', // komentar dibuat oleh user 'intan'
                'isi_balasan' => 'Ini adalah komentar pertama pada diskusi pertama.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);

        // Insert data dummy untuk balasans_2 (reply terhadap komentar)
        DB::table('balasans_2')->insert([
            [
                'id_balasan'   => 1, // mengacu pada komentar dengan id 1
                'uid'          => 'default_uid', // reply dibuat oleh user default
                'isi_balasan2' => 'Ini adalah balasan terhadap komentar pertama.',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);

        // (Opsional) Insert data dummy untuk votes
        DB::table('votes')->insert([
            [
                'id_balasan' => 1, // vote diberikan untuk komentar id 1
                'uid'        => 'default_uid', // vote diberikan oleh user default
                'isi_vote'   => 1, // misalnya 1 = upvote
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('votes');
        Schema::dropIfExists('balasans_2');
        Schema::dropIfExists('balasans');
        Schema::dropIfExists('diskusis');
        Schema::dropIfExists('penggunas');
        Schema::dropIfExists('kategoris');
    }
}
