@extends('layouts.backend')

@section('title', 'Edit Product')

@push('page-css')
    <style>
        /* Modern Fieldset Style */
        fieldset.form-fieldset {
            border: 1px solid #dbdade;
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
            background: #fff;
            position: relative;
        }

        fieldset.form-fieldset legend {
            float: none;
            width: auto;
            padding: 0 10px;
            margin-left: 10px;
            font-size: 0.95rem;
            font-weight: 600;
            color: #ba0001;
            background: #fff;
            margin-bottom: 0;
        }

        /* Layout selection */
        .layout-card {
            border: 1px solid #dbdade;
            border-radius: 8px;
            padding: 15px;
            cursor: pointer;
            transition: all 0.2s;
            background: #f8f7f8;
        }

        .layout-card:hover {
            border-color: #ba0001;
        }

        .layout-card.selected {
            border-color: #ba0001;
            background: rgba(186, 0, 1, 0.08);
            box-shadow: 0 0 0 1px #ba0001;
        }

        /* Section Fieldset (Nested) */
        .section-fieldset {
            border: 1px solid rgba(186, 0, 1, 0.2) !important;
            background: #fff !important;
            margin-bottom: 1.5rem !important;
        }

        .section-fieldset legend {
            color: #ba0001 !important;
            font-size: 0.875rem !important;
        }

        /* Specification table */
        .spec-table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #dee2e6;
        }

        .spec-table th,
        .spec-table td {
            border: 1px solid #dee2e6 !important;
            padding: 0;
        }

        .spec-table th {
            background: #f0f0ff;
        }

        .spec-table th input {
            padding: 10px 12px;
            font-weight: 700;
            color: #4b4b8d;
        }

        .spec-table td input {
            padding: 9px 12px;
        }

        .spec-table th input,
        .spec-table td input {
            width: 100%;
            border: none;
            background: transparent;
            outline: none;
            display: block;
        }

        /* Image preview */
        .img-preview-box {
            border: 2px dashed #dbdade;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            margin-top: 8px;
            background: #f8f7f8;
        }

        .img-preview-box img {
            max-height: 100px;
            border-radius: 6px;
        }

        .upload-area {
            border: 2px dashed #dbdade;
            border-radius: 0.375rem;
            padding: 1.5rem;
            text-align: center;
            background: #f8f7f8;
            cursor: pointer;
            transition: all 0.2s;
        }

        .upload-area:hover {
            border-color: #7367f0;
            background: #eeedfd;
        }

        /* Feature item styling */
        .feature-item {
            background: #f8f7f8;
            border: 1px dashed #dbdade;
            border-radius: 8px;
            padding: 8px 12px;
            transition: all 0.2s;
        }

        .feature-item:hover {
            border-color: #7367f0;
            background: #eeedfd;
            box-shadow: 0 2px 4px rgba(115, 103, 240, 0.08);
        }

        .feature-item .form-control {
            background: transparent !important;
            border: none !important;
            padding: 0 !important;
            box-shadow: none !important;
            font-size: 0.9rem;
        }

        .feature-item .btn-icon {
            width: 28px;
            height: 28px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/select2/select2.css') }}" />
@endpush

@section('content')
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
        id="productForm">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-12">
                

                <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0">Edit Product</h5>
                            <a href="#" class="btn btn-label-secondary waves-effect">
                                <i class="ti ti-arrow-left me-1"></i> Back
                            </a>
                        </div>
                        <div class="row g-3">
                                <div class="row g-3">
                                    <div class="col-md-12" id="design-selection-col">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input type="hidden" name="is_parent" value="0">
                                                    <input type="checkbox" class="form-check-input" name="is_parent"
                                                        value="1" id="is_parent_switch" {{ $product->is_parent ? 'checked' : '' }}
                                                        onchange="toggleParentMode(this.checked)">
                                                    <label class="form-check-label fw-medium text-primary" for="is_parent_switch">
                                                        <i class="ti ti-sitemap me-1"></i> Save as Parent Product
                                                    </label>
                                                </div>
                                                <small class="text-muted d-block mt-1">If enabled, this product will only require a Title, Main Image, and Banner Image. It can then be selected as a Parent for other products.</small>
                                            </div>
                                            <div class="col-md-6" id="parent-selection-wrapper">
                                                <label class="form-label fw-medium text-uppercase small">Select Parent Product (Optional)</label>
                                                <select name="parent_id" class="select2 form-control">
                                                    <option value="">-- No Parent (Standalone) --</option>
                                                    @foreach($parent_products as $parent)
                                                        <option value="{{ $parent->id }}" {{ old('parent_id', $product->parent_id) == $parent->id ? 'selected' : '' }}>{{ $parent->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <input type="hidden" name="design_type" value="design1">
                                        <hr class="my-4">
                                    </div>
                                </div>
                        </div>

                {{-- Design 1: Single Content --}}
                <div id="design1-content">
                    <h6 class="fw-bold mb-3"><i class="ti ti-info-circle me-1"></i> Product Details</h6>
                    <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Product Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="product_title_input"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $product->title) }}" placeholder="e.g. Glue Mixer" required>
                            </div>



                            <div class="col-md-3 child-field">
                                <label class="form-label fw-medium">Sub Title</label>
                                <input type="text" name="sub_title" class="form-control"
                                    value="{{ old('sub_title', $product->sub_title) }}" placeholder="e.g. Industrial Grade">
                            </div>

                            @if($product->original_product_id)
                                <div class="col-md-3 child-field">
                                    <label class="form-label fw-medium">Original Product</label>
                                    <div class="mt-2">
                                        <a href="#" class="badge bg-label-info">
                                            <i class="ti ti-link me-1"></i> ID: {{ $product->original_product_id }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-3 child-field">
                                <label class="form-label fw-medium text-uppercase small">Video Link</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-brand-youtube"></i></span>
                                    <input type="url" name="video_link" class="form-control"
                                        value="{{ old('video_link', $product->video_link) }}"
                                        placeholder="https://youtube.com/...">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label fw-medium text-uppercase small">Main Image</label>
                                <div class="d-flex align-items-start gap-3">
                                    <div class="flex-grow-1">
                                        <input type="file" name="image" id="main_image" class="form-control"
                                            accept="image/*">
                                        <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP. Recommended size: 1024x1024px.</small>
                                        <small class="text-muted d-block mt-1">Current image kept if no new file.</small>
                                    </div>
                                    <div class="img-preview-box border rounded p-1"
                                        style="width: 80px; height: auto; flex-shrink:0; {{ $product->image ? 'display: block;' : 'display: none;' }}"
                                        id="main_image_preview_wrap">
                                        @if($product->image)
                                            <img id="main_image_preview" src="{{ asset('storage/' . $product->image) }}"
                                                class="w-100 object-fit-cover rounded mb-2" alt="Preview">
                                            <div class="form-check form-check-danger text-start">
                                                <input class="form-check-input" type="checkbox" name="delete_image" id="delete_image" value="1">
                                                <label class="form-check-label text-danger small" for="delete_image" style="font-size: 0.7rem;">Remove</label>
                                            </div>
                                        @else
                                            <img id="main_image_preview" src="" class="w-100 h-100 object-fit-cover rounded"
                                                alt="Preview">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label fw-bold text-uppercase small">Banner Image</label>
                                <div class="d-flex align-items-start gap-3">
                                    <div class="flex-grow-1">
                                        <input type="file" name="banner_image" id="banner_image" class="form-control" accept="image/*">
                                        <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP. Recommended size: 1920x800px.</small>
                                        <small class="text-muted d-block mt-1">Current image kept if no new file.</small>
                                    </div>
                                    <div class="img-preview-box border rounded p-1" style="width: 80px; height: auto; flex-shrink:0; {{ $product->banner_image ? 'display: block;' : 'display: none;' }}" id="banner_image_preview_wrap">
                                        @if($product->banner_image)
                                            <img id="banner_image_preview" src="{{ asset('storage/' . $product->banner_image) }}" class="w-100 object-fit-cover rounded mb-2" alt="Preview">
                                            <div class="form-check form-check-danger text-start">
                                                <input class="form-check-input" type="checkbox" name="delete_banner_image" id="delete_banner_image" value="1">
                                                <label class="form-check-label text-danger small" for="delete_banner_image" style="font-size: 0.7rem;">Remove</label>
                                            </div>
                                        @else
                                            <img id="banner_image_preview" src="" class="w-100 h-100 object-fit-cover rounded" alt="Preview">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 child-field">
                                <label class="form-label fw-bold text-uppercase small">Brochure (PDF)</label>
                                <div class="d-flex align-items-start gap-3">
                                    <div class="flex-grow-1">
                                        <input type="file" name="brochure" id="brochure" class="form-control" accept=".pdf">
                                        <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: PDF only. Max size: 5MB.</small>
                                        <small class="text-muted d-block mt-1">Current PDF kept if no new file.</small>
                                    </div>
                                    @if($product->brochure)
                                        <div class="border rounded p-1 text-center" style="width: 80px; flex-shrink:0;">
                                            <a href="{{ asset('storage/' . $product->brochure) }}" target="_blank" class="btn btn-sm btn-outline-primary mb-2 p-1" title="View Brochure">
                                                <i class="ti ti-file-text"></i> View
                                            </a>
                                            <div class="form-check form-check-danger text-start ms-1">
                                                <input class="form-check-input" type="checkbox" name="delete_brochure" id="delete_brochure" value="1">
                                                <label class="form-check-label text-danger small" for="delete_brochure" style="font-size: 0.7rem;">Remove</label>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3 child-field">
                                <label class="form-label fw-medium text-uppercase small">Short Description
                                    (Overview)</label>
                                <textarea name="short_description" class="form-control" rows="4"
                                    placeholder="Brief overview of the product...">{{ old('short_description', $product->short_description) }}</textarea>
                            </div>
                         
                        </div>
                    <div class="child-field">
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3"><i class="ti ti-file-description me-1"></i> Main Description</h6>
                            <div class="mb-3">
                                <textarea name="content" class="form-control ckeditor" id="main_content_editor" rows="6">{{ old('content', $product->content) }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3"><i class="ti ti-file-description me-1"></i> Trade Information</h6>
                            <div class="mb-3">
                                <textarea name="trade_information" class="form-control ckeditor" id="trade_information_editor" rows="6">{{ old('trade_information', $product->trade_information) }}</textarea>
                            </div>
                        </div>
                    </div>



                    <hr class="my-4">
                    <h6 class="fw-bold mb-3"><i class="ti ti-photo me-1"></i> Slider Gallery</h6>
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label fw-bold text-uppercase small">Upload New Slider Images</label>
                            <input type="file" name="slider_images[]" id="slider_images_input" class="form-control"
                                accept="image/*" multiple onchange="previewMultipleSliders(this)">
                                        <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP. Recommended size: 1024x1024px.</small>
                            <small class="text-muted d-block mt-1">Newly selected images will be added to the
                                gallery.</small>
                        </div>
                        <div id="slider-previews-container" class="d-flex flex-wrap gap-2 mb-3">
                            {{-- New previews will appear here --}}
                        </div>

                        @if($product->slider_images)
                            <div class="mt-3">
                                <label class="form-label fw-bold text-uppercase small d-block mb-2">Existing Slider
                                    Images</label>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($product->slider_images as $img)
                                        <div class="position-relative border rounded p-1" style="width: 80px; height: 80px;">
                                            <img src="{{ asset('storage/' . $img) }}" class="w-100 h-100 object-fit-cover rounded"
                                                alt="Slider">
                                            <input type="hidden" name="existing_slider_images[]" value="{{ $img }}">
                                            <button type="button"
                                                class="btn btn-danger btn-xs position-absolute top-0 end-0 m-1 p-0 shadow-sm"
                                                style="width: 20px; height: 20px; line-height: 1; border-radius: 50%;"
                                                onclick="this.parentElement.remove()">
                                                <i class="ti ti-x" style="font-size: 12px;"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div> <!-- Added missing closing div for .row (started at line 262) -->
                    <hr class="my-4">

                    <div class="row">
                        <!-- Left Column: Technical Features -->
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3"><i class="ti ti-list-check me-1"></i> Technical Features</h6>
                            <div class="mb-3">
                                <div id="key-features-container" class="row g-3 mb-3">
                                    @if($product->key_features)
                                        @foreach($product->key_features as $idx => $feature)
                                            <div class="col-md-12" id="feature-item-exist-{{ $idx }}">
                                                <div class="feature-item d-flex align-items-center">
                                                    <div class="me-2">
                                                        <span class="badge badge-center rounded-pill bg-label-primary w-px-20 h-px-20">
                                                            <i class="ti ti-check fs-6"></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <input type="text" name="key_features[]" class="form-control" value="{{ $feature }}" placeholder="Enter feature text..." required>
                                                    </div>
                                                    <div class="ms-2">
                                                        <button class="btn btn-sm btn-icon btn-label-danger waves-effect" type="button" onclick="this.closest('.col-md-12').remove()">
                                                            <i class="ti ti-trash ti-xs"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-sm btn-label-primary waves-effect" onclick="addKeyFeature()">
                                        <i class="ti ti-plus me-1"></i> Add New Feature
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Advantages Column -->
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3"><i class="ti ti-star me-1"></i> Advantages</h6>
                            <div class="mb-3">
                                <div id="advantages-container" class="row g-3 mb-3">
                                    @if(is_array($product->advantages))
                                        @foreach($product->advantages as $idx => $advantage)
                                            <div class="col-md-12" id="advantage-item-exist-{{ $idx }}">
                                                <div class="feature-item d-flex align-items-center">
                                                    <div class="me-2">
                                                        <span class="badge badge-center rounded-pill bg-label-success w-px-20 h-px-20">
                                                            <i class="ti ti-star fs-6"></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <input type="text" name="advantages[]" class="form-control" value="{{ $advantage }}" placeholder="Enter advantage text..." required>
                                                    </div>
                                                    <div class="ms-2">
                                                        <button class="btn btn-sm btn-icon btn-label-danger waves-effect" type="button" onclick="this.closest('.col-md-12').remove()">
                                                            <i class="ti ti-trash ti-xs"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-sm btn-label-primary waves-effect" onclick="addAdvantage()">
                                        <i class="ti ti-plus me-1"></i> Add Advantage
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <!-- Industries & Applications -->
                        <div class="col-md-12">
                            <h6 class="fw-bold mb-3"><i class="ti ti-building-factory-2 me-1"></i> Industries & Applications</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-medium small text-uppercase">Select Industries</label>
                                    <select name="industries[]" id="industries-select" class="select2" multiple>
                                        @foreach($all_industries as $industry)
                                            <option value="{{ $industry->id }}" {{ in_array($industry->id, old('industries', $product->related_industries->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                {{ $industry->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-medium small text-uppercase">Select Applications</label>
                                    <select name="applications[]" id="applications-select" class="select2" multiple>
                                        @foreach($all_applications as $app)
                                            <option value="{{ $app->id }}" {{ in_array($app->id, old('applications', $product->applications->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                {{ $app->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">
                    <h6 class="fw-bold mb-3"><i class="ti ti-tool me-1"></i> Specially Designed Parts</h6>
                    <div id="specially-designed-parts-container" class="row g-3 mb-3">
                        @if($product->specially_designed_parts)
                            @foreach($product->specially_designed_parts as $idx => $part)
                                <div class="col-md-6" id="specially-designed-part-exist-{{ $idx }}">
                                    <div class="feature-item border rounded p-3" style="background: #f8f7f8;">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <label class="form-label mb-0 fw-medium">Part Details</label>
                                            <button type="button" class="btn btn-sm btn-label-danger btn-icon" onclick="this.closest('.col-md-6').remove()">
                                                <i class="ti ti-trash ti-xs"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="specially_designed_parts[{{ $idx }}][name]" class="form-control mb-2" value="{{ $part['name'] ?? '' }}" placeholder="Part Name" required style="background: #fff !important; border: 1px solid #dbdade !important; padding: 0.4375rem 0.875rem !important;">
                                        <input type="file" name="specially_designed_parts[{{ $idx }}][image]" class="form-control mb-2" accept="image/*" style="background: #fff !important; border: 1px solid #dbdade !important; padding: 0.4375rem 0.875rem !important;">
                                        @if(isset($part['image']))
                                            <input type="hidden" name="specially_designed_parts[{{ $idx }}][existing_image]" value="{{ $part['image'] }}">
                                            <div class="mt-2 text-center border rounded p-1 bg-white">
                                                <img src="{{ asset('storage/' . $part['image']) }}" alt="Part Image" class="img-thumbnail" style="max-height: 80px;">
                                                <div class="form-check form-check-danger text-start ms-1 mt-1">
                                                    <input class="form-check-input" type="checkbox" name="specially_designed_parts[{{ $idx }}][remove_image]" id="remove_special_part_image_{{ $idx }}" value="1">
                                                    <label class="form-check-label text-danger small" for="remove_special_part_image_{{ $idx }}" style="font-size: 0.75rem;">Remove Image</label>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="mt-2">
                        <button type="button" class="btn btn-sm btn-label-primary waves-effect" onclick="addSpeciallyDesignedPart()">
                            <i class="ti ti-plus me-1"></i> Add Specially Designed Part
                        </button>
                    </div>

                    <hr class="my-4">
                    <h6 class="fw-bold mb-3"><i class="ti ti-photo me-1"></i> Image Parts</h6>
                    <div id="image-parts-container" class="row g-3 mb-3">
                        @if($product->image_parts)
                            @foreach($product->image_parts as $idx => $part)
                                <div class="col-md-6" id="image-part-exist-{{ $idx }}">
                                    <div class="feature-item border rounded p-3" style="background: #f8f7f8;">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <label class="form-label mb-0 fw-medium">Image Part Details</label>
                                            <button type="button" class="btn btn-sm btn-label-danger btn-icon" onclick="this.closest('.col-md-6').remove()">
                                                <i class="ti ti-trash ti-xs"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="image_parts[{{ $idx }}][name]" class="form-control mb-2" value="{{ $part['name'] ?? '' }}" placeholder="Part Name" style="background: #fff !important; border: 1px solid #dbdade !important; padding: 0.4375rem 0.875rem !important;">
                                        <input type="file" name="image_parts[{{ $idx }}][image]" class="form-control mb-2" accept="image/*" style="background: #fff !important; border: 1px solid #dbdade !important; padding: 0.4375rem 0.875rem !important;">
                                        @if(isset($part['image']))
                                            <input type="hidden" name="image_parts[{{ $idx }}][existing_image]" value="{{ $part['image'] }}">
                                            <div class="mt-2 text-center border rounded p-1 bg-white">
                                                <img src="{{ asset('storage/' . $part['image']) }}" alt="Part Image" class="img-thumbnail" style="max-height: 80px;">
                                                <div class="form-check form-check-danger text-start ms-1 mt-1">
                                                    <input class="form-check-input" type="checkbox" name="image_parts[{{ $idx }}][remove_image]" id="remove_image_part_{{ $idx }}" value="1">
                                                    <label class="form-check-label text-danger small" for="remove_image_part_{{ $idx }}" style="font-size: 0.75rem;">Remove Image</label>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="mt-2">
                        <button type="button" class="btn btn-sm btn-label-primary waves-effect" onclick="addImagePart()">
                            <i class="ti ti-plus me-1"></i> Add Image Part
                        </button>
                    </div>

                    <hr class="my-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold mb-0"><i class="ti ti-table me-1"></i> Specification Tables</h6>
                        <button type="button" class="btn btn-sm btn-primary" onclick="addSpecTable()">
                            <i class="ti ti-plus me-1"></i> Add Specification Table
                        </button>
                    </div>

                    <div id="spec-tables-container">
                        @foreach($product->specifications as $sIdx => $spec)
                            <div class="border rounded p-3 mb-4 spec-table-container" id="spec-table-block-{{ $sIdx }}">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h7 class="fw-bold mb-0 text-primary">Table #{{ $sIdx + 1 }}</h7>
                                    <button type="button" class="btn btn-sm btn-label-danger" onclick="this.closest('.spec-table-container').remove()">
                                        <i class="ti ti-trash me-1"></i> Remove Table
                                    </button>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <button type="button" class="btn btn-sm btn-label-primary" onclick="addColumnToSpecTable({{ $sIdx }})">
                                        <i class="ti ti-column-insert me-1"></i> Add Header / Column
                                    </button>
                                </div>

                                <div class="table-responsive mb-2">
                                    <table class="spec-table" id="spec-table-{{ $sIdx }}">
                                        <thead id="spec-thead-{{ $sIdx }}">
                                            <tr>
                                                @foreach($spec->table_headers ?? [] as $header)
                                                    <th>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <input type="text" value="{{ $header }}" class="form-control form-control-sm">
                                                            <button type="button" class="btn btn-sm btn-icon btn-label-danger flex-shrink-0" onclick="removeColumn(this)" title="Remove Column">
                                                                <i class="ti ti-trash ti-xs"></i>
                                                            </button>
                                                        </div>
                                                    </th>
                                                @endforeach
                                                <th class="remove-row-header" style="width: 40px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="spec-tbody-{{ $sIdx }}">
                                            @foreach($spec->table_data ?? [] as $row)
                                                <tr>
                                                    @foreach($row as $cell)
                                                        <td><input type="text" value="{{ $cell }}" class="form-control form-control-sm"></td>
                                                    @endforeach
                                                    <td class="remove-row-cell text-center">
                                                        <button type="button" class="btn btn-sm btn-icon btn-label-danger" onclick="removeRow(this)" title="Remove Row">
                                                            <i class="ti ti-trash ti-xs"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-sm btn-label-primary" onclick="addRowToSpecTable({{ $sIdx }})">
                                    <i class="ti ti-row-insert me-1"></i> Add Data Row
                                </button>
                                <div id="spec-hidden-inputs-{{ $sIdx }}"></div>
                            </div>
                        @endforeach
                    </div>
                </div>




                <hr class="my-4">
                <h6 class="fw-bold mb-3"><i class="ti ti-stairs me-1"></i> Process Steps</h6>
                <div class="row g-3">
                    <div id="process-steps-container" class="col-12 row g-3">
                        @if($product->process_steps)
                            @foreach($product->process_steps as $idx => $step)
                                <div class="col-md-6 col-lg-3" id="process-step-exist-{{ $idx }}">
                                    <div class="border rounded p-3 mb-3 position-relative bg-lighter">
                                        <button type="button" class="btn btn-sm btn-icon btn-label-danger position-absolute top-0 end-0 m-2" onclick="document.getElementById('process-step-exist-{{ $idx }}').remove()">
                                            <i class="ti ti-x"></i>
                                        </button>
                                        <h6 class="fw-bold mb-3">Step #{{ $idx + 1 }}</h6>
                                        <label class="form-label fw-medium small">Title</label>
                                        <input type="text" name="process_steps[{{ $idx }}][title]" class="form-control mb-2" value="{{ $step['title'] ?? '' }}" placeholder="e.g. Preparation Of Materials">
                                        <label class="form-label fw-medium small">Description</label>
                                        <textarea name="process_steps[{{ $idx }}][description]" class="form-control mb-2" rows="2" placeholder="Description...">{{ $step['description'] ?? '' }}</textarea>
                                        <label class="form-label fw-medium small">Upload New Icon/Image</label>
                                        <input type="file" name="process_steps[{{ $idx }}][image]" class="form-control" accept="image/*">
                                        @if(isset($step['image']))
                                            <div class="mt-2 text-center border rounded p-1 bg-white">
                                                <img src="{{ asset('storage/' . $step['image']) }}" class="img-fluid" style="height: 60px; object-fit: contain;">
                                                <input type="hidden" name="process_steps[{{ $idx }}][existing_image]" value="{{ $step['image'] }}">
                                                <div class="form-check form-check-danger text-start ms-1 mt-1">
                                                    <input class="form-check-input" type="checkbox" name="process_steps[{{ $idx }}][remove_image]" id="remove_step_image_{{ $idx }}" value="1">
                                                    <label class="form-check-label text-danger small" for="remove_step_image_{{ $idx }}" style="font-size: 0.75rem;">Remove Image</label>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-12 mt-2">
                        <button type="button" class="btn btn-sm btn-label-primary waves-effect" onclick="addProcessStep()">
                            <i class="ti ti-plus me-1"></i> Add Process Step
                        </button>
                    </div>
                </div>

                <hr class="my-4">
                <h6 class="fw-bold mb-3"><i class="ti ti-message-dots me-1"></i> Client Review About Project</h6>
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label fw-medium">Title</label>
                        <input type="text" name="client_review_title" class="form-control" value="{{ old('client_review_title', $product->client_review_title ?? 'Our Client Review About Project') }}" placeholder="e.g. Our Client Review About Project">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-medium">Description</label>
                        <textarea name="client_review_description" class="form-control" rows="3" placeholder="Description...">{{ old('client_review_description', $product->client_review_description) }}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-medium text-uppercase small">Upload New Slider Images</label>
                        <input type="file" name="client_review_images[]" class="form-control" accept="image/*" multiple>
                        <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP.</small>
                    </div>

                    @if($product->client_review_images)
                        <div class="col-md-12 mt-3">
                            <label class="form-label fw-bold text-uppercase small d-block mb-2">Existing Slider Images</label>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($product->client_review_images as $img)
                                    <div class="position-relative border rounded p-1" style="width: 80px; height: 80px;">
                                        <img src="{{ asset('storage/' . $img) }}" class="w-100 h-100 object-fit-cover rounded" alt="Slider">
                                        <input type="hidden" name="existing_client_review_images[]" value="{{ $img }}">
                                        <button type="button" class="btn btn-danger btn-xs position-absolute top-0 end-0 m-1 p-0 shadow-sm" style="width: 20px; height: 20px; line-height: 1; border-radius: 50%;" onclick="this.parentElement.remove()">
                                            <i class="ti ti-x" style="font-size: 12px;"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="col-md-12 mt-4">
                        <h6 class="fw-bold mb-2">FAQs / Accordion</h6>
                        <div id="client-review-faqs-container" class="row g-3">
                            @if($product->client_review_faqs)
                                @foreach($product->client_review_faqs as $idx => $faq)
                                    <div class="col-12" id="client-review-faq-exist-{{ $idx }}">
                                        <div class="feature-item p-3 border rounded mb-2">
                                            <div class="d-flex justify-content-between mb-2">
                                                <label class="form-label mb-0 fw-bold">FAQ #{{ $idx + 1 }}</label>
                                                <button type="button" class="btn btn-sm btn-icon btn-label-danger" onclick="document.getElementById('client-review-faq-exist-{{ $idx }}').remove()">
                                                    <i class="ti ti-x"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="client_review_faqs[{{ $idx }}][question]" class="form-control mb-2" value="{{ $faq['question'] }}" placeholder="Question">
                                            <textarea name="client_review_faqs[{{ $idx }}][answer]" class="form-control" rows="2" placeholder="Answer">{{ $faq['answer'] }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="mt-2">
                            <button type="button" class="btn btn-sm btn-label-primary waves-effect" onclick="addClientReviewFAQ()">
                                <i class="ti ti-plus me-1"></i> Add FAQ
                            </button>
                        </div>
                    </div>
                </div>

                <hr class="my-4">
                <h6 class="fw-bold mb-3"><i class="ti ti-search me-1"></i> SEO Metadata</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-medium">Product Slug <span class="text-danger">*</span></label>
                        <input type="text" name="slug" id="product_slug_input"
                            class="form-control @error('slug') is-invalid @enderror"
                            value="{{ old('slug', $product->slug) }}" placeholder="e.g. glue-mixer" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control"
                            value="{{ old('meta_title', $product->meta_title) }}" placeholder="Enter meta title">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-medium">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3"
                            placeholder="Enter meta description">{{ old('meta_description', $product->meta_description) }}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-bold text-uppercase small">Meta Keywords</label>
                        <textarea name="meta_keywords" class="form-control" rows="2"
                            placeholder="Enter keywords separated by commas">{{ old('meta_keywords', $product->meta_keywords) }}</textarea>
                    </div>
                </div>

                <div class="row g-3 align-items-center mt-4 pt-2 border-top">
                    <div class="col-md-3">
                        <div class="form-check form-switch">
                            <input type="hidden" name="status" value="Inactive">
                            <input type="checkbox" class="form-check-input" value="Active" name="status" id="status" {{ old('status', $product->status) == 'Active' ? 'checked' : '' }}>
                            <label class="form-check-label fw-medium" for="status">Active Status</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" value="1" name="is_visible" id="is_visible" {{ old('is_visible', $product->is_visible) ? 'checked' : '' }}>
                            <label class="form-check-label fw-medium" for="is_visible">Show on Frontend</label>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-check me-1"></i> Update Product
                            </button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-label-secondary">
                                <i class="ti ti-x me-1"></i> Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </form>

@endsection

@push('page-js')
    <script src="{{ asset('assets/backend/vendor/libs/select2/select2.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        $(function () {
            // Initialize Select2
            $('.select2').each(function () {
                $(this).select2({
                    placeholder: $(this).attr('placeholder') || 'Search and select options',
                    width: '100%',
                    allowClear: true,
                    minimumResultsForSearch: 0,
                    closeOnSelect: false
                });
            });
        });

        let featureIndex = {{ $product->key_features ? count($product->key_features) : 0 }};
        let specTableIndex = {{ $product->specifications ? count($product->specifications) : 0 }};
        let clientReviewFaqIndex = {{ $product->client_review_faqs ? count($product->client_review_faqs) : 0 }};
        let processStepIndex = {{ $product->process_steps ? count($product->process_steps) : 0 }};
        let sectionIndex = 0;

        function addProcessStep() {
            const idx = processStepIndex++;
            const html = `
                <div class="col-md-6 col-lg-3" id="process-step-${idx}">
                    <div class="border rounded p-3 mb-3 position-relative bg-lighter">
                        <button type="button" class="btn btn-sm btn-icon btn-label-danger position-absolute top-0 end-0 m-2" onclick="document.getElementById('process-step-${idx}').remove()">
                            <i class="ti ti-x"></i>
                        </button>
                        <h6 class="fw-bold mb-3">Step #${idx + 1}</h6>
                        <label class="form-label fw-medium small">Title</label>
                        <input type="text" name="process_steps[${idx}][title]" class="form-control mb-2" placeholder="e.g. Preparation Of Materials">
                        <label class="form-label fw-medium small">Description</label>
                        <textarea name="process_steps[${idx}][description]" class="form-control mb-2" rows="2" placeholder="Description..."></textarea>
                        <label class="form-label fw-medium small">Icon/Image</label>
                        <input type="file" name="process_steps[${idx}][image]" class="form-control" accept="image/*">
                    </div>
                </div>
            `;
            document.getElementById('process-steps-container').insertAdjacentHTML('beforeend', html);
        }

        function addClientReviewFAQ() {
            const idx = clientReviewFaqIndex++;
            const html = `
                <div class="col-12" id="client-review-faq-${idx}">
                    <div class="feature-item p-3 border rounded mb-2">
                        <div class="d-flex justify-content-between mb-2">
                            <label class="form-label mb-0 fw-bold">FAQ #${idx + 1}</label>
                            <button type="button" class="btn btn-sm btn-icon btn-label-danger" onclick="document.getElementById('client-review-faq-${idx}').remove()">
                                <i class="ti ti-x"></i>
                            </button>
                        </div>
                        <input type="text" name="client_review_faqs[${idx}][question]" class="form-control mb-2" placeholder="Question">
                        <textarea name="client_review_faqs[${idx}][answer]" class="form-control" rows="2" placeholder="Answer"></textarea>
                    </div>
                </div>`;
            document.getElementById('client-review-faqs-container').insertAdjacentHTML('beforeend', html);
        }

        function previewMultipleSliders(input) {
            const container = document.getElementById('slider-previews-container');
            if (input.files) {
                Array.from(input.files).forEach((file, idx) => {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const html = `
                                    <div class="position-relative" style="width:120px; height:100px;">
                                        <img src="${e.target.result}" class="img-fluid rounded border w-100 h-100" style="object-fit:cover; border-color: #696cff !important;">
                                        <span class="badge bg-primary position-absolute top-0 start-0 m-1">New</span>
                                    </div>`;
                        container.insertAdjacentHTML('beforeend', html);
                    }
                    reader.readAsDataURL(file);
                });
            }
        }

        function addKeyFeature() {
            const idx = featureIndex++;
            const html = `
                <div class="col-md-12" id="feature-item-${idx}">
                    <div class="feature-item d-flex align-items-center">
                        <div class="me-2">
                            <span class="badge badge-center rounded-pill bg-label-primary w-px-20 h-px-20">
                                <i class="ti ti-check fs-6"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1">
                            <input type="text" name="key_features[]" class="form-control" placeholder="Enter feature text..." required>
                        </div>
                        <div class="ms-2">
                            <button class="btn btn-sm btn-icon btn-label-danger waves-effect" type="button" onclick="this.closest('.col-md-12').remove()">
                                <i class="ti ti-trash ti-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>`;
            document.getElementById('key-features-container').insertAdjacentHTML('beforeend', html);
        }

        let advantageIndex = 1000;
        function addAdvantage() {
            const idx = advantageIndex++;
            const html = `
                <div class="col-md-12" id="advantage-item-${idx}">
                    <div class="feature-item d-flex align-items-center">
                        <div class="me-2">
                            <span class="badge badge-center rounded-pill bg-label-success w-px-20 h-px-20">
                                <i class="ti ti-star fs-6"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1">
                            <input type="text" name="advantages[]" class="form-control" placeholder="Enter advantage text..." required>
                        </div>
                        <div class="ms-2">
                            <button class="btn btn-sm btn-icon btn-label-danger waves-effect" type="button" onclick="this.closest('.col-md-12').remove()">
                                <i class="ti ti-trash ti-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>`;
            document.getElementById('advantages-container').insertAdjacentHTML('beforeend', html);
        }

        let speciallyDesignedPartIndex = 1000;
        function addSpeciallyDesignedPart() {
            const idx = speciallyDesignedPartIndex++;
            const html = `
                <div class="col-md-6" id="specially-designed-part-${idx}">
                    <div class="feature-item border rounded p-3" style="background: #f8f7f8;">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label mb-0 fw-medium">Part Details</label>
                            <button type="button" class="btn btn-sm btn-label-danger btn-icon" onclick="this.closest('.col-md-6').remove()">
                                <i class="ti ti-trash ti-xs"></i>
                            </button>
                        </div>
                        <input type="text" name="specially_designed_parts[${idx}][name]" class="form-control mb-2" placeholder="Part Name" required style="background: #fff !important; border: 1px solid #dbdade !important; padding: 0.4375rem 0.875rem !important;">
                        <input type="file" name="specially_designed_parts[${idx}][image]" class="form-control" accept="image/*" style="background: #fff !important; border: 1px solid #dbdade !important; padding: 0.4375rem 0.875rem !important;">
                    </div>
                </div>`;
            document.getElementById('specially-designed-parts-container').insertAdjacentHTML('beforeend', html);
        }

        let imagePartIndex = 1000;
        function addImagePart() {
            const idx = imagePartIndex++;
            const html = `
                <div class="col-md-6" id="image-part-${idx}">
                    <div class="feature-item border rounded p-3" style="background: #f8f7f8;">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label mb-0 fw-medium">Image Part Details</label>
                            <button type="button" class="btn btn-sm btn-label-danger btn-icon" onclick="this.closest('.col-md-6').remove()">
                                <i class="ti ti-trash ti-xs"></i>
                            </button>
                        </div>
                        <input type="text" name="image_parts[${idx}][name]" class="form-control mb-2" placeholder="Part Name" style="background: #fff !important; border: 1px solid #dbdade !important; padding: 0.4375rem 0.875rem !important;">
                        <input type="file" name="image_parts[${idx}][image]" class="form-control" accept="image/*" style="background: #fff !important; border: 1px solid #dbdade !important; padding: 0.4375rem 0.875rem !important;">
                    </div>
                </div>`;
            document.getElementById('image-parts-container').insertAdjacentHTML('beforeend', html);
        }



        // === Parent Mode Toggle ===
        function toggleParentMode(isParent) {
            const childFields = document.querySelectorAll('.child-field');
            const parentSelection = document.getElementById('parent-selection-wrapper');
            
            if (isParent) {
                // Hide child fields
                childFields.forEach(el => el.style.display = 'none');
                if (parentSelection) parentSelection.style.display = 'none';
                
                if (document.getElementById('product_title_input')) {
                    document.getElementById('product_title_input').setAttribute('required', 'required');
                }
            } else {
                // Show child fields
                childFields.forEach(el => el.style.display = '');
                if (parentSelection) parentSelection.style.display = 'block';
            }
        }

        // Initialize state on load
        $(document).ready(function() {
            toggleParentMode(document.getElementById('is_parent_switch').checked);
        });

        document.getElementById('main_image').addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                document.getElementById('main_image_preview').src = URL.createObjectURL(file);
                document.getElementById('main_image_preview_wrap').style.display = 'block';
            }
        });

        document.getElementById('banner_image').addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                document.getElementById('banner_image_preview').src = URL.createObjectURL(file);
                document.getElementById('banner_image_preview_wrap').style.display = 'block';
            }
        });

        function addSection() {
            const emptyMsg = document.getElementById('sections-empty-msg');
            if (emptyMsg) emptyMsg.style.display = 'none';
            const idx = sectionIndex++;
            const html = `
                        <div class="border rounded p-3 mb-4 section-container" id="section-fieldset-${idx}">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0 fw-bold">New Section #${idx + 1}</h6>
                                <button type="button" class="btn btn-sm btn-label-danger" onclick="removeSection(${idx})">
                                    <i class="ti ti-trash me-1"></i> Remove Section
                                </button>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-3">
                                    <label class="form-label fw-medium">Title</label>
                                    <input type="text" name="sections[${idx}][title]" class="form-control" placeholder="e.g. Glue Mixer">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-medium">Sub Title</label>
                                    <input type="text" name="sections[${idx}][sub_title]" class="form-control" placeholder="e.g. Industrial Grade">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-medium">Image</label>
                                    <input type="file" name="sections[${idx}][image]" class="form-control" accept="image/*" id="sec-img-input-${idx}">
                                    <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP. Recommended size: 1024x1024px.</small>
                                    <div class="img-preview-box" id="sec-img-wrap-${idx}" style="display:none;">
                                        <img id="sec-img-${idx}" src="" alt="Preview">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-medium">Video Link</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="ti ti-brand-youtube"></i></span>
                                        <input type="url" name="sections[${idx}][video_link]" class="form-control" placeholder="https://youtube.com/...">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-medium">Brochure (PDF)</label>
                                    <input type="file" name="sections[${idx}][brochure]" class="form-control" accept=".pdf">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-medium">Description / Content</label>
                                    <textarea name="sections[${idx}][content]" class="form-control" rows="4"></textarea>
                                </div>
                            </div>

                            <div class="border-top pt-3">
                                <h6 class="fw-bold mb-3 small"><i class="ti ti-table me-1"></i>Section Table (Optional)</h6>
                                <div class="d-flex justify-content-between mb-3">
                                    <button type="button" class="btn btn-sm btn-label-primary" onclick="addColumnNew(${idx})">
                                        <i class="ti ti-column-insert me-1"></i> Add Header / Column
                                    </button>
                                    <button type="button" class="btn btn-sm btn-label-danger" onclick="clearSectionTable(${idx})">
                                        <i class="ti ti-trash me-1"></i> Clear
                                    </button>
                                </div>

                                <div id="sec-spec-table-wrapper-${idx}" style="display:none;">
                                    <div class="table-responsive mb-2">
                                        <table class="spec-table" id="sec-spec-table-${idx}">
                                            <thead id="sec-spec-thead-${idx}"></thead>
                                            <tbody id="sec-spec-tbody-${idx}"></tbody>
                                        </table>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-label-primary" onclick="addRowNew(${idx})">
                                        <i class="ti ti-row-insert me-1"></i> Add Data Row
                                    </button>
                                </div>
                                <div id="sec-spec-hidden-inputs-${idx}"></div>
                            </div>
                        </div>`;
            document.getElementById('sections-container').insertAdjacentHTML('beforeend', html);

            document.getElementById(`sec-img-input-${idx}`).addEventListener('change', function () {
                if (this.files[0]) {
                    document.getElementById(`sec-img-${idx}`).src = URL.createObjectURL(this.files[0]);
                    document.getElementById(`sec-img-wrap-${idx}`).style.display = 'block';
                }
            });
        }

        function removeSection(idx) {
            const fieldset = document.getElementById(`section-fieldset-${idx}`);
            if (fieldset) fieldset.remove();
            if (document.querySelectorAll('.section-fieldset').length === 0) {
                const emptyMsg = document.getElementById('sections-empty-msg');
                if (emptyMsg) emptyMsg.style.display = 'block';
            }
        }

        function deleteExistingSection(id, btn) {
            if (!confirm('Remove this saved section?')) return;
            const card = document.getElementById(`existing-section-${id}`);
            if (card) {
                const inp = document.createElement('input');
                inp.type = 'hidden'; inp.name = 'delete_sections[]'; inp.value = id;
                document.getElementById('productForm').appendChild(inp);
                card.remove();
            }
        }

        // === Specification Table Helpers ===
        function addColumnToTable(theadId, tbodyId, wrapperId) {
            const wrapper = document.getElementById(wrapperId);
            const thead = document.getElementById(theadId);
            const tbody = document.getElementById(tbodyId);
            wrapper.style.display = 'block';
            let headerRow = thead.querySelector('tr');
            if (!headerRow) {
                headerRow = document.createElement('tr');
                thead.appendChild(headerRow);
            }
            const th = document.createElement('th');
            th.innerHTML = `
                <div class="d-flex align-items-center gap-1">
                    <input type="text" placeholder="Header Name" class="form-control form-control-sm">
                    <button type="button" class="btn btn-sm btn-icon btn-label-danger flex-shrink-0" onclick="removeColumn(this)" title="Remove Column">
                        <i class="ti ti-trash ti-xs"></i>
                    </button>
                </div>`;
            const actionTh = headerRow.querySelector('.remove-row-header');
            if (actionTh) {
                headerRow.insertBefore(th, actionTh);
            } else {
                headerRow.appendChild(th);
            }
            
            tbody.querySelectorAll('tr').forEach(row => {
                const td = document.createElement('td');
                td.innerHTML = `<input type="text" placeholder="Value" class="form-control form-control-sm">`;
                const removeCell = row.querySelector('.remove-row-cell');
                if (removeCell) {
                    row.insertBefore(td, removeCell);
                } else {
                    row.appendChild(td);
                }
            });
        }

        function removeColumn(btn) {
            const th = btn.closest('th');
            const tr = th.closest('tr');
            const table = tr.closest('table');
            const tbody = table.querySelector('tbody');
            const index = Array.from(tr.children).indexOf(th);
            
            th.remove();
            
            tbody.querySelectorAll('tr').forEach(row => {
                if (row.children[index]) {
                    row.children[index].remove();
                }
            });
            
            if (tr.children.length === 0 || (tr.children.length === 1 && !tr.children[0].querySelector('input'))) {
                tr.innerHTML = '';
                tbody.innerHTML = '';
                const wrapper = table.closest('[id$="-wrapper"]');
                if (wrapper) wrapper.style.display = 'none';
            }
        }

        function addRowToTable(theadId, tbodyId, wrapperId) {
            const wrapper = document.getElementById(wrapperId);
            const thead = document.getElementById(theadId);
            const tbody = document.getElementById(tbodyId);
            const headerRow = thead.querySelector('tr');
            if (!headerRow || headerRow.children.length === 0) {
                alert('Please add at least one header/column first.');
                return;
            }
            
            if (!headerRow.querySelector('.remove-row-header')) {
                const actionTh = document.createElement('th');
                actionTh.className = 'remove-row-header';
                actionTh.style.width = '40px';
                headerRow.appendChild(actionTh);
            }
            
            wrapper.style.display = 'block';
            const tr = document.createElement('tr');
            
            const colCount = headerRow.children.length - 1; 
            for (let i = 0; i < colCount; i++) {
                const td = document.createElement('td');
                td.innerHTML = `<input type="text" placeholder="Value" class="form-control form-control-sm">`;
                tr.appendChild(td);
            }
            
            const actionTd = document.createElement('td');
            actionTd.className = 'remove-row-cell text-center';
            actionTd.innerHTML = `
                <button type="button" class="btn btn-sm btn-icon btn-label-danger" onclick="removeRow(this)" title="Remove Row">
                    <i class="ti ti-trash ti-xs"></i>
                </button>`;
            tr.appendChild(actionTd);
            
            tbody.appendChild(tr);
        }

        function removeRow(btn) {
            const tr = btn.closest('tr');
            tr.remove();
        }

        function clearTableByIds(theadId, tbodyId, wrapperId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This will clear the entire table data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#7367f0',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, clear it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    const wrap = document.getElementById(wrapperId);
                    if (wrap) wrap.style.display = 'none';
                    const th = document.getElementById(theadId);
                    if (th) th.innerHTML = '';
                    const tb = document.getElementById(tbodyId);
                    if (tb) tb.innerHTML = '';
                }
            });
        }

        // Global Table Functions (Legacy / Single)
        function addColumn() { addColumnToTable('spec-thead', 'spec-tbody', 'spec-table-wrapper'); }
        function addRow() { addRowToTable('spec-thead', 'spec-tbody', 'spec-table-wrapper'); }
        function clearTable() { clearTableByIds('spec-thead', 'spec-tbody', 'spec-table-wrapper'); }

        // Multi Spec Table Helpers
        function addSpecTable() {
            const idx = specTableIndex++;
            const html = `
                <div class="border rounded p-3 mb-4 spec-table-container" id="spec-table-block-${idx}">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h7 class="fw-bold mb-0 text-primary">New Table #${idx + 1}</h7>
                        <button type="button" class="btn btn-sm btn-label-danger" onclick="this.closest('.spec-table-container').remove()">
                            <i class="ti ti-trash me-1"></i> Remove Table
                        </button>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <button type="button" class="btn btn-sm btn-label-primary" onclick="addColumnToSpecTable(${idx})">
                            <i class="ti ti-column-insert me-1"></i> Add Header / Column
                        </button>
                    </div>

                    <div class="table-responsive mb-2">
                        <table class="spec-table" id="spec-table-${idx}">
                            <thead id="spec-thead-${idx}"></thead>
                            <tbody id="spec-tbody-${idx}"></tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-sm btn-label-primary" onclick="addRowToSpecTable(${idx})">
                        <i class="ti ti-row-insert me-1"></i> Add Data Row
                    </button>
                    <div id="spec-hidden-inputs-${idx}"></div>
                </div>`;
            document.getElementById('spec-tables-container').insertAdjacentHTML('beforeend', html);
        }

        function addColumnToSpecTable(idx) {
            addColumnToTable(`spec-thead-${idx}`, `spec-tbody-${idx}`, `spec-table-block-${idx}`);
        }

        function addRowToSpecTable(idx) {
            addRowToTable(`spec-thead-${idx}`, `spec-tbody-${idx}`, `spec-table-block-${idx}`);
        }

        // Existing Section Tables
        function addColumnExist(id) { addColumnToTable(`sec-spec-thead-exist-${id}`, `sec-spec-tbody-exist-${id}`, `sec-spec-table-wrapper-exist-${id}`); }
        function addRowExist(id) { addRowToTable(`sec-spec-thead-exist-${id}`, `sec-spec-tbody-exist-${id}`, `sec-spec-table-wrapper-exist-${id}`); }
        function clearExistingSectionTable(id) { clearTableByIds(`sec-spec-thead-exist-${id}`, `sec-spec-tbody-exist-${id}`, `sec-spec-table-wrapper-exist-${id}`); }

        // New Section Tables
        function addColumnNew(idx) { addColumnToTable(`sec-spec-thead-${idx}`, `sec-spec-tbody-${idx}`, `sec-spec-table-wrapper-${idx}`); }
        function addRowNew(idx) { addRowToTable(`sec-spec-thead-${idx}`, `sec-spec-tbody-${idx}`, `sec-spec-table-wrapper-${idx}`); }
        function clearSectionTable(idx) { clearTableByIds(`sec-spec-thead-${idx}`, `sec-spec-tbody-${idx}`, `sec-spec-table-wrapper-${idx}`); }

        // === Slider Gallery Helpers ===
        let selectedSliderFiles = [];

        function previewMultipleSliders(input) {
            const files = Array.from(input.files);
            if (files.length === 0) return;

            selectedSliderFiles = [...selectedSliderFiles, ...files];
            updateSliderPreviews();
            syncSliderInput();
        }

        function updateSliderPreviews() {
            const container = document.getElementById('slider-previews-container');
            container.innerHTML = '';

            selectedSliderFiles.forEach((file, idx) => {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const html = `
                            <div class="position-relative" style="width:120px; height:100px;">
                                <img src="${e.target.result}" class="img-fluid rounded border w-100 h-100" style="object-fit:cover;">
                                <span class="badge bg-primary position-absolute top-0 start-0 m-1">New</span>
                                <button type="button" class="btn btn-danger btn-xs position-absolute top-0 end-0 m-1 p-0 shadow-sm" 
                                        style="width:20px; height:20px; line-height:1; border-radius: 50%;" 
                                        onclick="removeSliderFile(${idx})">
                                    <i class="ti ti-x fs-6" style="font-size: 12px;"></i>
                                </button>
                            </div>`;
                    container.insertAdjacentHTML('beforeend', html);
                }
                reader.readAsDataURL(file);
            });
        }

        function removeSliderFile(index) {
            selectedSliderFiles.splice(index, 1);
            updateSliderPreviews();
            syncSliderInput();
        }

        function syncSliderInput() {
            const input = document.getElementById('slider_images_input');
            const dataTransfer = new DataTransfer();
            selectedSliderFiles.forEach(file => dataTransfer.items.add(file));
            input.files = dataTransfer.files;
        }

        // === CKEditor Initialization ===
        function initCKEditors() {
            CKEDITOR.config.versionCheck = false;
            document.querySelectorAll('.ckeditor').forEach((el) => {
                if (!el.classList.contains('ckeditor-applied')) {
                    CKEDITOR.replace(el, {
                        height: 200,
                        removeButtons: 'PasteFromWord',
                        versionCheck: false
                    });
                    el.classList.add('ckeditor-applied');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            initCKEditors();
        });

        document.getElementById('productForm').addEventListener('submit', function () {
            // ✅ sync editor data
            for (let instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }

            // 1. Multiple Specification Tables
            document.querySelectorAll('.spec-table-container').forEach((container, sIdx) => {
                const thead = container.querySelector('thead');
                const tbody = container.querySelector('tbody');
                const hiddenContainer = container.querySelector('[id^="spec-hidden-inputs-"]');
                
                if (thead && thead.querySelector('input') && hiddenContainer) {
                    hiddenContainer.innerHTML = '';
                    const headers = Array.from(thead.querySelectorAll('input')).map(i => i.value);
                    const rows = Array.from(tbody.querySelectorAll('tr')).map(tr =>
                        Array.from(tr.querySelectorAll('input')).map(i => i.value)
                    );
                    
                    headers.forEach((h, i) => {
                        const inp = document.createElement('input');
                        inp.type = 'hidden'; inp.name = `spec_tables[${sIdx}][table_headers][${i}]`; inp.value = h;
                        hiddenContainer.appendChild(inp);
                    });
                    rows.forEach((row, r) => row.forEach((val, c) => {
                        const inp = document.createElement('input');
                        inp.type = 'hidden'; inp.name = `spec_tables[${sIdx}][table_data][${r}][${c}]`; inp.value = val;
                        hiddenContainer.appendChild(inp);
                    }));
                }
            });

            // Fallback for single table if it exists and wasn't handled by the loop above
            const oldThead = document.getElementById('spec-thead');
            const oldTbody = document.getElementById('spec-tbody');
            if (oldThead && oldThead.querySelector('input') && !document.querySelector('.spec-table-container')) {
                const headers = Array.from(oldThead.querySelectorAll('input')).map(i => i.value);
                const rows = Array.from(oldTbody.querySelectorAll('tr')).map(tr =>
                    Array.from(tr.querySelectorAll('input')).map(i => i.value)
                );
                const container = document.getElementById('spec-hidden-inputs');
                if (container) {
                    container.innerHTML = '';
                    headers.forEach((h, i) => {
                        const inp = document.createElement('input');
                        inp.type = 'hidden'; inp.name = `table_headers[${i}]`; inp.value = h;
                        container.appendChild(inp);
                    });
                    rows.forEach((row, r) => row.forEach((val, c) => {
                        const inp = document.createElement('input');
                        inp.type = 'hidden'; inp.name = `table_data[${r}][${c}]`; inp.value = val;
                        container.appendChild(inp);
                    }));
                }
            }

            // 2. Existing Sections Tables
            document.querySelectorAll('[id^="existing-section-"]').forEach(card => {
                const id = card.id.split('-').pop();
                const sThead = document.getElementById(`sec-spec-thead-exist-${id}`);
                const sTbody = document.getElementById(`sec-spec-tbody-exist-${id}`);
                const sContainer = document.getElementById(`sec-spec-hidden-inputs-exist-${id}`);
                if (sThead && sThead.querySelector('input') && sContainer) {
                    sContainer.innerHTML = '';
                    const sHeaders = Array.from(sThead.querySelectorAll('input')).map(i => i.value);
                    const sRows = Array.from(sTbody.querySelectorAll('tr')).map(tr =>
                        Array.from(tr.querySelectorAll('input')).map(i => i.value)
                    );
                    sHeaders.forEach((h, i) => {
                        const inp = document.createElement('input');
                        inp.type = 'hidden'; inp.name = `existing_sections[${id}][table_headers][${i}]`; inp.value = h;
                        sContainer.appendChild(inp);
                    });
                    sRows.forEach((row, r) => row.forEach((val, c) => {
                        const inp = document.createElement('input');
                        inp.type = 'hidden'; inp.name = `existing_sections[${id}][table_data][${r}][${c}]`; inp.value = val;
                        sContainer.appendChild(inp);
                    }));
                }
            });

            // 3. New Sections Tables
            document.querySelectorAll('.section-container[id^="section-fieldset-"]').forEach(fieldset => {
                const idx = fieldset.id.split('-').pop();
                const sThead = document.getElementById(`sec-spec-thead-${idx}`);
                const sTbody = document.getElementById(`sec-spec-tbody-${idx}`);
                const sContainer = document.getElementById(`sec-spec-hidden-inputs-${idx}`);
                if (sThead && sThead.querySelector('input') && sContainer) {
                    sContainer.innerHTML = '';
                    const sHeaders = Array.from(sThead.querySelectorAll('input')).map(i => i.value);
                    const sRows = Array.from(sTbody.querySelectorAll('tr')).map(tr =>
                        Array.from(tr.querySelectorAll('input')).map(i => i.value)
                    );
                    sHeaders.forEach((h, i) => {
                        const inp = document.createElement('input');
                        inp.type = 'hidden'; inp.name = `sections[${idx}][table_headers][${i}]`; inp.value = h;
                        sContainer.appendChild(inp);
                    });
                    sRows.forEach((row, r) => row.forEach((val, c) => {
                        const inp = document.createElement('input');
                        inp.type = 'hidden'; inp.name = `sections[${idx}][table_data][${r}][${c}]`; inp.value = val;
                        sContainer.appendChild(inp);
                    }));
                }
            });

            // Auto-slug generation
            $('#product_title_input').on('input', function () {
                let title = $(this).val();
                let slug = title.toLowerCase()
                    .replace(/[^a-z0-9- ]/g, '')
                    .replace(/ +/g, '-')
                    .replace(/^-+|-+$/g, '');
                $('#product_slug_input').val(slug);
            });
        });
    </script>
@endpush
