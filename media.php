<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  header('location:index.php?log=1');;  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
include "config/koneksi.php";
include "config/library.php";
include "config/fungsi_indotgl.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aplikasi Sistem Informasi Surat Perintah Perjalanan Dinas (SPPD)</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Custom styles for this page -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
  <script src="assets/vendor/bootstrap-select/bootstrap-select.min.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?module=home">
        <div class="sidebar-brand-icon">
          <img src="assets/img/jateng.png" height="60px" width="60px">
        </div>
        <div class="sidebar-brand-text mx-3">APPS SPPD</div>
      </a>

	  <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php $p = $_GET['module']; if($p=='home'){echo "active";} ?>">
        <a class="nav-link" href="?module=home">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>
	
	<?php
	if ($_SESSION['level']=="operator"){
	?>
	
	  <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        MASTER DATA
      </div>
	  
	  <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item <?php $p = $_GET['module']; if($p=='nppd' || $p=='tambahnppd' || $p=='spt' || $p=='sppd'){echo "active";} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mastersppd" aria-expanded="true" aria-controls="mastersppd">
          <i class="fas fa-fw fa-envelope-open-text"></i>
          <span>Data SPPD</span>
        </a>
        <div id="mastersppd" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?module=nppd">Data NPPD</a>
            <a class="collapse-item" href="?module=spt">Data SPT</a>
            <a class="collapse-item" href="?module=sppd">Data SPPD</a>
          </div>
        </div>
      </li>
	  
	  <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item <?php $p = $_GET['module']; if($p=='pegawai' || $p=='golongan'){echo "active";} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masterpegawai" aria-expanded="true" aria-controls="masterpegawai">
          <i class="fas fa-fw fa-user-tie"></i>
          <span>Data Pegawai</span>
        </a>
        <div id="masterpegawai" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?module=pegawai">Data Pegawai</a>
            <a class="collapse-item" href="?module=golongan">Data Golongan</a>
          </div>
        </div>
      </li>
	  
	  <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item <?php $p = $_GET['module']; if($p=='tujuan' || $p=='biaya' || $p=='transportasi'){echo "active";} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masterbiaya" aria-expanded="true" aria-controls="masterbiaya">
          <i class="fas fa-fw fa-receipt"></i>
          <span>Data Biaya</span>
        </a>
        <div id="masterbiaya" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?module=tujuan">Data Kota</a>
            <a class="collapse-item" href="?module=biaya">Data Biaya Perjalanan</a>
			<a class="collapse-item" href="?module=transportasi">Data Transportasi</a>
          </div>
        </div>
      </li>
	  
	  <!-- Divider -->
      <hr class="sidebar-divider">
	  
	  <!-- Heading -->
      <div class="sidebar-heading">
        MASTER LAPORAN
      </div>
	  
	  <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item <?php $p = $_GET['module']; if($p=='kwitansi' || $p=='lpd'){echo "active";} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masterlaporan" aria-expanded="true" aria-controls="masterlaporan">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>Data Laporan</span>
        </a>
        <div id="masterlaporan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?module=kwitansi">Data Kwitansi</a>
            <a class="collapse-item" href="?module=lpd">Data Perjalanan Dinas</a>
          </div>
        </div>
      </li>
	  
	  <!-- Divider -->
      <hr class="sidebar-divider">
	  
	  <!-- Heading -->
      <div class="sidebar-heading">
        MASTER SETTING
      </div>
	  
	  <li class="nav-item <?php $p = $_GET['module']; if($p=='instansi' || $p=='ttdkwitansi'){echo "active";} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mastersetting" aria-expanded="true" aria-controls="mastersetting">
          <i class="fas fa-fw fa-cog"></i>
          <span>Data Setting</span>
        </a>
        <div id="mastersetting" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?module=instansi">Data Instansi</a>
            <a class="collapse-item" href="?module=ttdkwitansi">Data Kwitansi</a>
          </div>
        </div>
      </li>
	  
	  
	<?php }elseif($_SESSION['level']=="kabag") { ?>
	
	  <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        MASTER DATA
      </div>
	  
	  <li class="nav-item <?php $p = $_GET['module']; if($p=='nppd'){echo "active";} ?>">
        <a class="nav-link" href="?module=nppd">
          <i class="fas fa-fw fa-envelope-open-text"></i>
          <span>Data NPPD</span></a>
      </li>
	  
	  <!-- Divider -->
      <hr class="sidebar-divider">
	  
	  <!-- Heading -->
      <div class="sidebar-heading">
        MASTER LAPORAN
      </div>
	  
	  <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item <?php $p = $_GET['module']; if($p=='kwitansi' || $p=='lpd'){echo "active";} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masterlaporan" aria-expanded="true" aria-controls="masterlaporan">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>Data Laporan</span>
        </a>
        <div id="masterlaporan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?module=kwitansi">Data Kwitansi</a>
            <a class="collapse-item" href="?module=lpd">Data Perjalanan Dinas</a>
          </div>
        </div>
      </li>  
	  
	<?php }else{ ?>
	  
	  <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        MASTER DATA
      </div>
      <li class="nav-item <?php $p = $_GET['module']; if($p=='tambahnppd'){echo "active";} ?>">
        <a class="nav-link" href="?module=tambahnppd">
          <i class="fas fa-fw fa-envelope-open-text"></i>
          <span>Buat NPPD</span></a>
      </li>
	  <li class="nav-item <?php $p = $_GET['module']; if($p=='spt'){echo "active";} ?>">
        <a class="nav-link" href="?module=spt">
          <i class="fas fa-fw fa-envelope-open-text"></i>
          <span>Data SPT</span></a>
      </li>
	  <!-- Divider -->
      <hr class="sidebar-divider">
	  
	  <!-- Heading -->
      <div class="sidebar-heading">
        MASTER LAPORAN
      </div>
	  
	  <li class="nav-item <?php $p = $_GET['module']; if($p=='lpd'){echo "active";} ?>">
        <a class="nav-link" href="?module=lpd">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>Data Perjalanan Dinas</span></a>
      </li>
      <li class="nav-item <?php $p = $_GET['module']; if($p=='riwayat'){echo "active";} ?>">
        <a class="nav-link" href="?module=riwayat">
          <i class="fas fa-fw fa-list"></i>
          <span>Data Riwayat Perjalanan Dinas</span></a>
      </li>
	
	<?php } ?>
	
	<!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          
		  <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn text-success d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
						
			<!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="text-uppercase mr-2 d-none d-lg-inline text-gray-600 small">
					<?php echo $_SESSION['namauser']; ?>
				</span>
                <img class="img-profile rounded-circle" src="assets/img/user.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
				<a class="dropdown-item" href="?module=password">
                  <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ganti Password
                </a>
                <div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
					Keluar
				</a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
		
		<div class="container-fluid">
			<?php include "content.php"; ?>
		</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
			
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" untuk mengakhiri sesi masuk ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="button" data-dismiss="modal"><i class="fas fa-fw fa-times mr-1"></i> Batal</button>
                    <a class="btn btn-danger" href="logout.php"><i class="fas fa-fw fa-sign-out-alt mr-1"></i> Keluar</a>
                </div>
            </div>
        </div>
    </div>
    

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/js/demo/chart-area-demo.js"></script>
  <script src="assets/js/demo/chart-pie-demo.js"></script>
  
  <!-- Page level plugins -->
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/js/demo/datatables-demo.js"></script>
  
  <script>
  $(function () {
		$('[data-toggle="tooltip"]').tooltip()
  })
  </script>
  
</body>

</html>
		
		
<?php } ?>