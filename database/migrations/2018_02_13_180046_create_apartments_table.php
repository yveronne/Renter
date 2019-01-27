<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('apartmentNumber');
            $table->double('monthlyRent');
            $table->integer('livingRoomsNumber');
            $table->integer('kitchensNumber');
            $table->integer('bedroomsNumber');
            $table->integer('bathroomsNumber');
            $table->integer('buildingID')->unsigned();
            $table->integer('currentTenantID')->unsigned()->default(null);
            $table->timestamps();
        });

        Schema::table('apartments', function(Blueprint $table){
            $table->foreign('buildingID')
                ->references('id')->on('buildings')
                ->onDelete('cascade');

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
        Schema::dropIfExists('apartments');
    }
}
