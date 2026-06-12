@extends('layouts.backend')

@section('title', 'Manage About Us')

@push('page-css')
    <style>
        fieldset.form-fieldset {
            border: 1px solid #dbdade;
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
            background: #fff;
            position: relative;
        }

        fieldset.form-fieldset legend {
            float: none;
            width: auto;
            padding: 0 10px;
            margin-left: 10px;
            font-size: 0.95rem;
            font-weight: 600;
            color: #7367f0;
            background: #fff;
            margin-bottom: 0;
        }

        .checkpoint-row-group {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f0f0f0;
        }
        .checkpoint-row-group:last-child {
            border-bottom: none;
        }

        .cke_notification_warning {
            display: none !important;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="about_us_id" value="{{ $aboutUs->id }}">
                <input type="hidden" name="home_page_id" value="{{ $homePageAbout->id }}">

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h4 class="mb-0">About Us Page Settings</h4>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <fieldset class="form-fieldset">
                            <legend>Main Content</legend>
                            <div class="row g-3">
                                <div class="col-md-6 mb-2">
                                    <label class="form-label" for="title">Main Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title', $aboutUs->title) }}" placeholder="Enter main title">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label" for="sub_title">Sub Title</label>
                                    <input type="text" class="form-control" id="sub_title" name="sub_title"
                                        value="{{ old('sub_title', $aboutUs->sub_title) }}" placeholder="Enter sub title">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label" for="btn_title">Button Title</label>
                                    <input type="text" class="form-control" id="btn_title" name="btn_title"
                                        value="{{ old('btn_title', $aboutUs->btn_title) }}" placeholder="Enter button title">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label" for="btn_link">Button Link</label>
                                    <input type="text" class="form-control" id="btn_link" name="btn_link"
                                        value="{{ old('btn_link', $aboutUs->btn_link) }}" placeholder="Enter button link">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label" for="photo">About Us Image</label>
                                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                                    @if($homePageAbout->photo)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $homePageAbout->photo) }}" alt="About Image" class="img-thumbnail" style="max-height: 100px;">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea class="form-control ckeditor" id="description" name="description" rows="5">{{ old('description', $aboutUs->description) }}</textarea>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="form-fieldset">
                            <legend>Checkpoints</legend>
                            <div id="groups-container">
                                @php
                                    $allCheckpoints = \App\Models\AboutUsPageCheckpoint::where('home_page_id', $homePageAbout->id)->get();
                                    $grouped = $allCheckpoints->groupBy('type');
                                    $groupIdx = 0;
                                @endphp

                                @forelse($grouped as $type => $items)
                                    <div class="row g-2 align-items-center checkpoint-row-group" id="group-{{ $groupIdx }}">
                                        <div class="col-md-2">
                                            <select name="groups[{{ $groupIdx }}][type]" class="form-select">
                                                <option value="checkpoint" {{ $type == 'checkpoint' ? 'selected' : '' }}>Checkpoint</option>
                                                <option value="mission" {{ $type == 'mission' ? 'selected' : '' }}>Our Mission</option>
                                                <option value="vision" {{ $type == 'vision' ? 'selected' : '' }}>Our Vision</option>
                                                <option value="goal" {{ $type == 'goal' ? 'selected' : '' }}>Our Goals</option>
                                            </select>
                                        </div>
                                        @foreach($items as $iIdx => $item)
                                            <div class="col-md-4">
                                                <input type="text" name="groups[{{ $groupIdx }}][titles][]" class="form-control" value="{{ $item->title }}" placeholder="Checkpoint Title">
                                            </div>
                                        @endforeach
                                        @for($i = count($items); $i < 2; $i++)
                                            <div class="col-md-4">
                                                <input type="text" name="groups[{{ $groupIdx }}][titles][]" class="form-control" placeholder="Checkpoint Title">
                                            </div>
                                        @endfor
                                        <div class="col-md-2 text-end">
                                            <button type="button" class="btn p-0 border-0 bg-transparent text-danger btn-sm" onclick="removeGroup({{ $groupIdx }})">
                                                <i class="ti ti-trash fs-4"></i>
                                            </button>
                                            @if($loop->last)
                                                <button type="button" class="btn btn-primary btn-icon btn-sm ms-1" onclick="addGroup()">
                                                    <i class="ti ti-plus"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                    @php $groupIdx++; @endphp
                                @empty
                                    <div class="row g-2 align-items-center checkpoint-row-group" id="group-0">
                                        <div class="col-md-2">
                                            <select name="groups[0][type]" class="form-select">
                                                <option value="mission">Our Mission</option>
                                                <option value="vision">Our Vision</option>
                                                <option value="goal">Our Goals</option>
                                                <option value="checkpoint">Checkpoint</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="groups[0][titles][]" class="form-control" placeholder="Checkpoint Title 1">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="groups[0][titles][]" class="form-control" placeholder="Checkpoint Title 2">
                                        </div>
                                        <div class="col-md-2 text-end">
                                            <button type="button" class="btn p-0 border-0 bg-transparent text-danger btn-sm" onclick="removeGroup(0)">
                                                <i class="ti ti-trash fs-4"></i>
                                            </button>
                                            <button type="button" class="btn btn-primary btn-icon btn-sm ms-1" onclick="addGroup()">
                                                <i class="ti ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @php $groupIdx = 1; @endphp
                                @endforelse
                            </div>
                        </fieldset>

                        <div class="col-12 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ti ti-device-floppy me-1"></i> Save Changes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            if ($('.ckeditor').length) {
                $('.ckeditor').each(function() {
                    CKEDITOR.replace($(this).attr('id'), {
                        height: 300,
                        removeButtons: 'PasteFromWord',
                        versionCheck: false
                    });
                });
            }
        });

        let groupIndex = {{ $groupIdx }};

        function addGroup() {
            // Remove the plus button from all existing rows
            $('.btn-primary.btn-icon.ms-1').remove();

            const idx = groupIndex++;
            const html = `
                <div class="row g-2 align-items-center checkpoint-row-group" id="group-${idx}">
                    <div class="col-md-2">
                        <select name="groups[${idx}][type]" class="form-select">
                            <option value="checkpoint">Checkpoint</option>
                            <option value="mission">Our Mission</option>
                            <option value="vision">Our Vision</option>
                            <option value="goal">Our Goals</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="groups[${idx}][titles][]" class="form-control" placeholder="Checkpoint Title 1">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="groups[${idx}][titles][]" class="form-control" placeholder="Checkpoint Title 2">
                    </div>
                    <div class="col-md-2 text-end">
                        <button type="button" class="btn p-0 border-0 bg-transparent text-danger btn-sm" onclick="removeGroup(${idx})">
                            <i class="ti ti-trash fs-4"></i>
                        </button>
                        <button type="button" class="btn btn-primary btn-icon btn-sm ms-1" onclick="addGroup()">
                            <i class="ti ti-plus"></i>
                        </button>
                    </div>
                </div>`;
            $('#groups-container').append(html);
        }

        function removeGroup(idx) {
            const isLast = $(`#group-${idx}`).is(':last-child');
            $(`#group-${idx}`).remove();
            
            // If we removed the last group and there are others left, add plus back to the new last group
            if (isLast && $('.checkpoint-row-group').length > 0) {
                const lastRow = $('.checkpoint-row-group').last();
                if (lastRow.find('.btn-primary.btn-icon').length === 0) {
                    lastRow.find('.text-end').append(`
                        <button type="button" class="btn btn-primary btn-icon btn-sm ms-1" onclick="addGroup()">
                            <i class="ti ti-plus"></i>
                        </button>
                    `);
                }
            } else if ($('.checkpoint-row-group').length === 0) {
                // If all gone, maybe add a default row or just the plus button
                addGroup();
            }
        }
    </script>
@endpush


