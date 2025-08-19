<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ta')->nullable();
            $table->text('desc_en')->nullable();
            $table->text('desc_ta')->nullable();
            $table->date('date')->nullable();
            $table->string('image')->nullable(); // store relative path
            $table->boolean('is_public')->default(false); // place BEFORE timestamps
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
