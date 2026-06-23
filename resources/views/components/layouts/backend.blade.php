<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="{{ asset('assets/backend') }}/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>@yield('title', 'Admin Panel') | Omkar Industries</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('frontend/images/omkar-logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="preload" href="{{ asset('assets/backend/vendor/fonts/tabler/tabler-icons.woff2') }}" as="font"
        type="font/woff2" crossorigin />
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/vendor/css/rtl/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/vendor/libs/typeahead-js/typeahead.css" />

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('page-css')

    <!-- Helpers -->
    <script src="{{ asset('assets/backend') }}/vendor/js/helpers.js"></script>
    <script src="{{ asset('assets/backend') }}/vendor/js/template-customizer.js"></script>
    <script src="{{ asset('assets/backend') }}/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo" style="height: 75px !important; padding: 1rem 1.5rem;">
                    <a href="#" class="app-brand-link" style="display: flex; align-items: center; gap: 10px;">
                        <img src="{{ asset('frontend/images/omkar-logo.png') }}" alt="Omkar Industries" style="height: 50px;
                            width: 50px;
                            object-fit: contain;
                            margin-left: -5px;" />
                        <span class="app-brand-text demo menu-text fw-bold"
                            style="font-size: 1.1rem; line-height: 1.2; display: inline-block;">Omkar<br>Industries</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"
                            style="margin-right: -30px;"></i>
                        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                            <div data-i18n="Dashboard">Dashboard</div>
                        </a>
                    </li>


                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Content Management</span>
                    </li>

                    <!-- Products -->
                    <li class="menu-item {{ Route::is('admin.products.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.products.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-package"></i>
                            <div data-i18n="Products">Products</div>
                        </a>
                    </li>

                    <!-- Gallery -->
                    <li class="menu-item {{ Route::is('admin.gallery.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.gallery.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-photo"></i>
                            <div data-i18n="Gallery">Gallery</div>
                        </a>
                    </li>

                    <!-- Blogs -->
                    <li class="menu-item {{ Route::is('admin.blogs.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.blogs.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-article"></i>
                            <div data-i18n="Blogs">Blogs</div>
                        </a>
                    </li>
                    <!-- FAQ Management -->
                    <li class="menu-item {{ Route::is('admin.faqs.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.faqs.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-help"></i>
                            <div data-i18n="FAQ Management">FAQ Management</div>
                        </a>
                    </li>

                    <!-- Client Management -->
                    <li class="menu-item {{ Route::is('admin.clients.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.clients.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-globe"></i>
                            <div data-i18n="Client Management">Client Management</div>
                        </a>
                    </li>



                    <!-- User Management -->
                    <li class="menu-item {{ Route::is('admin.users.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-users"></i>
                            <div data-i18n="User Management">User Management</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Inquiries</span>
                    </li>

                    <!-- Contacts -->
                    <li class="menu-item {{ Route::is('admin.contacts.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.contacts.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-mail"></i>
                            <div data-i18n="Contact Inquiries">Contact Inquiries</div>
                        </a>
                    </li>

                    <!-- Careers -->
                    <li class="menu-item {{ Route::is('admin.careers.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.careers.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-briefcase"></i>
                            <div data-i18n="Job Openings">Job Openings</div>
                        </a>
                    </li>

                    <!-- Job Applications -->
                    <li class="menu-item {{ Route::is('admin.job-applications.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.job-applications.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-users"></i>
                            <div data-i18n="Job Applications">Job Applications</div>
                        </a>
                    </li>

                    <!-- Dealer Inquiries -->
                    <!-- <li class="menu-item {{ Route::is('admin.dealers.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.dealers.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-truck"></i>
                            <div data-i18n="Dealer Inquiries">Dealer Inquiries</div>
                        </a>
                    </li> -->

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Website Sections</span>
                    </li>

                    <!-- Website Pages (Submenu) -->
                    <li class="menu-item {{ Route::is('admin.website-pages.*') ? 'active open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-layout-navbar"></i>
                            <div data-i18n="Website Pages">Website Pages</div>
                        </a>
                        <ul class="menu-sub">
                            <li
                                class="menu-item {{ Route::is('admin.website-pages.header-settings') ? 'active' : '' }}">

                                <a href="{{ route('admin.website-pages.header-settings') }}" class="menu-link">
                                    <div data-i18n="Header Settings">Header Settings</div>
                                </a>
                            </li>
                            <li
                                class="menu-item {{ Route::is('admin.website-pages.footer-settings') ? 'active' : '' }}">

                                <a href="{{ route('admin.website-pages.footer-settings') }}" class="menu-link">
                                    <div data-i18n="Footer Settings">Footer Settings</div>
                                </a>
                            </li>
                            <li
                                class="menu-item {{ Route::is('admin.website-pages.default-image-settings') ? 'active' : '' }}">

                                <a href="{{ route('admin.website-pages.default-image-settings') }}" class="menu-link">
                                    <div data-i18n="Default Image Settings">Default Image Settings</div>
                                </a>
                            </li>

                            <li
                                class="menu-item {{ Route::is('admin.website-pages.general-settings') ? 'active' : '' }}">

                                <a href="{{ route('admin.website-pages.general-settings') }}" class="menu-link">
                                    <div data-i18n="General Settings">General Settings (Contact)</div>
                                </a>
                            </li>

                            <li class="menu-item {{ Route::is('admin.website-pages.sliders.*') ? 'active' : '' }}">

                                <a href="{{ route('admin.website-pages.sliders.index') }}" class="menu-link">
                                    <div data-i18n="Sliders">Sliders</div>
                                </a>
                            </li>
                            <li class="menu-item {{ Route::is('admin.website-pages.about-us.index') ? 'active' : '' }}">

                                <a href="{{ route('admin.website-pages.about-us.index') }}" class="menu-link">
                                    <div data-i18n="About Us">About Us</div>
                                </a>
                            </li>
                            <li
                                class="menu-item {{ Route::is('admin.website-pages.video-section.index') ? 'active' : '' }}">

                                <a href="{{ route('admin.website-pages.video-section.index') }}" class="menu-link">
                                    <div data-i18n="Video Section">Video Section</div>
                                </a>
                            </li>
                            <li
                                class="menu-item {{ Route::is('admin.website-pages.our-clients.index') ? 'active' : '' }}">

                                <a href="{{ route('admin.website-pages.our-clients.index') }}" class="menu-link">
                                    <div data-i18n="Our Clients">Our Clients</div>
                                </a>
                            </li>
                            <li
                                class="menu-item {{ Route::is('admin.website-pages.product-section.index') ? 'active' : '' }}">

                                <a href="{{ route('admin.website-pages.product-section.index') }}" class="menu-link">
                                    <div data-i18n="Product Section">Product Section</div>
                                </a>
                            </li>
                            <li
                                class="menu-item {{ Route::is('admin.website-pages.page-banners.index') ? 'active' : '' }}">

                                <a href="{{ route('admin.website-pages.page-banners.index') }}" class="menu-link">
                                    <div data-i18n="Page Banners">Page Banners</div>
                                </a>
                            </li>
                            <li class="menu-item {{ Route::is('admin.website-pages.testimonials.*') ? 'active' : '' }}">

                                <a href="{{ route('admin.website-pages.testimonials.index') }}" class="menu-link">
                                    <div data-i18n="Testimonials">Testimonials</div>
                                </a>
                            </li>
                            <li class="menu-item {{ Route::is('admin.website-pages.exhibitions.*') ? 'active' : '' }}">

                                <a href="{{ route('admin.website-pages.exhibitions.index') }}" class="menu-link">
                                    <div data-i18n="Exhibitions">Exhibitions</div>
                                </a>
                            </li>
                            <li
                                class="menu-item {{ Route::is('admin.website-pages.team-partners.*') ? 'active' : '' }}">

                                <a href="{{ route('admin.website-pages.team-partners.index') }}" class="menu-link">
                                    <div data-i18n="Team & Partners">Team & Partners</div>
                                </a>
                            </li>
                            <li
                                class="menu-item {{ Route::is('admin.website-pages.brochure-page.index') ? 'active' : '' }}">

                                <a href="{{ route('admin.website-pages.brochure-page.index') }}" class="menu-link">
                                    <div data-i18n="Brochure Page">Brochure Page</div>
                                </a>
                            </li>
                        </ul>
                    </li>



                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="ti ti-menu-2 ti-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        @php
                                            $userProfileImg = (isset($user) && $user) ? $user->profile_image : null;
                                            $headerImgPath = $userProfileImg
                                                ? (str_starts_with($userProfileImg, 'uploads/') ? asset($userProfileImg) : asset('storage/' . $userProfileImg))
                                                : asset('assets/backend/img/avatars/1.png');
                                        @endphp
                                        <img src="{{ $headerImgPath }}" alt class="h-auto rounded-circle"
                                            style="aspect-ratio: 1/1; object-fit: cover;" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ $headerImgPath }}" alt
                                                            class="h-auto rounded-circle"
                                                            style="aspect-ratio: 1/1; object-fit: cover;" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span
                                                        class="fw-medium d-block">{{ (isset($user) && $user) ? $user->name : 'Admin' }}</span>
                                                    <small class="text-muted">Administrator</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                            <i class="ti ti-user-check me-2 ti-sm"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a class="dropdown-item" href="{{ route('admin.change-password') }}">
                                            <i class="ti ti-key me-2 ti-sm"></i>
                                            <span class="align-middle">Change Password</span>
                                        </a>
                                    </li> -->
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.logout') }}" id="logout-btn">
                                            <i class="ti ti-logout me-2 ti-sm"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                                <div>
                                    ©
                                    <script>document.write(new Date().getFullYear());</script>
                                    , made with ❤️ by <a href="#" target="_blank" class="fw-medium">Tryangle Tech</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <script src="{{ asset('assets/backend') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('assets/backend') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('assets/backend') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('assets/backend') }}/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{ asset('assets/backend') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('assets/backend') }}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('assets/backend') }}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('assets/backend') }}/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ asset('assets/backend') }}/vendor/js/menu.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/backend') }}/js/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const logoutBtn = document.getElementById('logout-btn');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    const url = this.getAttribute('href');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You will be logged out of your session!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#7367f0',
                        cancelButtonColor: '#808390',
                        confirmButtonText: 'Yes, log out!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
            }
        });
    </script>

    @stack('page-js')
</body>

</html>