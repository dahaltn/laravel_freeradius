<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadacctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radacct', function (Blueprint $table) {
            $table->bigIncrements('radacctid');
            $table->string('acctsessionid')->default('');
            $table->string('acctuniqueid')->default('');
            $table->string('username')->default('');
            $table->string('realm')->default('');
            $table->string('nasipaddress')->default('');
            $table->string('nasportid')->nullable();
            $table->string('nasporttype')->nullable();
            $table->dateTime('acctstarttime')->nullable();
            $table->dateTime('acctupdatetime')->nullable();
            $table->dateTime('acctstoptime')->nullable();
            $table->integer('acctinterval')->nullable();
            $table->integer('acctsessiontime', false, true)->nullable();
            $table->string('acctauthentic')->nullable();
            $table->string('connectinfo_start')->nullable();
            $table->string('connectinfo_stop')->nullable();
            $table->integer('acctinputoctets')->nullable();
            $table->integer('acctoutputoctets')->nullable();
            $table->string('calledstationid')->default('');
            $table->string('callingstationid')->default('');
            $table->string('acctterminatecause')->default('');
            $table->string('servicetype')->nullable();
            $table->string('framedprotocol')->nullable();
            $table->string('framedipaddress')->default('');
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
        Schema::dropIfExists('radacct');
    }
}
