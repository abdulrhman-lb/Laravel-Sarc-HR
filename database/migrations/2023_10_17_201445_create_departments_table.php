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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('department_en');
            $table->string('department_short')->nullable();
            $table->string('department_address')->nullable();
            $table->string('donor')->nullable();
            $table->text('department_information')->nullable();
            $table->string('coordinator_id')->nullable();
            $table->string('coordinator_name')->nullable();
            $table->string('coordinator_mobile')->nullable();
            $table->string('coordinator_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
