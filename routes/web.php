<?php

use Illuminate\Support\Facades\Route;

// Livewire Frontend Routes
Route::get('/about-us', \App\Livewire\Frontend\AboutUs::class)->name('frontend.about-us');
Route::get('/blog-classic', \App\Livewire\Frontend\BlogClassic::class)->name('frontend.blog-classic');
Route::get('/blog-grid-col-3', \App\Livewire\Frontend\BlogGridCol3::class)->name('frontend.blog-grid-col-3');
Route::get('/blog-grid-col-4', \App\Livewire\Frontend\BlogGridCol4::class)->name('frontend.blog-grid-col-4');
Route::get('/blog-m-grid-col-2', \App\Livewire\Frontend\BlogMGridCol2::class)->name('frontend.blog-m-grid-col-2');
Route::get('/blog-m-grid-col-3', \App\Livewire\Frontend\BlogMGridCol3::class)->name('frontend.blog-m-grid-col-3');
Route::get('/blog-m-grid-col-4', \App\Livewire\Frontend\BlogMGridCol4::class)->name('frontend.blog-m-grid-col-4');
Route::get('/blog-masonry-wide', \App\Livewire\Frontend\BlogMasonryWide::class)->name('frontend.blog-masonry-wide');
Route::get('/blog-single-details', \App\Livewire\Frontend\BlogSingleDetails::class)->name('frontend.blog-single-details');
Route::get('/blog-sortable-grid-view', \App\Livewire\Frontend\BlogSortableGridView::class)->name('frontend.blog-sortable-grid-view');
Route::get('/contact-us', \App\Livewire\Frontend\ContactUs::class)->name('frontend.contact-us');
Route::get('/faq', \App\Livewire\Frontend\Faq::class)->name('frontend.faq');
Route::get('/homepage-2', \App\Livewire\Frontend\Homepage2::class)->name('frontend.homepage-2');
Route::get('/index-2', \App\Livewire\Frontend\Index2::class)->name('frontend.index-2');
Route::get('/', \App\Livewire\Frontend\IndexPage::class)->name('frontend.index');
Route::get('/our-history', \App\Livewire\Frontend\OurHistory::class)->name('frontend.our-history');
Route::get('/our-team', \App\Livewire\Frontend\OurTeam::class)->name('frontend.our-team');
Route::get('/portfolio-detail-style-01', \App\Livewire\Frontend\PortfolioDetailStyle01::class)->name('frontend.portfolio-detail-style-01');
Route::get('/portfolio-detail-style-02', \App\Livewire\Frontend\PortfolioDetailStyle02::class)->name('frontend.portfolio-detail-style-02');
Route::get('/portfolio-grid-col-2', \App\Livewire\Frontend\PortfolioGridCol2::class)->name('frontend.portfolio-grid-col-2');
Route::get('/portfolio-grid-col-3', \App\Livewire\Frontend\PortfolioGridCol3::class)->name('frontend.portfolio-grid-col-3');
Route::get('/portfolio-grid-col-4', \App\Livewire\Frontend\PortfolioGridCol4::class)->name('frontend.portfolio-grid-col-4');
Route::get('/portfolio-grid-no-gap', \App\Livewire\Frontend\PortfolioGridNoGap::class)->name('frontend.portfolio-grid-no-gap');
Route::get('/portfolio-m-grid-col-2', \App\Livewire\Frontend\PortfolioMGridCol2::class)->name('frontend.portfolio-m-grid-col-2');
Route::get('/portfolio-m-grid-col-3', \App\Livewire\Frontend\PortfolioMGridCol3::class)->name('frontend.portfolio-m-grid-col-3');
Route::get('/portfolio-m-grid-col-4', \App\Livewire\Frontend\PortfolioMGridCol4::class)->name('frontend.portfolio-m-grid-col-4');
Route::get('/portfolio-m-grid-wide', \App\Livewire\Frontend\PortfolioMGridWide::class)->name('frontend.portfolio-m-grid-wide');
Route::get('/portfolio-sortable-grid-col-2', \App\Livewire\Frontend\PortfolioSortableGridCol2::class)->name('frontend.portfolio-sortable-grid-col-2');
Route::get('/portfolio-sortable-grid-col-3', \App\Livewire\Frontend\PortfolioSortableGridCol3::class)->name('frontend.portfolio-sortable-grid-col-3');
Route::get('/portfolio-sortable-grid-col-4', \App\Livewire\Frontend\PortfolioSortableGridCol4::class)->name('frontend.portfolio-sortable-grid-col-4');
Route::get('/service-details', \App\Livewire\Frontend\ServiceDetails::class)->name('frontend.service-details');
Route::get('/services', \App\Livewire\Frontend\Services::class)->name('frontend.services');
Route::get('/team-member-detail', \App\Livewire\Frontend\TeamMemberDetail::class)->name('frontend.team-member-detail');
