@extends('layouts.backend')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Product Stat -->
    <div class="col-lg-3 col-sm-6 mb-4">
        <a href="{{ route('admin.products.index') }}" class="card h-100 text-decoration-none text-body" style="transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-primary">
                            <i class="ti ti-package ti-md"></i>
                        </span>
                    </div>
                    <h2 class="ms-1 mb-0">{{ $productCount ?? 0 }}</h2>
                </div>
                <p class="mb-1 fw-medium text-heading">Total Products</p>
            </div>
        </a>
    </div>

    <!-- Industry Stat -->
    <div class="col-lg-3 col-sm-6 mb-4">
        <a href="#" class="card h-100 text-decoration-none text-body" style="transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-info">
                            <i class="ti ti-building-factory ti-md"></i>
                        </span>
                    </div>
                    <h2 class="ms-1 mb-0">{{ $industryCount ?? 0 }}</h2>
                </div>
                <p class="mb-1 fw-medium text-heading">Total Industries</p>
            </div>
        </a>
    </div>

    <!-- Application Stat -->
    <div class="col-lg-3 col-sm-6 mb-4">
        <a href="#" class="card h-100 text-decoration-none text-body" style="transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-warning">
                            <i class="ti ti-apps ti-md"></i>
                        </span>
                    </div>
                    <h2 class="ms-1 mb-0">{{ $applicationCount ?? 0 }}</h2>
                </div>
                <p class="mb-1 fw-medium text-heading">Total Applications</p>
            </div>
        </a>
    </div>

    <!-- Gallery Stat -->
    <div class="col-lg-3 col-sm-6 mb-4">
        <a href="{{ route('admin.gallery.index') }}" class="card h-100 text-decoration-none text-body" style="transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-success">
                            <i class="ti ti-photo ti-md"></i>
                        </span>
                    </div>
                    <h2 class="ms-1 mb-0">{{ $galleryCount ?? 0 }}</h2>
                </div>
                <p class="mb-1 fw-medium text-heading">Total Gallery</p>
            </div>
        </a>
    </div>

    <!-- Blog Stat -->
    <div class="col-lg-3 col-sm-6 mb-4">
        <a href="{{ route('admin.blogs.index') }}" class="card h-100 text-decoration-none text-body" style="transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-danger">
                            <i class="ti ti-article ti-md"></i>
                        </span>
                    </div>
                    <h2 class="ms-1 mb-0">{{ $blogCount ?? 0 }}</h2>
                </div>
                <p class="mb-1 fw-medium text-heading">Total Blogs</p>
            </div>
        </a>
    </div>

    <!-- Contact Inquiries Stat -->
    <div class="col-lg-3 col-sm-6 mb-4">
        <a href="{{ route('admin.contacts.index') }}" class="card h-100 text-decoration-none text-body" style="transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-secondary">
                            <i class="ti ti-mail ti-md"></i>
                        </span>
                    </div>
                    <h2 class="ms-1 mb-0">{{ $contactCount ?? 0 }}</h2>
                </div>
                <p class="mb-1 fw-medium text-heading">Contact Inquiries</p>
            </div>
        </a>
    </div>

    <!-- Career Stat -->
    <div class="col-lg-3 col-sm-6 mb-4">
        <a href="{{ route('admin.careers.index') }}" class="card h-100 text-decoration-none text-body" style="transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-primary">
                            <i class="ti ti-briefcase ti-md"></i>
                        </span>
                    </div>
                    <h2 class="ms-1 mb-0">{{ $careerCount ?? 0 }}</h2>
                </div>
                <p class="mb-1 fw-medium text-heading">Job Openings</p>
            </div>
        </a>
    </div>

    <!-- Job Applications Stat -->
    <div class="col-lg-3 col-sm-6 mb-4">
        <a href="{{ route('admin.job-applications.index') }}" class="card h-100 text-decoration-none text-body" style="transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-success">
                            <i class="ti ti-users ti-md"></i>
                        </span>
                    </div>
                    <h2 class="ms-1 mb-0">{{ $jobAppCount ?? 0 }}</h2>
                </div>
                <p class="mb-1 fw-medium text-heading">Job Applications</p>
            </div>
        </a>
    </div>

    <!-- Dealer Inquiries Stat -->
    <div class="col-lg-3 col-sm-6 mb-4">
        <a href="{{ route('admin.dealers.index') }}" class="card h-100 text-decoration-none text-body" style="transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-info">
                            <i class="ti ti-truck ti-md"></i>
                        </span>
                    </div>
                    <h2 class="ms-1 mb-0">{{ $dealerCount ?? 0 }}</h2>
                </div>
                <p class="mb-1 fw-medium text-heading">Dealer Inquiries</p>
            </div>
        </a>
    </div>
</div>
@endsection


