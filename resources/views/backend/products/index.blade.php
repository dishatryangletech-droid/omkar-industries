@extends('layouts.backend')

@section('title', 'Products')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <style>
        .cursor-pointer {
            cursor: pointer;
        }

        .card-datatable {
            padding: 20px;
        }

        .dataTables_filter input {
            margin-right: 13px !important;
            height: 38px !important;
        }

        .dataTables_filter label {
            margin-bottom: 0;
        }

        .blink {
            animation: blinker 1.5s linear infinite;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }

        .fs-tiny {
            font-size: 0.5rem !important;
            vertical-align: middle;
        }
    </style>
@endpush

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible mb-2" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="mb-4 mt-4 d-flex justify-content-between align-items-center">
        <div class="btn-group" role="group">
            <a href="#"
                class="btn btn-{{ $type === 'original' ? 'label-primary' : 'label-secondary' }} waves-effect px-4">
                <i class="ti ti-package me-2"></i> Original Products
                <span
                    class="badge rounded-pill bg-{{ $type === 'original' ? 'primary' : 'secondary' }} ms-2">{{ $totalOriginal }}</span>
            </a>
            <a href="#"
                class="btn btn-{{ $type === 'copy' ? 'label-primary' : 'label-secondary' }} waves-effect px-4">
                <i class="ti ti-copy me-2"></i> Copy Products
                <span
                    class="badge rounded-pill bg-{{ $type === 'copy' ? 'primary' : 'secondary' }} ms-2">{{ $totalCopies }}</span>
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-products table align-middle">
                <thead class="border-bottom text-uppercase">
                    <tr>
                        <th class="fw-bold">#ID</th>
                        <th class="fw-bold">Image</th>
                        <th class="fw-bold">Product Title</th>
                        <th class="fw-bold">Sub Title</th>
                        <th class="fw-bold">Type / Parent</th>
                        <th class="fw-bold text-center">Status</th>
                        <th class="fw-bold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr class="cursor-pointer" data-url="#">
                            <td>{{ $product->id }}</td>
                            <td>
                                @php
                                    $displayImage = $product->image;
                                    if (!$displayImage && $product->design_type === 'design2' && $product->sections->isNotEmpty()) {
                                        $displayImage = $product->sections->first()->image;
                                    }
                                @endphp
                                @if($displayImage)
                                    <div class="avatar avatar-md">
                                        <img src="{{ asset('storage/' . $displayImage) }}" alt="Product" class="rounded border">
                                    </div>
                                @else
                                    <span class="badge bg-label-secondary">N/A</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $displayTitle = $product->title;
                                    if (!$displayTitle && $product->design_type === 'design2' && $product->sections->isNotEmpty()) {
                                        $displayTitle = $product->sections->first()->title;
                                    }
                                @endphp
                                <span class="fw-medium">{{ $displayTitle ?: '—' }}</span>
                            </td>
                            <td>
                                @php
                                    $displaySubTitle = $product->sub_title;
                                    if (!$displaySubTitle && $product->design_type === 'design2' && $product->sections->isNotEmpty()) {
                                        $displaySubTitle = $product->sections->first()->sub_title;
                                    }
                                @endphp
                                <span class="text-muted">{{ $displaySubTitle ?: '—' }}</span>
                            </td>
                            <td>
                                @if($product->is_parent)
                                    <span class="badge bg-label-primary">Parent Product</span>
                                @elseif($product->parent)
                                    <span class="badge bg-label-info">Child: {{ Str::limit($product->parent->title, 20) }}</span>
                                @else
                                    <span class="badge bg-label-secondary">Standalone</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($product->status === 'Active')
                                    <span class="badge border border-success text-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge border border-danger text-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-3">
                                    <form action="#" method="POST"
                                        title="Copy Product">
                                        @csrf
                                        <button type="submit" class="btn p-0 border-0 bg-transparent text-success waves-effect">
                                            <i class="ti ti-copy fs-4"></i>
                                        </button>
                                    </form>
                                    <a href="#" class="text-warning waves-effect"
                                        title="Edit Product">
                                        <i class="ti ti-edit fs-4"></i>
                                    </a>
                                    <form action="#" method="POST"
                                        id="delete-form-{{ $product->id }}" title="Delete Product">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="btn p-0 border-0 bg-transparent text-danger waves-effect delete-btn"
                                            data-id="{{ $product->id }}">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            var dt_product_table = $('.datatables-products');

            if (dt_product_table.length) {
                var dt_product = dt_product_table.DataTable({
                    dom: '<"row"<"col-md-2"l><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-nowrap flex-wrap"<"me-2"f>B>>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    buttons: [
                        {
                            text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New Product</span>',
                            className: 'add-new btn btn-primary',
                            action: function (e, dt, node, config) {
                                window.location.href = '#';
                            }
                        }
                    ],
                    language: {
                        sLengthMenu: '_MENU_',
                        search: '',
                        searchPlaceholder: 'Search Product',
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
                            .columns(5)
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
            $(document).on('click', '.delete-btn', function (e) {
                e.stopPropagation(); // Prevent row click
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
            $(document).on('click', '.datatables-products tbody tr', function (e) {
                // Don't redirect if clicking on actions or buttons
                if ($(e.target).closest('td').index() === 6 || $(e.target).is('button') || $(e.target).is('i') || $(e.target).is('a') || $(e.target).hasClass('delete-btn')) {
                    return;
                }
                window.location.href = $(this).data('url');
            });
        });
    </script>
@endpush

