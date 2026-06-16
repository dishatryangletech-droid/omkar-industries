<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
  data-assets-path="{{ asset('assets/backend') }}/" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Login Basic - Pages | Omkar Industries</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/backend') }}/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
    rel="stylesheet" />

  <!-- Icons -->
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
  <!-- Vendor -->
  <link rel="stylesheet" href="{{ asset('assets/backend') }}/vendor/libs/@form-validation/umd/styles/index.min.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="{{ asset('assets/backend') }}/vendor/css/pages/page-auth.css" />

  <!-- Helpers -->
  <script src="{{ asset('assets/backend') }}/vendor/js/helpers.js"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="{{ asset('assets/backend') }}/vendor/js/template-customizer.js"></script>
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{ asset('assets/backend') }}/js/config.js"></script>
</head>

<body>
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">
        <!-- Login -->
        <div class="card shadow-lg border-0">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center mb-4 mt-2" style="height: auto !important;">
              <a href="{{ route('frontend.index') }}" class="app-brand-link"
                style="width: auto !important; height: auto !important;">
                <img src="{{ asset('frontend/images/omkar-logo.png') }}" alt="Omkar Industries"
                  style="width: 150px !important; height: auto !important; max-width: 100% !important;" />
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-1 pt-2 text-center">Welcome to Omkar Industries! 👋</h4>

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

            <form id="formAuthentication" class="mb-3" action="#" method="POST">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                  value="{{ old('email') }}" autofocus />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <a href="#">
                    <small style="color: #ba0001;">Forgot Password?</small>
                  </a>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit"
                  style="background: linear-gradient(270deg, #ba0001 0%, #e60000 100%); border: none;">Sign in</button>
              </div>
            </form>

            <p class="text-center">
              <span>New on our platform?</span>
              <a href="#">
                <span style="color: #ba0001;">Create an account</span>
              </a>
            </p>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->

  <script src="{{ asset('assets/backend') }}/vendor/libs/jquery/jquery.js"></script>
  <script src="{{ asset('assets/backend') }}/vendor/libs/popper/popper.js"></script>
  <script src="{{ asset('assets/backend') }}/vendor/js/bootstrap.js"></script>
  <script src="{{ asset('assets/backend') }}/vendor/libs/node-waves/node-waves.js"></script>
  <script src="{{ asset('assets/backend') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="{{ asset('assets/backend') }}/vendor/libs/hammer/hammer.js"></script>
  <script src="{{ asset('assets/backend') }}/vendor/libs/i18n/i18n.js"></script>
  <script src="{{ asset('assets/backend') }}/vendor/libs/typeahead-js/typeahead.js"></script>
  <script src="{{ asset('assets/backend') }}/vendor/js/menu.js"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{ asset('assets/backend') }}/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
  <script src="{{ asset('assets/backend') }}/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
  <script src="{{ asset('assets/backend') }}/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>

  <!-- Main JS -->
  <script src="{{ asset('assets/backend') }}/js/main.js"></script>

  <!-- Page JS -->
  <script src="{{ asset('assets/backend') }}/js/pages-auth.js"></script>
</body>

</html>