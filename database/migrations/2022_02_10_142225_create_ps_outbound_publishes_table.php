<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsOutboundPublishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_outbound_publishes', function (Blueprint $table) {
            $table->string('id', 40)->index('ps_outbound_publishes_id');
            $table->integer('expiration')->nullable();
            $table->string('outbound_auth', 40)->nullable();
            $table->string('outbound_proxy', 256)->nullable();
            $table->string('server_uri', 256)->nullable();
            $table->string('from_uri', 256)->nullable();
            $table->string('to_uri', 256)->nullable();
            $table->string('event', 40)->nullable();
            $table->integer('max_auth_attempts')->nullable();
            $table->string('transport', 40)->nullable();
            $table->enum('multi_user', ['yes', 'no'])->nullable();
            $table->string('@body', 40)->nullable();
            $table->string('@context', 256)->nullable();
            $table->string('@exten', 256)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ps_outbound_publishes');
    }
}
