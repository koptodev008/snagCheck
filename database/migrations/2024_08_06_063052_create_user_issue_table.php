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
        Schema::create('user_issues', function (Blueprint $table) {
            $table->id();
            $table->string('category_issue_name');
            $table->string('location_name');
            $table->string('flat_name');
            $table->text('comment')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_issues');
    }
};
