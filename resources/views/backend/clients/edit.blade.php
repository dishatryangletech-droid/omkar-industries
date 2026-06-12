@extends('layouts.backend')

@section('title', 'Edit Client')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Client Details</h5>
                        <a href="#" class="btn btn-label-secondary waves-effect">
                            <i class="ti ti-arrow-left me-1"></i> Back
                        </a>
                    </div>
                    
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-heading" for="name">Client Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $client->name) }}" placeholder="Enter client/country name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Logo -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-heading" for="logo">Logo</label>
                                <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                                <small class="text-muted d-block mt-1">Allowed: JPG, JPEG, PNG, WEBP, SVG. Max: 2MB. Leave blank to keep current logo.</small>
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                @if($client->logo)
                                    @php
                                        $logoUrl = asset('storage/' . $client->logo);
                                        if (!empty($client->logo)) {
                                            if (filter_var($client->logo, FILTER_VALIDATE_URL)) {
                                                $logoUrl = $client->logo;
                                            } elseif (file_exists(public_path('storage/clients/' . $client->logo))) {
                                                $logoUrl = asset('storage/clients/' . $client->logo);
                                            } elseif (file_exists(public_path('storage/' . $client->logo))) {
                                                $logoUrl = asset('storage/' . $client->logo);
                                            } elseif (file_exists(public_path('uploads/clients/' . $client->logo))) {
                                                $logoUrl = asset('uploads/clients/' . $client->logo);
                                            } elseif (file_exists(public_path('frontend/images/' . $client->logo))) {
                                                $logoUrl = asset('frontend/images/' . $client->logo);
                                            }
                                        }
                                    @endphp
                                    <div class="mt-3">
                                        <p class="mb-1 fw-medium text-muted small">Current Logo:</p>
                                        <div class="border rounded p-2 bg-light d-inline-block" style="width: 80px; height: 80px; text-align: center;">
                                            <img src="{{ $logoUrl }}" alt="Logo" class="img-fluid" style="max-height: 100%; object-fit: contain;">
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Is Headquarter -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-heading d-block mb-2" for="is_headquarter">Is Headquarter?</label>
                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="is_headquarter" value="no">
                                    <input type="checkbox" class="form-check-input" value="yes" id="is_headquarter" name="is_headquarter" {{ old('is_headquarter', strtolower($client->is_headquarter)) === 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_headquarter">Yes (Toggle active if this client is a headquarter location)</label>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-heading d-block mb-2" for="status">Status</label>
                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="status" value="Inactive">
                                    <input type="checkbox" class="form-check-input" value="Active" id="status" name="status" {{ old('status', $client->status) === 'Active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Update Client</button>
                            <a href="#" class="btn btn-label-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

