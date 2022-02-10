<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMusiconholdEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('musiconhold_entry', function (Blueprint $table) {
            $table->foreign(['name'], 'fk_musiconhold_entry_name_musiconhold')->references(['name'])->on('musiconhold')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('musiconhold_entry', function (Blueprint $table) {
            $table->dropForeign('fk_musiconhold_entry_name_musiconhold');
        });
    }
}
