<div class="pbmit-sticky-header pbmit-header-sticky-yes pbmit-bg-color-white pbmit-sticky-header-mobile-yes"></div>
			<div class="pbmit-header-overlay">
				<div class="pbmit-main-header-area pbmit-infostack-header pbmit-bg-color-blackish">
					<div class="pbmit-top-area">
						<div class="container-fluid">
							<div class="pbmit-logo-area-inner d-flex align-items-center justify-content-between">
								<div class="site-branding">
									<h1 class="site-title">
										<a href="/index-2">
											<img class="pbmit-main-logo" src="{{ asset('frontend/images/logo-white.svg') }}" alt="Induyst">
											<img class="pbmit-sticky-logo" src="{{ asset('frontend/images/logo.svg') }}" alt="Induyst">
										</a>
									</h1>
								</div>
								<div class="pbmit-header-text-box">
									<span>We are creative and ready for challenges! 
										<a href="/contact-us">
											<span class="pbmit-text-btn">Join Now!</span>
											<i class=" pbmit-base-icon-right-arrow"> </i>
										</a>
									</span>						
								</div>
								<div class="pbmit-header-info ml-auto d-flex align-items-center">
									<div class="pbmit-header-info-inner">
										<div class="pbmit-header-box pbmit-header-box-1">
											<a href="tel:(000)123456789">						
												<span class="pbmit-header-box-icon">
													<i class="pbmit-induyst-icon pbmit-induyst-icon-telephone"></i>
												</span>							
												<span class="pbmit-box-content">
													<span class="pbmit-header-box-title">Need to talk</span>
													<span class="pbmit-header-box-content">(000)123456789</span>
												</span>
											</a>				
										</div>
										<div class="pbmit-header-box pbmit-header-box-2">
											<a href="#">						
												<span class="pbmit-header-box-icon">
													<i class="pbmit-induyst-icon pbmit-induyst-icon-location-1"></i>
												</span>							
												<span class="pbmit-box-content">
													<span class="pbmit-header-box-title">Main Location</span>
													<span class="pbmit-header-box-content">Los Angeles Gournadi Bariasl</span>
												</span>
											</a>				
										</div>
										<div class="pbmit-header-box pbmit-header-box-3">
											<a href="https://induyst-demo.pbminfotech.com/cdn-cgi/l/email-protection#f29c9ddf8097829e8bb2978a939f829e97dc919d9f">						
												<span class="pbmit-header-box-icon">
													<i class="pbmit-induyst-icon pbmit-induyst-icon-mail"></i>
												</span>							
												<span class="pbmit-box-content">
													<span class="pbmit-header-box-title">Email address</span>
													<span class="pbmit-header-box-content"><span class="__cf_email__" data-cfemail="dab4b5f7a8bfaab6a39abfa2bbb7aab6bff4b9b5b7">[email&#160;protected]</span></span>
												</span>
											</a>				
										</div>
									</div>
								</div>
								<div class="pbmit-right-box d-flex align-items-center">
									<div class="pbmit-header-search-btn">
										<a href="#" title="Search">
											<i class="pbmit-base-icon-search-2"></i>
										</a>
									</div>
									<div class="pbmit-burger-menu-wrapper">
										<div class="pbmit-mobile-menu-bg"></div>
										<button id="menu-toggle" class="nav-menu-toggle">
											<i class="pbmit-base-icon-menu-1"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="pbmit-main-header-area">
						<div class="container-fluid">
							<div class="pbmit-header-content d-flex align-items-center justify-content-between pbmit-bg-color-white">
								<div class="pbmit-menuarea d-flex align-items-center">
									<div class="site-navigation">
										<nav class="main-navigation pbmit-navbar main-menu navbar-expand-xl navbar-light" id="site-navigation">
											<div class="collapse navbar-collapse" id="pbmit-menu">
												<ul class="navigation clearfix" id="pbmit-top-menu">
													<li class="dropdown {{ request()->is('index-2') || request()->is('homepage-2') ? 'active' : '' }}">
														<a href="#">Home</a>
														<ul>
															<li class="{{ request()->is('index-2') ? 'active' : '' }}"><a href="/index-2">Homepage 01</a></li>
															<li class="{{ request()->is('homepage-2') ? 'active' : '' }}"><a href="/homepage-2">Homepage 02</a></li>
														</ul>
													</li>
													<li class="dropdown {{ request()->is('about-us') || request()->is('our-history') || request()->is('our-team') || request()->is('team-member-detail') || request()->is('faq') ? 'active' : '' }}">
														<a href="#">Pages</a>
														<ul>
															<li class="{{ request()->is('about-us') ? 'active' : '' }}"><a href="/about-us">About Us</a></li>
															<li class="{{ request()->is('our-history') ? 'active' : '' }}"><a href="/our-history">Our History</a></li>
															<li class="{{ request()->is('our-team') ? 'active' : '' }}"><a href="/our-team">Our Team</a></li>
															<li class="{{ request()->is('team-member-detail') ? 'active' : '' }}"><a href="/team-member-detail">Team Member Detail</a></li>
															<li class="{{ request()->is('faq') ? 'active' : '' }}"><a href="/faq">Faq</a></li>
														</ul>
													</li>
													<li class="dropdown {{ request()->is('services') || request()->is('service-details') ? 'active' : '' }}">
														<a href="#">Services</a>
														<ul>
															<li class="{{ request()->is('services') ? 'active' : '' }}"><a href="/services">Services</a></li>
															<li class="{{ request()->is('service-details') ? 'active' : '' }}"><a href="/service-details">Service Detail</a></li>
														</ul>
													</li>
													<li class="dropdown {{ request()->is('portfolio*') ? 'active' : '' }}">
														<a href="#">Portfolio</a>
														<ul>
															<li class="dropdown {{ request()->is('portfolio-m-grid*') ? 'active' : '' }}">
																<a href="#">Masonry View</a>
																<ul>
																	<li class="{{ request()->is('portfolio-m-grid-col-2') ? 'active' : '' }}"><a href="/portfolio-m-grid-col-2">Grid Col 2</a></li>
																	<li class="{{ request()->is('portfolio-m-grid-col-3') ? 'active' : '' }}"><a href="/portfolio-m-grid-col-3">Grid Col 3</a></li>
																	<li class="{{ request()->is('portfolio-m-grid-col-4') ? 'active' : '' }}"><a href="/portfolio-m-grid-col-4">Grid Col 4</a></li>
																	<li class="{{ request()->is('portfolio-m-grid-wide') ? 'active' : '' }}"><a href="/portfolio-m-grid-wide">Grid Wide</a></li>
																</ul>
															</li>
															<li class="dropdown {{ request()->is('portfolio-grid*') && !request()->is('portfolio-m-grid*') ? 'active' : '' }}">
																<a href="#">Grid View</a>
																<ul>
																	<li class="{{ request()->is('portfolio-grid-col-2') ? 'active' : '' }}"><a href="/portfolio-grid-col-2">Grid Col 2</a></li>
																	<li class="{{ request()->is('portfolio-grid-col-3') ? 'active' : '' }}"><a href="/portfolio-grid-col-3">Grid Col 3</a></li>
																	<li class="{{ request()->is('portfolio-grid-col-4') ? 'active' : '' }}"><a href="/portfolio-grid-col-4">Grid Col 4</a></li>
																	<li class="{{ request()->is('portfolio-grid-no-gap') ? 'active' : '' }}"><a href="/portfolio-grid-no-gap">Grid No Gap</a></li>
																</ul>
															</li>
															<li class="dropdown {{ request()->is('portfolio-sortable*') ? 'active' : '' }}">
																<a href="#">Sortable View</a>
																<ul>
																	<li class="{{ request()->is('portfolio-sortable-grid-col-2') ? 'active' : '' }}"><a href="/portfolio-sortable-grid-col-2">Grid Col 2</a></li>
																	<li class="{{ request()->is('portfolio-sortable-grid-col-3') ? 'active' : '' }}"><a href="/portfolio-sortable-grid-col-3">Grid Col 3</a></li>
																	<li class="{{ request()->is('portfolio-sortable-grid-col-4') ? 'active' : '' }}"><a href="/portfolio-sortable-grid-col-4">Grid Col 4</a></li>
																</ul>
															</li>
															<li class="dropdown {{ request()->is('portfolio-detail*') ? 'active' : '' }}">
																<a href="#">Single Detail Style</a>
																<ul>
																	<li class="{{ request()->is('portfolio-detail-style-01') ? 'active' : '' }}"><a href="/portfolio-detail-style-01">Portfolio Detail Style 1</a></li>
																	<li class="{{ request()->is('portfolio-detail-style-02') ? 'active' : '' }}"><a href="/portfolio-detail-style-02">Portfolio Detail Style 2</a></li>
																</ul>
															</li>
														</ul>
													</li>
													<li class="dropdown {{ request()->is('blog*') ? 'active' : '' }}">
														<a href="#">Blog</a>
														<ul>
															<li class="dropdown {{ request()->is('blog-m-grid*') || request()->is('blog-masonry*') ? 'active' : '' }}">
																<a href="#">Blog Masonry View</a>
																<ul>
																	<li class="{{ request()->is('blog-m-grid-col-2') ? 'active' : '' }}"><a href="/blog-m-grid-col-2">Grid Col 2</a></li>
																	<li class="{{ request()->is('blog-m-grid-col-3') ? 'active' : '' }}"><a href="/blog-m-grid-col-3">Grid Col 3</a></li>
																	<li class="{{ request()->is('blog-m-grid-col-4') ? 'active' : '' }}"><a href="/blog-m-grid-col-4">Grid Col 4</a></li>
																	<li class="{{ request()->is('blog-masonry-wide') ? 'active' : '' }}"><a href="/blog-masonry-wide">Masonry Wide</a></li>
																</ul>
															</li>
															<li class="dropdown {{ request()->is('blog-grid*') || request()->is('blog-sortable*') ? 'active' : '' }}">
																<a href="#">Blog Grid View</a>
																<ul>
																	<li class="{{ request()->is('blog-grid-col-3') ? 'active' : '' }}"><a href="/blog-grid-col-3">Grid Col 3</a></li>
																	<li class="{{ request()->is('blog-grid-col-4') ? 'active' : '' }}"><a href="/blog-grid-col-4">Grid Col 4</a></li>
																	<li class="{{ request()->is('blog-sortable-grid-view') ? 'active' : '' }}"><a href="/blog-sortable-grid-view">Sortable Grid View</a></li>
																</ul>
															</li>
															<li class="{{ request()->is('blog-classic') ? 'active' : '' }}"><a href="/blog-classic">Blog Classic</a></li>
															<li class="{{ request()->is('blog-single-details') ? 'active' : '' }}"><a href="/blog-single-details">Blog Single Details</a></li>
														</ul>
													</li>
													<li class="{{ request()->is('contact-us') ? 'active' : '' }}"><a href="/contact-us">Contact Us</a></li>
												</ul>
											</div>
										</nav>
									</div>
									<div class="pbmit-header-search-btn">
										<a href="#" title="Search">
											<i class="pbmit-base-icon-search-2"></i>
										</a>
									</div>
								</div>
								<div class="pbmit-right-box d-flex align-items-center">
									<div class="pbmit-header-social">
										<ul class="pbmit-social-links">
											<li class="pbmit-social-li pbmit-social-facebook">
												<a title="Facebook" href="#" target="_blank">
													<span><i class="pbmit-base-icon-facebook-f"></i></span>
												</a>
											</li>
											<li class="pbmit-social-li pbmit-social-twitter">
												<a title="Twitter" href="#" target="_blank">
													<span><i class="pbmit-base-icon-twitter-2"></i></span>
												</a>
											</li>
											<li class="pbmit-social-li pbmit-social-youtube">
												<a title="Youtube" href="#" target="_blank">
													<span><i class="pbmit-base-icon-youtube-play"></i></span>
												</a>
											</li>
											<li class="pbmit-social-li pbmit-social-instagram">
												<a title="Instagram" href="#" target="_blank">
													<span><i class="pbmit-base-icon-instagram"></i></span>
												</a>
											</li>
										</ul>
									</div>
									<div class="pbmit-header-button">
										<a href="/contact-us" class="pbmit-btn">
											<span class="pbmit-button-content-wrapper">
												<span class="pbmit-button-icon">
													<i class="pbmit-induyst-icon pbmit-induyst-icon-next"></i>
												</span>
												<span class="pbmit-button-text">Get in Touch</span>
											</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>