<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>App Alkitab</title>

	<!-- Custom fonts for this template -->
	<link href="<?=base_url("dist/vendor/fontawesome-free/css/all.min.css");?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?=base_url("dist/css/sb-admin-2.min.css");?>" rel="stylesheet">

	<!-- Custom styles for this page -->
	<link href="<?=base_url("dist/vendor/datatables/dataTables.bootstrap4.min.css");?>" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon bg-white">
					<img src="<?php echo base_url() ?>dist/img/logo.png" width="55px;" height="48px;"> 
				</div>
				<div class="sidebar-brand-text mx-3">App Alkitab</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="#">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Manajemen Video</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">


			<!-- Nav Item - Tables -->
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url("index.php/logoutadmin");?>">
				<i class="fas fa-fw fa-table"></i>
				<span>Sign Out</span></a>
			</li>

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

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-2 text-gray-800"></h1>
					<p class="mb-4"></p>

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3" id="judul">
						</div>

						<div class="card-body">                           

							<div class="mb-4">
								<button class="btn btn-info" onclick="window.location.href='<?php echo base_url() ?>index.php/dashboardadmin'">Kembali</button>
                            </div>

							<div>
								<table id="table1" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>Nama Pengomentar</th>
											<th>Komentar</th>
											<th>Detail</th>
										</tr>
									</thead>
									
									<tbody id="datatable">
                      
					  				</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Your Website 2020</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

		
	<!-- Bootstrap core JavaScript-->
	<script src="<?=base_url("dist/vendor/jquery/jquery.min.js");?>"></script>
	<script src="<?=base_url("dist/vendor/bootstrap/js/bootstrap.bundle.min.js");?>"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?=base_url("dist/vendor/jquery-easing/jquery.easing.min.js");?>"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?=base_url("dist/js/sb-admin-2.min.js");?>"></script>

	<!-- Page level plugins -->
	<script src="<?=base_url("dist/vendor/datatables/jquery.dataTables.min.js");?>"></script>
	<script src="<?=base_url("dist/vendor/datatables/dataTables.bootstrap4.min.js");?>"></script>

	<!-- Page level custom scripts -->
	<script src="<?=base_url("dist/js/demo/datatables-demo.js");?>"></script>

	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

	<!-- modal edit -->
	<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title w-100 text-center" id="addTitle"><b>Edit Kategori</b></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

              	<div class="modal-body">
					<form >					
                        <div class="form-group">
							<input type="hidden" class="form-control" id="id-kategori" value="" readonly>
						</div>
                        <div class="form-group">
							<label for="ed-nama-kategori" class="col-form-label">Nama Kategori</label>
							<input type="text" class="form-control" id="ed-nama-kategori" required>
						</div>     
              	</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="button" class="btn btn-primary" id="updatedata" >Edit</button>
				</div>
                	</form>
            </div>
		</div>
	</div> 


</body>

<?php $this->load->view("function_cookie");?>

<script>
	getLoginCookie('adminCookie', function(response){
		$("#currentadmin").html(response);
	});

    var id_video = '';
	var title = localStorage.getItem("name_video");

	$(document).ready(function () {      
		dTable = $('#table1').DataTable({
			responsive: true,
            "ordering": false
		});	

		document.getElementById("judul").innerHTML = '<h3 class="m-0 font-weight-bold text-primary">Komentar Video ' + title +'</h3>';
		
		$.ajax({
			url: "<?php echo base_url() ?>index.php/get_decrypt",
			type: 'GET',
			success: function (response) {
				// alert('Data api! ' + response);
				
				dTable.clear().draw();		
				$(".dataTables_empty").text("Loading...");


				id_video = response;
				get_data(response);
			},
			error: function () {
				console.log("gagal menghapus");
				alert('Data gagal Dihapus!');


			}
		});


    });



	function get_data(id){
		console.log('id ' + id)
		
		var dataString="id=" + id;

		$.ajax({
			url: "https://cmcsurabaya.org/admintesting/api_alkitab/aksi.php?act=get_all_comment_test",
			type: 'POST',
			data: dataString,
			success: function (json) {
				var response = JSON.parse(json);
				console.log(response);

				if(response == null){
					$(".dataTables_empty").text("Tidak ada data Komentar pada Video ini");

				} else {
					
					if(response.length > 0 ){
						response.forEach((data)=>{
							var komentar = data.komentar;
							var nama = data.email;
							no = data.id_comment;   

							dTable.row.add([
								nama,
								komentar,
								'<button class="btn btn-outline-danger mt-10 mb-10" onclick=hapusdata("'+ no +'")><i class="fa fa-trash"></i> Delete</button>'
							
							]).draw(false);
							
						})				
					} else{
						$(".dataTables_empty").text("Tidak ada data Komentar pada Video ini");
					}
				}

			},
			error: function (xhr, status, error) {
			alert('Terdapat Kesalahan Pada Server...');
			$("#submit").prop("disabled", false);
			}
		});

	}

   
    function hapusdata(id) {
		var tanya = confirm("hapus?");

		if(tanya){
			$.ajax({
				url: "https://cmcsurabaya.org/admintesting/api_alkitab/aksi.php?act=delete_komentar",
				type: 'POST',
				data: {id: id},
				success: function (response) {
					alert('Komentar Berhasil Dihapus!');
					window.location = "<?php echo base_url() ?>index.php/komentarvideo";
				},
				error: function () {
					console.log("gagal menghapus");
					alert('Data gagal Dihapus!');


				}
			});

			// $.ajax({
			// 	url: "https://cmcsurabaya.org/admintesting/api_alkitab/aksi.php?act=delete_kategori",
			// 	type: 'POST',
			// 	data: {id: id},
			// 	success: function (response) {
			// 		// alert('Data api Dihapus!');
			// 		window.location = "<?php echo base_url() ?>index.php/kategoriadmin";
			// 	},
			// 	error: function () {
			// 		console.log("gagal menghapus");
			// 		alert('Data gagal Dihapus!');


			// 	}
			// });
		}
    }
    
        
	


</script>

</html>
