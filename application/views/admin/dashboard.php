<!DOCTYPE html>
<html lang="en">
<?php set_time_limit(1800000);?>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>App Alkitab</title>
	
  	<link href="<?=base_url("dist/img/logo.png");?>" rel="icon">

	<!-- Custom fonts for this template -->
	<link href="<?=base_url("dist/vendor/fontawesome-free/css/all.min.css");?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?=base_url("dist/css/sb-admin-2.min.css");?>" rel="stylesheet">

	<!-- Custom styles for this page -->
	<link href="<?=base_url("dist/vendor/datatables/dataTables.bootstrap4.min.css");?>" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">

	<style>
		#overlay {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.5);
            z-index: 999999;
        }

        #text{
            position: fixed;
            top: 70%;
            left: 50%;
            font-size: 50px;
            color: white;
            transform: translate(-50%,-50%);
            -ms-transform: translate(-50%,-50%);
        }

        .loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 120px;
            height: 120px;
            margin: -76px 0 0 -76px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
	
	</style>

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

			<hr class="sidebar-divider my-0">
			<li class="nav-item active">
				<a class="nav-link" href="<?=base_url("index.php/dashboardadmin");?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Manajemen Video</span></a>
			</li>

			<hr class="sidebar-divider">
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url("index.php/replyvideodetail");?>">
				<i class="fas fa-fw fa-folder"></i>
				<span>Reply Video Ruang Doa</span></a>
			</li>


			<!-- <hr class="sidebar-divider">
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url("index.php/logoutadmin");?>">
				<i class="fas fa-fw fa-table"></i>
				<span>Sign Out</span></a>
			</li> -->

			<!-- Divider -->
			<!-- <hr class="sidebar-divider d-none d-md-block"> -->

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

				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<ul class="navbar-nav ml-auto">
						<!-- <li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="title_item" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							</a>
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
								<a class="dropdown-header" href="<?=base_url("index.php/replyvideodetail");?>" id="item_notif" style="display:none">									
								</a>								
								<a class="dropdown-item text-center small text-gray-500" href="#" id="item_none" style="display:none">Tidak ada permintaan</a>
							</div>
						</li> -->

						<div class="topbar-divider d-none d-sm-block"></div>

						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
								<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
							</a>
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="<?=base_url("index.php/logoutadmin");?>">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>
					</ul>
				</nav>

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
							<canvas id="thecanvas" height="360" width="640" style="display:none;">
							</canvas>

							<div class="d-sm-flex align-items-center justify-content-between mb-4"> 
								<button class="btn btn-primary" data-toggle="modal" data-target="#addmodal">Tambah Video</button>
								<button class="btn btn-info" onclick="window.location.href='<?php echo base_url() ?>index.php/kategoriadmin'">Kategori</button>
							</div>

							<div class="d-sm-flex align-items-center justify-content-between mb-4">
								<div class="btn-group">
									<select id="fl-kategori" class="custom-select">
										<option selected value="default">Semua Kategori</option>
										<option value="0">Tidak Ada Kategori</option>
									</select>
								</div>
							</div>

							<div>
								<table id="table1" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>Nama Video</th>
											<th>Video</th>
											<th>View Video</th>
											<th>Like Video</th>
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
                    <form id="modal_add">
						<div class="form-group">
							<label for="kategori" class="col-form-label"><b>Kategori</b></label>
							<select class="custom-select" id="kategori" name="kategori" required>
								<option value="default">Kategori</option>   
							</select>
						</div>
						
						<div class="form-group">
							<label for="nama_video" class="col-form-label"><b>Nama Video</b></label>
							<input type="text" class="form-control" id="namavideo" name="namavideo" placeholder="Nama Video..." required>
						</div>      

						<div class="form-group">
							<label for="foto_video" class="col-form-label"><b>Thumbnail Video</b></label><br>
							<span>*Foto Video akan diambil secara acak dari video jika poin ini tidak diisi</span><br>
							<input id="inputFileToLoad" type="file" accept="image/jpeg,image/png" onchange="encodeImageFileAsURL();" style="padding-top:5px;"/>
							<div id="imgTest" style="padding-top:15px;"></div>
						</div>

						<div class="form-group">
							<label for="video"><b>Upload Video</b></label><br>
							<input type="file" accept="video/*" id="video" name="video" required>
						</div>

						<div style="padding-top:10px;padding-bottom:10px;">
							<video width="auto" height="400" id="launch" style="display:none;"></video>
							<!-- <img src="<?php echo base_url() ?>dist/img/defaults.jpg" width="auto;" height="100px;">  -->
						</div>

						<div class="progress" style="padding-top:5px;">
							<div class="progress-bar"></div>
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
                    <form id="modal_edit">
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

						<div class="form-group" id="divupload2">
							<label for="foto_video" class="col-form-label"><b>Thumbnail Video</b></label><br>
							<input id="inputFileToLoad1" type="file" accept="image/jpeg,image/png" onchange="encodeImageFileAsURL();" style="padding-top:5px;"/>
							<div id="imgTest" style="padding-top:15px;"></div>
							
						</div>
						
						<div class="form-group" id="divimage2">	
							<label>Thumnbnail</label><br>
							<button type="button" class="btn btn-secondary" id="hpsimg">Ganti Thumbnail</button>
						</div>

						<div class="form-group" id="divupload">
							<label for="ed-upload">Upload Video</label><br>
							<input type="file" accept="video/*" id="ed-upload" name="ed-upload">

							<div style="padding-top:10px;padding-bottom:10px;">
								<video width="auto" height="300" id="launch1" style="display:none;"></video>
							</div>
							
							<div class="progress" style="padding-top:5px;">
								<div class="progress-bar"></div>
							</div>
						</div>
						
						<div class="form-group" id="divimage">	
							<label>Video</label><br>
							<img src="" id="edtimg" width="400px;" height="auto;"> <br><br>
							<button type="button" class="btn btn-secondary" id="hpsvideo">Ganti Video</button>
						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="bataldata">Batal</button>
					<!-- <button type="button" class="btn btn-primary" id="updatedata">Update</button> -->
					<button type="submit" class="btn btn-primary">Tambah</button>
					
				</div>		
				
					</form>		
            </div>
		</div>
	</div> 

	
    <div id="overlay">
        <div class="loader"></div>
    </div>




		
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
	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

	<script>var $j = jQuery.noConflict(true);</script>

</body>

<?php $this->load->view("function_cookie");?>

<script>

	getLoginCookie('adminCookie', function(response){
		$("#currentadmin").html(response);
	});

	var id = '';
	var inputid = null;
	var inputkategori = null;
	var inputstart = null;

	
	var status = '0';
	var status_gmbr = '0';
	var status_gmbr_send = '0';
	var getthumb = [];

	var d = new Date();
	var status_thumbnail = '0';
	var nama_thumbnail = d.getDate().toString() + (d.getMonth()+1).toString() + d.getFullYear().toString() + '_' + d.getHours() + '_';

	// console.log(nama_thumbnail);

	$.ajax({
        url: "<?php echo base_url() ?>index.php/get_all_kategori",
        type: 'POST',
		data: {id: id},
        success: function (json) {
          var response = JSON.parse(json);
          response.forEach((data)=>{
			if(data.id_kategori != 1){
				$('#fl-kategori').append(new Option(data.nama_kategori, data.id_kategori));
				$('#ed-kategori').append(new Option(data.nama_kategori, data.id_kategori));
				$('#kategori').append(new Option(data.nama_kategori, data.id_kategori));
			}
            
          })
        },
        error: function (xhr, status, error) {
          alert('Terdapat Kesalahan Pada Server...');
          $("#submit").prop("disabled", false);
        }
	});

	var Element = document.getElementById('video'); 
    var imgs = document.getElementById('launch'); 
	
    Element.addEventListener('change', function() { 
		var url = URL.createObjectURL(Element.files[0]); 
		imgs.style.display = 'block';
		imgs.src = url; 
		// console.log(Element);
		// console.log(url); 
		// console.log('aaaa ' ,imgs);

	}); 

	
	var Element1 = document.getElementById('ed-upload'); 
    var imgs1 = document.getElementById('launch1'); 
	
    Element1.addEventListener('change', function() { 
		var url = URL.createObjectURL(Element1.files[0]); 
		imgs1.style.display = 'block';
		imgs1.src = url; 

	}); 

	$("#addmodal").on("hidden.bs.modal", function () {
		
		$('#addmodal').modal('hide');
		// alert('hidden');
	});
	

	$("#editmodal").on("hidden.bs.modal", function () {
		
		$('#editmodal').modal('hide');
		// alert('hidden');
	});

	$(document).ready(function () {      
		dTable = $j('#table1').DataTable({
			'responsive': true,
            "ordering": false,	
			"columns": [
				{ "width": "20%", responsivePriority: 1 },
				{ "width": "40%", responsivePriority: 3, targets: -1 },
				{ "width": "12%", responsivePriority: 2 },
				{ "width": "12%" },
				{ "width": "25%" },
			]
		});

		cek_mail();
      	get_data();
		
    });

	$("#fl-kategori").change(function (e) { 
      	e.preventDefault();
		get_data();
      
    });

	// get all data for table
	function get_data(){
		$(".dataTables_empty").text("Loading...");
		var ktgr = $("#fl-kategori").val();
		
		inputid = null;
		inputstart = null;

		if(ktgr == "default"){
			inputkategori = null;
		} else {			
			inputkategori = ktgr;
		}
		
		$.ajax({
			url: "<?php echo base_url() ?>index.php/get_all_video",
			type: 'POST',
			data: {data:inputkategori},
			success: function (json) {
				var response = JSON.parse(json);
				// console.log(response);
				
				dTable.clear().draw();
				if(response.length > 0 ){
					response.forEach((data)=>{
						var namavideo = data.nama_video;
						var srcvideo = data.source_video;
						var srcgambar = data.source_gambar;
						var viewvideo = data.jml_view;
						var likevideo = data.jml_like;
						no = data.id_video;   
						var inputdata = "'" + no + "', '" + namavideo + "'" ;

						var link = "<?php echo base_url() ?>" + "upload/videos/" +srcvideo;
						var linkimg = "<?php echo base_url() ?>" + "upload/thumbnail/" +srcgambar;

						if(inputkategori != '0') {
							dTable.row.add([
								namavideo,
								'<video id="getvideo'+ data.id_video +'" style="width: 100%; max-width: 100%;" controls src="'+ link +'" poster="'+ linkimg +'" preload="none"> </video>',
								viewvideo,
								likevideo,
								'<button class="btn btn-outline-info mt-10 mb-10" onclick=tampildata("'+ no +'")><i class="fa fa-edit"></i> Edit</button><br>'
								+ '<button class="btn btn-outline-success mt-10 mb-10" onclick="komentardata('+ inputdata +')" style="margin-top:10px;"><i class="fa fa-comment"></i> Komentar</button><br>'
								+ '<button class="btn btn-outline-danger mt-10 mb-10" onclick=hapusdata("'+ no +'") style="margin-top:10px;"><i class="fa fa-trash"></i> Delete</button>'
							
							]).draw(false);
						} else {
							if(data.id_kategori == '0'){
								dTable.row.add([
									namavideo,
									'<video id="getvideo'+ data.id_video +'" style="width: 100%; max-width: 100%;" controls src="'+ link +'" poster="'+ linkimg +'" preload="none"> </video>',
									viewvideo,
									likevideo,
									'<button class="btn btn-outline-info mt-10 mb-10" onclick=tampildata("'+ no +'")><i class="fa fa-edit"></i> Edit</button><br>'
									+ '<button class="btn btn-outline-success mt-10 mb-10" onclick="komentardata('+ inputdata +')" style="margin-top:10px;"><i class="fa fa-comment"></i> Komentar</button><br>'
									+ '<button class="btn btn-outline-danger mt-10 mb-10" onclick=hapusdata("'+ no +'") style="margin-top:10px;"><i class="fa fa-trash"></i> Delete</button>'
								
								]).draw(false);
							}
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

	function ambilId(file){
		return document.getElementById(file);
	}

	// update data 
	function insertdata(data) {
		var namavideo = '';
		var namavideo2 = '';

		var balikan = 'no';

		return $.ajax({
			url: "<?php echo base_url()?>index.php/coba/",
			type: 'POST',
			data: data,
			cache: false,
			processData: false,
			contentType: false,
			success: function (json) {
				// alert('Data Berhasil Diupdate!');
				// alert(json);
				// // console.log(json);
				// var temukan = json.indexOf('"') + 1;
				// namavideo = json.slice(temukan, json.length);
				// var temukan2 = namavideo.indexOf('"') + 1;
				// namavideo2 = namavideo.slice(0, temukan2);
				// console.log(json);

				// console.log(namavideo);
				// console.log(namavideo2);

				// balikan = 'yes';

				// localStorage.setItem("nama", namavideo2);

				// return balikan;
				
				// var response = JSON.parse(json);
				// alert(json.video_detail.full_path);
				// console.log(response);
				// console.log('hasil FILLEE : ', response  );
				// namavideo = response.video_detail.file_name;
				// alert(response.video_detail.file_name);
				// window.location = "<?php echo base_url() ?>index.php/dashboardadmin";
				

			},
			error: function () {
				console.log("gagal update");
				alert('Data gagal diinputkan!');
			}
		});
		
    }

	$(document).on('submit', '#modal_add', function (event) {
    	event.preventDefault();   
		var inputid = "none";
		var inputktgr = document.getElementById("kategori").value;
		var inputnama = document.getElementById("namavideo").value;
		status = '2';

		var myFile = $('#video').prop('files');
		// console.log('video : ', myFile.length);
		// console.log('nama :', inputnama);

		if(myFile.length == 0){
			e.preventDefault();
			alert("Silahkan Pilih File!")
			return;
		}

		const fileupload = $('#video').prop('files')[0];
		// console.log('FILE UPLOAD : ', fileupload);

		let formData = new FormData();
		formData.append('fileupload', fileupload);
		formData.append('nama_file', inputnama);
		formData.append('kategori_file', inputktgr);
		formData.append('id_file', inputid);
		formData.append('status',status);


		var video = document.getElementById('launch');
		var thecanvas = document.getElementById('thecanvas');

		// console.log(video);
		// console.log(thecanvas);

		// alert('status vid ' + status_thumbnail);
		// alert('mul');

		if(status_thumbnail == '0'){
			nama_thumbnail = nama_thumbnail + inputnama + '.png';
			formData.append('src_gambar', nama_thumbnail);

			draw( video, thecanvas, nama_thumbnail);

		} else {
			// formData.append('src_gambar', nama_thumbnail);
			// console.log(getthumb);
			if(getthumb.length != 0){
				save_image_choose(getthumb[0], getthumb[1], getthumb[2]);
				formData.append('src_gambar', nama_thumbnail);
			}
		}

		
		
		$.ajax({
			xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        $(".progress-bar").width(percentComplete + '%');
                        $(".progress-bar").html(percentComplete+'%');
                    }
                }, false);
                return xhr;
            },
			url: "<?php echo base_url()?>index.php/coba/",
			type: 'POST',
			timeout: 1800000,
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			beforeSend: function(){
				// console.log(formData);
                $(".progress-bar").width('0%');
                // $('#uploadStatus').html('<img src="loading.gif"/>');
            },
			success: function (json) {
				// alert(json);
				// console.log(json);
				alert('Data Berhasil Diupdate!');
				window.location = "<?php echo base_url() ?>index.php/dashboardadmin";

			},
			error: function () {
				$('#uploadStatus').html('<p style="color:#EA4335;">Upload file gagal, silakan coba lagi.</p>');
			}
		});

		// console.log('nama video , ' + localStorage.getItem("nama"));

		// e.preventDefault();

	});

	$(document).on('submit', '#modal_edit', function (event) {
    	event.preventDefault(); 

		var inputid = document.getElementById("id-video").value
		var inputktgr = document.getElementById("ed-kategori").value
		var inputnama = document.getElementById("ed-nama-video").value

		if(inputktgr == 'default'){
			alert('Silahkan pilih kategori!');
			return false;
		}
	
		if(status == "1"){ // ada update video
			var myFile = $('#ed-upload').prop('files');

			if(myFile.length == 0){
				alert("Silahkan Pilih File!")
				return;
			}

			const fileupload = $('#ed-upload').prop('files')[0];
			// console.log('FILE UPLOAD : ', fileupload);

			let formData = new FormData();
			formData.append('fileupload', fileupload);
			formData.append('nama_file', inputnama);
			formData.append('kategori_file', inputktgr);
			formData.append('id_file', inputid);
			formData.append('status',status);
			formData.append('status_gmbr',status_gmbr_send);
			
			var video = document.getElementById('launch1');
			var thecanvas = document.getElementById('thecanvas');

			if(status_gmbr_send == '1'){ // ada edit gambar 
				if(status_thumbnail == '0'){ // gambar dr video
					nama_thumbnail = nama_thumbnail + inputnama + '.png';
					formData.append('src_gambar', nama_thumbnail);

					draw( video, thecanvas, nama_thumbnail);

				} else { // gambar dr fitur thumbnail
				// console.log(getthumb);
					if(getthumb.length != 0){
						save_image_choose(getthumb[0], getthumb[1], getthumb[2]);
						formData.append('src_gambar', nama_thumbnail);
					}
				}
			} else {
				formData.append('src_gambar', '');
			}

			// var hsl = insertdata(formData);

			$.ajax({
				xhr: function() {
					var xhr = new window.XMLHttpRequest();
					xhr.upload.addEventListener("progress", function(evt) {
						if (evt.lengthComputable) {
							var percentComplete = ((evt.loaded / evt.total) * 100);
							$(".progress-bar").width(percentComplete + '%');
							$(".progress-bar").html(percentComplete+'%');
						}
					}, false);
					return xhr;
				},
				url: "<?php echo base_url()?>index.php/coba/",
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){
					// console.log(formData);
					$(".progress-bar").width('0%');
				},
				success: function (json) {
					// alert(json);
					// console.log(json);									
					alert('Data Berhasil Diupdate!');
					window.location = "<?php echo base_url() ?>index.php/dashboardadmin";

				},
				error: function () {
					console.log("gagal update");
					alert('Data gagal diinputkan!');
				}
			});

		} else {
			let formData = new FormData();
			formData.append('nama_file', inputnama);
			formData.append('kategori_file', inputktgr);
			formData.append('id_file', inputid);
			formData.append('status',status);
			formData.append('status_gmbr',status_gmbr_send);
			
			var video = document.getElementById('launch1');
			var thecanvas = document.getElementById('thecanvas');

			if(status_gmbr_send == '1'){ // ada edit gambar 
				if(status_thumbnail == '0'){
					nama_thumbnail = nama_thumbnail + inputnama + '.png';
					formData.append('src_gambar', nama_thumbnail);

					draw( video, thecanvas, nama_thumbnail);

				} else {
					// console.log(getthumb);
					if(getthumb.length != 0){
						save_image_choose(getthumb[0], getthumb[1], getthumb[2]);
						formData.append('src_gambar', nama_thumbnail);
					}
				}
			} else {
				formData.append('src_gambar', '');
			}

			insertdata(formData);
			
			alert('Data Berhasil Diupdate!');
			window.location = "<?php echo base_url() ?>index.php/dashboardadmin";

		}



	});

	// $('#hpsvideo').click(function editdata() {
	// 	document.getElementById("divupload").style.display = "block";
	// 	document.getElementById("divimage").style.display = "none";
	// 	status = '1';

	// });

	
	$('#hpsimg').click(function editdata() {
		document.getElementById("divupload2").style.display = "block";
		document.getElementById("divimage2").style.display = "none";
		status_gmbr = '1';

	});


	function draw( video, thecanvas, nama_thumbnail){ // untuk ubah ngambil gambar dr video
		// alert('draw');
		var context = thecanvas.getContext('2d');

		context.drawImage( video, 0, 0, video.videoWidth, video.videoHeight);
		var dataURL = thecanvas.toDataURL();
		var name = nama_thumbnail;
		// alert('jadiii  ' + dataURL);

		var temukan = dataURL.indexOf('4') + 2;
		var inputbase = dataURL.slice(0, temukan);

		// console.log(inputbase);

		$.ajax({
			url: "<?php echo base_url() ?>index.php/convert_base",
			type: 'POST',
			data: {img:dataURL, nama:name, base:inputbase},
			success: function (json) {
				// var response = JSON.parse(json);
				// console.log(json);
			
			},
			error: function (xhr, status, error) {
			alert('Terdapat Kesalahan Pada Server...');
			$("#submit").prop("disabled", false);
			}
		});

	}

	
	function coba_limit(){ //testing
		inputid = null;
		inputkategori = null;
		inputstart = '1';

		$.ajax({
			url: "<?php echo base_url() ?>index.php/get_all_video_limit",
			type: 'POST',
			data: {id:inputid, kategori:inputkategori, start:inputstart},
			success: function (json) {
				var response = JSON.parse(json);
				// console.log(response);
			
			},
			error: function (xhr, status, error) {
			alert('Terdapat Kesalahan Pada Server...');
			$("#submit").prop("disabled", false);
			}
		});

	}

	// get data one id
	function tampildata(id) { //detail video		
		inputid = id;
		inputkategori = null;
		inputstart = null;

		// console.log(id);
		$.ajax({
			url: "<?php echo base_url()?>index.php/get_video_by_id",
			type: 'POST',
			data: {id:inputid},
			success: function (response) {
				var response = JSON.parse(response);
				response.forEach((data)=>{
					var inputidvideo = data.id_video
					var kategori = data.id_kategori;
					var namavideo = data.nama_video;
					status = '0';

					if(kategori == 0){
						kategori = 'default';
					}

					document.getElementById("divupload").style.display = "none";
					document.getElementById("divimage").style.display = "block";
					
					document.getElementById("divupload2").style.display = "none";
					document.getElementById("divimage2").style.display = "block";
									
					// var idvideo = "getvideo" + inputidvideo;
					// var v = document.getElementById(idvideo);
					// var a = "#"+idvideo
					
					// var video = $(a).get(0);
					// var canvas = document.createElement("canvas");
					// canvas.width = video.videoWidth ;
					// canvas.height = video.videoHeight;
					// canvas.getContext('2d')
					// 	.drawImage(video, 0, 0, canvas.width, canvas.height);
			
					// var img = document.createElement("img");
					// img.src = canvas.toDataURL();
					// hasil = canvas.toDataURL('image/png');

					var linked = "<?php echo base_url() ?>" + "upload/thumbnail/" +data.source_gambar;
					document.getElementById("edtimg").src = linked;

					$('#hpsvideo').click(function editdata() {
						document.getElementById("divupload").style.display = "block";
						document.getElementById("divimage").style.display = "none";
						status = '1';

					});

					$('#editmodal').modal();
					$("#id-video").val(data.id_video);
					$("#ed-kategori").val(kategori);
					$('#ed-nama-video').val(namavideo);				
				})                
			},
			error: function () {
				console.log("gagal update");
			}
		});          
    }

	// simpan id utk lihat komentar
	function komentardata(id, nama){		
		localStorage.setItem("name_video", nama);

		$.ajax({
			url: "<?php echo base_url() ?>index.php/cekidkoment",
			type: 'POST',
			data: {id:id},
			success: function (response) {
				// alert('Data api! ' + response);
				window.location = "<?php echo base_url() ?>index.php/komentarvideo";
				
			},
			error: function () {
				console.log("error");
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
                beforeSend: function(){
                    $("#submit").prop("disabled", true);
                    // $(".progress-bar").width('0%');
                    document.getElementById("overlay").style.display = "block";
                },
				success: function (response) {
					document.getElementById("overlay").style.display = "none";
					
					$.ajax({
						url: "https://adminfirmanhidup.cmcsurabaya.org/api_alkitab/aksi.php?act=delete_all_in_video",
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

				},
				error: function () {
					// console.log("gagal menghapus");
					// alert('Data gagal Dihapus!');
				}
			});	
		}
    }


	// cek jml permintaan doa baru
	function cek_mail(){
	// 	var start = 0;
	// 	var email = '';

	// 	$.ajax({
	// 		url: "https://adminfirmanhidup.cmcsurabaya.org/api_alkitab/aksi.php?act=get_all_video_doa_admin",
	// 		type: 'POST',
	// 		data: {start:start, email:email},
	// 		success: function (json) {
	// 			var response = JSON.parse(json);
	// 			var jml = 0;
	// 			// console.log(response);

	// 			response.forEach((data)=>{
	// 				var status = data.status_reply;

	// 				if(status == '0'){
	// 					jml = jml + 1;
	// 				}							
	// 			})

	// 			if(jml != 0){
	// 				document.getElementById("item_notif").innerHTML = '<i class="fas fa-file mr-2"></i> '+ jml +' Permintaan Doa Baru';
	// 				document.getElementById("title_item").innerHTML = '<i class="fas fa-bell fa-fw"></i><span class="badge badge-danger badge-counter">'+ jml +'</span>';
	// 				document.getElementById("item_notif").style.display = "block"; 
	// 			} else {
	// 				document.getElementById("item_none").style.display = "block"; 				
	// 				document.getElementById("title_item").innerHTML = '<i class="fas fa-bell fa-fw"></i><span class="badge badge-danger badge-counter"></span>';
	// 			}
				
	// 		},
	// 		error: function (xhr, status, error) {
	// 			alert('Terdapat Kesalahan Pada Server...');
	// 		}
	// 	});
	}


	//untuk encode file foto input
	function encodeImageFileAsURL() {

		status_thumbnail = '1';

		if(status_gmbr == '1'){
			var filesSelected = document.getElementById("inputFileToLoad1").files;

		} else {
			var filesSelected = document.getElementById("inputFileToLoad").files;
		}

		status_gmbr_send = '1';

		if (filesSelected.length > 0) {
			var fileToLoad = filesSelected[0];
			var fileReader = new FileReader();
			nama_thumbnail = nama_thumbnail + fileToLoad.name;
			// console.log(fileToLoad.name);

			fileReader.onload = function(fileLoadedEvent) {
				var srcData = fileLoadedEvent.target.result; // <--- data: base64
				var newImage = document.createElement('img');
				newImage.src = srcData;
				newImage.width = '500';
				
				document.getElementById("imgTest").innerHTML = newImage.outerHTML;

				// alert("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
				// console.log("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
				
				var temukan = newImage.outerHTML.indexOf('4') + 2;
				var inputbase = newImage.outerHTML.slice(10, temukan);
				var name = nama_thumbnail;

								
				getthumb[0] = srcData;
				getthumb[1] = name;
				getthumb[2] = inputbase;

				// console.log(getthumb);
				// alert('k ' + getthumb);

				//harus dipindah ajaxnya
				// $.ajax({
				// 	url: "<?php echo base_url() ?>index.php/convert_base",
				// 	type: 'POST',
				// 	data: {img: srcData, nama:name, base:inputbase},
				// 	success: function (json) {
				// 		// var response = JSON.parse(json);
				// 		// console.log(json);
					
				// 	},
				// 	error: function (xhr, status, error) {
				// 		alert('Terdapat Kesalahan Pada Server...');
				// 	}
				// });
			}
			fileReader.readAsDataURL(fileToLoad);
		}
	}


	function save_image_choose(a,b,c){
		$.ajax({
			url: "<?php echo base_url() ?>index.php/convert_base",
			type: 'POST',
			data: {img: a, nama:b, base:c},
			success: function (json) {
				// var response = JSON.parse(json);
				// console.log(json);
			
			},
			error: function (xhr, status, error) {
				alert('Terdapat Kesalahan Pada Server...');
			}
		});
	}

</script>

</html>
