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
	<div class="form-container sign-up-container">
		<form method="post" action="{{ url('/main/registeruser')}}">
			{{ csrf_field() }}
			<h1>Create Account</h1>
			<br />
			{{-- <div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div> --}}
			{{-- <span>or use your email for registration</span> --}}
			<input type="text" name="name" placeholder="Name" required />
			<input type="email" name="email" placeholder="Email" required/>
			<input type="password" name="password" placeholder="Password" required/>
			<br />
			<button  type="submit" value="registeruser" >Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">

		@if (isset(Auth::user()->email))
			<script>window.location="/main/successlogin";</script>
		@endif
		
		<form method="post" action="{{ url('/main/checklogin')}}">
			
			{{ csrf_field() }}
			<h1>Sign in</h1>
			<br />
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<a href="/forgot_password">Forgot your password?</a>
			<button type="submit" value="login" name="login"> Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<img src="{{ asset('images/company_logo.png') }}" />
				<br />
				<h1>Wilhelmsen</h1>
				<p>Asset Tracking Management System</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<img src="{{ asset('images/company_logo.png') }}" />
				<br />
				<h1>Wilhelmsen</h1>
				<p>Asset Tracking Management System</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('js/login_register_page.js') }}"></script>

{{-- Import Sweetalert --}}
@include('sweetalert::alert')
</body>
</html>