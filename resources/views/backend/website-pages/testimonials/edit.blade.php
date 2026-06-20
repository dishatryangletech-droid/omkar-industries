@extends('layouts.backend')

@section('title', 'Edit Testimonial')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Edit Testimonial Details</h5>
                        <a href="{{ route('admin.website-pages.testimonials.index') }}" class="btn btn-label-secondary waves-effect">
                            <i class="ti ti-arrow-left me-1"></i> Back
                        </a>
                    </div>
                    <form action="{{ route('admin.website-pages.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="name">Customer Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $testimonial->name) }}" required placeholder="Enter customer name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Designation -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="designation">Designation / Role</label>
                                <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation" name="designation" value="{{ old('designation', $testimonial->designation) }}" placeholder="e.g. Manager, CEO">
                                @error('designation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Rating -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="rating">Rating (1.0 - 5.0) <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <input type="number" step="0.1" min="1" max="5" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" value="{{ old('rating', $testimonial->rating) }}" required>
                                    <span class="input-group-text"><i class="ti ti-star-filled text-warning"></i></span>
                                </div>
                                @error('rating')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="image">Customer Photo</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                        <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP. Recommended size: 1024x1024px.</small>
                                @if($testimonial->image)
                                    <div class="mt-2 d-flex align-items-center gap-2">
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Customer" class="rounded-circle border" style="width: 50px; height: 50px; object-fit: cover;">
                                        <small class="text-muted">Current photo</small>
                                    </div>
                                @endif
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- Content -->
                            <div class="col-12 mb-3">
                                <label class="form-label" for="content">Testimonial Content <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="4" required placeholder="Enter the testimonial/quote here...">{{ old('content', $testimonial->content) }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            

                        </div>

                        <div class="row mt-2">
                            <!-- Status -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="status">Status</label>
                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="status" value="Inactive">
                                    <input type="checkbox" class="form-check-input" value="Active" id="status" name="status" required {{ old('status', $testimonial->status) == 'Active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Update Testimonial</button>
                            <a href="#" class="btn btn-label-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


