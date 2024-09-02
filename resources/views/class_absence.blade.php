<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* General styling for the section container */
        .section-container {
            margin: 30px auto;
            max-width: 1200px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Title styling */
        .section-container h1 {
            font-size: 28px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        /* Table styling */
        .students-table {
            width: 100%;
            border-collapse: collapse;
        }

        .students-table th, .students-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .students-table th {
            background-color: #007bff;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
        }

        .students-table td {
            background-color: #fff;
        }

        /* Form styling */
        .form-container {
            margin-top: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .btn-submit {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="section-container">
        <h1>{{ $sections->name }}</h1>
        

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('sent'))
    <div class="alert alert-success">
        {{session('sent')}}
    </div>
@endif



        <form action="{{route('class_absence_sent')}}" method="POST">
                @csrf
        <!-- Table with Checkboxes and Student Info -->
        <table class="students-table">
            <thead>
                <tr>
                    <th>name</th>
                    <th>section</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td><input type="checkbox" name="student_ids[]" value="{{ $student->id }}">  {{$student->full_name }}</td>
                    <td>{{$sections->name }}  </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Form for selecting days, timings, and submitting selected students -->
        <div class="form-container">

                <!-- <div class="form-group">
                    <label for="day">Select Day:</label>
                    <select id="day" name="day" required>
                        <option selected disabled>Select a day</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    </select>
                </div> -->

                <!-- <div class="form-group">
                    <label for="timing">Select Timing:</label>
                    <select id="timing" name="timing" required>
                        <option selected disabled>Select a timing</option>
                    @foreach($timeslots as $timeslot)
                    <option value="{{ $timeslot->id }}">{{ $timeslot->time }}</option>
                    @endforeach
                    </select>                     
                </div> -->
                <button type="submit" class="btn-submit">Submit Selected Students</button>
                
                <!-- Hidden input for section_id -->
    <input type="hidden" name="section_id" value="{{ $sections->id }}">
    <input type="hidden" name="day" value="{{ $day }}">
    <input type="hidden" name="timing" value="{{$time_id}}">

            </form>
        </div>
    </div>
    
</body>
</html>

