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
        Schema::create('sequences', function (Blueprint $table) {
            $table->id();
            // if the project is deleted, all related sequences will be deleted as well
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            
            $table->string('chapter_no')->nullable(); // store chapter number, e.g., "Chapter 1", "Chapter 2", etc. (optional)
            $table->string('title');                  // store event title, e.g., "The Beginning of the End"
            $table->text('description')->nullable();  // store event description
            $table->integer('order_num')->default(0); // store number for ordering (top to bottom)
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sequences');
    }
};
