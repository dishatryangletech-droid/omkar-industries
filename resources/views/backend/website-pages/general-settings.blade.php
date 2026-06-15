@extends('layouts.backend')

@section('title', 'General Settings')

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
                    <h5 class="mb-4">General Settings (Contact Details)</h5>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Contact Email -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label font-weight-bold" for="contact_email">Contact Email</label>
                                <input type="email" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email" name="contact_email" value="{{ old('contact_email', $settings->contact_email) }}" placeholder="e.g. info@omkarindustries.com">
                                @error('contact_email')
                                    <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Contact Phone -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label font-weight-bold" for="contact_phone">Contact Phone</label>
                                <input type="text" class="form-control @error('contact_phone') is-invalid @enderror" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $settings->contact_phone) }}" placeholder="e.g. +91 84602 39065">
                                @error('contact_phone')
                                    <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Working Days -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label font-weight-bold" for="working_days">Working Days & Hours</label>
                                <input type="text" class="form-control @error('working_days') is-invalid @enderror" id="working_days" name="working_days" value="{{ old('working_days', $settings->working_days) }}" placeholder="e.g. Mon to Fri - 09am to 06pm">
                                @error('working_days')
                                    <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Contact Address -->
                            <div class="col-md-12 mb-4">
                                <label class="form-label font-weight-bold" for="contact_address">Contact Address</label>
                                <textarea class="form-control @error('contact_address') is-invalid @enderror" id="contact_address" name="contact_address" rows="3" placeholder="Enter full address">{{ old('contact_address', $settings->contact_address) }}</textarea>
                                @error('contact_address')
                                    <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Short Contact Address -->
                            <div class="col-md-12 mb-4">
                                <label class="form-label font-weight-bold" for="short_contact_address">Short Contact Address (For Header)</label>
                                <input type="text" class="form-control @error('short_contact_address') is-invalid @enderror" id="short_contact_address" name="short_contact_address" value="{{ old('short_contact_address', $settings->short_contact_address) }}" placeholder="e.g. Plot No.2, Durga Estate">
                                <small class="text-muted d-block mt-1">This will be shown in the top header where space is limited.</small>
                                @error('short_contact_address')
                                    <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Map Iframe -->
                            <div class="col-md-12 mb-4">
                                <label class="form-label font-weight-bold" for="map_iframe">Google Maps Iframe URL</label>
                                <textarea class="form-control @error('map_iframe') is-invalid @enderror" id="map_iframe" name="map_iframe" rows="4" placeholder="Enter just the URL inside the src attribute, e.g. https://maps.google.com/maps?...">{{ old('map_iframe', $settings->map_iframe) }}</textarea>
                                <small class="text-muted d-block mt-1">Provide the direct map link (URL only, not the full &lt;iframe&gt; tag).</small>
                                @error('map_iframe')
                                    <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Director Details -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label font-weight-bold" for="director_details">Director Details (Footer)</label>
                                <textarea class="form-control @error('director_details') is-invalid @enderror" id="director_details" name="director_details" rows="5" placeholder="e.g. Mr Krunal Patel (Director)...">{{ old('director_details', $settings->director_details) }}</textarea>
                                <small class="text-muted d-block mt-1">Contact details for the company director. Appears in the footer.</small>
                                @error('director_details')
                                    <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Company About Text -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label font-weight-bold" for="company_about_text">Company About Text (Footer)</label>
                                <textarea class="form-control @error('company_about_text') is-invalid @enderror" id="company_about_text" name="company_about_text" rows="5" placeholder="e.g. Our 1997 born company with whooping annual turnover...">{{ old('company_about_text', $settings->company_about_text) }}</textarea>
                                <small class="text-muted d-block mt-1">Short about text for the company. Appears in the footer.</small>
                                @error('company_about_text')
                                    <div class="invalid-feedback d-block mb-3">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary px-5">
                                <i class="ti ti-device-floppy me-1"></i> Save General Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

