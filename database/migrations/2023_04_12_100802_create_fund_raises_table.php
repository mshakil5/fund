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
        Schema::create('fund_raises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->bigInteger('fundraising_source_id')->unsigned()->nullable();
            $table->foreign('fundraising_source_id')->references('id')->on('fundraising_sources');
            $table->string('fundraising_for',191)->nullable();
            $table->double('raising_goal',10,2)->nullable();
            $table->double('total_collection',10,2)->nullable();
            $table->string('image',191)->nullable();
            $table->string('video_link',191)->nullable();
            $table->longText('title')->nullable();
            $table->longText('story')->nullable();
            $table->tinyInteger('approved')->default(0);
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('fund_raises');
    }
};
