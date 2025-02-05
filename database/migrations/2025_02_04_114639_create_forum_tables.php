<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateForumTables extends Migration
{
    public function up()
    {
        // Tabel 'kategori'
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('nama_kategori', 20);
            $table->timestamps();
        });

        // Tabel 'pengguna'
        Schema::create('penggunas', function (Blueprint $table) {
            $table->string('uid', 100)->primary();
            $table->string('username', 32);
            $table->string('email', 50);
            $table->string('nama', 50);
            $table->date('tanggal')->nullable();
            $table->timestamps();
        });



        // Tabel 'diskusi'
        Schema::create('diskusis', function (Blueprint $table) {
            $table->id('id_diskusi');
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->string('isi_diskusi', 255);
            $table->string('uid', 32);
            $table->string('judul', 50);
            $table->date('tanggal')->nullable();
            $table->timestamps();
        });


        DB::table('kategoris')->insert([
            ['id_kategori' => 1, 'nama_kategori' => 'Indonesia'],
            ['id_kategori' => 2, 'nama_kategori' => 'Matematika'],
            ['id_kategori' => 3, 'nama_kategori' => 'Coding'],
            ['id_kategori' => 4, 'nama_kategori' => 'Hukum'],
            ['id_kategori' => 5, 'nama_kategori' => 'Algoritma'],
        ]);

        // Tabel 'balasan'
        Schema::create('balasans', function (Blueprint $table) {
            $table->id('id_balasan');
            $table->unsignedBigInteger('id_diskusi')->nullable();
            $table->string('isi_balasan', 255);
            $table->string('uid', 32);
            $table->date('tanggal')->nullable();
            $table->timestamps();
        });

        // Tabel 'vote'
        Schema::create('votes', function (Blueprint $table) {
            $table->id('id_vote');
            $table->unsignedBigInteger('id_balasan')->nullable();
            $table->string('isi_vote', 255);
            $table->string('uid', 32);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('votes');
        Schema::dropIfExists('balasans');
        Schema::dropIfExists('diskusis');
        Schema::dropIfExists('penggunas');
        Schema::dropIfExists('kategoris');
    }
}