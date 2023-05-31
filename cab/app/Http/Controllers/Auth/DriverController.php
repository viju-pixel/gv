<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //     $drivers = Driver::whereNull('approved_at')->get();

    //   //  $drivers = Driver::latest()->paginate(5);
    
    //     return view('auth.Driver.index',compact('drivers'))
    //         ->with('i', (request()->input('page', 1) - 1) * 5);
        return view('auth.test.index');
    }
}
