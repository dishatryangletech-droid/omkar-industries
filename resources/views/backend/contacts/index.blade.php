@extends('layouts.backend')

@section('title', 'Contact Inquiries')

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
                        <th class="fw-bold">#ID</th>
                        <th class="fw-bold">Name</th>
                        <th class="fw-bold">Email</th>
                        <th class="fw-bold">Subject</th>
                        <th class="fw-bold">Date</th>
                        <th class="fw-bold text-center">Status</th>
                        <th class="fw-bold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr class="cursor-pointer" data-url="#">
                            <td>{{ $contact->id }}</td>
                            <td>
                                <span class="fw-medium d-block">{{ $contact->name }}</span>
                            </td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->subject }}</td>
                            <td>{{ $contact->created_at->format('d M, Y H:i') }}</td>
                            <td class="text-center">
                                <span class="badge border border-{{ $contact->status === 'New' ? 'primary' : ($contact->status === 'Read' ? 'success' : 'info') }} text-{{ $contact->status === 'New' ? 'primary' : ($contact->status === 'Read' ? 'success' : 'info') }}">
                                    {{ $contact->status }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-3">
                                    <a href="#" 
                                       class="text-info waves-effect" title="View Inquiry">
                                        <i class="ti ti-eye fs-4"></i>
                                    </a>
                                    <form action="#" method="POST" id="delete-form-{{ $contact->id }}" title="Delete Inquiry">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn p-0 border-0 bg-transparent text-danger waves-effect delete-btn" data-id="{{ $contact->id }}">
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
            var dt_contact_table = $('.datatables-contacts');
            
            if (dt_contact_table.length) {
                var dt_contact = dt_contact_table.DataTable({
                    dom: '<"row"<"col-md-2"l><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-nowrap flex-wrap"<"me-2"f>B>>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    buttons: [],
                    language: {
                        sLengthMenu: '_MENU_',
                        search: '',
                        searchPlaceholder: 'Search Inquiry',
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
                                    '<select id="FilterStatus" class="form-select text-capitalize"><option value="">All Status</option></select>'
                                )
                                    .appendTo('.contact_status')
                                    .on('change', function () {
                                        var val = $(this).val();
                                        column.search(val).draw();
                                    });

                                select.append('<option value="New">New</option>');
                                select.append('<option value="Read">Read</option>');
                                select.append('<option value="Replied">Replied</option>');
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

            // Handle row click to show
            $(document).on('click', '.datatables-contacts tbody tr', function(e) {
                if ($(e.target).closest('td').index() === 6 || $(e.target).is('button') || $(e.target).is('i') || $(e.target).is('a') || $(e.target).hasClass('delete-btn')) {
                    return;
                }
                window.location.href = $(this).data('url');
            });
        });
    </script>
@endpush


