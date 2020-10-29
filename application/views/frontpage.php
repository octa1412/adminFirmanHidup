<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style.css");?>">

	<title>BEKKO</title>
</head>

<body>

	<div class="container-fluid">
		<form >
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

	<div class="container">
		<form class="cssform" name="property" id="property" method="POST" action="<?php echo base_url('index.php/add_video')?>" enctype="multipart/form-data">
			<hr>
			<table>
				<tr>
					<!-- <label for="kategori" class="col-form-label">Kategori</label>
					<select class="custom-select" id="kategori" name="kategori" required>
						<option value="default">Kategori</option>   
					</select> -->
				</tr>
				<tr>
					<td><label for="nama-video" class="col-form-label">Nama Video</label></td>
					<td><input type="text" class="form-control" id="namavideo" name="namavideo" placeholder="Nama Video..." required></td>
				</tr>
				<tr>
					<td>Select Video :</td>
					<td><input type="file" id="video" name="video" ></td>
				</tr>
				<tr>
					<td> <input type="submit" id="button" name="submit" value="Submit" /></td>
				</tr>
			</table>
		</form>
	</div>


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

		$.ajax({
			url: "<?php echo base_url()?>index.php/coba/",
			type: 'POST',
			data: {kategori:inputktgr, nama:inputnama},
			success: function (response) {
				// alert('Data Berhasil Ditambahkan!');
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
