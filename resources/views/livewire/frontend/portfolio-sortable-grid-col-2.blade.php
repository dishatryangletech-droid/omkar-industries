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
								<h1 class="pbmit-tbar-title"> Sortable Grid Col 2</h1>
							</div>
						</div>
						<div class="pbmit-breadcrumb">
							<div class="pbmit-breadcrumb-inner">
								<span>
									<a title="" href="#" class="home"><span>Induyst</span></a>
								</span>
								<span class="sep"></span>
								<span><span class="post-root post post-post current-item"> Sortable Grid Col 2</span></span>
							</div>
						</div>
					</div>
				</div> 
			</div> 
		</div>
		<!-- Title Bar End-->

        <!-- Page Content -->
        <div class="page-content">   
            
            <!-- Portfolio Sortable Col 2 Start -->
            <section class="section-md pbmit-sortable-yes">
				<div class="container">
					<div class="pbmit-sortable-list">
						<ul class="pbmit-sortable-list-ul">
						   <li><a href="#" class="pbmit-sortable-link pbmit-selected" data-sortby="*">All</a></li>
						   <li><a href="#" class="pbmit-sortable-link" data-sortby="chemical">Chemical</a></li>
						   <li><a href="#" class="pbmit-sortable-link" data-sortby="construction">Construction</a></li>
						   <li><a href="#" class="pbmit-sortable-link" data-sortby="engineering">Engineering</a></li>
						   <li><a href="#" class="pbmit-sortable-link" data-sortby="factory">Factory</a></li>
						   <li><a href="#" class="pbmit-sortable-link" data-sortby="industrial">Industrial</a></li>
						   <li><a href="#" class="pbmit-sortable-link" data-sortby="manufacture">Manufacture</a></li>
						</ul>
					</div>
					<div class="row pbmit-element-posts-wrapper">
						<article class="pbmit-portfolio-style-1 col-md-6 industrial">
							<div class="pbminfotech-post-content">
								<div class="pbminfotech-post-warpper">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('frontend/images/portfolio/portfolio-01.jpg') }}" class="img-fluid" alt="">
										</div>
									</div>
									<a class="pbmit-link" href="/portfolio-detail-style-01"></a>
								</div>
								<div class="pbminfotech-box-content">
									<div class="pbminfotech-titlebox">
										<div class="pbmit-port-cat">
											<a href="/portfolio-grid-col-3" rel="tag">Industrial</a>
										</div>
										<h3 class="pbmit-portfolio-title">
											<a href="/portfolio-detail-style-01">Automated Industry</a>
										</h3>
									</div>
								</div>
							</div>
						</article>
						<article class="pbmit-portfolio-style-1 col-md-6 chemical">
							<div class="pbminfotech-post-content">
								<div class="pbminfotech-post-warpper">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('frontend/images/portfolio/portfolio-02.jpg') }}" class="img-fluid" alt="">
										</div>
									</div>
									<a class="pbmit-link" href="/portfolio-detail-style-01"></a>
								</div>
								<div class="pbminfotech-box-content">
									<div class="pbminfotech-titlebox">
										<div class="pbmit-port-cat">
											<a href="/portfolio-grid-col-3" rel="tag">Chemical</a>
										</div>
										<h3 class="pbmit-portfolio-title">
											<a href="/portfolio-detail-style-01">Oil & Gas Industry</a>
										</h3>
									</div>
								</div>
							</div>
						</article>
						<article class="pbmit-portfolio-style-1 col-md-6 factory">
							<div class="pbminfotech-post-content">
								<div class="pbminfotech-post-warpper">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('frontend/images/portfolio/portfolio-03.jpg') }}" class="img-fluid" alt="">
										</div>
									</div>
									<a class="pbmit-link" href="/portfolio-detail-style-01"></a>
								</div>
								<div class="pbminfotech-box-content">
									<div class="pbminfotech-titlebox">
										<div class="pbmit-port-cat">
											<a href="/portfolio-grid-col-3" rel="tag">Factory</a>
										</div>
										<h3 class="pbmit-portfolio-title">
											<a href="/portfolio-detail-style-01">Industry Innovation</a>
										</h3>
									</div>
								</div>
							</div>
						</article>
						<article class="pbmit-portfolio-style-1 col-md-6 construction">
							<div class="pbminfotech-post-content">
								<div class="pbminfotech-post-warpper">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('frontend/images/portfolio/portfolio-04.jpg') }}" class="img-fluid" alt="">
										</div>
									</div>
									<a class="pbmit-link" href="/portfolio-detail-style-01"></a>
								</div>
								<div class="pbminfotech-box-content">
									<div class="pbminfotech-titlebox">
										<div class="pbmit-port-cat">
											<a href="/portfolio-grid-col-3" rel="tag">Construction</a>
										</div>
										<h3 class="pbmit-portfolio-title">
											<a href="/portfolio-detail-style-01">Tiling & Painting</a>
										</h3>
									</div>
								</div>
							</div>
						</article>
						<article class="pbmit-portfolio-style-1 col-md-6 engineering">
							<div class="pbminfotech-post-content">
								<div class="pbminfotech-post-warpper">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('frontend/images/portfolio/portfolio-05.jpg') }}" class="img-fluid" alt="">
										</div>
									</div>
									<a class="pbmit-link" href="/portfolio-detail-style-01"></a>
								</div>
								<div class="pbminfotech-box-content">
									<div class="pbminfotech-titlebox">
										<div class="pbmit-port-cat">
											<a href="/portfolio-grid-col-3" rel="tag">Engineering</a>
										</div>
										<h3 class="pbmit-portfolio-title">
											<a href="/portfolio-detail-style-01">Construction Planning</a>
										</h3>
									</div>
								</div>
							</div>
						</article>
						<article class="pbmit-portfolio-style-1 col-md-6 factory">
							<div class="pbminfotech-post-content">
								<div class="pbminfotech-post-warpper">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('frontend/images/portfolio/portfolio-06.jpg') }}" class="img-fluid" alt="">
										</div>
									</div>
									<a class="pbmit-link" href="/portfolio-detail-style-01"></a>
								</div>
								<div class="pbminfotech-box-content">
									<div class="pbminfotech-titlebox">
										<div class="pbmit-port-cat">
											<a href="/portfolio-grid-col-3" rel="tag">Factory</a>
										</div>
										<h3 class="pbmit-portfolio-title">
											<a href="/portfolio-detail-style-01">Logistic Solutions</a>
										</h3>
									</div>
								</div>
							</div>
						</article>
					</div>
				</div>
            </section>
            <!-- Portfolio Sortable Col 2 End -->

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