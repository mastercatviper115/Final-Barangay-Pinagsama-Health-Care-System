<!-- resources/views/appointments-pdf.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Appointments</title>
    <meta charset="utf-8">
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
    <style>
        th {
            font-size: 14px;
            font-weight: bold;
        }
        td {
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: bisque;
        }
    </style>
</head>
<body>
    <div align="center" style="table-layout:fixed; max-width: 750px;">
        <h1>Appointments</h1>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Service</th>
                <th>Date</th>
                <th>Barangay ID</th>
                <th>Status</th>
            </tr>
            @if($data->count())
                @foreach ($data as $appoint)
                    <tr data-name={{ $appoint->id }} style="background-color: white;">
                        <td>{{ $appoint->name }}</td>
                        <td>{{ $appoint->email }}</td>
                        <td>{{ $appoint->type }}</td>
                        <td>{{ $appoint->service }}</td>
                        <td>{{ \Carbon\Carbon::parse($appoint->date)->format('m/d/Y') }}</td>
                        <td>{{ $appoint->barangay_id }}</td>
                        <td>{{ $appoint->status }}</td>
                    </tr>
                @endforeach
            @else
                <tr style="background-color: white;">
                    <td colspan="7">No data found</td>
                </tr>
            @endif
        </table>
    </div>
</body>
</html>
