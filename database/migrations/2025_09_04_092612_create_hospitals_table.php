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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('hospital_name');
            $table->string('hospital_address');
            $table->string('hospital_phone');
            $table->string('hospital_email')->nullable();
            $table->string('hospital_website')->nullable();
            $table->string('hospital_logo')->nullable();
            $table->string('license_no')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('type', ['diagnostic', 'hospital', 'clinic'])->default('diagnostic');
            $table->time('opening_hours')->nullable();
            $table->time('closing_hours')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitals');
    }
};
