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
        Schema::create('ban_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('banned_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('banned_by_id')->nullable()->constrained('users')->nullOnDelete();
            $table->boolean("is_auto")->default(false);
            $table->dateTime("banned_until");
            $table->text("reason");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ban_logs');
    }
};
