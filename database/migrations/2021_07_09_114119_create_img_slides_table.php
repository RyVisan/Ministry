<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_slides', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->text('slide_title');
            $table->string('image');
            $table->text('description')->nullable();
            $table->integer('order_by')->default(1);
            $table->integer('active')->default(1);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('img_slides');
    }
}
