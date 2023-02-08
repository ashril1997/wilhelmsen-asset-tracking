<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
	<link href="{{ asset('css/login_register_page.css') }}" rel="stylesheet" type="text/css" >
	<title>Asset Tracking Management Login Page</title>
</head>
<body>
{{-- Import Sweetalert --}}
@include('sweetalert::alert')
{{-- If password < 8 characters && password not match new password throw this error --}}
<div style="display: none;" id="error_message" class="error-text"></div>

	
{{-- If email or password is mismatch throw this error message  --}}
@if ($message = Session::get('error'))
<div class="alert alert-danger">
	{{ $message }}
</div>
@endif
{{-- If email or password is empty throw this error message  --}}
@if(count($errors) > 0)
	<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				{{ $error }}<br />
			@endforeach
	</div>
@endif

{{-- If register success throw this success message --}}
@if (\Session::has('success'))
    <div class="alert alert-success">
		{!! \Session::get('success') !!}
    </div>
@endif


<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form method="post" action="{{ url('/main/updatepassword')}}">
			
			{{ csrf_field() }}
			<h1>Reset Password</h1>
			<br />
			<input type="text" name="name" placeholder="Name" required />
			<input type="email" name="email" placeholder="Email" required/>
			<input type="password" onkeyup="active()" id="pswrd_1"  name="password" placeholder="New Password" required/>
			<input type="password" onkeyup="active_2()" id="pswrd_2"  name="confirmpassword" placeholder="Confirm Password" required/>
			{{-- <div class="show">
				SHOW
			 </div> --}}
			<br />
			<button type="submit" value="updatepassword" >Reset</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<img src="{{ asset('images/company_logo.png') }}" />
				<br />
				<h1>Let us help you!</h1>
				<p>To reset your password please enter your registered name and email correctly with your new password</p>
			</div>
		</div>
	</div>
</div>
<script>
	const pswrd_1 = document.querySelector("#pswrd_1");
	const pswrd_2 = document.querySelector("#pswrd_2");
	const errorText = document.querySelector(".error-text");
	// const showBtn = document.querySelector(".show");
	const btn = document.querySelector("button");
	// function active(){
	//   if(pswrd_1.value.length >= 6){
	// 	btn.removeAttribute("disabled", "");
	// 	btn.classList.add("active");
	// 	pswrd_2.removeAttribute("disabled", "");
	//   }else{
	// 	btn.setAttribute("disabled", "");
	// 	btn.classList.remove("active");
	// 	pswrd_2.setAttribute("disabled", "");
	//   }
	// }
	btn.onclick = function(){
		if(pswrd_1.value.length >= 8){
			if(pswrd_1.value != pswrd_2.value){
			errorText.style.display = "block !important";
			errorText.classList.remove("matched");
			errorText.textContent = "Error! Password Not Match";
			return false;
			}else{
				// errorText.style.display = "block";
				// errorText.classList.add("matched");
				// errorText.textContent = "Nice! Confirm Password Matched";
				// return false;
			}
		}else{
			errorText.style.display = "block";
			errorText.classList.remove("matched");
			errorText.textContent = "Password need to be at least 8 character";
			return false;
		}
	  
	}
	// function active_2(){
	//   if(pswrd_2.value != ""){
	// 	showBtn.style.display = "block";
	// 	showBtn.onclick = function(){
	// 	  if((pswrd_1.type == "password") && (pswrd_2.type == "password")){
	// 		pswrd_1.type = "text";
	// 		pswrd_2.type = "text";
	// 		this.textContent = "Hide";
	// 		this.classList.add("active");
	// 	  }else{
	// 		pswrd_1.type = "password";
	// 		pswrd_2.type = "password";
	// 		this.textContent = "Show";
	// 		this.classList.remove("active");
	// 	  }
	// 	}
	//   }else{
	// 	showBtn.style.display = "none";
	//   }
	// }
 </script>
</body>
</html>