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
        Schema::create('roles_abilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->default(1)->constrained('roles')->cascadeOnDelete();
            $table->foreignId('ability_id')->default(1)->constrained('abilities')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_abilities');
    }
};
