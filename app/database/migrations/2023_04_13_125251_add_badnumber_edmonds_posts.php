<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBadnumberEdmondsPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('edmonds_posts', function (Blueprint $table) {
            $table->integer('badbutton');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('edmonds_posts', function (Blueprint $table) {
            $table->dropColumn('badbutton');
        });
    }
}
