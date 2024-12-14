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
        Schema::create('customer_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string("title");
            $table->text("description");
            $table->boolean("is_private")->default(false);
            $table->enum("type", \App\Enums\CustomerServiceTypes::values());
            $table->enum("status", \App\Enums\CustomerServiceCardStatus::values())->default(\App\Enums\CustomerServiceCardStatus::PENDING->value);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_cards');
    }
};
