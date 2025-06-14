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
        Schema::create('membership_plan_promo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('membership_plan_id')->constrained('membership_plans')->onDelete('cascade');
            $table->foreignId('promo_id')->constrained('promos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_plan_promo');
    }
};
