<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('asset/skydash/vendors/feather/feather.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/skydash/vendors/ti-icons/css/themify-icons.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/skydash/vendors/css/vendor.bundle.base.css') ?>">
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('asset/skydash/css/vertical-layout-light/style.css') ?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('asset/skydash/images/favicon.png') ?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?= base_url('asset/skydash/images/logo.svg') ?>" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              
              <!-- Form Register -->
              <form class="pt-3" action="<?= base_url('Auth/registrasi') ?>" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <select class="form-control form-control-lg" name="country">
                    <option value="">Country</option>
                    <option value="USA">United States of America</option>
                    <option value="UK">United Kingdom</option>
                    <option value="India">India</option>
                    <option value="Germany">Germany</option>
                    <option value="Argentina">Argentina</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required>
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" required>
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                    SIGN UP
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? 
                  <a href="<?= base_url('auth') ?>" class="text-primary">Login</a>
                </div>
              </form>
              <!-- End Form Register -->

            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?= base_url('asset/skydash/vendors/js/vendor.bundle.base.js') ?>"></script>
  <script src="<?= base_url('asset/skydash/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('asset/skydash/js/hoverable-collapse.js') ?>"></script>
  <script src="<?= base_url('asset/skydash/js/template.js') ?>"></script>
  <script src="<?= base_url('asset/skydash/js/settings.js') ?>"></script>
  <script src="<?= base_url('asset/skydash/js/todolist.js') ?>"></script>
  <!-- endinject -->
</body>

</html>
