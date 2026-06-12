@extends('layouts.backend')

@section('title', 'Industry Section Management')

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
                        <div class="col-md-3">
                            <label class="form-label">Main Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $content->title) }}" placeholder="e.g. Industries we Serve" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Subtitle (Small top text)</label>
                            <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle', $content->subtitle) }}" placeholder="e.g. OUR SCOPE">
                        </div>
                       
                        <div class="col-md-3">
                            <label class="form-label">Button Title</label>
                            <input type="text" class="form-control" name="btn_title" value="{{ old('btn_title', $content->btn_title) }}" placeholder="e.g. Request Consultation">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Button Link</label>
                            <input type="text" class="form-control" name="btn_link" value="{{ old('btn_link', $content->btn_link) }}" placeholder="e.g. /contact">
                        </div>
                         <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3">{{ old('description', $content->description) }}</textarea>
                        </div>
                    </div>
                </fieldset>

                <!-- 5 Industry Selectors -->
                <fieldset class="form-fieldset shadow-sm">
                    <legend>Featured Industries (5 Slots)</legend>
                    <div class="row g-4">
                        @for($i = 1; $i <= 5; $i++)
                            <div class="col-md-4 col-lg-2.4" style="width: 20%;">
                                <div class="admin-sub-section">
                                    <div class="admin-sub-section-title"><i class="ti ti-building-factory-2"></i> Slot {{ $i }}</div>
                                    <div class="mb-3">
                                        <label class="form-label small">Select Industry</label>
                                        <select class="form-select form-select-sm select2" name="industry_id{{ $i }}">
                                            <option value="">-- Choose Industry --</option>
                                            @foreach($industries as $industry)
                                                <option value="{{ $industry->id }}" {{ $content->{'subtitle_text'.$i} == $industry->id ? 'selected' : '' }}>
                                                    {{ $industry->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                   
                                </div>
                            </div>
                        @endfor
                    </div>
                </fieldset>
            </div>
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-primary waves-effect px-5">
                    <i class="ti ti-device-floppy me-1"></i> Update Industry Section
                </button>
            </div>
        </div>
    </form>
@endsection

@push('page-js')
    <script>
        $(document).ready(function() {
            if ($('.select2').length) {
                $('.select2').each(function() {
                    var $this = $(this);
                    $this.wrap('<div class="position-relative"></div>').select2({
                        dropdownParent: $this.parent(),
                        placeholder: $this.data('placeholder')
                    });
                });
            }
        });
    </script>
@endpush


