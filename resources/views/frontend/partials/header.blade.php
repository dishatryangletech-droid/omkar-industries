<div class="pbmit-sticky-header pbmit-header-sticky-yes pbmit-bg-color-white pbmit-sticky-header-mobile-yes"></div>
<div class="pbmit-header-overlay">
	<div class="pbmit-main-header-area pbmit-infostack-header pbmit-bg-color-blackish">
		<div class="pbmit-top-area">
			<div class="container-fluid">
				<div class="pbmit-logo-area-inner d-flex align-items-center justify-content-between">
					<div class="site-branding">
						<h1 class="site-title">
							<a href="/index-2" style="display: flex; align-items: center;">
								<img class="pbmit-main-logo" src="{{ asset('frontend/images/full-logo2.png') }}"
									alt="Induyst" style="width: auto; height: auto; max-height: 100%; max-width: 430px;
    margin-top: 29px;
    margin-left: -10px;
    padding-right: 5px;">
								<img class="pbmit-main-logo pbmit-round-logo"
									src="{{ asset('frontend/images/omkar-logo2.png') }}" alt="Omkar"
									style="width: auto; height: auto; max-height: 80px; max-width: 90px; margin-top: -6px; margin-left: 12px; padding: 2px 6px;">
								<style>
									.pbmit-sticky-header .pbmit-main-logo {
										display: none !important;
									}

									.pbmit-sticky-header .pbmit-sticky-logo {
										display: inline-block !important;
										max-height: 180px !important;
										max-width: 350px !important;
										margin-top: 0 !important;
										vertical-align: middle;
									}

									.pbmit-sticky-header .site-branding {
										margin-right: 20px;
									}

									@media (max-width: 767px) {
										.pbmit-main-logo {
											width: 220px !important;
											max-width: 100% !important;
											margin-top: 10px !important;
											margin-left: -10px !important;
										}

										.pbmit-main-logo.pbmit-round-logo {
											width: auto !important;
											max-width: 65px !important;
											max-height: 60px !important;
											margin-top: 5px !important;
											margin-left: 8px !important;
											padding: 2px !important;
										}

										.pbmit-sticky-header .pbmit-sticky-logo {
											max-height: 100px !important;
											max-width: 100% !important;
											margin-top: 0 !important;
											margin-left: -10px !important;
										}

										.pbmit-sticky-header .pbmit-sticky-logo.pbmit-sticky-round-logo {
											width: auto !important;
											max-width: 60px !important;
											max-height: 52px !important;
											margin-top: 0 !important;
											margin-left: 5px !important;
											padding: 2px !important;
										}
									}

									.site-branding .site-title,
									.pbmit-sticky-header .site-branding .site-title {
										border-right: none !important;
										padding-right: 0 !important;
									}

									.pbmit-header-phone-link:hover {
										color: var(--pbmit-global-color) !important;
									}
								</style>
								<img class="pbmit-sticky-logo" src="{{ asset('frontend/images/full-logo.png') }}"
									alt="Induyst"
									style="width: auto; height: auto; padding: 2px 0; vertical-align: middle;">
								<span class="pbmit-sticky-logo"
									style="margin-top: 0 !important; margin-left: 12px; margin-right: 12px; width: 1px !important; height: 45px !important; background-color: #bbb; vertical-align: middle;"></span>
								<img class="pbmit-sticky-logo pbmit-sticky-round-logo"
									src="{{ asset('frontend/images/omkar-logo-bc-2.png') }}" alt="Omkar"
									style="width: auto !important; height: auto !important; max-width: 90px !important; max-height: 80px !important; margin-top: 0 !important; padding: 2px 6px !important; vertical-align: middle;">
							</a>
						</h1>
					</div>
					<div class="pbmit-header-text-box">

					</div>
					<div class="pbmit-header-info ml-auto d-flex align-items-center">
						<div class="pbmit-header-info-inner">
							<div class="pbmit-header-box pbmit-header-box-1">
								@php
									$phoneRaw = $generalSettings->contact_phone ?? '(000)123456789';
									$cleanRaw = preg_replace('/<br\s*\/?>/i', "\n", $phoneRaw);
									$phones = preg_split('/(?:\s*[\/,\n|]+\s*|\s+(?=\+)|\s+(?=[0-9]{10}))/', $cleanRaw);
									$phones = array_values(array_filter(array_map('trim', $phones)));
									$firstCleanPhone = count($phones) > 0 ? preg_replace('/[^0-9+]/', '', $phones[0]) : '';
								@endphp
								<span class="pbmit-header-box-icon">
									<a href="tel:{{ $firstCleanPhone ?: '123456789' }}"
										style="color: inherit; text-decoration: none;">
										<i class="pbmit-induyst-icon pbmit-induyst-icon-telephone"></i>
									</a>
								</span>
								<span class="pbmit-box-content">
									<span class="pbmit-header-box-title">Need to talk</span>
									<span class="pbmit-header-box-content"
										style="display: flex !important; flex-direction: column !important; justify-content: center; line-height: 1.25;">
										@if(count($phones) > 1)
											@foreach($phones as $phone)
												@php $cleanPhone = preg_replace('/[^0-9+]/', '', $phone); @endphp
												<a href="tel:{{ $cleanPhone }}" class="pbmit-header-phone-link"
													style="display: block !important; color: inherit; text-decoration: none; font-size: 14px; line-height: 1.35; white-space: nowrap;">
													{{ $phone }}
												</a>
											@endforeach
										@else
											<a href="tel:{{ $firstCleanPhone }}" class="pbmit-header-phone-link"
												style="display: block !important; color: inherit; text-decoration: none;">
												{{ $phones[0] ?? $phoneRaw }}
											</a>
										@endif
									</span>
								</span>
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
									<button type="button" class="closepanel" aria-label="Close menu">
										<span aria-hidden="true">&times;</span>
									</button>
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
											<ul class="pbmit-mega-menu-content"
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

																	$headerSettings = \Illuminate\Support\Facades\Storage::disk('local')->exists('header_settings.json') ? json_decode(\Illuminate\Support\Facades\Storage::disk('local')->get('header_settings.json'), true) : [];
																	$headerProductIds = $headerSettings['all_machines'] ?? [];

																	if (!empty($headerProductIds)) {
																		$idString = implode(',', $headerProductIds);
																		$navProducts = \App\Models\Product::whereIn('id', $headerProductIds)
																			->where('status', 'Active')
																			->orderByRaw("FIELD(id, {$idString})")
																			->get();
																	} else {
																		$standaloneNav = \App\Models\Product::where('status', 'Active')->where('is_visible', 1)
																			->where(function ($q) {
																				$q->whereNull('parent_id')->orWhere('parent_id', 0);
																			})->where('is_parent', false)->where('id', '!=', $otherId)->take(4)->get();
																		$parentNav = \App\Models\Product::where('status', 'Active')->where('is_visible', 1)
																			->where('is_parent', true)->where('id', '!=', $otherId)->take(3)->get();
																		$navProducts = $standaloneNav->merge($parentNav);
																	}
																@endphp
																@foreach($navProducts as $navProduct)
																	@php
																		$navUrl = route('product-details', ['slug' => $navProduct->slug]);
																	@endphp
																	<div
																		class="col-md-4 text-center {{ $loop->iteration > 3 ? 'pt-2' : '' }}">
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
																<div class="col-md-4 text-center d-xl-none pt-2">
																	<a href="{{ $otherProduct ? route('product-details', ['slug' => $otherProduct->slug]) : '/products' }}"
																		class="d-block"
																		style="padding: 0; text-decoration: none;">
																		<img src="{{ ($otherProduct && $otherProduct->image && file_exists(public_path('storage/' . $otherProduct->image))) ? asset('storage/' . $otherProduct->image) : asset('frontend/images/portfolio/portfolio-single-01.webp') }}"
																			class="img-fluid rounded w-100"
																			style="height: 100px; object-fit: contain;"
																			alt="{{ $otherProduct ? $otherProduct->title : 'Other Products' }}">
																		<span class="d-block fw-bold mt-2"
																			style="font-size: 14px; color: #333;">{{ $otherProduct ? $otherProduct->title : 'Other Products' }}</span>
																	</a>
																</div>
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
																		<h6 class="text-white mb-1 fw-bold mb-2">
																			{{ $otherProduct->title }}
																		</h6>
																		<a href="{{ route('product-details', ['slug' => $otherProduct->slug]) }}"
																			class="pbmit-btn pbmit-mega-view-all">
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
																			class="pbmit-btn pbmit-mega-view-all">
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

										@php
											$headerSettings = $headerSettings ?? (\Illuminate\Support\Facades\Storage::disk('local')->exists('header_settings.json') ? json_decode(\Illuminate\Support\Facades\Storage::disk('local')->get('header_settings.json'), true) : []);
											$hasBrochure = !empty($headerSettings['brochure_file']) && \Illuminate\Support\Facades\Storage::disk('public')->exists($headerSettings['brochure_file']);
											$brochureTitle = !empty($headerSettings['brochure_title']) ? $headerSettings['brochure_title'] : 'Brochure';
											$brochureUrl = $hasBrochure ? route('uploads.public', ['path' => $headerSettings['brochure_file']]) : null;

											$hasVideoFile = !empty($headerSettings['video_file']) && \Illuminate\Support\Facades\Storage::disk('public')->exists($headerSettings['video_file']);
											$hasVideoLink = !empty($headerSettings['video_link']);
											$hasVideo = $hasVideoFile || $hasVideoLink;
											$videoTitle = !empty($headerSettings['video_title']) ? $headerSettings['video_title'] : 'Watch Video';
											$videoUrl = $hasVideoFile ? route('uploads.public', ['path' => $headerSettings['video_file']]) : ($hasVideoLink ? $headerSettings['video_link'] : null);
										@endphp

										@if($hasBrochure)
											<li class="d-lg-none">
												<a href="{{ $brochureUrl }}" target="_blank" download
													class="text-danger fw-bold">
													<i class="fa fa-file-pdf-o me-1"></i> {{ $brochureTitle }}
												</a>
											</li>
										@endif
										@if($hasVideo)
											<li class="d-lg-none">
												<a href="{{ $videoUrl }}" target="_blank"
													class="text-warning fw-bold {{ $hasVideoLink ? 'pbmin-lightbox-video' : '' }}">
													<i class="fa fa-play-circle me-1"></i> {{ $videoTitle }}
												</a>
											</li>
										@endif
									</ul>
								</div>
							</nav>
						</div>

					</div>
					<div class="pbmit-right-box d-flex align-items-center">
						<style>
							.pbmit-header-action-buttons {
								display: flex;
								align-items: center;
								gap: 8px;
							}

							.pbmit-header-icon-btn {
								position: relative;
								display: inline-flex;
								align-items: center;
								justify-content: center;
								width: 54px;
								height: 54px;
								border-radius: 10px;
								border: none !important;
								outline: none !important;
								text-decoration: none !important;
								transition: all 0.3s ease;
								box-sizing: border-box;
								box-shadow: none !important;
							}

							/* White inner box icon holder matching "Get In Touch" */
							.pbmit-header-icon-btn .btn-icon-box {
								display: flex;
								align-items: center;
								justify-content: center;
								width: 44px;
								height: 44px;
								background-color: #ffffff;
								border-radius: 10px;
								border: none !important;
								transition: all 0.3s ease;
							}

							.pbmit-header-icon-btn.btn-brochure {
								background-color: #febd17;
							}

							.pbmit-header-icon-btn.btn-brochure .btn-icon-box i {
								color: #000000ff;
								font-size: 20px;
								transition: transform 0.3s ease;
							}

							.pbmit-header-icon-btn.btn-brochure:hover {
								background-color: #febd17;
								transform: translateY(-2px);
								box-shadow: #febd17 !important;
							}

							.pbmit-header-icon-btn.btn-brochure:hover .btn-icon-box i {
								transform: translateY(2px);
							}

							.pbmit-header-icon-btn.btn-video {
								background-color: var(--pbmit-global-color, #febd17);
							}

							.pbmit-header-icon-btn.btn-video .btn-icon-box i {
								color: var(--pbmit-blackish-color, #16222d);
								font-size: 18px;
								transition: transform 0.3s ease;
								margin-left: 2px;
							}

							.pbmit-header-icon-btn.btn-video:hover {
								background-color: #e5a70d;
								transform: translateY(-2px);
								box-shadow: 0 4px 12px rgba(254, 189, 23, 0.4) !important;
							}

							.pbmit-header-icon-btn.btn-video:hover .btn-icon-box i {
								transform: scale(1.15);
							}

							/* Custom CSS Tooltip - Always 100% Reliable */
							.pbmit-header-icon-btn .custom-tooltip {
								position: absolute;
								top: calc(100% + 10px);
								left: 50%;
								transform: translateX(-50%) translateY(5px);
								background-color: #16222d;
								color: #ffffff;
								padding: 5px 11px;
								border-radius: 6px;
								font-size: 12px;
								font-weight: 600;
								line-height: 1.3;
								white-space: nowrap;
								pointer-events: none;
								opacity: 0;
								visibility: hidden;
								transition: opacity 0.25s ease, transform 0.25s ease, visibility 0.25s;
								z-index: 999999;
								box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
							}

							.pbmit-header-icon-btn .custom-tooltip::before {
								content: '';
								position: absolute;
								bottom: 100%;
								left: 50%;
								transform: translateX(-50%);
								border-width: 5px;
								border-style: solid;
								border-color: transparent transparent #16222d transparent;
							}

							.pbmit-header-icon-btn:hover .custom-tooltip {
								opacity: 1;
								visibility: visible;
								transform: translateX(-50%) translateY(0);
							}

							@media (max-width: 991px) {
								.pbmit-header-action-buttons {
									display: none !important;
								}
							}
						</style>

						@if($hasBrochure || $hasVideo)
							<div class="pbmit-header-action-buttons me-3">
								@if($hasBrochure)
									<a href="{{ $brochureUrl }}" target="_blank" download
										class="pbmit-header-icon-btn btn-brochure">
										<span class="btn-icon-box">
											<i class="fa fa-file-pdf-o"></i>
										</span>
										<span class="custom-tooltip">{{ $brochureTitle }}</span>
									</a>
								@endif

								@if($hasVideo)
									<a href="{{ $videoUrl }}" target="_blank"
										class="pbmit-header-icon-btn btn-video {{ $hasVideoLink ? 'pbmin-lightbox-video' : '' }}">
										<span class="btn-icon-box">
											<i class="fa fa-play"></i>
										</span>
										<span class="custom-tooltip">{{ $videoTitle }}</span>
									</a>
								@endif
							</div>
						@endif
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