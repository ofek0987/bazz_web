<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_systems', function (Blueprint $table) {
            $table->string('id', 40)->index('ps_systems_id');
            $table->integer('timer_t1')->nullable();
            $table->integer('timer_b')->nullable();
            $table->enum('compact_headers', ['yes', 'no'])->nullable();
            $table->integer('threadpool_initial_size')->nullable();
            $table->integer('threadpool_auto_increment')->nullable();
            $table->integer('threadpool_idle_timeout')->nullable();
            $table->integer('threadpool_max_size')->nullable();
            $table->enum('disable_tcp_switch', ['yes', 'no'])->nullable();
            $table->enum('follow_early_media_fork', ['yes', 'no'])->nullable();
            $table->enum('accept_multiple_sdp_answers', ['yes', 'no'])->nullable();
            $table->enum('disable_rport', ['0', '1', 'off', 'on', 'false', 'true', 'no', 'yes'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ps_systems');
    }
}
