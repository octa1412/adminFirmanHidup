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
				<a class="nav-link" href="<?=base_url("index.php/dashboardadmin");?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Manajemen Video</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url("index.php/replyvideodetail");?>">
				<i class="fas fa-fw fa-folder"></i>
				<span>Reply Video Ruang Doa</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">



			<!-- Nav Item - Tables -->
			<!-- <li class="nav-item">
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
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="title_item" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							</a>
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
								<a class="dropdown-header" href="<?=base_url("index.php/replyvideodetail");?>" id="item_notif" style="display:none">									
								</a>								
								<a class="dropdown-item text-center small text-gray-500" href="#" id="item_none" style="display:none">Tidak ada permintaan</a>
							</div>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
								<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
							</a>
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<!-- <a class="dropdown-item" href="#">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profile
								</a>
								<div class="dropdown-divider"></div> -->
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
							<div class="d-sm-flex align-items-center justify-content-between mb-4"> 
								<button class="btn btn-primary" data-toggle="modal" data-target="#addmodal">Tambah Video</button>
								<button class="btn btn-info" onclick="window.location.href='<?php echo base_url() ?>index.php/kategoriadmin'">Kategori</button>
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
					<form onsubmit="insertvideo(event)">
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
							<span>*Foto Video akan diambil secara acak dari video jika poin ini tidak diisi</span><br><br>
							<input id="inputFileToLoad" type="file" onchange="encodeImageFileAsURL();" />
							<div id="imgTest" width="auto" height="400"></div>
						</div>

						<div class="form-group">
							<label for="video">Upload Video</label><br>
							<input type="file" accept="video/*" id="video" name="video">
						</div>

						<div class="progress">
							<div class="progress-bar"></div>
						</div>
						<!-- <div id="uploadStatus"></div> -->

						<div>
							<video width="400" height="auto" id="launch"></video>
							<!-- <img src="<?php echo base_url() ?>dist/img/defaults.jpg" width="auto;" height="100px;">  -->
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
						
						<div class="form-group" id="divimage">	
							<label>Video</label><br>
							<img src="" id="edtimg" width="400px;" height="auto;"> <br><br>
							<button type="button" class="btn btn-secondary" id="hpsvideo">Ganti Video</button>
						</div>

					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="bataldata">Batal</button>
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

	var id = '';

	$.ajax({
        url: "<?php echo base_url() ?>index.php/get_all_kategori",
        type: 'POST',
		data: {id: id},
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

	var Element = document.getElementById('video'); 
    var imgs = document.getElementById('launch'); 
	
    Element.addEventListener('change', function() { 
		var url = URL.createObjectURL(Element.files[0]); 
		imgs.src = url; 
		console.log(Element);
		console.log(url); 
		console.log('aaaa ' ,imgs);

	}); 

	$(document).ready(function () {      
		dTable = $('#table1').DataTable({
			responsive: true,
            "ordering": false
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

						var link = "<?php echo base_url() ?>" + "upload/videos/" +srcvideo


						if(data.IdKategori != null) {
							dTable.row.add([
							'<video id="getvideo'+ data.IdVideo +'" width="400" controls src="'+ link +'" </video>',
							namavideo,
							kategorivideo,
								'<button class="btn btn-outline-success mt-10 mb-10" onclick=tampildata("'+ no +'")>Edit</button><br>'
							+ '<button class="btn btn-outline-danger mt-10 mb-10" onclick=hapusdata("'+ no +'") style="margin-top:10px;">Delete</button>'
							
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


	function insertvideo(e){
		var inputid = "none";
		var inputktgr = document.getElementById("kategori").value;
		var inputnama = document.getElementById("namavideo").value;
		var status = '2';

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
				alert('Data Berhasil Diupdate!');
				// alert(json);
				// console.log(json);
				var temukan = json.indexOf('"') + 1;
				var namavideo = json.slice(temukan, json.length);
				var temukan2 = namavideo.indexOf('"');
				var namavideo2 = namavideo.slice(0, temukan2);
				// console.log(json);

				// console.log(namavideo);
				// console.log(namavideo2);

				$.ajax({
					url: "https://cmcsurabaya.org/admintesting/api_alkitab/aksi.php?act=tambah_video",
					type: 'POST',
					data: {id_kategori:inputktgr, video:inputnama, source:namavideo2},
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
			},
			error: function () {
				$('#uploadStatus').html('<p style="color:#EA4335;">Upload file gagal, silakan coba lagi.</p>');
			}
		});

		// console.log('nama video , ' + localStorage.getItem("nama"));

		// alert('Data Berhasil Disimpan!');
		e.preventDefault();

	}



	// get data one id
	function tampildata(id) {
		// console.log(id);
		$.ajax({
			url: "<?php echo base_url()?>index.php/get_video_by_id",
			type: 'POST',
			data: {id: id},
			success: function (response) {
				var response = JSON.parse(response);
				response.forEach((data)=>{
					var inputidvideo = data.IdVideo
					var kategori = data.IdKategori;
					var namavideo = data.NamaVideo;
					var status = '0';

					document.getElementById("divupload").style.display = "none";
					document.getElementById("divimage").style.display = "block";
									
					var idvideo = "getvideo" + inputidvideo;
					var v = document.getElementById(idvideo);
					var a = "#"+idvideo
					
					var video = $(a).get(0);
					var canvas = document.createElement("canvas");
					canvas.width = video.videoWidth ;
					canvas.height = video.videoHeight;
					canvas.getContext('2d')
						.drawImage(video, 0, 0, canvas.width, canvas.height);
			
					var img = document.createElement("img");
					img.src = canvas.toDataURL();
					hasil = canvas.toDataURL('image/png');

					document.getElementById("edtimg").src = img.src;


					$('#hpsvideo').click(function editdata() {
						document.getElementById("divupload").style.display = "block";
						document.getElementById("divimage").style.display = "none";
						status = '1';

					});

					$('#editmodal').modal();
					$("#id-video").val(data.IdVideo);
					$("#ed-kategori").val(kategori);
					$('#ed-nama-video').val(namavideo);
					$('#updatedata').click(function editdata() {

						var inputid = document.getElementById("id-video").value
						var inputktgr = document.getElementById("ed-kategori").value
						var inputnama = document.getElementById("ed-nama-video").value

						if(status == "1"){
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
							
							// var hsl = insertdata(formData);

							$.ajax({
								url: "<?php echo base_url()?>index.php/coba/",
								type: 'POST',
								data: formData,
								cache: false,
								processData: false,
								contentType: false,
								success: function (json) {
									// alert('Data Berhasil Diupdate!');
									// alert(json);
									// console.log(json);
									var temukan = json.indexOf('"') ;
									var namavideo = json.slice(1, temukan-1);
									// console.log(namavideo);

									$.ajax({
										url: "https://cmcsurabaya.org/admintesting/api_alkitab/aksi.php?act=update_video",
										type: 'POST',
										data: {id_video:inputid, id_kategori:inputktgr, video:inputnama, source:namavideo},
										success: function (json) {
											// alert(json);                   
											// console.log(json);
											// console.log('api masuk');
											alert('Data Berhasil Diupdate!');
											window.location = "<?php echo base_url() ?>index.php/dashboardadmin";

										},
										error: function () {
											console.log("gagal update");
											alert('Data gagal diinputkan!');
										}
									});



								},
								error: function () {
									console.log("gagal update");
									alert('Data gagal diinputkan!');
								}
							});


							// alert('Data Berhasil Diupdate!');

						} else {
							let formData = new FormData();
							formData.append('nama_file', inputnama);
							formData.append('kategori_file', inputktgr);
							formData.append('id_file', inputid);
							formData.append('status',status);
							
							insertdata(formData);

							$.ajax({
								url: "https://cmcsurabaya.org/admintesting/api_alkitab/aksi.php?act=update_video_1",
								type: 'POST',
								data: {id_video:inputid, id_kategori:inputktgr, video:inputnama},
								success: function (json) {
									// alert(json);                   
									// console.log(json);
									// console.log('api masuk');
									alert('Data Berhasil Diupdate!');
									window.location = "<?php echo base_url() ?>index.php/dashboardadmin";

								},
								error: function () {
									console.log("gagal update");
									alert('Data gagal diinputkan!');
								}
							});
							// alert('Data Berhasil Diupdate!');
						}
						
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
				url: "https://cmcsurabaya.org/admintesting/api_alkitab/aksi.php?act=delete_video",
				type: 'POST',
				data: {id: id},
				success: function (response) {
					// alert('Data api Dihapus!');
					// window.location = "<?php echo base_url() ?>index.php/dashboardadmin";
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
				},
				error: function () {
					console.log("gagal menghapus");
					alert('Data gagal Dihapus!');


				}
			});
		}
    }

	function cek_mail(){
		var start = 0;
		var email = '';

		$.ajax({
			url: "https://cmcsurabaya.org/admintesting/api_alkitab/aksi.php?act=get_all_video_doa_admin",
			type: 'POST',
			data: {start:start, email:email},
			success: function (json) {
				var response = JSON.parse(json);
				// console.log(response);
				var jml = 0;
				response.forEach((data)=>{
					var status = data.status_reply;

					if(status == '0'){
						jml = jml + 1;
					}							
				})

				if(jml != 0){
					document.getElementById("item_notif").innerHTML = '<i class="fas fa-file mr-2"></i> '+ jml +' Permintaan Doa Baru';
					document.getElementById("title_item").innerHTML = '<i class="fas fa-bell fa-fw"></i><span class="badge badge-danger badge-counter">'+ jml +'</span>';
					document.getElementById("item_notif").style.display = "block"; 
				} else {
					document.getElementById("item_none").style.display = "block"; 				
					document.getElementById("title_item").innerHTML = '<i class="fas fa-bell fa-fw"></i><span class="badge badge-danger badge-counter"></span>';
				}

				
			},
			error: function (xhr, status, error) {
			alert('Terdapat Kesalahan Pada Server...');
			$("#submit").prop("disabled", false);
			}
		});

	}


	function encodeImageFileAsURL() {

		var filesSelected = document.getElementById("inputFileToLoad").files;
		if (filesSelected.length > 0) {
			var fileToLoad = filesSelected[0];

			var fileReader = new FileReader();

			fileReader.onload = function(fileLoadedEvent) {
				var srcData = fileLoadedEvent.target.result; // <--- data: base64

				var newImage = document.createElement('img');
				newImage.src = srcData;

				document.getElementById("imgTest").innerHTML = newImage.outerHTML;
				alert("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
				console.log("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
			}
			fileReader.readAsDataURL(fileToLoad);
		}
	}


</script>

</html>
