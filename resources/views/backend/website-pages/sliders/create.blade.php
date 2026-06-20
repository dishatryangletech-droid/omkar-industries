@extends('layouts.backend')

@section('title', 'Add New Slider')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Slider Details</h5>
                        <a href="{{ route('admin.website-pages.sliders.index') }}" class="btn btn-label-secondary waves-effect">
                            <i class="ti ti-arrow-left me-1"></i> Back
                        </a>
                    </div>
                    <form action="{{ route('admin.website-pages.sliders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Main Title -->
                            <div class="col-md-3 mb-2">
                                <label class="form-label" for="title">Main Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Enter main title">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Main Title Color -->
                            <div class="col-md-3 mb-2">
                                <label class="form-label" for="main_title_color">Main Title Color</label>
                                <input type="color" class="form-control form-control-color w-100 @error('main_title_color') is-invalid @enderror" id="main_title_color" name="main_title_color" value="{{ old('main_title_color', '#ffffff') }}">
                                @error('main_title_color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sub Title -->
                            <div class="col-md-3 mb-2">
                                <label class="form-label" for="subtitle">Sub Title</label>
                                <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" value="{{ old('subtitle') }}" placeholder="Enter sub title">
                                @error('subtitle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sub Title Color -->
                            <div class="col-md-3 mb-2">
                                <label class="form-label" for="sub_title_color">Sub Title Color (Text)</label>
                                <input type="color" class="form-control form-control-color w-100 @error('sub_title_color') is-invalid @enderror" id="sub_title_color" name="sub_title_color" value="{{ old('sub_title_color', '#ffffff') }}">
                                @error('sub_title_color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sub Title Background Color -->
                            <div class="col-md-3 mb-2">
                                <label class="form-label" for="sub_title_bg_color">Sub Title Background Color</label>
                                <input type="color" class="form-control form-control-color w-100 @error('sub_title_bg_color') is-invalid @enderror" id="sub_title_bg_color" name="sub_title_bg_color" value="{{ old('sub_title_bg_color', '#ffffff') }}">
                                @error('sub_title_bg_color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                           

                            <!-- Image -->
                            <div class="col-md-3 mb-2">
                                <label class="form-label" for="photo">Slider Image</label>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                                        <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP. Recommended size: 1024x1024px.</small>
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Background Image -->
                            <div class="col-md-3 mb-2">
                                <label class="form-label" for="background_photo">Background Image</label>
                                <input type="file" class="form-control @error('background_photo') is-invalid @enderror" id="background_photo" name="background_photo">
                                        <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP. Recommended size: 1024x1024px.</small>
                                @error('background_photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Button Title -->
                            <div class="col-md-3 mb-2">
                                <label class="form-label" for="btn_title">Button Title</label>
                                <input type="text" class="form-control @error('btn_title') is-invalid @enderror" id="btn_title" name="btn_title" value="{{ old('btn_title') }}" placeholder="e.g. Read More">
                                @error('btn_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Button Link -->
                            <div class="col-md-3 mb-2">
                                <label class="form-label" for="btn_link">Button Link</label>
                                <input type="text" class="form-control @error('btn_link') is-invalid @enderror" id="btn_link" name="btn_link" value="{{ old('btn_link') }}" placeholder="e.g. /about-us">
                                @error('btn_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>



                             <!-- Description -->
                            <div class="col-md-9 mb-2">
                                <label class="form-label" for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Enter description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                             <!-- Description Color -->
                            <div class="col-md-3 mb-2">
                                <label class="form-label" for="description_color">Description Color</label>
                                <input type="color" class="form-control form-control-color w-100 @error('description_color') is-invalid @enderror" id="description_color" name="description_color" value="{{ old('description_color', '#ffffff') }}" style="height: 76px;">
                                @error('description_color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Customize Button Colors Toggle -->
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-check form-switch mb-2">
                                    <input type="checkbox" class="form-check-input" id="customize_btn_colors" name="customize_btn_colors" value="1" onclick="toggleButtonColors()" {{ old('customize_btn_colors') ? 'checked' : '' }}>
                                    <label class="form-check-label fw-medium text-primary" for="customize_btn_colors"><i class="ti ti-palette me-1"></i>Customize Button Colors</label>
                                </div>
                            </div>
                        </div>

                        <!-- Custom Button Colors Container -->
                        <div class="row mt-1" id="custom-button-colors-container" style="display: none;">
                            <!-- Button Background Color -->
                            <div class="col-md-3 mb-2">
                                <label class="form-label" for="btn_color">Button Color (Background)</label>
                                <input type="color" class="form-control form-control-color w-100 @error('btn_color') is-invalid @enderror" id="btn_color" name="btn_color" value="{{ old('btn_color', '#dc3545') }}">
                                @error('btn_color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Button Text Color -->
                            <div class="col-md-3 mb-2">
                                <label class="form-label" for="btn_text_color">Button Text Color</label>
                                <input type="color" class="form-control form-control-color w-100 @error('btn_text_color') is-invalid @enderror" id="btn_text_color" name="btn_text_color" value="{{ old('btn_text_color', '#ffffff') }}">
                                @error('btn_text_color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Button Hover Color -->
                            <div class="col-md-3 mb-2">
                                <label class="form-label" for="btn_hover_color">Button Hover Color</label>
                                <input type="color" class="form-control form-control-color w-100 @error('btn_hover_color') is-invalid @enderror" id="btn_hover_color" name="btn_hover_color" value="{{ old('btn_hover_color', '#ffffff') }}">
                                @error('btn_hover_color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Button Hover Text Color -->
                            <div class="col-md-3 mb-2">
                                <label class="form-label" for="btn_hover_text_color">Button Hover Text Color</label>
                                <input type="color" class="form-control form-control-color w-100 @error('btn_hover_text_color') is-invalid @enderror" id="btn_hover_text_color" name="btn_hover_text_color" value="{{ old('btn_hover_text_color', '#000000') }}">
                                @error('btn_hover_text_color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <!-- Status -->
                            <div class="col-md-3 mb-2">
                                <label class="form-label" for="status">Status</label>
                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="status" value="Inactive">
                                    <input type="checkbox" class="form-check-input" value="Active" id="status" name="status" checked>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>

                            <!-- Full Screen -->
                            <div class="col-md-3 mb-2">
                                <label class="form-label" for="full_screen">Show Full Screen</label>
                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="full_screen" value="0">
                                    <input type="checkbox" class="form-check-input" value="1" id="full_screen" name="full_screen" {{ old('full_screen') ? 'checked' : '' }}>
                                    <label class="form-check-label text-primary fw-medium" for="full_screen">Enable Full Screen</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Create Slider</button>
                            <button type="reset" class="btn btn-label-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleButtonColors() {
            const checkbox = document.getElementById('customize_btn_colors');
            const container = document.getElementById('custom-button-colors-container');
            if (checkbox.checked) {
                container.style.display = 'flex';
            } else {
                container.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            toggleButtonColors();
        });
    </script>
@endsection

