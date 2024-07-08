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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('post_id')->nullable();
            // $table->unsignedBigInteger('notifiable_id');
            // $table->string('title')->nullable();
            // // $table->text('description')->nullable();
            // $table->json('mention')->nullable();
            // $table->unsignedBigInteger('comment_id')->nullable();
            // $table->dateTime('read_at')->nullable();
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreign('notifiable_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreign('comment_id')->references('id')->on('comments')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
