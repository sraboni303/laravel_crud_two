<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>All Staff</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
	<style>
		.home-btn{
			padding-left: 25px; 
			padding-right: 25px; 
			font-size: 25px;
			font-family: impact;
			background-color: #fad390;
		}
	</style>
</head>
<body>
	
	
<h1 class="text-center std">All Staff</h1>
	<div class="wrap-table">
		<div class="card shadow">
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Photo</th>
							<th></th>
						</tr>
					</thead>
					<tbody>

						@foreach ($all_staff as $staff)

						<tr>
							<td> {{ $loop -> index + 1 }} </td>
							<td> {{ $staff -> name }} </td>
							<td> {{ $staff ->email }} </td>
							<td><img src=" {{URL::to('')}}/media/staff/{{$staff -> photo}} " alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="{{ route('staff.show', $staff -> id) }} ">View</a>
							</td>
						</tr>
						@endforeach						

					</tbody>
				</table> <br>
				<a class="btn btn-success btn-block" href="{{ route('staff.create') }}">Add New</a>
			</div>
		</div>
	</div>


	<div class="container">
		<div class="row d-block text-center">
			<a href="{{ url('/') }}" class="btn mt-5 home-btn">HOME</a>
		</div>
	</div>







	<!-- JS FILES  -->
	<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
</html>