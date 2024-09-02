@include('layouts.header')

<head>
<!-- <img src="{{ asset('upload/test.png') }}" > -->


    <!-- Fonts -->
    <link rel="stylesheet" href={{ asset('css/studentsList.css')}}> 


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="mb-3">
                <h5 class="card-title">Teachers List <span class="text-muted fw-normal ms-2">{{$users->count()}}</span></h5>
            </div>
        </div>

    
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <div class="table-responsive">
                    <table class="table project-list-table table-nowrap align-middle table-borderless">
                        <thead>
                            <tr>
                                
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col"></th>
                                <th scope="col" style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        @foreach($users as $user)
                        <tbody>
                            <tr>
                                
                                <td><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" 
                                class="avatar-sm rounded-circle me-2" /><a href="#" class="text-body">{{$user->name}}</a></td>

                               
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone_number}}</td>
                                <td>{{$user->age}}</td>
                                <td>
                                    <ul class="list-inline mb-0">
                                        
                                    
                                        
                                    <form action="{{route('teacher.update.form',$user->id)}}" method="get" style="display:inline-block">
                                        @csrf
                                        <button type="submit" class="px-2 text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" style="border: none; background: none;">
                                        <i class="bx bx-pencil font-size-18"></i>
                                        </button>
                                        </form>


                                        <form action="{{route('teacher.destroy',$user->id)}}" method="post" style="display:inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="px-2 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" style="border: none; background: none;">
                                        <i class="bx bx-trash-alt font-size-18"></i>
                                        </button>
                                        </form>

                                        <li class="list-inline-item dropdown">
                                            <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i class="bx bx-dots-vertical-rounded"></i></a>
                                            <form action="{{route('editTimeTable', $user->id)}}" method="POST"> 
                                            @csrf
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <button type="submit" class="dropdown-item">
                                                    <a class="dropdown-item">time table</a>
                                                </button>
                                            </div>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>

@endforeach



@if (session('deleted'))
    <div class="alert alert-danger">
        {{ session('deleted') }}
    </div>
@endif
@if (session('added'))
    <div class="alert alert-success">
        {{ session('added') }}
    </div>
@endif





                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



















<form action="{{route('teacher.store')}}" method="post">
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
    <table class="table project-list-table table-nowrap align-middle table-borderless">
                        <thead>
                            <tr>
                                
                            <th scope="col">
                                <div class="col-auto">
                                   <div data-mdb-input-init class="form-outline">
                                   <input type="text" name="teacherName"  class="form-control" placeholder="name" />
                                   </div>
                                </div>
                            </th>

                            <th scope="col">
                                <div class="col-auto">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="email" name="teacherEmail"  class="form-control" placeholder="email" />
                                    </div>
                                </div>
                            </th>
                            <th scope="col">
                                <div class="col-auto">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" name="phone"  class="form-control" placeholder="phone" />
                                    </div>
                                </div>
                            </th>
                            <th scope="col">
                                <div class="col-auto">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="password" name="password"  class="form-control" placeholder="creat a password" />
                                    </div>
                                </div>
                            </th>
                            <th scope="col">
                                <div class="col-auto">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="password" name="password"  class="form-control" placeholder="repeat the password" />
                                    </div>
                                </div>
                            </th>
                            <th scope="col"></th>
                                <th scope="col" style="width: 200px;">
                                <div class="col-auto">
    <input data-mdb-ripple-init type="submit" class="btn btn-primary" value="add new teacher">
  </div></th>
                            </tr>
                        </thead>
                    </table>
                    </form>
    
    