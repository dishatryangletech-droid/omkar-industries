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
        Schema::table('home_pages', function (Blueprint $table) {
            if (!Schema::hasColumn('home_pages', 'about_page_box1')) {
                $table->text('about_page_box1')->nullable();
            }
            if (!Schema::hasColumn('home_pages', 'about_page_box2')) {
                $table->text('about_page_box2')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->dropColumn(['about_page_box1', 'about_page_box2']);
        });
    }
};
