@extends('layouts.backend')

@section('title', 'About Us Management')

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

        .checkpoint-input-group {
            margin-bottom: 8px;
        }

        .approach-box {
            background: #fff;
            border-radius: 12px;
            padding: 1.25rem;
            border: 1px solid #dbdade;
            height: 100%;
        }

        .approach-box h6 {
            color: #7367f0;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 1rem;
        }

        .img-preview { height: 100px; width: 100px; border-radius: 8px; border: 1px solid #eee; margin-top: 10px;}
        .cke_notification_warning { display: none !important; }
        
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
    </style>
@endpush

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf



        <div class="row">
            <div class="col-12">
                <!-- Main Section (Stored in home_pages) -->
                <fieldset class="form-fieldset shadow-sm">
                    <legend>Main Section</legend>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $mainSection->title) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sub Title</label>
                            <input type="text" class="form-control" name="sub_title" value="{{ old('sub_title', $mainSection->subtitle) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Main Description</label>
                            <textarea class="form-control ckeditor" id="description" name="description" rows="4">{{ old('description', $mainSection->description) }}</textarea>
                        </div>
                        
                        <!-- Extra Link -->
                        <div class="col-md-4">
                            <div class="admin-sub-section">
                                <div class="admin-sub-section-title"><i class="ti ti-link"></i> Extra Link</div>
                                <label class="form-label small">Become Part of Team Link</label>
                                <input type="text" class="form-control mb-2" name="btn_link2" value="{{ old('btn_link2', $mainSection->btn_link2 ?? route('our-team')) }}">
                            </div>
                        </div>

                        <!-- Button Controls -->
                        <div class="col-md-4">
                            <div class="admin-sub-section">
                                <div class="admin-sub-section-title"><i class="ti ti-link"></i> Action Button</div>
                                <label class="form-label small">Button Text</label>
                                <input type="text" class="form-control mb-2" name="btn_title" value="{{ old('btn_title', $mainSection->btn_title) }}">
                                <label class="form-label small">Button Link</label>
                                <input type="text" class="form-control" name="btn_link" value="{{ old('btn_link', $mainSection->btn_link) }}">
                            </div>
                        </div>

                        <!-- Main Image -->
                        <div class="col-md-4">
                            <div class="admin-sub-section text-center">
                                <div class="admin-sub-section-title text-start"><i class="ti ti-photo"></i> Featured Image</div>
                                <input type="file" name="photo" class="form-control form-control-sm mb-2" accept="image/*" onchange="previewMainImage(this)">
                                        <small class="text-primary d-block fw-medium mt-1" style="font-size: 0.75rem;"><i class="ti ti-info-circle me-1"></i>Allowed: JPG, JPEG, PNG, WEBP. Recommended size: 1024x1024px.</small>
                                @if($mainSection->photo)
                                    <img id="image_preview" src="{{ asset('storage/' . $mainSection->photo) }}" class="img-preview">
                                @else
                                    <img id="image_preview" src="" class="img-preview" style="display: none;">
                                @endif
                            </div>
                        </div>

                        <!-- Features & Services -->
                        <div class="col-12 mt-4">
                            <h6 class="text-primary mb-3">Homepage Dynamic Elements</h6>
                            <div class="row g-3">
                                <!-- 4 Checkmarks -->
                                <div class="col-md-4">
                                    <div class="admin-sub-section h-100">
                                        <div class="admin-sub-section-title"><i class="ti ti-list-check"></i> 4 Checkmarks (Features)</div>
                                        @for($i = 1; $i <= 4; $i++)
                                        <div class="mb-2">
                                            <label class="form-label small">Feature {{ $i }}</label>
                                            <input type="text" class="form-control form-control-sm" name="subtitle_text{{ $i }}" value="{{ old('subtitle_text'.$i, $mainSection->{'subtitle_text'.$i}) }}">
                                        </div>
                                        @endfor
                                    </div>
                                </div>

                                <!-- 4 Service Boxes -->
                                <div class="col-md-4">
                                    <div class="admin-sub-section h-100">
                                        <div class="admin-sub-section-title"><i class="ti ti-layout-grid"></i> 4 Service Boxes</div>
                                        @for($i = 5; $i <= 8; $i++)
                                        <div class="mb-2">
                                            <label class="form-label small">Service Box {{ $i-4 }}</label>
                                            <input type="text" class="form-control form-control-sm" name="subtitle_text{{ $i }}" value="{{ old('subtitle_text'.$i, $mainSection->{'subtitle_text'.$i}) }}">
                                        </div>
                                        @endfor
                                    </div>
                                </div>

                                <!-- 3 Statistics -->
                                <div class="col-md-4">
                                    <div class="admin-sub-section h-100">
                                        <div class="admin-sub-section-title"><i class="ti ti-chart-bar"></i> 3 Statistics (Bottom)</div>
                                        @for($i = 1; $i <= 3; $i++)
                                        <div class="mb-3 border-bottom pb-2">
                                            <label class="form-label small fw-bold">Stat {{ $i }} Value (e.g. 29+, 85Lakhs)</label>
                                            <input type="text" class="form-control form-control-sm mb-1" name="subtitle_count{{ $i }}" value="{{ old('subtitle_count'.$i, $mainSection->{'subtitle_count'.$i}) }}">
                                            <label class="form-label small">Description</label>
                                            <input type="text" class="form-control form-control-sm" name="subtitle_dsc{{ $i }}" value="{{ old('subtitle_dsc'.$i, $mainSection->{'subtitle_dsc'.$i}) }}">
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Our Approach Section (3 Boxes) -->
                <fieldset class="form-fieldset shadow-sm">
                    <legend>Our Approach (3 Boxes)</legend>
                    <div class="row g-4">
                        <!-- Mission Box -->
                        <div class="col-lg-4">
                            <div class="approach-box shadow-sm">
                                <h6><i class="ti ti-target"></i> Our Mission</h6>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Title</label>
                                    <input type="text" class="form-control form-control-sm" name="mission_title" value="{{ old('mission_title', $mission->sub_content_title) }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Description</label>
                                    <textarea class="form-control form-control-sm" name="mission_description" rows="3">{{ old('mission_description', $mission->sub_content_description) }}</textarea>
                                </div>
                                <div class="checkpoints-list" id="mission-checkpoints">
                                    <label class="form-label small fw-bold d-block mb-2">Checkpoints</label>
                                    @php $missionCheckpoints = \App\Models\AboutUsPageCheckpoint::where('home_page_id', $mainSection->id)->where('type', 'mission')->get(); @endphp
                                    @forelse($missionCheckpoints as $cp)
                                        <div class="input-group input-group-sm checkpoint-input-group">
                                            <input type="text" name="mission_checkpoints[]" class="form-control" value="{{ $cp->title }}">
                                            <button type="button" class="btn btn-outline-danger remove-checkpoint"><i class="ti ti-minus"></i></button>
                                        </div>
                                    @empty
                                        <div class="input-group input-group-sm checkpoint-input-group">
                                            <input type="text" name="mission_checkpoints[]" class="form-control" placeholder="Add checkpoint...">
                                            <button type="button" class="btn btn-outline-danger remove-checkpoint"><i class="ti ti-minus"></i></button>
                                        </div>
                                    @endforelse
                                </div>
                                <button type="button" class="btn btn-xs btn-label-primary mt-2 w-100 add-checkpoint" data-target="#mission-checkpoints" data-name="mission_checkpoints[]">
                                    <i class="ti ti-plus me-1"></i> Add Checkpoint
                                </button>
                            </div>
                        </div>

                        <!-- Vision Box -->
                        <div class="col-lg-4">
                            <div class="approach-box shadow-sm">
                                <h6><i class="ti ti-eye"></i> Our Vision</h6>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Title</label>
                                    <input type="text" class="form-control form-control-sm" name="vision_title" value="{{ old('vision_title', $vision->sub_content_title) }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Description</label>
                                    <textarea class="form-control form-control-sm" name="vision_description" rows="3">{{ old('vision_description', $vision->sub_content_description) }}</textarea>
                                </div>
                                <div class="checkpoints-list" id="vision-checkpoints">
                                    <label class="form-label small fw-bold d-block mb-2">Checkpoints</label>
                                    @php $visionCheckpoints = \App\Models\AboutUsPageCheckpoint::where('home_page_id', $mainSection->id)->where('type', 'vision')->get(); @endphp
                                    @forelse($visionCheckpoints as $cp)
                                        <div class="input-group input-group-sm checkpoint-input-group">
                                            <input type="text" name="vision_checkpoints[]" class="form-control" value="{{ $cp->title }}">
                                            <button type="button" class="btn btn-outline-danger remove-checkpoint"><i class="ti ti-minus"></i></button>
                                        </div>
                                    @empty
                                        <div class="input-group input-group-sm checkpoint-input-group">
                                            <input type="text" name="vision_checkpoints[]" class="form-control" placeholder="Add checkpoint...">
                                            <button type="button" class="btn btn-outline-danger remove-checkpoint"><i class="ti ti-minus"></i></button>
                                        </div>
                                    @endforelse
                                </div>
                                <button type="button" class="btn btn-xs btn-label-primary mt-2 w-100 add-checkpoint" data-target="#vision-checkpoints" data-name="vision_checkpoints[]">
                                    <i class="ti ti-plus me-1"></i> Add Checkpoint
                                </button>
                            </div>
                        </div>

                        <!-- Goal Box -->
                        <div class="col-lg-4">
                            <div class="approach-box shadow-sm">
                                <h6><i class="ti ti-award"></i> Our Goals</h6>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Title</label>
                                    <input type="text" class="form-control form-control-sm" name="goal_title" value="{{ old('goal_title', $goal->sub_content_title) }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Description</label>
                                    <textarea class="form-control form-control-sm" name="goal_description" rows="3">{{ old('goal_description', $goal->sub_content_description) }}</textarea>
                                </div>
                                <div class="checkpoints-list" id="goal-checkpoints">
                                    <label class="form-label small fw-bold d-block mb-2">Checkpoints</label>
                                    @php $goalCheckpoints = \App\Models\AboutUsPageCheckpoint::where('home_page_id', $mainSection->id)->where('type', 'goal')->get(); @endphp
                                    @forelse($goalCheckpoints as $cp)
                                        <div class="input-group input-group-sm checkpoint-input-group">
                                            <input type="text" name="goal_checkpoints[]" class="form-control" value="{{ $cp->title }}">
                                            <button type="button" class="btn btn-outline-danger remove-checkpoint"><i class="ti ti-minus"></i></button>
                                        </div>
                                    @empty
                                        <div class="input-group input-group-sm checkpoint-input-group">
                                            <input type="text" name="goal_checkpoints[]" class="form-control" placeholder="Add checkpoint...">
                                            <button type="button" class="btn btn-outline-danger remove-checkpoint"><i class="ti ti-minus"></i></button>
                                        </div>
                                    @endforelse
                                </div>
                                <button type="button" class="btn btn-xs btn-label-primary mt-2 w-100 add-checkpoint" data-target="#goal-checkpoints" data-name="goal_checkpoints[]">
                                    <i class="ti ti-plus me-1"></i> Add Checkpoint
                                </button>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Business Specifications -->
                <fieldset class="form-fieldset shadow-sm mt-4">
                    <legend>Business Specifications (Frontend Labels)</legend>
                    <div class="row g-3">
                        @php
                            $defaultSpecs = [
                                'Business Type' => 'Manufacturer, Supplier, Trader and Exporter',
                                'No. of Employees' => '05',
                                'Year of Establishment' => '1977',
                                'Annual Turnover' => 'INR 85 Lakhs',
                                'Banker' => 'Canara Bank',
                                'OEM Facility' => 'Yes',
                                'Capital in Dollars' => 'INR 85 Lakhs',
                                'Export Percentage' => '10%',
                                'No. of Engineers' => '02',
                                'No. of Production Lines' => '01',
                            ];
                            $businessSpecs = $mainSection->business_specs ?? $defaultSpecs;
                        @endphp
                        @foreach($defaultSpecs as $key => $defaultVal)
                        <div class="col-md-3 mb-2">
                            <label class="form-label small fw-bold">{{ $key }}</label>
                            <input type="text" class="form-control form-control-sm" name="business_specs[{{ $key }}]" value="{{ $businessSpecs[$key] ?? '' }}">
                        </div>
                        @endforeach
                    </div>
                </fieldset>

            </div>
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary waves-effect px-5">
                            <i class="ti ti-device-floppy me-1"></i> Update Content
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('page-js')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            if ($('.ckeditor').length) {
                $('.ckeditor').each(function() {
                    CKEDITOR.replace($(this).attr('id'), {
                        height: 200,
                        removeButtons: 'PasteFromWord',
                        versionCheck: false
                    });
                });
            }

            // Dynamic Checkpoints
            $('.add-checkpoint').click(function() {
                const target = $($(this).data('target'));
                const name = $(this).data('name');
                const html = `
                    <div class="input-group input-group-sm checkpoint-input-group">
                        <input type="text" name="${name}" class="form-control" placeholder="Add checkpoint...">
                        <button type="button" class="btn btn-outline-danger remove-checkpoint"><i class="ti ti-minus"></i></button>
                    </div>
                `;
                target.append(html);
            });

            $(document).on('click', '.remove-checkpoint', function() {
                const parent = $(this).closest('.checkpoints-list');
                if (parent.find('.checkpoint-input-group').length > 1) {
                    $(this).closest('.checkpoint-input-group').remove();
                } else {
                    $(this).closest('.checkpoint-input-group').find('input').val('');
                }
            });
        });

        function previewMainImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush


