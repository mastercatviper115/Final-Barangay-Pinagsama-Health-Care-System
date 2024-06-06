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

<div class="container-fluid py-4 id="about">
    <div class="container">
        <div class="row gx-5">
            <div class="row">
                <div class="col-12">
                    <div class="card overflow-hidden bg-transparent border-0 pt-2 pb-4 ">
                       <h1 class="text-4xl text-center ">Create New Doctor</h1>
                    </div>

                    <div class="d-flex justify-content-end">
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-6 offset-3">
                            <div class="card p-3  ">
                                <div class="card-body">
                                    <form action="{{ route('admin.storedoctor') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-3">
                                            <div class="col-lg-4 form-group">
                                                <label for="image" class="form-label">Doctor Image</label>
                                                <input type="file" name="image" class="form-control class="w-auto"">
                                                @error('image')
                                                    <span class="invalid-feedback ">
                                                        <strong >{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="form-label">Doctor Name</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Doctor Name Here">
                                            @error('name')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" placeholder="Enter Phone Number Here">
                                            @error('phone')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="specialization_id" class="form-label">Specialization</label>
                                            <select name="specialization_id" id="specialization_id" class="form-control">
                                                <option value="">Select Specialization</option>
                                                @foreach ($specializations as $id => $name)
                                                    <option value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                            @error('specialization_id')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="room" class="form-label">Room</label>
                                            <input type="text" name="room" id="room" class="form-control" value="{{ old('room') }}" placeholder="Enter Room Number Here">
                                            @error('room')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Enter Email Here">
                                            @error('email')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password Here">
                                            @error('password')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
                                            @error('password_confirmation')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-warning">Submit</button>
                                            <a href="{{ route('admin.createdoctor') }}" class="btn btn-default ms-2" style="border: 1px solid #D8D8D8;">Cancel</a>
                                        </div>
                                    </form>
                                </div>
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

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('../js/main.js') }}"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="../assets/js/main.js"></script>

    <script>
        function clearDate() {
            document.getElementById('date').value = '';
        }
    </script>
</body>

</html>


