<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username');
            $table->string('password');
            $table->string('secret');
            $table->string('email');
            $table->enum('status', ['pending', 'confirm']);
            $table->dateTime('added');
            $table->dateTime('last_login');
            $table->dateTime('last_access');
            $table->string('editsecret');
            $table->enum('privacy', ['strong', 'normal', 'low']);
            $table->integer('stylesheet');
            $table->string('language');
            $table->text('info');
            $table->enum('acceptpms', ['yes', 'no']);
            $table->ipAddress('ip');
            $table->tinyInteger('class');
            $table->string('avatar');
            $table->bigInteger('uploaded');
            $table->bigInteger('downloaded');
            $table->string('title');
            $table->integer('donated');
            $table->integer('country');
            $table->string('notifs');
            $table->string('enabled');
            $table->text('modcomment');
            $table->string('gender');
            $table->string('client');
            $table->integer('age');
            $table->char('warned');
            $table->string('signature');
            $table->integer('last_browse');
            $table->char('forumbanned');
            $table->integer('invited_by');
            $table->string('invitees');
            $table->smallInteger('invites');
            $table->dateTime('invitedate');
            $table->enum('commentpm', ['yes', 'no']);
            $table->string('passkey');
            $table->text('page');
            $table->integer('team');
            $table->integer('tzoffset');
            $table->enum('hideshoutbox', ['yes', 'no']);

            $table->unique(['username', 'email']);
            $table->index('country', 'country');
            $table->index('downloaded', 'downloaded');
            $table->index('ip', 'ip');
            $table->index('status_added', 'status_added');
            $table->index('uploaded', 'uploaded');
            $table->index('username', 'username');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
