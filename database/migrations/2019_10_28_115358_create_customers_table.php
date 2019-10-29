<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->date('birthday');
            $table->string('facebook_account')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('wedding_anniversary')->nullable();
            $table->string('house_number')->nullable();
            $table->string("street")->nullable();
            $table->string('barangay')->nullable();
            $table->string("municipality")->nullable();
            $table->string("province")->nullable();
            $table->string("zipcode")->nullable();
            $table->string("length_of_stay_present_address")->nullable();
            $table->string("previous_address")->nullable();
            $table->string("birth_place")->nullable();
            $table->string("fathers_name")->nullable();
            $table->string("mothers_name")->nullable();
            $table->string("gender")->nullable();
            $table->string("height")->nullable();
            $table->string("weight")->nullable();
            $table->string("tin_id")->nullable();
            $table->string("house_ownership")->nullable(); // [own , rent , living with parents]
            $table->string("business_address")->nullable();
            $table->string("mobile_number")->nullable();
            $table->string("occupation")->nullable();
            $table->string("length_of_service")->nullable();
            $table->string("basic_income")->nullable();
            $table->string("source_of_income")->nullable();
            $table->string("other_income")->nullable();
            $table->string("name_of_spouse")->nullable();
            $table->string("age")->nullable();
            $table->string("number_of_children")->nullable();
            $table->string("spouse_contact_number")->nullable();
            $table->string("spouse_occupation")->nullable();
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
        Schema::dropIfExists('customers');
    }
}
