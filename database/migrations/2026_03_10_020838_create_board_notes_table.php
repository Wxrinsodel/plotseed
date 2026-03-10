<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('board_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->text('content')->nullable();
            $table->string('color')->default('bg-yellow-100');
            $table->float('pos_x')->default(0);
            $table->float('pos_y')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('board_notes');
    }
};