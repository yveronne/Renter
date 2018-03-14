<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lastName');
            $table->string('firstName');
            $table->string('email');
            $table->string('cniNumber');
            $table->string('profession');
            $table->string('phoneNumber');
            $table->date('tenureDate');
            $table->string('maritalStatus');
            $table->integer('apartmentID')->unsigned();
            $table->timestamps();
        });

        Schema::table('tenants', function (Blueprint $table){
            $table->foreign('apartmentID')
                ->references('id')->on('apartments')
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
        Schema::dropIfExists('tenants');
    }
}
