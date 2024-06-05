<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Doctor;

use App\Models\Customer;

use App\Models\Appointment;

use Notification;
use App\Notifications\AppointmentSchedule;
use Illuminate\Notifications\Notification as NotificationsNotification;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use Barryvdh\DomPDF\Facade\Pdf;

class DoctorController extends Controller
{
    public function doctorviewhome(Request $request)
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1 || Auth::user()->usertype == 2) {
                $query = Appointment::whereStatus("Approved")->sortable();

                // Apply date filter if selected
                if ($request->has('date') && $request->date != '') {
                    $date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->date)->format('Y-m-d');
                    $query->whereDate('date', $date);
                }
                
                return view('doctor.home', compact('data'));
            } else {
                return redirect()->back();
            }
        } else {
            return view('user.homepage');
        }
    }

    public function exportPdf(Request $request)
    {
        // Retrieve appointment from the database
        $query = Appointment::whereStatus("Not Approved")->sortable();

        // Apply date filter if selected
        if ($request->has('date') && $request->date != '') {
            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->date)->format('Y-m-d');
            $query->whereDate('date', $date);
        }

        $data = $query->get();

        $pdf = PDF::loadView('admin/appointments-not-approved-pdf', compact('data'));

        $currentDateTime = \Carbon\Carbon::now()->format('Y_m_d_H_i_s');
        $filename = "appointments_not_approved_{$currentDateTime}.pdf";

        return $pdf->download($filename);
    }

    public function exportToExcel(Request $request)
    {
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Your Name')
            ->setTitle('Appointments Not Approved Data Export');

        // Add title
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Appointments Not Approved Data Export');  // Set title
        $sheet->mergeCells('A1:G1');  // Merge cells for title
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);  // Set title style

        // Add some data
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A3', 'Name');
        $sheet->setCellValue('B3', 'Email');
        $sheet->setCellValue('C3', 'Type');
        $sheet->setCellValue('D3', 'Service');
        $sheet->setCellValue('E3', 'Date');
        $sheet->setCellValue('F3', 'Barangay ID');
        $sheet->setCellValue('G3', 'Status');

        // Retrieve appointment from the database
        $query = Appointment::whereStatus("Not Approved")->sortable();

        // Apply date filter if selected
        if ($request->has('date') && $request->date != '') {
            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->date)->format('Y-m-d');
            $query->whereDate('date', $date);
        }

        $data = $query->get();

        // Fill data
        $row = 4;
        foreach ($data as $val) {
            $sheet->setCellValue('A' . $row, $val->name);
            $sheet->setCellValue('B' . $row, $val->email);
            $sheet->setCellValue('C' . $row, $val->type);
            $sheet->setCellValue('D' . $row, $val->service);
            $sheet->setCellValue('E' . $row, \Carbon\Carbon::parse($val->date)->format('m-d-Y'));
            $sheet->setCellValue('F' . $row, $val->barangayid);
            $sheet->setCellValue('G' . $row, $val->status);
            $row++;
        }

        // Generate filename with current date and time
        $filename = 'appointments_not_approved_' . date('Y-m-d_H-i-s') . '.csv';

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE over SSL, then the following may be needed
        header('Cache-Control: max-age=1');

        // Save the file
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function exportToCsv(Request $request)
    {
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Your Name')
            ->setTitle('Appointments Not Approved Data Export');
        
        // Add title
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Appointments Not Approved Data Export');  // Set title
        $sheet->mergeCells('A1:G1');  // Merge cells for title
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);  // Set title style

        // Add some data
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A3', 'Name');
        $sheet->setCellValue('B3', 'Email');
        $sheet->setCellValue('C3', 'Type');
        $sheet->setCellValue('D3', 'Service');
        $sheet->setCellValue('E3', 'Date');
        $sheet->setCellValue('F3', 'Barangay ID');
        $sheet->setCellValue('G3', 'Status');

        // Retrieve appointment from the database
        $query = Appointment::whereStatus("Not Approved")->sortable();

        // Apply date filter if selected
        if ($request->has('date') && $request->date != '') {
            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->date)->format('Y-m-d');
            $query->whereDate('date', $date);
        }

        $data = $query->get();

        // Fill data
        $row = 4;
        foreach ($data as $val) {
            $sheet->setCellValue('A' . $row, $val->name);
            $sheet->setCellValue('B' . $row, $val->email);
            $sheet->setCellValue('C' . $row, $val->type);
            $sheet->setCellValue('D' . $row, $val->service);
            $sheet->setCellValue('E' . $row, \Carbon\Carbon::parse($val->date)->format('m-d-Y'));
            $sheet->setCellValue('F' . $row, $val->barangayid);
            $sheet->setCellValue('G' . $row, $val->status);
            $row++;
        }

        // Generate filename with current date and time
        $filename = 'appointments_not_approved_' . date('Y-m-d_H-i-s') . '.csv';

        // Redirect output to a client’s web browser (CSV)
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE over SSL, then the following may be needed
        header('Cache-Control: max-age=1');

        // Save the file
        $writer = new Csv($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function upload(Request $request)
    {
        $doctor = new doctor();

        $image = $request->file;

        $imagename = time() . '.' . $image->getClientoriginalExtension();

        $request->file->move('doctorimage', $imagename);

        $doctor->image = $imagename;

        $doctor->name = $request->name;

        $doctor->phone = $request->number;

        $doctor->room = $request->room;

        $doctor->speciality = $request->speciality;

        $doctor->save();

        return redirect()
            ->back()
            ->with('message', 'Doctor Added Successfully');
    }

    public function showappointment(Request $request)
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1 || Auth::user()->usertype == 2) {
                $query = Appointment::whereStatus("Not Approved")->sortable();

                // Apply date filter if selected
                if ($request->has('date') && $request->date != '') {
                    $date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->date)->format('Y-m-d');
                    $query->whereDate('date', $date);
                }

                $data = $query->paginate(10);

                return view('admin.showappointments', compact('data'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }
    public function show($status)
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1 || Auth::user()->usertype == 2) {
                $data = appointment::whereStatus($status)->get();
                return view('admin.show', compact('data'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function approved($id, Request $request)
    {
        $data = appointment::find($id);

        $data->status = 'Approved';
        $appointment = appointment::whereStatus('Approved')->where("date","like",$data->date)->count()+1;

        $data->save();
        $details = [
            'greeting' => 'From Health care',
            'body' => 'We are pleased to inform you that you have been approved for ' . $data->type . ' at ' . env('APP_NAME') . '. We appreciate your trust in our healthcare services and look forward to assisting you on your journey to better health.',
            'actiontext' => "Your number is ".  $appointment,
            'actionurl' => $request->code,
            'endpart' => $request->endpart,
        ];

        Notification::send($data, new AppointmentSchedule($details));
        return response()->json($data);

    }
    public function cancelled($id, Request $request)
    {
        $data = appointment::find($id);

        $data->status = 'Disapproved';

        $details = [
            'greeting' => 'From Health care',
            'body' => 'I hope this letter finds you well. We appreciate your interest in ' . $data->type . ' at ' . env('APP_NAME') . '. After careful consideration of your request, we regret to inform you that your application has been disapproved.',
            'actiontext' => $request->code,
            'actionurl' => $request->code,
            'endpart' => $request->endpart,
        ];

        $data->save();
        Notification::send($data, new AppointmentSchedule($details));
        return response()->json($data);
        // return redirect()->back();
    }

    public function showdoctor()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1 || Auth::user()->usertype == 2) {
                $data = doctor::all();

                return view('admin.showdoctor', compact('data'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function deletedoctor($id)
    {
        $data = doctor::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function updatedoctor($id)
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1 || Auth::user()->usertype == 2) {
                $data = doctor::find($id);

                return view('admin.update_doctor', compact('data'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor = doctor::find($id);

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $image = $request->file;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->file->move('doctorimage', $imagename);

            $doctor->image = $imagename;
        }

        $doctor->save();

        return redirect()
            ->back()
            ->with('message', 'Doctor Details Updated Successfully.');
    }

    public function emailview($id)
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1 || Auth::user()->usertype == 2) {
                $data = appointment::find($id);

                return view('admin.email_view', compact('data'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function sendemail(Request $request, $id)
    {
        $data = appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart,
        ];

        Notification::send($data, new AppointmentSchedule($details));
        return redirect()
            ->back()
            ->with('message', 'Email send is successful');
    }
}