<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('menu_id')->nullable();
            $table->integer('submenu_id')->nullable();
            $table->integer('sub1menu_id')->nullable();
            $table->string('image')->nullable();
            $table->text('name');
            $table->string('file_name')->nullable();
            $table->string('extension')->nullable();
            $table->float('size')->nullable();
            $table->date('date');
            $table->text('description')->nullable();
            $table->integer('download')->nullable();
            $table->integer('location')->nullable();
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
        Schema::dropIfExists('documents');
    }
}
