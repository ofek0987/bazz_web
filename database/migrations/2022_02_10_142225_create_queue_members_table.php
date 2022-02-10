<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueueMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queue_members', function (Blueprint $table) {
            $table->string('queue_name', 80);
            $table->string('interface', 80);
            $table->string('membername', 80)->nullable();
            $table->string('state_interface', 80)->nullable();
            $table->integer('penalty')->nullable();
            $table->integer('paused')->nullable();
            $table->integer('uniqueid', true)->unique('uniqueid');
            $table->integer('wrapuptime')->nullable();
            $table->enum('ringinuse', ['0', '1', 'off', 'on', 'false', 'true', 'no', 'yes'])->nullable();

            $table->primary(['queue_name', 'interface']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queue_members');
    }
}
