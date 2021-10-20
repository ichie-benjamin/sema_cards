<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToHospitalArabic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hospitals', function (Blueprint $table) {
            $table->text('ar_provider_name')->nullable();
            $table->text('ar_place')->nullable();
            $table->text('place')->nullable();
            $table->text('ar_address')->nullable();
            $table->text('ar_description')->nullable();
            $table->text('ar_comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hospitals', function (Blueprint $table) {
            $table->dropColumn([
                'ar_provider_name',
                'ar_place',
                'place',
                'ar_address',
                'ar_description',
                'ar_comment'
            ]);
        });
    }
}
