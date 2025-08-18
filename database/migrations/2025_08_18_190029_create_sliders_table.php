<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ta')->nullable();
            $table->json('images')->nullable(); // store images as JSON
            $table->text('desc_en')->nullable();
            $table->text('desc_ta')->nullable();
            $table->boolean('is_public')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
