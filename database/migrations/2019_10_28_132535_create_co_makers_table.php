<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoMakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("co_makers", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("title");
            $table->string("first_name");
            $table->string("middle_name")->nullable();
            $table->string("last_name");
            $table->string("address")->nullable();
            $table->string("relationship")->nullable();
            $table->string("occupation")->nullable();
            $table->string("contact_number")->nullable();
            $table->string("legal_document_presented")->nullable();
            $table->string("identification_number")->nullable();
            $table->string("drivers_license")->nullable();
            $table->string("first_signature_specimen")->nullable();// filename containing the signature
            $table->string("second_signature_specimen")->nullable();// filename containing the signature
            $table->string("third_signature_specimen")->nullable();// filename containing the signature

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
        Schema::dropIfExists('co_makers');
    }
}

