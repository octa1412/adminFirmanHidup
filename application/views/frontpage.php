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
				<select class="custom-select" id="kategori" name="kategori" required>
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
				<video  id="videoplay" controls="controls">
					<source src="http://localhost/bekkotemplate/upload/videos/2010302020_09_10_11_37_38.mp4">
				</video>
				<img src="" width="80px;" height="100px;"> 
			</div>

			<div class="form-group">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Tambah</button>
			</div>
		</form>

		<div id="videohidden" style="display: 'none';">
			<video  id="videoplayhidden" controls="controls"></video>
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


</body>

<script>
document.getElementById("videohidden").style.display = "none";

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

		const fileupload = $('#video').prop('files')[0];
		var nama_file = $('#nama-video').val();
		var kategori_file = $('#kategori').val();

		console.log('FILE UPLOAD : ', fileupload);

		let formData = new FormData();
		formData.append('fileupload', fileupload);
		formData.append('nama_file', nama_file);
		formData.append('kategori_file', kategori_file);
		


		$.ajax({
			url: "<?php echo base_url()?>index.php/coba/",
			type: 'POST',
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			success: function (json) {
				// alert(json);
				var response = JSON.parse(json);
				alert(response.video_detail.full_path);
				console.log(response);
				console.log('hasil  : ', response.video_detail.file_name  );

				var a = "http://localhost/bekkotemplate/upload/videos/2010302020_09_10_11_34_54.mp4" ;

				document.getElementById("videoplayhidden").src = a;

				var v = document.getElementById("videoplayhidden");
				v.addEventListener( "loadedmetadata", function (e) {
					var width = this.videoWidth;
					var height = this.videoHeight;

						console.log('hhhhh : ', width);
						console.log('hhhhh : ', height);
						video = $("#videoplayhidden").get(0);


						var canvas = document.createElement("canvas");
						canvas.width = width ;
						canvas.height = height;

						//generate thumbnail URL data
						var context = canvas.getContext('2d');
						context.drawImage(video, 0, 0, canvas.width, canvas.height);
						var dataURL = canvas.toDataURL();

						//create img
						var img = document.createElement('img');
						img.setAttribute('src', dataURL);

						console.log('oooooo : ', img.src);

						
				}, false );




				// var videos = $("#videoplay").get(0);
				// console.log('width : ', videos);

				// get thumbnail
				// var scale = 1;
				// var videos = $("#videoplay").get(0);
				// var canvas = document.createElement("canvas");
				// canvas.width = video.videoWidth * scale;
				// canvas.height = video.videoHeight * scale;
				// canvas.getContext('2d')
				// 	.drawImage(videos, 0, 0, canvas.width, canvas.height);

				// var img = document.createElement("img");
				// img.src = canvas.toDataURL('');

				// console.log('base : ', img.src);

				// $.ajax({
				// 	url: "<?php echo base_url() ?>index.php/try",
				// 	type: 'POST',
				// 	data: {data: img.src},
				// 	success: function (json) {
				// 		console.log('ending : ', json);
				// 	},
				// 	error: function (xhr, status, error) {
				// 		alert('Terdapat Kesalahan Pada Server 1...');
				// 		$("#submit").prop("disabled", false);
				// 	}
				// });


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
