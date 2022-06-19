<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('design');
            $table->float('lenght');
            $table->float('width');
            $table->string('color');
            $table->float('price');          
            $table->string('img');
            // $table->integer('quantity')->unsigned();  
            //tinyinteger becouse we only insert 1 or 0
            $table->tinyInteger('status')->default(1);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('catagory_id')->constrained('catagories')->onUpdate('cascade')->onDelate('set null')->nullable();
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
        Schema::dropIfExists('products');
    }
}
