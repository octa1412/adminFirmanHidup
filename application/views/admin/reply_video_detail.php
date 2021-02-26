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
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url("index.php/dashboardadmin");?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Manajemen Video</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
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
							<h3 class="m-0 font-weight-bold text-primary">Reply Video Ruang Doa</h3>
							<!-- <button onclick="test_email('octa.riadi1412@gmail.com')">test email</button> -->
						</div>

						<div class="card-body">
							<div>
								<table id="table1" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>Video</th>
											<th>Nama Email</th>
											<th>Status Video</th>
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



	<!-- modal reply -->
	<div class="modal fade" id="replymodal" tabindex="-1" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              	<div class="modal-header">
					<h5 class="modal-title w-100 text-center" id="editTitle"><b>Reply Video</b></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

              	<div class="modal-body">
                	<form id="modal_reply">
						<div class="form-group">
							<input type="hidden" class="form-control" id="id_video_reply" value="" readonly>
						</div>
						
						<!-- <div class="form-group">
							<label for="ed-nama-video" class="col-form-label">Nama Video</label>
							<input type="text" class="form-control" id="ed-nama-video" required>
						</div> -->

						<div class="form-group">
							<label for="dokumen_reply">Upload Video</label><br>
							<input type="file" accept="video/*" id="dokumen_reply" name="dokumen_reply">
						</div>

						<div>
							<video width="100%" height="300px" id="launch"></video>
							<!-- <img src="<?php echo base_url() ?>dist/img/defaults.jpg" width="auto;" height="100px;">  -->
						</div>

						<div class="progress">
							<div class="progress-bar"></div>
						</div>
						
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Reply</button>
				</div>		
					</form>		
            </div>
		</div>
	</div> 

	<!-- modal detail -->
	<div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              	<div class="modal-header">
					<h5 class="modal-title w-100 text-center" id="editTitle"><b>Detail Reply Video</b></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

              	<div class="modal-body">
                	<form>
						<div class="form-group">
							<input type="hidden" class="form-control" id="id_video_detail" value="" readonly>
						</div>
						
						<!-- <div class="form-group">
							<label for="ed-nama-video" class="col-form-label">Nama Video</label>
							<input type="text" class="form-control" id="ed-nama-video" required>
						</div> -->

						<div class="form-group">
							<label for="ed-upload">Video Terikirim</label><br>
							<video id="videoreply" width="100%" height="300px" controls src="#"></video>
						</div>
											
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>	
					</form>			
            </div>
		</div>
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

	var email = '';
	var start = 0;
	var data_email = [];

	$(document).ready(function () {      
		dTable = $j('#table1').DataTable({
			'responsive': true,
            "ordering": false,
			"columns": [
				{ "width": "40%", responsivePriority: 3, targets: -1 },
				{ "width": "20%", responsivePriority: 1 },
				{ "width": "20%", responsivePriority: 2 },
				{ "width": "20%" },
			]
		});

		$(".dataTables_empty").text("Loading...");
		// cek_mail();
		   
		$.ajax({
			url: "https://adminfirmanhidup.cmcsurabaya.org/api_alkitab/aksi.php?act=get_all_video_doa_admin",
			type: 'POST',
			data: {start:start, email:email},
			success: function (json) {
				var response = JSON.parse(json);
				var jml = 0;
				// console.log(response);

				if(response != null){
					response.forEach((data)=>{

						var namauser = data.email;
						var status = data.status_reply;
						var srcvideo = data.video;
						no = data.id_ruang_doa;   

						if(status == '0'){
							jml = jml + 1;
						}	

						var link = "<?php echo base_url() ?>" + "upload/ruang_doa/" +srcvideo;
						
						if(status == '0'){
							data_email.push({id:no, email:namauser});
							
							dTable.row.add([
							'<video id="getvideo'+ no +'" style="width: 100%; max-width: 100%;" controls src="'+ link +'"> </video>',
							namauser,
							'<p style="color:orange;"><i class="fa fa-clock"></i>&nbsp;Belum dibalas</p>',
							'<button class="btn btn-outline-success mt-10 mb-10" onclick=tampildata("'+ no +'")><i class="fa fa-edit"></i> Reply</button><br>'
							+ '<button class="btn btn-outline-danger mt-10 mb-10" onclick=hapusdata("'+ no +'") style="margin-top:10px;"><i class="fa fa-trash"></i> Delete</button>'
							]).draw(false);

						} else {
							dTable.row.add([
							'<video id="getvideo'+ no +'" style="width: 100%; max-width: 100%;" controls src="'+ link +'"> </video>',
							namauser,
							'<p style="color:green;"><i class="fa fa-check-circle"></i>&nbsp;Sudah dibalas</p>',
							'<button class="btn btn-outline-info mt-10 mb-10" onclick=detaildata("'+ no +'")><i class="fa fa-tasks"></i> Detail</button><br>'
							+ '<button class="btn btn-outline-danger mt-10 mb-10" onclick=hapusdata("'+ no +'") style="margin-top:10px;"><i class="fa fa-trash"></i> Delete</button>'
							]).draw(false);
						}
						
					})
				} else {
					$(".dataTables_empty").text("Tidak ada data yang ditampilkan.");
				}

				// if(jml != 0){
				// 	document.getElementById("item_notif").innerHTML = '<i class="fas fa-file mr-2"></i> '+ jml +' Permintaan Doa Baru';
				// 	document.getElementById("title_item").innerHTML = '<i class="fas fa-bell fa-fw"></i><span class="badge badge-danger badge-counter">'+ jml +'</span>';
				// 	document.getElementById("item_notif").style.display = "block"; 
				// } else {
				// 	document.getElementById("item_none").style.display = "block"; 
				// 	document.getElementById("title_item").innerHTML = '<i class="fas fa-bell fa-fw"></i><span class="badge badge-danger badge-counter"></span>';
				// }


			},
			error: function (xhr, status, error) {
			alert('Terdapat Kesalahan Pada Server...');
			$("#submit").prop("disabled", false);
			}
		});

	});

	var Element = document.getElementById('dokumen_reply'); 
    var imgs = document.getElementById('launch'); 
    Element.addEventListener('change', function() { 
		var url = URL.createObjectURL(Element.files[0]); 
		imgs.src = url; 
		// console.log(url); 
		// console.log('aaaa ' ,imgs);

	}); 

	function tampildata(id){
		document.getElementById("dokumen_reply").value = "";
		document.getElementById('launch').src = "";
		$('#replymodal').modal('show');		
		$("#id_video_reply").val(id);	

	}

	function detaildata(id){
		$('#detailmodal').modal('show');		
		$("#id_video_detail").val(id);	

		$.ajax({
			url: "<?php echo base_url()?>index.php/get_reply",
			type: 'POST',
			data: {id:id},
			success: function (json) {
				var response = JSON.parse(json);
				// console.log(response);			
				var srcvideo = response[0].video;
				// console.log(srcvideo);
				var link = "<?php echo base_url() ?>" + "upload/reply_ruang_doa/" +srcvideo;
				
				document.getElementById("videoreply").src = link;				
				
			},
			error: function () {
				console.log("gagal update");
				alert('Data gagal Dikirim!');
			}
		});
	}


	$(document).on('submit', '#modal_reply', function (event) {
		event.preventDefault();

		// ajax file
		var inputid = document.getElementById("id_video_reply").value;
		var file_1 = $('#dokumen_reply').prop('files');
		var status = '1';
		var email_reply = '';

		if(file_1.length == 0){
			alert("Silahkan Pilih File!")
			return false;
		}
		
		const fileupload_1 = $('#dokumen_reply').prop('files')[0];

		let formData = new FormData();
		formData.append('id', inputid);
		formData.append('file_1', fileupload_1);

		for(var i=0; i<data_email.length; i++){
			if(data_email[i].id == inputid){
				email_reply = data_email[i].email;
			}
		}

		// console.log(email_reply);
			
		$.ajax({
			url: "https://adminfirmanhidup.cmcsurabaya.org/api_alkitab/aksi.php?act=update_status_reply",
			type: 'POST',
			data: {id:inputid, status:status},
			success: function (response) {
				// alert('Data Berhasil Dihapus!');
				email_send(email_reply);

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
					url: "<?php echo base_url()?>index.php/insert_reply_doa",
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
						alert("Berhasil dikirim");
						window.location = "<?php echo base_url() ?>index.php/replyvideodetail";            
					},
					error: function (xhr, status, error) {
						alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
						$("#submit").prop("disabled", false);
					}
				});

			},
			error: function () {
				console.log("gagal update");
				alert('Data gagal Dikirim!');
			}
		});
	});


	function hapusdata(id) {
		var tanya = confirm("hapus permintaan?");

		if(tanya){

			$.ajax({
				url: "https://adminfirmanhidup.cmcsurabaya.org/api_alkitab/aksi.php?act=delete_video_doa",
				type: 'POST',
				data: {id:id},
				success: function (response) {
					// alert('Data Berhasil Dihapus!');

					$.ajax({
						url: "<?php echo base_url() ?>index.php/delete_video_ruang_doa",
						type: 'POST',
						data: {id: id},
						success: function (response) {
							alert('Data Berhasil Dihapus!');
							window.location = "<?php echo base_url() ?>index.php/replyvideodetail";
						},
						error: function () {
							console.log("gagal menghapus");
							alert('Data gagal Dihapus!');


						}
					});
				},
				error: function () {
					console.log("gagal hapus");
					alert('Data gagal Dikirim!');
				}
			});
			
		}
    }


	function cek_mail(){
		// $.ajax({
		// 	url: "https://adminfirmanhidup.cmcsurabaya.org/api_alkitab/aksi.php?act=get_all_video_doa_admin",
		// 	type: 'POST',
		// 	data: {start:start, email:email},
		// 	success: function (json) {
		// 		var response = JSON.parse(json);
		// 		// console.log(response);
		// 		var jml = 0;
		// 		response.forEach((data)=>{
		// 			var status = data.status_reply;

		// 			if(status == '0'){
		// 				jml = jml + 1;
		// 			}							
		// 		})

		// 		if(jml != 0){
		// 			document.getElementById("item_notif").innerHTML = '<i class="fas fa-file mr-2"></i> '+ jml +' Permintaan Doa Baru';
		// 			document.getElementById("title_item").innerHTML = '<i class="fas fa-bell fa-fw"></i><span class="badge badge-danger badge-counter">'+ jml +'</span>';
		// 			document.getElementById("item_notif").style.display = "block"; 
		// 		} else {
		// 			document.getElementById("item_none").style.display = "block"; 
		// 			document.getElementById("title_item").innerHTML = '<i class="fas fa-bell fa-fw"></i><span class="badge badge-danger badge-counter"></span>';
		// 		}

				
		// 	},
		// 	error: function (xhr, status, error) {
		// 	alert('Terdapat Kesalahan Pada Server...');
		// 	$("#submit").prop("disabled", false);
		// 	}
		// });

	}

	function email_send(email){

		$.ajax({
			url: "<?php echo base_url() ?>index.php/test_email",
			type: 'POST',
			data: {email:email},
			success: function (response) {
				// alert(response);
				// console.log(response);

			},
			error: function () {
				// console.log("gagal terkirim");
				// alert('Data gagal terkirim!');


			}
		});

	}

	$('#detailmodal').on('hidden.bs.modal', function (e) {
		document.getElementById("videoreply").pause();
	})

	
</script>

</html>
