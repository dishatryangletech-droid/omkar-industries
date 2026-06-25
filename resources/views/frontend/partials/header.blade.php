<div class="pbmit-sticky-header pbmit-header-sticky-yes pbmit-bg-color-white pbmit-sticky-header-mobile-yes"></div>
<div class="pbmit-header-overlay">
	<div class="pbmit-main-header-area pbmit-infostack-header pbmit-bg-color-blackish">
		<div class="pbmit-top-area">
			<div class="container-fluid">
				<div class="pbmit-logo-area-inner d-flex align-items-center justify-content-between">
					<div class="site-branding">
						<h1 class="site-title">
							<a href="/index-2">
								<img class="pbmit-main-logo" src="{{ asset('frontend/images/omkar-logo.png') }}"
									alt="Induyst" style="width: 68px;">
								<img class="pbmit-sticky-logo" src="{{ asset('frontend/images/omkar-logo.png') }}"
									alt="Induyst">
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
										<span
											class="pbmit-header-box-content">{{ $generalSettings->contact_phone ?? '(000)123456789' }}</span>
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
										<span
											class="pbmit-header-box-content">{{ $generalSettings->short_contact_address ?? ($generalSettings->contact_address ?? 'Los Angeles Gournadi Bariasl') }}</span>
									</span>
								</a>
							</div>
							<div class="pbmit-header-box pbmit-header-box-3">
								<a
									href="https://induyst-demo.pbminfotech.com/cdn-cgi/l/email-protection#f29c9ddf8097829e8bb2978a939f829e97dc919d9f">
									<span class="pbmit-header-box-icon">
										<i class="pbmit-induyst-icon pbmit-induyst-icon-mail"></i>
									</span>
									<span class="pbmit-box-content">
										<span class="pbmit-header-box-title">Email address</span>
										<span class="pbmit-header-box-content">
											@if(isset($generalSettings->contact_email) && $generalSettings->contact_email)
												{{ $generalSettings->contact_email }}
											@else
												<span class="__cf_email__"
													data-cfemail="dab4b5f7a8bfaab6a39abfa2bbb7aab6bff4b9b5b7">[email&#160;protected]</span>
											@endif
										</span>
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
				<div
					class="pbmit-header-content d-flex align-items-center justify-content-between pbmit-bg-color-white">
					<div class="pbmit-menuarea d-flex align-items-center">
						<div class="site-navigation">
							<nav class="main-navigation pbmit-navbar main-menu navbar-expand-xl navbar-light"
								id="site-navigation">
								<div class="collapse navbar-collapse" id="pbmit-menu">
									<ul class="navigation clearfix" id="pbmit-top-menu">
										<li class="{{ request()->is('home') || request()->is('/') ? 'active' : '' }}">
											<a href="/home">Home</a>
										</li>
										<li
											class="dropdown {{ request()->is('about-us') || request()->is('our-history') || request()->is('our-team') || request()->is('certificates') ? 'active' : '' }}">
											<a href="/about-us">About Us</a>
											<ul>
												<li class="{{ request()->is('about-us') ? 'active' : '' }}"><a
														href="/about-us">About Our Company</a></li>
												<li class="{{ request()->is('our-history') ? 'active' : '' }}"><a
														href="/our-history">Our History</a></li>
												<!-- <li class="{{ request()->is('our-team') ? 'active' : '' }}"><a href="/our-team">Our Team</a></li> -->
												<li class="{{ request()->is('certificates') ? 'active' : '' }}"><a
														href="/certificates">Certificates</a></li>
											</ul>
										</li>
										<li
											class="dropdown {{ request()->is('products') || request()->is('product-details') ? 'active' : '' }}">
											<a href="/products">Products</a>
											<ul
												style="width: 900px; padding: 25px; left: 0; right: auto; transform: none; box-sizing: border-box; border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
												<li style="padding: 0; display: block;">
													<div class="row">
														<!-- Left side: Links and Content -->
														<div class="col-md-8 border-end pe-4">
															<h5 class="mb-3 text-dark fw-bold border-bottom pb-2"
																style="font-size: 16px; text-transform: uppercase;">Our
																Core Products</h5>
															<div class="row g-3">
																@php
																	$otherProduct = \App\Models\Product::where('slug', 'other-product-page')->first();
																	$otherId = $otherProduct ? $otherProduct->id : 0;
																	
																	$standaloneNav = \App\Models\Product::where('status', 'Active')
																		->where(function($q) {
																			$q->whereNull('parent_id')->orWhere('parent_id', 0);
																		})->where('is_parent', false)->where('id', '!=', $otherId)->take(4)->get();
																	$parentNav = \App\Models\Product::where('status', 'Active')
																		->where('is_parent', true)->where('id', '!=', $otherId)->take(3)->get();
																	$navProducts = $standaloneNav->merge($parentNav);
																@endphp
																@foreach($navProducts as $navProduct)
																	@php
																		$navUrl = route('product-details', ['slug' => $navProduct->slug]);
																	@endphp
																	<div class="col-md-4 text-center {{ $loop->iteration > 3 ? 'pt-2' : '' }}">
																		<a href="{{ $navUrl }}" class="d-block"
																			style="padding: 0; text-decoration: none;">
																			<img src="{{ ($navProduct->image && file_exists(public_path('storage/' . $navProduct->image))) ? asset('storage/' . $navProduct->image) : asset('frontend/images/portfolio/portfolio-img-01.jpg') }}"
																				class="img-fluid rounded w-100"
																				style="height: 100px; object-fit: contain;"
																				alt="{{ $navProduct->title }}">
																			<span class="d-block fw-bold mt-2"
																				style="font-size: 14px; color: #333;">{{ $navProduct->title }}</span>
																		</a>
																	</div>
																@endforeach
															</div>
														</div>
														<!-- Right side: Image -->
														<div class="col-md-4 ps-4">
															<div
																class="position-relative h-100 rounded overflow-hidden shadow-sm">
																@if($otherProduct)
																	<img src="{{ ($otherProduct->image && file_exists(public_path('storage/' . $otherProduct->image))) ? asset('storage/' . $otherProduct->image) : asset('frontend/images/portfolio/portfolio-single-01.webp') }}"
																		class="img-fluid w-100 h-100"
																		style="object-fit: cover; min-height: 250px;"
																		alt="{{ $otherProduct->title }}">
																	<div class="position-absolute bottom-0 start-0 w-100 p-3"
																		style="background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);">
																		<h6 class="text-white mb-1 fw-bold mb-2">{{ $otherProduct->title }}</h6>
																		<a href="{{ route('product-details', ['slug' => $otherProduct->slug]) }}"
																			class="pbmit-btn pbmit-btn-white"
																			style="transform: scale(0.85); transform-origin: left top; margin-top: 15px;">
																			<span class="pbmit-button-content-wrapper">
																				<span class="pbmit-button-icon">
																					<i
																						class="pbmit-induyst-icon pbmit-induyst-icon-next"></i>
																				</span>
																				<span class="pbmit-button-text">View
																					All</span>
																			</span>
																		</a>
																	</div>
																@else
																	<img src="{{ asset('frontend/images/portfolio/portfolio-single-01.webp') }}"
																		class="img-fluid w-100 h-100"
																		style="object-fit: cover; min-height: 250px;"
																		alt="Featured Product">
																	<div class="position-absolute bottom-0 start-0 w-100 p-3"
																		style="background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);">
																		<h6 class="text-white mb-1 fw-bold mb-2">Other
																			Products
																		</h6>
																		<a href="/products"
																			class="pbmit-btn pbmit-btn-white"
																			style="transform: scale(0.85); transform-origin: left top; margin-top: 15px;">
																			<span class="pbmit-button-content-wrapper">
																				<span class="pbmit-button-icon">
																					<i
																						class="pbmit-induyst-icon pbmit-induyst-icon-next"></i>
																				</span>
																				<span class="pbmit-button-text">View
																					All</span>
																			</span>
																		</a>
																	</div>
																@endif
															</div>
														</div>
													</div>
												</li>
											</ul>
										</li>
										<li class="{{ request()->is('gallery') ? 'active' : '' }}">
											<a href="/gallery">Gallery</a>
										</li>
										<li class="{{ request()->is('blog*') ? 'active' : '' }}">
											<a href="/blogs">Blog</a>
										</li>
										<li class="{{ request()->is('contact-us') ? 'active' : '' }}"><a
												href="/contact-us">Contact Us</a></li>
										<li class="{{ request()->is('career') ? 'active' : '' }}"><a
												href="/career">Career</a></li>
									</ul>
								</div>
							</nav>
						</div>

					</div>
					<div class="pbmit-right-box d-flex align-items-center">
						<div class="pbmit-header-social">
							@php
								$footerSettings = class_exists('App\Models\FooterSetting') ? \App\Models\FooterSetting::first() : null;
							@endphp
							<ul class="pbmit-social-links">
								@if(!empty($footerSettings->facebook_link))
								<li class="pbmit-social-li pbmit-social-facebook">
									<a title="Facebook" href="{{ $footerSettings->facebook_link }}" target="_blank">
										<span><i class="pbmit-base-icon-facebook-f"></i></span>
									</a>
								</li>
								@endif
								@if(!empty($footerSettings->twitter_link))
								<li class="pbmit-social-li pbmit-social-twitter">
									<a title="Twitter" href="{{ $footerSettings->twitter_link }}" target="_blank">
										<span><i class="pbmit-base-icon-twitter-2"></i></span>
									</a>
								</li>
								@endif
								@if(!empty($footerSettings->linkedin_link))
								<li class="pbmit-social-li pbmit-social-linkedin">
									<a title="LinkedIn" href="{{ $footerSettings->linkedin_link }}" target="_blank">
										<span><i class="pbmit-base-icon-linkedin-in"></i></span>
									</a>
								</li>
								@endif
								@if(!empty($footerSettings->instagram_link))
								<li class="pbmit-social-li pbmit-social-instagram">
									<a title="Instagram" href="{{ $footerSettings->instagram_link }}" target="_blank">
										<span><i class="pbmit-base-icon-instagram"></i></span>
									</a>
								</li>
								@endif
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
