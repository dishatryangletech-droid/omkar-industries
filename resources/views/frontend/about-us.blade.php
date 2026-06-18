<x-layouts.app>
	<div>
		<!-- Page Wrapper -->
		<div class="page-wrapper" id="page">

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
									<h1 class="pbmit-tbar-title"> About Us</h1>
								</div>
							</div>
							<div class="pbmit-breadcrumb">
								<div class="pbmit-breadcrumb-inner">
									<span>
										<a title="" href="#" class="home"><span>Induyst</span></a>
									</span>
									<span class="sep"></span>
									<span><span class="post-root post post-post current-item"> About Us</span></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Title Bar End-->

			<!-- Page Content -->
			<div class="page-content">

				<!-- About Start -->
				<section class="section-lgt">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-xl-5 about-two-left-col">
								<div class="about-two-img"></div>
							</div>
							<div class="col-md-12 col-xl-7 about-two-right-col">
								<div class="about-two-content">
									<div class="pbmit-heading-subheading">
										<h4 class="pbmit-subtitle">{{ $aboutUs->subtitle ?? 'Why Choose us' }}</h4>
										<h2 class="pbmit-title">
											{{ $aboutUs->title ?? 'We work for you since 1980 Industrial around the world.' }}
										</h2>
									</div>
									<div class="inner-box">
										<div class="row">
											<div class="col-md-7">
												<p>{!! $aboutUs->description ?? 'Induyst is a full-service manufacturing company with 15 years of experience serving industries such as automotive, Our mission is to deliver products that meet the highest standards of quality and performance.' !!}
												</p>
												<div class="list-group-wrap">
													<ul class="list-group">
														@php
															$checkmarks = [
																$aboutUs->subtitle_text1 ?? 'Reliable Guarantees You Can Trust',
																$aboutUs->subtitle_text2 ?? 'Commitment to Eco-Friendly Materials',
																$aboutUs->subtitle_text3 ?? '',
																$aboutUs->subtitle_text4 ?? ''
															];
														@endphp
														@foreach($checkmarks as $checkmark)
															@if(trim($checkmark) !== '')
																<li class="list-group-item">
																	<span class="pbmit-icon-list-icon">
																		<i
																			class="pbmit-induyst-icon pbmit-induyst-icon-check"></i>
																	</span>
																	<span class="pbmit-icon-list-text">{{ $checkmark }}</span>
																</li>
															@endif
														@endforeach
													</ul>
												</div>
												<a href="{{ $aboutUs->btn_link ?? '/about-us' }}"
													class="pbmit-btn blackish">
													<span class="pbmit-button-content-wrapper">
														<span class="pbmit-button-icon">
															<i class="pbmit-induyst-icon pbmit-induyst-icon-next"></i>
														</span>
														<span
															class="pbmit-button-text">{{ $aboutUs->btn_title ?? 'Discover More' }}</span>
													</span>
												</a>
											</div>
											<div class="col-md-5">
												<div class="swiper-slider pbmit-column-one mt-md-0 mt-5"
													data-autoplay="false" data-loop="true" data-dots="false"
													data-arrows="true" data-columns="1" data-margin="30"
													data-effect="slide">
													<div class="swiper-wrapper">
														<!-- Slide1 -->
														<article class="pbmit-miconheading-style-5 swiper-slide">
															<div class="pbmit-ihbox-style-5">
																<div class="pbmit-ihbox-box">
																	<div class="pbmit-ihbox-icon">
																		<div
																			class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
																			<svg enable-background="new 0 0 55 55"
																				viewBox="0 0 55 55"
																				xmlns="http://www.w3.org/2000/svg">
																				<g>
																					<path
																						d="m29.1335468 10.5195313c-8.7938538-.9580631-15.9299316 5.9284649-15.9299316 14.2200317 0 4.25 1.869873 8.2600098 5.1398926 10.9899902 2.0400391 1.6900024 3.2800293 4.0200195 3.4899902 6.4799805-.9099121.0900269-1.6199951.8699951-1.6199951 1.8000488v2.4599609c0 1 .8199463 1.8200073 1.8199463 1.8200073h.880127l.8898926 1.75c.4699707.9000244 1.3900146 1.460022 2.4000244 1.460022h2.5899658c1.0200195 0 1.9400635-.5599976 2.4000244-1.460022l.9000225-1.75h.8699951c1 0 1.8199463-.8200073 1.8199463-1.8200073v-2.4599609c0-.9300537-.6999512-1.7000122-1.5998535-1.8000488.2099609-2.4599609 1.4399414-4.7799683 3.4699707-6.4699707 3.8199463-3.1900024 5.6899414-8.0400391 5.0200195-13-.8701172-6.3699951-6.1501465-11.5100098-12.5400372-12.2200317zm.7199707 38.830017c-.1999512.4000244-.6099854.6500244-1.0600586.6500244h-2.5899658c-.4499512 0-.8599854-.25-1.0599365-.6500244l-.5500488-1.0599976h5.8100586zm5.8399639-14.7700195c-2.3699951 1.9800415-3.7999249 4.7200317-4.0198956 7.6100464h-8.3400878c-.2099609-2.9000244-1.6499023-5.6400146-4.0200195-7.6199951-2.9299316-2.4400024-4.6098633-6.0200195-4.6098633-9.8300171 0-7.4488621 6.4384766-13.6078138 14.2598877-12.7200317 5.7200909.6300049 10.4400616 5.2200317 11.2200909 10.9200439.6098632 4.4400024-1.0700684 8.789978-4.4901124 11.6399536z" />
																					<path
																						d="m27.5035419 16.9095459c-4.3399658 0-7.8599854 3.5200195-7.8599854 7.8599854 0 4.3400269 3.5200195 7.8600464 7.8599854 7.8600464s7.8499737-3.5200195 7.8499737-7.8600464c0-4.3399659-3.5100078-7.8599854-7.8499737-7.8599854zm3.0499268 6.5700073-3.6398926 3.6400146c-.275486.2948036-.7858067.2937374-1.0600586 0l-1.4100342-1.4100342c-.289917-.289978-.289917-.7699585 0-1.0599976.2900391-.289978.7700195-.289978 1.0600586 0l.8800049.8800049 3.1099854-3.1099854c.289917-.289978.7698975-.289978 1.0599365 0 .3000488.2899782.3000488.7700197 0 1.0599977z" />
																					<path
																						d="m27.5000019 7.4515991c.4140625 0 .75-.3359375.75-.75v-2.4511719c0-.4140625-.3359375-.75-.75-.75s-.75.3359375-.75.75v2.4511719c0 .4140625.3359375.75.75.75z" />
																					<path
																						d="m16.2714863 10.593689c.2445164.3354998.713129.4087811 1.0478516.1660156.3349609-.2436523.4091797-.7124023.1660156-1.0478516l-1.440918-1.9833984c-.2436523-.3334961-.7114258-.4086914-1.0478516-.1660156-.3349609.2436523-.4091797.7124023-.1660156 1.0478516z" />
																					<path
																						d="m10.5459003 18.4745483-2.331543-.7573242c-.3945313-.1274414-.8173828.0878906-.9453125.4814453-.1279297.394043.0878906.8173828.4814453.9453125 2.4485273.7817211 2.3529682.7939453 2.5634766.7939453.850441 0 1.0403567-1.200592.2319336-1.4633789z" />
																					<path
																						d="m10.0820332 29.6430054-2.331543.7573242c-.8078146.2625904-.6189566 1.4633789.2319336 1.4633789.2201662 0 .1981926-.0388012 2.5634766-.7939453.3935547-.1279297.609375-.5512695.4814453-.9453125-.128418-.3935547-.5493164-.6088867-.9453125-.4814453z" />
																					<path
																						d="m47.2490234 30.4003296-2.3320313-.7573242c-.3916016-.1259766-.8168945.0878906-.9448242.4819336-.1279297.3935547.0878906.8168945.4819336.9448242l2.3320313.7573242c.3898964.1266537.8157921-.0844307.9448242-.4819336.1279297-.3935547-.0878906-.8168945-.4819336-.9448242z" />
																					<path
																						d="m44.9169922 19.9013062 2.3320313-.7573242c.394043-.1279297.6098633-.5512695.4819336-.9448242-.128418-.3945313-.5527344-.6108398-.9448242-.4819336l-2.3320313.7573242c-.394043.1279297-.6098633.5512695-.4819336.9448242.1290779.3976268.5550575.6085472.9448242.4819336z" />
																					<path
																						d="m38.7280273 10.593689 1.4414063-1.9833984c.2431641-.3349609.1689453-.8041992-.1660156-1.0478516-.3364258-.2441406-.8041992-.1699219-1.0478516.1660156l-1.4414062 1.9833984c-.2431641.3349609-.1689453.8041992.1660156 1.0478516.334629.2426977.8038101.1696463 1.0478515-.1660156z" />
																				</g>
																			</svg>
																		</div>
																	</div>
																	<div class="pbmit-ihbox-contents">
																		<h2 class="pbmit-element-title">
																			{{ $vision->sub_content_title ?? 'Our Vision' }}
																		</h2>
																		<div class="pbmit-heading-desc">
																			{{ $vision->sub_content_description ?? 'Building long-term partnerships through responsiveness and reliability.' }}
																		</div>
																	</div>
																</div>
															</div>
														</article>
														<!-- Slide2 -->
														<article class="pbmit-miconheading-style-5 swiper-slide">
															<div class="pbmit-ihbox-style-5">
																<div class="pbmit-ihbox-box">
																	<div class="pbmit-ihbox-icon">
																		<div
																			class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
																			<svg enable-background="new 0 0 55 55"
																				viewBox="0 0 55 55"
																				xmlns="http://www.w3.org/2000/svg">
																				<g>
																					<path
																						d="m29.1335468 10.5195313c-8.7938538-.9580631-15.9299316 5.9284649-15.9299316 14.2200317 0 4.25 1.869873 8.2600098 5.1398926 10.9899902 2.0400391 1.6900024 3.2800293 4.0200195 3.4899902 6.4799805-.9099121.0900269-1.6199951.8699951-1.6199951 1.8000488v2.4599609c0 1 .8199463 1.8200073 1.8199463 1.8200073h.880127l.8898926 1.75c.4699707.9000244 1.3900146 1.460022 2.4000244 1.460022h2.5899658c1.0200195 0 1.9400635-.5599976 2.4000244-1.460022l.9000225-1.75h.8699951c1 0 1.8199463-.8200073 1.8199463-1.8200073v-2.4599609c0-.9300537-.6999512-1.7000122-1.5998535-1.8000488.2099609-2.4599609 1.4399414-4.7799683 3.4699707-6.4699707 3.8199463-3.1900024 5.6899414-8.0400391 5.0200195-13-.8701172-6.3699951-6.1501465-11.5100098-12.5400372-12.2200317zm.7199707 38.830017c-.1999512.4000244-.6099854.6500244-1.0600586.6500244h-2.5899658c-.4499512 0-.8599854-.25-1.0599365-.6500244l-.5500488-1.0599976h5.8100586zm5.8399639-14.7700195c-2.3699951 1.9800415-3.7999249 4.7200317-4.0198956 7.6100464h-8.3400878c-.2099609-2.9000244-1.6499023-5.6400146-4.0200195-7.6199951-2.9299316-2.4400024-4.6098633-6.0200195-4.6098633-9.8300171 0-7.4488621 6.4384766-13.6078138 14.2598877-12.7200317 5.7200909.6300049 10.4400616 5.2200317 11.2200909 10.9200439.6098632 4.4400024-1.0700684 8.789978-4.4901124 11.6399536z" />
																					<path
																						d="m27.5035419 16.9095459c-4.3399658 0-7.8599854 3.5200195-7.8599854 7.8599854 0 4.3400269 3.5200195 7.8600464 7.8599854 7.8600464s7.8499737-3.5200195 7.8499737-7.8600464c0-4.3399659-3.5100078-7.8599854-7.8499737-7.8599854zm3.0499268 6.5700073-3.6398926 3.6400146c-.275486.2948036-.7858067.2937374-1.0600586 0l-1.4100342-1.4100342c-.289917-.289978-.289917-.7699585 0-1.0599976.2900391-.289978.7700195-.289978 1.0600586 0l.8800049.8800049 3.1099854-3.1099854c.289917-.289978.7698975-.289978 1.0599365 0 .3000488.2899782.3000488.7700197 0 1.0599977z" />
																					<path
																						d="m27.5000019 7.4515991c.4140625 0 .75-.3359375.75-.75v-2.4511719c0-.4140625-.3359375-.75-.75-.75s-.75.3359375-.75.75v2.4511719c0 .4140625.3359375.75.75.75z" />
																					<path
																						d="m16.2714863 10.593689c.2445164.3354998.713129.4087811 1.0478516.1660156.3349609-.2436523.4091797-.7124023.1660156-1.0478516l-1.440918-1.9833984c-.2436523-.3334961-.7114258-.4086914-1.0478516-.1660156-.3349609.2436523-.4091797.7124023-.1660156 1.0478516z" />
																					<path
																						d="m10.5459003 18.4745483-2.331543-.7573242c-.3945313-.1274414-.8173828.0878906-.9453125.4814453-.1279297.394043.0878906.8173828.4814453.9453125 2.4485273.7817211 2.3529682.7939453 2.5634766.7939453.850441 0 1.0403567-1.200592.2319336-1.4633789z" />
																					<path
																						d="m10.0820332 29.6430054-2.331543.7573242c-.8078146.2625904-.6189566 1.4633789.2319336 1.4633789.2201662 0 .1981926-.0388012 2.5634766-.7939453.3935547-.1279297.609375-.5512695.4814453-.9453125-.128418-.3935547-.5493164-.6088867-.9453125-.4814453z" />
																					<path
																						d="m47.2490234 30.4003296-2.3320313-.7573242c-.3916016-.1259766-.8168945.0878906-.9448242.4819336-.1279297.3935547.0878906.8168945.4819336.9448242l2.3320313.7573242c.3898964.1266537.8157921-.0844307.9448242-.4819336.1279297-.3935547-.0878906-.8168945-.4819336-.9448242z" />
																					<path
																						d="m44.9169922 19.9013062 2.3320313-.7573242c.394043-.1279297.6098633-.5512695.4819336-.9448242-.128418-.3945313-.5527344-.6108398-.9448242-.4819336l-2.3320313.7573242c-.394043.1279297-.6098633.5512695-.4819336.9448242.1290779.3976268.5550575.6085472.9448242.4819336z" />
																					<path
																						d="m38.7280273 10.593689 1.4414063-1.9833984c.2431641-.3349609.1689453-.8041992-.1660156-1.0478516-.3364258-.2441406-.8041992-.1699219-1.0478516.1660156l-1.4414062 1.9833984c-.2431641.3349609-.1689453.8041992.1660156 1.0478516.334629.2426977.8038101.1696463 1.0478515-.1660156z" />
																				</g>
																			</svg>
																		</div>
																	</div>
																	<div class="pbmit-ihbox-contents">
																		<h2 class="pbmit-element-title">
																			{{ $mission->sub_content_title ?? 'Our Solutions' }}
																		</h2>
																		<div class="pbmit-heading-desc">
																			{{ $mission->sub_content_description ?? 'Extensive, flexible services that tailored to address changing industry.' }}
																		</div>
																	</div>
																</div>
															</div>
														</article>
														<!-- Slide3 -->
														<article class="pbmit-miconheading-style-5 swiper-slide">
															<div class="pbmit-ihbox-style-5">
																<div class="pbmit-ihbox-box">
																	<div class="pbmit-ihbox-icon">
																		<div
																			class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
																			<svg enable-background="new 0 0 55 55"
																				viewBox="0 0 55 55"
																				xmlns="http://www.w3.org/2000/svg">
																				<g>
																					<path
																						d="m29.1335468 10.5195313c-8.7938538-.9580631-15.9299316 5.9284649-15.9299316 14.2200317 0 4.25 1.869873 8.2600098 5.1398926 10.9899902 2.0400391 1.6900024 3.2800293 4.0200195 3.4899902 6.4799805-.9099121.0900269-1.6199951.8699951-1.6199951 1.8000488v2.4599609c0 1 .8199463 1.8200073 1.8199463 1.8200073h.880127l.8898926 1.75c.4699707.9000244 1.3900146 1.460022 2.4000244 1.460022h2.5899658c1.0200195 0 1.9400635-.5599976 2.4000244-1.460022l.9000225-1.75h.8699951c1 0 1.8199463-.8200073 1.8199463-1.8200073v-2.4599609c0-.9300537-.6999512-1.7000122-1.5998535-1.8000488.2099609-2.4599609 1.4399414-4.7799683 3.4699707-6.4699707 3.8199463-3.1900024 5.6899414-8.0400391 5.0200195-13-.8701172-6.3699951-6.1501465-11.5100098-12.5400372-12.2200317zm.7199707 38.830017c-.1999512.4000244-.6099854.6500244-1.0600586.6500244h-2.5899658c-.4499512 0-.8599854-.25-1.0599365-.6500244l-.5500488-1.0599976h5.8100586zm5.8399639-14.7700195c-2.3699951 1.9800415-3.7999249 4.7200317-4.0198956 7.6100464h-8.3400878c-.2099609-2.9000244-1.6499023-5.6400146-4.0200195-7.6199951-2.9299316-2.4400024-4.6098633-6.0200195-4.6098633-9.8300171 0-7.4488621 6.4384766-13.6078138 14.2598877-12.7200317 5.7200909.6300049 10.4400616 5.2200317 11.2200909 10.9200439.6098632 4.4400024-1.0700684 8.789978-4.4901124 11.6399536z" />
																					<path
																						d="m27.5035419 16.9095459c-4.3399658 0-7.8599854 3.5200195-7.8599854 7.8599854 0 4.3400269 3.5200195 7.8600464 7.8599854 7.8600464s7.8499737-3.5200195 7.8499737-7.8600464c0-4.3399659-3.5100078-7.8599854-7.8499737-7.8599854zm3.0499268 6.5700073-3.6398926 3.6400146c-.275486.2948036-.7858067.2937374-1.0600586 0l-1.4100342-1.4100342c-.289917-.289978-.289917-.7699585 0-1.0599976.2900391-.289978.7700195-.289978 1.0600586 0l.8800049.8800049 3.1099854-3.1099854c.289917-.289978.7698975-.289978 1.0599365 0 .3000488.2899782.3000488.7700197 0 1.0599977z" />
																					<path
																						d="m27.5000019 7.4515991c.4140625 0 .75-.3359375.75-.75v-2.4511719c0-.4140625-.3359375-.75-.75-.75s-.75.3359375-.75.75v2.4511719c0 .4140625.3359375.75.75.75z" />
																					<path
																						d="m16.2714863 10.593689c.2445164.3354998.713129.4087811 1.0478516.1660156.3349609-.2436523.4091797-.7124023.1660156-1.0478516l-1.440918-1.9833984c-.2436523-.3334961-.7114258-.4086914-1.0478516-.1660156-.3349609.2436523-.4091797.7124023-.1660156 1.0478516z" />
																					<path
																						d="m10.5459003 18.4745483-2.331543-.7573242c-.3945313-.1274414-.8173828.0878906-.9453125.4814453-.1279297.394043.0878906.8173828.4814453.9453125 2.4485273.7817211 2.3529682.7939453 2.5634766.7939453.850441 0 1.0403567-1.200592.2319336-1.4633789z" />
																					<path
																						d="m10.0820332 29.6430054-2.331543.7573242c-.8078146.2625904-.6189566 1.4633789.2319336 1.4633789.2201662 0 .1981926-.0388012 2.5634766-.7939453.3935547-.1279297.609375-.5512695.4814453-.9453125-.128418-.3935547-.5493164-.6088867-.9453125-.4814453z" />
																					<path
																						d="m47.2490234 30.4003296-2.3320313-.7573242c-.3916016-.1259766-.8168945.0878906-.9448242.4819336-.1279297.3935547.0878906.8168945.4819336.9448242l2.3320313.7573242c.3898964.1266537.8157921-.0844307.9448242-.4819336.1279297-.3935547-.0878906-.8168945-.4819336-.9448242z" />
																					<path
																						d="m44.9169922 19.9013062 2.3320313-.7573242c.394043-.1279297.6098633-.5512695.4819336-.9448242-.128418-.3945313-.5527344-.6108398-.9448242-.4819336l-2.3320313.7573242c-.394043.1279297-.6098633.5512695-.4819336.9448242.1290779.3976268.5550575.6085472.9448242.4819336z" />
																					<path
																						d="m38.7280273 10.593689 1.4414063-1.9833984c.2431641-.3349609.1689453-.8041992-.1660156-1.0478516-.3364258-.2441406-.8041992-.1699219-1.0478516.1660156l-1.4414062 1.9833984c-.2431641.3349609-.1689453.8041992.1660156 1.0478516.334629.2426977.8038101.1696463 1.0478515-.1660156z" />
																				</g>
																			</svg>
																		</div>
																	</div>
																	<div class="pbmit-ihbox-contents">
																		<h2 class="pbmit-element-title">
																			{{ $goal->sub_content_title ?? 'Our Question' }}
																		</h2>
																		<div class="pbmit-heading-desc">
																			{{ $goal->sub_content_description ?? 'What key challenges can we solve together to drive your business?' }}
																		</div>
																	</div>
																</div>
															</div>
														</article>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- About End -->

				<!-- Fid Start -->
				<section class="section-lg fade-section">
					<div class="container">
						@php
							$stat1 = $aboutUs->subtitle_count1 ?? '92%';
							$stat1Num = preg_replace('/[^0-9]/', '', $stat1);
							$stat1Suffix = preg_replace('/[0-9]/', '', $stat1);

							$stat2 = $aboutUs->subtitle_count2 ?? '85%';
							$stat2Num = preg_replace('/[^0-9]/', '', $stat2);
							$stat2Suffix = preg_replace('/[0-9]/', '', $stat2);

							$stat3 = $aboutUs->subtitle_count3 ?? '90%';
							$stat3Num = preg_replace('/[^0-9]/', '', $stat3);
							$stat3Suffix = preg_replace('/[0-9]/', '', $stat3);
						@endphp
						<div class="row">
							<div class="col-md-6 col-xl-4 pbmit-fid-style-2-progress-top">
								<div class="pbminfotech-ele-fid pbminfotech-ele-fid-style-2">
									<div class="pbmit-fld-contents">
										<div class="pbmit-fld-wrap">
											<div class="pbmit-fid-inner">
												<span class="pbmit-fid-before"></span>
												<span class="pbmit-number-rotate numinate"
													data-appear-animation="animateDigits" data-from="0"
													data-to="{{ $stat1Num ?: '0' }}" data-interval="5" data-before=""
													data-before-style="" data-after=""
													data-after-style="">{{ $stat1Num ?: '0' }}</span>
												<span class="pbmit-fid"><span>{{ $stat1Suffix }}</span></span>
											</div>
											<h2 class="pbmit-fid-title"></h2>
											<div class="pbmit-heading-desc">
												{{ $aboutUs->subtitle_dsc1 ?? 'They are in a job related to their field of study' }}
											</div>
										</div>
									</div>
									<div class="pbmit-progressbar">
										<div class="pbmit-progress-wrapper">
											<div class="pbmit-progress-bar" data-max="92">1</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-xl-4 mt-md-0 mt-4 pbmit-fid-style-2-progress-top">
								<div class="pbminfotech-ele-fid pbminfotech-ele-fid-style-2">
									<div class="pbmit-fld-contents">
										<div class="pbmit-fld-wrap">
											<div class="pbmit-fid-inner">
												<span class="pbmit-fid-before"></span>
												<span class="pbmit-number-rotate numinate"
													data-appear-animation="animateDigits" data-from="0"
													data-to="{{ $stat2Num ?: '0' }}" data-interval="5" data-before=""
													data-before-style="" data-after=""
													data-after-style="">{{ $stat2Num ?: '0' }}</span>
												<span class="pbmit-fid"><span>{{ $stat2Suffix }}</span></span>
											</div>
											<h2 class="pbmit-fid-title"></h2>
											<div class="pbmit-heading-desc">
												{{ $aboutUs->subtitle_dsc2 ?? 'Achieved career growth within their sector industry.' }}
											</div>
										</div>
									</div>
									<div class="pbmit-progressbar">
										<div class="pbmit-progress-wrapper">
											<div class="pbmit-progress-bar" data-max="92">1</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-xl-4 mt-xl-0 mt-md-5 mt-4 pbmit-fid-style-2-progress-top">
								<div class="pbminfotech-ele-fid pbminfotech-ele-fid-style-2">
									<div class="pbmit-fld-contents">
										<div class="pbmit-fld-wrap">
											<div class="pbmit-fid-inner">
												<span class="pbmit-fid-before"></span>
												<span class="pbmit-number-rotate numinate"
													data-appear-animation="animateDigits" data-from="0"
													data-to="{{ $stat3Num ?: '0' }}" data-interval="5" data-before=""
													data-before-style="" data-after=""
													data-after-style="">{{ $stat3Num ?: '0' }}</span>
												<span class="pbmit-fid"><span>{{ $stat3Suffix }}</span></span>
											</div>
											<h2 class="pbmit-fid-title"></h2>
											<div class="pbmit-heading-desc">
												{{ $aboutUs->subtitle_dsc3 ?? 'Gained experience through real-world project.' }}
											</div>
										</div>
									</div>
									<div class="pbmit-progressbar">
										<div class="pbmit-progress-wrapper">
											<div class="pbmit-progress-bar" data-max="92">1</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- Fid End -->

				<!-- Business Specifications Start -->
				<section class="section-md" style="padding-bottom: 80px;">
					<div class="container">
						<div class="pbmit-heading-subheading text-center">
							<h4 class="pbmit-subtitle">Business Information</h4>
							<h2 class="pbmit-title">Business Specifications</h2>
						</div>
						@php
							$iconMap = [
								'Business Type' => 'fa-briefcase',
								'No. of Employees' => 'fa-users',
								'Year of Establishment' => 'fa-calendar',
								'Annual Turnover' => 'fa-line-chart',
								'Banker' => 'fa-university',
								'OEM Facility' => 'fa-cogs',
								'Capital in Dollars' => 'fa-usd',
								'Export Percentage' => 'fa-percent',
								'No. of Engineers' => 'fa-wrench',
								'No. of Production Lines' => 'fa-building',
								'Warehousing Facility' => 'fa-cubes',
								'No. of Designers' => 'fa-paint-brush',
								'No. of Production Units' => 'fa-building',
								'Export Markets' => 'fa-globe',
							];
							$defaultSpecs = [
								'Business Type' => 'Manufacturer, Supplier, Trader and Exporter',
								'No. of Employees' => '05',
								'Year of Establishment' => '1977',
								'Annual Turnover' => 'INR 85 Lakhs',
								'Banker' => 'Canara Bank',
								'OEM Facility' => 'Yes',
								'Warehousing Facility' => 'Yes',
								'Capital in Dollars' => 'INR 85 Lakhs',
								'Export Percentage' => '50%',
								'No. of Engineers' => '02',
								'No. of Designers' => '01',
								'No. of Production Units' => '01',
								'Export Markets' => 'US and Africa'
							];
							$specs = $aboutUs->business_specs ?? $defaultSpecs;
							if (empty($specs))
								$specs = $defaultSpecs;
						@endphp
						<div class="row mt-5 justify-content-center">
							@foreach($specs as $key => $val)
								@if(!empty($val))
									<div class="col-lg-4 col-md-6 col-sm-12 mb-4">
										<div class="pbmit-spec-card">
											<div class="pbmit-spec-icon-wrapper">
												<div class="pbmit-spec-icon">
													<i class="fa {{ $iconMap[$key] ?? 'fa-check-circle' }}"></i>
												</div>
											</div>
											<div class="pbmit-spec-content">
												<h4 class="pbmit-spec-title">{{ $key }}</h4>
												<p class="pbmit-spec-value">{{ $val }}</p>
											</div>
										</div>
									</div>
								@endif
							@endforeach
						</div>
					</div>
				</section>

				<style>
					.pbmit-spec-card {
						background: #fff;
						border: 1px solid rgba(0, 0, 0, 0.05);
						border-radius: 8px;
						padding: 30px 25px;
						height: 100%;
						display: flex;
						align-items: flex-start;
						transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
						box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
					}

					.pbmit-spec-card:hover {
						transform: translateY(-5px);
						border-color: var(--pbmit-global-color, #ffc34e);
						box-shadow: 0 12px 20px rgba(0, 0, 0, 0.05);
					}

					.pbmit-spec-icon-wrapper {
						margin-right: 20px;
						flex-shrink: 0;
					}

					.pbmit-spec-icon {
						width: 50px;
						height: 50px;
						border-radius: 50%;
						background-color: rgba(255, 195, 78, 0.1);
						color: var(--pbmit-global-color, #ffc34e);
						display: flex;
						align-items: center;
						justify-content: center;
						font-size: 20px;
						transition: all 0.3s ease;
					}

					.pbmit-spec-card:hover .pbmit-spec-icon {
						background-color: var(--pbmit-global-color, #ffc34e);
						color: #fff;
					}

					.pbmit-spec-content {
						flex-grow: 1;
					}

					.pbmit-spec-title {
						font-size: 16px;
						font-weight: 600;
						margin-bottom: 8px;
						color: var(--pbmit-blackish-color, #16222d);
						text-transform: uppercase;
						letter-spacing: 0.5px;
					}

					.pbmit-spec-value {
						font-size: 14px;
						color: #697687;
						margin: 0;
						line-height: 1.5;
					}
				</style>
				<!-- Business Specifications End -->

				<!-- Video Start -->
				<section class="video-section-two pbmit-bg-color-blackish">
					<div class="container-fluid p-0">
						<div class="video-play-bg">
							<div class="row align-items-center">
								<div class="col-md-6 left-col">
									<div class="pbmit-custom-heading">
										<h2 class="pbmit-title">Serving with expertise in industries as one of World’s
											leading Corporation!</h2>
									</div>
								</div>
								<div class="col-md-6 right-col">
									<div class="text-md-end mt-md-0 mt-4">
										<a href="https://www.youtube.com/watch?v=x36EQP2og-k"
											class="pbmit-video-play-btn pbmin-lightbox-video">
											<svg aria-hidden="true" class="e-font-icon-svg e-fas-play"
												viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
												<path
													d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z">
												</path>
											</svg>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="video-bottom-area mt-4 mt-xl-0">
							<div class="row">
								<div class="col-md-12 col-xl-8 mb-5 mb-xl-0">
									<div class="ps-xl-4">
										<div class="pbmit-heading-subheading text-center text-xl-start">
											<h4 class="pbmit-subtitle" style="text-transform: uppercase;">OUR SERVICE
												PROVIDE IN AREA</h4>
										</div>
										<div class="d-flex flex-wrap gap-3 align-items-center justify-content-center justify-content-xl-start mt-4"
											style="width:980px;">
											@foreach(\App\Models\Client::where('status', 'Active')->orderBy('name', 'asc')->get() as $client)
												<div class="text-center" style="width: 55px;">
													<div style="height: 35px; display: flex; align-items: center; justify-content: center;"
														class="mb-2">
														@php
															$iconUrl = asset('storage/' . $client->icon);
															if (!empty($client->icon) && filter_var($client->icon, FILTER_VALIDATE_URL)) {
																$iconUrl = $client->icon;
															}
														@endphp
														<img src="{{ $iconUrl }}" class="img-fluid"
															style="max-height: 100%; max-width: 100%; object-fit: contain; filter: drop-shadow(0px 2px 4px rgba(0,0,0,0.3));"
															alt="{{ $client->name }}">
													</div>
													<div
														style="font-size: 10px; line-height: 1.2; color: rgba(255, 255, 255, 0.8); font-weight: 500;">
														{{ $client->name }}
													</div>
												</div>
											@endforeach
										</div>
									</div>
								</div>
								<div class="col-md-12 col-xl-4">
									<div class="pbmit-heading-subheading text-center text-xl-start">
										<h4 class="pbmit-subtitle">OUR LOCATIONS</h4>
									</div>
									<div class="map-img text-center text-xl-start mt-4">
										<img src="{{ asset('frontend/images/homepage-2/map.png') }}" class="img-fluid"
											alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- Video End -->

				<!-- Ihbox Start -->
				<section class="section-md fade-section">
					<div class="container">
						<div class="pbmit-heading-subheading text-center">
							<h4 class="pbmit-subtitle">Working Process</h4>
							<h2 class="pbmit-title">We create personalized <br> industry solutions</h2>
						</div>
						<div class="swiper-slider ihbox-style-10-slider" data-autoplay="false" data-loop="true"
							data-dots="false" data-arrows="false" data-columns="4" data-margin="0" data-effect="slide">
							<div class="swiper-wrapper">
								<!-- Slide1 -->
								<article class="pbmit-miconheading-style-10 swiper-slide">
									<div class="pbmit-ihbox-style-10">
										<div class="pbmit-ihbox-box">
											<span class="pbmit-box-number">01</span>
											<div class="pbmit-ihbox-icon">
												<div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
													<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
														data-name="Layer 1">
														<path
															d="m490.9 465.985h-52.67a11.985 11.985 0 0 0 11.34-11.87v-33.57h-178.67v33.57a11.886 11.886 0 0 0 11.88 11.87h-201.025a5.025 5.025 0 0 0 -.54-.08 20.92 20.92 0 0 1 -18.81-20.64v-52.55h194.495v-14.01h-194.495v-168.94h268.87v12.7h14v-79.26a34.752 34.752 0 0 0 -34.72-34.72h-49.607v-20.894a7 7 0 0 0 -7-7h-114.21a7 7 0 0 0 -7 7v20.894h-49.6a34.761 34.761 0 0 0 -34.73 34.72v302.06a34.514 34.514 0 0 0 6.98 20.72h-34.283a7.008 7.008 0 0 0 -7 7v25.015a7.008 7.008 0 0 0 7 7h469.795a7 7 0 0 0 7-7v-25.01a7 7 0 0 0 -7-7.005zm-344.16-371.392h100.2v13.892h-100.2zm-63.6 27.892h227.42a20.75 20.75 0 0 1 20.72 20.72v52.56h-268.875v-52.56a20.752 20.752 0 0 1 20.73-20.72zm400.76 368.5h-455.795v-10.985h455.795zm-286.95-262.26a6.984 6.984 0 0 0 -5.2 2.31c-23.21 25.73-37.08 49.35-41.23 70.19-3.65 18.34.56 34.45 11.84 45.35 9.16 8.84 21.76 13.26 34.38 13.26 12.66 0 25.33-4.45 34.53-13.34 11.31-10.93 15.55-27.04 11.95-45.36-4.1-20.84-17.92-44.43-41.08-70.1a6.978 6.978 0 0 0 -5.195-2.31zm24.59 107.7c-12.73 12.3-36.76 12.34-49.45.08-7.85-7.59-10.56-18.84-7.83-32.54 3.29-16.55 14.55-36.37 32.69-57.62 18.07 21.19 29.28 40.96 32.53 57.49 2.685 13.7-.055 24.97-7.945 32.59zm201.33-136.95a7 7 0 0 1 7 7v15.99h-70.24v-15.99a7 7 0 0 1 7-7zm-140.09 36.99h154.91a11.894 11.894 0 0 1 11.88 11.88v33.555h-178.67v-33.56a11.894 11.894 0 0 1 11.875-11.875zm-11.88 170.08h178.67v-110.63h-178.67zm55.59-51c2.91-14.6 12.54-31.05 28.62-48.88a7.008 7.008 0 0 1 10.4 0c16.04 17.79 25.64 34.22 28.51 48.82 2.6 13.26-.52 24.95-8.78 32.94a37.217 37.217 0 0 1 -50.04.05c-8.255-7.97-11.355-19.67-8.715-32.93zm18.44 22.86c-8.63-8.34-8.68-27.35 15.38-56.35 23.97 28.92 23.86 47.93 15.2 56.3-7.885 7.61-22.745 7.63-30.585.05zm-188.945-314.43a7 7 0 0 1 7-7h25.17v-35.46a14.515 14.515 0 0 1 14.48-14.51h200.81v167.21h14.74a7.005 7.005 0 0 1 0 14.01h-46.88a7.005 7.005 0 1 1 0-14.01h14.74v-142.81a7.01 7.01 0 0 0 -7.01-7h-163.235a10.245 10.245 0 0 0 -10.24 10.23v22.34h25.15a7.005 7.005 0 0 1 0 14.01h-67.72a7 7 0 0 1 -7.005-7.01z" />
													</svg>
												</div>
											</div>
											<h2 class="pbmit-element-title">
												Preparation Of Materials
											</h2>
											<div class="pbmit-heading-desc">Moreover by automating repetitive tasks, you
												can
												free up your workforce.</div>
										</div>
									</div>
								</article>
								<!-- Slide2 -->
								<article class="pbmit-miconheading-style-10 swiper-slide">
									<div class="pbmit-ihbox-style-10">
										<div class="pbmit-ihbox-box">
											<span class="pbmit-box-number">02</span>
											<div class="pbmit-ihbox-icon">
												<div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
													<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
														data-name="Layer 1">
														<path
															d="m464.466 169.1h-13v-22.091a6.574 6.574 0 0 0 -6.565-6.574h-184.913a6.568 6.568 0 0 0 -6.564 6.574v97.191l13.129 5.457v-13.519h171.785v24.262.087s0 .057 0 .086v44.7.086s0 .057 0 .086v44.7.086s0 .057 0 .087v44.682.086s0 .057 0 .086v44.7.086s0 .057 0 .087v13.891h-85.18v-154.057l-147.975-61.51a3.033 3.033 0 0 1 -.544-.225l-23.285-9.678v225.465h-152.298v-333.293l81.916 34.042.047.019.619.253.038.019 89.193 37.062v30.319l13.131 5.458v-40.157a6.574 6.574 0 0 0 -4.042-6.067l-35.843-14.893-6.125-87.037a9.893 9.893 0 0 0 7.672-9.63v-15.212a9.9 9.9 0 0 0 -9.885-9.884h-50.219a9.9 9.9 0 0 0 -9.884 9.884v15.212a9.9 9.9 0 0 0 9.143 9.856l-6.574 59.437-83.229-34.586a6.573 6.573 0 0 0 -9.088 6.068v349.7a6.567 6.567 0 0 0 6.565 6.565h422.409a6.572 6.572 0 0 0 6.565-6.565v-13.981h31.473v13.98a6.567 6.567 0 1 0 13.133 0v-259.8a31.645 31.645 0 0 0 -31.605-31.6zm-345.666-111.041h43.729v8.722h-43.729zm9.228 21.851h26.811l5.711 81.147-39.678-16.486zm178.025 374.021v-112.179h-77.593v112.179h-13.13v-118.743a6.56 6.56 0 0 1 6.565-6.565h90.732a6.565 6.565 0 0 1 6.564 6.565v118.743zm145.415-155.131v-31.74h31.473v31.74zm31.473 13.133v31.74h-31.473v-31.74zm-31.473-58.006v-31.743h31.473v31.739zm0 102.879h31.473v31.712h-31.473zm13-174.573a18.5 18.5 0 0 1 18.473 18.467v8.347h-31.473v-26.818zm-26.128 3.22v13.129h-171.787v-13.133zm13.13 247.938v-31.74h31.473v31.74z">
														</path>
													</svg>
												</div>
											</div>
											<h2 class="pbmit-element-title">
												Component Sourcing and Procurement
											</h2>
											<div class="pbmit-heading-desc">Clear processes reduce confusion and keep
												teams
												focused on goals.</div>
										</div>
									</div>
								</article>
								<!-- Slide3 -->
								<article class="pbmit-miconheading-style-10 swiper-slide">
									<div class="pbmit-ihbox-style-10">
										<div class="pbmit-ihbox-box">
											<span class="pbmit-box-number">03</span>
											<div class="pbmit-ihbox-icon">
												<div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
													<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
														viewBox="0 0 512 512">
														<path
															d="M96.81,372.885a46.429,46.429,0,0,0-46.38,46.37A45.537,45.537,0,0,0,51,426.5a46.372,46.372,0,0,0,91.61,0,45.537,45.537,0,0,0,.57-7.24A46.421,46.421,0,0,0,96.81,372.885Zm0,57.49a11.115,11.115,0,1,1,11.11-11.12A11.135,11.135,0,0,1,96.81,430.375Zm142.01-27.61a31.435,31.435,0,1,0,31.44,31.43A31.466,31.466,0,0,0,238.82,402.765Zm0,37.47a6.035,6.035,0,1,1,6.04-6.04A6.047,6.047,0,0,1,238.82,440.235ZM505,412.205H491.616V326.311a16.289,16.289,0,0,0-16.271-16.271H386.2a16.289,16.289,0,0,0-16.271,16.271v85.894H356.09V194.7a7,7,0,0,0-7-7H328.82V53.365a7,7,0,0,0-7-7h-27.3a7,7,0,0,0-7,7v152.57q-8.13-14.085-16.26-28.18l-10.95-18.96c-15.37-26.61-41.82-41.88-72.57-41.88H63.9a7,7,0,0,0-7,7v27.27a7,7,0,0,0,7,7H76.17v142.33H58.65a41.277,41.277,0,0,0-37.52,23.13L4.49,356.675A40.6,40.6,0,0,0,0,375.575v52.33a7,7,0,0,0,7.01,7H38.49a59.819,59.819,0,0,1-2.04-14c-.01-.55-.02-1.1-.02-1.65a60.375,60.375,0,0,1,120.75,0c0,.55-.01,1.1-.02,1.65a59.819,59.819,0,0,1-2.04,14h38.27c-.01-.24-.01-.47-.01-.71a45.44,45.44,0,0,1,90.88,0c0,.24,0,.47-.01.71h3.27v7.82a7.01,7.01,0,0,0,7,7.01h27.3a5.374,5.374,0,0,0,.7-.04h.02a5.374,5.374,0,0,0,.7.04H505a7.01,7.01,0,0,0,7-7.01v-23.52A7,7,0,0,0,505,412.205Zm-78.1-88.161h7.739V337.2H426.9Zm-42.973,2.267a2.3,2.3,0,0,1,2.268-2.267h26.7V344.2a7,7,0,0,0,7,7h21.742a7,7,0,0,0,7-7V324.044h26.7a2.3,2.3,0,0,1,2.268,2.267v85.894H383.928Zm-280.488-25.8v-5.07h96.8v34.92H190.66A26.768,26.768,0,0,1,170.68,322l-8.76-8.9a40.634,40.634,0,0,0-29.96-12.58H103.44Zm184.08-15.71-4.48-4.08-55.83-50.87h0l4.578-4.584a7,7,0,0,0-9.91-9.895l-19.5,19.531a7,7,0,1,0,9.909,9.895l5.023-5.03,0,0,70.21,63.97v26.62H214.246v-34.92h.021c4.617,0,8.373-3.14,8.373-7v-13.5c0-11.31-11-20.52-24.521-20.52H103.44V151.185a7,7,0,0,1,7-7h61.54c30.74,0,57.2,15.26,72.59,41.88l42.95,74.42Zm-184.08-16.38h94.679c4.282,0,7.763,2.93,7.763,6.52v6.49H103.44Zm211.38,167.3h-13.3V60.365h13.3Zm183.17,0H328.82V201.705h13.27v217.5a7,7,0,0,0,7,7h148.9Z">
														</path>
													</svg>
												</div>
											</div>
											<h2 class="pbmit-element-title">
												Testing and Quality Control
											</h2>
											<div class="pbmit-heading-desc">Modern tools ensure reliability and meet
												industry standards by default.</div>
										</div>
									</div>
								</article>
								<!-- Slide4 -->
								<article class="pbmit-miconheading-style-10 swiper-slide">
									<div class="pbmit-ihbox-style-10">
										<div class="pbmit-ihbox-box">
											<span class="pbmit-box-number">04</span>
											<div class="pbmit-ihbox-icon">
												<div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
													<svg enable-background="new 0 0 55 55" viewBox="0 0 55 55"
														xmlns="http://www.w3.org/2000/svg">
														<g>
															<path
																d="m50.1535187 15.3581104c-.0425873-1.063612-1.0159912-1.8154945-2.0300293-1.6500244l-5.1600342.8500366c-.4799805.0799561-.8898926.3399658-1.1599121.7399902-.5857964.8461208-.1541595 1.6173592-.1000977 2.1900024l-.9099121.1099854-5.5400391-3.5299683c-1.8699951-1.1900024-4.0899677-1.6000366-6.2500019-1.1500244-.1799316.039978-.3599854.0800171-.5400391.1099854-.9399414-.539978-2.369873-1.1099854-4.25-1.0700073-2.4399414.0300293-5.869873 2.3500366-8.3199463 4.2800293-.5699463.4500122-1.1800537.8099976-1.8299561 1.0800171.0319271-.3720016.4497204-1.1984882-.1401367-2.0200195-.2698975-.3900146-.6999512-.6600342-1.1699219-.7299805l-5.0800781-.7600098c-.9516315-.1417561-1.8925376.5292797-2 1.5599976l-1.5898436 15.8699951c-.0900877.8999653.5100098 1.7099628 1.3898926 1.8900166l3.4699707.6999512c1.0235157.1860924 1.8784285-.4827881 2.0600586-1.3699951l.25-1.2199726.9499512-.1000366c.5786572-.0642395.9400043.0959702 1.0581055.1236572-1.3723965 1.7984715-.0096512 4.4487133 2.342041 4.2349262.0768681 1.4604874 1.3132629 2.6311493 2.887207 2.4882813.0795975 1.5123596 1.3820286 2.6315002 2.8745117 2.5013428.1046791 1.526577 1.4021168 2.5891304 2.8439941 2.4838867 1.2731323-.0940132 1.830862-.9668274 1.9309082-1.0482788.259222.1678619 1.0155239 1.1220093 2.4470215 1.1220093 1.5514278 0 2.8250198-1.1517181 3.0102539-2.6536865 1.9364796.8247032 3.9599476-.4703064 4.2022724-2.3971558 1.898159.8106728 3.9495773-.4358368 4.1986084-2.3918457 2.498333 1.0784531 5.0896378-1.4695778 3.9570313-4.0214252.1840553-.0278301.3814163-.0554371.578125-.1016846.1786385.5735874.0802116 1.5035267.9599609 2.0900288.4319229.2680435.9194412.3345566 1.3300781.2399902l2.7199707-.5900269c.8399658-.1799927 1.4199219-.9299927 1.3798828-1.7899799zm-35.5448017 18.3845234c-.4824219-.4160156-.5366211-1.1464844-.121582-1.6289063l.6567383-.7539082c.2011719-.2338867.4819336-.3754883.7895508-.3984375 1.0312576-.0666904 1.622797 1.1248455.9667969 1.8972187-.08741.1007195-.7495193.8636589-.6621094.7629395-.4160157.4833985-1.1469728.5366212-1.6293946.1210938zm2.4892578 1.6982422c-.0442467-.6059875.3513832-.8985558.4146729-.9985962.9066219-1.0467453.5689201-.6570053 1.30896-1.5116577.4169922-.4824219 1.1474609-.5361328 1.6298828-.1201172.476059.4094696.5413189 1.1270332.1293945 1.6159058l-1.4541016 1.6829224c-.0004883 0-.0004883.0004883-.0004883.0004883-.0002441.0003662-.0004883.0007324-.0007324.0010986-.6771756.7841606-1.952013.3429832-2.0275879-.670044zm4.125 3.5551758c-1.0467072.061367-1.620512-1.1367683-.9626465-1.9041138.087307-.1008148 1.5389767-1.7770348 1.4484863-1.6725464.0870228-.101059 1.1011829-1.2787933 1.0141602-1.1777344.6713352-.7805099 1.9518623-.349369 2.027832.6689453.020752.2774658-.0700684.5410156-.2329102.762146l-2.5166016 2.9146118v.0004883c-.0114746.0133057-.0187988.0289307-.0299072.0424194-.197998.209839-.458374.3441773-.748413.3657838zm1.637207 1.4111328c-.0216064-.2896729.0727539-.5668945.2508545-.7936401.7163219-.7984009 2.6492767-3.0787621 3.4351807-3.9944458.4130764-.4790878 1.142046-.5427742 1.6298828-.1201172.4829102.4155273.5371094 1.1469727.121582 1.6289063l-3.409668 3.9482422c-.6731529.7821845-1.9519882.3476867-2.027832-.6689454zm4.7290039.7719727-.4685059-.3927002 1.9902344-2.3044434.6838379.5769043c.1848145.236145.2976074.5213623.3222656.8277588.1146718 1.3993339-1.5302581 2.1296997-2.527832 1.2924805zm12.6035175-7.1967774c-10.8812847-9.278183.1281815.1001549-7.6157227-6.4785175-.315918-.2680664-.7895527-.2280273-1.0571308.0883789s-.2280273.7895508.0883789 1.0571289c8.8823566 7.5539646 5.9149952 5.0312443 6.5375996 5.5614643.5099831.5856819.4981766 1.4287033.0112305 1.9985962-.5483398.6430664-1.5180664.7211914-2.1645508.1689453-11.0197411-9.3404732-1.2310295-1.048008-7.9917011-6.7622089-.3164063-.2666016-.7895508-.2255859-1.0566406.0908203-.288435.3422394-.1624641.8439178.090332 1.0576172l6.901125 5.838686c.5286255.5926132.5060921 1.4357147.0202637 2.0045776-.5209961.6123047-1.5375977.6982422-2.1645527.1733398-.3078918-.2650032-1.6885815-1.4598198-1.8415527-1.59375.738308-2.3065376-1.747036-4.334095-3.8671875-3.0934448-.6011734-1.66745-2.5201283-2.2103291-3.9069824-1.3262329-.5689011-1.5469303-2.2843266-2.1249027-3.6396484-1.4684467-.5849323-1.8183861-2.7997255-2.4262867-4.2327881-1.201416-1.2993298-.7258282-2.4529095-.3970547-2.739624-.3998413l1.0599365-5.2699585 1.1400146-5.4100342c1.0999756-.3299561 2.1300049-.8699951 3.0600586-1.5999756 3.1499023-2.5 5.8598633-3.9400024 7.4099121-3.960022.8441315-.027173 1.3647785.1098719 1.7099609.1700439-1.6298828.4400024-2.7799072.8800049-3.4199219 1.3099976-.9299316.6099854-2.3300781 2.289978-4.1400146 4.9899902-1.2976246 1.9466858.0712948 4.5232792 2.4100342 4.5899658 1.2800293 0 3.7800293-.4199829 6.3999023-3.1699829 1.3574352-.0830212 2.233078-.4284229 2.3331299-.4512939 3.5471058 3.010479 13.2991886 11.2881489 12.6741962 10.758606.3046875.2653809.4904785.6331196.5212402 1.038393.1030503 1.3691254-1.5261726 2.1523323-2.5292969 1.2885742zm2.7067872-3.7036152c-13.8032951-11.7071762-12.8095779-10.901907-13.0159931-10.9706421-.1895409-.0475292-.3444595-.0552711-.5200195.0199585-.0100098.0100098-.0299072.0100098-.039917.0200195-.7600098.3800049-2.0700684.5100098-2.5100098.5300293-.2000732 0-.380127.0899658-.5200195.2399902-2.3100586 2.5199585-4.4300537 2.8999634-5.4799805 2.8999634-1.0953083-.0320415-1.8473034-1.2593288-1.1800537-2.2599487 1.6300049-2.4200439 2.9799805-4.0800171 3.7199707-4.5700073.4700928-.3099976 1.8699951-.960022 5.960083-1.8000488 1.7700195-.3699951 3.5899677-.0299683 5.1298847.9500122 6.0075417 3.7484837 5.7781563 3.8366261 6.2600098 3.7800293l1.3000488-.1500244 2.2399902 11.0400391c-.3077354.0595474-.8874245.177618-1.3439941.2706298z">
															</path>
														</g>
													</svg>
												</div>
											</div>
											<h2 class="pbmit-element-title">
												Final Assembly and Integration
											</h2>
											<div class="pbmit-heading-desc">Proven workflows ensure seamless completion
												and
												product readiness.</div>
										</div>
									</div>
								</article>
							</div>
						</div>
					</div>
				</section>
				<!-- Ihbox End -->

				<!-- Client Start -->
				<section class="client-section-two">
					<div class="container-fluid p-0">
						<div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="false"
							data-arrows="false" data-columns="6" data-margin="0" data-effect="slide">
							<div class="swiper-wrapper">
								@foreach($partners as $partner)
									<article class="pbmit-client-style-1 swiper-slide">
										<div class="pbmit-border-wrapper">
											<div class="pbmit-client-wrapper pbmit-client-with-hover-img">
												<h4 class="pbmit-hide">Partner</h4>
												<div class="pbmit-client-hover-img">
													<img src="{{ asset('frontend/images/partner_logos/' . $partner->getFilename()) }}"
														alt="Partner"
														style="max-height: 65px; width: auto; object-fit: contain;">
												</div>
												<div class="pbmit-featured-img-wrapper">
													<div class="pbmit-featured-wrapper">
														<img src="{{ asset('frontend/images/partner_logos/' . $partner->getFilename()) }}"
															class="img-fluid" alt="Partner"
															style="max-height: 65px; width: auto; object-fit: contain;">
													</div>
												</div>
											</div>
										</div>
									</article>
								@endforeach
							</div>
						</div>
					</div>
				</section>
				<!-- Client End -->

				<!-- Team Start -->
				<section class="team-section-two pbmit-bg-color-blackish">
					<div class="container p-0">
						<div class="pbmit-custom-heading">
							<h2 class="pbmit-title">Meet the team</h2>
						</div>
						<div class="row pbminfotech-gap-50px">
							@foreach($teamMembers->take(2) as $index => $member)
								<article class="pbmit-team-style-2 col-md-6 col-lg-4 col-xl-3">
									<div class="pbminfotech-post-item">
										<div class="pbminfotech-box-content">
											<div class="pbminfotech-box-content-inner">
												<div class="pbmit-featured-wrapper pbmit-hover-img">
													<div class="pbmit-featured-img-wrapper">
														<div class="pbmit-featured-wrapper">
															@if($member->image)
																<img src="{{ asset('storage/' . $member->image) }}"
																	class="img-fluid" alt="{{ $member->name }}">
															@else
																<img src="{{ asset('frontend/images/homepage-2/team/team-img-0' . $loop->iteration . '.jpg') }}"
																	class="img-fluid" alt="{{ $member->name }}">
															@endif
														</div>
													</div>
												</div>
												<h3 class="pbmit-team-title">
													<a href="/team-member-detail">{{ $member->name }}</a>
												</h3>
												<div class="pbminfotech-box-team-position">
													{{ $member->designation_or_status }}
												</div>
											</div>
										</div>
									</div>
								</article>
							@endforeach

							<div class="col-md-12 col-lg-4 col-xl-6 d-flex align-items-center">
								<div class="team-btn-bg w-100" style="margin-left: 0;margin-top: -80px;">
									<p class="pbmit-text"> Skilled experts driving quality and innovation.<br>Together,
										we build quality and trust.</p>
									<a href="/our-team" class="pbmit-btn white">
										<span class="pbmit-button-content-wrapper">
											<span class="pbmit-button-icon">
												<i class="pbmit-induyst-icon pbmit-induyst-icon-next"></i>
											</span>
											<span class="pbmit-button-text">More the Teams</span>
										</span>
									</a>
								</div>
							</div>
						</div>
						<hr style="margin-top: -23px; padding: 10px;" />

						@if($teamMembers->count() > 2)
							<!-- Second Row -->
							<div class="row pbminfotech-gap-50px mt-4">
								@foreach($teamMembers->skip(2)->take(4) as $index => $member)
									<article class="pbmit-team-style-2 col-md-6 col-lg-4 col-xl-3">
										<div class="pbminfotech-post-item">
											<div class="pbminfotech-box-content">
												<div class="pbminfotech-box-content-inner">
													<div class="pbmit-featured-wrapper pbmit-hover-img">
														<div class="pbmit-featured-img-wrapper">
															<div class="pbmit-featured-wrapper">
																@if($member->image)
																	<img src="{{ asset('storage/' . $member->image) }}"
																		class="img-fluid" alt="{{ $member->name }}">
																@else
																	<img src="{{ asset('frontend/images/homepage-2/team/team-img-0' . ($loop->iteration + 2) . '.jpg') }}"
																		class="img-fluid" alt="{{ $member->name }}">
																@endif
															</div>
														</div>
													</div>
													<h3 class="pbmit-team-title">
														<a href="/team-member-detail">{{ $member->name }}</a>
													</h3>
													<div class="pbminfotech-box-team-position">
														{{ $member->designation_or_status }}
													</div>
												</div>
											</div>
										</div>
									</article>
								@endforeach
							</div>
						@endif
					</div>
				</section>
				<!-- Team End -->

				<!-- Testimonial Start -->
				<section class="section-lgb">
					<div class="testimonial-section-two pbmit-bg-color-light">
						<div class="container-fluid p-0">
							<div class="row">
								<div class="col-md-12 col-xl-5">
									<div class="testimonial-two-leftbox"></div>
								</div>
								<div class="col-md-12 col-xl-7">
									<div class="testimonial-two-rightbox">
										<div class="pbmit-heading-subheading">
											<h4 class="pbmit-subtitle">To know more about us</h4>
											<h2 class="pbmit-title">What Our Customers Say?</h2>
										</div>
										<div class="swiper-slider" data-autoplay="false" data-loop="false"
											data-dots="false" data-arrows="true" data-columns="1" data-margin="30"
											data-effect="slide">
											<div class="swiper-wrapper">
												@foreach($testimonials as $index => $testimonial)
													<article class="pbmit-testimonial-style-1 swiper-slide">
														<div class="pbminfotech-post-item">
															<blockquote class="pbminfotech-testimonial-text">
																<p>{{ $testimonial->content }}</p>
															</blockquote>
															<div class="pbminfotech-box-star-ratings">
																@for($i = 1; $i <= 5; $i++)
																	<i
																		class="pbmit-base-icon-star {{ $i <= round($testimonial->rating ?? 5) ? 'pbmit-active' : '' }}"></i>
																@endfor
															</div>
															<div class="pbminfotech-box-author">

																<div class="pbmit-auther-content">
																	<h3 class="pbminfotech-box-title">
																		{{ $testimonial->name }}
																	</h3>
																	<div class="pbminfotech-testimonial-detail">
																		{{ $testimonial->designation }}
																	</div>
																</div>
															</div>
														</div>
													</article>
												@endforeach
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- Testimonial End -->

			</div>
			<!-- Page Content End -->

			@include('frontend.partials.footer')

		</div>
		<!-- Page Wrapper End -->

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
</x-layouts.app>
