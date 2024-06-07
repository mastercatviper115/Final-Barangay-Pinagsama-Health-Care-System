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
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- fontawesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- icon icon -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
<div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">

            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
            <a href="/" class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-primary"><i class="fa-solid fa-hospital me-2"></i></i>PINAGSAMA
                        HEALTHCARE</h1>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport" style="visibility: visible !important;">
                    <div class="navbar-nav ms-auto py-0">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.showappointments') }}">Show Appointment</a>
                            </li>
                            <li class="nav-items"><a class="nav-link" href="{{ route('admin.showalldoctors') }}">Show All Doctors</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.createdoctor') }}">Add Doctor</a></li>

                                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.showfollowup') }}">Followup</a></li>

                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ url('show/approved') }}">Approved</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('show/disapproved') }}">Disapproved</a>
                            </li>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ url('showdoctor') }}">Records</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Transaction History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Approval</a>
                            </li> -->
                            <!-- Dropdown Menu for Doctors -->
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#doctors" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Doctors
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('admin.showalldoctors') }}">Show All Doctors</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.createdoctor') }}">Add Doctor</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.showappointments') }}">Show Appointments</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.showfollowup') }}">Followup</a></li>

                                </ul>
                            </li> -->



                            <x-app-layout>

                            </x-app-layout>



                        </ul>
                    </div>
                </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
        </nav>
    </div>
    </div>

    <!-- <div class="container-fluid bg-primary py-5 mb-5 hero-header heroheight" id="home">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">

                </div>
            </div>
        </div>
    </div> -->
    <div class="container-fluid py-5" id="about">
        <div class="container">
            <div class="d-flex justify-content-end">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button  class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button  class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="appointment-container">
                <div align="center" style="padding-top:10px;">
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Name</label>
                        <p>{{$appoint->name}}</p>
                    </div>

                    <div class="form-group mb-2">
                        <label for="email" class="form-label">Email</label>
                        <p>{{$appoint->email}}</p>
                    </div>

                    <div class="form-group mb-2">
                        <label for="type" class="form-label">Type</label>
                        <p>{{$appoint->type}}</p>
                    </div>

                    <div class="form-group mb-2">
                        <label for="service" class="form-label">Service</label>
                        <p>{{$appoint->service}}</p>
                    </div>

                    <div class="form-group mb-2">
                        <label for="date" class="form-label">Date</label>
                        <p>{{$appoint->date}}</p>
                    </div>

                    <div class="form-group mb-2">
                        <label for="barangay_id" class="form-label">Barangay ID</label>
                        <p>{{$appoint->barangay_id}}</p>
                    </div>

                    <div class="form-group mb-2">
                        <label for="doctor_id" class="form-label">Doctor</label>
                        <p>{{$appoint->doctor->name}}</p>
                    </div>

                    <div class="form-group mb-2">
                        <label for="status" class="form-label">Status</label>
                        <p>{{$appoint->status}}</p>
                    </div>

                    <div class="d-flex justify-content-end">
                        @if (Auth::check() && Auth::user()->usertype == 2)
                            <button class="mx-1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Followup
                            </button>

                            {{-- <form action="{{ route('appointment.followup', ['id' => $appoint->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button  class="mx-1 btn btn-danger" onclick="return confirm('Are you sure to to save as followup?')">Followup</button>
                            </form> --}}
                            <form action="{{ route('appointment.complete', ['id' => $appoint->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button class="mx-1 btn btn-success" onclick="return confirm('Are you sure to save as complete?')">Complete</button>
                            </form>
                            <form action="{{ route('appointment.cancel', ['id' => $appoint->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button class="mx-1 btn btn-danger" onclick="return confirm('Are you sure to cancel this?')">Cancel</button>
                            </form>
                        @endif
                        <button class="btn btn-default" style="border: 0.1px solid #D8D8D8; margin-left: 8px;">
                            <a href="{{ route('admin.showappointments') }}">Back</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>


    <div class="container-fluid bg-dark text-light border-top border-secondary py-4 flex-bottom">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-primary" href="#">Pinagsama Healthcare Management
                            System</a>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Followup Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Follow Up</h5>
          <button  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('appointment.followup', ['id' => $appoint->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="action" value="followup">
                <div class="modal-header">
                    <h5 class="modal-title" id="followupModalLabel">Set Follow-up Date</h5>
                    <!-- <button  class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="followup_date">Follow-up Date:</label>
                        <input type="date" class="form-control" id="followup_date" name="followup_date" data-unallowed='["2024-08-01","2024-07-01","2024-06-01"]'>
                        @error('followup_date')
                            <span class="invalid-feedback" role="alert" style="display: block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        {{-- <input type="date" class="form-control" id="followup_date" name="followup_date">
                        @error('followup_date')
                            <span class="invalid-feedback" role="alert" style="display: block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button  class="btn btn-danger">Save Follow-up</button>
                    <button  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div> --}}
      </div>
    </div>
  </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('../js/main.js') }}"></script>
    <script src="../../assets/lib/easing/easing.min.js"></script>
    <script src="../../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="../assets/js/main.js"></script>

</body>

</html>
