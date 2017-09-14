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
            $table->string('info_hash', 40)->unique();
            $table->string('name', 500);
            $table->text('description')->default('');
            $table->unsignedInteger('category')->default(1);
            $table->bigInteger('size')->default(0);
            $table->bigInteger('downloads')->default(0);
            $table->unsignedInteger('user')->default(0);

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
