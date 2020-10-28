<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?=base_url("dist/css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url("dist/css/style.css");?>">

	<title>BEKKO</title>

	<style>
        .wrapper { 
        height: 100%;
        width: 100%;
        left:0;
        right: 0;
        top: 0;
        bottom: 0;
        position: absolute;
        background: linear-gradient(124deg, #ff2400, #e81d1d, #e8b71d, #e3e81d, #1de840, #1ddde8, #2b1de8, #dd00f3, #dd00f3);
        background-size: 1800% 1800%;

        -webkit-animation: rainbow 18s ease infinite;
        -z-animation: rainbow 18s ease infinite;
        -o-animation: rainbow 18s ease infinite;
        animation: rainbow 18s ease infinite;}

        @-webkit-keyframes rainbow {
            0%{background-position:0% 82%}
            50%{background-position:100% 19%}
            100%{background-position:0% 82%}
        }
        @-moz-keyframes rainbow {
            0%{background-position:0% 82%}
            50%{background-position:100% 19%}
            100%{background-position:0% 82%}
        }
        @-o-keyframes rainbow {
            0%{background-position:0% 82%}
            50%{background-position:100% 19%}
            100%{background-position:0% 82%}
        }
        @keyframes rainbow { 
            0%{background-position:0% 82%}
            50%{background-position:100% 19%}
            100%{background-position:0% 82%}
        }
    </style>
</head>

<body>
	<div class="container">
		
    	<!-- Outer Row -->
		<div class="row justify-content-center wrapper">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card o-hidden border-2 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row" >
							<div class="col-lg-12">
								<div class="p-5">

									<h2 class="text-center"><small>Login</small></h2>
									<p class="text-center grey-text"><small>As Admin</small></p>
									<form id="form" method="POST" onsubmit="submitform(event)">
										<div class="form-group">
											<label for="usr">Username:</label>
											<input type="text" class="form-control" name="username" required>
										</div>
										<div class="form-group">
											<label for="usr">Password:</label>
											<input type="password" class="form-control" name="password" required>
										</div>
										<button id="submit" type="submit" class="btn btn-primary center-item">Sign In</button>
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="<?=base_url("dist/js/jquery.min.js");?>"></script>
<script src="<?=base_url("dist/js/popper.min.js");?>"></script>
<script src="<?=base_url("dist/js/bootstrap.min.js");?>"></script>

<script>
	function submitform(event) {
		event.preventDefault();
		var dataString = $("#form").serialize();
		$("#submit").prop("disabled", true);
		$.ajax({
			url: "<?php echo base_url() ?>index.php/cekloginadmin",
			type: 'POST',
			data: dataString,
			success: function (response) {
				if (response == "berhasil login") {
					window.location.replace("<?php echo base_url() ?>index.php/dashboardadmin");
				} else {
					alert(response);
					$("#submit").prop("disabled", false);
				}
			},
			error: function (xhr, status, error) {
				alert(status + '- ' + xhr.status + ': ' + xhr.statusText);
				$("#submit").prop("disabled", false);
			}
		});
	}

</script>


</html>
