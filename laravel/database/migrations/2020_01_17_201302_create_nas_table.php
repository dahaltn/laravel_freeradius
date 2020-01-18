<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nasname')->unique();
            $table->string('shortname')->nullable();
            $table->string('secret');
            $table->integer('ports')->default(0);
            $table->string('type')->default('other');
            $table->string('server')->nullable();
            $table->text('community')->nullable();
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
        Schema::dropIfExists('nas');
    }
}
