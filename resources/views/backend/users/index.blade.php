@extends('layouts.backend')

@section('title', 'User Management')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <style>
        .cursor-pointer {
            cursor: pointer;
        }

        .dataTables_filter input {
            margin-right: 13px !important;
            height: 38px !important;
        }

        .dataTables_filter label {
            margin-bottom: 0;
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

    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-users table align-middle">
                <thead class="border-bottom">
                    <tr>
                        <th class="fw-bold">#ID</th>
                        <th class="fw-bold">Profile</th>
                        <th class="fw-bold">Name</th>
                        <th class="fw-bold">Email</th>
                        <th class="fw-bold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="cursor-pointer" data-url="#">
                            <td>{{ $user->id }}</td>
                            <td>
                                @if($user->profile_image)
                                    <div class="avatar avatar-md border rounded p-1 bg-light d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px;">
                                        @php
                                            $imagePath = str_starts_with($user->profile_image, 'uploads/') 
                                                ? asset($user->profile_image) 
                                                : asset('storage/' . $user->profile_image);
                                        @endphp
                                        <img src="{{ $imagePath }}" alt="{{ $user->name }}"
                                            class="img-fluid rounded" style="max-height: 100%; object-fit: contain;">
                                    </div>
                                @else
                                    <div class="avatar avatar-md border rounded bg-label-primary d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px;">
                                        <span class="fs-4">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                    </div>
                                @endif
                            </td>
                            <td class="fw-medium text-heading">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-3">
                                    <a href="#" class="text-warning waves-effect"
                                        title="Edit User">
                                        <i class="ti ti-edit fs-4"></i>
                                    </a>
                                    <form action="#" method="POST"
                                        id="delete-form-{{ $user->id }}" title="Delete User" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="btn p-0 border-0 bg-transparent text-danger waves-effect delete-btn"
                                            data-id="{{ $user->id }}">
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
        $(document).ready(function () {
            var dt_user_table = $('.datatables-users');

            if (dt_user_table.length) {
                var dt_user = dt_user_table.DataTable({
                    dom: '<"row"<"col-md-3"l><"col-md-9"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-nowrap flex-wrap"<"me-2"f>B>>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    buttons: [
                        {
                            text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New User</span>',
                            className: 'add-new btn btn-primary',
                            action: function (e, dt, node, config) {
                                window.location.href = '#';
                            }
                        }
                    ],
                    language: {
                        sLengthMenu: '_MENU_',
                        search: '',
                        searchPlaceholder: 'Search Users',
                        paginate: {
                            next: '<i class="ti ti-chevron-right ti-xs"></i>',
                            previous: '<i class="ti ti-chevron-left ti-xs"></i>'
                        }
                    },
                    responsive: true,
                    ordering: false
                });
            }

            // Handle delete confirmation
            $(document).on('click', '.delete-btn', function () {
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
            $(document).on('click', '.datatables-users tbody tr', function (e) {
                if ($(e.target).is('button') || $(e.target).is('i') || $(e.target).is('a') || $(e.target).hasClass('delete-btn')) {
                    return;
                }
                window.location.href = $(this).data('url');
            });
        });
    </script>
@endpush

