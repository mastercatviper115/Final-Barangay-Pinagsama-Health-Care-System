<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Doctor;

use App\Models\Customer;

use App\Models\Appointment;
use App\Models\Specialization;
use App\Models\User;
use Notification;
use App\Notifications\AppointmentSchedule;
use Illuminate\Notifications\Notification as NotificationsNotification;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminviewhome(Request $request)
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1 || Auth::user()->usertype == 2) {
                $query = Appointment::whereStatus("Approved")->sortable();

                // Apply date filter if selected
                if ($request->has('date') && $request->date != '') {
                    $date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->date)->format('Y-m-d');
                    $query->whereDate('date', $date);
                }
                
                return view('admin.home', compact('data'));
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
            $sheet->setCellValue('F' . $row, $val->barangay_code);
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
            $sheet->setCellValue('F' . $row, $val->barangay_code);
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

    public function showappointments(Request $request)
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1 || Auth::user()->usertype == 2) {
                $query = Appointment::where('status', '!=', 'Completed')->sortable();

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

    public function showfollowup(Request $request)
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1 || Auth::user()->usertype == 2) {
                $query = Appointment::where('status', 'Followup')->sortable();

                // Apply date filter if selected
                if ($request->has('date') && $request->date != '') {
                    $date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->date)->format('Y-m-d');
                    $query->whereDate('date', $date);
                }

                $data = $query->paginate(10);

                return view('admin.followup', compact('data'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function showappointmentdetails($id)
    {
        // if (Auth::id()) {
        //     if (Auth::user()->usertype == 1 || Auth::user()->usertype == 2) {
                $appoint = Appointment::with('doctor')->find($id);

                return view('admin.showappointmentdetails', compact('appoint'));
        //     } else {
        //         return redirect()->back();
        //     }
        // } else {
        //     return redirect('login');
        // }
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

    public function showalldoctors()
    {
        // if (Auth::id()) {
        //     if (Auth::user()->usertype == 1 || Auth::user()->usertype == 2) {
                $data = doctor::get();

                return view('admin.showalldoctors', compact('data'));
        //     } else {
        //         return redirect()->back();
        //     }
        // } else {
        //     return redirect('login');
        // }
    }

    public function showdoctordetails($id)
    {
        // if (Auth::id()) {
        //     if (Auth::user()->usertype == 1 || Auth::user()->usertype == 2) {
                $doctor = Doctor::with(['user', 'specialization'])->find($id);

                return view('admin.showdoctordetails', compact('doctor'));
        //     } else {
        //         return redirect()->back();
        //     }
        // } else {
        //     return redirect('login');
        // }
    }

    public function createdoctor()
    {
        // if (Auth::id()) {
        //     if (Auth::user()->usertype === 1 || Auth::user()->usertype === 2) {
                $specializations = Specialization::where('is_active', true)->pluck('name', 'id');

                return view('admin.add_doctor', compact("specializations"));
        //     } else {
        //         return redirect()->back();
        //     }
        // } else {
        //     return redirect('login');
        // }
    }

    public function storedoctor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'specialization_id' => 'required|exists:specializations,id',
            'room' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension =  $request->file('image')->getClientOriginalExtension();

            $fileName = $filename.'_' .time().'.'.$extension;

            $fileName = str_replace(' ', '_', $fileName);

            $filePath = $request->file('image')->storeAs('doctors', $fileName, 'public');
        }

        // Create user first
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // Then create doctor with the user_id
        $doctor = new Doctor;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->specialization_id = $request->specialization_id;
        $doctor->user_id = $user->id;
        $doctor->room = $request->room;
        $doctor->image = $filePath;
        $doctor->save();

        return redirect()->route('admin.createdoctor')->with('success', 'Doctor created successfully');
    }

    public function deletedoctor($id)
    {
        $doctor = Doctor::find($id);  // Ensure that the model name has a capital 'D'
        if ($doctor) {
            $doctor->delete();

            // Delete the associated user
            $user = $doctor->user;
            if ($user) {
                $user->delete();
            }

            return redirect()->route('admin.showalldoctors')->with('success', 'Doctor deleted successfully');
        } else {
            return redirect()->route('admin.showalldoctors')->with('error', 'Doctor not found');
        }
    }

    public function updatedoctor(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'specialization_id' => 'required|exists:specializations,id',
            'room' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension =  $request->file('image')->getClientOriginalExtension();

            $fileName = $filename.'_' .time().'.'.$extension;

            $fileName = str_replace(' ', '_', $fileName);

            $filePath = $request->file('image')->storeAs('doctors', $fileName, 'public');
        }

        $doctor = Doctor::findOrFail($id);

        if ($doctor) {
            // Find the associated user
            $user = User::find($doctor->user_id);
        
            if ($user) {
                // Update user details
                $user->name = $request->name;
                $user->email = $request->email;
                if ($request->filled('password')) {
                    $user->password = Hash::make($request->password);
                }
                $user->save();

                // Update doctor details
                $doctor->name = $request->name;
                $doctor->phone = $request->phone;
                $doctor->specialization_id = $request->specialization_id;
                $doctor->room = $request->room;

                if ($request->hasFile('image')) {
                    $doctor->image = $filePath;
                }

                $doctor->save();
                
                return redirect()->route('admin.showalldoctors')->with('success', 'Doctor and user updated successfully');
            } else {
                return redirect()->route('admin.showalldoctors')->with('error', 'Associated user not found');
            }
        } else {
            return redirect()->route('admin.showalldoctors')->with('error', 'Doctor not found');
        }
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor = Doctor::with(['user', 'specialization'])->find($id);

        if (!$doctor) {
            return redirect()->route('user.home')->with('error', 'Doctor not found.');
        }

        $specializations = Specialization::where('is_active', true)->pluck('name', 'id');
        return view('admin.edit_doctor', compact('doctor', 'specializations'));
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
