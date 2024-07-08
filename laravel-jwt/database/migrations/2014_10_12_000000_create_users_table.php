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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->string('email', 150)->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('profile_img')->nullable();
            $table->string('phone', 15)->nullable();
            $table->enum('role', ['admin','user'])->default('user');
            $table->string('country', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('street', 100)->nullable();
            $table->string('postal_code', 100)->nullable();
            $table->string('otp', 6)->nullable();
            $table->enum('status', [0, 1])->default(1)->comment('0 = De-Active, 1 = Active');
            $table->rememberToken();
            $table->timestamp('otp_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            // Add foreign key constraints
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

