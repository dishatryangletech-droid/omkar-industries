@extends('layouts.backend')

@section('title', 'Exhibitions')

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
            <table class="datatables-exhibitions table align-middle">
                <thead class="border-bottom">
                    <tr>
                        <th class="fw-bold">Exhibition</th>
                        <th class="fw-bold">Scheduled Period</th>
                        <th class="fw-bold">Venue</th>
                        <th class="fw-bold">Status</th>
                        <th class="fw-bold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exhibitions as $exhibition)
                        <tr class="cursor-pointer" data-url="{{ route('admin.website-pages.exhibitions.edit', $exhibition->id) }}">
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($exhibition->image)
                                        <img src="{{ asset('storage/' . $exhibition->image) }}" alt="Exhibition" class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-label-primary rounded me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="ti ti-camera ti-sm"></i>
                                        </div>
                                    @endif
                                    <span class="fw-medium">{{ $exhibition->title }}</span>
                                </div>
                            </td>
                            <td>{{ $exhibition->scheduled_period ?? 'N/A' }}</td>
                            <td>{{ $exhibition->venue ?? 'N/A' }}</td>
                            <td>
                                <span class="badge border border-{{ $exhibition->status === 'Active' ? 'success' : 'danger' }} text-{{ $exhibition->status === 'Active' ? 'success' : 'danger' }}">
                                    {{ $exhibition->status }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-3">
                                    <a href="{{ route('admin.website-pages.exhibitions.edit', $exhibition->id) }}" 
                                       class="text-warning waves-effect" title="Edit Exhibition">
                                        <i class="ti ti-edit fs-4"></i>
                                    </a>
                                    <form action="{{ route('admin.website-pages.exhibitions.destroy', $exhibition->id) }}" method="POST" id="delete-form-{{ $exhibition->id }}" title="Delete Exhibition">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn p-0 border-0 bg-transparent text-danger waves-effect delete-btn" data-id="{{ $exhibition->id }}">
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
            var dt_exhibition_table = $('.datatables-exhibitions');
            
            if (dt_exhibition_table.length) {
                var dt_exhibition = dt_exhibition_table.DataTable({
                    dom: '<"row"<"col-md-2"l><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-nowrap flex-wrap"<"me-2"f>B>>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    buttons: [
                        {
                            text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add Exhibition</span>',
                            className: 'add-new btn btn-primary',
                            action: function (e, dt, node, config) {
                                window.location.href = '{{ route('admin.website-pages.exhibitions.create') }}';
                            }
                        }
                    ],
                    language: {
                        sLengthMenu: '_MENU_',
                        search: '',
                        searchPlaceholder: 'Search Exhibition',
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
            $(document).on('click', '.datatables-exhibitions tbody tr', function(e) {
                if ($(e.target).closest('td').index() === 4 || $(e.target).is('button') || $(e.target).is('i') || $(e.target).is('a') || $(e.target).hasClass('delete-btn')) {
                    return;
                }
                window.location.href = $(this).data('url');
            });
        });
    </script>
@endpush



