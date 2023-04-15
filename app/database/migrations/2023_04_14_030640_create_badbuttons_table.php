<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadbuttonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badbuttons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->tinyinteger('edmondspost_id');
            $table->tinyinteger('seattlepost_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('badbuttons');
    }
}
