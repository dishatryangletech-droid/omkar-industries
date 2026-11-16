@extends('layouts.backend')

@section('title', 'Add Country Contact')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Add Country Contact</h5>
                        <a href="{{ route('admin.website-pages.country-contacts.index') }}"
                            class="btn btn-label-secondary waves-effect">
                            <i class="ti ti-arrow-left me-1"></i> Back
                        </a>
                    </div>
                    <form action="{{ route('admin.website-pages.country-contacts.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Country Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="country_name">Country Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('country_name') is-invalid @enderror" id="country_name"
                                    name="country_name" value="{{ old('country_name') }}" required placeholder="e.g. India, United Arab Emirates, Kenya">
                                @error('country_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Country Logo / Flag -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="logo">Country Logo / Flag Image</label>
                                <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo"
                                    name="logo" accept="image/*">
                                <small class="text-muted">Allowed: JPG, PNG, SVG, WEBP (Max 2MB)</small>
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                    name="phone" value="{{ old('phone') }}" placeholder="e.g. +91 98765 43210 / +971 50 123 4567">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="email">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email') }}" placeholder="e.g. export@omkar-industries.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="address">Office Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                    name="address" rows="3" placeholder="Enter complete office address...">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="status">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                    <option value="Active" {{ old('status') === 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive" {{ old('status') === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sort Order -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="sort_order">Sort Order</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" id="sort_order"
                                    name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Save Country Contact</button>
                            <a href="{{ route('admin.website-pages.country-contacts.index') }}" class="btn btn-label-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
