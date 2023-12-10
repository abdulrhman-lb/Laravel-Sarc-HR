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
        Schema::create('penalties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penalty_id');
            $table->unsignedBigInteger('profile_id');
            $table->date('penalty_date');
            $table->enum('penalty_source', ['المركز الرئيسي', 'الفرع']);
            $table->string('penalty_reason');
            $table->timestamps();
            $table->foreign('penalty_id')->references('id')->on('penalty_names');
            $table->foreign('profile_id')->references('id')->on('Profiles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penalties');
    }
};
