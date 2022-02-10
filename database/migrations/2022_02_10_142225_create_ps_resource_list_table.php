<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsResourceListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_resource_list', function (Blueprint $table) {
            $table->string('id', 40)->index('ps_resource_list_id');
            $table->string('list_item', 2048)->nullable();
            $table->string('event', 40)->nullable();
            $table->enum('full_state', ['yes', 'no'])->nullable();
            $table->integer('notification_batch_interval')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ps_resource_list');
    }
}
