@extends('layouts.backend')

@section('title', 'Header Settings')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/libs/select2/select2.css') }}" />
    <style>
        .sortable-list {
            list-style: none;
            padding: 0;
            margin: 0;
            margin-top: 15px;
        }
        .sortable-list li {
            background: #fff;
            border: 1px solid #e1e0e2;
            padding: 10px 15px;
            margin-bottom: 8px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
            cursor: grab;
        }
        .sortable-list li:active {
            cursor: grabbing;
        }
        .drag-handle {
            color: #a1a0a2;
            margin-right: 10px;
            cursor: grab;
        }
        .remove-item {
            color: #ba0001;
            cursor: pointer;
            border: none;
            background: none;
            padding: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
        }
        .remove-item:hover {
            background: #ffe5e5;
        }
    </style>
@endpush

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Global Header & Navigation Settings</h5>
                    <form action="{{ route('admin.website-pages.header-settings.post') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Header Dropdown Products Section -->
                            <div class="col-12 mb-5">
                                <h6 class="text-primary border-bottom pb-2 mb-3"><i class="ti ti-box me-2"></i>Products in Header Dropdown Menu</h6>
                                <p class="text-muted small mb-3">Select a product to add to the Header Dropdown. Drag items to reorder them.</p>
                                
                                <select id="all-select" class="select2 form-select">
                                    <option value="">-- Add a Product --</option>
                                    @foreach($products as $product)
                                        @if( ($product->parent_id === null || $product->parent_id == 0) && $product->slug !== 'other-product-page' )
                                            <option value="{{ $product->id }}" data-title="{{ $product->title }}">
                                                {{ $product->title }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>

                                @php $selectedAll = $selectedAll ?? []; @endphp
                                <ul id="all-list" class="sortable-list" data-name="all_machines">
                                    @foreach($selectedAll as $id)
                                        @php $p = $products->firstWhere('id', $id); @endphp
                                        @if($p)
                                            <li data-id="{{ $p->id }}">
                                                <div>
                                                    <i class="ti ti-grip-vertical drag-handle"></i>
                                                    <span class="item-title">{{ $p->title }}</span>
                                                    <input type="hidden" name="all_machines[]" value="{{ $p->id }}">
                                                </div>
                                                <button type="button" class="remove-item"><i class="ti ti-x"></i></button>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary px-5">
                                <i class="ti ti-device-floppy me-1"></i> Save Header Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="{{ asset('assets/backend/vendor/libs/select2/select2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        $(document).ready(function() {
            
            $('.select2').select2({
                width: '100%'
            });

            // Initialize Sortable lists
            $('.sortable-list').each(function() {
                Sortable.create(this, {
                    animation: 150,
                    handle: '.drag-handle',
                    ghostClass: 'bg-light'
                });
            });

            function getListValues(listId) {
                var vals = [];
                $('#' + listId + ' li').each(function() {
                    vals.push($(this).data('id').toString());
                });
                return vals;
            }

            function updateSelectOptions() {
                var allVals = getListValues('all-list');

                // Update All Select
                $('#all-select option').each(function() {
                    if ($(this).val() === "") return;
                    if (allVals.includes($(this).val())) {
                        $(this).prop('disabled', true);
                    } else {
                        $(this).prop('disabled', false);
                    }
                });

                $('.select2').select2({ width: '100%' }); // Refresh
            }

            // Initial call
            updateSelectOptions();

            function createListItem(id, title, inputName) {
                return `
                    <li data-id="${id}">
                        <div>
                            <i class="ti ti-grip-vertical drag-handle"></i>
                            <span class="item-title">${title}</span>
                            <input type="hidden" name="${inputName}[]" value="${id}">
                        </div>
                        <button type="button" class="remove-item"><i class="ti ti-x"></i></button>
                    </li>
                `;
            }

            // Handle Add Product to All
            $('#all-select').on('change', function() {
                var id = $(this).val();
                if (!id) return;
                var title = $(this).find('option:selected').data('title');
                
                $('#all-list').append(createListItem(id, title, 'all_machines'));
                $(this).val('').trigger('change.select2');
                updateSelectOptions();
            });

            // Handle Remove
            $(document).on('click', '.remove-item', function() {
                $(this).closest('li').remove();
                updateSelectOptions();
            });

        });
    </script>
@endpush


