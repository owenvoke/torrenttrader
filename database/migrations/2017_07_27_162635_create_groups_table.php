<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('group_id');

            // Name
            $table->string('level');

            // Torrents
            $table->enum('view_torrents', ['yes', 'no']);
            $table->enum('edit_torrents', ['yes', 'no']);
            $table->enum('delete_torrents', ['yes', 'no']);

            // Users
            $table->enum('view_users', ['yes', 'no']);
            $table->enum('edit_users', ['yes', 'no']);
            $table->enum('delete_users', ['yes', 'no']);

            // News
            $table->enum('view_news', ['yes', 'no']);
            $table->enum('edit_news', ['yes', 'no']);
            $table->enum('delete_news', ['yes', 'no']);

            // Uploads and Downloads
            $table->enum('can_upload', ['yes', 'no']);
            $table->enum('can_download', ['yes', 'no']);

            // Forums
            $table->enum('view_forum', ['yes', 'no']);
            $table->enum('edit_forum', ['yes', 'no']);
            $table->enum('delete_forum', ['yes', 'no']);

            // Staff Features
            $table->enum('control_panel', ['yes', 'no']);
            $table->enum('staff_page', ['yes', 'no']);
            $table->enum('staff_public', ['yes', 'no']);
            $table->tinyInteger('staff_sort');

            $table->unique(['group_id']);
            $table->index('group_id', 'group_id');

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
        Schema::dropIfExists('groups');
    }
}
