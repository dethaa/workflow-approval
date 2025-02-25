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
        Schema::create('employees', function (Blueprint $table) {
            $table->string('nik')->primary();
            $table->string('name');
            $table->string('email');
            $table->string('position');
            $table->string('approver1_name')->nullable();
            $table->string('approver1_email')->nullable();
            $table->string('approver1_position')->nullable();
            $table->string('approver2_name')->nullable();
            $table->string('approver2_email')->nullable();
            $table->string('approver2_position')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
