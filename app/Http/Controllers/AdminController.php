<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Appointment;
use App\Models\Doctor;
use Notification;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.home');
    }

    public function addDoctorView()
    {
        if(Auth::id())
        {
            if(Auth::user()->userType == 1)
            {
                return view('Admin.addDoctorView');
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function addDoctor(Request $request)
    {
        $doctors = new Doctor;

        $image = $request->image;

        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('doctorImage',$imageName);
        $doctors->image = $imageName;

        $doctors->name = $request->name;
        $doctors->phone = $request->phone;
        $doctors->room = $request->room;
        $doctors->speciality = $request->speciality;

        $doctors->save();

        return redirect()->back()->with('message','Doctor Added Successfully');
    }

    public function showDoctor()
    {
        if(Auth::id())
        {
            $doctors = Doctor::all();
             return view('Admin.showDoctor',compact('doctors'));
        }
    }

    public function deleteDoctor($id)
    {
        $doctors = Doctor::find($id);
        $doctors->delete();

        return redirect()->back()->with('message','Doctor Deleted Successfully');
    }

    public function updateDoctorView($id)
    {
        $doctor = Doctor::find($id);
        return view('Admin.updateDoctorView',compact('doctor'));
    }

    public function updateDoctor(Request $request,$id)
    {

        $doctor = Doctor::find($id);

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;
        $image = $request->image;

        if($image)
        {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('doctorimage',$imageName);
            $doctor->image = $imageName;
        }

        $doctor->save();

        return redirect()->back()->with('message','Doctor Updated Successfully');
    }

    public function showappointment()
    {
        if(Auth::id())
        {
            if(Auth::user()->userType == 1)
            {
                $appointments = Appointment::all();
                return view('Admin.showappointment',compact('appointments'));
            }
            else
            {
                return redirect()->back();
            }
           
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function cancelAppointment($id)
    {
        $appointments = Appointment::find($id);

        $appointments->status = 'Canceld';

        $appointments->save();

        return redirect()->back();
    }

    public function approveAppointment($id)
    {
        $appointments = Appointment::find($id);

        $appointments->status = 'Approved';

        $appointments->save();

        return redirect()->back();
    }

    public function emailView($id)
    {
        $email = Appointment::find($id);
        return view('Admin.emailView',compact('email'));
    }

    public function sendEmail(Request $request,$id)
    {
        $email = Appointment::find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart
        ];

        FacadesNotification::send($email, new SendEmailNotification($details));

        return redirect()->back()->with('message','Send Email Successfully');
    }
}
