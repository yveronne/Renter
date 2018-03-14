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
            $table->date('paymentDate');
            $table->double('amount');
            $table->date('rentMonth');
            $table->boolean('advance');
            $table->date('monthAdvance');
            $table->boolean('residue');
            $table->date('monthResidue');
            $table->integer('tenantID')->unsigned();
            $table->timestamps();
        });

        Schema::table('rents', function(Blueprint $table){
            $table->foreign('tenantID')
                ->references('id')->on('tenants');

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
