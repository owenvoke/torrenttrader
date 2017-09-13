<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorrentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torrents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('info_hash', 40);
            $table->string('name', 300);
            $table->text('descr');
            $table->string('image1');
            $table->string('image2');
            $table->bigInteger('category');
            $table->bigInteger('size');
            $table->dateTime('added');
            $table->enum('type', ['single', 'multi']);
            $table->integer('numfiles');
            $table->integer('comments');
            $table->bigInteger('views');
            $table->bigInteger('hits');
            $table->bigInteger('times_completed');
            $table->bigInteger('leechers');
            $table->bigInteger('seeders');
            $table->dateTime('last_action');
            $table->enum('visible', ['yes', 'no']);
            $table->enum('banned', ['yes', 'no']);
            $table->integer('owner');
            $table->enum('anon', ['yes', 'no']);
            $table->bigInteger('numratings');
            $table->bigInteger('ratingsum');
            $table->enum('nfo', ['yes', 'no']);
            $table->string('announce', 300);
            $table->enum('external', ['yes', 'no']);
            $table->integer('torrentlang');
            $table->enum('freeleech', ['0', '1']);

            $table->unique(['info_hash']);

            $table->index('owner', 'owner');
            $table->index('visible', 'visible');
            $table->index(['category', 'visible'], 'category_visible');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('torrents');
    }
}
