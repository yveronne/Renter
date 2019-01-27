<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->increments('id');
            $table->date('rentMonth');
            $table->boolean('settled')->default(false);
            $table->integer('tenantID')->unsigned();
            $table->integer('apartmentID')->unsigned();
            $table->timestamps();
        });


        Schema::table('rents', function(Blueprint $table){
            $table->foreign('tenantID')
                ->references('id')->on('tenants');
            $table->foreign('apartmentID')
                ->references('id')->on('apartments');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rents');
    }
}
