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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->text('bg_img_url')->nullable();
            $table->text("bio")->nullable();
            $table->text("portfolio")->nullable();
            $table->boolean("is_freelancer")->default(true);
            $table->boolean("is_stakeholder")->default(false);
            $table->boolean("TFA")->default(false);
            $table->dateTime("banned_until")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
