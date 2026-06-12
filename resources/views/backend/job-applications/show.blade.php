@extends('layouts.backend')

@section('title', 'Application Details')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-none border">
                <div class="card-header border-bottom d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0">Application for: <span class="text-primary">{{ $jobApplication->career->title ?? 'N/A' }}</span></h5>
                    <a href="#" class="btn btn-sm btn-label-secondary">
                        <i class="ti ti-chevron-left me-1"></i> Back
                    </a>
                </div>
                <div class="card-body py-4">
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small text-uppercase fw-bold d-block mb-1">Full Name</label>
                            <h6 class="mb-0 fw-bold">{{ $jobApplication->name }}</h6>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small text-uppercase fw-bold d-block mb-1">Email Address</label>
                            <h6 class="mb-0 fw-bold"><a href="mailto:{{ $jobApplication->email }}">{{ $jobApplication->email }}</a></h6>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small text-uppercase fw-bold d-block mb-1">Phone Number</label>
                            <h6 class="mb-0 fw-bold">{{ $jobApplication->phone }}</h6>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small text-uppercase fw-bold d-block mb-1">Status</label>
                            <span class="badge bg-label-{{ $jobApplication->status === 'New' ? 'danger' : ($jobApplication->status === 'Reviewed' ? 'info' : ($jobApplication->status === 'Selected' ? 'success' : 'secondary')) }}">
                                {{ $jobApplication->status }}
                            </span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small text-uppercase fw-bold d-block mb-1">Applied Date</label>
                            <h6 class="mb-0 fw-bold">{{ $jobApplication->created_at->format('d M, Y h:i A') }}</h6>
                        </div>
                    </div>

                    @if($jobApplication->resume)
                        <div class="p-3 bg-light rounded border d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar bg-label-primary rounded p-2">
                                    <i class="ti ti-file-text fs-3"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">Resume / CV</h6>
                                    <small class="text-muted">Download to review the candidate's profile</small>
                                </div>
                            </div>
                            <a href="{{ asset('storage/' . $jobApplication->resume) }}" class="btn btn-primary btn-sm px-3" download>
                                <i class="ti ti-download me-1"></i> Download
                            </a>
                        </div>
                    @else
                        <div class="alert alert-warning mb-0" role="alert">
                            <i class="ti ti-alert-triangle me-2"></i> No resume was uploaded with this application.
                        </div>
                    @endif
                </div>
                <div class="card-footer border-top bg-light p-3">
                    <div class="d-flex justify-content-end gap-2">
                        <form action="#" method="POST" id="delete-form-{{ $jobApplication->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-label-danger btn-sm delete-btn" data-id="{{ $jobApplication->id }}">
                                <i class="ti ti-trash me-1"></i> Delete Application
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.delete-btn', function() {
                const id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This application and the associated resume will be permanently deleted.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it',
                    customClass: {
                        confirmButton: 'btn btn-danger me-3',
                        cancelButton: 'btn btn-label-secondary'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#delete-form-' + id).submit();
                    }
                });
            });
        });
    </script>
@endpush


