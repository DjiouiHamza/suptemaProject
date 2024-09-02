@include('layouts.header')

<head>
<!-- <img src="{{ asset('upload/test.png') }}" > -->


    <!-- Fonts -->
    <link rel="stylesheet" href={{ asset('css/style.css')}}> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <title>Class Sections Overview</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
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
    </style>
</head>
<body>

    <h2>Class Sections Overview</h2>

    <table class="table table-sm"> 
        <thead> 
            <tr> 
                <th scope="col"></th> 
                <th scope="col">Class</th> 
                <th scope="col">Students</th> 
                <th scope="col"></th> 
            </tr> 
        </thead> 
        <tbody> 
        @foreach($sections as $class)
            <tr> 
                <th scope="row"></th> 
                <td>{{$class->name}}</td> 
                <td>
                    <form action="{{route('class__show', $class->id)}}" method="get">
                        
                        <button type="submit" class="harmonious-btn">
                            {{$class->students()->count()}}
                        </button>
                    </form>
                </td> 
                <th scope="col"></th>
            </tr> 
        @endforeach
        </tbody> 
    </table> 