<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('payment_method');
            $table->string('payable');
            $table->string('paid');
            $table->string('dues');
            $table->string('status');
            $table->string('trasaction_id');
            $table->string('brand');
            $table->string('name_on_card');
            $table->string('card_last_four_digit');
            $table->string('expire_month');
            $table->string('expire_year');
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
        Schema::dropIfExists('payments');
    }
}
