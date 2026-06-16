@extends('layouts.backend')

@section('title', 'Edit Job Opening')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Edit Job Opening Details</h5>
                        <a href="{{ route('admin.careers.index') }}" class="btn btn-label-secondary waves-effect">
                            <i class="ti ti-arrow-left me-1"></i> Back
                        </a>
                    </div>
                    <form action="{{ route('admin.careers.update', $career->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Title -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="title">Job Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $career->title) }}" required placeholder="e.g. Mechanical Engineer">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Job Type -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="job_type">Job Type <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('job_type') is-invalid @enderror" id="job_type" name="job_type" value="{{ old('job_type', $career->job_type) }}" required placeholder="e.g. Full Time">
                                @error('job_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>



                            <!-- Description -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="description">Job Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Enter brief job description">{{ old('description', $career->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Requirements Repeater -->
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Key Requirements</label>
                                <div id="requirements-container">
                                    @if($career->requirements && count($career->requirements) > 0)
                                        @foreach($career->requirements as $req)
                                            <div class="input-group mb-2 requirement-item">
                                                <span class="input-group-text"><i class="ti ti-check"></i></span>
                                                <input type="text" name="requirements[]" class="form-control" value="{{ $req }}" placeholder="Enter requirement">
                                                <button class="btn btn-outline-primary add-requirement" type="button"><i class="ti ti-plus"></i></button>
                                                <button class="btn btn-outline-danger remove-requirement" type="button"><i class="ti ti-trash"></i></button>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="input-group mb-2 requirement-item">
                                            <span class="input-group-text"><i class="ti ti-check"></i></span>
                                            <input type="text" name="requirements[]" class="form-control" placeholder="Enter requirement">
                                            <button class="btn btn-outline-primary add-requirement" type="button"><i class="ti ti-plus"></i></button>
                                            <button class="btn btn-outline-danger remove-requirement" type="button"><i class="ti ti-trash"></i></button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <!-- Status -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="status">Status</label>
                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="status" value="Inactive">
                                    <input type="checkbox" class="form-check-input" value="Active" id="status" name="status" required {{ old('status', $career->status) == 'Active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Update Job Opening</button>
                            <a href="{{ route('admin.careers.index') }}" class="btn btn-label-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.add-requirement', function() {
                const html = `
                    <div class="input-group mb-2 requirement-item">
                        <span class="input-group-text"><i class="ti ti-check"></i></span>
                        <input type="text" name="requirements[]" class="form-control" placeholder="Enter requirement">
                        <button class="btn btn-outline-primary add-requirement" type="button"><i class="ti ti-plus"></i></button>
                        <button class="btn btn-outline-danger remove-requirement" type="button"><i class="ti ti-trash"></i></button>
                    </div>`;
                $('#requirements-container').append(html);
            });

            $(document).on('click', '.remove-requirement', function() {
                if ($('.requirement-item').length > 1) {
                    $(this).closest('.requirement-item').remove();
                } else {
                    $(this).closest('.requirement-item').find('input').val('');
                }
            });
        });
    </script>
@endpush


