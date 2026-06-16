@extends('layouts.backend')

@section('title', 'Add Product')

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
            display: none;
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

        .cke_notification_warning {
            display: none !important;
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
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
        @csrf

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0">Add Product</h5>
                            <a href="#" class="btn btn-label-secondary waves-effect">
                                <i class="ti ti-arrow-left me-1"></i> Back
                            </a>
                        </div>
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-md-12" id="design-selection-col">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input type="hidden" name="is_parent" value="0">
                                                    <input type="checkbox" class="form-check-input" name="is_parent"
                                                        value="1" id="is_parent_switch"
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
                                                        <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>{{ $parent->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="design_type" value="design1">
                                        <hr class="my-4">
                                    </div>
                                </div>

                                {{-- Design 1: Single Content --}}
                                <div id="design1-content">
                                    <h6 class="fw-bold mb-3"><i class="ti ti-info-circle me-1"></i> Product Details</h6>
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label class="form-label fw-medium">Product Title <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="title" id="product_title_input"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{ old('title') }}" placeholder="e.g. Glue Mixer" required>
                                        </div>



                                        <div class="col-md-3 child-field">
                                            <label class="form-label fw-medium">Sub Title</label>
                                            <input type="text" name="sub_title" class="form-control"
                                                value="{{ old('sub_title') }}" placeholder="e.g. Industrial Grade">
                                        </div>

                                        <div class="col-md-3 child-field">
                                            <label class="form-label fw-medium text-uppercase small">Video Link</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="ti ti-brand-youtube"></i></span>
                                                <input type="url" name="video_link" class="form-control"
                                                    value="{{ old('video_link') }}" placeholder="https://youtube.com/...">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label fw-medium text-uppercase small">Main Image</label>
                                            <input type="file" name="image" id="main_image" class="form-control"
                                                accept="image/*">
                                            <small class="text-primary d-block fw-medium mt-1"
                                                style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed:
                                                JPG, JPEG, PNG, WEBP. Recommended size: 1024x1024px.</small>
                                            <div class="img-preview-box" id="main_image_preview_wrap">
                                                <img id="main_image_preview" src="" alt="Preview">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label fw-medium text-uppercase small">Banner Image</label>
                                            <input type="file" name="banner_image" id="banner_image" class="form-control"
                                                accept="image/*">
                                            <small class="text-primary d-block fw-medium mt-1"
                                                style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed:
                                                JPG, JPEG, PNG, WEBP. Recommended size: 1920x800px.</small>
                                            <div class="img-preview-box" id="banner_image_preview_wrap"
                                                style="display:none; margin-top:10px;">
                                                <img id="banner_image_preview" src="" alt="Preview"
                                                    style="max-height: 100px;">
                                            </div>
                                        </div>

                                        <div class="col-md-3 child-field">
                                            <label class="form-label fw-medium text-uppercase small">Brochure (PDF)</label>
                                            <input type="file" name="brochure" id="brochure" class="form-control"
                                                accept=".pdf">
                                            <small class="text-primary d-block fw-medium mt-1"
                                                style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed:
                                                PDF only. Max size: 5MB.</small>
                                        </div>

                                        <div class="col-md-3 child-field">
                                            <label class="form-label fw-medium text-uppercase small">Short Description
                                                (Overview)</label>
                                            <textarea name="short_description" class="form-control" rows="4"
                                                placeholder="Brief overview of the product...">{{ old('short_description') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="child-field">
                                        <hr class="my-4">
                                        <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="fw-bold mb-3"><i class="ti ti-file-description me-1"></i> Main
                                                Description</h6>
                                            <div class="mb-3">
                                                <textarea name="content" class="form-control ckeditor"
                                                    id="main_content_editor" rows="6">{{ old('content') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-bold mb-3"><i class="ti ti-file-description me-1"></i> Trade
                                                Information</h6>
                                            <div class="mb-3">
                                                <textarea name="trade_information" class="form-control ckeditor"
                                                    id="trade_information_editor"
                                                    rows="6">{{ old('trade_information') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-4">
                                    <h6 class="fw-bold mb-3"><i class="ti ti-photo me-1"></i> Slider Gallery</h6>
                                    <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label fw-medium text-uppercase small">Upload Slider
                                                Images</label>
                                            <input type="file" name="slider_images[]" id="slider_images_input"
                                                class="form-control" accept="image/*" multiple
                                                onchange="previewMultipleSliders(this)">
                                            <small class="text-primary d-block fw-medium mt-1"
                                                style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed:
                                                JPG, JPEG, PNG, WEBP. Recommended size: 1024x1024px.</small>
                                            <small class="text-muted d-block mt-1">You can select multiple images at
                                                once.</small>
                                        </div>
                                        <div id="slider-previews-container" class="d-flex flex-wrap gap-2">
                                            {{-- Previews will appear here --}}
                                        </div>


                                    </div>

                                    <div class="row">

                                        <!-- Right Column: Advantages -->
                                        <div class="col-md-12">
                                            <h6 class="fw-bold mb-3"><i class="ti ti-star me-1"></i> Advantages</h6>
                                            <div id="advantages-container" class="row g-3 mb-3">
                                                {{-- Advantages will be added here --}}
                                            </div>
                                            <div class="mt-2">
                                                <button type="button" class="btn btn-sm btn-label-primary waves-effect"
                                                    onclick="addAdvantage()">
                                                    <i class="ti ti-plus me-1"></i> Add Advantage
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-4">
                                    <h6 class="fw-bold mb-3"><i class="ti ti-tool me-1"></i> Specially Designed Parts</h6>
                                    <div id="specially-designed-parts-container" class="row g-3 mb-3">
                                        {{-- Specially Designed Parts will be added here --}}
                                    </div>
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-sm btn-label-primary waves-effect"
                                            onclick="addSpeciallyDesignedPart()">
                                            <i class="ti ti-plus me-1"></i> Add Specially Designed Part
                                        </button>
                                    </div>

                                    <hr class="my-4">
                                    <h6 class="fw-bold mb-3"><i class="ti ti-photo me-1"></i> Image Parts</h6>
                                    <div id="image-parts-container" class="row g-3 mb-3">
                                        {{-- Image Parts will be added here --}}
                                    </div>
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-sm btn-label-primary waves-effect"
                                            onclick="addImagePart()">
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
                                        {{-- New tables will be added here --}}
                                    </div>
                                </div>
                            </div>


                            <hr class="my-4">
                            <h6 class="fw-bold mb-3"><i class="ti ti-search me-1"></i> SEO Metadata</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-medium">Product Slug <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="slug" id="product_slug_input"
                                        class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}"
                                        placeholder="e.g. glue-mixer" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-medium">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{ old('meta_title') }}" placeholder="Enter meta title">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-medium">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3"
                                        placeholder="Enter meta description">{{ old('meta_description') }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-medium">Meta Keywords</label>
                                    <textarea name="meta_keywords" class="form-control" rows="2"
                                        placeholder="Enter keywords separated by commas">{{ old('meta_keywords') }}</textarea>
                                </div>
                            </div>
                            </div>

                            <div class="row g-3 align-items-center mt-4 pt-2 border-top">
                                <div class="col-md-3">
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="status" value="Inactive">
                                        <input type="checkbox" class="form-check-input" value="Active" name="status"
                                            id="status" checked>
                                        <label class="form-check-label fw-medium" for="status">Active Status</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" value="1" name="is_visible"
                                            id="is_visible" checked>
                                        <label class="form-check-label fw-medium" for="is_visible">Show on Frontend</label>
                                    </div>
                                </div>
                                <div class="col-md-6 text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ti ti-plus me-1"></i> Save Product
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

        let sectionIndex = 0;
        let specTableIndex = 0;

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



        // === Parent Mode Toggle ===
        function toggleParentMode(isParent) {
            const childFields = document.querySelectorAll('.child-field');
            const parentSelection = document.getElementById('parent-selection-wrapper');
            
            if (isParent) {
                // Hide child fields
                childFields.forEach(el => el.style.display = 'none');
                if (parentSelection) parentSelection.style.display = 'none';
                
                document.getElementById('product_title_input').setAttribute('required', 'required');
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

        // === Main Image Preview ===
        document.getElementById('main_image').addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                document.getElementById('main_image_preview').src = URL.createObjectURL(file);
                document.getElementById('main_image_preview_wrap').style.display = 'block';
            }
        });

        // === Banner Image Preview ===
        document.getElementById('banner_image').addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                document.getElementById('banner_image_preview').src = URL.createObjectURL(file);
                document.getElementById('banner_image_preview_wrap').style.display = 'block';
            }
        });

        // === Section Image Preview ===
        function previewSectionImage(input, idx) {
            if (input.files && input.files[0]) {
                const previewWrap = document.getElementById(`section-image-preview-${idx}`);
                const img = previewWrap.querySelector('img');
                img.src = URL.createObjectURL(input.files[0]);
                previewWrap.style.display = 'block';
            }
        }

        // === Section Repeater ===
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
                                    <label class="form-label fw-medium">Section Image</label>
                                    <input type="file" name="sections[${idx}][image]" class="form-control" onchange="previewSectionImage(this, ${idx})">
                                    <div id="section-image-preview-${idx}" class="mt-2" style="display:none;">
                                        <img src="" class="img-thumbnail" style="max-height: 100px;">
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
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <button type="button" class="btn btn-sm btn-label-primary" onclick="addColumnToTable('sec-spec-thead-${idx}', 'sec-spec-tbody-${idx}', 'sec-spec-table-wrapper-${idx}')">
                                        <i class="ti ti-column-insert me-1"></i> Add Header / Column
                                    </button>
                                    <button type="button" class="btn btn-sm btn-label-primary" onclick="addRowToTable('sec-spec-thead-${idx}', 'sec-spec-tbody-${idx}', 'sec-spec-table-wrapper-${idx}')">
                                        <i class="ti ti-row-insert me-1"></i> Add Data Row
                                    </button>
                                    <button type="button" class="btn btn-sm btn-label-danger ms-auto" onclick="clearTableByIds('sec-spec-thead-${idx}', 'sec-spec-tbody-${idx}', 'sec-spec-table-wrapper-${idx}')">
                                        <i class="ti ti-trash me-1"></i> Clear
                                    </button>
                                </div>

                                <div id="sec-spec-table-wrapper-${idx}" style="display:none;">
                                    <div class="table-responsive">
                                        <table class="spec-table" id="sec-spec-table-${idx}">
                                            <thead id="sec-spec-thead-${idx}"></thead>
                                            <tbody id="sec-spec-tbody-${idx}"></tbody>
                                        </table>
                                    </div>
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
            const el = document.getElementById(`section-fieldset-${idx}`);
            if (el) el.remove();
            if (document.querySelectorAll('.section-container').length === 0) {
                document.getElementById('sections-empty-msg').style.display = 'block';
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
                // Insert before the last td which contains the remove row button, if it exists
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

            // If only the "actions" column or no columns are left
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

            // Make sure header has an empty th for the remove row button if not present
            if (!headerRow.querySelector('.remove-row-header')) {
                const actionTh = document.createElement('th');
                actionTh.className = 'remove-row-header';
                actionTh.style.width = '40px';
                headerRow.appendChild(actionTh);
            }

            wrapper.style.display = 'block';
            const tr = document.createElement('tr');

            // Add inputs for each actual column
            const colCount = headerRow.children.length - 1; // subtract the action column
            for (let i = 0; i < colCount; i++) {
                const td = document.createElement('td');
                td.innerHTML = `<input type="text" placeholder="Value" class="form-control form-control-sm">`;
                tr.appendChild(td);
            }

            // Add remove row button
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
                    document.getElementById(wrapperId).style.display = 'none';
                    document.getElementById(theadId).innerHTML = '';
                    document.getElementById(tbodyId).innerHTML = '';
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

        let featureIndex = 0;

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

        let advantageIndex = 0;
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

        let speciallyDesignedPartIndex = 0;
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

        let imagePartIndex = 0;
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

        // === Serialize table data on submit ===
        document.getElementById('productForm').addEventListener('submit', function () {
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

            // Fallback for single table (Global)
            const gThead = document.getElementById('spec-thead');
            const gTbody = document.getElementById('spec-tbody');
            if (gThead && gThead.querySelector('input') && !document.querySelector('.spec-table-container')) {
                const headers = Array.from(gThead.querySelectorAll('input')).map(i => i.value);
                const rows = Array.from(gTbody.querySelectorAll('tr')).map(tr =>
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

            // 2. Section Tables
            const sections = document.querySelectorAll('.section-container');
            sections.forEach(card => {
                const idParts = card.id.split('-');
                const idx = idParts[idParts.length - 1];
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
                    sRows.forEach((row, r) => {
                        row.forEach((val, c) => {
                            const inp = document.createElement('input');
                            inp.type = 'hidden'; inp.name = `sections[${idx}][table_data][${r}][${c}]`; inp.value = val;
                            sContainer.appendChild(inp);
                        });
                    });
                }
            });
        });

        // === Initial items on load ===
        document.addEventListener('DOMContentLoaded', function () {
            initCKEditors();

            addKeyFeature();
            addSection(); // Show one section by default

            // Design selection initial state
            selectDesign('design1');

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
