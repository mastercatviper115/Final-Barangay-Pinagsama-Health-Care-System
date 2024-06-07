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

class AdminController extends Controller
{
    public function addview()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                return view('admin.add_doctor');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }
    public function adminviewhome()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                $data = appointment::whereStatus('Approved')->get();
                return view('admin.home', compact('data'));
            } else {
                return redirect()->back();
            }
        } else {
            return view('user.homepage');
        }
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

    public function showappointment()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                $data = appointment::whereStatus('Not Approved')->get();
                return view('admin.showappointment', compact('data'));
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
            if (Auth::user()->usertype == 1) {
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
            if (Auth::user()->usertype == 1) {
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
            if (Auth::user()->usertype == 1) {
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
            if (Auth::user()->usertype == 1) {
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
