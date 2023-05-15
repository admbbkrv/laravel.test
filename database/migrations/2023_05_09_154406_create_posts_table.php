<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

//            $table->bigIncrements('user_id')->unsigned()->nullable();
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreignId('user_id')->constrained();

            $table->string('title');
            $table->text('content');

            $table->boolean('published')->default(true);
            $table->timestamp('published_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};