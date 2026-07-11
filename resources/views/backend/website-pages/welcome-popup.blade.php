@extends('layouts.backend')

@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Welcome Popup Settings</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Website Pages</a></li>
            <li class="breadcrumb-item active">Welcome Popup</li>
        </ol>
    </div>

    <div class="card mb-4">
        <h6 class="card-header">Popup Details</h6>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ route('admin.website-pages.welcome-popup.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Popup Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $popup->title) }}" placeholder="e.g., Welcome to Omkar Industries!">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Popup Subtitle</label>
                            <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle', $popup->subtitle) }}" placeholder="e.g., Discover our premium woodworking machinery.">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Content / Description</label>
                            <textarea class="form-control" name="content" rows="4">{{ old('content', $popup->content) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Button Text</label>
                            <input type="text" class="form-control" name="button_text" value="{{ old('button_text', $popup->button_text) }}" placeholder="e.g., Explore Products">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Button Link</label>
                            <input type="text" class="form-control" name="button_link" value="{{ old('button_link', $popup->button_link) }}" placeholder="e.g., /products">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Popup Image (Left Side)</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                            @if($popup->image)
                                <div class="mt-3">
                                    <img src="{{ asset('storage/' . $popup->image) }}" alt="Popup Image" style="max-height: 150px; border-radius: 8px;">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group pt-4 mt-2">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="is_active" value="1" {{ $popup->is_active ? 'checked' : '' }}>
                                <span class="custom-control-label">Enable Welcome Popup</span>
                            </label>
                            <small class="form-text text-muted">Check this box to display the popup to first-time visitors on the homepage.</small>
                        </div>
                    </div>
                </div>
                
                <hr class="my-4">
                <button type="submit" class="btn btn-primary">Save Settings</button>
            </form>
        </div>
    </div>
</div>
@endsection
