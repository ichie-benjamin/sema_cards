<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShowOnlineeToCard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_types', function (Blueprint $table) {
            $table->boolean('show_online')->default(0);
        });
    }

    public function down()
    {
        Schema::table('package_types', function (Blueprint $table) {
            $table->dropColumn('show_online');
        });
    }
}
