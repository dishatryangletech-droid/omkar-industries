@extends('layouts.backend')

@section('title', 'Job Applications')

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
            <table class="datatables-applications table align-middle">
                <thead class="border-bottom">
                    <tr>
                        <th class="fw-bold">Candidate</th>
                        <th class="fw-bold">Position</th>
                        <th class="fw-bold">Contact</th>
                        <th class="fw-bold">Date</th>
                        <th class="fw-bold">Status</th>
                        <th class="fw-bold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $app)
                        <tr class="cursor-pointer" data-url="#">
                            <td>
                                <span class="fw-medium d-block">{{ $app->name }}</span>
                                <small class="text-muted">{{ $app->email }}</small>
                            </td>
                            <td><span class="badge bg-label-primary">{{ $app->career->title ?? 'N/A' }}</span></td>
                            <td>{{ $app->phone }}</td>
                            <td>{{ $app->created_at->format('d M, Y') }}</td>
                            <td>
                                <span class="badge border border-{{ $app->status === 'New' ? 'danger' : ($app->status === 'Reviewed' ? 'info' : ($app->status === 'Selected' ? 'success' : 'secondary')) }} text-{{ $app->status === 'New' ? 'danger' : ($app->status === 'Reviewed' ? 'info' : ($app->status === 'Selected' ? 'success' : 'secondary')) }}">
                                    {{ $app->status }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-3">
                                    <a href="#" 
                                       class="text-info waves-effect" title="View Job Application">
                                        <i class="ti ti-eye fs-4"></i>
                                    </a>
                                    <form action="#" method="POST" id="delete-form-{{ $app->id }}" title="Delete Job Application">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn p-0 border-0 bg-transparent text-danger waves-effect delete-btn" data-id="{{ $app->id }}">
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
            var dt_app_table = $('.datatables-applications');
            
            if (dt_app_table.length) {
                var dt_app = dt_app_table.DataTable({
                    dom: '<"row"<"col-md-2"l><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-nowrap flex-wrap"<"me-2"f>B>>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    buttons: [],
                    language: {
                        sLengthMenu: '_MENU_',
                        search: '',
                        searchPlaceholder: 'Search Application',
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
                                    '<select id="FilterStatus" class="form-select text-capitalize"><option value="">All Status</option></select>'
                                )
                                    .appendTo('.app_status_filter')
                                    .on('change', function () {
                                        var val = $(this).val();
                                        column.search(val).draw();
                                    });

                                select.append('<option value="New">New</option>');
                                select.append('<option value="Reviewed">Reviewed</option>');
                                select.append('<option value="Selected">Selected</option>');
                                select.append('<option value="Rejected">Rejected</option>');
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

            // Handle row click to show
            $(document).on('click', '.datatables-applications tbody tr', function(e) {
                if ($(e.target).closest('td').index() === 5 || $(e.target).is('button') || $(e.target).is('i') || $(e.target).is('a') || $(e.target).hasClass('delete-btn')) {
                    return;
                }
                window.location.href = $(this).data('url');
            });
        });
    </script>
@endpush


