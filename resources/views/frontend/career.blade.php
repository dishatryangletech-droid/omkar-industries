<x-layouts.app>
<style>
    .career-tabs .nav-pills .nav-link.active, 
    .career-tabs .nav-pills .show > .nav-link {
        background-color: #ffb800 !important;
        border-color: #ffb800 !important;
        color: #000 !important;
    }
    .career-tabs .nav-pills .nav-link {
        color: #333;
    }
</style>
<div>
    <div class="page-wrapper career-tabs">
		<header class="site-header pbmit-header-style-1" id="masthead">
			@include('livewire.frontend.partials.header')
		</header>
		<div class="pbmit-title-bar-wrapper">
			<div class="container p-0">
				<div class="pbmit-title-bar-content">
					<div class="pbmit-title-bar-content-inner">
						<div class="pbmit-tbar">
							<div class="pbmit-tbar-inner container">
								<h1 class="pbmit-tbar-title"> Career</h1>
							</div>
						</div>
						<div class="pbmit-breadcrumb">
							<div class="pbmit-breadcrumb-inner">
								<span><a title="" href="#" class="home"><span>Induyst</span></a></span>
								<span class="sep"></span>
								<span><span class="post-root post post-post current-item"> Career</span></span>
							</div>
						</div>
					</div>
				</div> 
			</div> 
		</div>
        <div class="page-content">
			<section class="section-lgb">
				<div class="container">
					<div class="pbmit-heading-subheading text-center">
						<h4 class="pbmit-subtitle" style="margin-top:100px">JOIN OUR TEAM</h4>
						<h2 class="pbmit-title">Current Openings</h2>
						<div class="pbmit-heading-desc col-sm-8 col-md-6 mx-auto">
							Discover exciting career opportunities with us. We are looking for talented individuals who are passionate about making an impact in the industrial and manufacturing sector.
						</div>
					</div>
					<div class="row mt-5">
						@if (session()->has('success'))
							<div class="col-12">
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									{{ session('success') }}
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							</div>
						@endif
						<div class="col-md-4 mb-4">
							<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								@forelse($careers as $index => $career)
								<button class="nav-link {{ $index === 0 ? 'active' : '' }}" id="v-pills-job{{ $career->id }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-job{{ $career->id }}" type="button" role="tab" aria-controls="v-pills-job{{ $career->id }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}" style="text-align: left; margin-bottom: 10px; padding: 15px 20px; font-weight: bold; border-radius: 5px; border: 1px solid #ddd; white-space: normal;">{{ $career->title }}</button>
								@empty
								<p>No job openings available at the moment.</p>
								@endforelse
							</div>
						</div>
						<div class="col-md-8">
							<div class="tab-content" id="v-pills-tabContent" style="padding: 30px; background: #f9f9f9; border-radius: 8px;">
								@foreach($careers as $index => $career)
								<div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="v-pills-job{{ $career->id }}" role="tabpanel" aria-labelledby="v-pills-job{{ $career->id }}-tab">
									<h3 class="mb-1">{{ $career->title }}</h3>
									<p class="fw-bold mb-3" style="color:#ffb800"><i class="ti ti-briefcase me-1"></i> Job Type: {{ $career->job_type }}</p>
									<p>{!! nl2br(e($career->description)) !!}</p>
                                    @if(is_array($career->requirements) && count($career->requirements) > 0)
                                    <h5 class="mt-4 mb-2">Requirements / Position Roles:</h5>
                                    <ul class="list-group list-group-borderless mb-4" style="list-style: none; padding-left: 0;">
                                        @foreach($career->requirements as $requirement)
                                        <li class="list-group-item" style="border: none; padding: 0; margin-bottom: 5px; background: transparent; display: flex; align-items: flex-start;"><span style="color: #ffb800; margin-right: 10px;">&#10004;</span> <span class="pbmit-icon-list-text">{{ $requirement }}</span></li>
                                        @endforeach
                                    </ul>
                                    @endif
									<button class="pbmit-btn border-0" data-bs-toggle="modal" data-bs-target="#applyModal" wire:click="$set('career_id', {{ $career->id }})" style="cursor: pointer;"><span class="pbmit-button-content-wrapper"><span class="pbmit-button-icon"><i class="pbmit-induyst-icon pbmit-induyst-icon-next"></i></span><span class="pbmit-button-text">Apply Now</span></span></button> 
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</section>

<!-- Apply Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true" style="z-index: 10500;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="applyModalLabel" style="color: black;">Apply for Position</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="apply">
          <div class="mb-3">
            <label for="name" class="form-label" style="color: black;">Full Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name" placeholder="John Doe">
            @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label" style="color: black;">Email address <span class="text-danger">*</span></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" wire:model="email" placeholder="name@example.com">
            @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label" style="color: black;">Phone <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" wire:model="phone" placeholder="+1234567890">
            @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <label for="resume" class="form-label" style="color: black;">Upload Resume (PDF, DOC, DOCX) <span class="text-danger">*</span></label>
            <input class="form-control @error('resume') is-invalid @enderror" type="file" id="resume" wire:model="resume">
            <div wire:loading wire:target="resume" class="text-success small mt-1">Uploading...</div>
            @error('resume') <span class="text-danger small">{{ $message }}</span> @enderror
          </div>
          <div class="modal-footer px-0 pb-0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn" style="background-color: #ffb800; border: none; color: black; font-weight: bold;">
                <span wire:loading.remove wire:target="apply">Submit Application</span>
                <span wire:loading wire:target="apply">Submitting...</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Apply Modal End -->

        </div>
    @include('livewire.frontend.partials.footer')
</div>

<script>
    document.addEventListener('livewire:init', () => {
       Livewire.on('close-modal', (event) => {
           let applyModal = bootstrap.Modal.getInstance(document.getElementById('applyModal'));
           if (applyModal) {
               applyModal.hide();
           }
       });
    });
</script>
</x-layouts.app>
