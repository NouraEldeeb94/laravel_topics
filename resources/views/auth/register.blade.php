<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login/Registeration</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="assests/css/dataTables.dataTables.min.css">
	<link rel="stylesheet" href="assests/css/main.min.css">
	<link rel="stylesheet" href="assests/css/styles.css">
</head>
<body class="registeration-wrapper"
	style="background-image: linear-gradient(rgba(255, 255, 255, 0.735), rgba(0, 0, 0, 0.5))">

	<div class="container my-5 bg-white rounded-3">
		<div class="row">
			<div class="col-md-5 d-none d-md-block img-wrapper">
				<img src="assests/images/rear-view-young-college-student.jpg" alt="">
			</div>
			<div class="col-md-7">
                <form action="{{ route('register') }}"  method="POST"  class="text-center h-100 px-3 d-flex flex-column justify-content-center">
                @csrf
					<h3 class="fw-semibold mb-5">REGISERTATION FORM</h3>
					<div class="form-group d-flex mb-3">
                <input type="text" placeholder="First Name" class="form-control me-2 @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus >
						<input type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
					</div>

                    <div class="input-group mb-3">
						<input type="text" placeholder="Username" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="name" autofocus>
						<img src="assests/images/user-svgrepo-com.svg" alt="" class="input-group-text">
                        @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>

                    <div class="input-group  mb-3">
						<input type="text" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
						<img src="assests/images/email-svgrepo-com.svg" alt="" class="input-group-text">
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>

                    <div class="input-group mb-3">
						<input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
						<img src="assests/images/password-svgrepo-com.svg" alt="" class="input-group-text">
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>


                    <div class="input-group mb-5">
						<input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">>
						<img src="assests/images/password-svgrepo-com.svg" alt="" class="input-group-text">
					</div>
					<button class="btn btn-dark px-5 mb-2">
						REGISTER
						<img src="assests/images/arrow-sm-right-svgrepo-com.svg" alt="">
					</button>
					<a href="{{ route('login') }}" class="fw-semibold fs-6 text-decoration-none text-dark">Already have account?</a>
				</form>
			</div>
		</div>
	</div>

</div>
</body>

</html>
