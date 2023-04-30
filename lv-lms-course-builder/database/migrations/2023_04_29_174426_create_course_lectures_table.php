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
        Schema::create('course_lectures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_builder_id')->constrained()->cascadeOnDelete();
            $table->foreignId('section_id')->constrained()->cascadeOnDelete();
            $table->text('title')->unique();
            $table->text('slug')->unique();
            $table->text('des')->nullable();
            $table->string('video_url')->nullable();
            $table->decimal('video_duration',8,2)->nullable();
            $table->string('video_thumbnail')->nullable();
            $table->boolean('is_free')->nullable()->default(false);
            $table->boolean('is_published')->nullable()->default(false);
            $table->boolean('is_preview')->nullable()->default(false);
            $table->integer('sort_order')->nullable()->default(0);
            $table->bigInteger('view_count')->nullable()->default(0);
            $table->bigInteger('like_count')->nullable()->default(0);
            $table->bigInteger('dislike_count')->nullable()->default(0);
            $table->integer('comment_id')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_lectures');
    }
};
