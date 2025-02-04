<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumTables extends Migration
{
    public function up()
    {
        // Tabel 'kategori'
        Schema::create('kategori', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('nama_kategori', 20);
            $table->timestamps();
        });

        // Tabel 'pengguna'
        Schema::create('pengguna', function (Blueprint $table) {
            $table->string('uid', 100)->primary();
            $table->string('username', 32);
            $table->string('email', 50);
            $table->string('nama', 50);
            $table->date('tanggal')->nullable();
            $table->timestamps();
        });

        // Tabel 'diskusi'
        Schema::create('diskusi', function (Blueprint $table) {
            $table->id('id_diskusi');
            $table->foreignId('id_kategori')->nullable()->constrained('kategori', 'id_kategori');
            $table->string('isi_diskusi', 255);
            $table->string('uid', 32);
            $table->foreign('uid')->references('uid')->on('pengguna');  // Menjadikan 'uid' sebagai foreign key
            $table->string('judul', 50);
            $table->date('tanggal')->nullable();
            $table->timestamps();
        });


        // Tabel 'balasan'
        Schema::create('balasan', function (Blueprint $table) {
            $table->id('id_balasan');
            $table->foreignId('id_diskusi')->nullable()->constrained('diskusi', 'id_diskusi');
            $table->string('isi_balasan', 255);
            $table->string('uid', 32);
            $table->foreign('uid')->references('uid')->on('pengguna');  // Menjadikan 'uid' sebagai foreign key
            $table->date('tanggal')->nullable();
            $table->timestamps();
        });


        // Tabel 'vote'
        Schema::create('vote', function (Blueprint $table) {
            $table->id('id_vote');
            $table->foreignId('id_balasan')->nullable()->constrained('balasan', 'id_balasan');
            $table->string('isi_vote', 255);
            $table->string('uid', 32);
            $table->foreign('uid')->references('uid')->on('pengguna');  // Menjadikan 'uid' sebagai foreign key
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('vote');
        Schema::dropIfExists('balasan');
        Schema::dropIfExists('diskusi');
        Schema::dropIfExists('pengguna');
        Schema::dropIfExists('kategori');
    }
}
