@extends('layouts.backend')

@section('title', 'Why Choose Us Management')

@push('page-css')
    <style>
        fieldset.form-fieldset {
            border: 1px solid #dbdade;
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            background: #fff;
            position: relative;
        }

        fieldset.form-fieldset legend {
            float: none;
            width: auto;
            padding: 0 10px;
            margin-left: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #7367f0;
            background: #fff;
            margin-bottom: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .img-preview { height: 100px; width:100px; border-radius: 8px; border: 1px solid #eee; margin-top: 10px; }
        .cke_notification_warning { display: none !important; }
        
        .admin-sub-section {
            border: 1px solid #dbdade;
            padding: 15px;
            border-radius: 8px;
            height: 100%;
        }

        .admin-sub-section-title {
            font-size: 0.8rem;
            font-weight: 700;
            color: #7367f0;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 6px;
            text-transform: uppercase;
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

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf



        <div class="row">
            <div class="col-12">
                <!-- Main Header Section -->
                <fieldset class="form-fieldset shadow-sm">
                    <legend>Header Section</legend>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Main Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $content->title) }}" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Sub Title / Tagline</label>
                            <input type="text" class="form-control" name="sub_title" value="{{ old('sub_title', $content->subtitle) }}">
                        </div>
                     
                        <div class="col-md-3">
                            <label class="form-label">Button Text</label>
                            <input type="text" class="form-control" name="btn_title" value="{{ old('btn_title', $content->btn_title) }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Button Link</label>
                            <input type="text" class="form-control" name="btn_link" value="{{ old('btn_link', $content->btn_link) }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Featured Image</label>
                            <input type="file" name="photo" class="form-control form-control-sm" accept="image/*" onchange="previewImage(this)">
                                        <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP. Recommended size: 1024x1024px.</small>
                            @if($content->photo)
                                <img id="image_preview" src="{{ asset('storage/' . $content->photo) }}" class="img-preview">
                            @else
                                <img id="image_preview" src="" class="img-preview" style="display: none;">
                            @endif
                        </div>
                    </div>
                </fieldset>

                <!-- 4 Feature Boxes -->
                <fieldset class="form-fieldset shadow-sm">
                    <legend>Feature Highlights (4 Boxes)</legend>
                    <div class="row g-4">
                        @for($i = 1; $i <= 4; $i++)
                            <div class="col-md-6">
                                <div class="admin-sub-section">
                                    <div class="admin-sub-section-title"><i class="ti ti-circle-number-{{ $i }}"></i> Feature Box {{ $i }}</div>
                                    <div class="row g-3">
                                        <div class="col-md-8">
                                            <label class="form-label small">Title</label>
                                            <input type="text" class="form-control form-control-sm" name="feature_title{{ $i }}" value="{{ $content->{'subtitle_text'.$i} }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label small">Count / %</label>
                                            <input type="text" class="form-control form-control-sm" name="feature_count{{ $i }}" value="{{ $content->{'subtitle_count'.$i} }}" placeholder="e.g. 85%">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label small">Description</label>
                                            <textarea class="form-control form-control-sm" name="feature_description{{ $i }}" rows="2">{{ $content->{'subtitle_dsc'.$i} }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </fieldset>
            </div>
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-primary waves-effect px-5">
                    <i class="ti ti-device-floppy me-1"></i> Update Content
                </button>
            </div>
        </div>
    </form>
@endsection

@push('page-js')
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush


