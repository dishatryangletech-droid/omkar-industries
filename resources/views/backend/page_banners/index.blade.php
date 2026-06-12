@extends('layouts.backend')

@section('title', 'Page Banners Settings')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Website Page Banners</h5>
                    <button type="button" class="btn btn-sm btn-primary" onclick="addBannerRow()">
                        <i class="ti ti-plus me-1"></i> Add Page Banner
                    </button>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="#" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div id="banners-container">
                            @foreach($banners as $index => $banner)
                                <div class="row mb-3 align-items-end banner-row border-bottom pb-3">
                                    <input type="hidden" name="banners[{{ $index }}][id]" value="{{ $banner->id }}">
                                    <div class="col-md-3">
                                        <label class="form-label">Page Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="banners[{{ $index }}][page_name]"
                                            value="{{ $banner->page_name }}" required placeholder="e.g. Products">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Banner Title</label>
                                        <input type="text" class="form-control" name="banners[{{ $index }}][title]"
                                            value="{{ $banner->title }}" placeholder="Enter title">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Banner Image</label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="file" class="form-control" name="banners[{{ $index }}][image]"
                                                accept="image/*">
                                      
                                            @if($banner->image)
                                                <img src="{{ asset('storage/' . $banner->image) }}" class="rounded border"
                                                    style="height: 38px; width: 50px; object-fit: cover; flex-shrink: 0;">
                                            @endif
                                        </div>
                                          <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i
                                                class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP. Recommended
                                            size: 1024x1024px.</small>
                                    </div>
                                    <div class="col-md-1 text-end">
                                        <button type="button" class="btn p-10 border-1 mb-4 bg-transparent text-danger"
                                            onclick="this.closest('.banner-row').remove()">
                                            <i class="ti ti-trash fs-4"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-device-floppy me-1"></i> Save All Banners
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script>
        let bannerIndex = {{ count($banners) }};
        function addBannerRow() {
            const container = document.getElementById('banners-container');
            const html = `
                    <div class="row mb-3 align-items-end banner-row border-bottom pb-3">
                        <input type="hidden" name="banners[${bannerIndex}][id]" value="">
                        <div class="col-md-3">
                            <label class="form-label">Page Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="banners[${bannerIndex}][page_name]" required placeholder="e.g. Products">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Banner Title</label>
                            <input type="text" class="form-control" name="banners[${bannerIndex}][title]" placeholder="Enter title">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Banner Image</label>
                            <input type="file" class="form-control" name="banners[${bannerIndex}][image]" accept="image/*">
                                        <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP. Recommended size: 1024x1024px.</small>
                        </div>
                        <div class="col-md-1 text-end">
                            <button type="button" class="btn p-0 border-0 bg-transparent text-danger" onclick="this.closest('.banner-row').remove()">
                                <i class="ti ti-trash fs-4"></i>
                            </button>
                        </div>
                    </div>
                `;
            container.insertAdjacentHTML('beforeend', html);
            bannerIndex++;
        }
    </script>
@endpush
