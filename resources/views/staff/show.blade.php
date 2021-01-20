<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$profile -> name}}</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>
<body>


<div class="container profile">
	<h1>{{$profile -> name}} Profile</h1>
	<div class="row d-flex justify-content-center">
		<div class="col-md-10 pt-3">
			<div class="row z-depth-3">
				<div class="col-sm-4 bg-info rounded-left">
					<div class="card-block text-center text-white">
						<img style="max-width: 200px; height: 200px; border-radius: 50%; margin-top: 20px" src="{{URL::to('')}}/media/staff/{{$profile -> photo}}" alt="">
						<h2 class="font-weight-bold mt-4">{{$profile -> name}}</h2>
						<p>Student</p>
						<a href=" {{ route('staff.edit', $profile -> id) }} " class="text-white"><i class="far fa-edit fa-2x mb-4"></i></a>
					</div>
				</div>


				<div class="col-sm-8 bg-white rounded-right px-5">
					<h3 class="mt-3 text-center">Information</h3>
					<hr class="badge-primary mt-0 w-25">
					<div class="row">
						<div class="col-sm-6">
							<span class="font-weight-bold">Username: </span> 
							<span class="text-muted">{{$profile -> uname}}</span> <br> <br>
						</div>
						<div class="col-sm-6">
							<span class="font-weight-bold">Gender: </span> 
							<span class="text-muted">{{$profile -> gender}}</span> <br> <br>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<span class="font-weight-bold">Email: </span>
							<span class="text-muted">{{$profile -> email}}</span> <br> <br>
						</div>
						<div class="col-sm-6">
							<span class="font-weight-bold">Cell: </span>
							<span class="text-muted">{{$profile -> cell}}</span> <br> <br>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<span class="font-weight-bold">Age: </span>
							<span class="text-muted">{{$profile -> age}}</span> <br> <br>
						</div>
						<div class="col-sm-6">
							<span class="font-weight-bold">Address: </span>
							<span class="text-muted">{{$profile -> address}}</span> <br> <br>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<span class="font-weight-bold">Joined: </span>
							<span class="text-muted">{{ date('F d, Y', strtotime($profile -> created_at)) }}</span> <br> <br>
						</div>
						<div class="col-sm-6">
							<span class="font-weight-bold">Last Updated: </span>
							<span class="text-muted">{{$profile -> updated_at -> diffForHumans()}}</span> <br> <br>
						</div>
					</div>
					<hr class="bg-primary">

					<ul class="list-unstyled d-flex justify-content-center mt-4">
						<li><a href=""><i class="fab fa-facebook-f px-3 h4 text-info"></i></a></li>
						<li><a href=""><i class="fab fa-youtube px-3 h4 text-info"></i></a></li>
						<li><a href=""><i class="fab fa-twitter px-3 h4 text-info"></i></a></li>
					</ul>

				</div>
			</div>

			<br> <br>


			<div class="row">
				<div class="col-sm-6">
					<a class="btn btn-block btn-success" href="{{ route('staff.index') }}">Back</a>
				</div>
				<div class="col-sm-6">
					<form action="{{route('staff.delete', $profile -> id)}}" method="POST">
						@csrf
						@method('DELETE')
						<button class="btn btn-block btn-danger">Delete</button>
					</form>
				</div>
			</div>


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