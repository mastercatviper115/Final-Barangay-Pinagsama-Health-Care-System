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
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">
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

    <div class="row">
    <div class="col-6 offset-3">
        <div class="card p-3">
            <div class="card-body">
                {{-- <form action="{{ route('admin.storedoctor') }}" method="POST" enctype="multipart/form-data">
                    @csrf --}}

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label for="image" class="form-label">Doctor Image</label>
                                <img height="200" width="200" src="{{Storage::url($doctor->image)}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Doctor Name</label>
                        <p>{{$doctor->name}}</p>
                    </div>

                    <div class="form-group mb-2">
                        <label for="phone" class="form-label">Phone</label>
                        <p>{{$doctor->phone}}</p>
                    </div>

                    <div class="form-group mb-2">
                        <label for="specialization_id" class="form-label">Specialization</label>
                        <p>{{$doctor->specialization->name}}</p>
                    </div>

                    <div class="form-group mb-2">
                        <label for="room" class="form-label">Room</label>
                        <p>{{$doctor->room}}</p>
                    </div>

                    <div class="form-group mb-2">
                        <label for="email" class="form-label">Email</label>
                        <p>{{$doctor->user->email}}</p>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.editdoctor', ['id' => $doctor->id]) }}" class="btn btn-default" style="border: 0.1px solid #D8D8D8; margin-left: 8px;">Edit</a>
                        <a href="{{ route('admin.showalldoctors') }}" class="btn btn-default" style="border: 0.1px solid #D8D8D8; margin-left: 8px;">Back</a>
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


