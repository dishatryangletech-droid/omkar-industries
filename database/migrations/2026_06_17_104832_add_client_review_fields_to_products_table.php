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
        Schema::table('products', function (Blueprint $table) {
            $table->string('client_review_title')->nullable()->default('Our Client Review About Project');
            $table->text('client_review_description')->nullable();
            $table->json('client_review_images')->nullable();
            $table->json('client_review_faqs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['client_review_title', 'client_review_description', 'client_review_images', 'client_review_faqs']);
        });
    }
};
