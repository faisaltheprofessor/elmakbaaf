<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakingorderOrderitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return voida
     */
    public function up()
    {
        Schema::create('takingorder_orderitems', function (Blueprint $table) {
           $table->id();
           $table->foreignId('user_id')->constrained('users');
           $table->integer('quantity');
           $table->unsignedBigInteger('orderitem_id')->nullable();
           $table->foreign('orderitem_id')->references('id')->on('orderitems')->onUpdate('cascade')->onDelate('set null');  
           $table->unsignedBigInteger('takingorder_id')->unsigned()->nullable();
           $table->foreign('takingorder_id')->references('id')->on('takingorders')->onUpdate('cascade')->onDelate('set null');

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
        Schema::dropIfExists('takingorder_orderitems');
    }
}
