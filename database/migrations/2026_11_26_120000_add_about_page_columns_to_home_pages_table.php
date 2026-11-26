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
            if (!Schema::hasColumn('home_pages', 'about_page_title')) {
                $table->string('about_page_title')->nullable();
            }
            if (!Schema::hasColumn('home_pages', 'about_page_subtitle')) {
                $table->string('about_page_subtitle')->nullable();
            }
            if (!Schema::hasColumn('home_pages', 'about_page_description')) {
                $table->text('about_page_description')->nullable();
            }
            if (!Schema::hasColumn('home_pages', 'about_page_photo')) {
                $table->string('about_page_photo')->nullable();
            }
            if (!Schema::hasColumn('home_pages', 'about_page_btn_title')) {
                $table->string('about_page_btn_title')->nullable();
            }
            if (!Schema::hasColumn('home_pages', 'about_page_btn_link')) {
                $table->string('about_page_btn_link')->nullable();
            }
            if (!Schema::hasColumn('home_pages', 'about_page_text1')) {
                $table->string('about_page_text1')->nullable();
            }
            if (!Schema::hasColumn('home_pages', 'about_page_text2')) {
                $table->string('about_page_text2')->nullable();
            }
            if (!Schema::hasColumn('home_pages', 'about_page_text3')) {
                $table->string('about_page_text3')->nullable();
            }
            if (!Schema::hasColumn('home_pages', 'about_page_text4')) {
                $table->string('about_page_text4')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->dropColumn([
                'about_page_title',
                'about_page_subtitle',
                'about_page_description',
                'about_page_photo',
                'about_page_btn_title',
                'about_page_btn_link',
                'about_page_text1',
                'about_page_text2',
                'about_page_text3',
                'about_page_text4',
            ]);
        });
    }
};
