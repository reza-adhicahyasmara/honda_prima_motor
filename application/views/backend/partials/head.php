<?php 
    $url_foto_karyawan = base_url('assets/img/karyawan/'.$this->session->userdata('ses_foto_karyawan'));
    $url_gambar_profil = base_url('assets/img/banner/user.svg');
?>  


<!DOCTYPE html>
<html lang="en">
<!--   
                                                                           
                                                                            
            ////////////   //   ////        //   ////////////        //          888   888              /////////           //        //             /////////     //          //
           //             //   // //       //        //            ////        888888 8    8           //       //        ////       //           //              //          //
          //             //   //  //      //        //           //  //       8888888*      8         //        //      //  //      //          //               //          //     
         //             //   //   //     //        //          //    //       88888888*     8        //       //      //    //     //           //              //          //
        //             //   //    //    //        //         //      //        88888*      8        /////////       //      //    //             ///////       //          // 
       //             //   //     //   //        //        ////////////         8888*     8        //             ////////////   //                    //     //          //
      //             //   //      //  //        //        //        //            888*  8         //             //        //   //                      //   //          //
     //             //   //       // //        //        //        //              88*8          //             //        //   //                     //    //          //
    ////////////   //   //        ////        //        //        //                 *          //             //        //   ////////////   /////////     //////////////

by projekindong
-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="<?php echo base_url('assets/img/banner/logo.png'); ?>" color="#000000"></link>
    <title><?php echo $pageTitle; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/dropzone/dropzone.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/floating-labels/floating-labels.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/lightbox/src/css/lightbox.css"> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/backend/css/adminlte.min.css">

    <style>

        /* INPUT NUMBER CUSTOM */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">
    <div class="preloader flex-column justify-content-center align-items-center bg-white">
        <img class="animation__shake" src="<?php echo base_url('assets/img/banner/logo.png'); ?>" alt="AdminLTELogo" height="200" width="200">
    </div>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-danger navbar-dark text-sm" aria-label="">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><span class="bx bx-fw bx-sm bx-menu"></span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <div class="row">        
                            <?php echo $this->session->userdata['ses_nama_karyawan']; ?>
                            <div class="image">
                                <?php if($this->session->userdata('ses_foto_karyawan') != "") { ?>
                                    <img src="<?php echo base_url('assets/img/karyawan/'.$this->session->userdata('ses_foto_karyawan')); ?>" class="img-circle elevation-1" style="margin-top:-6px; margin-left: 5px; width:35px; height:35px; object-fit: cover;" alt="Image">
                                <?php }else{ ?>
                                    <img src="<?php echo $url_gambar_profil;?>" class="img-circle elevation-1" style="margin-top:-6px; margin-left: 5px; width:35px; height:35px; object-fit: cover; background-color:white" alt="Image">
                                <?php } ?> 
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="<?php echo base_url('profil') ?>" class="dropdown-item"><i class="bx bx-fw bxs-user mr-2"></i> Profil</a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo base_url('profil/ganti_password') ?>" class="dropdown-item"><i class="bx bx-fw bxs-lock mr-2"></i> Ganti Password</a>
                    </div>
                </li>
            </ul>
        </nav>
        
        <aside class="main-sidebar sidebar-light-danger elevation-4 text-sm">
            <a href="" class="brand-link">
                <img src="<?php echo base_url('assets/img/banner/logo.png'); ?>" class="brand-image" style="" alt="Image">
                <span class="brand-text font-weight"><strong class="text-md">Honda Prima Motor</strong></span>
            </a>
            <div class="sidebar">
                <nav class="mt-2" aria-label="">
                    <ul class="nav nav-pills nav-sidebar nav-compact flex-column nav-child-indent" data-widget="treeview" role="menu"> 
                        <?php if($this->session->userdata('ses_akses') =='Admin'){?>
                            <li class="nav-item"><a href="<?php echo base_url('admin/dashboard'); ?>" class="nav-link"><i class="nav-icon bx bx-fw bxs-grid-alt"></i><p>Dashboard</p></a></li>
                            <li class="nav-item"><a href="<?php echo base_url('admin/karyawan'); ?>" class="nav-link"><i class="nav-icon bx bx-fw bxs-group"></i><p>Karyawan </p></a></li>
                            <li class="nav-item"><a href="<?php echo base_url('admin/penilaian'); ?>" class="nav-link"><i class="nav-icon bx bx-fw bxs-calendar-edit"></i><p>Penilaian </p></a></li>
                            <li class="nav-item"><a href="<?php echo base_url('admin/rekap'); ?>" class="nav-link"><i class="nav-icon bx bx-fw bx-line-chart"></i><p>Rekap </p></a></li>



                        <?php }elseif($this->session->userdata('ses_akses') =='Sales'){?>
                            <li class="nav-item"><a href="<?php echo base_url('sales/data_penilaian_sales'); ?>" class="nav-link"><i class="nav-icon bx bx-fw bx-line-chart"></i><p>Data Penilaian</p></a></li>      



                        <?php }elseif($this->session->userdata('ses_akses') =='Pimpinan'){?>
                            <li class="nav-item"><a href="<?php echo base_url('pimpinan/dashboard'); ?>" class="nav-link"><i class="nav-icon bx bx-fw bxs-grid-alt"></i><p>Dashboard</p></a></li>
                            <li class="nav-item"><a href="<?php echo base_url('pimpinan/siswa'); ?>" class="nav-link"><i class="nav-icon bx bx-fw bxs-graduation"></i><p>Siswa</p></a></li>
                            <li class="nav-item"><a href="<?php echo base_url('pimpinan/karyawan'); ?>" class="nav-link"><i class="nav-icon bx bx-fw bxs-group"></i><p>Tata Usaha</p></a></li>
                            <li class="nav-item"><a href="<?php echo base_url('pimpinan/rekap'); ?>" class="nav-link"><i class="nav-icon bx bx-fw bx-line-chart"></i><p>Rekap </p></a></li>              
                        <?php } ?> 
                    </ul>
                    <ul class="nav nav-pills nav-sidebar nav-compact flex-column nav-child-indent" style="position: absolute; bottom: 10px;">
                        <li class="nav-item"><a href="<?php echo base_url('login/logout'); ?>" class="nav-link bg-danger"><i class="nav-icon bx bx-fw bx-log-out"></i><p>Logout</p></a></li>
                    </ul>
                </nav>
            </div>
        </aside>