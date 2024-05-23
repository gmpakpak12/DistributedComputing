<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Distrbuted Computing</title>
         <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

 


        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png.jpg"> 
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/welcome.css">
</head>
       


            <!-- navbar start-->
	
	<div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 text-color">
               
            <div class="navbar-nav ms-auto py-0">
                        <a href="/" class="nav-item nav-link active">Home</a>
                   
						<div class="nav-item">

    
    <!-- You can add a redirect link here after login -->
    <a href="{{ route('login') }}" class="nav-link">Admin Login</a>
</div>
    
                    </div>
            </nav>
        </div>
    </div>
 

<!-- About End -->
<div class="container-fluid  py-5">
	<div class="container">
		<div class="row gx-5">
			<div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
				<div class="position-relative h-100">
					<img class="position-absolute w-100 h-100 rounded" src="/images/ISAT-U.jpg" style="object-fit: cover;">
				</div>
			</div>
			<div class="col-lg-7">
				<div class="mb-4">
					<h5 class="d-inline-block text-blue text-uppercase border-bottom border-5">About your Student ID</h5>
					<h1 class="display-4 text-blue">Login your Student ID</h1>
				</div>

                <!-- login ni -->
                <form method="GET" action="{{ route('search-student') }}">
    <label for="student_id">Student ID:</label>
    <input type="text" id="student_id" name="student_id" required>
    <button type="submit">Login</i></button>
    <!--<button type="submit"><i class="fa fa-search"></i></button>-->
</form>

@if (session()->has('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

@if (session()->has('student_name'))
    <p>Student Name: {{ session('student_name') }}</p>
@endif

       
				
			</div>
		</div>
	</div>
</div>

<script src="https://kit.fontawesome.com/3c0c126bad.js" crossorigin="anonymous"></script>
	  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
	
	  