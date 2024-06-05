<!-- resources/views/appointments-pdf.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Appointments</title>
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
                        <td>{{ $appoint->barangay_code }}</td>
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
