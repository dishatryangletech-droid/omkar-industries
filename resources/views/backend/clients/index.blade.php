@extends('layouts.backend')

@section('title', 'Client Management')

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
    </style>
@endpush

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible mb-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-clients table align-middle">
                <thead class="border-bottom">
                    <tr>
                        <th class="fw-bold">#ID</th>
                        <th class="fw-bold">Logo</th>
                        <th class="fw-bold">Name</th>
                        <th class="fw-bold text-center">Headquarter</th>
                        <th class="fw-bold text-center">Status</th>
                        <th class="fw-bold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        @php
                            $logoUrl = asset('storage/' . $client->icon);
                            if (!empty($client->icon)) {
                                if (filter_var($client->icon, FILTER_VALIDATE_URL)) {
                                    $logoUrl = $client->icon;
                                } elseif (file_exists(public_path('storage/clients/' . $client->icon))) {
                                    $logoUrl = asset('storage/clients/' . $client->icon);
                                } elseif (file_exists(public_path('storage/' . $client->icon))) {
                                    $logoUrl = asset('storage/' . $client->icon);
                                } elseif (file_exists(public_path('uploads/clients/' . $client->icon))) {
                                    $logoUrl = asset('uploads/clients/' . $client->icon);
                                } elseif (file_exists(public_path('frontend/images/' . $client->icon))) {
                                    $logoUrl = asset('frontend/images/' . $client->icon);
                                }
                            }
                        @endphp
                        <tr class="cursor-pointer" data-url="{{ route('admin.clients.edit', $client->id) }}">
                            <td>{{ $client->id }}</td>
                            <td>
                                @if($client->icon)
                                    <div class="avatar avatar-md border rounded p-1 bg-light d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                        <img src="{{ $logoUrl }}" alt="{{ $client->name }}" class="img-fluid rounded" style="max-height: 100%; object-fit: contain;">
                                    </div>
                                @else
                                    <span class="badge bg-label-secondary">No Logo</span>
                                @endif
                            </td>
                            <td class="fw-medium text-heading">{{ $client->name }}</td>
                            <td class="text-center">
                                @if(strtolower($client->is_headquarter) === 'yes')
                                    <span class="badge border border-primary text-primary">Yes</span>
                                @else
                                    <span class="badge border border-secondary text-secondary">No</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($client->status === 'Active')
                                    <span class="badge border border-success text-success">Active</span>
                                @else
                                    <span class="badge border border-danger text-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-3">
                                    <a href="{{ route('admin.clients.edit', $client->id) }}" 
                                       class="text-warning waves-effect" title="Edit Client">
                                        <i class="ti ti-edit fs-4"></i>
                                    </a>
                                    <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" id="delete-form-{{ $client->id }}" title="Delete Client" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn p-0 border-0 bg-transparent text-danger waves-effect delete-btn" data-id="{{ $client->id }}">
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
            var dt_client_table = $('.datatables-clients');
            
            if (dt_client_table.length) {
                var dt_client = dt_client_table.DataTable({
                    dom: '<"row"<"col-md-3"l><"col-md-9"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-nowrap flex-wrap"<"me-2"f>B>>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    buttons: [
                        {
                            text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New Client</span>',
                            className: 'add-new btn btn-primary',
                            action: function (e, dt, node, config) {
                                window.location.href = "{{ route('admin.clients.create') }}";
                            }
                        }
                    ],
                    language: {
                        sLengthMenu: '_MENU_',
                        search: '',
                        searchPlaceholder: 'Search Clients',
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
            $(document).on('click', '.datatables-clients tbody tr', function(e) {
                if ($(e.target).closest('td').index() === 5 || $(e.target).is('button') || $(e.target).is('i') || $(e.target).is('a') || $(e.target).hasClass('delete-btn')) {
                    return;
                }
                window.location.href = $(this).data('url');
            });
        });
    </script>
@endpush


