<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('issue_images', function (Blueprint $table) {
            $table->id();
            $table->string('flat_name');
            $table->unsignedBigInteger('user_issue_id');
            $table->text('image_path');
            $table->timestamps();
            $table->softDeletes();
            // Foreign key constraint
            $table->foreign('user_issue_id')->references('id')->on('user_issue');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issue_images');
    }
};
