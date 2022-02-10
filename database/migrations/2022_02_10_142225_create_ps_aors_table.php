<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsAorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_aors', function (Blueprint $table) {
            $table->string('id', 40)->index('ps_aors_id');
            $table->string('contact')->nullable();
            $table->integer('default_expiration')->nullable();
            $table->string('mailboxes', 80)->nullable();
            $table->integer('max_contacts')->nullable();
            $table->integer('minimum_expiration')->nullable();
            $table->enum('remove_existing', ['yes', 'no'])->nullable();
            $table->integer('qualify_frequency')->nullable();
            $table->enum('authenticate_qualify', ['yes', 'no'])->nullable();
            $table->integer('maximum_expiration')->nullable();
            $table->string('outbound_proxy', 40)->nullable();
            $table->enum('support_path', ['yes', 'no'])->nullable();
            $table->float('qualify_timeout', 10, 0)->nullable();
            $table->string('voicemail_extension', 40)->nullable();
            $table->enum('remove_unavailable', ['0', '1', 'off', 'on', 'false', 'true', 'no', 'yes'])->nullable();

            $table->index(['qualify_frequency', 'contact'], 'ps_aors_qualifyfreq_contact');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ps_aors');
    }
}
