<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('authors');
            $table->string('venue');
            $table->string('year');
            $table->enum('type', ['journal', 'conference', 'book']);
            $table->string('doi')->nullable();
            $table->string('volume')->nullable();
            $table->string('pages')->nullable();
            $table->string('isbn')->nullable();
            $table->string('publisher')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};