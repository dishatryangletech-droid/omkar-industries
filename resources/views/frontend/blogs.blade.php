<x-layouts.app>
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
								<h1 class="pbmit-tbar-title"> Blog Grid Col 3</h1>
							</div>
						</div>
						<div class="pbmit-breadcrumb">
							<div class="pbmit-breadcrumb-inner">
								<span>
									<a title="" href="#" class="home"><span>Induyst</span></a>
								</span>
								<span class="sep"></span>
								<span><span class="post-root post post-post current-item"> Blog Grid Col 3</span></span>
							</div>
						</div>
					</div>
				</div> 
			</div> 
		</div>
		<!-- Title Bar End-->
		 
		<div class="page-content">  

		<!-- Blog Grid Col 3 -->
		<section class="section-md">
			<div class="container">
				<div class="row pbmit-element-posts-wrapper">
					@foreach($blogs as $blog)
					<article class="pbmit-blog-style-1 col-md-6 col-lg-4">
						<div class="post-item">
							<div class="pbminfotech-box-content">
								<div class="pbmit-featured-container">
									<div class="pbmit-featured-container-inner">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												@if($blog->image)
												<img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid" alt="{{ $blog->title }}">
												@else
												<img src="{{ asset('frontend/images/blog/blog-01.jpg') }}" class="img-fluid" alt="{{ $blog->title }}">
												@endif
											</div>
										</div>
										<a class="pbmit-link" href="{{ route('frontend.blog-single-details', $blog->id) }}"></a>
									</div>
									<div class="pbmit-meta-date-wrapper pbmit-meta-line">
										<span class="pbmit-post-date">
											<span class="pbmit-date">{{ $blog->date ? $blog->date->format('d') : '' }}</span>
											<span class="pbmit-month">{{ $blog->date ? $blog->date->format('M') : '' }}</span>
										</span>
									</div>
									<div class= "pbmit-meta-wraper">
										<div class="pbmit-meta-author pbmit-meta-line">
											<span class="pbmit-post-author">Admin</span>
										</div>
										<div class="pbmit-meta-category-wrapper pbmit-meta-line">
											<span class="pbmit-meta-category">
												<a href="/blog-classic" rel="category tag">News</a>
											</span>
										</div>
										<div class="pbmit-meta-comment-wrapper pbmit-meta-line">
											<span class="pbmit-meta-comments">0<span class="pbmit-comment-text">Comment</span></span>
										</div>
									</div>
								</div>
								<div class="pbmit-content-wrapper">
									<h3 class="pbmit-post-title" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 60px;">
										<a href="{{ route('frontend.blog-single-details', $blog->id) }}">{{ $blog->title }}</a>
									</h3>
									<div class="pbminfotech-box-desc" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
										{!! Str::limit(strip_tags($blog->description), 100) !!}
									</div>
									<div class="pbmit-blog-btn">
										<a class="pbmit-button-inner" href="{{ route('frontend.blog-single-details', $blog->id) }}">
											<span class="pbmit-button-text">Read More</span>
											<span class="pbmit-button-icon">
												<i class="pbmit-base-icon-right-arrow"></i>
											</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</article>
					@endforeach
				</div>
			</div>
		</section>
		<!-- Blog Grid Col 3 End -->

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
	
	<!-- Scripts JS -->
	
	<!-- Theia Sticky Sidebar JS -->
	
	<!-- GSAP Animation -->
	        
	<!-- Scripts JS -->
</div>
</x-layouts.app>
