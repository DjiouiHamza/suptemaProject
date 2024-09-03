@include('layouts.header')

<head>
    <!-- Fonts -->
    <link rel="stylesheet" href={{ asset('css/studentsList.css') }}> 

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

<style>
    html, body {
        height: 100%;
        margin: 0;
    }
    .container {
        display: flex;
        flex-direction: column;
        height: calc(100vh - 80px); /* Height minus form height */
        padding-bottom: 80px; /* Space for the fixed form */
        overflow: hidden; /* Prevent extra scrolling */
    }
    .table-wrapper {
        flex: 1;
        overflow: auto;
    }
    .table-container {
        height: 100%;
        overflow: auto;
    }
    .table {
        width: 100%;
        table-layout: fixed;
    }
    .table th, .table td {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .pagination {
        margin: 10px 0;
        text-align: center;
    }
    .fixed-form {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background: white;
        padding: 20px;
        box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
        z-index: 10; /* Ensure the form stays on top */
    }
    .form-container form {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .form-container .col-auto {
        flex: 1;
        min-width: 150px; /* Adjust based on your needs */
    }
</style>

<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="mb-3">
                <h5 class="card-title">Students List <span class="text-muted fw-normal ms-2">{{$studentsCount->count()}}</span></h5>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                <div>
                    <ul class="nav nav-pills">
                        <!-- Navigation Pills Here -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="table-wrapper">
        <div class="table-container">
            <table class="table project-list-table table-nowrap align-middle table-borderless">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Section</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Age</th>
                        <th scope="col" style="width: 200px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td><a href="#" class="text-body">{{$student->full_name}}</a></td>
                        <td>
                            <form action="{{ route('class_show', $student->section_id) }}" method="post">
                                @csrf
                                <button type="submit" class="badge-soft-success mb-0">
                                    {{ $student->section ? $student->section->name : 'No Section Assigned' }}
                                </button>
                            </form>
                        </td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->phone_number}}</td>
                        <td>{{$student->age}}</td>
                        <td>
                            <ul class="list-inline mb-0">
                                <form action="{{ route('student.update.form', $student->id) }}" method="get" style="display:inline-block">
                                    @csrf
                                    <button type="submit" class="px-2 text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" style="border: none; background: none;">
                                        <i class="bx bx-pencil font-size-18"></i>
                                    </button>
                                </form>
                                <form action="{{ route('student.destroy', $student->id) }}" method="post" style="display:inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="px-2 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" style="border: none; background: none;">
                                        <i class="bx bx-trash-alt font-size-18"></i>
                                    </button>
                                </form>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $students->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
<div class="fixed-form">
    <form class="row gy-2 gx-3 align-items-center" action="{{ url('adminhome/students_list/store') }}" method="post">
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
        <div class="col-auto">
            <h4 class="form-title">Add New Student</h4>
        </div>
        <div class="col-auto">
            <div class="form-outline">
                <input type="text" name="studentName" class="form-control" placeholder="Name" />
            </div>
        </div>
        <div class="col-auto">
            <div class="form-outline">
                <input type="text" name="Age" class="form-control" placeholder="Age" />
            </div>
        </div>
        <div class="col-auto">
            <div class="form-outline">
                <input type="email" name="studentEmail" class="form-control" placeholder="Email" />
            </div>
        </div>
        <div class="col-auto">
            <div class="form-outline">
                <input type="text" name="phone" class="form-control" placeholder="Phone" />
            </div>
        </div>
        <div class="col-auto">
            <div class="form-outline">
                <select class="form-select" name="studentSection">
                    <option selected disabled>Choose...</option>
                    @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-auto">
            <input type="submit" class="btn btn-primary" value="Add New Student">
        </div>
    </form>
</div>

<style>
    .fixed-form {
        position: sticky;
        bottom: 0;
        left: 0;
        width: 100%;
        background: white;
        padding: 20px;
        box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
        z-index: 10;
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }
    
    .form-title {
        margin: 0;
        font-size: 1.25rem;
        font-weight: bold;
    }
    
    .form-outline {
        margin-bottom: 0;
    }

    .form-control, .form-select {
        width: 150px; /* Adjust width as needed */
    }

    .btn-primary {
        margin-top: 0;
    }
</style>
