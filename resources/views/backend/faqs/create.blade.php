@extends('layouts.backend')

@section('title', 'Add New FAQ')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">FAQ Details</h5>
                        <a href="{{ route('admin.faqs.index') }}" class="btn btn-label-secondary waves-effect">
                            <i class="ti ti-arrow-left me-1"></i> Back
                        </a>
                    </div>
                    
                    <form action="{{ route('admin.faqs.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Question -->
                            <div class="col-12 mb-3">
                                <label class="form-label text-heading" for="question">Question <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('question') is-invalid @enderror" id="question" name="question" value="{{ old('question') }}" placeholder="Enter the question" required>
                                @error('question')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Answer -->
                            <div class="col-12 mb-3">
                                <label class="form-label text-heading" for="answer">Answer <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('answer') is-invalid @enderror ckeditor" id="answer" name="answer" rows="6" placeholder="Enter the answer" required>{{ old('answer') }}</textarea>
                                @error('answer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sort Order -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-heading" for="sort_order">Sort Order</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" placeholder="e.g. 0, 1, 2">
                                <small class="text-muted">Ascending order is used for display (e.g. 0 comes first).</small>
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-heading d-block mb-2" for="status">Status</label>
                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="status" value="Inactive">
                                    <input type="checkbox" class="form-check-input" value="Active" id="status" name="status" checked>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Create FAQ</button>
                            <a href="{{ route('admin.faqs.index') }}" class="btn btn-label-secondary">Cancel</a>
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
                CKEDITOR.config.versionCheck = false;
                CKEDITOR.replace('answer', {
                    height: 250
                });
            }
        });
    </script>
@endpush

