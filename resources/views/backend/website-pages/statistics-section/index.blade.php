@extends('layouts.backend')

@section('title', 'Statistics Management')

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
                        <div class="col-md-6">
                            <label class="form-label">Main Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $content->title) }}" placeholder="e.g. Statistics of our performance" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Subtitle / Description</label>
                            <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle', $content->subtitle) }}" placeholder="e.g. Manufacturing excellence is the foundation...">
                        </div>
                    </div>
                </fieldset>

                <!-- 3 Performance Boxes -->
                <fieldset class="form-fieldset shadow-sm">
                    <legend>Performance Metrics (3 Boxes)</legend>
                    <div class="row g-4">
                        @for($i = 1; $i <= 3; $i++)
                            <div class="col-lg-4">
                                <div class="admin-sub-section">
                                    <div class="admin-sub-section-title"><i class="ti ti-square-number-{{ $i }}"></i> Stat Box {{ $i }}</div>
                                    <div class="mb-3">
                                        <label class="form-label small">Stat Title</label>
                                        <input type="text" class="form-control form-control-sm" name="stat_title{{ $i }}" value="{{ $content->{'subtitle_text'.$i} }}" placeholder="e.g. Projects Completed">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small">Stat Count / Number</label>
                                        <input type="text" class="form-control form-control-sm" name="stat_count{{ $i }}" value="{{ $content->{'subtitle_count'.$i} }}" placeholder="e.g. 18,500+">
                                    </div>
                                    <div>
                                        <label class="form-label small">Description</label>
                                        <textarea class="form-control form-control-sm" name="stat_desc{{ $i }}" rows="3">{{ $content->{'subtitle_dsc'.$i} }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </fieldset>
            </div>
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-primary waves-effect px-5">
                    <i class="ti ti-device-floppy me-1"></i> Update Statistics
                </button>
            </div>
        </div>
    </form>
@endsection


