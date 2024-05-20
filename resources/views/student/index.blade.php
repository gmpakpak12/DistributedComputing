<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
    <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3>ISAT<span>U</span></h3>
        </div>

        <div class="side-content">

            <div class="profile">
                <img src="/images/isat.jpg" class="profile-img bg-img user_picture   " alt="Profile Image">
                <h4 class="admin_name">{{ Auth::user()->name}}</h4>
                <small>{{ Auth::user()->email}}</small>
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                        <a href="{{route('admin.home')}}">
                            <span class="fa-solid fa-gauge-high"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('student.index')}}"class="active">
                            <span class="fas fa-plus"></span>
                            <small>Add Student</small>
                        </a>

                    </li>
                 




                </ul>
            </div>
        </div>
    </div>

    <div class="main-content">

        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>

                <div class="header-menu">
                    
                    <li>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>


                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <!--Admin Home -->
                            <a href="{{ url('admin/home') }}" class="dropdown-item">
                                <i class="fa-solid fa-house"></i>
                                <small>Admin Home</small> </a>
                          
                           
                            <!--Logout-->
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa-solid fa-power-off  align-middle me-1"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>

                    </li>
                </div>
            </div>
        </header>


        <main>

            

            <div class="page-content">
                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">


                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add record</button>
                            </a>

                        </div>


                        <div class="browse">

                        </div>
                    </div>
                    <div>
                        <table width="100%" id="myDataTable">
                            <thead>
                                <tr>
                                    <th>USERS</th>
                                    <th><span class="las la-sort"></span> NAME</th>
                                    <th><span class="las la-sort"></span> StudentID</th>
                                    <th><span class="las la-sort"></span> YEAR&SECTION</th>
                                    <th><span class="las la-sort"></span> Course</th>
                                    <th><span class="las la-sort"></span> ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                <td>{{$student->id}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->student_id}}</td>
                                    <td>{{$student->year_section}}</td>
                                    <td>{{$student->course}}</td>
                                   


                                    <td>
                                        <div class="actions">
                                            <span><a href="{{route('student.show',['student'=> $student])}}" class="btn btn-info"><i class="las la-eye"></i></a></span>
                                            <span><a href="{{route('student.edit',['student'=> $student ])}}" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a> </span>
                                            <span>
                                                <form method="post" action="{{route('student.destroy',['student' => $student])}}">
                                                    @csrf
                                                    @method('delete')

                                                    <button type="submit" class="btn btn-danger"> <i class="fa-regular fa-trash-can"> </i></button>
                                                </form>
                                        </div></span>
                                    </td>


                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Create Table</h5>
                                     
                                    </div>
                                    <div class="modal-body">
                                        <h1>Add Table</h1>

                                        <form method="post" action="{{route('student.store')}}" class="form-inline">
                                            @csrf
                                            @method('post')
                                            <div class="">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Please Enter input" />
                                            </div>
                                            <div class="">
                                                <label>Student ID</label>
                                                <input type="text" class="form-control" name="student_id" placeholder="Please Enter input" />
                                            </div>
                                            <div class="">
                                                <label>Year&Section</label>
                                                <input type="text" class="form-control" name="year_section" placeholder="Please Enter input" />
                                            </div>
                                            <div class="">
                                                <label>Course</label>
                                                <input type="text" class="form-control" name="course" placeholder="Please Enter input" />
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input type="submit" value="Add" class="btn btn-success" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                <script src="https://kit.fontawesome.com/3c0c126bad.js" crossorigin="anonymous"></script>
                <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


                <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script>
                    let table = new DataTable('#myDataTable');
                </script>
</body>

</html>