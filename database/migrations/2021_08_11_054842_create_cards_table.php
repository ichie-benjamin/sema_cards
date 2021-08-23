<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function(Blueprint $table)
        {
            $table->id();
            $table->string('full_name');
            $table->string('gender')->nullable();
            $table->string('cpr_no')->unique();
            $table->string('mobile')->nullable();
            $table->string('mobile2')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('card_type')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('contact_method')->nullable();
            $table->string('package_type')->nullable();
            $table->string('comment')->nullable();
            $table->integer('period')->default(3);
            $table->integer('agent_id')->unsigned()->index();
            $table->string('status')->default('draft');
            $table->date('issue_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->date('first_issue_date')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('card_id')->unsigned()->nullable()->index();
            $table->boolean('is_parent')->default(1);
            $table->string('policy_no')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cards');
    }
}
