<!-- footer -->
@php
	$footerSettings = class_exists('App\Models\FooterSetting') ? \App\Models\FooterSetting::first() : null;
	$footerLinkUrl = function ($path) {
		$path = trim((string) $path);

		if ($path === '') {
			return '#';
		}

		if (
			\Illuminate\Support\Str::startsWith($path, [
				'http://',
				'https://',
				'mailto:',
				'tel:',
				'#',
			])
		) {
			return $path;
		}

		return url('/' . ltrim($path, '/'));
	};
@endphp
<footer class="site-footer pbmit-footer-style-1 pbmit-bg-color-blackish">
	<div class="pbmit-footer-big-area-wrapper">
		<div class="pbmit-footer-big-area">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12 col-lg-6 pbmit-footer-left">
						<h3>Pioneering a New Era of Steel working Excellence</h3>
					</div>
					<div class="col-md-12 col-lg-6 text-lg-end">
						<div class="pbmit-footer-logo">
							<img class="pbmit-main-logo" src="{{ asset('frontend/images/omkar-logo2.png') }}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="pbmit-footer-contact-area-wrapper">
		<div class="pbmit-footer-contact-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-4 pbmit-footer-contact-box">
						<span>{{ $generalSettings->contact_address ?? '2220 Prestonno R02, Hopkins, Hoofddorp(HD), UK' }}</span>
					</div>
					<div class="col-md-12 col-lg-4 pbmit-footer-contact-box">
						@if(isset($generalSettings->contact_email) && $generalSettings->contact_email)
							<span><a
									href="mailto:{{ $generalSettings->contact_email }}">{{ $generalSettings->contact_email }}</a></span>
						@else
							<span><a href="https://induyst-demo.pbminfotech.com/cdn-cgi/l/email-protection"
									class="__cf_email__"
									data-cfemail="3d5e5253495c5e497d58455c504d5158135e5250">[email&#160;protected]</a></span>
						@endif
					</div>
					<div class="col-md-12 col-lg-4 pbmit-footer-contact-box">
						<span>{{ $generalSettings->contact_phone ?? '+012 34-567-8901' }}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="pbmit-footer-widget-area">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-3 pbmit-footer-widget">
					<aside class="widget">
						<h2 class="widget-title">Our Company</h2>
						<ul class="menu">
							<li><a href="/about-us">About Us</a></li>
							<li><a href="/career">Careers</a></li>
						</ul>
					</aside>
				</div>
				<div class="col-md-6 col-lg-3 pbmit-footer-widget">
					<aside class="widget">
						<h2 class="widget-title">Our Products</h2>
						<ul class="menu">
							@php
								$quickLinks = [];
								if ($footerSettings && $footerSettings->quick_links) {
									$quickLinks = is_string($footerSettings->quick_links) ? json_decode($footerSettings->quick_links, true) : $footerSettings->quick_links;
								}
							@endphp
							@if(!empty($quickLinks))
								@foreach($quickLinks as $link)
									<li><a href="{{ $footerLinkUrl($link['url'] ?? '#') }}">{{ $link['title'] ?? '' }}</a></li>
								@endforeach
							@else
								<li><a href="/service-details">Machine Analysis</a></li>
								<li><a href="/service-details">Comprehensive Logits</a></li>
								<li><a href="/service-details">Plant Maintenance</a></li>
								<li><a href="/service-details">Maintenance & Repairing</a></li>
							@endif
						</ul>
					</aside>
				</div>
				<div class="col-md-6 col-lg-3 pbmit-footer-widget">
					<aside class="widget">
						<h2 class="widget-title">Other Products</h2>
						<ul class="menu">
							@php
								$otherLinks = [];
								if ($footerSettings && $footerSettings->other_links) {
									$otherLinks = is_string($footerSettings->other_links) ? json_decode($footerSettings->other_links, true) : $footerSettings->other_links;
								}
							@endphp
							@if(!empty($otherLinks))
								@foreach($otherLinks as $link)
									<li><a href="{{ $footerLinkUrl($link['url'] ?? '#') }}">{{ $link['title'] ?? '' }}</a></li>
								@endforeach
							@else
								<li><a href="#">Band Saw Blade</a></li>
								<li><a href="#">Board Edger</a></li>
								<li><a href="#">Square Timber Multi Blade Saw</a></li>
							@endif
						</ul>
					</aside>
				</div>
				<div class="col-md-6 col-lg-3 pbmit-footer-widget">
					<aside class="widget">
						<h2 class="widget-title">Media</h2>
						<ul class="menu">
							<li><a href="/blogs">News</a></li>
							<li><a href="/exhibition">Exhibitions</a></li>
							<li><a href="/gallery">Image Gallery</a></li>
						</ul>
					</aside>
				</div>
			</div>
		</div>
	</div>
	<div class="pbmit-footer-text-area">
		<div class="container">
			<div class="pbmit-footer-text-inner">
				<div class="row">
					<div class="col-md-6">
						<div class="pbmit-footer-copyright-text-area"> Copyright © 2025
							<a href="#">Induyst</a>, All Rights Reserved.
						</div>
					</div>
					<div class="col-md-6">
						<div class=" pbmit-footer-social-area">
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
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- footer End -->

<!-- Search Box Start Here -->
<div class="pbmit-header-search-form">
	<div class="pbmit-search-overlay"></div>
	<div class="pbmit-header-search-form-wrapper">
		<div class="pbmit-search-close">
			<svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="28.163" height="28.163"
				viewBox="0 0 26.163 26.163">
				<rect width="36" height="1" transform="translate(0.707) rotate(45)"></rect>
				<rect width="36" height="1" transform="translate(0 25.456) rotate(-45)"></rect>
			</svg>
		</div>
		<form role="search" method="get" class="search-form"
			action="https://induyst-demo.pbminfotech.com/html-demo/index.html">
			<input type="search" id="search-form-686df462a6c62" class="search-field" placeholder="Search …" value=""
				name="s">
			<button type="submit" class="search-submit " title="Search"></button>
			<div class="pbmit-search-line"></div>
		</form>
	</div>
</div>
<!-- Search Box End Here -->

<!-- Scroll To Top -->
<div class="pbmit-backtotop">
	<div class="pbmit-arrow">
		<i class="pbmit-base-icon-up-open-big"></i>
	</div>
	<div class="pbmit-hover-arrow">
		<i class="pbmit-base-icon-up-open-big"></i>
	</div>
</div>
<!-- Scroll To Top End -->

<!-- WhatsApp Floating Button -->
@php
	$waNumber = '910000000000';
	if (isset($generalSettings->contact_phone) && $generalSettings->contact_phone) {
		$waNumber = preg_replace('/[^0-9]/', '', $generalSettings->contact_phone);
	}
@endphp
<a href="https://wa.me/{{ $waNumber }}" class="pbmit-whatsapp-btn" target="_blank" rel="noopener noreferrer">
	<i class="fa fa-whatsapp"></i>
</a>

<style>
	.pbmit-whatsapp-btn {
		position: fixed;
		bottom: 15px;
		right: 20px;
		width: 50px;
		height: 50px;
		border-radius: 50%;
		background-color: #25d366;
		color: #fff;
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 28px;
		box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
		z-index: 9999999;
		transition: all 0.3s ease-in-out;
	}

	.pbmit-whatsapp-btn:hover {
		transform: scale(1.1);
		box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.4);
		color: #fff;
	}

	/* Shift back-to-top button above the WhatsApp button */
	.pbmit-backtotop.active {
		bottom: 75px !important;
	}

	.pbmit-backtotop:hover {
		bottom: 80px !important;
	}
</style>