@extends('layouts.backend')

@section('title', 'Edit ' . ($type === 'Member' ? 'Team Member' : 'Partner'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Edit {{ $type }} Details</h5>
                        <a href="#"
                            class="btn btn-label-secondary waves-effect">
                            <i class="ti ti-arrow-left me-1"></i> Back
                        </a>
                    </div>
                    <form action="#" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label d-block fw-bold text-primary">Usage Type</label>
                                <div class="form-check form-check-inline mt-1">
                                    <input class="form-check-input" type="radio" name="usage_type" id="usage_multiple"
                                        value="multiple" {{ old('usage_type', $teamPartner->usage_type) === 'multiple' ? 'checked' : '' }} onchange="toggleUsageType()">
                                    <label class="form-check-label" for="usage_multiple">Different / Individual
                                        (Default)</label>
                                </div>
                                <div class="form-check form-check-inline mt-1">
                                    <input class="form-check-input" type="radio" name="usage_type" id="usage_single"
                                        value="single" {{ old('usage_type', $teamPartner->usage_type) === 'single' ? 'checked' : '' }} onchange="toggleUsageType()">
                                    <label class="form-check-label" for="usage_single">Single / Main Photo Use</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="name" id="name_label">Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name', $teamPartner->name) }}" required
                                    placeholder="Enter name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Designation or Status -->
                            <div class="col-md-3 mb-3 toggle-multiple-field">
                                <label class="form-label"
                                    for="designation_or_status">{{ $type === 'Member' ? 'Designation' : 'Status Text' }}</label>
                                <input type="text" class="form-control @error('designation_or_status') is-invalid @enderror"
                                    id="designation_or_status" name="designation_or_status"
                                    value="{{ old('designation_or_status', $teamPartner->designation_or_status) }}"
                                    placeholder="{{ $type === 'Member' ? 'e.g. Mechanical Engineer' : 'e.g. Official Partner' }}">
                                @error('designation_or_status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="image" id="image_label">Photo / Logo</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                    name="image" accept="image/*">
                                <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i
                                        class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP. Recommended size:
                                    1024x1024px.</small>
                                @if($teamPartner->image)
                                    <div class="mt-2 d-flex align-items-center gap-2">
                                        <img src="{{ asset('storage/' . $teamPartner->image) }}" alt="Current"
                                            class="rounded border" style="width: 50px; height: 50px; object-fit: cover;">
                                        <small class="text-muted">Current photo</small>
                                    </div>
                                @endif
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>



                            @if($type === 'Member')
                                <!-- Social Links for Members -->
                                <div class="col-md-4 mb-3 toggle-multiple-field">
                                    <label class="form-label" for="facebook_link">Facebook Link</label>
                                    <input type="url" class="form-control @error('facebook_link') is-invalid @enderror"
                                        id="facebook_link" name="facebook_link"
                                        value="{{ old('facebook_link', $teamPartner->facebook_link) }}"
                                        placeholder="https://facebook.com/...">
                                    @error('facebook_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3 toggle-multiple-field">
                                    <label class="form-label" for="linkedin_link">LinkedIn Link</label>
                                    <input type="url" class="form-control @error('linkedin_link') is-invalid @enderror"
                                        id="linkedin_link" name="linkedin_link"
                                        value="{{ old('linkedin_link', $teamPartner->linkedin_link) }}"
                                        placeholder="https://linkedin.com/in/...">
                                    @error('linkedin_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3 toggle-multiple-field">
                                    <label class="form-label" for="instagram_link">Instagram Link</label>
                                    <input type="url" class="form-control @error('instagram_link') is-invalid @enderror"
                                        id="instagram_link" name="instagram_link"
                                        value="{{ old('instagram_link', $teamPartner->instagram_link) }}"
                                        placeholder="https://instagram.com/...">
                                    @error('instagram_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            @endif
                        </div>
                        <div class="row mt-2">
                            <!-- Status -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="status">Status</label>
                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="status" value="Inactive">
                                    <input type="checkbox" class="form-check-input" value="Active" id="status" name="status"
                                        {{ old('status', $teamPartner->status) == 'Active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Update {{ $type }}</button>
                            <a href="#"
                                class="btn btn-label-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleUsageType() {
            const usageType = document.querySelector('input[name="usage_type"]:checked').value;
            const toggleFields = document.querySelectorAll('.toggle-multiple-field');
            const nameLabel = document.getElementById('name_label');
            const imageLabel = document.getElementById('image_label');

            if (usageType === 'single') {
                toggleFields.forEach(el => el.style.display = 'none');
                nameLabel.innerHTML = 'Label <span class="text-danger">*</span>';
                imageLabel.innerHTML = 'Main Photo';
            } else {
                toggleFields.forEach(el => el.style.display = 'block');
                nameLabel.innerHTML = 'Name <span class="text-danger">*</span>';
                imageLabel.innerHTML = 'Photo / Logo';
            }
        }

        // Run on load
        document.addEventListener("DOMContentLoaded", function () {
            toggleUsageType();
        });
    </script>
@endpush
