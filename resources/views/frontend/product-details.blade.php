<x-layouts.app title="{{ $product->title ?? 'Product Detail' }} - Omkar">
	<div>
		<style>
			.pbmit-btn-sm {
				padding: 8px 18px !important;
				font-size: 13px !important;
				border-radius: 6px !important;
				min-height: auto !important;
			}

			.pbmit-btn-sm .pbmit-button-content-wrapper {
				gap: 3px !important;
			}

			.pbmit-btn-sm .pbmit-button-content-wrapper:before {
				width: 33px !important;
				height: calc(100% - 6px) !important;
				top: 3px !important;
				left: 3px !important;
				line-height: 25px !important;
				font-size: 11px !important;
				border-radius: 4px !important;
			}

			.pbmit-btn-sm .pbmit-button-icon {
				left: -4px !important;
			}

			.pbmit-btn-sm .pbmit-button-icon i {
				font-size: 11px !important;
			}

			.pbmit-btn-sm .pbmit-button-icon:after {
				font-size: 11px !important;
			}

			.pbmit-btn-sm .pbmit-button-text {
				font-size: 13px !important;
				line-height: 18px !important;
				margin-left: 4px !important;
				text-shadow: 0 0 #16222d, 0 18px #16222d !important;
			}

			.pbmit-btn-sm:hover .pbmit-button-content-wrapper:before {
				width: calc(100% - 6px) !important;
			}

			.pbmit-btn-sm:hover .pbmit-button-text {
				text-shadow: 0 -18px #16222d, 0 0 #16222d !important;
			}

			.product-detail-slider .swiper-button-prev {
				left: 10px !important;
				right: auto !important;
			}
			.product-detail-slider .swiper-button-next {
				right: 10px !important;
			}
		</style>
		<!-- Page Wrapper -->
		<div class="page-wrapper detail-page product-detail-page">

			<!-- Header Main Area -->
			<header class="site-header pbmit-header-style-1" id="masthead">
				@include('frontend.partials.header')
			</header>
			<!-- Header Main Area End Here -->

			<!-- Title Bar -->
			<div class="pbmit-title-bar-wrapper" @if(isset($product) && $product->banner_image && file_exists(public_path('storage/' . $product->banner_image))) style="background-image: url('{{ asset('storage/' . $product->banner_image) }}');" @endif>
				<div class="container">
					<div class="pbmit-title-bar-content">
						<div class="pbmit-title-bar-content-inner">
							<div class="pbmit-tbar">
								<div class="pbmit-tbar-inner container">
									<h3 class="pbmit-tbar-subtitle"> Products</h3>
									<h1 class="pbmit-tbar-title"> {{ $product->title ?? 'Product Detail' }}</h1>
								</div>
							</div>
							<div class="pbmit-breadcrumb">
								<div class="pbmit-breadcrumb-inner">
									<span>
										<a title="" href="{{ route('frontend.home') }}"
											class="home"><span>Home</span></a>
									</span>
									<span class="sep"></span>
									<span>
										<a title="" href="{{ route('products') }}"><span>Products</span></a>
									</span>
									@if(isset($product) && $product->parent)
										<span class="sep"></span>
										<span>
											<a title=""
												href="{{ route('product-details', ['slug' => $product->parent->slug]) }}"><span>{{ $product->parent->title }}</span></a>
										</span>
									@endif
									<span class="sep"></span>
									<span><span class="post-root post post-post current-item">
											{{ $product->title ?? 'Product Detail' }}</span></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Title Bar End-->

			<!-- Page Content -->
			<div class="page-content">

				<!-- Single Detail Style 1 -->
				<section class="site-content pbmit-portfolio-single-style-1">
					<div class="container">
						<article class="pbmit-portfolio-single">
							<div class="pbmit-single-project-details-wrapper">
								<div class="pbmit-featured-img-wrapper">
									@php $defaultSettings = \App\Models\GeneralSetting::first(); @endphp
									@if(isset($product) && $product->slider_images && is_array($product->slider_images) && count($product->slider_images) > 0)
										<div class="swiper-slider overflow-hidden product-detail-slider" data-columns="1" data-loop="true" data-autoplay="true" data-autoplayspeed="3000" data-dots="true" data-arrows="true" data-effect="slide" data-margin="0">
											<div class="swiper-wrapper">
												@foreach($product->slider_images as $img)
													<div class="swiper-slide">
														<img src="{{ asset('storage/' . $img) }}" class="img-fluid w-100 detail-main-image" style="height: 600px; object-fit: contain;" alt="{{ $product->title ?? 'Product Slider Image' }}">
													</div>
												@endforeach
											</div>
										</div>
									@else
										<img src="{{ isset($product) && $product->image && file_exists(public_path('storage/' . $product->image)) ? asset('storage/' . $product->image) : ($defaultSettings && $defaultSettings->default_product_image ? asset('storage/' . $defaultSettings->default_product_image) : asset('frontend/images/portfolio/portfolio-single-01.webp')) }}"
											class="img-fluid w-100 detail-main-image" style="height: 600px; object-fit: contain;"
											alt="{{ $product->title ?? 'Product Image' }}">
									@endif
								</div>
							</div>
							<div class="pbmit-entry-content">
								<div data-aos="fade-up" data-aos-duration="800">
									<div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
										@if(isset($product) && $product->content)
											<div class="pbmit-custom-heading mb-0">
												<h3 class="pbmit-title mb-0" style="margin-bottom: 0;">Project Summary :
												</h3>
											</div>
										@endif
										<div class="d-flex align-items-center gap-3">
											<!-- Video Play Button -->
											@if(isset($product) && $product->video_link)
												<a href="{{ $product->video_link }}"
													class="pbmit-btn pbmit-btn-sm pbmin-lightbox-video">
													<span class="pbmit-button-content-wrapper">
														<span class="pbmit-button-icon">
															<i class="pbmit-base-icon-play-button"></i>
														</span>
														<span class="pbmit-button-text">Watch Video</span>
													</span>
												</a>
											@endif
											<!-- Download PDF Button -->
											@if(isset($product) && $product->brochure)
												<a href="{{ asset('storage/' . $product->brochure) }}"
													class="pbmit-btn pbmit-btn-sm" download>
													<span class="pbmit-button-content-wrapper">
														<span class="pbmit-button-icon">
															<i class="pbmit-base-icon-download"></i>
														</span>
														<span class="pbmit-button-text">Download PDF</span>
													</span>
												</a>
											@endif
										</div>
									</div>
									@if(isset($product) && $product->content)
										@php
											$htmlContent = html_entity_decode($product->content);
											$htmlContent = str_replace(['<p><p>', '</p></p>', '&lt;p&gt;', '&lt;/p&gt;'], ['<p>', '</p>', '', ''], $htmlContent);
											$htmlContent = preg_replace('/<p>/i', '<p class="pbmit-firstletter">', trim($htmlContent), 1);
										@endphp
										{!! $htmlContent !!}
									@endif
								</div>
								@if(isset($product) && $product->advantages && is_array($product->advantages) && count($product->advantages) > 0)
									<div class="pbmit-custom-heading mt-4">
										<h3 class="pbmit-title">Project Advantages :</h3>
									</div>
									<div class="list-group-wrap mb-4" style="padding-left: 0;">
										<ul class="list-group">
											@foreach($product->advantages as $advantage)
												<li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i class="pbmit-base-icon-checkbox"></i>
													</span>
													<span class="pbmit-icon-list-text">{{ $advantage }}</span>
												</li>
											@endforeach
										</ul>
									</div>
								@else
								@endif

								@if(isset($product) && $product->specifications && $product->specifications->count() > 0)
									<div class="pbmit-custom-heading mt-5">
										<h3 class="pbmit-title">Machine Specifications :</h3>
									</div>
									@foreach($product->specifications as $spec)
										<div class="table-responsive mb-5">
											<table class="table table-bordered pbmit-specs-table"
												style="border-color: rgba(0,0,0,0.08); font-size: 16px; width: 100%;">
												@if(!empty($spec->table_headers) && is_array($spec->table_headers))
													<thead>
														<tr style="background-color: var(--pbmit-global-color); color: #ffffff;">
															@foreach($spec->table_headers as $index => $header)
																<th
																	style="padding: 8px 12px; font-weight: 600; {{ $index == 0 ? 'width: 35%;' : '' }} border-color: rgba(0,0,0,0.08); color: #ffffff;">
																	{{ $header }}</th>
															@endforeach
														</tr>
													</thead>
												@endif
												@if(!empty($spec->table_data) && is_array($spec->table_data))
													<tbody>
														@foreach($spec->table_data as $rowIndex => $row)
															<tr
																style="{{ $rowIndex % 2 != 0 ? 'background-color: rgba(var(--pbmit-global-color-rgb), 0.06);' : '' }}">
																@foreach($row as $cellIndex => $cell)
																	@if($cellIndex == 0)
																		<td
																			style="padding: 8px 12px; font-weight: 500; color: var(--pbmit-blackish-color); border-color: rgba(0,0,0,0.08);">
																			{{ $cell }}</td>
																	@else
																		<td style="padding: 8px 12px; border-color: rgba(0,0,0,0.08);">
																			{{ $cell }}</td>
																	@endif
																@endforeach
															</tr>
														@endforeach
													</tbody>
												@endif
											</table>
										</div>
									@endforeach
								@endif

								@if(isset($product) && $product->specially_designed_parts && is_array($product->specially_designed_parts) && count($product->specially_designed_parts) > 0)
									<div class="pbmit-custom-heading mt-5">
										<h3 class="pbmit-title">Designed Machine Parts :</h3>
									</div>
									<div class="row mt-4 mb-5">
										@foreach($product->specially_designed_parts as $part)
											<div class="col-lg-3 col-md-6 col-sm-6 mb-4" data-aos="fade-up"
												data-aos-delay="{{ $loop->iteration * 100 }}">
												<div class="text-center">
													<div style="border-radius: 8px; overflow: hidden; margin-bottom: 12px;">
														@php $defaultSettings = \App\Models\GeneralSetting::first(); @endphp
														<img src="{{ isset($part['image']) ? asset('storage/' . $part['image']) : asset('frontend/images/no-image.png') }}"
															alt="{{ $part['name'] ?? 'Part' }}" class="img-fluid w-100"
															style="height: 180px; object-fit: contain;">
													</div>
													<h4
														style="font-size: 16px; font-weight: 600; color: var(--pbmit-blackish-color);">
														{{ $part['name'] ?? 'Machine Part' }}</h4>
												</div>
											</div>
										@endforeach
									</div>
								@endif

								@if(isset($product) && $product->image_parts && is_array($product->image_parts) && count($product->image_parts) > 0)
									<div class="pbmit-custom-heading mt-5">
										<h3 class="pbmit-title">Image Parts :</h3>
									</div>
									<div class="row mt-4 mb-5">
										@foreach($product->image_parts as $part)
											<div class="col-lg-3 col-md-6 col-sm-6 mb-4" data-aos="fade-up"
												data-aos-delay="{{ $loop->iteration * 100 }}">
												<div class="text-center">
													<div style="border-radius: 8px; overflow: hidden; margin-bottom: 12px;">
														@php $defaultSettings = \App\Models\GeneralSetting::first(); @endphp
														<img src="{{ isset($part['image']) ? asset('storage/' . $part['image']) : asset('frontend/images/no-image.png') }}"
															alt="{{ $part['name'] ?? 'Part' }}" class="img-fluid w-100"
															style="height: 180px; object-fit: contain;">
													</div>
													<h4
														style="font-size: 16px; font-weight: 600; color: var(--pbmit-blackish-color);">
														{{ $part['name'] ?? 'Machine Part' }}</h4>
												</div>
											</div>
										@endforeach
									</div>
								@endif

								@if(isset($product) && $product->trade_information)
									<div class="pbmit-custom-heading mt-5">
										<h3 class="pbmit-title">Trade Information :</h3>
									</div>
									<div class="table-responsive mb-5">
										@php
											$tradeInfo = html_entity_decode($product->trade_information);
											$tradeInfo = strip_tags($tradeInfo, '<table><tbody><thead><tr><th><td>');
											$tradeInfo = preg_replace('/<table[^>]*>/i', '<table class="table table-bordered pbmit-trade-table" style="border-color: rgba(0,0,0,0.08); font-size: 16px; width: 100%;">', $tradeInfo);
											$tradeInfo = preg_replace('/<td[^>]*>/i', '<td style="padding: 8px 12px; border-color: rgba(0,0,0,0.08); color: var(--pbmit-blackish-color);">', $tradeInfo);
											$tradeInfo = preg_replace('/<th[^>]*>/i', '<td style="padding: 8px 12px; font-weight: 600; width: 25%; color: var(--pbmit-blackish-color); background-color: #f9f9f9; border-color: rgba(0,0,0,0.08); border-left: 3px solid var(--pbmit-global-color);">', $tradeInfo);
											$tradeInfo = str_replace('</th>', '</td>', $tradeInfo);
										@endphp
										{!! $tradeInfo !!}
									</div>
								@endif

								<style>
									.custom-process-grid {
										justify-content: center;
									}

									.custom-process-grid .pbmit-miconheading-style-11:first-child .pbmit-ihbox-style-11 {
										border-top-left-radius: 20px !important;
										border-bottom-left-radius: 20px !important;
										border-left-width: 1px !important;
									}

									.custom-process-grid .pbmit-miconheading-style-11:last-child .pbmit-ihbox-style-11 {
										border-top-right-radius: 20px !important;
										border-bottom-right-radius: 20px !important;
										border-right-width: 1px !important;
									}

									.custom-process-grid .pbmit-miconheading-style-11:not(:first-child):not(:last-child) .pbmit-ihbox-style-11 {
										border-radius: 0 !important;
									}
								</style>
								<div class="ihbox-style-area pbminfotech-gap-0px pbmit-column-four">
									<div class="row g-0 custom-process-grid">
										@if(isset($product) && $product->process_steps && is_array($product->process_steps) && count($product->process_steps) > 0)
											@foreach($product->process_steps as $idx => $step)
												<article class="pbmit-miconheading-style-11 col-md-6 col-lg-4 col-xl-3">
													<div class="pbmit-ihbox-style-11">
														<div class="pbmit-ihbox-box">
															<span
																class="pbmit-box-number">{{ str_pad($idx + 1, 2, '0', STR_PAD_LEFT) }}</span>
															<div class="pbmit-ihbox-icon">
																<div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
																	@if(isset($step['image']) && $step['image'])
																		<img src="{{ asset('storage/' . $step['image']) }}"
																			alt="{{ $step['title'] ?? '' }}"
																			style="width: 80px; height: 80px; object-fit: contain;">
																	@else
																		@php $defaultSettings = \App\Models\GeneralSetting::first(); @endphp
																		@if($defaultSettings && $defaultSettings->default_icon_image)
																			<img src="{{ asset('storage/' . $defaultSettings->default_icon_image) }}"
																				alt="{{ $step['title'] ?? '' }}"
																				style="width: 80px; height: 80px; object-fit: contain;">
																		@endif
																	@endif
																</div>
															</div>
															<div class="pbmit-ihbox-contents">
																<h2 class="pbmit-element-title">
																	{{ $step['title'] ?? '' }}
																</h2>
																<div class="pbmit-heading-desc">{{ $step['description'] ?? '' }}
																</div>
															</div>
														</div>
													</div>
												</article>
											@endforeach
										@endif
									</div>
								</div>
							</div>

							@php
								$hasClientReviewImages = isset($product) && is_array($product->client_review_images)
									&& collect($product->client_review_images)->filter()->isNotEmpty();
								$hasClientReviewFaqs = isset($product) && is_array($product->client_review_faqs)
									&& collect($product->client_review_faqs)->contains(fn($faq) => !empty($faq['question']) || !empty($faq['answer']));
							@endphp
							@if($hasClientReviewImages || $hasClientReviewFaqs)
								<div class="py-5" data-aos="fade-up" data-aos-duration="800">
									<div class="pbmit-custom-heading">
										@if(filled($product->client_review_title) && trim($product->client_review_title) !== '1')
											<h3 class="pbmit-title mb-4">{{ $product->client_review_title }} :</h3>
										@endif
									</div>
									@if(filled($product->client_review_description))
										<p class="mb-4">{{ $product->client_review_description }}</p>
									@endif

									<div class="row">
										<div class="col-md-6 full-width-1200">
											<div class="swiper-slider overflow-hidden" data-columns="1" data-loop="false"
												data-autoplay="true" data-autoplayspeed="3000" data-dots="true"
												data-arrows="false" data-effect="slide" data-margin="30">
												<div class="swiper-wrapper">
													@if(isset($product) && $product->client_review_images && is_array($product->client_review_images) && count($product->client_review_images) > 0)
														@foreach($product->client_review_images as $img)
															<div class="swiper-slide">
																<img src="{{ asset('storage/' . $img) }}" class="img-fluid"
																	style="border-radius: 8px; height: 350px; object-fit: cover; width: 100%;"
																	alt="Client Site Work">
															</div>
														@endforeach
													@endif
												</div>
											</div>
										</div>
										<div class="col-md-6 full-width-1200">
											<div class="accordion" id="accordionExample1">
												@if(isset($product) && $product->client_review_faqs && is_array($product->client_review_faqs) && count($product->client_review_faqs) > 0)
													@foreach($product->client_review_faqs as $idx => $faq)
														<div class="accordion-item {{ $idx == 0 ? 'active' : '' }}"
															id="headingOne{{ $idx }}">
															<h2 class="accordion-header">
																<button class="accordion-button {{ $idx == 0 ? '' : 'collapsed' }}"
																	type="button" data-bs-toggle="collapse"
																	data-bs-target="#collapseOne{{ $idx }}"
																	aria-expanded="{{ $idx == 0 ? 'true' : 'false' }}"
																	aria-controls="collapseOne{{ $idx }}">
																	<span class="pbmit-accordion-title">
																		{{ str_pad($idx + 1, 2, '0', STR_PAD_LEFT) }}.
																		{{ $faq['question'] }}
																	</span>
																	<span class="pbmit-accordion-icon">
																		<span class="pbmit-accordion-icon-opened">
																			<svg aria-hidden="true"
																				class="e-font-icon-svg e-fas-minus"
																				viewBox="0 0 448 512"
																				xmlns="http://www.w3.org/2000/svg">
																				<path
																					d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
																				</path>
																			</svg>
																		</span>
																		<span class="pbmit-accordion-icon-closed">
																			<svg aria-hidden="true"
																				class="e-font-icon-svg e-fas-plus"
																				viewBox="0 0 448 512"
																				xmlns="http://www.w3.org/2000/svg">
																				<path
																					d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
																				</path>
																			</svg>
																		</span>
																	</span>
																</button>
															</h2>
															<div id="collapseOne{{ $idx }}"
																class="accordion-collapse collapse {{ $idx == 0 ? 'show' : '' }}"
																aria-labelledby="headingOne{{ $idx }}"
																data-bs-parent="#accordionExample1">
																<div class="accordion-body">
																	{{ $faq['answer'] }}
																</div>
															</div>
														</div>
													@endforeach
												@endif
											</div>
										</div>
									</div>
								</div>
							@endif
					</div>
					</article>
			</div>
			</section>
			<!-- Single Detail Style 1 End -->

			@if(isset($relatedProducts) && $relatedProducts->count() > 0)
			<section class="section-sm pt-0">
				<div class="container">
					<hr style="border-top: 1px solid rgba(0,0,0,0.1);">
					<div class="pbmit-custom-heading mb-4">
						<h3 class="pbmit-title">Related Products :</h3>
					</div>
					<div class="pbmit-element-posts-wrapper row">
						@foreach($relatedProducts as $relProduct)
							@php
								$productUrl = route('product-details', ['slug' => $relProduct->slug]);
							@endphp
							<article class="pbmit-service-style-1 col-md-6 col-lg-4">
								<div class="pbminfotech-post-item">
									<div class="pbmit-box-content-wrap">
										<div class="pbmit-image-wrap">
											<div class="pbmit-featured-img-wrapper">
												<div class="pbmit-featured-wrapper">
													@php $defaultSettings = \App\Models\GeneralSetting::first(); @endphp
													<img src="{{ ($relProduct->image && file_exists(public_path('storage/' . $relProduct->image))) ? asset('storage/' . $relProduct->image) : ($defaultSettings && $defaultSettings->default_product_image ? asset('storage/' . $defaultSettings->default_product_image) : asset('frontend/images/service/service-01.jpg')) }}"
														class="img-fluid w-100"
														style="aspect-ratio: 770/520; object-fit: contain; background-color: #ffffff;"
														alt="{{ $relProduct->title }}">
												</div>
											</div>
											<a class="pbmit-link" href="{{ $productUrl }}"></a>
										</div>
										<div class="pbmit-service-content-wrap">
											<h3 class="pbmit-service-title">
												<a href="{{ $productUrl }}">{{ $relProduct->title }}</a>
											</h3>
											<div class="pbmit-service-description">
												<p>{!! \Illuminate\Support\Str::limit(strip_tags(html_entity_decode($relProduct->short_description ?? $relProduct->content ?? 'Discover our premium quality product designed for excellence and reliability.')), 85) !!}
												</p>
											</div>
											<div class="pbmit-service-btn-wrapper">
												<div class="pbmit-service-btn">
													<a class="pbmit-button-inner" href="{{ $productUrl }}">
														<span class="pbmit-button-text">View More</span>
														<i class="pbmit-base-icon-right-arrow"></i>
													</a>
												</div>
											</div>
											<a class="pbmit-link" href="{{ $productUrl }}"></a>
										</div>
									</div>
								</div>
							</article>
						@endforeach
					</div>
				</div>
			</section>
			@endif

		</div>
		<!-- Page Content End -->

		@include('frontend.partials.footer')

		<!-- JS
        ============================================ -->
		<!-- jQuery JS -->

		<!-- Popper JS -->

		<!-- Bootstrap JS -->

		<!-- jquery Waypoints JS -->

		<!-- jquery Appear JS -->

		<!-- Numinate JS -->

		<!-- Slick JS -->

		<!-- Magnific JS -->

		<!-- Circle Progress JS -->

		<!-- countdown JS -->

		<!-- AOS -->

		<!-- GSAP -->

		<!-- Scroll Trigger -->

		<!-- Split Text -->

		<!-- Theia Sticky Sidebar JS -->

		<!-- GSAP Animation -->

		<!-- Scripts JS -->
	</div>
</x-layouts.app>
