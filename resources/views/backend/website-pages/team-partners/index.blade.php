@extends('layouts.backend')

@section('title', $type === 'Member' ? 'Team Members' : 'Trusted Partners')

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
            <table class="datatables-items table align-middle">
                <thead class="border-bottom">
                    <tr>
                        <th class="fw-bold">Name</th>
                        <th class="fw-bold">{{ $type === 'Member' ? 'Designation' : 'Status Text' }}</th>
                        @if($type === 'Member')
                            <th class="fw-bold">Social Links</th>
                        @else
                            <th class="fw-bold">Website</th>
                        @endif
                        <th class="fw-bold">Status</th>
                        <th class="fw-bold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr class="cursor-pointer" data-url="{{ route('admin.website-pages.team-partners.edit', $item->id) }}">
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="Image" class="rounded-circle me-3" style="width: 45px; height: 45px; object-fit: cover;">
                                    @else
                                        <div class="bg-label-primary rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                            {{ strtoupper(substr($item->name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <span class="fw-medium">{{ $item->name }}</span>
                                </div>
                            </td>
                            <td>{{ $item->designation_or_status ?? 'N/A' }}</td>
                            <td>
                                @if($type === 'Member')
                                    <div class="d-flex gap-2">
                                        @if($item->facebook_link) <a href="{{ $item->facebook_link }}" target="_blank" class="text-primary"><i class="ti ti-brand-facebook"></i></a> @endif
                                        @if($item->linkedin_link) <a href="{{ $item->linkedin_link }}" target="_blank" class="text-info"><i class="ti ti-brand-linkedin"></i></a> @endif
                                        @if($item->instagram_link) <a href="{{ $item->instagram_link }}" target="_blank" class="text-danger"><i class="ti ti-brand-instagram"></i></a> @endif
                                        @if(!$item->facebook_link && !$item->linkedin_link && !$item->instagram_link) <span class="text-muted">None</span> @endif
                                    </div>
                                @else
                                    @if($item->link)
                                        <a href="{{ $item->link }}" target="_blank" class="text-primary text-truncate d-inline-block" style="max-width: 150px;">
                                            <i class="ti ti-link me-1"></i> Visit
                                        </a>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                @endif
                            </td>
                            <td>
                                <span class="badge border border-{{ $item->status === 'Active' ? 'success' : 'danger' }} text-{{ $item->status === 'Active' ? 'success' : 'danger' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-3">
                                    <a href="{{ route('admin.website-pages.team-partners.edit', $item->id) }}" 
                                       class="text-warning waves-effect" title="Edit Item">
                                        <i class="ti ti-edit fs-4"></i>
                                    </a>
                                    <form action="{{ route('admin.website-pages.team-partners.destroy', $item->id) }}" method="POST" id="delete-form-{{ $item->id }}" title="Delete Item">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn p-0 border-0 bg-transparent text-danger waves-effect delete-btn" data-id="{{ $item->id }}">
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
            var dt_table = $('.datatables-items');
            
            if (dt_table.length) {
                var dt = dt_table.DataTable({
                    dom: '<"row"<"col-md-2"l><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-nowrap flex-wrap"<"me-2"f>B>>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    buttons: [
                        {
                            text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add {{ $type }}</span>',
                            className: 'add-new btn btn-primary',
                            action: function (e, dt, node, config) {
                                window.location.href = '{{ route('admin.website-pages.team-partners.create', ['type' => $type]) }}';
                            }
                        }
                    ],
                    language: {
                        sLengthMenu: '_MENU_',
                        search: '',
                        searchPlaceholder: 'Search {{ $type }}',
                        paginate: {
                            next: '<i class="ti ti-chevron-right ti-xs"></i>',
                            previous: '<i class="ti ti-chevron-left ti-xs"></i>'
                        }
                    },
                    responsive: true,
                    ordering: false
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
            $(document).on('click', '.datatables-items tbody tr', function(e) {
                if ($(e.target).closest('td').index() === 4 || $(e.target).is('button') || $(e.target).is('i') || $(e.target).is('a') || $(e.target).hasClass('delete-btn')) {
                    return;
                }
                window.location.href = $(this).data('url');
            });
        });
    </script>
@endpush



