<x-layouts.app title="Certificates - Omkar">
@push('page-css')
    <link rel="stylesheet" href="{{ asset('frontend/css/fancybox.css') }}" />
    <style>
        /* Fancybox Modal & Navigation Styling */
        .fancybox__container {
            --fancybox-bg: rgba(18, 34, 45, 0.96);
            --fancybox-color: #ffffff;
            --fancybox-accent-color: #d4af37;
            z-index: 9999999 !important;
        }
        .fancybox__toolbar {
            background: rgba(0, 0, 0, 0.5) !important;
            backdrop-filter: blur(8px);
            padding: 10px 15px !important;
        }
        .fancybox__toolbar .carousel__button {
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.15) !important;
            border-radius: 8px !important;
            margin: 0 4px !important;
            transition: all 0.25s ease;
        }
        .fancybox__toolbar .carousel__button:hover {
            background: #d4af37 !important;
            color: #000000 !important;
        }
        .fancybox__nav .carousel__button {
            background: rgba(255, 255, 255, 0.25) !important;
            backdrop-filter: blur(10px);
            border-radius: 50% !important;
            width: 54px !important;
            height: 54px !important;
            color: #ffffff !important;
            box-shadow: 0 6px 20px rgba(0,0,0,0.3) !important;
            transition: all 0.3s ease !important;
        }
        .fancybox__nav .carousel__button:hover {
            background: #d4af37 !important;
            color: #000000 !important;
            transform: scale(1.12);
        }
        .fancybox__nav .carousel__button.is-prev {
            left: 20px !important;
        }
        .fancybox__nav .carousel__button.is-next {
            right: 20px !important;
        }
        .fancybox__thumb {
            border-radius: 6px !important;
            border: 2px solid transparent !important;
            transition: all 0.3s ease;
        }
        .fancybox__thumb.is-selected {
            border-color: #d4af37 !important;
            transform: scale(1.05);
        }
        .certificate-card {
            background: #fff;
            border: 1px solid #eaeaea;
            border-radius: 15px;
            padding: 15px;
            height: 100%;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.03);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        .certificate-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.08);
            border-color: #d4af37;
        }
        .certificate-img-wrap {
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
            height: 320px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fdfdfd;
            padding: 8px;
            position: relative;
            cursor: pointer;
        }
        .certificate-img-wrap img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
            border-radius: 8px;
            transition: transform 0.4s ease;
        }
        .certificate-card:hover .certificate-img-wrap img {
            transform: scale(1.04);
        }
        .certificate-zoom-badge {
            position: absolute;
            bottom: 12px;
            right: 12px;
            width: 38px;
            height: 38px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            color: #222;
            transition: all 0.3s ease;
            pointer-events: none;
        }
        .certificate-card:hover .certificate-zoom-badge {
            background: #d4af37;
            color: #fff;
        }
        .certificate-zoom-badge svg {
            width: 18px;
            height: 18px;
        }
    </style>
@endpush
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
								<div class="certificate-card">
									<a href="{{ asset('frontend/images/portfolio/OMKAR_INDUSTRIES_ISO.png') }}"
										data-fancybox="certificates"
										data-caption="ISO Certification - Omkar Industries ISO"
										class="certificate-img-wrap d-block text-decoration-none">
										<img src="{{ asset('frontend/images/portfolio/OMKAR_INDUSTRIES_ISO.png') }}"
											class="img-fluid" alt="ISO Certification">
										<div class="certificate-zoom-badge" title="Click to view">
											<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<circle cx="11" cy="11" r="8"></circle>
												<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
												<line x1="11" y1="8" x2="11" y2="14"></line>
												<line x1="8" y1="11" x2="14" y2="11"></line>
											</svg>
										</div>
									</a>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title" style="font-size: 20px; margin-bottom: 5px;">
											ISO Certification
										</h2>
										<div class="pbmit-heading-desc" style="color: #666;">Omkar Industries ISO</div>
									</div>
								</div>
							</article>

							<article class="col-md-6 col-lg-4 mb-4">
								<div class="certificate-card">
									<a href="{{ asset('frontend/images/portfolio/ZED MSME Bronze.png') }}"
										data-fancybox="certificates"
										data-caption="ZED MSME Bronze - MSME Certification"
										class="certificate-img-wrap d-block text-decoration-none">
										<img src="{{ asset('frontend/images/portfolio/ZED MSME Bronze.png') }}"
											class="img-fluid" alt="ZED MSME Bronze">
										<div class="certificate-zoom-badge" title="Click to view">
											<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<circle cx="11" cy="11" r="8"></circle>
												<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
												<line x1="11" y1="8" x2="11" y2="14"></line>
												<line x1="8" y1="11" x2="14" y2="11"></line>
											</svg>
										</div>
									</a>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title" style="font-size: 20px; margin-bottom: 5px;">
											ZED MSME Bronze
										</h2>
										<div class="pbmit-heading-desc" style="color: #666;">MSME Certification</div>
									</div>
								</div>
							</article>

							<article class="col-md-6 col-lg-4 mb-4">
								<div class="certificate-card">
									<a href="{{ asset('frontend/images/portfolio/ZED MSME.png') }}"
										data-fancybox="certificates"
										data-caption="ZED MSME - MSME Certification"
										class="certificate-img-wrap d-block text-decoration-none">
										<img src="{{ asset('frontend/images/portfolio/ZED MSME.png') }}"
											class="img-fluid" alt="ZED MSME">
										<div class="certificate-zoom-badge" title="Click to view">
											<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<circle cx="11" cy="11" r="8"></circle>
												<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
												<line x1="11" y1="8" x2="11" y2="14"></line>
												<line x1="8" y1="11" x2="14" y2="11"></line>
											</svg>
										</div>
									</a>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title" style="font-size: 20px; margin-bottom: 5px;">
											ZED MSME
										</h2>
										<div class="pbmit-heading-desc" style="color: #666;">MSME Certification</div>
									</div>
								</div>
							</article>

							<article class="col-md-6 col-lg-4 mb-4">
								<div class="certificate-card">
									<a href="{{ asset('frontend/images/portfolio/gold medal 2.png') }}"
										data-fancybox="certificates"
										data-caption="Gold Medal - Industry Recognition"
										class="certificate-img-wrap d-block text-decoration-none">
										<img src="{{ asset('frontend/images/portfolio/gold medal 2.png') }}"
											class="img-fluid" alt="Gold Medal 2">
										<div class="certificate-zoom-badge" title="Click to view">
											<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<circle cx="11" cy="11" r="8"></circle>
												<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
												<line x1="11" y1="8" x2="11" y2="14"></line>
												<line x1="8" y1="11" x2="14" y2="11"></line>
											</svg>
										</div>
									</a>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title" style="font-size: 20px; margin-bottom: 5px;">
											Gold Medal
										</h2>
										<div class="pbmit-heading-desc" style="color: #666;">Industry Recognition</div>
									</div>
								</div>
							</article>

							<article class="col-md-6 col-lg-4 mb-4">
								<div class="certificate-card">
									<a href="{{ asset('frontend/images/portfolio/TM OMKAR.jpg') }}"
										data-fancybox="certificates"
										data-caption="Trade Certificate Mark - Trade Mark Medal"
										class="certificate-img-wrap d-block text-decoration-none">
										<img src="{{ asset('frontend/images/portfolio/TM OMKAR.jpg') }}"
											class="img-fluid" alt="Trade Mark Medals">
										<div class="certificate-zoom-badge" title="Click to view">
											<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<circle cx="11" cy="11" r="8"></circle>
												<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
												<line x1="11" y1="8" x2="11" y2="14"></line>
												<line x1="8" y1="11" x2="14" y2="11"></line>
											</svg>
										</div>
									</a>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title" style="font-size: 20px; margin-bottom: 5px;">
											Trade Certificate Mark
										</h2>
										<div class="pbmit-heading-desc" style="color: #666;">Trade Mark Medal</div>
									</div>
								</div>
							</article>

							<article class="col-md-6 col-lg-4 mb-4">
								<div class="certificate-card">
									<a href="{{ asset('frontend/images/portfolio/UDYAM Certificate 2025.jpg') }}"
										data-fancybox="certificates"
										data-caption="UDYAM Certificate 2025"
										class="certificate-img-wrap d-block text-decoration-none">
										<img src="{{ asset('frontend/images/portfolio/UDYAM Certificate 2025.jpg') }}"
											class="img-fluid" alt="UDYAM Certificate 2025">
										<div class="certificate-zoom-badge" title="Click to view">
											<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<circle cx="11" cy="11" r="8"></circle>
												<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
												<line x1="11" y1="8" x2="11" y2="14"></line>
												<line x1="8" y1="11" x2="14" y2="11"></line>
											</svg>
										</div>
									</a>
									<div class="pbmit-ihbox-contents">
										<h2 class="pbmit-element-title" style="font-size: 20px; margin-bottom: 5px;">
											UDYAM Certificate 2025
										</h2>
										<div class="pbmit-heading-desc" style="color: #666;">UDYAM Certificate 2025 Medal</div>
									</div>
								</div>
							</article>

							<article class="col-md-6 col-lg-4 mb-4">
								<div class="certificate-card">
									<a href="{{ asset('frontend/images/portfolio/OMKAR_INDU_CERTI.jpeg') }}"
										data-fancybox="certificates"
										data-caption="Omkar Industry Certificate - Omkar Industries ISO"
										class="certificate-img-wrap d-block text-decoration-none">
										<img src="{{ asset('frontend/images/portfolio/OMKAR_INDU_CERTI.jpeg') }}"
											class="img-fluid" alt="Omkar Industry Certificate">
										<div class="certificate-zoom-badge" title="Click to view">
											<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<circle cx="11" cy="11" r="8"></circle>
												<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
												<line x1="11" y1="8" x2="11" y2="14"></line>
												<line x1="8" y1="11" x2="14" y2="11"></line>
											</svg>
										</div>
									</a>
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
	</div>

@push('page-js')
    <script src="{{ asset('frontend/js/fancybox.umd.js') }}"></script>
    <script>
        (function() {
            function initCertificatesGallery() {
                if (typeof Fancybox !== 'undefined') {
                    Fancybox.destroy();
                    Fancybox.bind('[data-fancybox="certificates"]', {
                        loop: true,
                        closeButton: 'top',
                        Navigation: true,
                        Carousel: {
                            Navigation: true,
                            friction: 0.85,
                        },
                        Toolbar: {
                            display: {
                                left: ["infobar"],
                                middle: [
                                    "zoomIn",
                                    "zoomOut",
                                    "toggle1:1",
                                    "rotateCCW",
                                    "rotateCW",
                                ],
                                right: ["slideshow", "thumbs", "close"],
                            },
                        },
                        Images: {
                            initialSize: "fit",
                            Panzoom: {
                                maxScale: 3,
                            },
                        },
                        Thumbs: {
                            autoStart: true,
                        },
                    });
                }
            }

            // Run immediately
            initCertificatesGallery();

            // Also attach as listener if document is still loading
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initCertificatesGallery);
            }
            window.addEventListener('load', initCertificatesGallery);

            // Safety click handler: Ensure clicking the link triggers Fancybox and never navigates away
            document.addEventListener('click', function(e) {
                var targetLink = e.target.closest('a[data-fancybox="certificates"]');
                if (targetLink) {
                    if (typeof Fancybox !== 'undefined') {
                        e.preventDefault();
                        var allItems = Array.from(document.querySelectorAll('a[data-fancybox="certificates"]'));
                        var index = allItems.indexOf(targetLink);
                        Fancybox.show(allItems.map(function(item) {
                            return {
                                src: item.getAttribute('href'),
                                caption: item.getAttribute('data-caption') || '',
                                thumb: item.querySelector('img') ? item.querySelector('img').getAttribute('src') : item.getAttribute('href')
                            };
                        }), {
                            startIndex: index >= 0 ? index : 0,
                            loop: true,
                            closeButton: 'top',
                            Toolbar: {
                                display: {
                                    left: ["infobar"],
                                    middle: ["zoomIn", "zoomOut", "toggle1:1", "rotateCCW", "rotateCW"],
                                    right: ["slideshow", "thumbs", "close"]
                                }
                            },
                            Thumbs: {
                                autoStart: true
                            }
                        });
                    }
                }
            });
        })();
    </script>
@endpush
</x-layouts.app>