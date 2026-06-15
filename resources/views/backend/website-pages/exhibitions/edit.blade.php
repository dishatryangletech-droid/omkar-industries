@extends('layouts.backend')

@section('title', 'Edit Exhibition')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Edit Exhibition Details</h5>
                        <a href="{{ route('admin.website-pages.exhibitions.index') }}" class="btn btn-label-secondary waves-effect">
                            <i class="ti ti-arrow-left me-1"></i> Back
                        </a>
                    </div>
                    <form action="{{ route('admin.website-pages.exhibitions.update', $exhibition->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Title -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="title">Exhibition Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $exhibition->title) }}" required placeholder="e.g. India Wood (2026)">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Scheduled Period -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="scheduled_period">Scheduled Period</label>
                                <input type="text" class="form-control @error('scheduled_period') is-invalid @enderror" id="scheduled_period" name="scheduled_period" value="{{ old('scheduled_period', $exhibition->scheduled_period) }}" placeholder="e.g. From February 28 to March 02, 2026">
                                @error('scheduled_period')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Venue -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="venue">Event Venue</label>
                                <input type="text" class="form-control @error('venue') is-invalid @enderror" id="venue" name="venue" value="{{ old('venue', $exhibition->venue) }}" placeholder="e.g. Bangalore International Exhibition Centre">
                                @error('venue')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Space -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="space">Exhibition Space</label>
                                <input type="text" class="form-control @error('space') is-invalid @enderror" id="space" name="space" value="{{ old('space', $exhibition->space) }}" placeholder="e.g. Hall Number 4A — Booth N 610">
                                @error('space')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="image">Cover Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                        <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP. Recommended size: 1024x1024px.</small>
                                @if($exhibition->image)
                                    <div class="mt-2 d-flex align-items-center gap-2">
                                        <img src="{{ asset('storage/' . $exhibition->image) }}" alt="Exhibition" class="rounded border" style="width: 50px; height: 50px; object-fit: cover;">
                                        <small class="text-muted">Current cover</small>
                                    </div>
                                @endif
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>



                            <!-- Description -->
                            <div class="col-12 mb-3">
                                <label class="form-label" for="description">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required placeholder="Enter exhibition details...">{{ old('description', $exhibition->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="row mt-2">
                            <!-- Status -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="status">Status</label>
                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="status" value="Inactive">
                                    <input type="checkbox" class="form-check-input" value="Active" id="status" name="status" required {{ old('status', $exhibition->status) == 'Active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Update Exhibition</button>
                            <a href="{{ route('admin.website-pages.exhibitions.index') }}" class="btn btn-label-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


