<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Doctor;


class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                 $doctors = Doctor::latest('id')->get();
                return view('user.home',compact('doctors'));
            }
            else{
                return view('admin.home');
            }
        }
        else {
            return redirect()->back();
        }
    }

    public function index()
    {
        if (Auth::id()) {
            return redirect('home');
        }
        
        else{
        $doctors = Doctor::latest('id')->get();
        return view('user.home',compact('doctors'));

        }
    }
}
