<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditApplicationProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_application_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('credit_application_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

//            $table->unique(['credit_application_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_application_product');
    }
}
