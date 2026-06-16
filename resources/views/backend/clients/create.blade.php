@extends('layouts.backend')

@section('title', 'Add New Client')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Client Details</h5>
                        <a href="{{ route('admin.clients.index') }}" class="btn btn-label-secondary waves-effect">
                            <i class="ti ti-arrow-left me-1"></i> Back
                        </a>
                    </div>
                    
                    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-heading" for="name">Client Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter client/country name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Logo -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-heading" for="icon">Logo <span class="text-danger">*</span></label>
                                <input type="file" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" required>
                                <small class="text-muted d-block mt-1">Allowed: JPG, JPEG, PNG, WEBP, SVG. Max: 2MB.</small>
                                @error('icon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Is Headquarter -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-heading d-block mb-2" for="is_headquarter">Is Headquarter?</label>
                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="is_headquarter" value="no">
                                    <input type="checkbox" class="form-check-input" value="yes" id="is_headquarter" name="is_headquarter" {{ old('is_headquarter') === 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_headquarter">Yes (Toggle active if this client is a headquarter location)</label>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-heading d-block mb-2" for="status">Status</label>
                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="status" value="Inactive">
                                    <input type="checkbox" class="form-check-input" value="Active" id="status" name="status" checked>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Create Client</button>
                            <a href="{{ route('admin.clients.index') }}" class="btn btn-label-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

