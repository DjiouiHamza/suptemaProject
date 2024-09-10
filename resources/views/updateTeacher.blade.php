<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous">
</head>
<body>
    @include('layouts.header')

    <div class="container mt-5">
        @if (session('updated'))
            <div class="alert alert-success">
                {{ session('updated') }}
            </div>
        @endif

        <form method="POST" action="{{ route('teacher.update', $users->id) }}" class="row gy-2 gx-3 align-items-center">
            @method('put')
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col-md-6">
                <div class="form-outline">
                    <label for="teachertName" class="form-label">Teacher Name</label>
                    <input type="text" id="teachertName" name="teachertName" class="form-control" placeholder="Name" value="{{ old('teachertName', $users->name) }}" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-outline">
                    <label for="teacherEmail" class="form-label">Teacher Email</label>
                    <input type="email" id="teacherEmail" name="teacherEmail" class="form-control" placeholder="Email" value="{{ old('teacherEmail', $users->email) }}" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-outline">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Phone Number" value="{{ old('phone_number', $users->phone_number) }}" />
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('teachers_list') }}" class="btn btn-success ms-2">Return to the Teacher List?</a>

            </div>
        </form>
    </div>
</body>
</html>
