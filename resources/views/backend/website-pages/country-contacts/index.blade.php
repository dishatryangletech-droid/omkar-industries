@extends('layouts.backend')

@section('title', 'Country Contacts')

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
            <table class="datatables-contacts table align-middle">
                <thead class="border-bottom">
                    <tr>
                        <th class="fw-bold">Country</th>
                        <th class="fw-bold">Address</th>
                        <th class="fw-bold">Contact Info</th>
                        <th class="fw-bold">Sort Order</th>
                        <th class="fw-bold">Status</th>
                        <th class="fw-bold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                        <tr class="cursor-pointer" data-url="{{ route('admin.website-pages.country-contacts.edit', $contact->id) }}">
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($contact->logo)
                                        <img src="{{ asset('storage/' . $contact->logo) }}" alt="{{ $contact->country_name }}" class="rounded me-3 border" style="width: 48px; height: 36px; object-fit: contain; background: #f8f9fa; padding: 2px;">
                                    @else
                                        <div class="bg-label-primary rounded me-3 d-flex align-items-center justify-content-center fw-bold" style="width: 48px; height: 36px;">
                                            <i class="ti ti-flag"></i>
                                        </div>
                                    @endif
                                    <span class="fw-bold text-dark">{{ $contact->country_name }}</span>
                                </div>
                            </td>
                            <td>
                                <div style="max-width: 250px;">
                                    {{ Str::limit($contact->address ?? 'N/A', 80) }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    @if($contact->phone)
                                        <div class="small"><i class="ti ti-phone text-primary me-1"></i>{{ $contact->phone }}</div>
                                    @endif
                                    @if($contact->email)
                                        <div class="small"><i class="ti ti-mail text-info me-1"></i>{{ $contact->email }}</div>
                                    @endif
                                    @if(!$contact->phone && !$contact->email)
                                        <span class="text-muted small">N/A</span>
                                    @endif
                                </div>
                            </td>
                            <td>{{ $contact->sort_order }}</td>
                            <td>
                                @if($contact->status === 'Active')
                                    <span class="badge bg-label-success">Active</span>
                                @else
                                    <span class="badge bg-label-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.website-pages.country-contacts.edit', $contact->id) }}" class="btn btn-sm btn-icon btn-label-primary" title="Edit">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-icon btn-label-danger delete-btn" data-id="{{ $contact->id }}" title="Delete">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </div>
                                <form id="delete-form-{{ $contact->id }}" action="{{ route('admin.website-pages.country-contacts.destroy', $contact->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                No country contacts found. Click "Add Country Contact" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="{{ asset('assets/backend/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script>
        $(document).ready(function() {
            var dt_table = $('.datatables-contacts');
            
            if (dt_table.length && $('tbody tr').length > 0 && !$('tbody tr td[colspan]').length) {
                var dt = dt_table.DataTable({
                    dom: '<"row"<"col-md-2"l><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-nowrap flex-wrap"<"me-2"f>B>>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    buttons: [
                        {
                            text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add Country Contact</span>',
                            className: 'add-new btn btn-primary',
                            action: function (e, dt, node, config) {
                                window.location.href = '{{ route('admin.website-pages.country-contacts.create') }}';
                            }
                        }
                    ],
                    language: {
                        sLengthMenu: '_MENU_',
                        search: '',
                        searchPlaceholder: 'Search Country',
                        paginate: {
                            next: '<i class="ti ti-chevron-right ti-xs"></i>',
                            previous: '<i class="ti ti-chevron-left ti-xs"></i>'
                        }
                    },
                    responsive: true,
                    ordering: false
                });
            } else {
                // If table is empty, still show add button on top
                $('.card').prepend(
                    '<div class="card-header d-flex justify-content-between align-items-center border-bottom">' +
                        '<h5 class="mb-0">Country Contacts</h5>' +
                        '<a href="{{ route('admin.website-pages.country-contacts.create') }}" class="btn btn-primary">' +
                            '<i class="ti ti-plus me-1"></i> Add Country Contact' +
                        '</a>' +
                    '</div>'
                );
            }

            $(document).on('click', '.delete-btn', function(e) {
                e.stopPropagation();
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
            $(document).on('click', '.datatables-contacts tbody tr', function(e) {
                if ($(e.target).closest('td').index() === 5 || $(e.target).is('button') || $(e.target).is('i') || $(e.target).is('a') || $(e.target).hasClass('delete-btn')) {
                    return;
                }
                var url = $(this).data('url');
                if (url) {
                    window.location.href = url;
                }
            });
        });
    </script>
@endpush
