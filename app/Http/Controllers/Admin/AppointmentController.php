<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Auth;

class AppointmentController extends Controller
{
    public function AppointmentStore(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'date'   => 'required',
            'doctor'   => 'required',
            'number'   => 'required',
        ]);


        $appointment = new Appointment();

        $appointment->user_id =  Auth::id();
        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->date = $request->date;
        $appointment->doctor = $request->doctor;
        $appointment->number = $request->number;
        $appointment->message = $request->message;
        $appointment->status = "In Progress";
        $appointment->save();

        notify()->success("Appointment Request Successful, We Will Contact with you very soon", "Success");
        return redirect()->back();
    }
}
