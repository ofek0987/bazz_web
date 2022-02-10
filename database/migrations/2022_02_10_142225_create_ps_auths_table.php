<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsAuthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_auths', function (Blueprint $table) {
            $table->string('id', 40)->index('ps_auths_id');
            $table->enum('auth_type', ['md5', 'userpass', 'google_oauth'])->nullable();
            $table->integer('nonce_lifetime')->nullable();
            $table->string('md5_cred', 40)->nullable();
            $table->string('password', 80)->nullable();
            $table->string('realm', 40)->nullable();
            $table->string('username', 40)->nullable();
            $table->string('refresh_token')->nullable();
            $table->string('oauth_clientid')->nullable();
            $table->string('oauth_secret')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ps_auths');
    }
}
