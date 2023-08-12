<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('user_type_id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('disabled', ['t', 'f'])->default('f');
            $table->string('secret_question')->nullable();
            $table->string('secret_answer')->nullable();
            $table->dateTime('creation_date')->default(Carbon::now());
            $table->string('created_by')->nullable();
            $table->dateTime('update_date')->nullable();
            $table->string('updated_by')->nullable();
            $table->rememberToken();
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
