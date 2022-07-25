<body data-topbar="colored" onload="initialize()">

  <!-- Begin page -->
  <div id="layout-wrapper">

    <header id="page-topbar">
      <div class="navbar-header">
        <div class="d-flex">
          <!-- LOGO -->
          <div class="navbar-brand-box">
            <a href="<?= base_url('admin') ?>" class="logo logo-dark">
              <span class="logo-sm">
                <img src="<?= base_url('assets/images/') ?>logo2.png" alt="" height="35">
              </span>
              <span class="logo-lg">
                <img src="<?= base_url('assets/images/') ?>logo-head-black.png" alt="" height="50">
              </span>
            </a>

          </div>

          <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
            <i class="mdi mdi-backburger"></i>
          </button>

        </div>

        <div class="d-flex">
          <!-- LOGO -->
          <div class="navbar-brand-mobile">
            <a href="<?= base_url('lapor/dashboard') ?>" class="logo logo-dark">
              <span class="logo-sm">
                <img src="<?= base_url('assets/images/') ?>logo-head.png" alt="" height="auto" width="200">
                <!-- <img src="<?= base_url('vendor/xoric/dist/') ?>assets/images/egangguan.png" alt="" height="35"> -->
                <!-- <img src="<?= base_url('assets/img/') ?>kominfo.png" alt="" height="35"> -->
              </span>
            </a>
          </div>
        </div>


        <div class="d-flex">

          <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="rounded-circle header-profile-user" src="<?= base_url('assets/images/profile/') ?><?= $user['image'] ?>" alt="Header Avatar">
              <span class="d-none d-sm-inline-block ml-1"><?= $user['name'] ?></span>
              <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- item-->
              <a class="dropdown-item" href="<?= base_url('admin') ?>"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Profile</a>
              <!-- <div class="dropdown-divider"></div>
              <a class="dropdown-item waves-effect" href="javascript:void(0);" id="logout">
                <i class="mdi mdi-logout font-size-16 align-middle mr-1"></i>
                Logout
              </a> -->
            </div>
          </div>

        </div>
      </div>

    </header>