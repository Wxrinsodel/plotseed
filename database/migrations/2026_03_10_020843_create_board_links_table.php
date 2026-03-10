<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('board_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            
            $table->foreignId('source_note_id')->constrained('board_notes')->cascadeOnDelete();
            $table->foreignId('target_note_id')->constrained('board_notes')->cascadeOnDelete();
            
            $table->string('label')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('board_links');
    }
};