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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('user_membership_id')->nullable();
            $table->string('order_id')->nullable();
            $table->string('txn_id')->nullable();
            $table->decimal('amount')->nullable();
            $table->string('system_ref')->nullable();
            $table->string('gateway_ref')->nullable();
            $table->string('gateway_used')->nullable();
            $table->string('status')->default('pending');
            $table->string('failed_reason')->nullable();
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
