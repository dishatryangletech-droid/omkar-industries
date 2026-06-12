@extends('layouts.backend')

@section('title', 'FAQ Management')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <style>
        .cursor-pointer { cursor: pointer; }
        .dataTables_filter input {
            margin-right: 13px !important;
            height: 38px !important;
        }
        .dataTables_filter label { margin-bottom: 0; }
        .faq-answer-cell {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endpush

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible mb-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <!-- FAQ Section Settings Card -->
        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">FAQ Section Settings</h5>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label" for="subtitle">Subtitle / Tagline</label>
                            <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" value="{{ old('subtitle', $content->subtitle) }}" placeholder="e.g. ASK QUESTION">
                            @error('subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $content->title) }}" placeholder="e.g. Frequently Asked Questions">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Enter brief description...">{{ old('description', $content->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="btn_title">Contact Phone</label>
                            <input type="text" class="form-control @error('btn_title') is-invalid @enderror" id="btn_title" name="btn_title" value="{{ old('btn_title', $content->btn_title) }}" placeholder="e.g. +1 234 567 890">
                            @error('btn_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="btn_link">Contact Email</label>
                            <input type="text" class="form-control @error('btn_link') is-invalid @enderror" id="btn_link" name="btn_link" value="{{ old('btn_link', $content->btn_link) }}" placeholder="e.g. info@omkarindustries.com">
                            @error('btn_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="photo">Left Background Image</label>
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                            <small class="text-muted d-block mt-1">Allowed: JPG, JPEG, PNG, WEBP. Max: 2MB.</small>
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if($content->photo)
                                <div class="mt-3">
                                    <p class="mb-1 fw-medium text-muted small">Current Background Image:</p>
                                    <img src="{{ asset('storage/' . $content->photo) }}" alt="FAQ Background" class="img-fluid rounded border shadow-sm" style="max-height: 150px; object-fit: cover;">
                                </div>
                            @else
                                <div class="mt-3">
                                    <p class="mb-1 fw-medium text-muted small">Default Image:</p>
                                    <img src="{{ asset('frontend/images/homepage-1/bg/accordion-img.jpg') }}" alt="FAQ Default Background" class="img-fluid rounded border shadow-sm" style="max-height: 150px; object-fit: cover;">
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-2">Update Section Settings</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- FAQ Items List Card -->
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card h-100">
                <div class="card-datatable table-responsive pt-0">
                    <table class="datatables-faqs table align-middle">
                        <thead class="border-bottom">
                            <tr>
                                <th class="fw-bold">#ID</th>
                                <th class="fw-bold">Question</th>
                                <th class="fw-bold">Answer</th>
                                <th class="fw-bold text-center">Order</th>
                                <th class="fw-bold text-center">Status</th>
                                <th class="fw-bold text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($faqs as $faq)
                                <tr class="cursor-pointer" data-url="#">
                                    <td>{{ $faq->id }}</td>
                                    <td class="fw-medium text-heading">{{ $faq->question }}</td>
                                    <td class="faq-answer-cell text-muted">{{ strip_tags($faq->answer) }}</td>
                                    <td class="text-center">{{ $faq->sort_order }}</td>
                                    <td class="text-center">
                                        @if($faq->status === 'Active')
                                            <span class="badge border border-success text-success">Active</span>
                                        @else
                                            <span class="badge border border-danger text-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-3">
                                            <a href="#" 
                                               class="text-warning waves-effect" title="Edit FAQ">
                                                <i class="ti ti-edit fs-4"></i>
                                            </a>
                                            <form action="#" method="POST" id="delete-form-{{ $faq->id }}" title="Delete FAQ" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn p-0 border-0 bg-transparent text-danger waves-effect delete-btn" data-id="{{ $faq->id }}">
                                                    <i class="ti ti-trash fs-4"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="{{ asset('assets/backend/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script>
        $(document).ready(function() {
            var dt_faq_table = $('.datatables-faqs');
            
            if (dt_faq_table.length) {
                var dt_faq = dt_faq_table.DataTable({
                    dom: '<"row"<"col-md-3"l><"col-md-9"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-nowrap flex-wrap"<"me-2"f>B>>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    buttons: [
                        {
                            text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New FAQ</span>',
                            className: 'add-new btn btn-primary',
                            action: function (e, dt, node, config) {
                                window.location.href = '#';
                            }
                        }
                    ],
                    language: {
                        sLengthMenu: '_MENU_',
                        search: '',
                        searchPlaceholder: 'Search FAQs',
                        paginate: {
                            next: '<i class="ti ti-chevron-right ti-xs"></i>',
                            previous: '<i class="ti ti-chevron-left ti-xs"></i>'
                        }
                    },
                    responsive: true,
                    ordering: false,
                    initComplete: function () {
                        this.api()
                            .columns(4)
                            .every(function () {
                                var column = this;
                                var select = $(
                                    '<select id="FilterStatus" class="form-select text-capitalize me-2" style="width: 140px;"><option value="">All Status</option></select>'
                                )
                                    .prependTo('.dt-action-buttons')
                                    .on('change', function () {
                                        var val = $(this).val();
                                        column.search(val).draw();
                                    });

                                select.append('<option value="Active">Active</option>');
                                select.append('<option value="Inactive">Inactive</option>');
                            });
                    }
                });
            }

            // Handle delete confirmation
            $(document).on('click', '.delete-btn', function() {
                const id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#delete-form-' + id).submit();
                    }
                });
            });

            // Handle row click to edit
            $(document).on('click', '.datatables-faqs tbody tr', function(e) {
                if ($(e.target).closest('td').index() === 5 || $(e.target).is('button') || $(e.target).is('i') || $(e.target).is('a') || $(e.target).hasClass('delete-btn')) {
                    return;
                }
                window.location.href = $(this).data('url');
            });
        });
    </script>
@endpush


