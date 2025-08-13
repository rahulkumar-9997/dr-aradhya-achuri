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
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('services_category_id');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('short_content')->nullable();
            $table->text('content')->nullable();
            $table->string('main_image')->nullable();
            $table->string('icon_image')->nullable();
            $table->string('breadcrumb_image')->nullable();
            $table->timestamps();
            $table->foreign('services_category_id')->references('id')->on('services_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
