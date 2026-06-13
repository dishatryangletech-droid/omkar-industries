<style>
    .pbmit-sortable-list-ul li a.pbmit-sortable-link.pbmit-selected {
        background-color: #ffb800 !important;
        border-color: #ffb800 !important;
        color: #000 !important;
    }
</style>
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
								<h1 class="pbmit-tbar-title"> Gallery</h1>
							</div>
						</div>
						<div class="pbmit-breadcrumb">
							<div class="pbmit-breadcrumb-inner">
								<span>
									<a title="" href="#" class="home"><span>Induyst</span></a>
								</span>
								<span class="sep"></span>
								<span><span class="post-root post post-post current-item"> Gallery</span></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Title Bar End-->

		<div class="page-content">

			<!-- Portfolio Gallery -->
			<section class="section-md pbmit-sortable-yes pbmit-element-portfolio-style-1">
				<div class="container">
					<div class="pbmit-heading-subheading text-center">
						<h4 class="pbmit-subtitle">Working Process</h4>
						<h2 class="pbmit-title">We create personalized <br> industry solutions</h2>
					</div>
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
						<article class="pbmit-portfolio-style-1 col-md-6 col-lg-4 industrial">
							<div class="pbminfotech-post-content">
								<div class="pbminfotech-post-warpper">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('frontend/images/portfolio/portfolio-01.jpg') }}"
												class="img-fluid" alt="">
										</div>
									</div>
									<a class="pbmit-link" href="/portfolio-detail-style-01"></a>
								</div>
							</div>
						</article>
						<article class="pbmit-portfolio-style-1 col-md-6 col-lg-4 chemical">
							<div class="pbminfotech-post-content">
								<div class="pbminfotech-post-warpper">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('frontend/images/portfolio/portfolio-02.jpg') }}"
												class="img-fluid" alt="">
										</div>
									</div>
									<a class="pbmit-link" href="/portfolio-detail-style-01"></a>
								</div>
							</div>
						</article>
						<article class="pbmit-portfolio-style-1 col-md-6 col-lg-4 factory">
							<div class="pbminfotech-post-content">
								<div class="pbminfotech-post-warpper">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('frontend/images/portfolio/portfolio-03.jpg') }}"
												class="img-fluid" alt="">
										</div>
									</div>
									<a class="pbmit-link" href="/portfolio-detail-style-01"></a>
								</div>
							</div>
						</article>
						<article class="pbmit-portfolio-style-1 col-md-6 col-lg-4 construction">
							<div class="pbminfotech-post-content">
								<div class="pbminfotech-post-warpper">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('frontend/images/portfolio/portfolio-04.jpg') }}"
												class="img-fluid" alt="">
										</div>
									</div>
									<a class="pbmit-link" href="/portfolio-detail-style-01"></a>
								</div>
							</div>
						</article>
						<article class="pbmit-portfolio-style-1 col-md-6 col-lg-4 engineering">
							<div class="pbminfotech-post-content">
								<div class="pbminfotech-post-warpper">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('frontend/images/portfolio/portfolio-05.jpg') }}"
												class="img-fluid" alt="">
										</div>
									</div>
									<a class="pbmit-link" href="/portfolio-detail-style-01"></a>
								</div>
							</div>
						</article>
						<article class="pbmit-portfolio-style-1 col-md-6 col-lg-4 manufacture">
							<div class="pbminfotech-post-content">
								<div class="pbminfotech-post-warpper">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('frontend/images/portfolio/portfolio-06.jpg') }}"
												class="img-fluid" alt="">
										</div>
									</div>
									<a class="pbmit-link" href="/portfolio-detail-style-01"></a>
								</div>
							</div>
						</article>
					</div>
				</div>
			</section>
			<!-- Portfolio Gallery End -->

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