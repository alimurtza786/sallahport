<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wudu_facilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('airport_id')->constrained()->cascadeOnDelete();
            $table->string('terminal');
            $table->string('location');
            $table->string('status')->default('Available');
            $table->text('description')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wudu_facilities');
    }
};
