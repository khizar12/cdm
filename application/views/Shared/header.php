<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $title; ?> - Clinical Data Management</title>
    <meta name="description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Clinical Data Management">
    <meta property="og:site_name" content="Clinical Data Management">
    <meta property="og:description" content="Clinical Data Management">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/') ?>media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url('assets/') ?>media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/') ?>media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>js/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>js/plugins/ion-rangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>js/plugins/dropzone/dist/min/dropzone.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>js/plugins/flatpickr/flatpickr.min.css">

    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" id="css-main" href="<?php echo base_url('assets/') ?>css/oneui.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
        <nav id="sidebar" aria-label="Main Navigation">
            <div class="content-header bg-white-5">
                <a class="font-w600 text-dual" href="<?php echo base_url('dashboard'); ?>"> 
                    <span class="smini-hide"> 
                        <span class="font-w400">CLINICAL DATA MANAGEMENT</span> 
                    </span>
                </a>
            </div>
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link <?php echo ($pageID == 1) ? 'active' : '' ?>" href="<?php echo base_url('dashboard'); ?>"> <i class="nav-main-link-icon si si-speedometer"></i> <span class="nav-main-link-name">Dashboard</span> </a>
                    </li>

                    <li class="nav-main-item">
                        <a class="nav-main-link <?php echo ($pageID == 2) ? 'active' : '' ?>" href="<?php echo base_url('patient/create'); ?>"> 
                            <i class="nav-main-link-icon si si-note"></i> 
                            <span class="nav-main-link-name">Add New Patient</span> 
                        </a>
                    </li>

                    <?php $user_type = $this->session->userdata('user_type'); ?>

                    <?php if ($user_type == 1): ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link <?php echo ($pageID == 4) ? 'active' : '' ?>" href="<?php echo base_url('patient/index_test');?>"> 
                                <i class="nav-main-link-icon si si-grid"></i>
                                <span class="nav-main-link-name">All Patients Data</span> 
                            </a>
                        </li>
                    <?php endif ?>

                    <li class="nav-main-item">
                        <a class="nav-main-link <?php echo ($pageID == 3) ? 'active' : '' ?>" href="<?php echo base_url('patient');?>"> 
                            <i class="nav-main-link-icon si si-grid"></i>
                            <span class="nav-main-link-name">View All Patients</span> 
                        </a>
                    </li>
                    
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="<?php echo base_url(); ?>login/logout"> 
                            <i class="nav-main-link-icon si si-logout"></i>
                            <span class="nav-main-link-name">Logout</span> 
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
        <header id="page-header">
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i> 
                    </button>
                    <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                        <i class="fa fa-fw fa-ellipsis-v"></i>
                    </button>
                </div>
                <div class="d-flex align-items-center">
                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded" src="<?php echo base_url('assets/'); ?>media/avatars/avatar10.jpg" alt="Header Avatar" style="width: 18px;">
                            <span class="d-none d-sm-inline-block ml-1">
                                <?php echo (($this->session->userdata('user_type') == 1) ? '' : 'Dr. ').$this->session->userdata('first_name'); ?>
                            </span>
                            <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(104px, 31px, 0px);">
                            <div class="p-3 text-center bg-primary">
                                <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?php echo base_url('assets/'); ?>media/photos/doctor.jpg" alt="">
                            </div>
                            <div class="p-2">
                                <h5 class="dropdown-header text-uppercase">Actions</h5>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?php echo base_url(); ?>login/logout">
                                    <span>Log Out</span>
                                    <i class="si si-logout ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="page-header-search" class="overlay-header bg-white">
                <div class="content-header">
                    <form class="w-100" action="be_pages_generic_search.html" method="POST">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-danger" data-toggle="layout" data-action="header_search_off"> <i class="fa fa-fw fa-times-circle"></i> </button>
                            </div>
                            <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input"> </div>
                    </form>
                </div>
            </div>
            <div id="page-header-loader" class="overlay-header bg-white">
                <div class="content-header">
                    <div class="w-100 text-center"> <i class="fa fa-fw fa-circle-notch fa-spin"></i> </div>
                </div>
            </div>
        </header>