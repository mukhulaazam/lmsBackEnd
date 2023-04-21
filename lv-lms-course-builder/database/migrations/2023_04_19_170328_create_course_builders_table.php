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
        Schema::create('course_builders', function (Blueprint $table) {
            $table->id();
            $table->string('kyc')->unique()->comment('know your course');
            $table->bigInteger('tag_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->text('title');
            $table->text('des');
            $table->string('phone_no', 100);
            $table->integer('duration')->unsigned()->comment('in hours');
            $table->decimal('price', 8, 2)->unsigned();
            $table->decimal('discount', 8, 2)->unsigned()->default(false)->nullable();
            $table->decimal('discounted_price', 8, 2)->unsigned()->default(false)->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_free')->default(false);
            $table->boolean('is_archive')->default(false);
            $table->boolean('is_published')->default(false);
            $table->text('banner_image')->nullable();
            $table->enum('type', [1, 2])->comment('1=course, he/she can upload content daily or weekly or etc', '2=bundle, all in one time');
            $table->text('slug');
            $table->boolean('status')->default(false);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_bulders');
    }
};
