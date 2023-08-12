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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('brand_type_id');
            $table->string('product_type_id');
            $table->enum('disabled', ['t', 'f'])->default('f');
            $table->decimal('price', 8, 2);
            $table->unsignedInteger('quantity')->default(0);
            $table->string('image')->nullable();
            $table->enum('trending', ['t', 'f'])->default('f');
            $table->enum('new', ['t', 'f'])->default('f');
            $table->dateTime('creation_date')->default(Carbon::now());
            $table->string('created_by')->nullable();
            $table->dateTime('update_date')->nullable();
            $table->string('updated_by')->nullable();
            $table->dateTime('disabled_date')->nullable();
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
