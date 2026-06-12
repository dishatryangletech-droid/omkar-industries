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
            min-height: 100px;
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
        .location-badge {
            background-color: #e8e7ff;
            color: #7367f0;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
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
                            {{ strtoupper(substr($dealerInquiry->name, 0, 1)) }}
                        </div>
                        <div>
                            <h5 class="mb-0">{{ $dealerInquiry->name }}</h5>
                            <small class="text-muted">Dealer Inquiry #{{ $dealerInquiry->id }}</small>
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
                                <div class="meta-value"><a href="mailto:{{ $dealerInquiry->email }}">{{ $dealerInquiry->email }}</a></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="inquiry-meta-item">
                                <div class="meta-label"><i class="ti ti-calendar ti-xs me-1"></i> Received Date</div>
                                <div class="meta-value">{{ $dealerInquiry->created_at ? $dealerInquiry->created_at->format('d M, Y h:i A') : 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="inquiry-meta-item">
                                <div class="meta-label"><i class="ti ti-flag ti-xs me-1"></i> Status</div>
                                <div class="meta-value">
                                    <span class="badge bg-label-{{ $dealerInquiry->status === 'New' ? 'primary' : ($dealerInquiry->status === 'Read' ? 'success' : 'info') }}">
                                        {{ $dealerInquiry->status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Business Details -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="inquiry-meta-item">
                                <div class="meta-label"><i class="ti ti-building ti-xs me-1"></i> Business Name</div>
                                <div class="meta-value">{{ $dealerInquiry->business_name ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inquiry-meta-item">
                                <div class="meta-label"><i class="ti ti-history ti-xs me-1"></i> Experience</div>
                                <div class="meta-value">{{ $dealerInquiry->years_in_business ?? '0' }} Years in Business</div>
                            </div>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="mb-4">
                        <h6 class="fw-bold text-dark mb-2">Target Location</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="location-badge"><i class="ti ti-map-pin ti-xs me-1"></i>City: {{ $dealerInquiry->city ?? 'N/A' }}</span>
                            <span class="location-badge"><i class="ti ti-map ti-xs me-1"></i>State: {{ $dealerInquiry->state ?? 'N/A' }}</span>
                            <span class="location-badge"><i class="ti ti-world ti-xs me-1"></i>Country: {{ $dealerInquiry->country ?? 'N/A' }}</span>
                        </div>
                    </div>

                    <!-- Interest & Value -->
                    <div class="mb-4">
                        <h6 class="fw-bold text-dark mb-2">Interest in Becoming a Dealer</h6>
                        <div class="message-content text-body shadow-none">
                            {{ $dealerInquiry->interest_description ?? 'No description provided.' }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6 class="fw-bold text-dark mb-2">Value to Our Network</h6>
                        <div class="message-content text-body shadow-none">
                            {{ $dealerInquiry->value_description ?? 'No description provided.' }}
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-light border-top p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex gap-2">
                            <a href="mailto:{{ $dealerInquiry->email }}?subject=Sundaram Corporation: Dealership Inquiry Response" class="btn btn-primary btn-sm px-3">
                                <i class="ti ti-send me-1"></i> Contact Applicant
                            </a>
                        </div>
                        
                        <form action="#" method="POST" id="delete-form-{{ $dealerInquiry->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-label-danger btn-sm delete-btn" data-id="{{ $dealerInquiry->id }}">
                                <i class="ti ti-trash me-1"></i> Delete Inquiry
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


