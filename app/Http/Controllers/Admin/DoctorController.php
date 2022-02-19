<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;
use Image;
use Carbon\Carbon;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::latest('id')->get(); 
        return view('admin.doctor.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
             'doctor_name'          => 'required',
             'doctor_phone'         => 'required',
            // ' doctor_speciality'    => 'required',
            // ' doctor_room'          => 'required',
        ]);

            $image = $request->file('doctor_image');
            $slug  = Str::slug($request->doctor_name);
         
          if (isset($image))
        {
           //  make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
           //    check doctor dir is exists
            if (!Storage::disk('public')->exists('doctor'))
            {
                Storage::disk('public')->makeDirectory('doctor');
            }
         //  resize image for doctor and upload
        
            Image::make($image)->resize(550, 640)->save(storage_path('app/public/doctor').'/'.$imagename);

        }

        $doctor = new Doctor();
        $doctor->doctor_image       = $imagename;
        $doctor->doctor_name        = $request->doctor_name;
        $doctor->doctor_phone       = $request->doctor_phone;
        $doctor->doctor_speciality  = $request->doctor_speciality;
        $doctor->doctor_room        = $request->doctor_room;
        $doctor->save();

        notify()->success("Doctor Update", "Success");
        return redirect()->route('admin.doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('admin.doctor.create',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
             'doctor_name'          => 'required',
             'doctor_phone'         => 'required',
            // ' doctor_speciality'    => 'required',
            // ' doctor_room'          => 'required',
             'doctor_image'         => 'required',
        ]);

            $image = $request->file('doctor_image');
            $slug  = Str::slug($request->doctor_name);
         
          if (isset($image))
        {
           //  make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
           //    check doctor dir is exists
            if (!Storage::disk('public')->exists('doctor'))
            {
                Storage::disk('public')->makeDirectory('doctor');
            }

                //  delete old image for doctor

            if (Storage::disk('public')->exists('doctor/'.$doctor->doctor_image))
            {
                Storage::disk('public')->delete('doctor/'.$doctor->doctor_image);
            }
         //  resize image for doctor and upload
        
            Image::make($image)->resize(550, 640)->save(storage_path('app/public/doctor').'/'.$imagename);

        }else{
            $imagename = $doctor->doctor_image;
        }

        $doctor->doctor_image       = $imagename;
        $doctor->doctor_name        = $request->doctor_name;
        $doctor->doctor_phone       = $request->doctor_phone;
        $doctor->doctor_speciality  = $request->doctor_speciality;
        $doctor->doctor_room        = $request->doctor_room;
        $doctor->save();

        notify()->success("Doctor Added", "Success");
        return redirect()->route('admin.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
          if (Storage::disk('public')->exists('doctor/'.$doctor->doctor_image))
            {
                Storage::disk('public')->delete('doctor/'.$doctor->doctor_image);
            }
            
        $doctor->delete();
        notify()->success('Doctor Deleted', "Success");
        return redirect()->back();
    }
}
