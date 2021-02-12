<!DOCTYPE html>
<html lang="en">
<head>
	<title>MPSI</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/unand.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
		<div><center><img src="login/images/unand.png" width="30%"></center></div>
					<span class="login100-form-title p-b-34">
						Form Pendaftaran
					</span>
		</div>
       		<form action="{{route('simpanpengelola')}}" method="post" enctype="multipart/form-data"> 
				@csrf
				@method('POST')
                    <div class="form-group">
                        <label for="name">Nama Pengelola</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="penanggung_jawab">Penanggung Jawab</label>
                        <input type="text" name="penanggung_jawab" id="penanggung_jawab" placeholder="penanggung_jawab" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="">Unit/ Bagian</label>
                        
                        <select id="id_unit" name="id_unit" class="form-control">
                        @foreach ($unit as $unit)
                        <option value="{{$unit->id}}" selected>{{$unit->nama_unit}}</option>
                        @endforeach
                        </select>
                        
                    </div>

                    <div class="form-group">
                        <label for="telp">No. Hp</label>
                        <input type="text" name="telp" id="telp" placeholder="telp" class="form-control">
                    </div>
					<div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" id="email" placeholder="email" class="form-control">
                    </div>
					<div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="password" class="form-control">
                    </div>
                    
					
						<div class="form-group">
							
							<button type="submit" class="btn btn-primary">Daftar</button>
						</div>
					
				</form>
				

				
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>