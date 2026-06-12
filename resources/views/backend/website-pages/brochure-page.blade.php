@extends('layouts.backend')

@section('title', 'Home Page Settings')

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
                    <h5 class="mb-4">Home Page General Settings</h5>
                    <form action="#" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Download Brochure Button Title -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Brochure Button Title <span class="text-danger">*</span></label>
                                <input type="text" name="btn_title" class="form-control"
                                    value="{{ old('btn_title', $homePage->btn_title) }}" required>
                                @error('btn_title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Brochure PDF Upload -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Upload Brochure PDF</label>
                                <input type="file" name="brochure_pdf" class="form-control" accept="application/pdf">
                                        <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: PDF only. Max size: 5MB.</small>
                                @if($homePage->brochure_pdf)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . $homePage->brochure_pdf) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="ti ti-file-pdf me-1"></i> View Current PDF
                                        </a>
                                    </div>
                                @endif
                                @error('brochure_pdf')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary px-5">
                            <i class="ti ti-device-floppy me-1"></i> Save Changes
                        </button>
                    </div>
                </div>
            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

