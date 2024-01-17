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
        Schema::create('rewards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reward_id');
            $table->unsignedBigInteger('profile_id');
            $table->date('reward_date');
            $table->enum('reward_source', ['المركز الرئيسي', 'الفرع']);
            $table->string('reward_reason');
            $table->foreign('reward_id')->references('id')->on('reward_names');
            $table->foreign('profile_id')->references('id')->on('Profiles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rewards');
    }
};
