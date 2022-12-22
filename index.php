<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

//KONEKSI DB
include "inc/koneksi.php";
//FUNGSI RUPIAH
include "inc/rupiah.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Gereja Lubuk Kelik</title>
	<link rel="icon" href="dist/img/favicongereja.jpg">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Icons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-default navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars"></i>
					</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="http://localhost:80/kasgereja/" class="nav-link">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="?page=i_data_km" class="nav-link">Pemasukan Gereja</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="?page=o_data_km" class="nav-link">Pengeluaran Gereja</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="?page=rekap_km" class="nav-link">Rekap Keuangan Gereja</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="?page=lap_gereja" class="nav-link">Laporan Keuangan Gereja</a>
				</li>
				

			</ul>

			<!-- Right navbar links -->

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="http://localhost:80/kasgereja/" class="brand-link">
				<img src="dist/img/logogereja.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text font-weight-light"> Gereja Lubuk Kelik</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="dist/img/adminlogo.jpg" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="http://localhost:80/kasgereja/" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level == "Administrator") {
						?>
							<li class="nav-item">
								<a href="http://localhost:80/kasgereja/" class="nav-link">
								<i class="nav-icon fas fa-home"></i>
									<p>
										Home
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-dollar-sign"></i>
									
									<p>
										Keuangan Gereja
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=i_data_km" class="nav-link">
										<i class="nav-icon far fa-circle text-success"></i>
											<p>Pemasukan Gereja</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=o_data_km" class="nav-link">
											<i class="nav-icon far fa-circle text-danger"></i>
											<p>Pengeluaran Gereja</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=rekap_km" class="nav-link">
											<i class="nav-icon far fa-circle text-primary"></i>
											<p>Rekap Keuangan Gereja</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-chart-line"></i>
									<p>
										Laporan Keuangan
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=lap_gereja" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Laporan Keuangan Gereja</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-header">Settings</li>
							<li class="nav-item">
								<a href="?page=MyApp/data_pengguna" class="nav-link">
									<i class="nav-icon far fa-user"></i>
									<p>
										Users
										<span class="badge badge-warning right">2 Level</span>
									</p>
								</a>
							</li>

						<?php
						} elseif ($data_level == "Bendahara") {
						?>
							<li class="nav-item">
								<a href="http://localhost:80/kasgereja/" class="nav-link">
									<i class="nav-icon fas fa-home"></i>
									<p>
										Home
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-dollar-sign"></i>
									<p>
										Keuangan Gereja
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=i_data_km" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Pemasukan Gereja</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=o_data_km" class="nav-link">
											<i class="nav-icon far fa-circle text-danger"></i>
											<p>Pengeluaran Gereja</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=rekap_km" class="nav-link">
											<i class="nav-icon far fa-circle text-primary"></i>
											<p>Rekap Keuangan Gereja</p>
										</a>
									</li>
								</ul>							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-chart-line"></i>
									<p>
										Laporan Keuangan
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=lap_gereja" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Laporan Keuangan Gereja</p>
										</a>
									</li>
							</li>
					</ul>
					</li>
				<?php
						}
				?>

				<li class="nav-item">
					<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
						<i class="nav-icon far fa-circle text-danger"></i>
						
						<p>
							Logout
						</p>
					</a>
				</li>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php
					if (isset($_GET['page'])) {
						$hal = $_GET['page'];

						switch ($hal) {
								//Klik Halaman Home Pengguna
							case 'MyApp/admin':
								include "home/admin.php";
								break;
							case 'bendahara':
								include "home/bendahara.php";
								break;

								//Pengguna
							case 'MyApp/data_pengguna':
								include "admin/pengguna/data_pengguna.php";
								break;
							case 'MyApp/add_pengguna':
								include "admin/pengguna/add_pengguna.php";
								break;
							case 'MyApp/edit_pengguna':
								include "admin/pengguna/edit_pengguna.php";
								break;
							case 'MyApp/del_pengguna':
								include "admin/pengguna/del_pengguna.php";
								break;

								//Gereja in
							case 'i_data_km':
								include "bendahara/gereja/in/data_kas.php";
								break;
							case 'i_add_km':
								include "bendahara/gereja/in/add_kas.php";
								break;
							case 'i_edit_km':
								include "bendahara/gereja/in/edit_kas.php";
								break;
							case 'i_del_km':
								include "bendahara/gereja/in/del_kas.php";
								break;

								//Gereja out
							case 'o_data_km':
								include "bendahara/gereja/out/data_kas.php";
								break;
							case 'o_add_km':
								include "bendahara/gereja/out/add_kas.php";
								break;
							case 'o_edit_km':
								include "bendahara/gereja/out/edit_kas.php";
								break;
							case 'o_del_km':
								include "bendahara/gereja/out/del_kas.php";
								break;

							case 'rekap_km':
								include "bendahara/gereja/rekap_kas.php";
								break;				

								//laporan Keuangan Gereja 
							case 'lap_gereja':
								include "bendahara/laporan/lap_mas.php";
								break;			

								//default
							default:
								echo "<center><h1> ERROR !</h1></center>";
								break;
						}
					} else {
						// Auto Halaman Home Pengguna
						if ($data_level == "Administrator") {
							include "home/admin.php";
						} elseif ($data_level == "Bendahara") {
							include "home/bendahara.php";
						}
					}
					?>

				</div>
			</section>
			<!-- /.content -->
			
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				Gereja Lubuk Kelik
			</div>
			<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
			All rights reserved.
		</footer>
		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>