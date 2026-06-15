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
								<h3 class="pbmit-tbar-subtitle"> Exhibition</h3>
								<h1 class="pbmit-tbar-title"> {{ $exhibition->title }}</h1>
							</div>
						</div>
						<div class="pbmit-breadcrumb">
							<div class="pbmit-breadcrumb-inner">
								<span>
									<a title="" href="#" class="home"><span>Induyst</span></a>
								</span>
								<span class="sep"></span>
								<span>
									<a title="" href="{{ route('frontend.exhibition') }}"><span>Exhibitions</span></a>
								</span>
								<span class="sep"></span>
								<span><span class="post-root post post-post current-item"> {{ $exhibition->title }}</span></span>
							</div>
						</div>
					</div>
				</div> 
			</div> 
		</div>
		<!-- Title Bar End-->

        <!-- Page Content -->
        <div class="page-content">   
            
            <!-- Single Detail Style 2 -->
			<section class="site-content pbmit-portfolio-single-style-2">
				<div class="container">
					<article class="pbmit-portfolio-single">
						<div class="pbmit-single-project-details-wrapper">
							<div class="pbmit-featured-img-wrapper">
								@php
									$imagePath = $exhibition->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($exhibition->image) 
										? asset('storage/' . $exhibition->image) 
										: asset('frontend/images/blog/blog-01.jpg');
								@endphp
								<img src="{{ $imagePath }}" alt="{{ $exhibition->title }}" style="width: 100%; height: 600px; object-fit: cover; border-radius: 10px;">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-xl-12">
								<div class="pbmit-entry-content">
									<div data-aos="fade-up" data-aos-duration="800">
										<div class="pbmit-custom-heading mt-4">
											<h3 class="pbmit-title">Exhibition Summary :</h3>
										</div>
										<p style="white-space: pre-line;">{{ $exhibition->description }}</p>
									</div>
									<div data-aos="fade-up" data-aos-duration="800" class="mt-5">
										<div class="ihbox-style-area pbmit-column-one">
											<div class="row">
												@if($exhibition->scheduled_period)
												<article class="pbmit-miconheading-style-11 col-md-12">
													<div class="pbmit-ihbox-style-11">
														<div class="pbmit-ihbox-box">
															<span class="pbmit-box-number">01</span>	
															<div class="pbmit-ihbox-icon">
																<div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
																	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="30" height="30" fill="currentColor"><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zM329 305c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-95 95-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L329 305z"/></svg>
																</div>
															</div>
															<div class="pbmit-ihbox-contents" style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center; text-align: left; flex: 1;">
																<h2 class="pbmit-element-title" style="margin-bottom: 5px;">
																	Scheduled Period
																</h2>
																<div class="pbmit-heading-desc" style="width: 100%;">{{ $exhibition->scheduled_period }}</div>
															</div>
														</div>
													</div>
												</article>
												@endif
												
												@if($exhibition->venue)
												<article class="pbmit-miconheading-style-11 col-md-12">
													<div class="pbmit-ihbox-style-11">
														<div class="pbmit-ihbox-box">
															<span class="pbmit-box-number">02</span>	
															<div class="pbmit-ihbox-icon">
																<div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
																	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="30" height="30" fill="currentColor"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
																</div>
															</div>
															<div class="pbmit-ihbox-contents" style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center; text-align: left; flex: 1;">
																<h2 class="pbmit-element-title" style="margin-bottom: 5px;">
																	Event Venue
																</h2>
																<div class="pbmit-heading-desc" style="width: 100%;">{{ $exhibition->venue }}</div>
															</div>
														</div>
													</div>
												</article>
												@endif
												
												@if($exhibition->space)
												<article class="pbmit-miconheading-style-11 col-md-12">
													<div class="pbmit-ihbox-style-11">
														<div class="pbmit-ihbox-box">
															<span class="pbmit-box-number">03</span>	
															<div class="pbmit-ihbox-icon">
																<div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
																	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30" height="30" fill="currentColor"><path d="M64 64c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V64zM224 224H128V384H224V224zM288 128H128V192H288V128zM384 224H288V384H384V224zM384 128H320V192H384V128z"/></svg>
																</div>
															</div>
															<div class="pbmit-ihbox-contents" style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center; text-align: left; flex: 1;">
																<h2 class="pbmit-element-title" style="margin-bottom: 5px;">
																	Exhibition Space
																</h2>
																<div class="pbmit-heading-desc" style="width: 100%;">{{ $exhibition->space }}</div>
															</div>
														</div>
													</div>
												</article>
												@endif
											</div>
										</div>
									</div>
								</div>
								
							</div>
						
						</div>
					</article>
				</div>
			</section>
            <!-- Single Detail Style 2 End -->

        </div>
        <!-- Page Content End -->

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
	
	<!-- countdown JS -->
	 
	<!-- AOS -->
	
	<!-- GSAP -->
	
	<!-- Scroll Trigger -->
	
	<!-- Split Text -->
	
	<!-- Theia Sticky Sidebar JS -->
	
	<!-- GSAP Animation -->
	
	<!-- Scripts JS -->
</div>
