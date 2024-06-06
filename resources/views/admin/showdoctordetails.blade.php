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

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm p-4">
            <div class="container py-40">
                {{-- <form action="{{ route('admin.storedoctor') }}" method="POST" enctype="multipart/form-data">
                    @csrf --}}

                    <div class="row mb-4">
                        <div class="col-lg-4 text-center">
                            <img class="img-thumbnail rounded-circle" height="200" width="200" src="{{Storage::url($doctor->image)}}" alt="Doctor Image">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Doctor Name</label>
                        <p class="form-control-static">{{$doctor->name}}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <p class="form-control-static">{{$doctor->phone}}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Specialization</label>
                        <p class="form-control-static">{{$doctor->specialization->name}}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Room</label>
                        <p class="form-control-static">{{$doctor->room}}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <p class="form-control-static">{{$doctor->user->email}}</p>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('admin.editdoctor', ['id' => $doctor->id]) }}" class="btn btn-primary mx-2">Edit</a>
                        <a href="{{ route('admin.showalldoctors') }}" class="btn btn-secondary mx-2">Back</a>
                    </div>
                {{-- </form> --}}
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


