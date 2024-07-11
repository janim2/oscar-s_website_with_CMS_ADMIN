<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-  assets-path=" assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Oscar | Login</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href=" assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href=" assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href=" assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href=" assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href=" assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href=" assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href=" assets/vendor/css/pages/page-auth.css" />

  <!-- Helpers -->
  <script src=" assets/vendor/js/helpers.js"></script>

    <!-- sweet alert -->
    <link rel="stylesheet" href="sweetalert2.min.css">

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src=" assets/js/config.js"></script>
</head>

<body>
  <!-- Content -->



  <div class="container-xxl">

    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-text demo text-body fw-bolder">Oscar Bimpong</span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Welcome to your Admin! 👋</h4>
            <p class="mb-4">Please sign-in to your account and start the adventure</p>

            <form id="login_form" class="mb-3" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="username" name="username"
                  placeholder="Enter your email or username" autofocus required/>
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <!-- <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a> -->
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" required/>
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100 loading">
                  Sign in
                </button>
              </div>
            </form>

            <!-- <p class="text-center">
                <span>New on our platform?</span>
                <a href="auth-register-basic.html">
                  <span>Create an account</span>
                </a>
              </p> -->
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->

  <!-- <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div> -->

  <!-- Core JS -->
  <!-- build:js   assets/vendor/js/core.js -->
  <script src=" assets/vendor/libs/jquery/jquery.js"></script>
  <script src=" assets/vendor/libs/popper/popper.js"></script>
  <script src=" assets/vendor/js/bootstrap.js"></script>
  <script src=" assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src=" assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src=" assets/js/main.js"></script>

  <!-- Toast JS -->
  <!-- <script src="  assets/js/ui-toasts.js"></script> -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- //script to help me with the ajax functions -->
  <script src="dashboard/helpers/submittion_helper.js"></script>

  <!-- swall alert starts here -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->

  <script src="sweetalert2.all.min.js"></script>
  <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
  <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

  <script src="sweetalert2.min.js"></script>
  <!-- swal ends here -->

  <!-- login script starts here -->
  <script>
    $(document).on('submit', '#login_form', function (event) {
      event.preventDefault();
      submitFormQuery(this, "dashboard/database/Account/login.php", ".loading", "Login Successful", true);
    });
  </script>
</body>

</html>