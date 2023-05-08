<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('date',255)->nullable();
            $table->string('donation_type',255)->nullable();
            $table->string('donation_display_name',255)->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('campaign_id')->unsigned()->nullable();
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
            $table->bigInteger('charity_id')->unsigned()->nullable();
            $table->foreign('charity_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('amount',10,2)->nullable();
            $table->double('tips',10,2)->nullable();
            $table->double('commission',10,2)->nullable();
            $table->double('total_amount',10,2)->nullable();
            $table->longText('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('token',255)->nullable();
            $table->string('name',255)->nullable();
            $table->string('tips_percent',255)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('notification')->default(0);
            $table->string('updated_by')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};