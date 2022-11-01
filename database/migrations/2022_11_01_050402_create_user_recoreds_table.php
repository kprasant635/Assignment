<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRecoredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_recoreds', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('email')->unique();
            $table->date('joindate')->nullable();
            $table->date('leavedate')->nullable();
            $table->tinyInteger('vch_working_status')->nullable();
            $table->string('image',255)->nullable();
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
        Schema::dropIfExists('user_recoreds');
    }
}
