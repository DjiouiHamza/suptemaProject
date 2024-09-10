<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Class</title>
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

        <form method="POST" action="{{ route('class_update', $classes->id) }}" class="row gy-2 gx-3 align-items-center">
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

            <!-- Horizontal Form Group -->
            <div class="row mb-3">
                <label for="class_Name" class="col-sm-2 col-form-label">Class Name</label>
                <div class="col-sm-10">
                    <input type="text" id="class_Name" name="class_Name" class="form-control" placeholder="Name" value="{{ old('class_Name', $classes->name) }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <!-- Green Button for Return to List -->
                    <a href="{{ route('classes_list') }}" class="btn btn-success ms-2">Return to the Sections List?</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
