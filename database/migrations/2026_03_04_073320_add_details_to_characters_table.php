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
        Schema::table('characters', function (Blueprint $table) {
            if (!Schema::hasColumn('characters', 'role')) {
                $table->string('role')->nullable();
            }
            if (!Schema::hasColumn('characters', 'identity')) {
                $table->text('identity')->nullable();
            }
            if (!Schema::hasColumn('characters', 'background')) {
                $table->text('background')->nullable();
            }
            if (!Schema::hasColumn('characters', 'development')) {
                $table->text('development')->nullable();
            }
            if (!Schema::hasColumn('characters', 'description')) {
                $table->text('description')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('characters', function (Blueprint $table) {
            //
        });
    }
};
