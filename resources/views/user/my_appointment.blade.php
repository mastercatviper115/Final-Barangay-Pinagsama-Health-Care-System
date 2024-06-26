<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LGU Healthcare Management System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
  <div class="container-fluid sticky-top bg-white shadow-sm">
    <div class="container">

<nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
    <a href="/home" class="navbar-brand">
        <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>Brgy 14 Healthcare</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupport" style="visibility: visible !important;">
        <div class="navbar-nav ms-auto py-0">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#service">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>

        @if(Route::has('login'))

        @auth

        <li class="nav-item">
          <a class="nav-link"  href="{{url('myappointment')}}">My Appointment</a>
        </li>

        <x-app-layout>
       
        </x-app-layout>

        @else
        
        <li class="nav-item" style="margin: 20px 0px 0px 10px ;">
          <a class="btn btn-primary ml-lg-3" style="font-size: 20px;" href="{{route('login')}}">Login</a>
        </li>

        <li class="nav-item" style="margin: 20px 0px 0px 10px ;">
            <a class="btn btn-primary ml-lg-3" style="font-size: 20px;" href="{{route('register')}}">Register</a>
          </li>

         @endAuth
         @endif 
   
      </ul>
        </div>
    </div> <!-- .navbar-collapse -->
  </div> <!-- .container -->
</nav>
    </div>
</div>
    

 <div align="center" style="padding: 70px; background-color: gray;">
    <table>

<tr style="background-color: gray;"> 
    <th style="padding:10px; font-size: 20px; color:white;">Doctor Name</th>
    <th style="padding:10px; font-size: 20px; color:white;">Date</th>
    <th style="padding:10px; font-size: 20px; color:white;">Message</th>
    <th style="padding:10px; font-size: 20px; color:white;">Status</th>
    <th style="padding:10px; font-size: 20px; color:white;">Cancel Appointment</th>
</tr>

@foreach($appoint as $appoints)

<tr align="center" style="background-color:gray;" >
    <td style="padding:10px;  color:white;">{{$appoints->doctor}} </td>
    <td style="padding:10px;  color:white;">{{$appoints->date}}</td>
    <td style="padding:10px;  color:white;">{{$appoints->message}}</td>
    <td style="padding:10px;  color:white;">{{$appoints->status}}</td>
    <td><a class="btn btn-danger" onclick="return confirm('Are you sure to cancel this?')"  href="{{url('cancel_appoint',$appoints->id)}}">Cancel</td>
</tr>

@endforeach
    </table>
 </div>




<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/lib/easing/easing.min.js"></script>
<script src="../assets/lib/waypoints/waypoints.min.js"></script>
<script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="../assets/lib/tempusdominus/js/moment.min.js"></script>
<script src="../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="../assets/js/main.js"></script>
  
</body>
</html>