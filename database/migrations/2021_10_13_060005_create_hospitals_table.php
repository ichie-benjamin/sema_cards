<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->text('provider_name')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->text('cpr_no')->unique();
            $table->text('contact')->nullable();
            $table->text('contact2')->nullable();
            $table->text('email')->nullable();
            $table->text('address')->nullable();
            $table->text('website')->nullable();
            $table->text('category')->nullable();
            $table->text('specialist')->nullable();
            $table->text('contract_file')->nullable();
            $table->date('contract_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->text('logo')->nullable();
            $table->text('image')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('hospitals');
    }
}
