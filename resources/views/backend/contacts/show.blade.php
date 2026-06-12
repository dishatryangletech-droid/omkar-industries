@extends('layouts.backend')

@section('title', 'Inquiry Details')

@push('page-css')
    <style>
        .inquiry-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 0.125rem 0.25rem rgba(161, 172, 184, 0.4);
        }
        .inquiry-meta-item {
            padding: 1rem;
            border-radius: 8px;
            background-color: #fcfcfd;
            border: 1px solid #f0f2f4;
            height: 100%;
        }
        .meta-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: #8897ad;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        .meta-value {
            font-weight: 500;
            color: #323232;
        }
        .message-content {
            padding: 1.5rem;
            background-color: #fff;
            border: 1px solid #e6e6e6;
            border-radius: 10px;
            min-height: 150px;
        }
        .avatar-initials {
            width: 45px;
            height: 45px;
            background: #7367f0;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }
    </style>
@endpush

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card inquiry-card overflow-hidden">
                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar-initials">
                            {{ strtoupper(substr($contact->name, 0, 1)) }}
                        </div>
                        <div>
                            <h5 class="mb-0">{{ $contact->name }}</h5>
                            <small class="text-muted">Inquiry ID: #{{ $contact->id }}</small>
                        </div>
                    </div>
                    <a href="#" class="btn btn-sm btn-label-secondary">
                        <i class="ti ti-chevron-left me-1"></i> Back
                    </a>
                </div>
                
                <div class="card-body p-4">
                    <!-- Meta Grid -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="inquiry-meta-item">
                                <div class="meta-label"><i class="ti ti-mail ti-xs me-1"></i> Email</div>
                                <div class="meta-value"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="inquiry-meta-item">
                                <div class="meta-label"><i class="ti ti-calendar ti-xs me-1"></i> Received Date</div>
                                <div class="meta-value">{{ $contact->created_at->format('d M, Y h:i A') }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="inquiry-meta-item">
                                <div class="meta-label"><i class="ti ti-flag ti-xs me-1"></i> Status</div>
                                <div class="meta-value">
                                    <span class="badge bg-label-{{ $contact->status === 'New' ? 'primary' : ($contact->status === 'Read' ? 'success' : 'info') }}">
                                        {{ $contact->status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Subject & Message -->
                    <div class="mb-3">
                        <h6 class="fw-bold text-dark mb-2">Subject: {{ $contact->subject ?? 'General Inquiry' }}</h6>
                        <div class="message-content text-body shadow-none">
                            {{ $contact->message }}
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-light border-top p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex gap-2">
                            <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="btn btn-primary btn-sm px-3">
                                <i class="ti ti-send me-1"></i> Reply Now
                            </a>
                           
                        </div>
                        
                        <form action="#" method="POST" id="delete-form-{{ $contact->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-label-danger btn-sm delete-btn" data-id="{{ $contact->id }}">
                                <i class="ti ti-trash me-1"></i> Delete
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
                    title: 'Delete this inquiry?',
                    text: "This action cannot be undone.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete',
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


