@extends('layouts.backend')

@section('title', 'Sliders')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <style>
        .cursor-pointer { cursor: pointer; }
        .dataTables_filter input {
            margin-right: 13px !important;
            height: 38px !important; /* Matches standard form-control */
        }
        .dataTables_filter label { margin-bottom: 0; }
        .blink { animation: blinker 1.5s linear infinite; }
        @keyframes blinker { 50% { opacity: 0; } }
        .fs-tiny { font-size: 0.5rem !important; vertical-align: middle; }
    </style>
@endpush

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible mb-2" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-sliders table align-middle">
                <thead class="border-bottom">
                    <tr>
                        <th class="fw-bold">#ID</th>
                        <th class="fw-bold">Image</th>
                        <th class="fw-bold">Title</th>
                        <th class="fw-bold">Btn Name</th>
                        <th class="fw-bold text-center">Status</th>
                        <th class="fw-bold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $slider)
                        <tr class="cursor-pointer" data-url="{{ route('admin.website-pages.sliders.edit', $slider) }}">
                            <td>{{ $slider->id }}</td>
                            <td>
                                @if($slider->photo)
                                    <div class="avatar avatar-md">
                                        <img src="{{ route('uploads.public', ['path' => $slider->photo]) }}" alt="Slider" class="rounded border">
                                    </div>
                                @else
                                    <span class="badge bg-label-secondary">N/A</span>
                                @endif
                            </td>
                            <td>
                                <span class="fw-medium d-block">{{ $slider->title }}</span>
                                <small class="text-muted">{{ $slider->subtitle }}</small>
                            </td>
                            <td>{{ $slider->btn_title ?? 'N/A' }}</td>
                            <td class="text-center">
                                @if($slider->status === 'Active')
                                    <span class="badge border border-success text-success">Active</span>
                                @else
                                    <span class="badge border border-danger text-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-3">
                                    <a href="{{ route('admin.website-pages.sliders.edit', $slider) }}" 
                                       class="text-warning waves-effect" title="Edit Slider">
                                        <i class="ti ti-edit fs-4"></i>
                                    </a>
                                    <form action="{{ route('admin.website-pages.sliders.destroy', $slider) }}" method="POST" id="delete-form-{{ $slider->id }}" title="Delete Slider">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn p-0 border-0 bg-transparent text-danger waves-effect delete-btn" data-id="{{ $slider->id }}">
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
@endsection

@push('page-js')
    <script src="{{ asset('assets/backend/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script>
        $(document).ready(function() {
            var dt_slider_table = $('.datatables-sliders');
            
            if (dt_slider_table.length) {
                var dt_slider = dt_slider_table.DataTable({
                    dom: '<"row"<"col-md-2"l><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-nowrap flex-wrap"<"me-2"f>B>>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    buttons: [
                        {
                            text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New Slider</span>',
                            className: 'add-new btn btn-primary',
                            action: function (e, dt, node, config) {
                                window.location.href = '{{ route('admin.website-pages.sliders.create') }}';
                            }
                        }
                    ],
                    language: {
                        sLengthMenu: '_MENU_',
                        search: '',
                        searchPlaceholder: 'Search Slider',
                        paginate: {
                            next: '<i class="ti ti-chevron-right ti-xs"></i>',
                            previous: '<i class="ti ti-chevron-left ti-xs"></i>'
                        }
                    },
                    responsive: true,
                    ordering: false,
                    initComplete: function () {
                        // Adding status filter control once table initialized
                        this.api()
                            .columns(4)
                            .every(function () {
                                var column = this;
                                var select = $(
                                    '<select id="FilterStatus" class="form-select text-capitalize me-2" style="width: 160px;"><option value="">All Status</option></select>'
                                )
                                    .prependTo('.dt-action-buttons')
                                    .on('change', function () {
                                        var val = $(this).val();
                                        column.search(val).draw();
                                    });

                                // Manual options to ensure they match exactly
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
            $(document).on('click', '.datatables-sliders tbody tr', function(e) {
                // Don't redirect if clicking on actions or buttons
                if ($(e.target).closest('td').index() === 5 || $(e.target).is('button') || $(e.target).is('i') || $(e.target).is('a') || $(e.target).hasClass('delete-btn')) {
                    return;
                }
                window.location.href = $(this).data('url');
            });
        });
    </script>
@endpush

