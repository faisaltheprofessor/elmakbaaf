<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supliers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->text('company_name');
            $table->date('joining_date');
            $table->text('contact_num');
            $table->text('email');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('street_id')->nullable();
            $table->unsignedBigInteger('catagory_id')->nullable();
            $table->foreign('country_id')->references('id')->on('scountries')->onUpdate('cascade')->onDelate('set null');
            $table->foreign('city_id')->references('id')->on('scities')->onUpdate('cascade')->onDelate('set null');
            $table->foreign('street_id')->references('id')->on('sstreets')->onUpdate('cascade')->onDelate('set null');
            $table->foreign('catagory_id')->references('id')->on('scatagories')->onUpdate('cascade')->onDelate('set null');
            $table->text('zip'); 
            $table->foreignId('user_id')->constrained('users');
            $table->softDeletes();
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
        Schema::dropIfExists('supliers');
    }
}
