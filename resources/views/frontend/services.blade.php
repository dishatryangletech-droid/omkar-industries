<x-layouts.app>
<div>
<!-- Page Wrapper -->
	<div class="page-wrapper">

		<!-- Header Main Area -->
		<header class="site-header pbmit-header-style-1" id="masthead">
			@include('livewire.frontend.partials.header')
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
									<a title="" href="#" class="home"><span>Induyst</span></a>
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
						$filteredProducts = collect($products)->reject(function($p) {
							return $p->slug === 'other-product-page';
						});
					@endphp
					<div class="pbmit-element-posts-wrapper row">
						@foreach($filteredProducts as $product)
							@php
								$productUrl = $product->is_parent ? url('products/'.$product->slug.'/children') : url('product-details/'.$product->slug);
							@endphp
							<article class="pbmit-service-style-1 col-md-6 col-lg-4">
								<div class="pbminfotech-post-item">
									<div class="pbmit-box-content-wrap">
										<div class="pbmit-image-wrap">
											<div class="pbmit-featured-img-wrapper">
												<div class="pbmit-featured-wrapper">
												<img src="{{ ($product->image && file_exists(public_path('storage/' . $product->image))) ? asset('storage/' . $product->image) : asset('frontend/images/service/service-01.jpg') }}" class="img-fluid w-100" style="aspect-ratio: 770/520; object-fit: contain; background-color: #ffffff;" alt="{{ $product->title }}">
											</div>
											</div>

											<a class="pbmit-link" href="{{ $productUrl }}"></a>
										</div>
										<div class="pbmit-service-content-wrap">
											<h3 class="pbmit-service-title">
												<a href="{{ $productUrl }}">{{ $product->title }}</a>
											</h3>
											<div class="pbmit-service-description">
												<p>{{ Str::limit(strip_tags($product->short_description ?? 'Discover our premium quality product designed for excellence and reliability.'), 85) }}</p>
											</div>
											<div class="pbmit-service-btn-wrapper">
												<div class="pbmit-service-btn">
													<a class="pbmit-button-inner" href="{{ $productUrl }}">
														<span class="pbmit-button-text">Read More</span>
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

					@if($otherProduct)
					<div class="row mt-5">
						<div class="col-12 text-center mt-4 mb-4">
							<a href="{{ url('products/'.$otherProduct->slug.'/children') }}" class="pbmit-btn blackish">
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
         
		@include('livewire.frontend.partials.footer')
   
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
