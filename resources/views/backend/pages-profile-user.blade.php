@extends('layouts.backend')

@section('title', 'User Profile')

@php
    $activeTab = request()->get('tab', 'profile');
    if ($errors->has('current_password') || $errors->has('password')) {
        $activeTab = 'password';
    }
@endphp

@section('content')
<div class="row">
    <!-- User Sidebar Details Card -->
    <div class="col-xl-4 col-lg-5 col-md-5">
        <div class="card mb-4 shadow-sm border-0">
            <!-- Cover Header -->
            <div class="rounded-top position-relative" style="height: 130px; background: linear-gradient(135deg, #ba0001 0%, #5a0001 100%);">
                <!-- Inner branding if desired -->
            </div>
            
            <!-- User Avatar & Core Info -->
            <div class="card-body text-center pt-0 position-relative">
                <div class="mt-n5 mb-3">
                    <img src="{{ $user->profile_image ? asset($user->profile_image) : asset('assets/backend/img/avatars/1.png') }}" alt="user avatar"
                        class="rounded-circle img-thumbnail shadow-sm" style="width: 110px; height: 110px; border-width: 4px; object-fit: cover;" />
                </div>
                <h4 class="mb-1 fw-bold">{{ $user->name }}</h4>
                <p class="text-muted mb-3">{{ $user->email }}</p>
                <span class="badge bg-label-primary px-3 py-2 mb-4">Administrator</span>

                <!-- Details List -->
                <div class="text-start border-top pt-4">
                    <h6 class="text-uppercase text-muted font-monospace small mb-3">Account Details</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-user text-heading fs-5 me-2"></i>
                            <span class="fw-medium text-heading me-2">Full Name:</span>
                            <span class="text-secondary">{{ $user->name }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-mail text-heading fs-5 me-2"></i>
                            <span class="fw-medium text-heading me-2">Email:</span>
                            <span class="text-secondary">{{ $user->email }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-shield-check text-heading fs-5 me-2"></i>
                            <span class="fw-medium text-heading me-2">Status:</span>
                            <span class="badge bg-label-success">Active</span>
                        </li>
                        <li class="d-flex align-items-center mb-0">
                            <i class="ti ti-calendar text-heading fs-5 me-2"></i>
                            <span class="fw-medium text-heading me-2">Member Since:</span>
                            <span class="text-secondary">{{ $user->created_at ? $user->created_at->format('M Y') : 'N/A' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile / Change Password Actions Card -->
    <div class="col-xl-8 col-lg-7 col-md-7">
        <!-- Navigation Pills -->
        <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2">
            <li class="nav-item">
                <button class="nav-link py-2 px-3 d-flex align-items-center {{ $activeTab === 'profile' ? 'active' : '' }}" 
                    data-bs-toggle="pill" data-bs-target="#profile-tab">
                    <i class="ti ti-user-edit me-1_5"></i> Edit Profile Information
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link py-2 px-3 d-flex align-items-center {{ $activeTab === 'password' ? 'active' : '' }}" 
                    data-bs-toggle="pill" data-bs-target="#password-tab">
                    <i class="ti ti-lock me-1_5"></i> Change Password
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content p-0">
            <!-- Edit Profile Tab -->
            <div class="tab-pane fade {{ $activeTab === 'profile' ? 'show active' : '' }}" id="profile-tab" role="tabpanel">
                <div class="card shadow-sm border-0">
                    <h5 class="card-header border-bottom bg-transparent fw-bold py-3">Edit Profile</h5>
                    <div class="card-body pt-4">
                        
                        @if ($errors->any() && $activeTab === 'profile')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form id="formEditProfile" action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="profileName" class="form-label fw-bold">Full Name</label>
                                    <input class="form-control" type="text" id="profileName" name="name" 
                                        value="{{ old('name', $user->name) }}" placeholder="Enter your full name" required />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="profileEmail" class="form-label fw-bold">Email Address</label>
                                    <input class="form-control" type="email" id="profileEmail" name="email" 
                                        value="{{ old('email', $user->email) }}" placeholder="name@example.com" required />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="profileImage" class="form-label fw-bold">Profile Image</label>
                                    <input class="form-control" type="file" id="profileImage" name="profile_image" accept="image/*" />
                                    <small class="text-muted d-block mt-1">Allowed file types: JPG, JPEG, PNG, GIF, SVG. Max size: 2MB.</small>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save Profile Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Change Password Tab -->
            <div class="tab-pane fade {{ $activeTab === 'password' ? 'show active' : '' }}" id="password-tab" role="tabpanel">
                <div class="card shadow-sm border-0">
                    <h5 class="card-header border-bottom bg-transparent fw-bold py-3">Change Password</h5>
                    <div class="card-body pt-4">

                        @if ($errors->any() && $activeTab === 'password')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form id="formChangePassword" action="#" method="POST">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-12 form-password-toggle">
                                    <label class="form-label fw-bold" for="currentPassword">Current Password</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="password" name="current_password" id="currentPassword"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6 form-password-toggle">
                                    <label class="form-label fw-bold" for="newPassword">New Password</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="password" id="newPassword" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>

                                <div class="mb-3 col-md-6 form-password-toggle">
                                    <label class="form-label fw-bold" for="confirmPassword">Confirm New Password</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="password" name="password_confirmation" id="confirmPassword"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-4 bg-light rounded p-3">
                                <h6 class="fw-bold mb-2">Password Requirements:</h6>
                                <ul class="ps-3 mb-0 small text-secondary">
                                    <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                    <li>Contain mixed-case letters and numbers / symbols for best security</li>
                                </ul>
                            </div>
                            
                            <div>
                                <button type="submit" class="btn btn-primary me-2">Save Password Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#ba0001'
            });
        });
    </script>
@endif
@endsection

