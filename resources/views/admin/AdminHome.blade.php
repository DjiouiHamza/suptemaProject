@include('layouts.header')

<head>
    <!-- Fonts -->
    <link rel="stylesheet" href={{ asset('css/style.css')}}> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href={{ asset('css/home.css')}}> 

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>


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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Form START -->
                <form action="{{route('password.admin.update')}}" class="file-upload" method="POST">
                    @method('PUT')
                    @csrf
                    
                    <div class="row mb-5 gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Contact detail</h4>

                                    <!-- Name -->
                                    <div class="col-md-6">
                                        <label class="form-label"> Name </label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                                    </div>

                                    <!-- Role -->
                                    <?php
                                    $isadmin = Auth::user()->isadmin;
                                    $role = $isadmin === 0 ? "Teacher" : "Admin";
                                    ?>
                                    <div class="col-md-6">
                                        <label class="form-label">Your Role Is </label>
                                        <input type="text" class="form-control" value="{{ $role }}" disabled>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <input type="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                                    </div>

                                    <!-- Mobile number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->phone }}" disabled>
                                    </div>
                                    

                                    <!-- Change Password Section -->
                                    <div class="row g-3">
                                        <h4 class="my-4">Change Password</h4>

                                        <!-- Old Password -->
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1" class="form-label">Old password *</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="oldPassword">
                                        </div>

                                        <!-- New Password -->
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword2" class="form-label">New password *</label>
                                            <input type="password" class="form-control" id="exampleInputPassword2" name="newPassword">
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="col-md-12">
                                            <label for="exampleInputPassword3" class="form-label">Confirm Password *</label>
                                            <input type="password" class="form-control" id="exampleInputPassword3" name="confirmPassword">
                                        </div>

                                        <div class="gap-3 d-md-flex justify-content-md-end text-center">
                                            <button type="submit" class="btn btn-primary btn-lg">change password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Upload profile -->
                        <div class="col-xxl-4">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Upload Your Profile Photo</h4>
                                    <div class="text-center">
                                        <!-- Image upload -->
                                        <img src="{{ asset('upload/supLogo.jpg') }}" width="300" height="300" >

                                        <!-- File Input -->
                                        <input type="file" id="customFile" name="file" hidden>
                                        <!-- <label class="btn btn-success-soft btn-block" for="customFile">Upload</label>
                                        <button type="button" class="btn btn-danger-soft">Remove</button> -->

                                        <!-- Note -->
                                        <p class="text-muted mt-3 mb-0">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row END -->
                </form>
                <!-- Form END -->
            </div>
        </div>
    </div>
</body>
