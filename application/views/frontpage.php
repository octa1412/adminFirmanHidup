<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>BEKKO</title>

	<!-- Custom fonts for this template -->
	<link href="<?=base_url("dist/vendor/fontawesome-free/css/all.min.css");?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?=base_url("dist/css/sb-admin-2.min.css");?>" rel="stylesheet">

	<!-- Custom styles for this page -->
	<link href="<?=base_url("dist/vendor/datatables/dataTables.bootstrap4.min.css");?>" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

</head>

<body>

	<div class="container-fluid">
		<form onsubmit="insertdata(event)">
			<div class="form-group">
				<label for="kategori" class="col-form-label">Kategori</label>
				<select class="custom-select" id="kategori" required>
					<option value="default">Kategori</option>   
				</select>
			</div>
		
			<div class="form-group">
				<label for="nama-video" class="col-form-label">Nama Video</label>
				<input type="text" class="form-control" id="nama-video" placeholder="Nama Video..." required>
			</div>      

			<div class="form-group">
				<label for="video">Upload Video</label><br>
				<input type="file" id="video" name="video" >
			</div>

			<div class="form-group">
				<!-- <video width="400" controls><source src="" type="video/webm"></video> -->
				<img src="" width="80px;" height="100px;"> 
			</div>

			<div class="form-group">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Tambah</button>
			</div>
		</form>
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


</body>

<script>

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


	function insertdata(e) {
		var inputktgr = document.getElementById("kategori").value
		var inputnama = document.getElementById("nama-video").value
		var inputvideo = document.getElementById("video").value
		
		if(inputktgr == "default"){
			e.preventDefault();
			alert("Silahkan Pilih Kategori!")
			return;
		}

		var data = new FormData(jQuery('form')[0]);

		$.ajax({
			url: "<?php echo base_url()?>index.php/coba/",
			type: 'POST',
			data: data,  
			contentType: false,  
			cache: false,  
			processData:false,  
			success: function (response) {
				alert(response);
				console.log(response);
			},
			error: function () {
				console.log("gagal update");
				alert('Data gagal diinputkan!');
			}
		});
		e.preventDefault();

    }


</script>

</html>
