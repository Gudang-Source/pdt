<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>DITJEN PDT | <?php echo $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?php echo media_url('images/logopdt.png') ?>">


  <!-- App css -->
  <link href="<?php echo media_url() ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo media_url() ?>css/style.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo media_url() ?>css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo media_url() ?>css/app.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo media_url() ?>css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo media_url() ?>css/toastr.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?php echo media_url() ?>css/jquery.dataTables.min.css">

  <script src="<?php echo media_url() ?>js/jquery-3.3.1.min.js"></script>

</head>

<body <?php echo ($this->uri->segment(1) == 'employee') ? 'class="enlarged" data-keep-enlarged="true"' : '' ?>>

  <div id="wrapper">
    <div class="navbar-custom">
      <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <img src="<?php echo media_url() ?>images/default.jpeg" alt="user-image" class="rounded-circle">
            <span class="pro-user-name ml-1">
              <?php echo ucfirst($this->fullname) ?> <i class="mdi mdi-chevron-down"></i>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
            <div class="dropdown-header noti-title">
              <h6 class="text-overflow m-0">Selamat Datang</h6>
            </div>
            <a href="<?php echo site_url('profile') ?>" class="dropdown-item notify-item">
              <i class="fe-user"></i>
              <span>Profile</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo site_url('auth/logout') ?>" class="dropdown-item notify-item">
              <i class="fe-log-out"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>

      <div class="logo-box">
        <a href="<?php echo site_url('home') ?>" class="logo text-center">
          <span class="logo-lg float-left ml-2">
            <img src="<?php echo media_url('images/logopdt.png') ?>" alt="" style="height:50px">
            <span class="ml-2" style="font-size:21px;color:#CF3831;font-weight:bold;">DITJEN <span style="color:#428D45;">PDT</span></span>
          </span>
        </a>
      </div>

      <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
          <button class="button-menu-mobile disable-btn waves-effect">
            <i class="fe-menu"></i>
          </button>
        </li>
        <li>
          <h4 class="page-title-main"><?php echo $title ?></h4>
        </li>

      </ul>
    </div>

    <?php echo $this->load->view('sidebar') ?>

    <div class="content-page">
      <div class="content">
        <?php (isset($main)) ? $this->load->view($main) : null ?>
      </div>
    </div>

    <footer class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            Copyright &copy; <?php echo date('Y') ?> Alright Reserved
          </div>
          <div class="col-md-6">
            <div class="text-md-right footer-links d-none d-sm-block">
              Direktorat Jenderal Pembangunan Daerah Tertinggal
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <div class="rightbar-overlay"></div>

  <script src="<?php echo media_url() ?>js/vendor.min.js"></script>
  <script src="<?php echo media_url() ?>js/app.min.js"></script>
  <script src="<?php echo media_url() ?>js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo media_url() ?>js/jquery.dataTables.min.js"></script>
  <script src="<?php echo media_url() ?>js/toastr.min.js"></script>
  <script src="<?php echo media_url() ?>js/jquery.inputmask.bundle.js"></script>

  <script>
    $('.dataTable').dataTable({
      "bPaginate": true,
      "bLengthChange": true,
      "bFilter": true,
      "bInfo": true,
      "bAutoWidth": true
    });

    $(".years").datepicker({
      format: "yyyy",
      viewMode: "years",
      minViewMode: "years",
      autoclose: true,
      todayHighlight: true
    });

    $('.datepicker').datepicker({
      uiLibrary: 'bootstrap4',
      autoclose: true,
      todayHighlight: true,
      format: 'yyyy-mm-dd',
      orientation: 'bottom auto'
    });

    $(document).ready(function() {
      $('.numeric').inputmask("numeric", {
        removeMaskOnSubmit: true,
        radixPoint: ".",
        groupSeparator: ",",
        digits: 2,
        autoGroup: true,
        prefix: 'Rp ',
        rightAlign: false,
      });
    });
  </script>

  <?php if ($this->session->flashdata('success')) { ?>
    <script type="text/javascript">
      Command: toastr["success"]("<?php echo $this->session->flashdata('success') ?>")
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
    </script>
  <?php } ?>

  <?php if ($this->session->flashdata('failed')) { ?>
    <script type="text/javascript">
      Command: toastr["error"]("<?php echo $this->session->flashdata('failed') ?>")
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
    </script>
  <?php } ?>


</body>

</html>