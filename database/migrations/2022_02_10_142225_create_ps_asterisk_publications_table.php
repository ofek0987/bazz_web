<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsAsteriskPublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_asterisk_publications', function (Blueprint $table) {
            $table->string('id', 40)->index('ps_asterisk_publications_id');
            $table->string('devicestate_publish', 40)->nullable();
            $table->string('mailboxstate_publish', 40)->nullable();
            $table->enum('device_state', ['yes', 'no'])->nullable();
            $table->string('device_state_filter', 256)->nullable();
            $table->enum('mailbox_state', ['yes', 'no'])->nullable();
            $table->string('mailbox_state_filter', 256)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ps_asterisk_publications');
    }
}
