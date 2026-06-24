<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prayer_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('airport_id')->constrained()->cascadeOnDelete();
            $table->string('terminal');
            $table->string('location');
            $table->string('status')->default('Open 24/7');
            $table->string('gender_access')->default('Men & Women');
            $table->text('description')->nullable();
            $table->json('photos')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prayer_rooms');
    }
};
