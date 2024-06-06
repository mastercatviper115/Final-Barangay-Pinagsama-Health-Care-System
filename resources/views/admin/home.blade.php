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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#doctors" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Doctors
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('admin.showalldoctors') }}">Show All Doctors</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.createdoctor') }}">Add Doctor</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.showappointments') }}">Show Appointments</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.showfollowup') }}">Followup</a></li>

                                </ul>
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

    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header heroheight" id="home">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <!--
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5" style="border-color: rgba(256, 256, 256, .3) !important;">Welcome To Brgy. 14 Healthcare</h5>
                    <h1 class="display-1 text-white mb-md-4">Best Barangay Healthcare at your Service</h1>-->
                    <div class="pt-2">


                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <div class="container-fluid py-5" id="about">
        <div class="container">
            <div class="row gx-5">

                <div align="center" style="padding-top:10px;">
                    <form method="GET" action="{{ route('user.home') }}">
                        <div style="margin-bottom: 20px; display: flex;">
                            <input type="date" id="date" name="date" class="form-control" style="width: 200px; display: inline-block;" value="{{ request('date') }}">
                            @if(request('date'))
                                <button type="button" style="background-color: red; color: #fff; border-color: red; padding: 0.375rem 0.75rem; font-size: 1rem; line-height: 1.5; border-radius: 0.25rem; cursor: pointer;" onclick="clearDate()">X</button>
                            @endif
                            <button type="submit" style="background-color: #007bff; color: #fff; border-color: #007bff; padding: 0.375rem 0.75rem; font-size: 1rem; line-height: 1.5; border-radius: 0.25rem; cursor: pointer;">Filter</button>
                            <div align="center" style="margin-left: 10px;">
                                <!-- Export buttons -->
                                <a href="{{ route('export.excel-home-appointments', ['date' => request('date')]) }}" class="btn btn-success">Export to Excel</a>
                                <a href="{{ route('export.csv-home-appointments', ['date' => request('date')]) }}" class="btn btn-primary">Export to CSV</a>
                                <a href="{{ route('export.pdf-home-appointments', ['date' => request('date')]) }}" class="btn btn-danger">Export to PDF</a>
                            </div>
                        </div>
                    </form>

                    <table class="table table-bordered">
                        <tr style="background-color: bisque;">
                            <th style="padding:10px" class="text-center">@sortablelink('name')</th>
                            <th style="padding:10px" class="text-center">@sortablelink('email')</th>
                            <th style="padding:10px" class="text-center">@sortablelink('type')</th>
                            <th style="padding:10px" class="text-center">@sortablelink('service')</th>
                            <th style="padding:10px" class="text-center">@sortablelink('date')</th>
                            <th style="padding:10px" class="text-center">@sortablelink('barangay_code')</th>
                            <th style="padding:10px" class="text-center">@sortablelink('status')</th>
                            {{-- <th style="padding:10px;" class="text-center" colspan="2">Action</th> --}}

                        </tr>
                        @if($data->count())
                            @foreach ($data as $appoint)
                                <tr data-name={{ $appoint->id }} align="center" style="background-color: white;">
                                    <td>{{ $appoint->name }}</td>
                                    <td>{{ $appoint->email }}</td>
                                    <td>{{ $appoint->type }}</td>
                                    <td>{{ $appoint->service }}</td>
                                    <td>{{ \Carbon\Carbon::parse($appoint->date)->format('m/d/Y') }}</td>
                                    <td>{{ $appoint->barangay_code }}</td>
                                    <td>{{ $appoint->status }}</td>

                                    {{-- <td><button class="btn btn-success btn-approved mr-3" data-id={{ $appoint->id }}
                                            data-type={{ $appoint->type }}>Approved
                                    <button class="btn btn-danger btn-disapproved"
                                            data-id={{ $appoint->id }}>Disapproved</td> --}}
                                </tr>
                            @endforeach
                        @else
                            <tr align="center" style="background-color: white;">
                                <td colspan="8">No data found</td>
                            </tr>
                        @endif
                    </table>
                    {!! $data->appends(\Request::except('page'))->render() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- About Start -->
    <!-- <div class="container-fluid py-5" id="about">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="../assets/img/about.jpg"
                            style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-4">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">About Us</h5>
                        <h1 class="display-4">Best Medical Care For Yourself and Your Family</h1>
                    </div>
                    <p>Tempor erat elitr at rebum at at clita aliquyam consetetur. Diam dolor diam ipsum et, tempor
                        voluptua sit consetetur sit. Aliquyam diam amet diam et eos sadipscing labore. Clita erat ipsum
                        et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor consetetur
                        takimata eirmod, dolores takimata consetetur invidunt magna dolores aliquyam dolores dolore.
                        Amet erat amet et magna</p>
                    <div class="row g-3 pt-3">
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-user-md text-primary mb-3"></i>
                                <h6 class="mb-0">Qualified<small class="d-block text-primary">Doctors</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-procedures text-primary mb-3"></i>
                                <h6 class="mb-0">Emergency<small class="d-block text-primary">Services</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-microscope text-primary mb-3"></i>
                                <h6 class="mb-0">Accurate<small class="d-block text-primary">Testing</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-ambulance text-primary mb-3"></i>
                                <h6 class="mb-0">Free<small class="d-block text-primary">Ambulance</small></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->





    <!-- Footer Start -->


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
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>

    <script>
        function clearDate() {
            document.getElementById('date').value = '';
        }
    </script>
</body>

</html>
