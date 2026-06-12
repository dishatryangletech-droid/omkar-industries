@extends('layouts.backend')

@section('title', 'Change Password')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-8 col-md-10">
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-header border-bottom bg-transparent py-3">
                <h5 class="m-0 fw-bold">Change Password</h5>
            </div>
            <div class="card-body pt-4">
                
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form id="formAccountSettings" action="#" method="POST">
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
                        <div class="mb-3 col-md-12 form-password-toggle">
                            <label class="form-label fw-bold" for="newPassword">New Password</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="password" id="newPassword" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>

                        <div class="mb-3 col-md-12 form-password-toggle">
                            <label class="form-label fw-bold" for="confirmPassword">Confirm New Password</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="password" name="password_confirmation" id="confirmPassword"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
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
                            <a href="#" class="btn btn-label-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
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

