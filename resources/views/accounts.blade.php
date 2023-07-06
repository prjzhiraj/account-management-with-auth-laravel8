<!DOCTYPE html>
<html>
<head>
<title>{{ $title }}</title>
</head>
<header>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
<script src="
https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js
"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('datetimepicker-master/jquery.datetimepicker.css') }}">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('datetimepicker-master/build/jquery.datetimepicker.full.min.js') }}"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">



<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script> -->

</header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<a class="navbar-brand" href="#"><img style="width: 140px;" src="{{ asset('img/logo.png') }}"/></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<span class="navbar-text">
Good day <b>{{ session('fullname') }}</b>
</span>
<div class="collapse navbar-collapse justify-content-end" id="navbarText">
<ul class="nav">
<li class="nav-item">
<button type="button" class="btn btn-primary" data-toggle="modal" onclick="logoutModal()">Logout</button>
</li>
</ul>
</div>
</div>
</nav>
<body>


<div class="container main-container">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item" role="presentation">
<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
</li>
<li class="nav-item" role="presentation">
<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Book Now</button>
</li>
</ul>

<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
<div class="row align-items-center">

<div class="row tbl_col">
<table id="bk_tbl" class="table table-striped table-hover">
<thead>
<tr>
<th>Book Date</th>
<th>Service</th>
<th>Therapist</th>
<th>Action</th>
</tr>
</thead>
<tbody>
</tbody>
</table>

</div>

</div>
</div>
<div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
<div class="row align-items-center">

<div class="row tbl_col">
<div class="col-sm-12 col-xl-4 calendar_booking">

<input id="datetimepicker" type="text" ><br><br>
</div>
<div class="col-sm-12 col-xl-8">
<table id="acc_tbl" class="table table-striped table-hover">
<thead>
<tr>
<th>Email Address</th>
<th>First Name</th>
<th>Last Name</th>
<th>Service</th>
<th>Action</th>
</tr>
</thead>
<tbody>
</tbody>
</table>

<!-- <button type="button" class="btn btn-success" data-toggle="modal" onclick="addAcc()">Add New Account</button> -->
</div>
</div>

</div>
</div>
</div>

<br>
</div>

<!-- modals -->
<div class="modal fade" id="modalAddAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="modalAccountTitle">Add New Account</h5>
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
<div class="row">
<label>Service</label>
<div class="col service_col">
<select onfocus="hideRegisterAlert()" class="form-select" id="service" name="service" placeholder="Service" aria-label="Default select example">
<option selected>Open this select menu</option>
<option value="Counseling">Counseling</option>
<option value="Psychiatry">Psychiatry</option>
</select>
</div>
</div>
<br>
<div class="form-group email_col">
<label for="email">Email address</label>
<input onfocus="hideRegisterAlert()" type="email" class="form-control" id="email" name="email" placeholder="Enter email">
</div>
<br>
<div class="row password_form">
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

</div>
</div>
</div>
</div>
<!-- logout confirmation modal -->
<div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle">Logout</h5>
</div>
<div class="modal-body">
Are you sure you want to logout?
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="button" class="btn btn-success" onclick="logout()">Logout</button>
</div>
</div>
</div>
</div>

<!-- delete account confirmation -->
<div class="modal fade" id="modalDeleteAcc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle">Delete Account</h5>
</div>
<div class="modal-body">
</div>
<div class="modal-footer">

</div>
</div>
</div>
</div>


</body>

<script type="text/javascript">
var base_url = '<?php echo url('/'); ?>';



var dateValue = [];

function getBookedDate(){
	dateValue = [];
	$.ajax({
		url: base_url+'/booking/available-date/',
		type: 'get',
		dataType: 'json',
		success: function (data) {
			
			if(data){
				$.each(data, function(key, value){
					dateValue.push(value.date)
				});
				$('#datetimepicker').datetimepicker({
					disabledDates: dateValue
				});
				
			}
		},
		error: function (xhr, status, error) {
			console.log(xhr);
		}
	});	
}

function setHours(ct,removeSelected = 0){
	$.ajax({
		url: base_url+'/booking/',
		type: 'post',
		data: {'date':moment(ct).format('YYYY-MM-DD')},
		dataType: 'json',
		success: function (data) {
			refreshToken()
			if(removeSelected == 1){
				$('.xdsoft_time').removeClass('xdsoft_current');
			}
			if(data){
				$.each(data, function(key, value){
					$('.xdsoft_time[data-hour='+value.hour+']').addClass('xdsoft_disabled');
				});
			}
			console.log(data);
		},
		error: function (xhr, status, error) {
			console.log(xhr);
		}
	});
}

var x = '';
function setCalendarPicker(){

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	accounts();
	$('#acc_tbl').DataTable();
	
	$('#datetimepicker').datetimepicker({
		format:'Y-m-d H:00',
		inline:true,
		allowTimes:[
			'08:00', '09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00'
		],
		minDate: 0,
		// disabledDates: dateValue,
		formatDate:'Y-m-d',
		onSelectDate:function(ct,$i){
			setHours(ct,1)
			$('.btnBookNow').addClass('disabled')
		},
		onSelectTime:function(ct,$i){
			setHours(ct)
			$('.btnBookNow').removeClass('disabled')
			x = ct
			
		},
		onChangeMonth:function(){
			removeSelectedCalendar()
			console.log('test')
		}
		// "setDate": new Date()
		// onGenerate:function(ct,$i){
			// 	setHours(ct,1)
			// }
		});
		
	}
	setCalendarPicker()
	getBookedDate()
	bookings()
	
	$(document).ready(function(){
		setHours(new Date(), 1)
	})
	
	function removeSelectedCalendar(){
		setTimeout( function(){
			$('*').removeClass('xdsoft_current')
		},100)
	}
	
	
	function booknow(account_id){
		if($('#datetimepicker').val() != ''){
			$.ajax({
				url: base_url+'/booking/book-now',
				type: "post",
				data: {
					'user_id' : account_id,
					'book_date' : $('#datetimepicker').val()
				},
				dataType: "JSON",
				success: function (data) {
					refreshToken()
					$('#datetimepicker').datetimepicker('destroy')
					setCalendarPicker()
					getBookedDate()
					accounts()
					bookings()
					setHours(x, 1)
					$('.btnBookNow').addClass('disabled')
				},
				error: function (jqXHR, textStatus, errorThrown) {
					
				}
			});
		}
	}
	
	function cancelbook(book_id){
		$.ajax({
			url: base_url+'/booking/cancel-book',
			type: "post",
			data: {
				'book_id' : book_id
			},
			dataType: "JSON",
			success: function (data) {
				refreshToken()
				$('#datetimepicker').datetimepicker('destroy')
				
				setCalendarPicker()
				
				getBookedDate()
				accounts()
				bookings()
				setHours(x == '' ? new Date() : x, 1)
				setTimeout( function(){removeSelectedCalendar() },1000)
			},
			error: function (jqXHR, textStatus, errorThrown) {
				
			}
		});
	}
	
	function bookings(){
		$.ajax({
			url: base_url+'/booking/my-booking',
			type: "GET",
			dataType: "JSON",
			// data: data,
			cache: false,
			processData: false,
			success: function (data) {
				refreshToken();
				console.log(data);
				$('#bk_tbl').DataTable().clear().destroy();
				$('#bk_tbl tbody').empty();
				if(data){
					$.each(data, function(key, value){
						$('#bk_tbl tbody').append('<tr><td>'+value.book_date+'</td><td>'+value.service+'</td><td>'+value.full_name+'</td><td><button class="btn btn-sm btn-danger" onclick="cancelbook('+value.id+')">Cancel Booking</button></td></tr>');
					});
				}
				$('#bk_tbl').DataTable();
			},
			error: function (jqXHR, textStatus, errorThrown) {
				
			}
		});
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
	
	function deleteAccModal(id){
		$('#modalDeleteAcc .modal-footer').empty();
		$('#modalDeleteAcc .modal-body').empty();
		$('#modalDeleteAcc .modal-footer').append('<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> <button type="button" class="btn btn-danger" onclick="deleteAcc('+id+')">Delete</button>');
		$.ajax({
			url: base_url+'/deleteConfirm/'+id,
			type: "GET",
			dataType: "JSON",
			cache: false,
			processData: false,
			success: function (data) {
				$('#modalDeleteAcc .modal-body').append('Are you sure you want to delete the account <b>'+data+'</b> to the system?');
				$('#modalDeleteAcc').modal('show');
			},
			error: function (jqXHR, textStatus, errorThrown) {
				
			}
		});
	}
	
	function deleteAcc(id){
		console.log(id);
		$.ajax({
			url: base_url+'/deleteAccount/'+id,
			type: "POST",
			dataType: "JSON",
			cache: false,
			processData: false,
			success: function (data) {
				accounts();
				$('#modalDeleteAcc .modal-footer').empty();
				$('#modalDeleteAcc .modal-body').empty();
				$('#modalDeleteAcc .modal-body').append('<div class="alert alert-success" role="alert">Account has been deleted.</div>');
				setTimeout( function(){$('#modalDeleteAcc').modal('hide'); },1000);
			},
			error: function (jqXHR, textStatus, errorThrown) {
				
			}
		});
	}
	
	function logoutModal(){
		$('#modalLogout').modal('show');
	}
	
	function logout(){
		window.location.href = base_url + '/logout';
	}
	
	function accounts(){
		$.ajax({
			url: base_url+'/getAccounts',
			type: "GET",
			dataType: "JSON",
			// data: data,
			cache: false,
			processData: false,
			success: function (data) {
				refreshToken();
				console.log(data);
				$('#acc_tbl').DataTable().clear().destroy();
				$('#acc_tbl tbody').empty();
				if(data.data){
					$.each(data.data, function(key, value){
						$('#acc_tbl tbody').append('<tr><td>'+value.email+'</td><td>'+value.fname+'</td><td>'+value.lname+'</td><td>'+value.service+'</td><td><!--<button class="btn btn-sm btn-primary act-btn" onclick="editAcc('+value.id+')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <button class="btn btn-sm btn-danger act-btn" onclick="deleteAccModal('+value.id+')"><i class="fa fa-trash-o" aria-hidden="true"></i></button> --><button class="btn btn-sm btn-success btnBookNow" onclick="booknow('+value.id+')">Book Now</button></td></tr>');
					});
				}
				$('#acc_tbl').DataTable();
				$('.btnBookNow').addClass('disabled')
			},
			error: function (jqXHR, textStatus, errorThrown) {
				
			}
		});
	}
	
	function addAcc(){
		hideRegisterAlert();
		$('.regInputHelp').remove();
		$('#register_form').trigger("reset");
		$('.passwordHelp').remove();
		$('#modalAddAccount .modal-footer').empty();
		$('#modalAccountTitle').empty();
		$('#modalAccountTitle').append('Add New Account');
		$('#modalAddAccount .modal-footer').append('<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> <button type="button" class="btn btn-success" onclick="register()">Add</button>');
		$('#modalAddAccount #acc_id').remove();
		$('#modalAddAccount').modal('show');
	}
	
	function hideRegisterAlert(){
		$('.login_alert').remove();
	}
	
	function showRegisterAlert(data,alertClass){
		$('#register_form').after('<div class="alert '+alertClass+' login_alert" role="alert">'+data+'</div>');
	}
	
	function register(){
		hideRegisterAlert();
		$('.regInputHelp').remove();
		$.ajax({
			url: base_url+'/registerAccount',
			type: "POST",
			dataType: "JSON",
			data: $('#register_form').serialize(),
			cache: false,
			processData: false,
			success: function (data) {
				refreshToken();
				console.log(data);
				if(data.status){
					accounts();
					$('#register_form').hide();
					$('#modalAddAccount .modal-footer').hide();
					$('#register_form')[0].reset();
					showRegisterAlert('New Account Successfully Added.','alert-success');
					setTimeout( function(){$('#modalAddAccount').modal('hide'); setTimeout( function(){$('#register_form').show(); $('#modalAddAccount .modal-footer').show();},500);},1000);
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
							$('.password_form').append('<div class="form-text text-danger regInputHelp passwordHelp">'+jqXHR.responseJSON.errors.password[key]+'</div>');	
						});
						
					}
				}
			}
		});
	}
	
	function editAcc(id){
		hideRegisterAlert();
		$('.regInputHelp').remove();
		$('.passwordHelp').remove();
		$('#register_form').trigger("reset");
		$('#modalAddAccount .modal-footer').empty();
		$('#modalAccountTitle').empty();
		$('#modalAccountTitle').append('Edit Account');
		$('.password_form').append('<div class="form-text passwordHelp">To Change the Password, enter the new password above. If not, Leave it blank.</div>')
		$('#modalAddAccount .modal-footer').append('<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> <button type="button" class="btn btn-primary" onclick="updateAcc()">Update</button>');
		$('#modalAddAccount').modal('show');
		$('#modalAddAccount #acc_id').remove();
		$.ajax({
			url: base_url+'/editAccount/'+id,
			type: "GET",
			dataType: "JSON",
			cache: false,
			processData: false,
			success: function (data) {
				$('#fname').val(data[0].fname);
				$('#lname').val(data[0].lname);
				$('#email').val(data[0].email);
				$('#register_form').append('<input type="hidden" name="id" id="acc_id" value="'+data[0].id+'">');
			},
			error: function (jqXHR, textStatus, errorThrown) {
			}
		});
	}
	
	function updateAcc(){
		hideRegisterAlert();
		$('.regInputHelp').remove();
		$.ajax({
			url: base_url+'/updateAccount',
			type: "POST",
			dataType: "JSON",
			data: $('#register_form').serialize(),
			success: function (data) {
				if(data.status){
					accounts();
					$('#register_form').hide();
					$('#modalAddAccount .modal-footer').hide();
					$('#register_form')[0].reset();
					showRegisterAlert('Account Successfully Updated','alert-success');
					setTimeout( function(){$('#modalAddAccount').modal('hide'); setTimeout( function(){$('#register_form').show(); $('#modalAddAccount .modal-footer').show();},500);},1000);	
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
							$('.password_form').append('<div class="form-text text-danger regInputHelp passwordHelp">'+jqXHR.responseJSON.errors.password[key]+'</div>');	
						});
						
					}
				}
			}
		});
	}
	</script>
	
	<style type="text/css">
	.calendar_booking .xdsoft_datepicker {
		width: 315px !important; /*adjust accordingly*/
		max-width: 315px;
	}
	
	.calendar_booking  .xdsoft_calendar table, .calendar_booking .xdsoft_time_box{
		height: 315px !important;/*adjust accordingly*/
		max-width: 315px;
	}
	
	.xdsoft_disabled{
		background-color: black !important;
	}
	
	html{
		background: #e1e1e1;
	}
	
	body{
		background: none;
	}
	
	.main-container{
		padding-top: 20px;
	}
	
	.tbl_col{
		padding: 40px 20px 40px 20px;
		background: white;
		border-radius: 20px;
		position: relative;
		box-shadow: 0px 5px 20px -8px;
	}
	
	.act-btn{
		width: 30.8px;
	}
	</style>
	
	</html>