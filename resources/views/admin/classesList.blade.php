<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    height: 100vh;
}

h2 {
    text-align: center;
    margin: 20px;
    color: #007bff;
}

.content {
    flex: 1;
    overflow-y: auto;
    padding: 20px;
    padding-bottom: 80px; /* Add enough padding to prevent overlap with the form */
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 18px;
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.table thead tr {
    background-color: #007bff;
    color: white;
    text-align: left;
}

.table th,
.table td {
    padding: 12px 15px;
    border-bottom: 1px solid #dddddd;
}

.table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table tbody tr:hover {
    background-color: #f1f1f1;
}

.harmonious-btn {
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
    padding: 8px 16px;
    font-size: 16px;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.harmonious-btn:hover {
    background-color: #0056b3;
}

.delete-icon {
    color: #dc3545;
    cursor: pointer;
}

.delete-icon:hover {
    color: #c82333;
}

.centered-form-container {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #fff;
    padding: 10px;
    box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10;
}

.form-container {
    display: flex;
    align-items: center;
    gap: 10px;
    background-color: #fff;
    padding: 10px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 900px;
}

.form-group {
    display: flex;
    align-items: center;
    gap: 10px;
    flex: 1;
}

.form-control {
    border-radius: 4px;
    padding: 10px;
    font-size: 16px;
    flex: 1;
    min-width: 200px;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.alert {
    margin: 20px;
}

.form-container h3 {
    margin: 0;
    font-size: 18px;
}

</style>


    <title>Class Sections Overview</title>
</head>
<body>

    <h2>Class Sections Overview</h2>

    @if (session('added'))
        <div class="alert alert-success">
            {{ session('added') }}
        </div>
    @elseif(session('deleted'))
        <div class="alert alert-danger">
            {{ session('deleted') }}
        </div>
    @endif
    @if (session('classUpdated'))
        <div class="alert alert-success">
            {{ session('classUpdated') }}
        </div>
    @endif

    <div class="content">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Class</th>
                    <th scope="col">Students</th>
                    <th scope="col">Time Table</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($sections as $class)
                <tr>
                    <th scope="row"></th>
                    <td>{{ $class->name }}</td>
                    <td>
                        <form action="{{ route('class_show', $class->id) }}" method="get">
                            <button type="submit" class="harmonious-btn">
                                {{ $class->students()->count() }}
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('sectionTimeTable', $class->id) }}">{{ $class->name }} Time Table</a>
                    </td>

                    <td>
                        <!-- Edit Form with Icon -->
                        <form action="{{ route('class_edit_form', $class->id) }}" style="display:inline;">
                            <button type="submit" style="background: none; border: none;" href="hh">
                                <i class="fas fa-edit edit-icon"></i>
                            </button>
                        </form>

                        <!-- Delete Form with Icon -->
                        <form action="{{ route('class_delete', $class->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none;">
                                <i class="fas fa-trash-alt delete-icon"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="centered-form-container">
        <div class="form-container">
            <h3>Add New Section</h3>
            <form action="{{ route('store_classes') }}" method="post" style="display: flex; align-items: center; gap: 10px; width: 100%;">
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

                <input type="text" name="sectionName" class="form-control" placeholder="Enter section name" />

                <button type="submit" class="btn btn-primary">Add New Section</button>
            </form>
        </div>
    </div>

</body>
</html>
