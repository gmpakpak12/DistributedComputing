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
                        <a href="" class="active">
                            <span class="fa-solid fa-gauge-high"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('student.index')}}">
                            <span class="fas fa-plus"></span>
                            <small>Add Student</small>
                        </a>

                    </li>
                    <li>
             

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

            <div class="page-header">
                <h1>Admin Dashboard</h1>
                <small>Home / Dashboard</small>
            </div>

            <div class="page-content">

                <div class="analytics">



                </div>


                <div class="records table-responsive">

                    <?php
                    $students = App\Models\student::whereNotNull('last_seen')
                        ->orderBy('last_seen', 'desc')
                        ->get();
                    ?>

                    <div>
                        <table width="100%" id="myDataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><span class="las la-sort"></span> Name</th>
                                    <th><span class="las la-sort"></span> Student ID</th>
                                    <th><span class="las la-sort"></span> Last Seen</th>
                                    <th><span class="las la-sort"></span> Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if($students->isNotEmpty())
                                @foreach($students as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->student_id}}</td>
                                    <td>{{ \Carbon\Carbon::parse($student->last_seen)->diffForHumans() }}</td>
                                    <td>
                                        @if(Cache::has('student-is-online-'.$student->id))
                                        <span class="text-center">
                                            <font color="green">Online</font>
                                        </span>
                                        @else()
                                        <span class="text-center">
                                            <font color="red">Offline</font>
                                        </span>
                                        @endif()
                                    </td>
                                </tr>

                                @endforeach
                                @endif
                            </tbody>
                        </table>
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