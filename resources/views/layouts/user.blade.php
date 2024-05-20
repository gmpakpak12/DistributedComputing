<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <link rel="shortcut icon" type="image/png" href="img/favicon.png.jpg"> 
    <!-- Meta -->
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width,
        initial-scale1.0">
    <!doctype html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" href="/assets/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/hospitalselect.css">
    <title></title>
</head>



<body>
    
<h4 class="admin_name">{{ Auth::user()->id}}</h4>
				<small>{{ Auth::user()->email}}</small>

</div>
<div class="" aria-labelledby="navbarDropdown">

							



							<a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa-solid fa-power-off  align-middle me-1"></i>
								{{ __('Logout') }}
							</a>


							<form id="logout-form" action="{{ route('logout') }}" method="POST">
								@csrf
							</form>
						</div>
   
        
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
     
   
</body>
</html>

<main class="">
            @yield('content')
        </main>
        