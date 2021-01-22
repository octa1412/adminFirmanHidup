<!DOCTYPE html>
<html lang="en">

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

			<!-- <hr class="sidebar-divider">
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url("index.php/replyvideodetail");?>">
				<i class="fas fa-fw fa-folder"></i>
				<span>Reply Video Ruang Doa</span></a>
			</li> -->

			<!-- <hr class="sidebar-divider">
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url("index.php/logoutadmin");?>">
				<i class="fas fa-fw fa-table"></i>
				<span>Sign Out</span></a>
			</li> -->

			<hr class="sidebar-divider d-none d-md-block">
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
							<h3 class="m-0 font-weight-bold text-primary">Kategori Video</h3>
						</div>

						<div class="card-body">                           
                            <div class="mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <form>
                                                    <div class="form-group">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            <label for="nama_video" class="col-form-label">Nama Kategori</label>
                                                        </div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <input type="text" class="form-control" id="namakategori" name="namakategori" placeholder="Nama Kategori..." required>
                                                        </div>
                                                    </div>  

													<div class="form-group">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
															<label for="foto_video" class="col-form-label"><b>Foto Kategori</b></label><br>
															<span style="color:black;">Upload size : 512x512, Upload max : 1MB</span><br>
                                                        </div>
														<input id="inputFileToLoad" type="file" accept="image/jpeg,image/png" onchange="encodeImageFileAsURL();" style="padding-top:5px;" max-file-size="512"/>
														<div id="imgTest" style="padding-top:15px;"></div>
													</div>               

													<div class="form-group">
														<button type="button" class="btn btn-primary" id="addkategori" style="float:right;">Tambah</button>
														
													</div>                               
                                                
                                            </div>
                                            <!-- <div class="col-auto">
                                                <button type="button" class="btn btn-primary" id="addkategori">Tambah</button>
                                            </div> -->
                                                </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

							<div>
								<table id="table1" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>Nama Kategori</th>
											<th>Foto Kategori</th>
											<th>Detail</th>
										</tr>
									</thead>
									
									<tbody id="datatable">
                      
					  				</tbody>
								</table>
							</div>
						</div>
					</div>
                    <button class="btn btn-info" onclick="window.location.href='<?php echo base_url() ?>index.php/dashboardadmin'">Kembali</button>
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
						<div class="form-group" id="divimage_1" style="display:block">
							<label> Foto Kategori </label><br>
							<img id="tampilan_foto_1" src="" onerror="this.src='<?php echo base_url() ?>upload/image_not_found.jpg';" width="auto" height="200"><br><br>
							<button type="button" class="btn btn-outline-info"><a href="#" id="download_file_1" download>Download File</a></button>
							<button type="button" class="btn btn-outline-secondary" id="hpsdokumen1">Ganti File</button>
						</div>

						<div class="form-group" id="divupload_1" style="display:none">
							<label> Upload Foto </label><br>
							<span style="color:black;">Upload size : 512x512, Upload max : 1MB</span><br>
							<input id="inputFileToLoad1" type="file" accept="image/jpeg,image/png" onchange="readURL(this);" style="padding-top:5px;" max-file-size="512"/>
							<div id="imgTest1" style="padding-top:15px;"></div>
							<img id="preview_gambar" src="">
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

	<div id="overlay">
        <div class="loader"></div>
        <div id="text">Sedang Mengupload...</div>
    </div>


</body>

<?php $this->load->view("function_cookie");?>

<script>
	getLoginCookie('adminCookie', function(response){
		$("#currentadmin").html(response);
	});

    var id = '';
	var status_file_1 = '0'; 
	var alter = "'<?php echo base_url() ?>" + "upload/image_not_found.jpg'";

	$.ajax({
        url: "<?php echo base_url() ?>index.php/get_all_kategori",
        type: 'POST',
        data: {id: id},
        success: function (json) {
            var response = JSON.parse(json);
            dTable.clear().draw();
            if(response.length > 0 ){
                response.forEach((data)=>{
                    var kategorivideo = data.nama_kategori;
                    var no = data.id_kategori;   
					var foto = data.src_gambar;
          			var link = "<?php echo base_url() ?>" + "upload/foto_kategori/" +foto;

					if(no != 1){
						dTable.row.add([
							kategorivideo,
							'<img src="'+ link +'" onerror="this.src='+ alter +';" width="250" height="auto">',
							'<button class="btn btn-outline-success mt-10 mb-10" onclick=tampildata("'+ no +'") style="margin-top:5px;"><i class="fa fa-edit"></i> Edit</button>&nbsp;&nbsp;'
						+ '<button class="btn btn-outline-danger mt-10 mb-10" onclick=hapusdata("'+ no +'") style="margin-top:5px;"><i class="fa fa-trash"></i> Delete</button>'
						
						]).draw(false);
					}
                })				
            } else{
                $(".dataTables_empty").text("Tidak ada data yang ditampilkan.")
            }

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

		// cek_mail();

    });

    // get data one id
	function tampildata(id) {
		// console.log(id);

		$.ajax({
			url: "<?php echo base_url()?>index.php/get_all_kategori",
			type: 'POST',
			data: {id: id},
			success: function (response) {
				var response = JSON.parse(response);
				response.forEach((data)=>{
					var idkategori = data.id_kategori;
					var namakategori = data.nama_kategori;					
					var atr1 = "<?php echo base_url() ?>" + "upload/foto_kategori/" + data.src_gambar;
					var file_before_1 = data.src_gambar;
					
					document.getElementById("divupload_1").style.display = "none";
					document.getElementById("divimage_1").style.display = "block"; 
					document.getElementById("tampilan_foto_1").src = atr1;
					$("#download_file_1").attr("href", atr1);
					$("#download_file_1").attr("download", 'Foto Kategori ' + namakategori);

					$('#editmodal').modal();
					$("#id-kategori").val(idkategori);
					$('#ed-nama-kategori').val(namakategori);
					$('#updatedata').click(function editdata() {						
						var inputid = document.getElementById("id-kategori").value
						var inputnama = document.getElementById("ed-nama-kategori").value
												
						let formData = new FormData();
						formData.append('id', inputid);
						formData.append('nama', inputnama);
						formData.append('status_jenis_1', status_file_1);
    					formData.append('file_before_1', file_before_1);

						// console.log(status_file_1);

						if(status_file_1 == '1'){
							const fileupload_1 = $('#inputFileToLoad1').prop('files')[0];
							formData.append('file_1', fileupload_1);
						}
                        
                        $.ajax({
                            url: "<?php echo base_url()?>index.php/update_kategori/",
                            type: 'POST',
							timeout: 1800000,
							data: formData,
							cache: false,
							processData: false,
							contentType: false,
                            success: function (json) {
								// console.log(json);
                                alert('Data Berhasil Diupdate!');                               
                                window.location = "<?php echo base_url() ?>index.php/kategoriadmin";

                            },
                            error: function () {
                                console.log("gagal update");
                                alert('Data gagal diinputkan!');
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
		var tanya = confirm("hapus kategori? ");

		if(tanya){
			$.ajax({
				url: "<?php echo base_url() ?>index.php/delete_kategori",
				type: 'POST',
				data: {id: id},
				success: function (response) {
					// console.log(response);
					alert('Data Berhasil Dihapus!');
					window.location = "<?php echo base_url() ?>index.php/kategoriadmin";
				},
				error: function () {
					console.log("gagal menghapus");
					alert('Data gagal Dihapus!');

				}
			});

			
		}
    }
    
    $('#addkategori').click(function editdata() {
        var inputnama = document.getElementById("namakategori").value		
		const fileupload_1 = $('#inputFileToLoad').prop('files')[0];		
		let formData = new FormData();
   		formData.append('file_1', fileupload_1);
   		formData.append('nama', inputnama);

        // alert(inputnama);

        if(inputnama != ''){
            $.ajax({
                url: "<?php echo base_url()?>index.php/insert_kategori/",
                type: 'POST',
				timeout: 1800000,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
                success: function (json) {
                    alert('Data Berhasil Ditambahkan!');                   
                    window.location = "<?php echo base_url() ?>index.php/kategoriadmin";

                },
                error: function () {
                    console.log("gagal update");
                    alert('Data gagal diinputkan!');
                }
            });	
            
        } 
    });


	function encodeImageFileAsURL() {
		var status_allow = '';
		var filesSelected = document.getElementById("inputFileToLoad").files;
		var test = filesSelected && filesSelected[0];
		var img = new Image();
		img.src = window.URL.createObjectURL(test);
		var fileToLoad = filesSelected[0];
		var fileReader = new FileReader();

		
		fileReader.onload = function(fileLoadedEvent) {

			img.onload = function() {
				var width = img.naturalWidth,
				height = img.naturalHeight;
				window.URL.revokeObjectURL(img.src);
				
				// console.log('st ' + status_allow);

				if(status_allow == '1'){
					if (width <= 512 && height <= 512) {
						status_allow = status_allow + '1';						
						var srcData = fileLoadedEvent.target.result; // <--- data: base64
						var newImage = document.createElement('img');
						newImage.src = srcData;
						newImage.width = '200';
						// console.log(newImage.outerHTML);
						
						document.getElementById("imgTest").innerHTML = newImage.outerHTML;
						
					} else {
						alert('Size lebih dari 512x512!');			
						document.getElementById("inputFileToLoad").value = '';
						var newImage = document.createElement('img');
						newImage.src = '';
						newImage.width = '200';
						// console.log(newImage.outerHTML);
						
						document.getElementById("imgTest").innerHTML = newImage.outerHTML;
						return false;

					}
				}
			};

			// console.log(filesSelected[0]);
			if(filesSelected[0].size < 262144){
				status_allow = '1';
			} else {			
				status_allow = '0';
				alert('Data terlalu besar!');			
				document.getElementById("inputFileToLoad").value = '';
				var newImage = document.createElement('img');
				newImage.src = '';
				newImage.width = '200';
				// console.log(newImage.outerHTML);
				
				document.getElementById("imgTest").innerHTML = newImage.outerHTML;
				return false;
			}
		}	
		
		fileReader.readAsDataURL(fileToLoad);
	}
	
	function readURL(input) { // Mulai membaca inputan gambar
		var status_allow = '';

		if (input.files && input.files[0]) {
			var reader = new FileReader();
			var test = input.files && input.files[0];
			var img = new Image();
			img.src = window.URL.createObjectURL(test);

			reader.onload = function (e) { 
				status_file_1 = '1';

				img.onload = function() {
					var width = img.naturalWidth,
					height = img.naturalHeight;
					window.URL.revokeObjectURL(img.src);					
					// console.log('st ' + status_allow);

					if(status_allow == '1'){
						if (width <= 512 && height <= 512) {
							status_allow = status_allow + '1';
							$('#preview_gambar') 
							.attr('src', e.target.result)
							.width(150); 
							
						} else {
							alert('Size lebih dari 512x512!');			
							input.value = '';
							$('#preview_gambar') 
							.attr('src', '')
							.width(150); 
							return false;
						}
					}
				};
				
				// console.log('size ' + input.files[0].size);
				// console.log(input.files[0]);

				if(input.files[0].size > 262144){
					status_allow = status_allow + '0';
					alert('Data terlalu besar!');			
					input.value = '';
					$('#preview_gambar') 
					.attr('src', '')
					.width(150); 
					return false;

				} else {
					status_allow = status_allow + '1';
				}		
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	function ambildata(){
		const fileupload_1 = $('#inputFileToLoad').prop('files')[0];
		// console.log('aa');
		// console.log(fileupload_1);
	}


	function cek_mail(){
		// var start = 0;
		// var email = '';

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

	
	$('#hpsdokumen1').click(function editdata() {
		document.getElementById("divupload_1").style.display = "block";
		document.getElementById("divimage_1").style.display = "none";
	});
    
	


</script>

</html>
