@extends('layouts.backend')

@section('title', 'Gallery')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <style>
        .clickable-row { cursor: pointer; }
    </style>
@endpush

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-gallery table table-hover align-middle">
                <thead class="border-bottom">
                    <tr>
                        <th class="fw-bold">#ID</th>
                        <th class="fw-bold">Tab Name</th>
                        <th class="fw-bold">Status</th>
                        <th class="fw-bold">Images</th>
                        <th class="fw-bold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($galleries as $gallery)
                        <tr class="clickable-row" data-url="#">
                            <td>{{ $gallery->id }}</td>
                            <td>
                                <a href="#" class="fw-medium">
                                    {{ $gallery->tab_name }}
                                </a>
                            </td>
                            <td>
                                @if($gallery->status === 'active')
                                    <span class="badge border border-success text-success">Active</span>
                                @else
                                    <span class="badge border border-danger text-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-label-info">{{ count($gallery->images ?? []) }} images</span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-3">
                                    <button type="button" 
                                       class="btn p-0 border-0 bg-transparent text-warning waves-effect edit-btn"
                                       data-id="{{ $gallery->id }}"
                                       data-name="{{ $gallery->tab_name }}"
                                       data-status="{{ $gallery->status }}"
                                       data-url="#"
                                       title="Edit Gallery Tab">
                                        <i class="ti ti-edit fs-4"></i>
                                    </button>
                                    <form action="#" method="POST" id="delete-form-{{ $gallery->id }}" title="Delete Gallery Tab">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn p-0 border-0 bg-transparent text-danger waves-effect delete-btn" data-id="{{ $gallery->id }}">
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

    <!-- Create Gallery Tab Modal -->
    <div class="modal fade" id="createGalleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Gallery Tab</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="create_tab_name">Tab Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="create_tab_name" name="tab_name" required placeholder="e.g. Ply Machinery">
                            </div>
                            <div class="col-12 mb-0">
                                <label class="form-label" for="create_status">Status</label>
                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="status" value="inactive">
                                    <input type="checkbox" class="form-check-input" value="active" id="create_status" name="status" checked>
                                    <label class="form-check-label" for="create_status">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Tab</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Gallery Tab Modal -->
    <div class="modal fade" id="editGalleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Gallery Tab</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editGalleryForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="edit_tab_name">Tab Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_tab_name" name="tab_name" required>
                            </div>
                            <div class="col-12 mb-0">
                                <label class="form-label" for="edit_status">Status</label>
                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="status" value="inactive">
                                    <input type="checkbox" class="form-check-input" value="active" id="edit_status" name="status">
                                    <label class="form-check-label" for="edit_status">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Tab</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="{{ asset('assets/backend/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script>
        $(document).ready(function() {
            var dt_gallery_table = $('.datatables-gallery');
            
            if (dt_gallery_table.length) {
                var dt_gallery = dt_gallery_table.DataTable({
                    dom: '<"row"<"col-md-2"l><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-nowrap flex-wrap"<"me-2"f>B>>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    buttons: [
                        {
                            text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New Tab</span>',
                            className: 'add-new btn btn-primary',
                            action: function (e, dt, node, config) {
                                $('#createGalleryModal').modal('show');
                            }
                        }
                    ],
                    language: {
                        sLengthMenu: '_MENU_',
                        search: '',
                        searchPlaceholder: 'Search Gallery',
                        paginate: {
                            next: '<i class="ti ti-chevron-right ti-xs"></i>',
                            previous: '<i class="ti ti-chevron-left ti-xs"></i>'
                        }
                    },
                    responsive: true,
                    ordering: false
                });
            }

            // Handle edit button
            $(document).on('click', '.edit-btn', function() {
                const name = $(this).data('name');
                const status = $(this).data('status');
                const url = $(this).data('url');

                $('#edit_tab_name').val(name);
                $('#edit_status').prop('checked', status === 'active');
                $('#editGalleryForm').attr('action', url);
                $('#editGalleryModal').modal('show');
            });

            // Handle delete confirmation
            $(document).on('click', '.delete-btn', function() {
                const id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Deleting this tab will remove all associated images!",
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

            // Handle row click to show images
            $(document).on('click', '.datatables-gallery tbody tr', function(e) {
                if ($(e.target).closest('td').index() === 4 || $(e.target).is('button') || $(e.target).is('i') || $(e.target).is('a') || $(e.target).hasClass('delete-btn')) {
                    return;
                }
                window.location.href = $(this).data('url');
            });

            // Show modal if there are validation errors
            @if ($errors->any())
                @if (old('_method') == 'PUT')
                    $('#editGalleryModal').modal('show');
                @else
                    $('#createGalleryModal').modal('show');
                @endif
            @endif
        });
    </script>
@endpush

