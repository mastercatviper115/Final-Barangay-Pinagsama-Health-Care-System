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
    <div class="container-fluid  bg-white shadow-sm">
        <div class="container">

            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 ">
                <a href="#home" class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>Brgy 14
                        Healthcare</h1>
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
                            <li class="nav-item">
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

    <!-- <div class="container-fluid bg-primary py-5 mb-5 hero-header heroheight" id="home">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">

                </div>
            </div>
        </div>
    </div> -->
    <div class="container-fluid py-5 bg-red-100" id="about">
        <div class="container">
            <div class="row gx-5">

                <div align="center" style="padding-top:10px;">
                    <form method="GET" action="{{ route('admin.showappointments') }}">
                        <div style="margin-bottom: 20px; display: flex;">
                            <input type="date" id="date" name="date" class="form-control" style="width: 200px; display: inline-block;" value="{{ request('date') }}">
                            @if(request('date'))
                                <button type="button" style="background-color: red; color: #fff; border-color: red; padding: 0.375rem 0.75rem; font-size: 1rem; line-height: 1.5; border-radius: 0.25rem; cursor: pointer;" onclick="clearDate()">X</button>
                            @endif
                            <button type="submit" style="background-color: #007bff; color: #fff; border-color: #007bff; padding: 0.375rem 0.75rem; font-size: 1rem; line-height: 1.5; border-radius: 0.25rem; cursor: pointer;">Filter</button>
                            <div align="center" style="margin-left: 10px;">
                                <!-- Export buttons -->
                                <a href="{{ route('export.excel-show-appointments', ['date' => request('date')]) }}" class="btn btn-success">Export to Excel</a>
                                <a href="{{ route('export.csv-show-appointments', ['date' => request('date')]) }}" class="btn btn-primary">Export to CSV</a>
                                <a href="{{ route('export.pdf-show-appointments', ['date' => request('date')]) }}" class="btn btn-danger">Export to PDF</a>
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
                            <th style="padding:10px;" class="text-center" colspan="2">Action</th>

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

                                    <td>
                                        <a class="btn btn-primary" href="{{route('admin.showappointmentdetails', ['id' => $appoint->id])}}">Show Details</a>
                                    </td>
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



    <div class="container-fluid bg-dark text-light border-top border-secondary px-0 mx-0  py-4 absolute bottom-0 left-0">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-primary" href="#">Pinagsama Healthcare Management
                            System</a>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>


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


