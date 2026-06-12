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
								<h1 class="pbmit-tbar-title"> Blog Sortable Grid View</h1>
							</div>
						</div>
						<div class="pbmit-breadcrumb">
							<div class="pbmit-breadcrumb-inner">
								<span>
									<a title="" href="#" class="home"><span>Induyst</span></a>
								</span>
								<span class="sep"></span>
								<span><span class="post-root post post-post current-item"> Blog Sortable Grid View</span></span>
							</div>
						</div>
					</div>
				</div> 
			</div> 
		</div>
		<!-- Title Bar End-->

        <!-- Page Content -->
        <div class="page-content">   
            
            <!-- Blog Sortable Grid View Start -->
            <section class="section-md pbmit-sortable-yes">
				<div class="container">
					<div class="pbmit-sortable-list">
						<ul class="pbmit-sortable-list-ul">
						   <li><a href="#" class="pbmit-sortable-link pbmit-selected" data-sortby="*">All</a></li>
						   <li><a href="#" class="pbmit-sortable-link" data-sortby="chemical">Chemical</a></li>
						   <li><a href="#" class="pbmit-sortable-link" data-sortby="construction">Construction</a></li>
						   <li><a href="#" class="pbmit-sortable-link" data-sortby="engineering">Engineering</a></li>
						   <li><a href="#" class="pbmit-sortable-link" data-sortby="industrial">Industrial</a></li>
						   <li><a href="#" class="pbmit-sortable-link" data-sortby="logistics">Logistics</a></li>
						   <li><a href="#" class="pbmit-sortable-link" data-sortby="manufacturing">Manufacturing</a></li>
						</ul>
					</div>
					<div class="row pbmit-element-posts-wrapper">
						<article class="pbmit-blog-style-1 col-md-6 col-lg-4 logistics">
							<div class="post-item">
								<div class="pbminfotech-box-content">
									<div class="pbmit-featured-container">
										<div class="pbmit-featured-container-inner">
											<div class="pbmit-featured-img-wrapper">
												<div class="pbmit-featured-wrapper">
													<img src="{{ asset('frontend/images/blog/blog-01.jpg') }}" class="img-fluid" alt="">
												</div>
											</div>
											<a class="pbmit-link" href="/blog-single-details"></a>
										</div>
										<div class="pbmit-meta-date-wrapper pbmit-meta-line">
											<span class="pbmit-post-date">
												<span class="pbmit-date">06</span>
												<span class="pbmit-month">Feb</span>
											</span>
										</div>
										<div class= "pbmit-meta-wraper">
											<div class="pbmit-meta-author pbmit-meta-line">
												<span class="pbmit-post-author">Alex joy</span>
											</div>
											<div class="pbmit-meta-category-wrapper pbmit-meta-line">
												<span class="pbmit-meta-category">
													<a href="/blog-classic" rel="category tag">Logistics</a>
												</span>
											</div>
											<div class="pbmit-meta-comment-wrapper pbmit-meta-line">
												<span class="pbmit-meta-comments">3<span class="pbmit-comment-text">Comment</span></span>
											</div>
										</div>
									</div>
									<div class="pbmit-content-wrapper">
										<h3 class="pbmit-post-title">
											<a href="/blog-single-details">The Future of Technology in Urban Development</a>
										</h3>
										<div class="pbminfotech-box-desc">
											When evaluating a single group or company, its dominant source of revenue is typically used&hellip; 
										</div>
										<div class="pbmit-blog-btn">
											<a class="pbmit-button-inner" href="/blog-single-details">
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
						<article class="pbmit-blog-style-1 col-md-6 col-lg-4 engineering">
							<div class="post-item">
								<div class="pbminfotech-box-content">
									<div class="pbmit-featured-container">
										<div class="pbmit-featured-container-inner">
											<div class="pbmit-featured-img-wrapper">
												<div class="pbmit-featured-wrapper">
													<img src="{{ asset('frontend/images/blog/blog-02.jpg') }}" class="img-fluid" alt="">
												</div>
											</div>
											<a class="pbmit-link" href="/blog-single-details"></a>
										</div>
										<div class="pbmit-meta-date-wrapper pbmit-meta-line">
											<span class="pbmit-post-date">
												<span class="pbmit-date">06</span>
												<span class="pbmit-month">Feb</span>
											</span>
										</div>
										<div class= "pbmit-meta-wraper">
											<div class="pbmit-meta-author pbmit-meta-line">
												<span class="pbmit-post-author">Alex joy</span>
											</div>
											<div class="pbmit-meta-category-wrapper pbmit-meta-line">
												<span class="pbmit-meta-category">
													<a href="/blog-classic" rel="category tag">Engineering</a>
												</span>
											</div>
											<div class="pbmit-meta-comment-wrapper pbmit-meta-line">
												<span class="pbmit-meta-comments">3<span class="pbmit-comment-text">Comment</span></span>
											</div>
										</div>
									</div>
									<div class="pbmit-content-wrapper">
										<h3 class="pbmit-post-title">
											<a href="/blog-single-details">U.S. fund managers trim bank stocks on profit worries</a>
										</h3>
										<div class="pbminfotech-box-desc">
											When evaluating a single group or company, its dominant source of revenue is typically used&hellip; 
										</div>
										<div class="pbmit-blog-btn">
											<a class="pbmit-button-inner" href="/blog-single-details">
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
						<article class="pbmit-blog-style-1 col-md-6 col-lg-4 construction">
							<div class="post-item">
								<div class="pbminfotech-box-content">
									<div class="pbmit-featured-container">
										<div class="pbmit-featured-container-inner">
											<div class="pbmit-featured-img-wrapper">
												<div class="pbmit-featured-wrapper">
													<img src="{{ asset('frontend/images/blog/blog-03.jpg') }}" class="img-fluid" alt="">
												</div>
											</div>
											<a class="pbmit-link" href="/blog-single-details"></a>
										</div>
										<div class="pbmit-meta-date-wrapper pbmit-meta-line">
											<span class="pbmit-post-date">
												<span class="pbmit-date">06</span>
												<span class="pbmit-month">Feb</span>
											</span>
										</div>
										<div class= "pbmit-meta-wraper">
											<div class="pbmit-meta-author pbmit-meta-line">
												<span class="pbmit-post-author">Alex joy</span>
											</div>
											<div class="pbmit-meta-category-wrapper pbmit-meta-line">
												<span class="pbmit-meta-category">
													<a href="/blog-classic" rel="category tag">Construction</a>
												</span>
											</div>
											<div class="pbmit-meta-comment-wrapper pbmit-meta-line">
												<span class="pbmit-meta-comments">3<span class="pbmit-comment-text">Comment</span></span>
											</div>
										</div>
									</div>
									<div class="pbmit-content-wrapper">
										<h3 class="pbmit-post-title">
											<a href="/blog-single-details">Role of Architecture in Disaster Relief and Resilience</a>
										</h3>
										<div class="pbminfotech-box-desc">
											When evaluating a single group or company, its dominant source of revenue is typically used&hellip; 
										</div>
										<div class="pbmit-blog-btn">
											<a class="pbmit-button-inner" href="/blog-single-details">
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
						<article class="pbmit-blog-style-1 col-md-6 col-lg-4 industrial">
							<div class="post-item">
								<div class="pbminfotech-box-content">
									<div class="pbmit-featured-container">
										<div class="pbmit-featured-container-inner">
											<div class="pbmit-featured-img-wrapper">
												<div class="pbmit-featured-wrapper">
													<img src="{{ asset('frontend/images/blog/blog-04.jpg') }}" class="img-fluid" alt="">
												</div>
											</div>
											<a class="pbmit-link" href="/blog-single-details"></a>
										</div>
										<div class="pbmit-meta-date-wrapper pbmit-meta-line">
											<span class="pbmit-post-date">
												<span class="pbmit-date">06</span>
												<span class="pbmit-month">Feb</span>
											</span>
										</div>
										<div class= "pbmit-meta-wraper">
											<div class="pbmit-meta-author pbmit-meta-line">
												<span class="pbmit-post-author">Alex joy</span>
											</div>
											<div class="pbmit-meta-category-wrapper pbmit-meta-line">
												<span class="pbmit-meta-category">
													<a href="/blog-classic" rel="category tag">Industrial</a>
												</span>
											</div>
											<div class="pbmit-meta-comment-wrapper pbmit-meta-line">
												<span class="pbmit-meta-comments">3<span class="pbmit-comment-text">Comment</span></span>
											</div>
										</div>
									</div>
									<div class="pbmit-content-wrapper">
										<h3 class="pbmit-post-title">
											<a href="/blog-single-details">Importance of Quality and Testing in Modern Factories</a>
										</h3>
										<div class="pbminfotech-box-desc">
											When evaluating a single group or company, its dominant source of revenue is typically used&hellip; 
										</div>
										<div class="pbmit-blog-btn">
											<a class="pbmit-button-inner" href="/blog-single-details">
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
						<article class="pbmit-blog-style-1 col-md-6 col-lg-4 chemical">
							<div class="post-item">
								<div class="pbminfotech-box-content">
									<div class="pbmit-featured-container">
										<div class="pbmit-featured-container-inner">
											<div class="pbmit-featured-img-wrapper">
												<div class="pbmit-featured-wrapper">
													<img src="{{ asset('frontend/images/blog/blog-05.jpg') }}" class="img-fluid" alt="">
												</div>
											</div>
											<a class="pbmit-link" href="/blog-single-details"></a>
										</div>
										<div class="pbmit-meta-date-wrapper pbmit-meta-line">
											<span class="pbmit-post-date">
												<span class="pbmit-date">06</span>
												<span class="pbmit-month">Feb</span>
											</span>
										</div>
										<div class= "pbmit-meta-wraper">
											<div class="pbmit-meta-author pbmit-meta-line">
												<span class="pbmit-post-author">Alex joy</span>
											</div>
											<div class="pbmit-meta-category-wrapper pbmit-meta-line">
												<span class="pbmit-meta-category">
													<a href="/blog-classic" rel="category tag">Chemical</a>
												</span>
											</div>
											<div class="pbmit-meta-comment-wrapper pbmit-meta-line">
												<span class="pbmit-meta-comments">3<span class="pbmit-comment-text">Comment</span></span>
											</div>
										</div>
									</div>
									<div class="pbmit-content-wrapper">
										<h3 class="pbmit-post-title">
											<a href="/blog-single-details">The Role of Energy Storage in the Transition to Renewables</a>
										</h3>
										<div class="pbminfotech-box-desc">
											When evaluating a single group or company, its dominant source of revenue is typically used&hellip; 
										</div>
										<div class="pbmit-blog-btn">
											<a class="pbmit-button-inner" href="/blog-single-details">
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
						<article class="pbmit-blog-style-1 col-md-6 col-lg-4 manufacturing">
							<div class="post-item">
								<div class="pbminfotech-box-content">
									<div class="pbmit-featured-container">
										<div class="pbmit-featured-container-inner">
											<div class="pbmit-featured-img-wrapper">
												<div class="pbmit-featured-wrapper">
													<img src="{{ asset('frontend/images/blog/blog-07.jpg') }}" class="img-fluid" alt="">
												</div>
											</div>
											<a class="pbmit-link" href="/blog-single-details"></a>
										</div>
										<div class="pbmit-meta-date-wrapper pbmit-meta-line">
											<span class="pbmit-post-date">
												<span class="pbmit-date">06</span>
												<span class="pbmit-month">Feb</span>
											</span>
										</div>
										<div class= "pbmit-meta-wraper">
											<div class="pbmit-meta-author pbmit-meta-line">
												<span class="pbmit-post-author">Alex joy</span>
											</div>
											<div class="pbmit-meta-category-wrapper pbmit-meta-line">
												<span class="pbmit-meta-category">
													<a href="/blog-classic" rel="category tag">Manufacturing</a>
												</span>
											</div>
											<div class="pbmit-meta-comment-wrapper pbmit-meta-line">
												<span class="pbmit-meta-comments">3<span class="pbmit-comment-text">Comment</span></span>
											</div>
										</div>
									</div>
									<div class="pbmit-content-wrapper">
										<h3 class="pbmit-post-title">
											<a href="/blog-single-details">Importance of Quality Control & Testing in Modern Factories</a>
										</h3>
										<div class="pbminfotech-box-desc">
											When evaluating a single group or company, its dominant source of revenue is typically used&hellip; 
										</div>
										<div class="pbmit-blog-btn">
											<a class="pbmit-button-inner" href="/blog-single-details">
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
					</div>
				</div>
            </section>
            <!-- Blog Sortable Grid View End -->

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
	 
	<!-- masonry JS -->
	 
	<!-- AOS -->
	
	<!-- GSAP -->
	
	<!-- Scroll Trigger -->
	
	<!-- Split Text -->
	
	<!-- Isotope JS -->
	
	<!-- Theia Sticky Sidebar JS -->
	
	<!-- GSAP Animation -->
	
	<!-- Scripts JS -->
</div>