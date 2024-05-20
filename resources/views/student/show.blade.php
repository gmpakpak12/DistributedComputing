<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<title>STUDENT DETAILS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
         <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/surgeon.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
    
<body>        
 
 
    <table width="100%">
     <thead>
     <button type="button" class="btn btn-secondary" >Close</button>
     </thead>   
<tbody>
@csrf
    <tr>
        <td>
        <div class="client-info">
        <label class="btn btn-dark">NAME</label>
        <input type="text" class="btn btn-info" name="name" placeholder="name" value="{{$student->name}}"/>
        </div>
        </td>
    </tr>
    <tr>
        <td>
        <div class="client-info">
        <label class="btn btn-dark">STUDENT ID</label>
          <input type="text" class="btn btn-info" name="student_id" placeholder="name" value="{{$student->student_id}}"/>
        </div>
        </td>
    </tr>
    <tr>
        <td>
        <div class="client-info">
        <label class="btn btn-dark">COURSE</label>
          <input type="text" class="btn btn-info" name="course" placeholder="name" value="{{$student->course}}"/>
        </div>
        </td>
    </tr>
    <tr>
        <td>
        <div class="client-info">
        <label class="btn btn-dark"  >YEAR & SECTION</label>
          <input type="text"  class="btn btn-info" name="year_section" placeholder="gloves size" value="{{$student->year_section}}"/>
        </div>
        </td>
    </tr>

    <div class="modal-footer">
    </div>
</tbody>

    </table>
 


   

  


    <script src="https://kit.fontawesome.com/3c0c126bad.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/js/userstyped.js"></script>
    <script src="/js/main.js"></script>
    <script>
        let btnBack = document.querySelector('button');
        btnBack.addEventListener('click', () => {
            window.history.back();
        });
    </script>
</body>
</html>
