@extends('layouts.backend')

@section('title', 'Our Clients Video Section Management')

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

        .img-preview {
            max-height: 200px;
            border-radius: 8px;
            border: 1px solid #eee;
            margin-top: 15px;
            width: 100%;
            object-fit: cover;
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
                <fieldset class="form-fieldset shadow-sm">
                    <legend>Content Settings</legend>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Main Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $content->title) }}"
                                placeholder="e.g. Watch how we deliver quality manufacturing">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Video URL (YouTube/Vimeo)</label>
                            <input type="text" class="form-control" name="video_link"
                                value="{{ old('video_link', $content->btn_link) }}"
                                placeholder="e.g. https://www.youtube.com/watch?v=...">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">OR Video File Upload</label>
                            <input type="file" name="video_file" class="form-control" accept="video/mp4,video/x-m4v,video/*">
                            @if($content->video_file)
                                <small class="text-success d-block mt-1">Video currently uploaded</small>
                                <video width="100%" height="150" controls class="mt-2" style="border-radius: 8px;">
                                    <source src="{{ asset('storage/' . $content->video_file) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>
                        <div class="col-12">
                            <label class="form-label">Background Image</label>
                            <input type="file" name="background_photo" class="form-control" accept="image/*"
                                onchange="previewImage(this)">
                                        <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP. Recommended size: 1024x1024px.</small>
                            @if($content->background_photo)
                                <img id="image_preview" src="{{ asset('storage/' . $content->background_photo) }}"
                                    class="img-preview shadow-sm">
                            @else
                                <img id="image_preview" src="" class="img-preview" style="display: none;">
                            @endif
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-primary waves-effect px-5">
                    <i class="ti ti-device-floppy me-1"></i> Update Section
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
                reader.onload = function (e) {
                    $('#image_preview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush

