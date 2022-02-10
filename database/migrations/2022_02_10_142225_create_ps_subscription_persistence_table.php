<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsSubscriptionPersistenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_subscription_persistence', function (Blueprint $table) {
            $table->string('id', 40)->index('ps_subscription_persistence_id');
            $table->string('packet', 2048)->nullable();
            $table->string('src_name', 128)->nullable();
            $table->integer('src_port')->nullable();
            $table->string('transport_key', 64)->nullable();
            $table->string('local_name', 128)->nullable();
            $table->integer('local_port')->nullable();
            $table->integer('cseq')->nullable();
            $table->string('tag', 128)->nullable();
            $table->string('endpoint', 40)->nullable();
            $table->integer('expires')->nullable();
            $table->string('contact_uri', 256)->nullable();
            $table->enum('prune_on_boot', ['yes', 'no'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ps_subscription_persistence');
    }
}
