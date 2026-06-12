@extends('layouts.backend')

@section('title', 'Edit Blog')

@push('page-css')
    <style>
        .cke_notification_warning { display: none !important; }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Edit Blog Details</h5>
                        <a href="#" class="btn btn-label-secondary waves-effect">
                            <i class="ti ti-arrow-left me-1"></i> Back
                        </a>
                    </div>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h6 class="fw-bold mb-3"><i class="ti ti-info-circle me-1"></i> Blog Details</h6>
                        <div class="row">
                            <!-- Title -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="title">Blog Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $blog->title) }}" required placeholder="Enter blog title">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>



                            <!-- Date -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="date">Published Date</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $blog->date ? $blog->date->format('Y-m-d') : '') }}">
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="image">Featured Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                        <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP. Recommended size: 1024x1024px.</small>
                                @if($blog->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="rounded border" style="max-height: 100px;max-width: 100px;">
                                    </div>
                                @endif
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                           
                            <!-- Social Links -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="facebook_link">Facebook Link</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-brand-facebook"></i></span>
                                    <input type="url" name="facebook_link" id="facebook_link" class="form-control" value="{{ old('facebook_link', $blog->facebook_link) }}" placeholder="https://facebook.com/...">
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="linkedin_link">LinkedIn Link</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-brand-linkedin"></i></span>
                                    <input type="url" name="linkedin_link" id="linkedin_link" class="form-control" value="{{ old('linkedin_link', $blog->linkedin_link) }}" placeholder="https://linkedin.com/...">
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="instagram_link">Instagram Link</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-brand-instagram"></i></span>
                                    <input type="url" name="instagram_link" id="instagram_link" class="form-control" value="{{ old('instagram_link', $blog->instagram_link) }}" placeholder="https://instagram.com/...">
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label" for="twitter_link">Twitter (X) Link</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-brand-twitter"></i></span>
                                    <input type="url" name="twitter_link" id="twitter_link" class="form-control" value="{{ old('twitter_link', $blog->twitter_link) }}" placeholder="https://twitter.com/...">
                                </div>
                            </div>




                            <!-- Description -->
                            <div class="col-6 mb-4">
                                <label class="form-label" for="description">Blog Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror ckeditor" id="description" name="description" rows="5" placeholder="Enter blog content">{{ old('description', $blog->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr class="my-4">
                            
                            <!-- SEO Section -->
                            <div class="col-12 mt-2">
                                <h6 class="fw-bold mb-3"><i class="ti ti-search me-1"></i> SEO Metadata</h6>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="slug">Blog Slug <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $blog->slug) }}" required placeholder="blog-url-slug">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="meta_title">Meta Title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $blog->meta_title) }}" placeholder="Enter meta title">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="meta_description">Meta Description</label>
                                        <textarea class="form-control" id="meta_description" name="meta_description" rows="3" placeholder="Enter meta description">{{ old('meta_description', $blog->meta_description) }}</textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="meta_keywords">Meta Keywords</label>
                                        <textarea class="form-control" id="meta_keywords" name="meta_keywords" rows="2" placeholder="Enter keywords separated by commas">{{ old('meta_keywords', $blog->meta_keywords) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center mt-4">
                            <!-- Status -->
                            <div class="col-md-3">
                                <div class="form-check form-switch">
                                    <input type="hidden" name="status" value="Inactive">
                                    <input type="checkbox" class="form-check-input" value="Active" id="status" name="status" required {{ old('status', $blog->status) == 'Active' ? 'checked' : '' }}>
                                    <label class="form-check-label fw-medium" for="status">Active Status</label>
                                </div>
                            </div>
                            <div class="col-md-9 text-end">
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="ti ti-check me-1"></i> Update Blog
                                </button>
                                <a href="#" class="btn btn-label-secondary">
                                    <i class="ti ti-x me-1"></i> Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            if ($('.ckeditor').length) {
                CKEDITOR.replace('description', {
                    height: 400,
                    versionCheck: false
                });
            }

            // Auto-slug generation
            $('#title').on('input', function() {
                let title = $(this).val();
                let slug = title.toLowerCase()
                    .replace(/[^a-z0-9- ]/g, '')
                    .replace(/ +/g, '-')
                    .replace(/^-+|-+$/g, '');
                $('#slug').val(slug);
            });
        });
    </script>
@endpush


