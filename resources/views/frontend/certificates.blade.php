<x-layouts.app title="Certificates - Omkar">
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
									<h1 class="pbmit-tbar-title"> Certificates</h1>
								</div>
							</div>
							<div class="pbmit-breadcrumb">
								<div class="pbmit-breadcrumb-inner">
									<span>
										<a title="" href="{{ route('frontend.home') }}"
											class="home"><span>Home</span></a>
									</span>
									<span class="sep"></span>
									<span><span class="post-root post post-post current-item">
											Certificates</span></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Title Bar End-->

			<div class="page-content">

				<!-- Certificates Grid Col 3 -->
				<section class="section-md">
					<div class="container">
						<div class="pbmit-heading-subheading text-center">
							<h4 class="pbmit-subtitle">Certificates</h4>
							<h6 class="pbmit-title">Our World-Class Industry Certifications</h6>
						</div>

						<!-- Highlighted Gold Medal Badge -->
						<div class="row justify-content-center mb-5 mt-4">
							<div class="col-md-8 text-center">
								<div class="gold-medal-badge"
									style="background: linear-gradient(135deg, #fffbf0 0%, #ffffff 100%); border: 1px solid #ffe885; border-radius: 20px; padding: 40px 30px; box-shadow: 0 15px 35px rgba(218, 165, 32, 0.15); position: relative; overflow: hidden; transform: translateY(-5px); transition: all 0.3s ease;">
									<div
										style="position: absolute; top: -50px; left: -50px; width: 150px; height: 150px; background: radial-gradient(circle, rgba(255,215,0,0.2) 0%, rgba(255,255,255,0) 70%); border-radius: 50%;">
									</div>
									<div
										style="position: absolute; bottom: -50px; right: -50px; width: 150px; height: 150px; background: radial-gradient(circle, rgba(218,165,32,0.15) 0%, rgba(255,255,255,0) 70%); border-radius: 50%;">
									</div>

									<svg width="90" height="90" viewBox="0 0 24 24" fill="none"
										xmlns="http://www.w3.org/2000/svg"
										style="filter: drop-shadow(0 8px 12px rgba(218,165,32,0.5)); margin-bottom: 20px;">
										<path
											d="M12 16C16.4183 16 20 12.4183 20 8C20 3.58172 16.4183 0 12 0C7.58172 0 4 3.58172 4 8C4 12.4183 7.58172 16 12 16Z"
											fill="url(#goldGradient1)" />
										<path
											d="M7.75 14.5L4 24L12 20L20 24L16.25 14.5C15.05 15.45 13.55 16 12 16C10.45 16 8.95 15.45 7.75 14.5Z"
											fill="url(#goldGradient2)" />
										<circle cx="12" cy="8" r="5" fill="#FFF9E6" />
										<path d="M12 4.5V11.5M8.5 8H15.5" stroke="#DAA520" stroke-width="1.5"
											stroke-linecap="round" />
										<defs>
											<linearGradient id="goldGradient1" x1="4" y1="0" x2="20" y2="16"
												gradientUnits="userSpaceOnUse">
												<stop stop-color="#FFDF00" />
												<stop offset="1" stop-color="#DAA520" />
											</linearGradient>
											<linearGradient id="goldGradient2" x1="4" y1="14.5" x2="20" y2="24"
												gradientUnits="userSpaceOnUse">
												<stop stop-color="#DAA520" />
												<stop offset="1" stop-color="#B8860B" />
											</linearGradient>
										</defs>
									</svg>
									<h3
										style="color: #b8860B; font-weight: 800; margin-bottom: 15px; font-size: 32px; letter-spacing: 1px; text-transform: uppercase;">
										Winner of Gold Medal 1982-84-85</h3>
									<p
										style="color: #555; font-size: 18px; margin: 0; line-height: 1.6; font-weight: 500;">
										Recognized globally for outstanding manufacturing standards, unmatched premium
										quality, and industry-leading innovation.</p>
								</div>
							</div>
						</div>
						<div class="row pbmit-element-posts-wrapper">
							<article class="col-md-6 col-lg-4 mb-4">
								<div
									style="background: #fff; border: 1px solid #eaeaea; border-radius: 15px; padding: 15px; height: 100%; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.03);">
									<div
										style="border-radius: 10px; overflow: hidden; margin-bottom: 20px; height: 320px; display: flex; align-items: center; justify-content: center; background: #fdfdfd; padding: 5px;">
										<img src="{{ asset('frontend/images/portfolio/OMKAR_INDUSTRIES_ISO.png') }}"
											class="img-fluid" alt="ISO Certification"
											style="max-height: 100%; max-width: 100%; object-fit: contain; border-radius: 8px;">
									</div>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title" style="font-size: 20px; margin-bottom: 5px;">
											ISO Certification
										</h2>
										<div class="pbmit-heading-desc" style="color: #666;">Omkar Industries ISO</div>
									</div>
								</div>
							</article>
							<article class="col-md-6 col-lg-4 mb-4">
								<div
									style="background: #fff; border: 1px solid #eaeaea; border-radius: 15px; padding: 15px; height: 100%; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.03);">
									<div
										style="border-radius: 10px; overflow: hidden; margin-bottom: 20px; height: 320px; display: flex; align-items: center; justify-content: center; background: #fdfdfd; padding: 5px;">
										<img src="{{ asset('frontend/images/portfolio/ZED MSME Bronze.png') }}"
											class="img-fluid" alt="ZED MSME Bronze"
											style="max-height: 100%; max-width: 100%; object-fit: contain; border-radius: 8px;">
									</div>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title" style="font-size: 20px; margin-bottom: 5px;">
											ZED MSME Bronze
										</h2>
										<div class="pbmit-heading-desc" style="color: #666;">MSME Certification</div>
									</div>
								</div>
							</article>
							<article class="col-md-6 col-lg-4 mb-4">
								<div
									style="background: #fff; border: 1px solid #eaeaea; border-radius: 15px; padding: 15px; height: 100%; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.03);">
									<div
										style="border-radius: 10px; overflow: hidden; margin-bottom: 20px; height: 320px; display: flex; align-items: center; justify-content: center; background: #fdfdfd; padding: 5px;">
										<img src="{{ asset('frontend/images/portfolio/ZED MSME.png') }}"
											class="img-fluid" alt="ZED MSME"
											style="max-height: 100%; max-width: 100%; object-fit: contain; border-radius: 8px;">
									</div>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title" style="font-size: 20px; margin-bottom: 5px;">
											ZED MSME
										</h2>
										<div class="pbmit-heading-desc" style="color: #666;">MSME Certification</div>
									</div>
								</div>
							</article>
							<article class="col-md-6 col-lg-4 mb-4">
								<div
									style="background: #fff; border: 1px solid #eaeaea; border-radius: 15px; padding: 15px; height: 100%; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.03);">
									<div
										style="border-radius: 10px; overflow: hidden; margin-bottom: 20px; height: 320px; display: flex; align-items: center; justify-content: center; background: #fdfdfd; padding: 5px;">
										<img src="{{ asset('frontend/images/portfolio/Gold Medal 1.png') }}"
											class="img-fluid" alt="Gold Medal 1"
											style="max-height: 100%; max-width: 100%; object-fit: contain; border-radius: 8px;">
									</div>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title" style="font-size: 20px; margin-bottom: 5px;">
											Gold Medal 1
										</h2>
										<div class="pbmit-heading-desc" style="color: #666;">Industry Recognition</div>
									</div>
								</div>
							</article>
							<article class="col-md-6 col-lg-4 mb-4">
								<div
									style="background: #fff; border: 1px solid #eaeaea; border-radius: 15px; padding: 15px; height: 100%; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.03);">
									<div
										style="border-radius: 10px; overflow: hidden; margin-bottom: 20px; height: 320px; display: flex; align-items: center; justify-content: center; background: #fdfdfd; padding: 5px;">
										<img src="{{ asset('frontend/images/portfolio/gold medal 2.png') }}"
											class="img-fluid" alt="Gold Medal 2"
											style="max-height: 100%; max-width: 100%; object-fit: contain; border-radius: 8px;">
									</div>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title" style="font-size: 20px; margin-bottom: 5px;">
											Gold Medal 2
										</h2>
										<div class="pbmit-heading-desc" style="color: #666;">Industry Recognition</div>
									</div>
								</div>
							</article>
							<article class="col-md-6 col-lg-4 mb-4">
								<div
									style="background: #fff; border: 1px solid #eaeaea; border-radius: 15px; padding: 15px; height: 100%; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.03);">
									<div
										style="border-radius: 10px; overflow: hidden; margin-bottom: 20px; height: 320px; display: flex; align-items: center; justify-content: center; background: #fdfdfd; padding: 5px;">
										<img src="{{ asset('frontend/images/portfolio/MEDALS.jpeg') }}"
											class="img-fluid" alt="Medals"
											style="max-height: 100%; max-width: 100%; object-fit: contain; border-radius: 8px;">
									</div>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title" style="font-size: 20px; margin-bottom: 5px;">
											Medals
										</h2>
										<div class="pbmit-heading-desc" style="color: #666;">Industry Recognition</div>
									</div>
								</div>
							</article>
							<article class="col-md-6 col-lg-4 mb-4">
								<div
									style="background: #fff; border: 1px solid #eaeaea; border-radius: 15px; padding: 15px; height: 100%; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.03);">
									<div
										style="border-radius: 10px; overflow: hidden; margin-bottom: 20px; height: 320px; display: flex; align-items: center; justify-content: center; background: #fdfdfd; padding: 5px;">
										<img src="{{ asset('frontend/images/portfolio/OMKAR_INDU_CERTI.jpeg') }}"
											class="img-fluid" alt="Omkar Industry Certificate"
											style="max-height: 100%; max-width: 100%; object-fit: contain; border-radius: 8px;">
									</div>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title" style="font-size: 20px; margin-bottom: 5px;">
											Omkar Industry Certificate
										</h2>
										<div class="pbmit-heading-desc" style="color: #666;">Omkar Industries ISO</div>
									</div>
								</div>
							</article>

						</div>
					</div>
				</section>
				<!-- Certificates Grid Col 3 End -->

			</div>

			@include('frontend.partials.footer')

		</div>
</x-layouts.app>