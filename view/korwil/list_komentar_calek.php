<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>List Ulasan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../../assets_dashboard/images/logoprofil.png">

    <!-- App css -->
    <link href="../../assets_dashboard/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets_dashboard/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets_dashboard/css/theme.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets_dashboard/css/button.css" rel="stylesheet" type="text/css" />

    <style>
        a {
            color: #007dab;
            text-decoration: none;
            -moz-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            -webkit-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
            outline: none;
        }

        a:hover,
        a:focus {
            color: #333;
            text-decoration: none;
            outline: none;
        }

        a.btn_1,
        .btn_1 {
            border: none;
            color: #fff;
            background: #007dab;
            cursor: pointer;
            padding: 10px 15px;
            display: inline-block;
            outline: none;
            font-size: 13px;
            font-size: 0.8125rem;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -webkit-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
            -ms-border-radius: 25px;
            border-radius: 25px;
            line-height: 1;
            font-weight: 500;
        }

        a.btn_1.gray,
        .btn_1.gray {
            background: #e9ecef;
            color: #868e96;
            margin-top: 10px;
        }

        a.btn_1.gray.approve:hover,
        .btn_1.gray.approve:hover {
            background: #28a745;
            color: #fff;
        }

        a.btn_1.gray.delete:hover,
        .btn_1.gray.delete:hover {
            background: #dc3545;
            color: #fff;
        }

        a.btn_1.medium,
        .btn_1.medium {
            padding: 12px 45px;
            font-size: 16px;
            font-size: 1rem;
        }

        a.btn_1:hover,
        .btn_1:hover {
            background: #007dab;
            color: #fff;
        }

        .btn-primary {
            background-color: #007dab;
            border-color: #007dab;
        }

        .btn-primary:hover {
            background-color: #007dab;
            border-color: #007dab;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>

    <!-- <script>
        function confirmDelete() {
            if (confirm("Apakah Anda yakin ingin menghapus akun?")) {
                window.location.href = "hapus_akun_user_partner.php";
            } else {
                return false;
            }
        }
    </script> -->

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">

                <div class="d-flex align-items-left">
                </div>

                <div class="d-flex align-items-center">

                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="../../assets_dashboard/images/users/avatar-3.jpg" alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1">Nama Lengkap</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="akun.php">
                                <span>Profil</span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>Keluar</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

       <!-- ========== Left Sidebar Start ========== -->
       <div class="vertical-menu">
            <div data-simplebar class="h-100">
            <br>
                <div class="navbar-brand-box">
                    <a href="dashboard_korwil.php" class="logo">
                        <img src="../../assets_dashboard/images/logoprofil.png" />
                    </a>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="dashboard_korwil.php" class="waves-effect"><i class='bx bx-home-smile'></i><span>Dashboard</span></a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="fas fa-box-open"></i><span>Catatan Intelektual</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="add_calek.php">Menambah Catatan Intelektual</a></li>
                                <li><a href="list_calek.php">Lihat Catatan Intelektual</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="list_komentar_calek.php" class="waves-effect"><i class='bx bx-home-smile'></i><span>Komentar</span></a>
                        </li>
                        <!-- <li>
                            <a href="#" onclick="confirmDelete()"><i class='fa fa-trash'></i><span>Hapus Akun</span></a></a>
                        </li> -->
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">List Ulasan</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">List Ulasan</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">Penilaian</th>
                                <th style="text-align: center;">Ulasan</th>
                                <th style="text-align: center;">Balasan</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;">Nama User 1</td>
                                <td style="text-align: center;">4</td>
                                <td style="text-align: center;">Ulasan dari User 1</td>
                                <td style="text-align: center;">Balasan dari Admin</td>
                                <td style="text-align: center;">
                                    <a href="edit_ulasan.php?id=1" class="btn btn_1">Balas</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">Nama User 2</td>
                                <td style="text-align: center;">5</td>
                                <td style="text-align: center;">Ulasan dari User 2</td>
                                <td style="text-align: center;">Balasan dari Admin</td>
                                <td style="text-align: center;">
                                    <a href="edit_ulasan.php?id=2" class="btn btn_1">Balas</a>
                                </td>
                            </tr>
                            <!-- Tambahkan baris ulasan lainnya sesuai kebutuhan -->
                        </tbody>
                    </table>
                    <!-- end main content-->

                </div>
                <!-- END layout-wrapper -->

                <!-- Overlay-->
                <div class="menu-overlay"></div>

                <!-- jQuery  -->
                <script src="../../assets_dashboard/js/jquery.min.js"></script>
                <script src="../../assets_dashboard/js/bootstrap.bundle.min.js"></script>
                <script src="../../assets_dashboard/js/metismenu.min.js"></script>
                <script src="../../assets_dashboard/js/waves.js"></script>
                <script src="../../assets_dashboard/js/simplebar.min.js"></script>

                <!-- Morris Js-->
                <script src="../../plugins/morris-js/morris.min.js"></script>
                <!-- Raphael Js-->
                <script src="../../plugins/raphael/raphael.min.js"></script>

                <!-- Morris Custom Js-->
                <script src="../../assets_dashboard/pages/dashboard-demo.js"></script>

                <!-- App js -->
                <script src="../../assets_dashboard/js/theme.js"></script>

</body>

</html>
