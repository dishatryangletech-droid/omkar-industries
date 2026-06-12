@extends('layouts.backend')

@section('title', 'Job Openings')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <style>
        .cursor-pointer { cursor: pointer; }
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
            <table class="datatables-careers table align-middle">
                <thead class="border-bottom">
                    <tr>
                        <th class="fw-bold">#ID</th>
                        <th class="fw-bold">Job Title</th>
                        <th class="fw-bold">Type</th>
                        <th class="fw-bold">Status</th>
                        <th class="fw-bold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($careers as $career)
                        <tr class="cursor-pointer" data-url="#">
                            <td>{{ $career->id }}</td>
                            <td>{{ $career->title }}</td>
                            <td><span class="badge bg-label-info">{{ $career->job_type }}</span></td>
                            <td>
                                <span class="badge border border-{{ $career->status === 'Active' ? 'success' : 'danger' }} text-{{ $career->status === 'Active' ? 'success' : 'danger' }}">
                                    {{ $career->status }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-3">
                                    <a href="#" 
                                       class="text-warning waves-effect" title="Edit Job Opening">
                                        <i class="ti ti-edit fs-4"></i>
                                    </a>
                                    <form action="#" method="POST" id="delete-form-{{ $career->id }}" title="Delete Job Opening">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn p-0 border-0 bg-transparent text-danger waves-effect delete-btn" data-id="{{ $career->id }}">
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
            var dt_career_table = $('.datatables-careers');
            
            if (dt_career_table.length) {
                var dt_career = dt_career_table.DataTable({
                    dom: '<"row"<"col-md-2"l><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-nowrap flex-wrap"<"me-2"f>B>>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    buttons: [
                        {
                            text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New Job</span>',
                            className: 'add-new btn btn-primary',
                            action: function (e, dt, node, config) {
                                window.location.href = '#';
                            }
                        }
                    ],
                    language: {
                        sLengthMenu: '_MENU_',
                        search: '',
                        searchPlaceholder: 'Search Job',
                        paginate: {
                            next: '<i class="ti ti-chevron-right ti-xs"></i>',
                            previous: '<i class="ti ti-chevron-left ti-xs"></i>'
                        }
                    },
                    responsive: true,
                    ordering: false,
                    initComplete: function () {
                        this.api()
                            .columns(3)
                            .every(function () {
                                var column = this;
                                var select = $(
                                    '<select id="FilterStatus" class="form-select text-capitalize"><option value="">All Status</option></select>'
                                )
                                    .appendTo('.job_status_filter')
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
            $(document).on('click', '.datatables-careers tbody tr', function(e) {
                if ($(e.target).closest('td').index() === 4 || $(e.target).is('button') || $(e.target).is('i') || $(e.target).is('a') || $(e.target).hasClass('delete-btn')) {
                    return;
                }
                window.location.href = $(this).data('url');
            });
        });
    </script>
@endpush



