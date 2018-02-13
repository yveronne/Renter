<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->date('paymentDate');
            $table->double('amount');
            $table->date('billMonth');
            $table->boolean('advance');
            $table->date('monthAdvance');
            $table->boolean('residue');
            $table->date('monthResidue');
            $table->integer('tenantID')->unsigned();
            $table->timestamps();
        });

        Schema::table('bills', function(Blueprint $table){
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
        Schema::dropIfExists('bills');
    }
}
