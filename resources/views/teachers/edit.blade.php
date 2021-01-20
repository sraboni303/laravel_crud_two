<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $edit_data -> name  }}</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>
<body>

	<div class="wrap">
		<div class="card shadow">
			<div class="card-body">
				<h2>Update Your Account</h2>
				@if( Session::has('success') )
					<p class="alert alert-success"> {{ Session::get('success') }} 
						<button class="close" data-dismiss="alert">&times;</button>
					</p>
				@endif
				<form action="{{ route('teachers.update', $edit_data -> id) }}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')

					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text" value="{{ $edit_data -> name  }}">
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text" value="{{ $edit_data -> email  }}">
					</div>

					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text" value="{{ $edit_data -> cell  }}">
					</div>

					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" type="text" value="{{ $edit_data -> uname  }}">
					</div>

					<div class="form-group">
						<label for="">Age</label>
						<input name="age" class="form-control" type="text" value="{{ $edit_data -> age  }}">
					</div>

					<div class="form-group">
						<label for="">Address</label>
						<input name="address" class="form-control" type="text" value="{{ $edit_data -> address  }}">
					</div>

					<label for="">Gender</label>
					<div class="form-check">
          				<input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male">
			        	<label class="form-check-label" for="gridRadios1">Male</label>
        			</div>
        			<div class="form-check">
          				<input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female">
			        	<label class="form-check-label" for="gridRadios2">Female</label>
        			</div> <br>


					<div class="form-group">
						<img style="max-width: 100px" src=" {{URL::to('')}}/media/teachers/{{$edit_data -> photo}} ">
						<label for="">Photo</label>
						<input type="hidden" name="old_photo" value="{{$edit_data -> photo}}">
						<input type="file" name="new_photo" class="form-control-file">
					</div> <br>

					<div class="form-group clearfix">
						<input class="btn btn-primary float-left" type="submit" value="Update">
						<a class="btn btn-primary float-right" href="{{ route('teachers.show', $edit_data -> id) }}">Back</a>
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