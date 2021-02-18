<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('send_from', 50)->nullable();
            $table->string('send_to', 50)->nullable();
            $table->string('message', 250)->nullable();
            $table->string('purl_confirmation', 100)->nullable();
            $table->datetime('purl_confirmation_send')->nullable();
            $table->string('purl_read', 100)->nullable();
            $table->datetime('purl_read_send')->nullable();
            $table->datetime('message_readed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
