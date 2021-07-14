<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
</head>
<header>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<meta name="csrf-token" content="{!! csrf_token() !!}" />
</header>
<body>
	<div class="container login_container">
		<div class="row justify-content-center align-items-center login_row">
			<div class="col-sm-6 align-self-center login_col">
				<div class="icon_container">
					<img src="{{ asset('img/logo.png') }}"/>
				</div>
				<form id="login_form">
					<div class="form-group">
						<label for="email">Email address</label>
						<input onfocus="hideLoginAlert()" type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
					</div>
				</br>
				<div class="form-group">
					<label for="password">Password</label>
					<input onfocus="hideLoginAlert()" type="password" class="form-control" id="password" name="password" placeholder="Password">
				</div>
			</form>
			<button type="button" class="btn btn-primary btn-block" id="btn_login" style="display: block !important; width: 100%;" onclick="login()">Login</button>
			<hr>
			<button type="button" class="btn btn-success btn-block" style="display: block !important; width: 100%;" onclick="registerModal()">Sign up New Account</button>
		</div>
	</div>
</div>
<!-- modals -->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Sign up New Account</h5>
			</div>
		</div>
		<div class="modal-body">
			<form id="register_form">
				<div class="row">
					<label>Full Name</label>
					<div class="col fname_col">
						<input onfocus="hideRegisterAlert()" type="text" class="form-control" id="fname" name="fname" placeholder="First name">
					</div>
					<div class="col lname_col">
						<input onfocus="hideRegisterAlert()" type="text" class="form-control" id="lname" name="lname" placeholder="Last name">
					</div>
				</div>
				<br>
				<div class="form-group email_col">
					<label for="email">Email address</label>
					<input onfocus="hideRegisterAlert()" type="email" class="form-control" id="email" name="email" placeholder="Enter email">
				</div>
				<br>
				<div class="row password_col">
					<div class="col">
						<label for="password">Password</label>
						<input onfocus="hideRegisterAlert()" type="password" class="form-control" id="password" name="password" placeholder="Password">
					</div>
					<div class="col">
						<label for="confirmpassword">Confirm Password</label>
						<input onfocus="hideRegisterAlert()" type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
					</div>
				</div>
				<br>

			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="button" class="btn btn-success" onclick="register()">Sign up</button>
		</div>
	</div>
</div>
</div>

</body>

<script type="text/javascript">

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), '_method': 'patch'
		}
	});
	var base_url = '<?php echo url('/'); ?>';

	function registerModal(){
		hideRegisterAlert();
		$('.regInputHelp').remove();
		$('#modalRegister').modal('show');
	}

	var input1 = document.getElementById("email");
	input1.addEventListener("keyup", function(event) {
		if (event.keyCode === 13) {
			event.preventDefault();
			document.getElementById("btn_login").click();
		}
	});

	var input2 = document.getElementById("password");
	input2.addEventListener("keyup", function(event) {
		if (event.keyCode === 13) {
			event.preventDefault();
			document.getElementById("btn_login").click();
		}
	});

	function register(){
		hideRegisterAlert();
		$('.regInputHelp').remove();
		// if(!$('#register_form input').val()){
		// 	showRegisterAlert('Please Complete the Registration Form','alert-danger');
		// }else{
			$.ajax({
				url: base_url+'/registerAccount',
				type: "POST",
				dataType: "JSON",
				data: $('#register_form').serialize(),
				cache: false,
				processData: false,
				success: function (data) {
					refreshToken();
					if(data.status){
						$('#register_form').hide();
						$('#modalRegister .modal-footer').hide();
						$('#register_form')[0].reset();
						showRegisterAlert('Registration Successful','alert-success');
						setTimeout( function(){$('#modalRegister').modal('hide'); setTimeout( function(){$('#register_form').show(); $('#modalRegister .modal-footer').show();},1000);},2000);
					}else{
						showRegisterAlert(data.error_msg,'alert-danger');
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {
					console.log(jqXHR.responseJSON);
				if(jqXHR.responseJSON.errors){
					if(jqXHR.responseJSON.errors.fname){
						$.each(jqXHR.responseJSON.errors.fname, function(key, val){
							$('.fname_col').append('<div class="form-text text-danger regInputHelp fnameHelp">'+jqXHR.responseJSON.errors.fname[key]+'</div>');
						});
					}
					if(jqXHR.responseJSON.errors.lname){
						$.each(jqXHR.responseJSON.errors.lname, function(key, val){
							$('.lname_col').append('<div class="form-text text-danger regInputHelp lnameHelp">'+jqXHR.responseJSON.errors.lname[key]+'</div>');
						});
					}
					if(jqXHR.responseJSON.errors.email){
						$.each(jqXHR.responseJSON.errors.email, function(key, val){
							$('.email_col').append('<div class="form-text text-danger regInputHelp emailHelp">'+jqXHR.responseJSON.errors.email[key]+'</div>');
						});
					}
					if(jqXHR.responseJSON.errors.password){
						$.each(jqXHR.responseJSON.errors.password, function(key, val){
							$('.password_col').append('<div class="form-text text-danger regInputHelp passwordHelp">'+jqXHR.responseJSON.errors.password[key]+'</div>');	
						});
						
					}
				}
				}
			});	
		// }
	}

	function hideRegisterAlert(){
		$('.login_alert').remove();
	}

	function showRegisterAlert(data,alertClass){
		$('#register_form').after('<div class="alert '+alertClass+' login_alert" role="alert">'+data+'</div>');
	}

	function refreshToken(){
		$.ajax({
			url: base_url+'/refreshToken',
			type: 'get',
			dataType: 'json',
			success: function (result) {
				$('meta[name="csrf-token"]').attr('content', result.token);
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': result.token
					}
				});
			},
			error: function (xhr, status, error) {
				console.log(xhr);
			}
		});		
	}

	function hideLoginAlert(){
		$('.login_alert').remove();
	}

	function showLoginAlert(){
		$('#login_form').after('<div class="alert alert-danger login_alert" role="alert">The Email Address or Password did not match.</div>');
	}

	function login(){
		hideLoginAlert();
		if(!$('#login_form input').val()){
			showLoginAlert();
		}else{
			$.ajax({
				url: base_url+'/login',
				type: "POST",
				dataType: "JSON",
				data: $('#login_form').serialize(),
				cache: false,
				processData: false,
				success: function (data) {
					refreshToken();
					console.log(data);
					if(data.status){
						window.location.href = base_url + '/accounts';
					}else{
						showLoginAlert();
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {

				}
			});	
		}
	}

</script>

<style type="text/css">
	
	html{
		background: #e1e1e1;
	}

	body{
		background: none;
	}

	.login_col{
		padding: 70px 20px 40px 20px;
		background: white;
		border-radius: 20px;
		position: relative;
		box-shadow: 0px 5px 20px -8px;
	}

	.icon_container{
		top: -70px;
		left: 50%;
		background: #d7d7d7;
		border-radius: 40px;
		padding: 10px;
		position: absolute;
		transform: translate(-50%, 10px);
	}

	.icon_container img{
		width: 300px;
	}

	.login_row{
		display: flex !important;
		height: 100vh !important;
	}

	.login_container{
		height: 100% !important;
	}

	#login_form{
		padding-bottom: 20px;
	}

	#register_form{
		padding-bottom: 20px;
	}
</style>


</html>