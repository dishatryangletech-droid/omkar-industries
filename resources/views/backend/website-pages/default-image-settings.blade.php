@extends('layouts.backend')

@section('title', 'Default Image Settings')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Default Image Settings (Fallback Images)</h5>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('admin.website-pages.default-image-settings.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Default Banner Image -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label font-weight-bold" for="default_banner_image">Default Banner Image</label>
                                <div class="input-group mb-2">
                                    <input type="file" class="form-control @error('default_banner_image') is-invalid @enderror" id="default_banner_image" name="default_banner_image" accept="image/*">
                                </div>
                                <small class="text-muted d-block mb-3">Allowed: JPG, JPEG, PNG, WEBP. Used as a fallback banner image for pages without a specific banner.</small>
                                @error('default_banner_image')
                                    <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
                                @enderror
                                @if($settings->default_banner_image)
                                    <div class="mt-2">
                                        <p class="mb-1 text-muted small">Current default banner:</p>
                                        <img src="{{ asset('storage/' . $settings->default_banner_image) }}" alt="Default Banner" class="img-fluid rounded border shadow-sm" style="max-height: 120px;">
                                    </div>
                                @endif
                             </div>

                            <!-- Default Product Image -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label font-weight-bold" for="default_product_image">Default Product Image</label>
                                <div class="input-group mb-2">
                                    <input type="file" class="form-control @error('default_product_image') is-invalid @enderror" id="default_product_image" name="default_product_image" accept="image/*">
                                </div>
                                <small class="text-muted d-block mb-3">Allowed: JPG, JPEG, PNG, WEBP. Used on product catalog and details if no main image is uploaded.</small>
                                @error('default_product_image')
                                    <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
                                @enderror
                                @if($settings->default_product_image)
                                    <div class="mt-2">
                                        <p class="mb-1 text-muted small">Current default product image:</p>
                                        <img src="{{ asset('storage/' . $settings->default_product_image) }}" alt="Default Product" class="img-fluid rounded border shadow-sm" style="max-height: 120px;">
                                    </div>
                                @endif
                             </div>

                            <!-- Default Icon Image -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label font-weight-bold" for="default_icon_image">Default Icon Image</label>
                                <div class="input-group mb-2">
                                    <input type="file" class="form-control @error('default_icon_image') is-invalid @enderror" id="default_icon_image" name="default_icon_image" accept="image/*">
                                </div>
                                <small class="text-muted d-block mb-3">Allowed: JPG, JPEG, PNG, WEBP, SVG. Used as a fallback icon.</small>
                                @error('default_icon_image')
                                    <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
                                @enderror
                                @if($settings->default_icon_image)
                                    <div class="mt-2">
                                        <p class="mb-1 text-muted small">Current default icon image:</p>
                                        <img src="{{ asset('storage/' . $settings->default_icon_image) }}" alt="Default Icon" class="img-fluid rounded border shadow-sm" style="max-height: 120px;">
                                    </div>
                                @endif
                             </div>
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary px-5">
                                <i class="ti ti-device-floppy me-1"></i> Save Default Image Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

