<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product')->nullable();// model
            $table->string("basis")->nullable();
            $table->string("terms")->nullable();
            $table->string("options")->nullable();
            $table->date("due_date")->nullable();
            $table->date("request_due_date")->nullable();


            $table->string("adp")->nullable();
            $table->string("adp_ma")->nullable();
            $table->string("adp_rebate")->nullable();
            $table->string("adp_net")->nullable();

            $table->string("dp")->nullable();
            $table->string("dp_ma")->nullable();
            $table->string("dp_cropping")->nullable();
            $table->string("dp_rebate")->nullable();
            $table->string("dp_net")->nullable();

            $table->string("status_of_customer")->nullable(); // [loyal , occasional , new]

            $table->unsignedBigInteger("co_maker_id")->nullable();

            $table->time('time_interviewed');
            $table->time('time_walked_in');

            $table->string('name_of_referral')->nullable();
            $table->string('name_of_field_sale')->nullable();
            $table->unsignedBigInteger('received_by_ci')->nullable();//staff
            $table->date('date_received_by_ci')->nullable();
            $table->time('time_received_by_ci')->nullable();
            $table->unsignedBigInteger('correct_and_confirmed_by')->nullable();//staff

            $table->string("map_location_longitude")->nullable();
            $table->string("map_location_latitude")->nullable();

            $table->string("distance_from_office")->nullable();
            $table->string("time_away_from_office")->nullable();
            $table->string("processing_time")->nullable();
            $table->string("estimated_time_to_release")->nullable();

            $table->text("recommendation_of_branch_manager")->nullable();

            $table->unsignedBigInteger("branch_manager")->nullable();//
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
        Schema::dropIfExists('credit_applications');
    }
}
