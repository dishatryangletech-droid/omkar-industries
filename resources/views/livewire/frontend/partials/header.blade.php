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
													<li class="{{ request()->is('home') || request()->is('/') ? 'active' : '' }}">
														<a href="/home">Home</a>
													</li>
													<li class="dropdown {{ request()->is('about-us') || request()->is('our-history') || request()->is('our-team') || request()->is('certificates') ? 'active' : '' }}">
														<a href="#">About Us</a>
														<ul>
															<li class="{{ request()->is('about-us') ? 'active' : '' }}"><a href="/about-us">About Our Company</a></li>
															<li class="{{ request()->is('our-history') ? 'active' : '' }}"><a href="/our-history">Our History</a></li>
															<!-- <li class="{{ request()->is('our-team') ? 'active' : '' }}"><a href="/our-team">Our Team</a></li> -->
															<li class="{{ request()->is('certificates') ? 'active' : '' }}"><a href="/certificates">Certificates</a></li>
														</ul>
													</li>
													<li class="{{ request()->is('products') || request()->is('product-details') ? 'active' : '' }}">
														<a href="/products">Products</a>
													</li>
													<li class="{{ request()->is('gallery') ? 'active' : '' }}">
														<a href="/gallery">Gallery</a>
													</li>
													<li class="{{ request()->is('blog*') ? 'active' : '' }}">
														<a href="/blogs">Blog</a>
													</li>
													<li class="{{ request()->is('contact-us') ? 'active' : '' }}"><a href="/contact-us">Contact Us</a></li>
													<li class="{{ request()->is('career') ? 'active' : '' }}"><a href="/career">Career</a></li>
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