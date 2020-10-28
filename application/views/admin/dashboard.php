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
						<div class="card-header py-3">
							<h3 class="m-0 font-weight-bold text-primary">Manajemen Video</h3>
						</div>

						<div class="card-body">
							<div class="d-sm-flex align-items-center justify-content-between mb-4"> 
								<button class="btn btn-primary" data-toggle="modal" data-target="#addmodal">Tambah Video</button>
							</div>

							<div class="d-sm-flex align-items-center justify-content-between mb-4">
								<div class="btn-group">
									<select id="fl-kategori" class="custom-select">
										<option selected value="default">Semua Kategori</option>
									</select>
								</div>
							</div>

							<div>
								<table id="table1" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>Video</th>
											<th>Nama Video</th>
											<th>Kategori Video</th>
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

	<!-- modal add -->
	<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title w-100 text-center" id="addTitle"><b>Tambah Video</b></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

              	<div class="modal-body">
					<form class="cssform" name="property" id="property" method="POST" action="<?php echo base_url('index.php/add_video')?>" enctype="multipart/form-data">
						<div class="form-group">
							<label for="kategori" class="col-form-label">Kategori</label>
							<select class="custom-select" id="kategori" name="kategori" required>
								<option value="default">Kategori</option>   
							</select>
						</div>
						
						<div class="form-group">
							<label for="nama_video" class="col-form-label">Nama Video</label>
							<input type="text" class="form-control" id="namavideo" name="namavideo" placeholder="Nama Video..." required>
						</div>      

						<div class="form-group">
							<label for="upload">Upload Video</label><br>
							<input type="file" accept="video/*" id="video" name="video">
						</div>

						<div>
							<!-- <video width="400" controls><source src="" type="video/webm"></video> -->
							<img src="" width="80px;" height="100px;"> 
						</div>
              	</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>

                	</form>
            </div>
		</div>
	</div> 

	<!-- modal edit -->
	<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              	<div class="modal-header">
					<h5 class="modal-title w-100 text-center" id="editTitle"><b>Edit Video</b></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

              	<div class="modal-body">
                	<form>
						<div class="form-group">
							<input type="hidden" class="form-control" id="id-video" value="" readonly>
						</div>
						<div class="form-group">
							<label for="ed-kategori" class="col-form-label">Kategori</label>
							<select class="custom-select" id="ed-kategori">
								<option value="default">Kategori</option>   
							</select>
						</div>
						<div class="form-group">
							<label for="ed-nama-video" class="col-form-label">Nama Video</label>
							<input type="text" class="form-control" id="ed-nama-video" required>
						</div>
						<div class="form-group" id="divupload">
							<label for="ed-upload">Upload Video</label><br>
							<input type="file" accept="video/*" id="ed-upload" name="ed-upload">
						</div>
						
						<div>	
							<label for="ed-upload">Upload Video</label><br>
							<img src="" width="80px;" height="100px;"> <br><br>
							<button type="button" class="btn btn-secondary" id="hpsvideo">Hapus Video</button>
						</div>

					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="button" class="btn btn-primary" id="updatedata">Update</button>
				</div>
            </div>
		</div>
	</div> 

</body>

<?php $this->load->view("function_cookie");?>

<script>

	getLoginCookie('adminCookie', function(response){
		$("#currentadmin").html(response);
	});

	$.ajax({
        url: "<?php echo base_url() ?>index.php/get_all_kategori",
        type: 'POST',
        success: function (json) {
          var response = JSON.parse(json);
          response.forEach((data)=>{
            $('#fl-kategori').append(new Option(data.NamaKategori, data.IdKategori));
            $('#ed-kategori').append(new Option(data.NamaKategori, data.IdKategori));
			$('#kategori').append(new Option(data.NamaKategori, data.IdKategori));
			
            
          })
        },
        error: function (xhr, status, error) {
          alert('Terdapat Kesalahan Pada Server...');
          $("#submit").prop("disabled", false);
        }
	});

	$(document).ready(function () {      
		dTable = $('#table1').DataTable({
			responsive: true
		});
		
      	get_data()

    });

	$("#fl-kategori").change(function (e) { 
      	e.preventDefault();
		get_data();
      
    });

	function get_data(){
		$(".dataTables_empty").text("Loading...")
		var ktgr = $("#fl-kategori").val();
		var data = '';

		if(ktgr == "default"){
			data ='';
		} else {
			data = ktgr;
		}
		
		$.ajax({
			url: "<?php echo base_url() ?>index.php/get_all_video",
			type: 'POST',
			data: {data: data},
			success: function (json) {
				var response = JSON.parse(json);
				dTable.clear().draw();
				if(response.length > 0 ){
					response.forEach((data)=>{
						var kategorivideo = data.NamaKategori;
						var namavideo = data.NamaVideo;
						var srcvideo = data.SourceVideo;
						var srcgambar = data.SourceVideo;
						no = data.IdVideo;   

						if(data.IdKategori != null) {
							dTable.row.add([
							'<video width="400" controls><source src="http://localhost/bekkotemplate/upload/videos/'+ srcvideo +'" type="video/webm"></video>',
							namavideo,
							kategorivideo,
								'<button class="btn btn-outline-success mt-10 mb-10" onclick=tampildata("'+ no +'") >Edit</button>'
							+ '<button class="btn btn-danger mt-10 mb-10" onclick=hapusdata("'+ no +'") >Delete</button>'
							
							]).draw(false);
						}
					})				
				} else{
					$(".dataTables_empty").text("Tidak ada data yang ditampilkan.")
				}
			},
			error: function (xhr, status, error) {
				alert('Terdapat Kesalahan Pada Server 1...');
				$("#submit").prop("disabled", false);
			}
		});

		
    }

	function tampildata(id) {
		// console.log(id);
		$.ajax({
			url: "<?php echo base_url()?>index.php/get_video_by_id",
			type: 'POST',
			data: {id: id},
			success: function (response) {
				var response = JSON.parse(response);
				response.forEach((data)=>{
					var kategori = data.IdKategori;
					var namavideo = data.NamaVideo;
					var srcvideo = '2010282020_09_10_11_37_38.mp4';
					//  console.log('sadas');
					//  console.log(data.NamaVideo);
					document.getElementById("divupload").style.display = "none";

					$('#editmodal').modal();
					$("#id-video").val(data.IdVideo);
					$("#ed-kategori").val(kategori);
					$('#ed-nama-video').val(namavideo);
					$('#updatedata').click(function editdata() {
						var inputid = document.getElementById("id-video").value
						var inputktgr = document.getElementById("ed-kategori").value
						var inputnama = document.getElementById("ed-nama-video").value
						if(inputid == "default"){
							alert("Silahkan Pilih Kategori!")
							return;
						}



						$.ajax({
							url: "<?php echo base_url()?>index.php/update_video/",
							type: 'POST',
							data: {id:inputid, nama:inputnama, kategori:inputktgr},
							success: function (response) {
								alert('Data Berhasil Diedit!');
								window.location = "<?php echo base_url() ?>index.php/dashboardadmin";
							},
							error: function () {
								console.log("gagal update");
								alert('Data gagal diupdate!');

							}
						});
					});
					
				})                
			},
			error: function () {
				console.log("gagal update");
			}
		});          
    }

	function hapusdata(id) {
		var tanya = confirm("hapus?");

		if(tanya){
			$.ajax({
				url: "<?php echo base_url() ?>index.php/delete_video",
				type: 'POST',
				data: {id: id},
				success: function (response) {
					alert('Data Berhasil Dihapus!');
					window.location = "<?php echo base_url() ?>index.php/dashboardadmin";
				},
				error: function () {
					console.log("gagal menghapus");
					alert('Data gagal Dihapus!');


				}
			});
		}
    }

	


</script>

</html>
