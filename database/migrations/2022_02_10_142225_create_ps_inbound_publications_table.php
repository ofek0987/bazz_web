<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsInboundPublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_inbound_publications', function (Blueprint $table) {
            $table->string('id', 40)->index('ps_inbound_publications_id');
            $table->string('endpoint', 40)->nullable();
            $table->string('event_asterisk-devicestate', 40)->nullable();
            $table->string('event_asterisk-mwi', 40)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ps_inbound_publications');
    }
}
