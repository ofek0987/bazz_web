<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_contacts', function (Blueprint $table) {
            $table->string('id')->nullable()->index('ps_contacts_id');
            $table->string('uri', 511)->nullable();
            $table->bigInteger('expiration_time')->nullable();
            $table->integer('qualify_frequency')->nullable();
            $table->string('outbound_proxy', 40)->nullable();
            $table->text('path')->nullable();
            $table->string('user_agent')->nullable();
            $table->float('qualify_timeout', 10, 0)->nullable();
            $table->string('reg_server')->nullable();
            $table->enum('authenticate_qualify', ['yes', 'no'])->nullable();
            $table->string('via_addr', 40)->nullable();
            $table->integer('via_port')->nullable();
            $table->string('call_id')->nullable();
            $table->string('endpoint', 40)->nullable();
            $table->enum('prune_on_boot', ['yes', 'no'])->nullable();

            $table->index(['qualify_frequency', 'expiration_time'], 'ps_contacts_qualifyfreq_exp');
            $table->unique(['id', 'reg_server'], 'ps_contacts_uq');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ps_contacts');
    }
}
