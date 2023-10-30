<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url() ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/css/dataTables.bootstrap4.css">
    <title>SISTA - <?php echo $header_title; ?></title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="<?php echo base_url() ?>dashboard">S I S T A</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown notification">
                            <div class="dropdown" style="margin-top: 13px; margin-right: 20px;">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Export / Import
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="<?php echo base_url() ?>export_all">Export Data</a>
                                    <a class="dropdown-item" href="<?php echo base_url() ?>excel_import">Import Data</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar nav-link nav-icons">
                                <form action="<?php echo base_url() ?>export_all/search_all_data" method="post">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="nik" placeholder="Cari NIK...">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-dark" type="submit" id="button-addon2"><i class="fa fa-fw fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url() ?>assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $this->session->userdata('user_nama'); ?> </h5>
                                    <span class="status"></span><span class="ml-2"><?php
                                    if($this->session->userdata('user_akses') == 0){
                                        echo "Superuser";
                                    } else if($this->session->userdata('user_akses') == 1){
                                        echo "Karyawan";
                                    } else {
                                        echo "User";
                                    }
                                    ?></span>
                                </div>
                                <a class="dropdown-item" href="<?php echo base_url() ?>user/profile_data/<?php echo $this->session->userdata('user_id'); ?>"><i class="fas fa-user mr-2"></i>Profil</a>
                                <a class="dropdown-item" href="<?php echo base_url() ?>logout"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Menu</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url() ?>dashboard"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success"></span></a>

                                <?php if($this->session->userdata('user_akses') == 0){ ?>
                                    <a class="nav-link" href="<?php echo base_url() ?>user"><i class="fa fa-fw fa-users"></i>User <span class="badge badge-success"></span></a>
                                <?php } ?>

                                <?php if($this->session->userdata('user_akses') == 2){ ?>
                                    <a class="nav-link" href="<?php echo base_url() ?>terkait_subyek/view_data_user/<?php echo $this->session->userdata('user_id') ?>"><i class="fa fa-fw fas fa-street-view"></i>Terkait Subyek <span class="badge badge-success"></span></a>
                                <?php } else { ?>
                                    <a class="nav-link" href="<?php echo base_url() ?>terkait_subyek"><i class="fa fa-fw fas fa-street-view"></i>Terkait Subyek <span class="badge badge-success"></span></a>
                                <?php } ?>

                                <?php if($this->session->userdata('user_akses') == 2){ ?>
                                    <a class="nav-link" href="<?php echo base_url() ?>terkait_obyek/view_obyek_user/<?php echo $this->session->userdata('user_id') ?>"><i class="fa fa-fw fas fa-suitcase"></i>Terkait Obyek <span class="badge badge-success"></span></a>
                                <?php } else { ?>
                                    <a class="nav-link" href="<?php echo base_url() ?>terkait_obyek"><i class="fa fa-fw fas fa-suitcase"></i>Terkait Obyek <span class="badge badge-success"></span></a>
                                <?php } ?>

                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> Analisa Data </a>
                                    <div id="submenu-6" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url() ?>report_penguasaan_tanah">Penguasaan Tanah</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url() ?>report_bukan_pemilik_tanah">Penguasaan Tanah Gadai/Sewa/Bagi Hasil</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url() ?>report_jenis_pemilikan_tanah">Jenis Pemilikan Tanah</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url() ?>report_jenis_penggunaan_tanah">Jenis Penggunaan Tanah</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url() ?>report_jenis_pemanfaatan_tanah">Jenis Pemanfaatan Tanah</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url() ?>report_skp">Sengketa,  Konflik dan Perkara Pertanahan</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url() ?>report_landreform">Potensi Tanah Obyek Landreform</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <a class="nav-link" href="<?php echo base_url() ?>logout"><i class="fa fa-fw fa-power-off"></i>Logout <span class="badge badge-success"></span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper" style="min-height:500px;">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title"><?php echo $header_title; ?> </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>dashboard" class="breadcrumb-link">Dashboard</a></li>
                                            <?php
                                            if(isset($arr_breadcrumbs)) {
                                                if(is_array($arr_breadcrumbs)) {
                                                    $i = 1;
                                                    foreach($arr_breadcrumbs as $breadcrumbs_title => $breadcrumbs_links) {
                                                        if($breadcrumbs_links != '#') {
                                                            $breadcrumbs_links = base_url() . $breadcrumbs_links;
                                                        }
                                                        if($i == count($arr_breadcrumbs)) {
                                                            echo '<li class="breadcrumb-item active">' . $breadcrumbs_title . '</li>';
                                                        } else {
                                                            echo '<li class="breadcrumb-item active" aria-current="page"><a href="' . $breadcrumbs_links . '">' . $breadcrumbs_title . '</a></li>';
                                                        }
                                                        $i++;
                                                    }
                                                }
                                            }
                                            ?>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <!-- jquery 3.3.1 -->
                        <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
                        <!-- content -->
                        <?php echo template_echo('content');?>

                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Copyright © 2019 <b>Abdur Rasyid</b></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- bootstap bundle js -->
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="<?php echo base_url() ?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="<?php echo base_url() ?>assets/libs/js/main-js.js"></script>
    <!-- datatable -->
    <script src="<?php echo base_url() ?>assets/vendor/dataTables/datatables.min.js"></script>
    <script>
    $('.nav-link').on('click', function () {
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    });
    </script>


</body>

</html>
