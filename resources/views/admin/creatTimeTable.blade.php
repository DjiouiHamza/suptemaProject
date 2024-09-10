@include('layouts.header')

<head>
    <!-- Fonts -->
    <link rel="stylesheet" href={{ asset('css/style.css')}}> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<title>Creat Time-Table</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* Form Styles */
form {
    max-width: 600px;
    margin: 30px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

form .form-group label {
    font-weight: bold;
    color: #333;
}

form .form-control {
    border-radius: 5px;
    border: 1px solid #ccc;
}

form button[type="submit"] {
    width: 100%;
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

form button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Success Message */
.alert-success {
    max-width: 600px;
    margin: 20px auto;
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
    border-radius: 5px;
    padding: 10px 20px;
}

/* Table Styles */
table.timetable-table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    font-size: 16px;
}

table.timetable-table th,
table.timetable-table td {
    border: 1px solid #ddd;
    padding: 12px 15px;
    text-align: center;
}

table.timetable-table th {
    background-color: #007bff;
    color: #fff;
    text-transform: uppercase;
    font-weight: bold;
}

table.timetable-table td {
    background-color: #f9f9f9;
    color: #333;
}

table.timetable-table tr:hover td {
    background-color: #f1f1f1;
}

    </style>
</head>

<form action="{{ route('timetable.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="teacher">Teacher:</label>
        <select name="teacher_id" id="teacher" class="form-control" required>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="section_id">Section:</label>
        <select name="section_id" id="section_id" class="form-control" required>
            @foreach($sections as $section)
                <option value="{{ $section->id }}">{{ $section->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="class_name">Subject Name:</label>
        <input type="text" name="class_name" id="class_name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="day">Day:</label>
        <select name="day" id="day" class="form-control" required>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
        </select>
    </div>

    <div class="form-group">
        <label for="timing">Timing:</label>
        <select name="timing" id="timing" class="form-control" required>
            <option value="09:00 - 10:30">09:00 - 10:30</option>
            <option value="10:45 - 12:15">10:45 - 12:15</option>
            <option value="12:30 - 14:00">12:30 - 14:00</option>
            <option value="14:00 - 15:30">14:00 - 15:30</option>
            <option value="15:45 - 16:15">15:45 - 16:15</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add a Session</button>
</form>
@if ($errors->has('duplicate'))
    <div class="alert alert-danger">
        {{ $errors->first('duplicate') }}
    </div>
@endif


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

