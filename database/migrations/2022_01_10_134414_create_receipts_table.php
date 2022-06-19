<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->date('receipt_date');
            $table->unsignedBigInteger('suplier_id')->nullable();
            $table->foreign('suplier_id')->references('id')->on('supliers')->onUpdate('cascade')->onDelate('set null'); 
            $table->text('total_price');
            $table->text('total_amount');
            $table->text('total_square_meters');
            $table->text('total_bales');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('receipts');
    }
}
