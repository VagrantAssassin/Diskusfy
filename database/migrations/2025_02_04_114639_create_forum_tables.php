<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateForumTables extends Migration
{
    public function up()
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('nama_kategori', 20);
            $table->timestamps();
        });

        Schema::create('penggunas', function (Blueprint $table) {
            $table->string('uid', 100)->primary();
            $table->string('username', 32)->unique();
            $table->string('email', 50)->unique();
            $table->string('nama', 50);
            $table->timestamps();
        });

        Schema::create('diskusis', function (Blueprint $table) {
            $table->id('id_diskusi');
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->string('uid', 100);
            $table->string('judul', 50);
            $table->text('isi_diskusi');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onDelete('set null');
            $table->foreign('uid')->references('uid')->on('penggunas')->onDelete('cascade');
        });

        Schema::create('balasans', function (Blueprint $table) {
            $table->id('id_balasan');
            $table->unsignedBigInteger('id_diskusi');
            $table->string('uid', 100);
            $table->text('isi_balasan');
            $table->timestamps();

            $table->foreign('id_diskusi')->references('id_diskusi')->on('diskusis')->onDelete('cascade');
            $table->foreign('uid')->references('uid')->on('penggunas')->onDelete('cascade');
        });

        Schema::create('balasans_2', function (Blueprint $table) {
            $table->id('id_balasan2');
            $table->unsignedBigInteger('id_balasan');
            $table->string('uid', 100);
            $table->text('isi_balasan2');
            $table->timestamps();

            $table->foreign('id_balasan')->references('id_balasan')->on('balasans')->onDelete('cascade');
            $table->foreign('uid')->references('uid')->on('penggunas')->onDelete('cascade');
        });

        Schema::create('votes', function (Blueprint $table) {
            $table->id('id_vote');
            $table->unsignedBigInteger('id_balasan');
            $table->string('uid', 100);
            $table->boolean('isi_vote');
            $table->timestamps();

            $table->foreign('id_balasan')->references('id_balasan')->on('balasans')->onDelete('cascade');
            $table->foreign('uid')->references('uid')->on('penggunas')->onDelete('cascade');
        });




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
