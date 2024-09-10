@include('layouts.header')

<head>
<!-- <img src="{{ asset('upload/test.png') }}" > -->


    <!-- Fonts -->
    <link rel="stylesheet" href={{ asset('css/style.css')}}> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
	
<head> <link rel="stylesheet" href={{ asset('css/home.css')}}> </head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
<div class="row">
		<div class="col-12">
			
			<!-- Form START -->
			<form action="{{route('password.teacher.update')}}" class="file-upload" method="POST">
                    @method('PUT')
                    @csrf
				<div class="row mb-5 gx-5">
					<!-- Contact detail -->
					<div class="col-xxl-8 mb-5 mb-xxl-0">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Contact detail</h4>
								<!-- First Name -->
								<div class="col-md-6">
									<label class="form-label"> Name </label>
									<input type="text" class="form-control" placeholder="" aria-label="First name" value="{{ Auth::user()->name; }}" disabled>
								</div>
								<!-- Last name -->
								<?php
								$isadmin = Auth::user()->isadmin;
								if($isadmin===0){
									$role="Teacher";
								} else{
									$role="Admin";
								}
								?>
								<div class="col-md-6">
									<label class="form-label">Your Role Is </label>
									<input type="text" class="form-control" placeholder="" aria-label="Last name" value="{{$role}}" disabled>
								</div>
								<!-- Email -->
								<div class="col-md-6">
									<label for="inputEmail4" class="form-label">Email </label>
									<input type="email" class="form-control" id="email" value="{{ Auth::user()->email; }}" disabled>
								</div>
								<!-- Mobile number -->
								<div class="col-md-6">
									<label class="form-label">Mobile Number </label>
									<input type="text" class="form-control" placeholder="" aria-label="Phone number" value="{{ Auth::user()->phone; }}" disabled>
								</div>
								
								


                                <div class="row g-3">
								<h4 class="my-4">Change Password</h4>
								<!-- Old password -->
								<div class="col-md-6">
									<label for="exampleInputPassword1" class="form-label">Old password *</label>
									<input type="password" name="oldPassword" class="form-control" id="exampleInputPassword1">
								</div>
								<!-- New password -->
								<div class="col-md-6">
									<label for="exampleInputPassword2" class="form-label">New password *</label>
									<input type="password" name="newPassword" class="form-control" id="exampleInputPassword2">
								</div>
								<!-- Confirm password -->
								<div class="col-md-12">
									<label for="exampleInputPassword3" class="form-label">Confirm Password *</label>
									<input type="password" name="confirmPassword" class="form-control" id="exampleInputPassword3">
								</div>
                                <div class="gap-3 d-md-flex justify-content-md-end text-center">
									
								
								<!-- </form>
									<a class="btn btn-secondary btn-lg" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                        @csrf
                                    </form> -->


					<button type="submit" class="btn btn-primary btn-lg">Change Password</button>
				</div>
			</form>
             <!-- Form END -->
			</div>


	    	</div> <!-- Row END -->
		    	</div>
					</div>
					<!-- Upload profile -->
					<div class="col-xxl-4">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0"></h4>
								<div class="text-center">
									<!-- Image upload -->
									<img src="{{ asset('upload/Logo.png') }}" width="300" height="300" >
									<!-- Button -->
									<input type="file" id="customFile" name="file" hidden="">
									<!-- <label class="btn btn-success-soft btn-block" for="customFile">Upload</label>
									<button type="button" class="btn btn-danger-soft">Remove</button> -->
									<!-- Content -->
								</div>
                                <!-- <button type="button" onclick="window.location='{{ url("teacherhome/timetable") }}'" class="btn btn-info">time table</button>
                                <button type="button" onclick="window.location='{{ url("teacherhome/classes") }}'" class="btn btn-info">clases</button> -->
							</div>
						</div>
					</div>
				</div> <!-- Row END -->

		</div>
	</div>
	</div>

	</body>
