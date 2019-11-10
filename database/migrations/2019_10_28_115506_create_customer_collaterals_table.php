<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerCollateralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_collateral', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->string("supporting_document")->nullable();//
            $table->float("estimated_market_value")->default(0);
            $table->unsignedBigInteger("customer_id")->nullable();
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
        Schema::dropIfExists('customer_collaterlas');
    }
}
