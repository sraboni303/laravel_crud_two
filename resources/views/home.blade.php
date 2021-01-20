<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Our School</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>
<body>

<div class="user-area">
	<div class="container home">
		<h1>Welcome To Our School</h1>
		<div class="row">

			<div class="col-md-4">
				<a href="{{ route('students.index') }}">
					<div class="card">
						<i class="fas fa-user-graduate"></i>
						<div class="main-text">
							<h2>Students</h2>
							<p class="text-muted">Here students can register, view and update their profile. They also can delete their account. An registered student can see others who are registered </p>
						</div>
					</div>
				</a>
			</div>

			<div class="col-md-4">
				<a href="{{ route('staff.index') }}">					
					<div class="card">
						<i class="fas fa-users"></i>
						<div class="main-text">
							<h2>Staff</h2>
							<p class="text-muted">Here staff can register, view and update their profile. They also can delete their account. An registered staff can see others who are registered</p>
						</div>
					</div>
				</a>
			</div>

			<div class="col-md-4">
				<a href="{{ route('teachers.index') }}">
					<div class="card">
						<i class="fas fa-chalkboard-teacher"></i>
						<div class="main-text">
							<h2>Teachers</h2>
							<p class="text-muted">Here teachers can register, view and update their profile. They also can delete their account. An registered teacher can see others who are registered</p>
						</div>
					</div>
				</a>
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