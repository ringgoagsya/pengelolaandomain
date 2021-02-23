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
	<form class="login100-form validate-form" action="/daftar" method="post">
          @csrf
          <div><center><img src="login/images/unand.png" width="30%"></center></div>
					<span class="login100-form-title p-b-34">
						Form Pendaftaran
					</span>
					<div>
                    <label for="name">Nama Pengelola</label>
                    <div class="wrap-input100  validate-input m-b-20" data-validate="Type user name">
						<input id="name" class="input100" type="text" name="name" placeholder="name">
						<span class="focus-input100"></span>
					</div>
                    </div>
					<div>
                    <label for="penanggung_jawab">Nama Pengelola</label>
                    <div class="wrap-input100  validate-input m-b-20" data-validate="Type user penanggung_jawab">
						<input id="penanggung_jawab" class="input100" type="text" name="penanggung_jawab" placeholder="penanggung_jawab">
						<span class="focus-input100"></span>
					</div>
                    </div>
				
                    <div class="form-group">
                        <label for="">Unit/ Bagian</label>
                        
                        <select id="id_unit" name="id_unit" class="form-control">
                        @foreach ($unit as $unit)
                        <option value="{{$unit->id}}" selected>{{$unit->nama_unit}}</option>
                        @endforeach
                        </select>
                        
                    </div>
					<div>
                    <label for="telp">No. HP</label>
                    <div class="wrap-input100  validate-input m-b-20" data-validate="Type user telp">
						<input id="telp" class="input100" type="text" name="telp" placeholder="telp">
						<span class="focus-input100"></span>
					</div>
                    </div>
                    <div>
                    <label for="">Email</label>
                    <div class="wrap-input100  validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
                    </div>
                    <div>
                    <label for="">Password</label>
					<div class="wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
                    </div>
					
					<div style="color:#453aa4" class="container-login100-form-btn">
						<button class="login100-form-btn">
							Daftar
						</button>
					</div>
				</form>
				

				<div class="login100-more" style="background-image: url('login/images/bg-02.jpeg');"></div>
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