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
        Schema::create('banner_services_link', function (Blueprint $table) {
            $table->id();
            $table->foreignId('banner_services_id')
                  ->constrained('banner_services')
                  ->onDelete('cascade');
            $table->unsignedInteger('services_id')->nullable();
            $table->timestamps();
            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner_services_link');
    }
};
