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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->longText('code')->nullable();
            $table->integer('views')->default('0');
            $table->enum('status', ['Draft', 'Wait', 'Active', 'Rejecte']);
            $table->enum('theme', ['Dark/Light', 'Dark', 'Light']);

            $table->unsignedBigInteger('user_id')->nullable();  
            $table->foreign('user_id')->references('id')->on("users")->onDelete('cascade');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on("categories")->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
};
