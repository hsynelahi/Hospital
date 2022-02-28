<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function redirect()
   {
       if(Auth::id())
       {
            if(Auth::user()->userType == '0')
            {
                $doctors = Doctor::all();
                return view('User.home',compact('doctors'));
            }
            else
            {
                return view('Admin.home');
            }
       }
       else
       {
           return redirect()->back();
       }
   }

   public function index()
   {
       if(Auth::id())
       {
           return redirect('home');
       }else
       {
       $doctors = Doctor::all();
       return view('User.home',compact('doctors'));
       }
   }

   public function appointment(Request $request)
   {

        $appointments = new Appointment;

        $appointments->name = $request->name;
        $appointments->phone = $request->phone;
        $appointments->email = $request->email;
        $appointments->doctor = $request->doctor;
        $appointments->status = 'In progres';
        $appointments->date = $request->date;
        $appointments->message = $request->message;

        if(Auth::id())
        {
            $appointments->user_id = Auth::user()->id;
        }

        $appointments->save();

        return redirect()->back()->with('message','We will Contact With you Soon');
   }

   public function myappointment()
   {
       if(Auth::id())
       {
           if(Auth::user()->userType == 0)
           {
                $user_id = Auth::user()->id;
                $appointments = Appointment::where('user_id',$user_id)->get();
                return view('User.myappointment',compact('appointments'));
           }
            
       }
       else
       {
           return redirect()->back();
       }
       
   }

   public function deletemyappointment($id)
   {
       $appointments = Appointment::find($id);

       $appointments->delete();

       return redirect()->back()->with('message','Appointment Deleted Successfully');
   }
}
