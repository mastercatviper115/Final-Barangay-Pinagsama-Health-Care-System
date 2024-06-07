<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>My Appointment</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
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
    

 <div  style="padding:70px;">
    <table>

<tr style="background-color: black;"> 
    <th style="padding:10px; font-size: 20px; color:white;">Doctor Name</th>
    <th style="padding:10px; font-size: 20px; color:white;">Date</th>
    <th style="padding:10px; font-size: 20px; color:white;">Message</th>
    <th style="padding:10px; font-size: 20px; color:white;">Status</th>
    <th style="padding:10px; font-size: 20px; color:white;">Cancel Appointment</th>
</tr>

@foreach($appoint as $appoints)

<tr style="background-color:black;" >
    <td style="padding:10px;  color:white;">{{$appoints->doctor}} </td>
    <td style="padding:10px;  color:white;">{{$appoints->date}}</td>
    <td style="padding:10px;  color:white;">{{$appoints->message}}</td>
    <td style="padding:10px;  color:white;">{{$appoints->status}}</td>
    <td><a class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')"  href="{{url('cancel_appoint',$appoints->id)}}">Cancel</td>
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