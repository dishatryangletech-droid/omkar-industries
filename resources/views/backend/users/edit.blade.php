@extends('layouts.backend')

@section('title', 'Edit User')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit User: {{ $user->name }}</h5>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name', $user->name) }}" required />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email', $user->email) }}" required />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="password">Password <span class="text-muted">(Leave blank to
                                        keep current)</span></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" />
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="profile_image">Profile Image <span class="text-muted">(Leave
                                    blank to keep current)</span></label>
                            <input class="form-control @error('profile_image') is-invalid @enderror" type="file"
                                id="profile_image" name="profile_image" accept="image/*">
                            @error('profile_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mt-2">
                                @if($user->profile_image)
                                    <img id="imagePreview" src="{{ asset('storage/' . $user->profile_image) }}" alt="Preview"
                                        style="max-width: 200px; max-height: 200px; border-radius: 8px;"
                                        class="img-thumbnail" />
                                @else
                                    <img id="imagePreview" src="#" alt="Preview"
                                        style="display: none; max-width: 200px; max-height: 200px; border-radius: 8px;"
                                        class="img-thumbnail" />
                                @endif
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Update User</button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-label-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script>
        document.getElementById('profile_image').onchange = function (evt) {
            const [file] = this.files;
            if (file) {
                const preview = document.getElementById('imagePreview');
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        };
    </script>
@endpush
