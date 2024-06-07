<?php

namespace App\Http\Controllers;

use App\Mail\CreateAppointment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Doctor;

use App\Models\Appointment;
use App\Models\Barangay;
use App\Models\Customer;
use App\Models\Specialization;
use Notification;
use App\Notifications\AppointmentSchedule;
use App\Notifications\NewAppointmentSchedule;
use Illuminate\Notifications\Notification as NotificationsNotification;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function redirect(Request $request)
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 0) {
                $doctor = doctor::all();
                $specializations = Specialization::where('is_active', true)->get();
                $barangay = Barangay::where('is_active', true)->get();
                return view('user.homepage', compact('doctor', 'specializations', 'barangay'));
            } else if(Auth::user()->usertype == 1 || Auth::user()->usertype == 2) {
                $query = Appointment::whereStatus("Approved")->sortable();

                // Apply date filter if selected
                if ($request->has('date') && $request->date != '') {
                    $date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->date)->format('Y-m-d');
                    $query->whereDate('date', $date);
                }

                $data = $query->paginate(10);

                return view('admin.home', compact('data'));
            }
        } else {
            return redirect()
                ->back()
                ->back();
        }
    }
    public function index()
    {
        if (Auth::id()) {
            $specializations = Specialization::where('is_active', true)->get();
            $barangay = Barangay::where('is_active', true)->get();
            return redirect()->route('user.home', compact('specializations', 'barangay'));
        } else {
            $doctor = doctor::all();
            $specializations = Specialization::where('is_active', true)->get();
            $barangay = Barangay::where('is_active', true)->get();

            return view('user.homepage', compact('doctor', 'specializations', 'barangay'));
        }
    }

    public function exportPdf(Request $request)
    {
        // Retrieve appointment from the database
        $query = Appointment::whereStatus("Approved")->sortable();

        // Apply date filter if selected
        if ($request->has('date') && $request->date != '') {
            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->date)->format('Y-m-d');
            $query->whereDate('date', $date);
        }

        $data = $query->get();

        $pdf = PDF::loadView('admin/appointments-approved-pdf', compact('data'))->setOptions(['defaultFont' => 'sans-serif']);

        $currentDateTime = \Carbon\Carbon::now()->format('Y_m_d_H_i_s');
        $filename = "appointments_approved_{$currentDateTime}.pdf";

        return $pdf->download($filename);
    }

    public function exportToExcel(Request $request)
    {
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Your Name')
            ->setTitle('Appointments Approved Data Export');

        // Add title
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Appointments Approved Data Export');  // Set title
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
        $query = Appointment::whereStatus("Approved")->sortable();

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
            $sheet->setCellValue('F' . $row, $val->barangay_id);
            $sheet->setCellValue('G' . $row, $val->status);
            $row++;
        }

        // Generate filename with current date and time
        $filename = 'appointments_approved_' . date('Y-m-d_H-i-s') . '.xlsx';

        // Redirect output to a client’s web browser (Xlsx)
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . urlencode($filename) . '"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE over SSL, then the following may be needed
        header('Cache-Control: max-age=1');
        $writer->save('php://output');
        exit;
    }

    public function exportToCsv(Request $request)
    {
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Your Name')
            ->setTitle('Appointments Approved Data Export');

        // Add title
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Appointments Approved Data Export');  // Set title
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
        $query = Appointment::whereStatus("Approved")->sortable();

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
            $sheet->setCellValue('F' . $row, $val->barangay_id);
            $sheet->setCellValue('G' . $row, $val->status);
            $row++;
        }

        // Generate filename with current date and time
        $filename = 'appointments_approved_' . date('Y-m-d_H-i-s') . '.csv';

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

    public function store_appointment(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'service' => 'required',
            'name' => 'required|exists:barangays,name',
            'email' => 'required|string|max:255|unique:users,email', // Unique email
            'date' => 'required|date', // Unique date
            'barangay_id' => 'required|exists:barangays,barangay_id',
        ]);


        $doctor = Doctor::with('specialization')
        ->whereHas('specialization', function($query) use ($request) {
            $query->where('name', $request->service);
        })
        ->first();

        if (!$doctor->id) {
            return redirect()->back()->with('error', 'Doctor not found.');
        }

        // Check if appointment date with specifialization doctor exists
        $existing_appointment = Appointment::where('doctor_id', $doctor->id)
        ->where('date', \Carbon\Carbon::parse($request->date)->format('Y-m-d'))
        ->first();

        if ($existing_appointment) {
            return redirect()->back()->with('error', 'Appointment date already exists.');
        }

        $existing_barangay = Appointment::where('barangay_id', $request->barangay_id)
        ->first();

        if ($existing_barangay) {
            return redirect()->back()->with('error', 'Barangay ID already exists in the appointments.');
        }

        // Saving appointment
        // $customer = Customer::where('user_id', Auth::user()->id)->first();

        $data = new Appointment();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->type = $request->type;
        $data->service = $request->service;
        $data->date = \Carbon\Carbon::parse($request->date)->format('Y-m-d');
        $data->barangay_id = $request->barangay_id;
        $data->doctor_id = $doctor->id;
        $data->status = 'Approved';

        // if($customer->id) {
        //     $data->customer_id = $customer->id;
        // }

        $data->save();

        $approvers = User::whereIn('usertype', [1, 2])->get();

        if(!empty($approvers)) {
            foreach ($approvers as $approver) {
                $details = [
                    'approver_email' => $approver->email,
                    'approver_name' => ucwords(strtolower($approver->name)),
                    'user_name' => ucwords(strtolower($data->name)),
                    'user_email' => $data->email,
                    'type' => $data->type,
                    'date' => \Carbon\Carbon::parse($data->date)->format('m/d/Y'),
                    'subject' => 'New Appointment Notification' ,
                    'body' => 'You have a new appointment scheduled. Please click the button below to view and approve the appointment.',
                    'actiontext' => 'Click here to redirect to page: ',
                    'actionurl' => route('admin.showappointments'),
                ];

                $this->sendCreateAppointmentEmail($details);
            }
        }

        return redirect()
            ->back()
            ->with('message', 'Appointment Request Successful. We will contact you soon.');
    }

    public function myappointment()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 0) {
                $userid = Auth::user()->id;

                $appoint = appointment::where('user_id', $userid)->get();
                return view('user.my_appointment', compact('appoint'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function cancel_appointment(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 'Cancelled';
        $appointment->save();

        return redirect()
            ->back()
            ->with('message', 'Cancelled appointment successfully');
    }

    public function complete_appointment(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 'Complete';
        $appointment->save();

        return redirect()
            ->back()
            ->with('message', 'Completed appointment successfully');
    }

    public function followup_appointment(Request $request, $id)
    {
        $request->validate([
            'followup_date' => 'required|date|after:today',
        ]);

        if (!$request->followup_date) {
            return redirect()->back()->with('error', 'Followup date required.');
        }

        // $userId = Auth::user()->id;

        // $existing_appointment = Appointment::whereHas('doctor', function ($query) use ($userId) {
        //     $query->where('user_id', $userId);
        // })
        // ->where('date', $request->followup_date)
        // ->with('doctor')
        // ->get();

        // if ($existing_appointment) {
        //     return redirect()->back()->with('error', 'Appointment/Followup date already exists.');
        // }

        $appointment = Appointment::find($id);
        $appointment->date = \Carbon\Carbon::parse($request->followup_date)->format('Y-m-d');
        $appointment->status = 'Followup';
        $appointment->save();

        return redirect()
            ->back()
            ->with('message', 'Cancelled appointment successfully');
    }

    public function sendCreateAppointmentEmail($details)
    {
        Mail::to($details['approver_email'])->send(new CreateAppointment($details));
        return redirect()
            ->back()
            ->with('message', 'Email send is successful');
    }
}
