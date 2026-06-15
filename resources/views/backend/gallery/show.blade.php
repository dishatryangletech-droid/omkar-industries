@extends('layouts.backend')

@section('title', 'Manage Gallery - ' . $gallery->tab_name)

@push('page-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <style>
        .image-card { transition: transform 0.2s; position: relative; }
        .image-card:hover { transform: scale(1.02); }
        .delete-overlay {
            position: absolute;
            top: 10px;
            right: 10px;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .image-card:hover .delete-overlay { opacity: 1; }
        .upload-area {
            border: 2px dashed #dbdade;
            border-radius: 0.375rem;
            padding: 2rem;
            text-align: center;
            background: #f8f7f8;
            cursor: pointer;
        }
        .upload-area:hover { border-color: #7367f0; background: #eeedfd; }
    </style>
@endpush

@section('content')
    <form action="{{ route('admin.gallery.upload', $gallery->id) }}" method="POST" enctype="multipart/form-data" id="galleryUploadForm">
        @csrf
        
        <div class="d-flex align-items-center justify-content-between py-3 mb-4">
            <h4 class="fw-bold mb-0">
                <span class="text-muted fw-light">Gallery /</span> {{ $gallery->tab_name }}
            </h4>
        </div>

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
            <!-- Sidebar Info & Upload -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header border-bottom">
                        <h5 class="card-title mb-0"> {{ $gallery->tab_name }} - Tab Details</h5>
                    </div>
                    <div class="card-body pt-4">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name:</label>
                            <input type="text" class="form-control" value="{{ $gallery->tab_name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Status:</label>
                            <div>
                                <span class="badge bg-label-{{ $gallery->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($gallery->status) }}
                                </span>
                            </div>
                        </div>
                        <div class="mb-0">
                            <label class="form-label fw-bold">Total Images:</label>
                            <p class="mb-0 fs-5 text-primary">{{ count($gallery->images ?? []) }}</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header border-bottom">
                        <h5 class="card-title mb-0">Upload New</h5>
                    </div>
                    <div class="card-body pt-4 text-center">
                        <label for="imageInput" class="upload-area w-100 d-block">
                            <i class="ti ti-cloud-upload fs-1 text-muted mb-2"></i>
                            <p class="mb-0">Click to select multiple images</p>
                            <input type="file" name="images[]" class="d-none" multiple accept="image/*" id="imageInput">
                                        <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP. Recommended size: 1024x1024px.</small>
                        </label>
                        <div id="previewArea" class="row g-2 mt-3"></div>
                    </div>
                </div>
            </div>

            <!-- Image Grid -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h5 class="card-title mb-0">Gallery Images</h5>
                    </div>
                    <div class="card-body pt-4">
                        @if($gallery->images && count($gallery->images) > 0)
                            <div class="row g-4">
                                @foreach($gallery->images as $image)
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="card shadow-none border image-card">
                                            <a href="{{ asset('storage/' . $image) }}" data-fancybox="gallery">
                                                <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image" class="card-img-top rounded" style="height: 180px; object-fit: cover;">
                                            </a>
                                            <div class="delete-overlay">
                                                <button type="button" class="btn btn-icon btn-sm btn-danger shadow-sm delete-img-btn" 
                                                        data-path="{{ $image }}" 
                                                        data-url="{{ route('admin.gallery.delete_image', $gallery->id) }}">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="ti ti-photo-off fs-1 text-muted d-block mb-2"></i>
                                <p class="text-muted mb-0">No images uploaded yet.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-check me-1"></i> Save Changes
                            </button>
                            <a href="{{ route('admin.gallery.index') }}" class="btn btn-label-secondary">
                                <i class="ti ti-x me-1"></i> Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Hidden form for image deletion -->
    <form id="deleteImageForm" method="POST" class="d-none">
        @csrf
        <input type="hidden" name="image_path" id="delete_image_path">
    </form>
@endsection

@push('page-js')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {});

        // Image Preview Logic
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const previewArea = document.getElementById('previewArea');
            previewArea.innerHTML = '';
            
            if (this.files && this.files.length > 0) {
                Array.from(this.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const col = document.createElement('div');
                        col.className = 'col-3';
                        col.innerHTML = `
                            <img src="${event.target.result}" class="w-100 rounded border shadow-sm" style="height: 50px; object-fit: cover;">
                        `;
                        previewArea.appendChild(col);
                    }
                    reader.readAsDataURL(file);
                });
            }
        });

        // SweetAlert2 for Image Deletion
        $(document).on('click', '.delete-img-btn', function() {
            const path = $(this).data('path');
            const url = $(this).data('url');

            Swal.fire({
                title: 'Delete this image?',
                text: "This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ea5455',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete_image_path').val(path);
                    $('#deleteImageForm').attr('action', url).submit();
                }
            });
        });
    </script>
@endpush


