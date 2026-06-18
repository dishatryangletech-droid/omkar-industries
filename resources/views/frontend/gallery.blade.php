<x-layouts.app title="Gallery - Induyst">
@push('page-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <style>
        .pbmit-sortable-list-ul li a.pbmit-sortable-link {
            border: 1px solid #b7b3b37a;
            transition: all 0.3s ease;
        }
        .pbmit-sortable-list-ul li a.pbmit-sortable-link:hover {
            border-color: var(--pbmit-global-color);
            color: var(--pbmit-global-color);
        }
        .pbmit-sortable-list-ul li a.pbmit-sortable-link.pbmit-selected {
            border-color: var(--pbmit-global-color);
            color: var(--pbmit-white-color);
        }
    </style>
@endpush
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
									<h1 class="pbmit-tbar-title"> Gallery</h1>
								</div>
							</div>
							<div class="pbmit-breadcrumb">
								<div class="pbmit-breadcrumb-inner">
									<span>
										<a title="" href="/" class="home"><span>Induyst</span></a>
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

			<!-- Page Content -->
			<div class="page-content">
				<!-- Portfolio Sortable Col 3 Start -->
				<section class="section-lg pbmit-sortable-yes pbmit-element-portfolio-style-1">
					<div class="container">
						<div class="pbmit-sortable-list">
							<ul class="pbmit-sortable-list-ul">
								<li><a href="#" class="pbmit-sortable-link pbmit-selected" data-sortby="*">All</a></li>
								@if($galleries && $galleries->count() > 0)
									@foreach($galleries as $gallery)
										<li><a href="#" class="pbmit-sortable-link"
												data-sortby="{{ \Illuminate\Support\Str::slug($gallery->tab_name) }}">{{ $gallery->tab_name }}</a>
										</li>
									@endforeach
								@endif
							</ul>
						</div>
						<div class="row pbmit-element-posts-wrapper">
							@if($galleries && $galleries->count() > 0)
								@foreach($galleries as $gallery)
									@if(is_array($gallery->images) || is_object($gallery->images))
										@foreach($gallery->images as $image)
											<article
												class="pbmit-portfolio-style-1 col-md-6 col-lg-4 {{ \Illuminate\Support\Str::slug($gallery->tab_name) }}">
												<div class="pbminfotech-post-content">
													<div class="pbminfotech-post-warpper">
														<div class="pbmit-featured-img-wrapper">
															<div class="pbmit-featured-wrapper" style="background-color: #fff; border-radius: 10px;">
																<img src="{{ asset('storage/' . $image) }}" class="img-fluid"
																	alt="{{ $gallery->tab_name }}"
																	style="height: 300px; width: 100%; object-fit: contain;">
															</div>
														</div>
														<a class="pbmit-link" style="border:1px solid #b7b3b37a; border-radius: 10px;"
															href="{{ asset('storage/' . $image) }}" data-fancybox="gallery" data-caption="{{ $gallery->tab_name }}"></a>
													</div>
												</div>
											</article>
										@endforeach
									@endif
								@endforeach
							@else
								<div class="col-12 text-center">
									<p>No gallery images found.</p>
								</div>
							@endif
						</div>
					</div>
				</section>
				<!-- Portfolio Sortable Col 3 End -->
			</div>
			<!-- Page Content End -->

			<!-- Footer -->
			<footer class="site-footer pbmit-bg-color-blackish">
				@include('frontend.partials.footer')
			</footer>
			<!-- Footer End -->

		</div>
		<!-- Page Wrapper End -->
	</div>
@push('page-js')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Fancybox.bind('[data-fancybox="gallery"]', {
                Toolbar: {
                    display: {
                        left: ["infobar"],
                        middle: [
                            "zoomIn",
                            "zoomOut",
                            "toggle1:1",
                            "rotateCCW",
                            "rotateCW",
                            "flipX",
                            "flipY",
                        ],
                        right: ["slideshow", "thumbs", "close"],
                    },
                },
            });
        });
    </script>
@endpush
</x-layouts.app>

