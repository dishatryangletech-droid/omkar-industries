<x-layouts.app title="Products - Omkar">
	<div>
		<!-- Page Wrapper -->
		<div class="page-wrapper">

			<!-- Header Main Area -->
			<header class="site-header pbmit-header-style-1" id="masthead">
				@include('frontend.partials.header')
			</header>
			<!-- Header Main Area End Here -->

			<!-- Title Bar -->
			<div class="pbmit-title-bar-wrapper">
				<div class="container">
					<div class="pbmit-title-bar-content">
						<div class="pbmit-title-bar-content-inner">
							<div class="pbmit-tbar">
								<div class="pbmit-tbar-inner container">
									<h1 class="pbmit-tbar-title"> Products</h1>
								</div>
							</div>
							<div class="pbmit-breadcrumb">
								<div class="pbmit-breadcrumb-inner">
									<span>
										<a title="" href="{{ route('frontend.home') }}"
											class="home"><span>Home</span></a>
									</span>
									<span class="sep"></span>
									<span><span class="post-root post post-post current-item"> Products</span></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Title Bar End-->

			<div class="page-content">

				<!-- Services Start -->
				<section class="section-sm">
					<div class="container">
						@php
							$otherProduct = collect($products)->firstWhere('slug', 'other-product-page');
							$filteredProducts = collect($products)->reject(function ($p) {
								return $p->slug === 'other-product-page';
							});
						@endphp
						<div class="pbmit-heading-subheading text-center">
							<h4 class="pbmit-subtitle">OUR PRODUCTS</h4>
							<h2 class="pbmit-title">Explore Our Machinery</h2>
							<div class="pbmit-heading-desc col-sm-8 col-md-6 mx-auto mb-5">
								Discover our premium quality products designed for excellence and reliability. We
								manufacture top-of-the-line industrial woodworking machines.
							</div>
						</div>
						<div class="pbmit-element-posts-wrapper row">
							@php
								$gridSetting = \App\Models\GeneralSetting::first()->product_grid_columns ?? 3;
								$gridClass = $gridSetting == 2 ? 'col-md-6 col-lg-6' : ($gridSetting == 4 ? 'col-md-6 col-lg-3' : 'col-md-6 col-lg-4');
							@endphp
							@foreach($filteredProducts as $product)
								@php
									$productUrl = route('product-details', ['slug' => $product->slug]);
								@endphp
								<article class="pbmit-service-style-1 {{ $gridClass }}">
									<div class="pbminfotech-post-item">
										<div class="pbmit-box-content-wrap">
											<div class="pbmit-image-wrap">
												<div class="pbmit-featured-img-wrapper">
													<div class="pbmit-featured-wrapper">
														@php $defaultSettings = \App\Models\GeneralSetting::first(); @endphp
														<img src="{{ ($product->image && file_exists(public_path('storage/' . $product->image))) ? asset('storage/' . $product->image) : ($defaultSettings && $defaultSettings->default_product_image ? asset('storage/' . $defaultSettings->default_product_image) : asset('frontend/images/service/service-01.jpg')) }}"
															class="img-fluid w-100"
															style="aspect-ratio: 770/520; object-fit: contain; background-color: #ffffff;"
															alt="{{ $product->title }}">
													</div>
												</div>

												<a class="pbmit-link" href="{{ $productUrl }}"></a>
											</div>
											<div class="pbmit-service-content-wrap">
												<h3 class="pbmit-service-title">
													<a href="{{ $productUrl }}">{{ $product->title }}</a>
												</h3>
												<div class="pbmit-service-description">
													<p>{!! \Illuminate\Support\Str::limit(strip_tags(html_entity_decode($product->short_description ?? $product->content ?? 'Discover our premium quality product designed for excellence and reliability.')), 85) !!}
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

						<div class="alert alert-warning alert-dismissible fade show text-center mx-auto shadow-sm"
							role="alert" style="max-width: 1293px; font-size: 16px; padding: 15px 20px;">
							<svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#856404" style="width: 20px; height: 20px; margin-right: 8px; vertical-align: -4px;"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M8.069 0c.262 0 .52.017.76.057a4.1 4.1 0 0 1 .697.154c.228.069.451.155.674.263.217.103.44.229.663.366.377.24.748.434 1.126.589a7.537 7.537 0 0 0 2.331.525c.406.029.823.046 1.257.046v4c0 .76-.097 1.48-.291 2.166a8.996 8.996 0 0 1-.789 1.943 10.312 10.312 0 0 1-1.188 1.725 15.091 15.091 0 0 1-1.492 1.532 17.57 17.57 0 0 1-1.703 1.325c-.594.412-1.194.795-1.794 1.143l-.24.143-.24-.143a27.093 27.093 0 0 1-1.806-1.143 15.58 15.58 0 0 1-1.703-1.325 15.082 15.082 0 0 1-1.491-1.532 10.947 10.947 0 0 1-1.194-1.725 9.753 9.753 0 0 1-.789-1.943A7.897 7.897 0 0 1 .571 6V2c.435 0 .852-.017 1.258-.046a8.16 8.16 0 0 0 1.188-.171c.383-.086.766-.2 1.143-.354A6.563 6.563 0 0 0 5.28.846C5.72.56 6.166.349 6.606.21A4.79 4.79 0 0 1 8.069 0zm6.502 2.983a9.566 9.566 0 0 1-2.234-.377 7.96 7.96 0 0 1-2.046-.943A4.263 4.263 0 0 0 9.23 1.16 3.885 3.885 0 0 0 8.074.994a3.99 3.99 0 0 0-1.165.166 3.946 3.946 0 0 0-1.058.503A7.926 7.926 0 0 1 3.8 2.61c-.709.206-1.451.332-2.229.378v3.017c0 .663.086 1.297.258 1.908a8.58 8.58 0 0 0 .72 1.743 9.604 9.604 0 0 0 1.08 1.572c.417.491.862.948 1.342 1.382.48.435.983.835 1.509 1.206.531.372 1.063.709 1.594 1.017a22.397 22.397 0 0 0 1.589-1.017 15.389 15.389 0 0 0 1.514-1.206c.48-.434.926-.891 1.343-1.382a9.596 9.596 0 0 0 1.08-1.572 8.258 8.258 0 0 0 .709-1.743 6.814 6.814 0 0 0 .262-1.908V2.983z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M11.797 4.709l-.44-.378-.406.035-4.36 5.148-1.485-2.12-.4-.068-.463.331-.069.4 1.909 2.726.217.12.457.028.234-.102 4.835-5.715-.029-.405z"></path></g></svg>
							We work all over India that in Omkar only.
						</div>

						@if($otherProduct)
							<div class="row mt-5">
								<div class="col-12 text-center mt-4 mb-4">
									<a href="{{ route('product-details', ['slug' => $otherProduct->slug]) }}"
										class="pbmit-btn blackish">
										<span class="pbmit-button-content-wrapper">
											<span class="pbmit-button-icon">
												<i class="pbmit-induyst-icon pbmit-induyst-icon-next"></i>
											</span>
											<span class="pbmit-button-text">View More Other Products</span>
										</span>
									</a>
								</div>
							</div>
						@endif
					</div>
				</section>
				<!-- Services end -->

			</div>

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

			<!-- AOS -->

			<!-- Circle Progres -->

			<!-- countdown JS -->

			<!-- GSAP -->

			<!-- Scroll Trigger -->

			<!-- Split Text -->

			<!-- Masonry JS -->

			<!-- Theia Sticky Sidebar JS -->

			<!-- GSAP Animation -->

			<!-- Scripts JS -->
		</div>

</x-layouts.app>