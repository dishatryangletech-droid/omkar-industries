@extends('layouts.backend')

@section('title', 'Header Settings')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/select2/select2.css') }}" />
    <style>
        .sortable-list {
            list-style: none;
            padding: 0;
            margin: 0;
            margin-top: 15px;
        }
        .sortable-list li {
            background: #fff;
            border: 1px solid #e1e0e2;
            padding: 10px 15px;
            margin-bottom: 8px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
            cursor: grab;
        }
        .sortable-list li:active {
            cursor: grabbing;
        }
        .drag-handle {
            color: #a1a0a2;
            margin-right: 10px;
            cursor: grab;
        }
        .remove-item {
            color: #ba0001;
            cursor: pointer;
            border: none;
            background: none;
            padding: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
        }
        .remove-item:hover {
            background: #ffe5e5;
        }
    </style>
@endpush

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible mb-4" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Global Header & Navigation Settings</h5>
                    <form action="{{ route('admin.website-pages.header-settings.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @php $headerSettings = $headerSettings ?? []; @endphp

                            <!-- Header Action Buttons (Brochure & Video) Section -->
                            <div class="col-12 mb-5">
                                <h6 class="text-primary border-bottom pb-2 mb-3">
                                    <i class="ti ti-click me-2"></i>Header Action Buttons (Brochure & Video)
                                </h6>
                                <div class="alert alert-info py-2 px-3 mb-4 small">
                                    <i class="ti ti-info-circle me-1"></i>
                                    <strong>Dynamic Visibility:</strong> These buttons will only appear in the website header navigation if a file or link is uploaded/configured. If left empty, they will stay hidden.
                                </div>

                                <div class="row g-4">
                                    <!-- Brochure Button Settings -->
                                    <div class="col-lg-6">
                                        <div class="border rounded p-3 h-100 bg-lighter">
                                            <div class="d-flex align-items-center mb-3">
                                                <span class="badge bg-label-danger p-2 me-2 rounded">
                                                    <i class="ti ti-file-text fs-4"></i>
                                                </span>
                                                <div>
                                                    <h6 class="mb-0">Brochure Button</h6>
                                                    <small class="text-muted">Allows visitors to download or view your brochure</small>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Button Label / Text</label>
                                                <input type="text" name="brochure_title" class="form-control" 
                                                       value="{{ old('brochure_title', $headerSettings['brochure_title'] ?? 'Brochure') }}" 
                                                       placeholder="e.g. Brochure, Download Brochure">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Upload Brochure File (PDF)</label>
                                                <input type="file" name="brochure_file" class="form-control" accept=".pdf,.doc,.docx">
                                                <div class="form-text">Supported: PDF, DOC, DOCX. Max: 50MB.</div>
                                            </div>

                                            @if(!empty($headerSettings['brochure_file']) && \Illuminate\Support\Facades\Storage::disk('public')->exists($headerSettings['brochure_file']))
                                                <div class="card shadow-none border bg-white p-3 mt-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center text-truncate me-2">
                                                            <i class="ti ti-file-type-pdf text-danger fs-3 me-2"></i>
                                                            <div class="text-truncate">
                                                                <span class="fw-semibold small d-block text-truncate">{{ basename($headerSettings['brochure_file']) }}</span>
                                                                <span class="badge bg-label-success badge-sm">Uploaded</span>
                                                            </div>
                                                        </div>
                                                        <a href="{{ route('uploads.public', ['path' => $headerSettings['brochure_file']]) }}" target="_blank" download class="btn btn-sm btn-outline-primary text-nowrap">
                                                            <i class="ti ti-download me-1"></i> View / Download
                                                        </a>
                                                    </div>
                                                    <div class="form-check mt-3 pt-2 border-top">
                                                        <input class="form-check-input" type="checkbox" name="remove_brochure" value="1" id="removeBrochure">
                                                        <label class="form-check-label text-danger small fw-semibold" for="removeBrochure">
                                                            <i class="ti ti-trash me-1"></i> Remove this brochure file
                                                        </label>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Video Button Settings -->
                                    <div class="col-lg-6">
                                        <div class="border rounded p-3 h-100 bg-lighter">
                                            <div class="d-flex align-items-center mb-3">
                                                <span class="badge bg-label-warning p-2 me-2 rounded">
                                                    <i class="ti ti-video fs-4"></i>
                                                </span>
                                                <div>
                                                    <h6 class="mb-0">Video Button</h6>
                                                    <small class="text-muted">Direct video player or YouTube popup in header</small>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Button Label / Text</label>
                                                <input type="text" name="video_title" class="form-control" 
                                                       value="{{ old('video_title', $headerSettings['video_title'] ?? 'Watch Video') }}" 
                                                       placeholder="e.g. Watch Video, Machine Demo">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Upload Video File</label>
                                                <input type="file" name="video_file" class="form-control" accept="video/mp4,video/webm,video/ogg,video/quicktime">
                                                <div class="form-text">Supported: MP4, WebM, MOV. Max: 100MB.</div>
                                            </div>

                                            @if(!empty($headerSettings['video_file']) && \Illuminate\Support\Facades\Storage::disk('public')->exists($headerSettings['video_file']))
                                                <div class="card shadow-none border bg-white p-3 mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center text-truncate me-2">
                                                            <i class="ti ti-video text-warning fs-3 me-2"></i>
                                                            <div class="text-truncate">
                                                                <span class="fw-semibold small d-block text-truncate">{{ basename($headerSettings['video_file']) }}</span>
                                                                <span class="badge bg-label-success badge-sm">Uploaded File</span>
                                                            </div>
                                                        </div>
                                                        <a href="{{ route('uploads.public', ['path' => $headerSettings['video_file']]) }}" target="_blank" class="btn btn-sm btn-outline-warning text-nowrap">
                                                            <i class="ti ti-player-play me-1"></i> View Video
                                                        </a>
                                                    </div>
                                                    <div class="form-check mt-3 pt-2 border-top">
                                                        <input class="form-check-input" type="checkbox" name="remove_video" value="1" id="removeVideo">
                                                        <label class="form-check-label text-danger small fw-semibold" for="removeVideo">
                                                            <i class="ti ti-trash me-1"></i> Remove this video file
                                                        </label>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="mb-1">
                                                <label class="form-label fw-semibold">OR Video Link / URL</label>
                                                <input type="url" name="video_link" class="form-control" 
                                                       value="{{ old('video_link', $headerSettings['video_link'] ?? '') }}" 
                                                       placeholder="https://www.youtube.com/watch?v=...">
                                                <div class="form-text">Optional: External video link (e.g. YouTube / Vimeo).</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Header Dropdown Products Section -->
                            <div class="col-12 mb-5">
                                <h6 class="text-primary border-bottom pb-2 mb-3"><i class="ti ti-box me-2"></i>Products in Header Dropdown Menu</h6>
                                <p class="text-muted small mb-3">Select a product to add to the Header Dropdown. Drag items to reorder them.</p>
                                
                                <select id="all-select" class="select2 form-select">
                                    <option value="">-- Add a Product --</option>
                                    @foreach($products as $product)
                                        @if( ($product->parent_id === null || $product->parent_id == 0) && $product->slug !== 'other-product-page' )
                                            <option value="{{ $product->id }}" data-title="{{ $product->title }}">
                                                {{ $product->title }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>

                                @php $selectedAll = $selectedAll ?? []; @endphp
                                <ul id="all-list" class="sortable-list" data-name="all_machines">
                                    @foreach($selectedAll as $id)
                                        @php $p = $products->firstWhere('id', $id); @endphp
                                        @if($p)
                                            <li data-id="{{ $p->id }}">
                                                <div>
                                                    <i class="ti ti-grip-vertical drag-handle"></i>
                                                    <span class="item-title">{{ $p->title }}</span>
                                                    <input type="hidden" name="all_machines[]" value="{{ $p->id }}">
                                                </div>
                                                <button type="button" class="remove-item"><i class="ti ti-x"></i></button>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary px-5">
                                <i class="ti ti-device-floppy me-1"></i> Save Header Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="{{ asset('assets/backend/vendor/libs/select2/select2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        $(document).ready(function() {
            
            $('.select2').select2({
                width: '100%'
            });

            // Initialize Sortable lists
            $('.sortable-list').each(function() {
                Sortable.create(this, {
                    animation: 150,
                    handle: '.drag-handle',
                    ghostClass: 'bg-light'
                });
            });

            function getListValues(listId) {
                var vals = [];
                $('#' + listId + ' li').each(function() {
                    vals.push($(this).data('id').toString());
                });
                return vals;
            }

            function updateSelectOptions() {
                var allVals = getListValues('all-list');

                // Update All Select
                $('#all-select option').each(function() {
                    if ($(this).val() === "") return;
                    if (allVals.includes($(this).val())) {
                        $(this).prop('disabled', true);
                    } else {
                        $(this).prop('disabled', false);
                    }
                });

                $('.select2').select2({ width: '100%' }); // Refresh
            }

            // Initial call
            updateSelectOptions();

            function createListItem(id, title, inputName) {
                return `
                    <li data-id="${id}">
                        <div>
                            <i class="ti ti-grip-vertical drag-handle"></i>
                            <span class="item-title">${title}</span>
                            <input type="hidden" name="${inputName}[]" value="${id}">
                        </div>
                        <button type="button" class="remove-item"><i class="ti ti-x"></i></button>
                    </li>
                `;
            }

            // Handle Add Product to All
            $('#all-select').on('change', function() {
                var id = $(this).val();
                if (!id) return;
                var title = $(this).find('option:selected').data('title');
                
                $('#all-list').append(createListItem(id, title, 'all_machines'));
                $(this).val('').trigger('change.select2');
                updateSelectOptions();
            });

            // Handle Remove
            $(document).on('click', '.remove-item', function() {
                $(this).closest('li').remove();
                updateSelectOptions();
            });

        });
    </script>
@endpush


