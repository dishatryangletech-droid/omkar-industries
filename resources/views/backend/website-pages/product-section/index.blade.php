@extends('layouts.backend')

@section('title', 'Product Section Management')

@push('page-css')
    <style>
        fieldset.form-fieldset {
            border: 1px solid #dbdade;
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            background: #fff;
            position: relative;
        }

        fieldset.form-fieldset legend {
            float: none;
            width: auto;
            padding: 0 10px;
            margin-left: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #7367f0;
            background: #fff;
            margin-bottom: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .admin-sub-section {
            border: 1px solid #dbdade;
            padding: 15px;
            border-radius: 8px;
            height: 100%;
        }

        .admin-sub-section-title {
            font-size: 0.8rem;
            font-weight: 700;
            color: #7367f0;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 6px;
            text-transform: uppercase;
        }

        .sortable-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sortable-list li {
            background: #fff;
            border: 1px solid #dbdade;
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
            cursor: grab;
            transition: all 0.2s ease;
        }
        .sortable-list li:active {
            cursor: grabbing;
        }
        .drag-handle {
            color: #a1a0a2;
            cursor: grab;
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

    <form action="#" method="POST">
        @csrf

        <div class="row">
            <div class="col-12">
                <!-- Header Section -->
                <fieldset class="form-fieldset shadow-sm">
                    <legend>Header Section</legend>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Main Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $content->title) }}" placeholder="e.g. Premium Solutions Tailored to Your Needs" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Subtitle (Small top text)</label>
                            <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle', $content->subtitle) }}" placeholder="e.g. Our Products">
                        </div>
                    </div>
                </fieldset>

                <!-- 9 Product Selectors -->
                <fieldset class="form-fieldset shadow-sm">
                    <legend>Featured Products (9 Slots)</legend>
                    <div class="row g-4">
                        @for($i = 1; $i <= 9; $i++)
                            <div class="col-lg-4">
                                <div class="admin-sub-section">
                                    <div class="admin-sub-section-title"><i class="ti ti-package"></i> Slot {{ $i }}</div>
                                    <div class="mb-3">
                                        <label class="form-label small">Select Product</label>
                                        <select class="form-select form-select-sm select2" name="product_id{{ $i }}">
                                            <option value="">-- Choose Product --</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}" {{ $content->{'subtitle_text'.$i} == $product->id ? 'selected' : '' }}>
                                                    {{ $product->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="text-muted small">
                                        <i class="ti ti-info-circle"></i> This product will be shown in slot {{ $i }} on the home page.
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </fieldset>

                <!-- Reorder List Section -->
                <fieldset class="form-fieldset shadow-sm">
                    <legend>Reorder Selected Products (Drag & Drop)</legend>
                    <div class="mb-3">
                        <p class="text-muted small mb-0"><i class="ti ti-info-circle"></i> Drag and drop the selected products below to reorder their slots automatically.</p>
                    </div>
                    <ul id="selected-products-list" class="sortable-list" style="max-width: 600px;">
                        <!-- Will be populated dynamically by JS -->
                    </ul>
                    <div id="no-products-selected" class="text-muted small py-3 text-center border rounded bg-light" style="max-width: 600px; display: none;">
                        <i class="ti ti-info-circle me-1"></i> No products selected in the slots above.
                    </div>
                </fieldset>
            </div>
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-primary waves-effect px-5">
                    <i class="ti ti-device-floppy me-1"></i> Update Product Section
                </button>
            </div>
        </div>
    </form>
@endsection

@push('page-js')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log("Product Section JS loaded");

            // Initialize Select2
            try {
                if ($('.select2').length && $.fn.select2) {
                    $('.select2').each(function() {
                        var $this = $(this);
                        $this.wrap('<div class="position-relative"></div>').select2({
                            dropdownParent: $this.parent(),
                            placeholder: $this.data('placeholder')
                        });
                    });
                } else {
                    console.warn("Select2 not found or not initialized");
                }
            } catch (e) {
                console.error("Error initializing Select2:", e);
            }

            let isUpdating = false;

            function updateDragDropList() {
                if (isUpdating) return;
                isUpdating = true;

                console.log("Updating drag & drop list...");
                const list = $('#selected-products-list');
                list.empty();

                let count = 0;
                for (let i = 1; i <= 9; i++) {
                    const select = $(`select[name="product_id${i}"]`);
                    if (select.length === 0) {
                        console.warn(`Select product_id${i} not found`);
                        continue;
                    }
                    const val = select.val();
                    console.log(`Slot ${i} value:`, val);
                    if (val) {
                        const selectedOption = select.find('option:selected');
                        const text = selectedOption.text().trim();
                        list.append(`
                            <li class="d-flex align-items-center justify-content-between border p-2 mb-2 bg-white rounded cursor-grab" data-id="${val}" style="cursor: grab;">
                                <div class="d-flex align-items-center">
                                    <i class="ti ti-grip-vertical drag-handle me-2 text-muted" style="font-size: 1.25rem;"></i>
                                    <span class="fw-medium">${text}</span>
                                </div>
                                <span class="badge bg-label-primary">Slot ${++count}</span>
                            </li>
                        `);
                    }
                }

                if (count > 0) {
                    list.show();
                    $('#no-products-selected').hide();
                } else {
                    list.hide();
                    $('#no-products-selected').show();
                }

                isUpdating = false;
            }

            function updateSelectsFromList() {
                if (isUpdating) return;
                isUpdating = true;

                console.log("Updating select dropdowns from reordered list...");
                const orderedIds = [];
                $('#selected-products-list li').each(function() {
                    orderedIds.push($(this).data('id'));
                });

                for (let i = 1; i <= 9; i++) {
                    const select = $(`select[name="product_id${i}"]`);
                    const newVal = orderedIds[i - 1] || "";
                    if (select.val() != newVal) {
                        select.val(newVal);
                        if ($.fn.select2) {
                            select.trigger('change.select2');
                        } else {
                            select.trigger('change');
                        }
                    }
                }

                // Refresh the badges on the list to show new slot numbers
                $('#selected-products-list li').each(function(index) {
                    $(this).find('.badge').text('Slot ' + (index + 1));
                });

                isUpdating = false;
            }

            // Listen to select box changes to refresh the drag-drop list
            $('select[name^="product_id"]').on('change change.select2 select2:select select2:unselect', function() {
                updateDragDropList();
            });

            // Initialize SortableJS
            try {
                if (typeof Sortable !== 'undefined' && $('#selected-products-list').length) {
                    Sortable.create(document.getElementById('selected-products-list'), {
                        animation: 150,
                        handle: '.drag-handle',
                        ghostClass: 'bg-light',
                        onEnd: function() {
                            updateSelectsFromList();
                        }
                    });
                    console.log("SortableJS successfully initialized");
                } else {
                    console.warn("SortableJS is not defined or target list not found");
                }
            } catch (e) {
                console.error("Error initializing SortableJS:", e);
            }

            // Initial populate
            updateDragDropList();
        });
    </script>
@endpush


