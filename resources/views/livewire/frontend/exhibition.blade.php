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
								<h1 class="pbmit-tbar-title"> Exhibitions</h1>
							</div>
						</div>
						<div class="pbmit-breadcrumb">
							<div class="pbmit-breadcrumb-inner">
								<span>
									<a title="" href="#" class="home"><span>Induyst</span></a>
								</span>
								<span class="sep"></span>
								<span><span class="post-root post post-post current-item"> Exhibitions</span></span>
							</div>
						</div>
					</div>
				</div> 
			</div> 
		</div>
		<!-- Title Bar End-->
		 
		<div class="page-content">  

		<!-- Exhibitions -->
		<section class="section-md">
			<div class="container">
								<div class="row pbmit-element-posts-wrapper">
					@forelse($exhibitions as $key => $exhibition)
						@php
							$headings = ['CURRENT EXHIBITION', 'UPCOMING EVENT', 'PAST EXHIBITION'];
							$defaultImages = ['frontend/images/blog/blog-01.jpg', 'frontend/images/blog/blog-02.jpg', 'frontend/images/blog/blog-03.jpg'];
							$heading = $headings[$key % 3] ?? 'EXHIBITION';
							$defaultImage = $defaultImages[$key % 3];
						@endphp
						<article class="pbmit-blog-style-1 col-md-6 col-lg-4 mb-5">
							
							<div class="post-item" style="box-shadow: 0 5px 20px rgba(0,0,0,0.05); background: #fff; border: 1px solid #eee; height: 100%; display: flex; flex-direction: column;">
								<div class="pbminfotech-box-content" style="padding-bottom: 30px; display: flex; flex-direction: column; flex: 1;">
									<div class="pbmit-featured-container">
										<div class="pbmit-featured-container-inner">
											<div class="pbmit-featured-img-wrapper">
												<div class="pbmit-featured-wrapper" style="position: relative;">
													@php
														$imagePath = $exhibition->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($exhibition->image) 
															? asset('storage/' . $exhibition->image) 
															: asset($defaultImage);
													@endphp
													<img src="{{ $imagePath }}" class="img-fluid" alt="{{ $exhibition->title }}" style="width: 100%; height: 260px; object-fit: cover;">
													<span style="position: absolute; top: 15px; left: 15px; background: #ffbc13; color: #fff; padding: 4px 12px; font-size: 11px; font-weight: bold; text-transform: uppercase; border-radius: 4px; letter-spacing: 1px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">{{ $heading }}</span>
												</div>
											</div>
										</div>
									</div>
									<div class="pbmit-content-wrapper" style="text-align: center; padding: 25px 20px; display: flex; flex-direction: column; flex: 1;">
										<h3 class="pbmit-post-title" style="margin-bottom: 15px; font-size: 22px; font-weight: bold; min-height: 55px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
											<a href="{{ route('frontend.exhibition-details', $exhibition->id) }}" style="color: #222;">{{ $exhibition->title }}</a>
										</h3>
										<div class="pbminfotech-box-desc" style="color: #666; font-size: 15px; line-height: 1.6; min-height: 75px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
											{{ $exhibition->description }}
										</div>
										<div class="pbmit-blog-btn" style="margin-top: auto; padding-top: 25px;">
											<a class="pbmit-btn" href="{{ route('frontend.exhibition-details', $exhibition->id) }}" style="cursor: pointer;"><span class="pbmit-button-content-wrapper"><span class="pbmit-button-icon"><i class="pbmit-induyst-icon pbmit-induyst-icon-next"></i></span><span class="pbmit-button-text">Discover More</span></span></a>
										</div>
									</div>
								</div>
							</div>
						</article>
					@empty
						<p class="text-center w-100">No exhibitions available at the moment.</p>
					@endforelse
				</div>
			</div>
		</section>
		<!-- Exhibitions End -->

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
	
	<!-- Scripts JS -->
	
	<!-- Theia Sticky Sidebar JS -->
	
	<!-- GSAP Animation -->
	        
	<!-- Scripts JS -->
</div>






