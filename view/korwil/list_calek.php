<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <title>List Data Produk</title>
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

</head>

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
  a:hover, a:focus {
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

</style>

<!-- Buat hapus row -->
<!-- <script>
      function dialogHapus(urlHapus,namanya){
        if(confirm("Apakah anda yakin akan menghapus data " + namanya+" ?")){
          alert("Oke konfirmasi penghapusan diberikan");
          document.location=urlHapus;
        }
        else{
          alert("Penghapusan dibatalkan");
        }
      }
  </script>
  
  <script>
function confirmDelete() {
    if (confirm("Apakah Anda yakin ingin menghapus akun?")) {
        // User confirmed deletion, proceed with AJAX request
            window.location.href ="hapus_akun_user_partner.php"
            //alert('OK');
    } else {
        // User clicked Cancel, do nothing
        //alert('NO');
        return false;
    }
}
</script> -->

<!-- Buat sortir -->
<!-- <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(function() {
  $("#myTableUtama").tablesorter({ sortList: [[0,0], [1,0]] });
});
</script> -->


<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        `

        <header id="page-topbar">
            <div class="navbar-header">

                <div class="d-flex align-items-left">
                    
                </div>

                <div class="d-flex align-items-center">
                    

                <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="../../assets_dashboard/images/users/avatar-3.jpg"
                                alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1"></span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="akun.php">
                                <span>Profil</span>
                            </a>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="logout.php">
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
                                <h4 class="mb-0 font-size-18">List Data Produk</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">Data Produk</li>
                                        <li class="breadcrumb-item active">List Data Produk</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- Buat search bar -->

                    <!-- <p><p>
                    Filter data : <input id="myInput" type="text" placeholder="Search.."> -->

                    
                    <table class="table table-hover tablesorter" id="myTableUtama">
                        <thead>

                            <tr>
                                <th>No.</th>
                                <th style="width:150px;">Nama Toko</th>
                                <th style="width:150px;">Nama Produk</th>
                                <th style="width:50px;">Kategori</th>
                                <th style="width:150px;">Deskripsi</th>
                                <th>Harga</th>
                                <th>Foto</th>                                
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
						
							<tr>
								<td>1</td>
								<td>Nama Toko 1</td>
								<td>Produk 1</td>
								<td>Olahan Ikan</td>
								<td>Deskripsi produk 1</td>
								<td>10000</td>
								<td><img src="images/foto1.jpg" width="100" height="100"></td>
								<td>
									<a href="update_datprod.php?id=1" class="btn_1">Ubah</a><br>
									<a href="javascript:dialogHapus('hapus_datprod.php?id=1','Produk 1')" class="btn_1 gray">Hapus</a>
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Nama Toko 2</td>
								<td>Produk 2</td>
								<td>Ikan Segar</td>
								<td>Deskripsi produk 2</td>
								<td>20000</td>
								<td><img src="images/foto2.jpg" width="100" height="100"></td>
								<td>
									<a href="update_datprod.php?id=2" class="btn_1">Ubah</a><br>
									<a href="javascript:dialogHapus('hapus_datprod.php?id=2','Produk 2')" class="btn_1 gray">Hapus</a>
								</td>
							</tr>
                        
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

</html>
