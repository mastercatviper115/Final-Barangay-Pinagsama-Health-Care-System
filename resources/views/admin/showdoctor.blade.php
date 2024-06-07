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
    <div class="container-fluid sticky-top bg-white shadow-sm" >
      <div class="container">

  <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
      <a href="#home" class="navbar-brand">
          <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>Brgy 14 Healthcare</h1>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupport" style="visibility: visible !important;">
          <div class="navbar-nav ms-auto py-0">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{url('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('showappointment')}}">Show Appointment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('showdoctor')}}">Records</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Transaction History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Approval</a>
        </li>
        

         

          <x-app-layout>
         
          </x-app-layout>

          
        </ul>
          </div>
      </div> <!-- .navbar-collapse -->
    </div> <!-- .container -->
  </nav>
      </div>
  </div>
      
       <div class="container-fluid page-body-wrapper">

        <div align="center" style="padding-top:100px;">

            <table>
                <tr style="background-color: bisque; color: black;">
                    <th style="padding:10px">Doctor Name</th>
                    <th style="padding:10px">Phone</th>
                    <th style="padding:10px">Speciality</th>
                    <th style="padding:10px">Room Number</th>
                    <th style="padding:10px">Image</th>
                    <th style="padding:10px">Delete</th>
                    <th style="padding:10px">Update</th>
                </tr>

                @foreach ($data as $doctor)
                <tr align="center" style="background-color: rgb(252, 232, 209); color: black;">

                    <td>{{$doctor->name}}</td>
                    <td>{{$doctor->phone}}</td>
                    <td>{{$doctor->speciality}}</td>
                    <td>{{$doctor->room}}</td>
                    <td><img height="100" width="100" src="doctorimage/{{$doctor->image}}"></td>
                    <td><a onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger" href="{{url('deletedoctor', $doctor->id)}}">Delete</td>
                    <td><a class="btn btn-primary" href="{{url('updatedoctor', $doctor->id)}}">Update</td>
                   

                </tr>
                @endforeach
        </div>
       </div>
        <!-- partial -->
      
 
        <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
          <div class="container">
              <div class="row g-5">
                  <div class="col-md-6 text-center text-md-start">
                      <p class="mb-md-0">&copy; <a class="text-primary" href="#">Pinagsama Healthcare Management System</a>. All Rights Reserved.</p>
                  </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Footer End -->
  
  
      <!-- Back to Top -->
      <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
  
  
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