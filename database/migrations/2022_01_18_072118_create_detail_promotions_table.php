<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_promotions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('promotion_code')->unique();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('min_price');
            $table->float('percent');
            $table->unsignedBigInteger('amount');
            $table->unsignedBigInteger('vol_purchased');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_promotions');
    }
}
