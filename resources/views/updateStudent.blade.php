<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
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

        <form method="POST" action="{{ route('student.update', $students->id) }}" class="row gy-2 gx-3 align-items-center">
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
                    <label for="studentName" class="form-label">Name</label>
                    <input type="text" id="studentName" name="studentName" class="form-control" placeholder="Name" value="{{ old('studentName', $students->full_name) }}" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-outline">
                    <label for="Age" class="form-label">Age</label>
                    <input type="number" id="Age" name="Age" class="form-control" placeholder="Age" value="{{ old('Age', $students->age) }}" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-outline">
                    <label for="studentEmail" class="form-label">Email</label>
                    <input type="email" id="studentEmail" name="studentEmail" class="form-control" placeholder="Email" value="{{ old('studentEmail', $students->email) }}" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-outline">
                    <label for="phone_number" class="form-label">Phone</label>
                    <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Phone Number" value="{{ old('phone_number', $students->phone_number) }}" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-outline">
                    <label for="studentSection" class="form-label">Section</label>
                    <select id="studentSection" name="studentSection" class="form-select">
                        <option value="{{ $students->section->id }}" selected>{{ $students->section->name }} (Current)</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
