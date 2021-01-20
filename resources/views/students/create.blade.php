<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up Now</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>
<body>
	
	

	<div class="wrap">
		<div class="card shadow">
			<div class="card-body">
				<h2>Sign Up</h2>
				@if( Session::has('success') )
					<p class="alert alert-success"> {{ Session::get('success') }} 
						<button class="close" data-dismiss="alert">&times;</button>
					</p>
				@endif
				<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text" value="{{ old('name') }}">
						@if($errors -> has('name'))
							<small class="text-danger"> {{ $errors -> first('name') }} </small>
						@endif
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text" value="{{ old('email') }}">
						@if($errors -> has('email'))
							<small class="text-danger"> {{ $errors -> first('email') }} </small>
						@endif
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text" value="{{ old('cell') }}">
						@if($errors -> has('cell'))
							<small class="text-danger"> {{ $errors -> first('cell') }} </small>
						@endif
					</div>

					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" type="text" value="{{ old('uname') }}">
						@if($errors -> has('uname'))
							<small class="text-danger"> {{ $errors -> first('uname') }} </small>
						@endif
					</div>

					<div class="form-group">
						<label for="">Age</label>
						<input name="age" class="form-control" type="text" value="{{ old('age') }}">
					</div>
					<div class="form-group">
						<label for="">Address</label>
						<input name="address" class="form-control" type="text" value="{{ old('address') }}">
					</div>

					<label for="">Gender</label>
					<div class="form-check">
          				<input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male" checked>
			        	<label class="form-check-label" for="gridRadios1">Male</label>
        			</div>
        			<div class="form-check">
          				<input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female">
			        	<label class="form-check-label" for="gridRadios2">Female</label>
        			</div> <br>

        			<div class="form-group">
						<label for="">Password</label>
						<input name="password" class="form-control" type="password">
						@if($errors -> has('password'))
							<small class="text-danger"> {{ $errors -> first('password') }} </small>
						@endif
					</div>

					<div class="form-group">
						<label for="">Photo</label>
						<input name="photo" class="form-control-file" type="file" value="{{ old('photo') }}">
					</div>

					<br>



					<div class="form-group clearfix">
						<input class="btn btn-primary float-left" type="submit" value="Sign Up">
						<a class="btn btn-primary float-right" href="{{ route('students.index') }}">Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>