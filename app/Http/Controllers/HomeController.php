<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Doctor;

use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                $doctor = doctor::all();
                return view('user.homepage', compact('doctor'));
            } elseif (Auth::user()->usertype == '2') {
                $doctor = doctor::all();
                return view('doctor.home', compact('doctor'));
            } else {
                $data = appointment::whereStatus('Approved')
                    ->where('date', 'like', now()->format('m/d/Y'))
                    ->orderBy('updated_at', 'asc')
                    ->get();
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
            return redirect('user.homepage');
        } else {
            $doctor = doctor::all();

            return view('user.homepage', compact('doctor'));
        }
    }

    public function appointment(Request $request)
    {
        $data = new appointment();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->type = $request->type;
        $data->service = $request->service;
        $data->date = $request->date;
        $data->barangayid = $request->barangayid;
        $data->status = 'Not Approved';

        if (Auth::id()) {
            $data->user_id = Auth::user()->id;
        }

        $data->save();

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

    public function cancel_appoint($id)
    {
        $data = appointment::find($id);

        $data->delete();

        return redirect()->back();
    }
}
