<div>
	<style>
		.text-center .pbmit-firstletter::first-letter {
			float: none !important;
			display: inline-block !important;
			margin-right: 2px !important;
			padding: 0 !important;
			background: none !important;
			font-size: 32px !important;
			font-weight: 700 !important;
			color: var(--pbmit-blackish-color) !important;
		}
		.text-center .list-group {
			text-align: left;
			display: inline-block;
			max-width: 100%;
			margin-bottom: 30px !important;
		}
		.text-center blockquote {
			text-align: center;
			padding: 100px 30px 30px 30px !important;
		}
		.text-center blockquote:before {
			top: 15px !important;
			left: 50% !important;
			transform: translateX(-50%) !important;
		}
	</style>
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
							<h1 class="pbmit-tbar-title"> {{ $blog->title }}</h1>
						</div>
					</div>
					<div class="pbmit-breadcrumb">
						<div class="pbmit-breadcrumb-inner">
							<span>
								<a title="" href="/" class="home"><span>Induyst</span></a>
							</span>
							<span class="sep"></span>
							<span>
								<a title="" href="/blogs"><span>Blog</span></a>
							</span>
							<span class="sep"></span>
							<span><span class="post-root post post-post current-item"> {{ $blog->title }}</span></span>
						</div>
					</div>
				</div>
			</div> 
		</div> 
	</div>
	<!-- Title Bar End-->

	<!-- Page Content -->
	<div class="page-content"> 

		<!-- Blog Single Details -->
		<section class="site-content blog-details">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<article>
							<div class="post blog-classic"> 
								<div class="pbmit-img-wrapper">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											@if($blog->image)
											<img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid w-100" style="height: 600px; object-fit: cover;" alt="{{ $blog->title }}">
											@else
											<img src="{{ asset('frontend/images/blog/blog-04b.jpg') }}" class="img-fluid w-100" style="height: 600px; object-fit: cover;" alt="{{ $blog->title }}">
											@endif
										</div>
									</div>  
									<span class="pbmit-meta pbmit-meta-date">
										<span class="pbmit-date">{{ $blog->date ? $blog->date->format('d') : '' }}</span>
										<span class="pbmit-month">{{ $blog->date ? $blog->date->format('M') : '' }}</span>
									</span>
								</div>
								
								<div class="row">
									<div class="col-lg-12 col-md-10 mx-auto">
										<div class="pbmit-blog-classic-inner">
											<div class="pbmit-blog-meta pbmit-blog-meta-top">
												<span class="pbmit-meta pbmit-meta-author">by<a class="pbmit-author-link" href="#">Admin</a>
												</span>	
												<span class="pbmit-meta pbmit-meta-cat">
													<a href="/blogs" rel="bookmark">News</a>
												</span>
												<span class="pbmit-meta pbmit-meta-comments">
													0 Comments
												</span>
											</div>
											<h3 class="pbmit-post-title">
												<a href="#">{{ $blog->title }}</a>
											</h3>
											<div class="pbmit-entry-content">
												<div class="dynamic-content">
													{!! $blog->description !!}
												</div>
											</div>
											<div class="pbmit-blog-meta-bottom">
												<div class="pbmit-blog-meta-bottom-left">
													<ul class="tagcloud" style="justify-content: center; display: flex;">
														<li><a href="/blog-classic">Industry</a></li>
														<li><a href="/blog-classic">Retail</a></li>
														<li><a href="/blog-classic">Technology</a></li>
													</ul>
												</div>
												<div class="pbmit-blog-meta-bottom-right mt-3 mt-md-0" style="justify-content: center; display: flex;">
													<div class="pbmit-social-share">
														<ul>
															<li class="pbmit-social-li pbmit-social-li-facebook">
																<a class="pbmit-popup" href="https://facebook.com/sharer/sharer.php?u=https://induyst-demo.pbminfotech.com/demo-01/2025/02/06/importance-of-quality-and-testing-in-modern-factories/&amp;title=Importance%20of%20Quality%20and%20Testing%20in%20Modern%20Factories" title="Share on Facebook">
																	<i class="pbmit-base-icon-facebook-squared"></i>
																</a>
															</li>
															<li class="pbmit-social-li pbmit-social-li-twitter">
																<a class="pbmit-popup" href="https://twitter.com/intent/tweet/?text=Importance%20of%20Quality%20and%20Testing%20in%20Modern%20Factories&amp;url=https://induyst-demo.pbminfotech.com/demo-01/2025/02/06/importance-of-quality-and-testing-in-modern-factories/" title="Share on X (Twitter)">
																	<i class="pbmit-base-icon-twitter-2"></i>
																</a>
															</li>
															<li class="pbmit-social-li pbmit-social-li-linkedin">
																<a class="pbmit-popup" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://induyst-demo.pbminfotech.com/demo-01/2025/02/06/importance-of-quality-and-testing-in-modern-factories/&amp;title=Importance%20of%20Quality%20and%20Testing%20in%20Modern%20Factories&amp;summary=Importance%20of%20Quality%20and%20Testing%20in%20Modern%20Factories&amp;source=https://induyst-demo.pbminfotech.com/demo-01/2025/02/06/importance-of-quality-and-testing-in-modern-factories/" title="Share on LinkedIn">
																	<i class="pbmit-base-icon-linkedin-squared"></i>
																</a>
															</li>
															<li class="pbmit-social-li pbmit-social-li-instagram">
																<a class="pbmit-popup" href="https://www.instagram.com/accounts/login/?hl=en" title="Share on Instagram">
																	<i class="pbmit-base-icon-instagram"></i>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>   
										
										<nav class="navigation post-navigation" aria-label="Posts">
											<div class="nav-links">
												@if($previous)
												<div class="nav-previous">
													<a href="{{ route('frontend.blog-single-details', $previous->id) }}" rel="prev">
														<span class="pbmit-post-nav-icon">
															<i class="pbmit-base-icon-arrow-left"></i>
															<span class="pbmit-post-nav-head">Previous Post</span>
														</span>
														<span class="pbmit-post-nav-wrapper">
															<span class="pbmit-post-nav nav-title">{{ $previous->title }}</span> 
														</span>
													</a>
												</div>
												@endif
												@if($next)
												<div class="nav-next">
													<a href="{{ route('frontend.blog-single-details', $next->id) }}" rel="next">
														<span class="pbmit-post-nav-icon">
															<span class="pbmit-post-nav-head">Next Post</span>
															<i class="pbmit-base-icon-arrow-right"></i>
														</span>
														<span class="pbmit-post-nav-wrapper">
															<span class="pbmit-post-nav nav-title">{{ $next->title }}</span> 
														</span>
													</a>
												</div>
												@endif
											</div>
										</nav>
									</div>
								</div>
							</div> 
						</article>
					</div>
				</div>
			</div>
		</section>
		<!-- Blog Single Details End -->
		
	</div>
	<!-- Page Content End -->

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
	 
	<!-- countdown JS -->
	 
	<!-- AOS -->
	
	<!-- GSAP -->
	
	<!-- Scroll Trigger -->
	
	<!-- Split Text -->
	
	<!-- Theia Sticky Sidebar JS -->
	
	<!-- GSAP Animation -->
	
	<!-- Form Validator -->
	
	<!-- Scripts JS -->
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			// Find all paragraphs in entry content
			var paragraphs = document.querySelectorAll('.dynamic-content p');
			var imgGroups = [];
			var currentGroup = [];

			paragraphs.forEach(function(p) {
				// Check if paragraph contains ONLY an image (ignoring whitespace)
				var html = p.innerHTML.trim();
				var hasOnlyImg = html.startsWith('<img') && html.endsWith('>') && p.querySelectorAll('img').length === 1;
				
				if (hasOnlyImg) {
					currentGroup.push(p);
				} else {
					if (currentGroup.length > 0) {
						imgGroups.push(currentGroup);
						currentGroup = [];
					}
				}
			});

			if (currentGroup.length > 0) {
				imgGroups.push(currentGroup);
			}

			// For each group of consecutive images, format them into a row
			imgGroups.forEach(function(group) {
				if (group.length > 1) { // Only do this if there are 2 or more consecutive images
					var row = document.createElement('div');
					row.className = 'pbmit-block-columns row';
					
					var colClass = group.length === 2 ? 'col-xl-6' : 'col-xl-4'; // Handle 2 or 3 images
					
					group.forEach(function(p) {
						var img = p.querySelector('img');
						img.classList.add('img-fluid', 'w-100');
						
						var col = document.createElement('div');
						col.className = 'pbmit-block-column col-md-12 ' + colClass + ' full-width-1200';
						
						var figure = document.createElement('figure');
						figure.style.marginBottom = '20px';
						
						figure.appendChild(img);
						col.appendChild(figure);
						row.appendChild(col);
					});
					
					// Insert the new row before the first <p>
					group[0].parentNode.insertBefore(row, group[0]);
					
					// Remove the old <p>s
					group.forEach(function(p) {
						p.parentNode.removeChild(p);
					});
				}
			});

			// Format standard lists into theme's checklist style
			var uls = document.querySelectorAll('.dynamic-content ul:not(.list-group)');
			uls.forEach(function(ul) {
				ul.classList.add('list-group');
				var lis = ul.querySelectorAll('li');
				lis.forEach(function(li) {
					li.classList.add('list-group-item');
					var text = li.innerHTML;
					li.innerHTML = `
						<span class="pbmit-icon-list-icon">
							<i class="pbmit-base-icon-checkbox"></i>						
						</span>
						<span class="pbmit-icon-list-text">${text}</span>
					`;
				});
			});

			// Format blockquotes
			var blockquotes = document.querySelectorAll('.dynamic-content blockquote');
			blockquotes.forEach(function(bq) {
				var text = bq.innerText || bq.textContent;
				bq.innerHTML = '<p>“' + text.replace(/^"|"$/g, '').trim() + '”</p>';
			});
		});
	</script>
</div>
